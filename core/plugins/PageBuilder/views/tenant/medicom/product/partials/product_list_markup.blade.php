@foreach($products as $product)
    @php
        $data_info = get_product_dynamic_price($product);
        $campaign_name = $data_info['campaign_name'];
        $regular_price = $data_info['regular_price'];
        $sale_price = $data_info['sale_price'];
        $discount = $data_info['discount'];
    @endphp

    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-{{productCards()}}">
        <div class="global-card oxy-product-card no-shadow pb-0">
            <div class="global-card-thumb">
                <a href="{{route('tenant.shop.product.details', $product->slug)}}">
                    {!! render_image_markup_by_attachment_id($product->image_id) !!}
                </a>
                @if($discount != null)
                    <span class="oxy-badge oxy-badge-discount"> {{$discount.'% '. __('OFF')}} </span>
                @endif
                @if(!empty($product->badge))
                    <span class="oxy-badge oxy-badge-tag"> {{$product?->badge?->name}} </span>
                @endif

                @include('tenant.frontend.shop.partials.product-options')
            </div>
            <div class="global-card-contents oxy-card-contents">
                <h5 class="global-card-contents-title">
                    <a href="{{route('tenant.shop.product.details', $product->slug)}}"> {!! product_limited_text($product->name) !!} </a>
                </h5>

                <div class="price-update-through oxy-price mt-2">
                    <span class="flash-prices"> {{amount_with_currency_symbol(calculatePrice($sale_price, $product))}} </span>
                    <span class="flash-old-prices"> {{$regular_price != null ? amount_with_currency_symbol($regular_price) : ''}} </span>
                </div>

                @php
                    $oxy_tax_rate = optional($product->taxOptions->first())->rate;
                @endphp
                @if(!empty($oxy_tax_rate))
                    <span class="oxy-vat-note">{{$oxy_tax_rate + 0}}% - {{__('VAT included')}}</span>
                @endif
            </div>
        </div>
    </div>
@endforeach
