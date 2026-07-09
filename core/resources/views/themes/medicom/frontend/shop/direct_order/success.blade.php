@extends(route_prefix().'frontend.frontend-page-master')

@section('title')
    {{ __('Order Placed Successfully') }}
@endsection

@section('page-title')
    {{ __('Order Confirmation') }}
@endsection

@section('content')
    @php
        $items = json_decode($order->order_details, true) ?? [];
    @endphp

    <section class="shop-details-area padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="single-shop-details-wrapper text-center" style="border:1px solid #eee;border-radius:10px;padding:40px 30px;">
                        <div class="mb-4" style="font-size:64px;line-height:1;color:#28a745;">
                            <i class="las la-check-circle"></i>
                        </div>

                        <h2 class="details-title mb-2">{{ __('Thank you, your order is confirmed!') }}</h2>
                        <p class="color-light mb-1">{{ __('Order ID') }}: <strong>#{{ $order->id }}</strong></p>
                        <p class="color-light mb-4">{{ __('We will deliver your order in 2-3 working days. Payment: Cash on Delivery.') }}</p>

                        <div class="text-start" style="border-top:1px solid #eee;padding-top:20px;">
                            @foreach($items as $item)
                                <div class="d-flex justify-content-between mb-2">
                                    <span>
                                        {{ $item['name'] ?? '' }}
                                        @if(!empty($item['options']['color_name']))
                                            <small class="color-light">/ {{ $item['options']['color_name'] }}</small>
                                        @endif
                                        @if(!empty($item['options']['size_name']))
                                            <small class="color-light">/ {{ $item['options']['size_name'] }}</small>
                                        @endif
                                        <small class="color-light">&times; {{ $item['qty'] ?? 1 }}</small>
                                    </span>
                                    <span>{{ amount_with_currency_symbol(($item['price'] ?? 0) * ($item['qty'] ?? 1)) }}</span>
                                </div>
                            @endforeach

                            <div class="d-flex justify-content-between fw-600 mt-3" style="border-top:1px solid #eee;padding-top:12px;">
                                <span>{{ __('Total') }}</span>
                                <span>{{ amount_with_currency_symbol($order->total_amount) }}</span>
                            </div>
                        </div>

                        <div class="text-start color-light mt-4" style="border-top:1px solid #eee;padding-top:20px;">
                            <p class="mb-1"><strong>{{ __('Name') }}:</strong> {{ $order->name }}</p>
                            <p class="mb-1"><strong>{{ __('Mobile') }}:</strong> {{ $order->phone }}</p>
                            <p class="mb-1"><strong>{{ __('Address') }}:</strong> {{ $order->address }}</p>
                        </div>

                        <div class="quantity-btn mt-5">
                            <a href="{{ route('tenant.shop') }}" class="cmn-btn cmn-btn-bg-heading radius-0">
                                {{ __('Continue Shopping') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
