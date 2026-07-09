@php
    // Unit price (tax-inclusive) used to label the quantity dropdown
    $do_unit_price = calculatePrice($sale_price, $product);
    $do_currency   = site_currency_symbol();
    $do_max_qty    = (int) ($stock_count > 0 ? min($stock_count, 10) : 0);
    $do_cities     = \Modules\CountryManage\Entities\City::where('status', 1)->orderBy('name')->get(['id', 'name']);

    // Prefill: logged-in delivery address first, then the "remember me" cookie
    $do_user = auth('web')->user();
    $do_addr = $do_user?->delivery_address;

    $pf_name    = old('name', $do_addr?->full_name ?? request()->cookie('direct_order_name'));
    $pf_phone   = old('phone', $do_addr?->phone ?? request()->cookie('direct_order_phone'));
    $pf_city    = old('city', $do_addr?->city ?? request()->cookie('direct_order_city'));
    $pf_address = old('address', $do_addr?->address ?? request()->cookie('direct_order_address'));
    $pf_email   = old('email', $do_user?->email ?? request()->cookie('direct_order_email'));
@endphp

<div class="direct-order-wrapper mt-4">
    <h3 class="details-title mb-2">{{ __('Order Now') }}</h3>
    <p class="mb-4 color-light">{{ __('Kindly fill the form & we will deliver in 2-3 working days.') }}</p>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="direct_order_form" method="POST" action="{{ route('tenant.shop.direct.order') }}">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="product_slug" value="{{ $product->slug }}">
        <input type="hidden" name="product_variant" id="do_product_variant" value="">
        <input type="hidden" name="selected_color" id="do_selected_color" value="">
        <input type="hidden" name="selected_size" id="do_selected_size" value="">

        <div class="do-field mb-3">
            <label class="fw-500 color-heading mb-1">{{ __('Full Name') }}<span class="text-danger">*</span></label>
            <input class="form--input w-100" type="text" name="name" value="{{ $pf_name }}"
                   placeholder="{{ __('Full Name') }}*" required>
        </div>

        <div class="do-field mb-3">
            <label class="fw-500 color-heading mb-1">{{ __('Mobile') }}<span class="text-danger">*</span></label>
            <input class="form--input w-100" type="text" name="phone" value="{{ $pf_phone }}"
                   placeholder="{{ __('Mobile') }}*" required>
        </div>

        <div class="do-field mb-3">
            <label class="fw-500 color-heading mb-1">{{ __('Quantity') }}<span class="text-danger">*</span></label>
            <select name="quantity" id="do_quantity" class="form--input w-100" {{ $do_max_qty > 0 ? '' : 'disabled' }}>
                @if($do_max_qty > 0)
                    @for($q = 1; $q <= $do_max_qty; $q++)
                        <option value="{{ $q }}">{{ $q }} - {{ $do_currency }}{{ number_format($do_unit_price * $q, 2) }}</option>
                    @endfor
                @else
                    <option value="1">{{ __('Out of Stock') }}</option>
                @endif
            </select>
        </div>

        <div class="do-field mb-3">
            <label class="fw-500 color-heading mb-1">{{ __('City') }}<span class="text-danger">*</span></label>
            <select name="city" class="form--input w-100" required>
                <option value="">{{ __('Select City') }}*</option>
                @foreach($do_cities as $do_city)
                    <option value="{{ $do_city->id }}" {{ (string) $pf_city === (string) $do_city->id ? 'selected' : '' }}>
                        {{ $do_city->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="do-field mb-3">
            <label class="fw-500 color-heading mb-1">{{ __('Delivery Address') }}<span class="text-danger">*</span></label>
            <textarea class="form--input w-100" name="address" rows="3"
                      placeholder="{{ __('Delivery Address') }}* ({{ __('Building No, Street name, Area') }})" required>{{ $pf_address }}</textarea>
        </div>

        @guest('web')
            <div class="do-field mb-2">
                <label class="fw-500 color-heading">
                    <input type="checkbox" name="create_account" id="do_create_account" value="1" {{ old('create_account') ? 'checked' : '' }}>
                    {{ __('Create an account for faster checkout next time') }}
                </label>
            </div>

            <div class="do-account-fields" style="{{ old('create_account') ? '' : 'display:none;' }}">
                <div class="do-field mb-3">
                    <label class="fw-500 color-heading mb-1">{{ __('Email') }}</label>
                    <input class="form--input w-100" type="email" name="email" value="{{ $pf_email }}"
                           placeholder="{{ __('Email') }}">
                </div>
                <div class="do-field mb-3">
                    <label class="fw-500 color-heading mb-1">{{ __('Username') }}</label>
                    <input class="form--input w-100" type="text" name="create_username" value="{{ old('create_username') }}"
                           placeholder="{{ __('Username') }}">
                </div>
                <div class="do-field mb-3">
                    <label class="fw-500 color-heading mb-1">{{ __('Password') }}</label>
                    <input class="form--input w-100" type="password" name="create_password"
                           placeholder="{{ __('Password') }}">
                </div>
            </div>
        @endguest

        <div class="quantity-btn mt-3">
            <button type="submit" class="cmn-btn cmn-btn-bg-heading radius-0 w-100" {{ $do_max_qty > 0 ? '' : 'disabled' }}>
                {{ __('Submit Order') }}
            </button>
        </div>
    </form>
</div>
