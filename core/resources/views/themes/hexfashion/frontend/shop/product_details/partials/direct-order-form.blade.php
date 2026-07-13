@php
    // Unit price (tax-inclusive) used to label the quantity dropdown
    $do_unit_price = calculatePrice($sale_price, $product);
    $do_currency   = site_currency_symbol();
    $do_max_qty    = (int) ($stock_count > 0 ? min($stock_count, 10) : 0);
    // Scope cities to the store's country (set by super-admin per tenant); fall back to all if unset
    $do_store_country = tenant()->store_country ?? null;
    $do_cities = \Modules\CountryManage\Entities\City::where('status', 'publish')
        ->when($do_store_country, function ($q) use ($do_store_country) {
            $q->whereHas('country', function ($c) use ($do_store_country) {
                $c->where('name', $do_store_country);
            });
        })
        ->orderBy('name')->get(['id', 'name', 'state_id']);

    // Safety net: if the store country name doesn't match any city's country, don't leave the form unusable
    if ($do_store_country && $do_cities->isEmpty()) {
        $do_cities = \Modules\CountryManage\Entities\City::where('status', 'publish')
            ->orderBy('name')->get(['id', 'name', 'state_id']);
    }

    // States scoped the same way as cities; if none exist the state field is simply not rendered
    $do_states = \Modules\CountryManage\Entities\State::where('status', 'publish')
        ->when($do_store_country, function ($q) use ($do_store_country) {
            $q->whereHas('country', function ($c) use ($do_store_country) {
                $c->where('name', $do_store_country);
            });
        })
        ->orderBy('name')->get(['id', 'name']);

    if ($do_store_country && $do_states->isEmpty()) {
        $do_states = \Modules\CountryManage\Entities\State::where('status', 'publish')
            ->whereIn('id', $do_cities->pluck('state_id')->filter()->unique())
            ->orderBy('name')->get(['id', 'name']);
    }

    // Prefill: logged-in delivery address first, then the "remember me" cookie
    $do_user = auth('web')->user();
    $do_addr = $do_user?->delivery_address;

    $pf_name    = old('name', $do_addr?->full_name ?? request()->cookie('direct_order_name'));
    $pf_phone   = old('phone', $do_addr?->phone ?? request()->cookie('direct_order_phone'));
    $pf_state   = old('state', $do_addr?->state_id ?? request()->cookie('direct_order_state'));
    $pf_city    = old('city', $do_addr?->city ?? request()->cookie('direct_order_city'));
    $pf_address = old('address', $do_addr?->address ?? request()->cookie('direct_order_address'));
    $pf_email   = old('email', $do_user?->email ?? request()->cookie('direct_order_email'));
@endphp

<div class="direct-order-wrapper mt-4">
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

        <div class="row gx-2 mb-3">
            @if($do_states->isNotEmpty())
                <div class="do-field col-6">
                    <label class="fw-500 color-heading mb-1">{{ __('State') }}<span class="text-danger">*</span></label>
                    <select name="state" id="do_state" class="form--input w-100" required>
                        <option value="">{{ __('Select State') }}*</option>
                        @foreach($do_states as $do_state)
                            <option value="{{ $do_state->id }}" {{ (string) $pf_state === (string) $do_state->id ? 'selected' : '' }}>
                                {{ $do_state->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="do-field {{ $do_states->isNotEmpty() ? 'col-6' : 'col-12' }}">
                <label class="fw-500 color-heading mb-1">{{ __('City') }}<span class="text-danger">*</span></label>
                <select name="city" id="do_city" class="form--input w-100" required>
                    <option value="">{{ __('Select City') }}*</option>
                    @foreach($do_cities as $do_city)
                        <option value="{{ $do_city->id }}" data-state="{{ $do_city->state_id }}"
                            {{ (string) $pf_city === (string) $do_city->id ? 'selected' : '' }}>
                            {{ $do_city->name }}
                        </option>
                    @endforeach
                </select>
            </div>
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

        <div class="oxy-cod-note mt-3">
            <i class="las la-money-bill-wave"></i>
            <span>{{ __('Cash on Delivery — Pay when you receive') }}</span>
        </div>

        <div class="quantity-btn mt-3">
            <button type="submit" class="cmn-btn cmn-btn-bg-heading radius-0 w-100 oxy-submit-btn" {{ $do_max_qty > 0 ? '' : 'disabled' }}>
                <i class="las la-shopping-cart"></i> {{ __('Confirm Order (Cash on Delivery)') }}
            </button>
        </div>
    </form>

    <div class="oxy-order-trust mt-4">
        <p class="oxy-order-trust-text">{{ __('No prepayment required. Our team will call you to confirm.') }}</p>
        <div class="oxy-order-trust-icons">
            <div class="oxy-order-trust-item">
                <i class="las la-truck"></i>
                <span>{{ __('Free Delivery') }}</span>
            </div>
            <div class="oxy-order-trust-item">
                <i class="las la-box"></i>
                <span>{{ __('Cash on Delivery') }}</span>
            </div>
            <div class="oxy-order-trust-item">
                <i class="las la-shield-alt"></i>
                <span>{{ __('Easy Returns') }}</span>
            </div>
        </div>
    </div>
</div>
