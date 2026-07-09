<?php

namespace App\Http\Controllers\Tenant\Frontend;

use App\Enums\ProductTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\DirectOrderRequest;
use App\Models\OrderProducts;
use App\Models\ProductOrder;
use App\Models\User;
use App\Models\UserDeliveryAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\Attributes\Entities\Color;
use Modules\Attributes\Entities\Size;
use Modules\Campaign\Entities\CampaignSoldProduct;
use Modules\CountryManage\Entities\City;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductInventory;
use Modules\Product\Entities\ProductInventoryDetail;

/**
 * Simple direct (Cash-on-Delivery) checkout straight from the product page.
 * Bypasses the shopping cart entirely — one product, one form, one order.
 */
class DirectOrderController extends Controller
{
    public function store(DirectOrderRequest $request)
    {
        $data = $request->validated();

        $product = Product::where('id', $data['product_id'])
            ->where('status_id', 1)
            ->withSum('taxOptions', 'rate')
            ->firstOrFail();

        $quantity = (int) $data['quantity'];

        // Resolve the selected variation (if any)
        $variant = null;
        if (!empty($data['product_variant'])) {
            $variant = ProductInventoryDetail::where('id', $data['product_variant'])
                ->where('product_id', $product->id)
                ->first();
        }

        // Stock validation
        $base_inventory = ProductInventory::where('product_id', $product->id)->first();
        if ($variant && $quantity > (int) $variant->stock_count) {
            return back()->withInput()->withErrors(['quantity' => __('Requested quantity is not available.')]);
        }
        if (!$variant && $base_inventory && $quantity > (int) $base_inventory->stock_count) {
            return back()->withInput()->withErrors(['quantity' => __('Requested quantity is not available.')]);
        }

        // Pricing (mirrors buy_now / add_to_cart)
        $sale_price = $product->sale_price;
        $additional_price = 0;
        $additional_cost = 0;

        $dynamic_campaign = get_product_dynamic_price($product);
        if ($dynamic_campaign['is_running'] && $product->campaign_product) {
            $sale_price = $product?->campaign_product?->campaign_price;

            $sold = CampaignSoldProduct::where('product_id', $product->id)->first();
            $product_left = $sold !== null ? $product->campaign_product->units_for_sale - $sold->sold_count : null;
            if ($sold && !($quantity <= $product_left)) {
                return back()->withInput()->withErrors(['quantity' => __('Campaign product stock limit is over!')]);
            }
        }

        if ($variant) {
            $additional_price = $variant->additional_price ?? 0;
            $additional_cost  = $variant->add_cost ?? 0;
        }

        $unit_price   = calculatePrice($sale_price + $additional_price, $product); // tax-inclusive
        $total_amount = round($unit_price * $quantity, 2);

        // Country / state derived from the chosen city
        $city = City::find($data['city']);
        $country_name = optional(optional($city)->country)->name;
        $state_name   = optional(optional($city)->state)->name;

        // Buyer resolution: logged-in > opt-in account creation > guest
        $auth_user = Auth::guard('web')->user();
        $user_id   = $auth_user?->id;

        if (!$auth_user && !empty($data['create_account'])) {
            $already = User::where('username', trim($data['create_username']))
                ->orWhere('email', $data['email'])
                ->first();

            if ($already) {
                return back()->withInput()->withErrors([
                    'create_username' => __('An account already exists with this username or email. Please log in instead.'),
                ]);
            }

            $new_user = User::create([
                'username' => create_slug($data['create_username'], 'User', false, '', 'username'),
                'password' => Hash::make($data['create_password']),
                'name'     => $data['name'],
                'email'    => $data['email'],
                'mobile'   => $data['phone'],
                'country'  => $country_name,
                'state'    => $state_name,
                'city'     => $data['city'],
                'address'  => $data['address'],
            ]);

            UserDeliveryAddress::create([
                'user_id'    => $new_user->id,
                'full_name'  => $data['name'],
                'email'      => $data['email'],
                'phone'      => $data['phone'],
                'country_id' => optional($city)->country_id,
                'state_id'   => optional($city)->state_id,
                'city'       => $data['city'],
                'address'    => $data['address'],
            ]);

            Auth::guard('web')->login($new_user);
            $user_id = $new_user->id;
        }

        // Variation display names for the order snapshot
        $color_name = !empty($data['selected_color']) ? optional(Color::find($data['selected_color']))->name : null;
        $size_name  = !empty($data['selected_size']) ? optional(Size::find($data['selected_size']))->name : null;

        $product_image = $product->image_id;
        $line_image    = $variant?->image ?: $product_image;

        // Snapshot shaped like a single cart line so existing order views can render it
        $order_details = [[
            'id'      => $product->id,
            'name'    => $product->name,
            'qty'     => $quantity,
            'price'   => $unit_price,
            'weight'  => 0,
            'options' => [
                'image'                => $line_image,
                'variant_id'           => $variant?->id,
                'color_name'           => $color_name,
                'size_name'            => $size_name,
                'type'                 => ProductTypeEnum::PHYSICAL,
                'tax_options_sum_rate' => $product->tax_options_sum_rate ?? 0,
                'base_cost'            => ($product->cost ?? 0) + $additional_cost,
            ],
        ]];

        DB::beginTransaction();
        try {
            $order = ProductOrder::create([
                'user_id'         => $user_id,
                'name'            => $data['name'],
                'email'           => $data['email'] ?? null,
                'phone'           => $data['phone'],
                'country'         => $country_name,
                'state'           => $state_name,
                'city'            => $data['city'],
                'address'         => $data['address'],
                'total_amount'    => $total_amount,
                'payment_gateway' => 'cash_on_delivery',
                'status'          => 'pending',
                'payment_status'  => 'pending',
                'checkout_type'   => 'cod',
                'payment_track'   => Str::random(10) . Str::random(10),
                'order_details'   => json_encode($order_details),
                // Order summary meta consumed by the admin order-view (subtotal/tax/shipping/total)
                'payment_meta'    => json_encode([
                    'subtotal'      => $total_amount,
                    'product_tax'   => 0,
                    'shipping_cost' => 0,
                    'total'         => $total_amount,
                ]),
            ]);

            OrderProducts::create([
                'user_id'      => $user_id,
                'order_id'     => $order->id,
                'product_id'   => $product->id,
                'variant_id'   => $variant?->id,
                'quantity'     => $quantity,
                'price'        => $unit_price,
                'product_type' => ProductTypeEnum::PHYSICAL,
            ]);

            // Inventory decrement
            if ($variant) {
                $variant->decrement('stock_count', $quantity);
                $variant->increment('sold_count', $quantity);
            }
            if ($base_inventory) {
                $base_inventory->decrement('stock_count', $quantity);
                $base_inventory->sold_count = ($base_inventory->sold_count ?? 0) + $quantity;
                $base_inventory->save();
            }

            // Campaign sold tracking
            if ($dynamic_campaign['is_running'] && $product->campaign_product) {
                $sold = CampaignSoldProduct::where('product_id', $product->id)->first();
                if (empty($sold)) {
                    CampaignSoldProduct::create([
                        'product_id'   => $product->id,
                        'sold_count'   => $quantity,
                        'total_amount' => $product->campaign_product->campaign_price * $quantity,
                        'campaign_id'  => $product->campaign_product->campaign_id,
                        'created_at'   => now(),
                        'updated_at'   => now(),
                    ]);
                } else {
                    $sold->increment('sold_count', $quantity);
                    $sold->total_amount += $product->campaign_product->campaign_price * $quantity;
                    $sold->save();
                }
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->withInput()->withErrors([
                'error' => __('Something went wrong while placing your order. Please try again.'),
            ]);
        }

        // Remember buyer details so the form is pre-filled next time (guest-friendly, 1 year)
        $ttl = 60 * 24 * 365;
        Cookie::queue('direct_order_name', (string) $data['name'], $ttl);
        Cookie::queue('direct_order_phone', (string) $data['phone'], $ttl);
        Cookie::queue('direct_order_city', (string) $data['city'], $ttl);
        Cookie::queue('direct_order_address', (string) $data['address'], $ttl);
        Cookie::queue('direct_order_email', (string) ($data['email'] ?? ''), $ttl);

        return redirect()
            ->route('tenant.shop.direct.order.success', ['order' => $order->id])
            ->with('success', __('Your order has been placed successfully.'));
    }

    public function success($order)
    {
        $order = ProductOrder::where('id', $order)
            ->where('checkout_type', 'cod')
            ->firstOrFail();

        return themeView('shop.direct_order.success', compact('order'));
    }
}
