<section class="featured-area" data-padding-top="{{$data['padding_top']}}" data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container-one">
        <div class="section-title theme-three">
            <h2 class="title"> {{$data['title']}} </h2>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="global-slick-init recent-slider dot-style-one dot-color-four slider-inner-margin" data-rtl="{{get_user_lang_direction() == 1 ? 'true' : 'false'}}" data-infinite="true" data-arrows="false" data-dots="true" data-slidesToShow="4" data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500" data-prevArrow='<div class="prev-icon"><i class="las la-angle-left"></i></div>'
                     data-nextArrow='<div class="next-icon"><i class="las la-angle-right"></i></div>' data-responsive='[{"breakpoint": 1800,"settings": {"slidesToShow": 4}},{"breakpoint": 1600,"settings": {"slidesToShow": 4}},{"breakpoint": 1200,"settings": {"slidesToShow": 3}},{"breakpoint": 992,"settings": {"slidesToShow": 3}},{"breakpoint": 768,"settings": {"slidesToShow": {{phoneScreenProducts()}} } }]'>
                    @foreach($data['products'] as $product)
                        @php
                            if ($loop->odd) {
                                    $delay = 1;
                                    $class = 'fadeInUp';
                                }
                            else {
                                $delay = 2;
                                $class = 'fadeInDown';
                            }

                            $data = get_product_dynamic_price($product);
                            $campaign_name = $data['campaign_name'];
                            $regular_price = $data['regular_price'];
                            $sale_price = $data['sale_price'];
                            $discount = $data['discount'];
                        @endphp

                        <div class="slick-slider-items wow {{$class}}" data-wow-delay=".{{$delay}}s">
                            <div class="global-card oxy-product-card no-shadow pb-0">
                                <div class="global-card-thumb">
                                    <a href="{{route('tenant.shop.product.details', $product->slug)}}">
                                        {!! render_image_markup_by_attachment_id($product->image_id) !!}
                                    </a>
                                    @if(!empty($discount))
                                        <span class="oxy-badge oxy-badge-discount"> {{$discount}}% {{__('OFF')}} </span>
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
                </div>
            </div>
        </div>
    </div>
</section>
