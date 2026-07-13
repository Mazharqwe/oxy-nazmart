<div class="single-shop-details-wrapper">
    @if($campaign_product !== null && $campaign_product->status !== 'draft' && $is_expired)
        <div class="campaign_countdown_wrapper mb-5">
            <h3 class="text-capitalize text-start mb-3">{{$campaign_name}}</h3>
            <div class="global-timer"></div>
        </div>
    @endif

    @if($quickView)
        <div class="name_badge">
            <h2 class="details-title"> {!! $product->name !!}
                @if(!empty($product->badge))
                    <span class="global-card-thumb-badge-box global-card-thumb-badge-box-product-details  bg-color-new "> {{$product?->badge?->name}} </span>
                @endif
            </h2>
        </div>

        {!! render_product_star_rating_markup_with_count($product) !!}
        <div class="status-details d-flex align-items-center mt-4">
            <span class="status-details-title fw-500 me-5"> {{__('Status')}} </span>
            <a id="quick_view_stock" href="javascript:void(0)"
               data-stock-text='{!! $stock_count > 0 ? '<span class="text-success">'.__('In Stock').'</span>' : '<span class="text-danger">'.__('Out of Stock').'</span>' !!}'
               class="status-details-title color-stock fw-600"> {!! $stock_count > 0 ? '<span class="text-success">'.__('In Stock').'</span>' : '<span class="text-danger">'.__('Out of Stock').'</span>' !!} </a>
        </div>

        @php
           $final_price = calculatePrice($sale_price, $product);
        @endphp

        <div class="price-update-through mt-4">
            <h3 class="ff-rubik flash-prices"
                data-main-price="{{ $final_price }}"
                data-currency-symbol="{{ site_currency_symbol() }}"
                id="quick-view-price"
            > {{amount_with_currency_symbol($final_price)}} </h3>
            <span
                class="fs-22 flash-old-prices"> {{$deleted_price != null ? amount_with_currency_symbol($deleted_price) : ''}} </span>
        </div>
    @else
        <h3 class="oxy-order-form-title">{{ __('Order Now') }}</h3>
    @endif

    <div class="value-input-area">
        <div class="oxy-size-color-row">
            @if($productSizes->count() > 0 && !empty(current(current($productSizes))))
                <div
                    class="value-input-area single-input-list mt-4 size_list oxy-half {{ $quickView ? "quick-view-value-input-area" : "" }}">
                        <span class="input-title fw-500 color-heading oxy-picker-title">
                            <strong class="color-light"> {{ __('Size:') }} </strong>
                            <input readonly class="form--input value-size oxy-picker-value" name="size" type="text" value="">
                            <input type="hidden" id="selected_size">
                        </span>
                    <ul class="size-lists select-list oxy-swatch-list {{ $quickView ? "quick-view-size-lists" : "" }}" data-type="Size">
                        @foreach($productSizes as $product_size)
                            @if(!empty($product_size))
                                <li class="list"
                                    title="{{ optional($product_size)->name }}"
                                    data-value="{{ optional($product_size)->id }}"
                                    data-display-value="{{ optional($product_size)->name }}"
                                > {{ optional($product_size)->size_code }} </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($productColors->count() > 0 && current(current($productColors)))
                <div
                    class="value-input-area single-input-list mt-4 color_list oxy-half {{ $quickView ? "quick-view-value-input-area" : "" }}">
                        <span class="input-title fw-500 color-heading oxy-picker-title">
                            <strong class="color-light"> {{ __('Color:') }} </strong>
                            <input readonly class="form--input value-size oxy-picker-value" name="color" type="text" value="">
                            <input type="hidden" id="selected_color">
                        </span>
                    <ul class="size-lists color-list oxy-swatch-list oxy-color-swatch-list {{ $quickView ? "quick-view-size-lists" : "" }}" data-type="Color">
                        @foreach($productColors as $product_color)
                            @if(!empty($product_color))
                                <li style="background-color: {{$product_color->color_code}}"
                                    title="{{ optional($product_color)->name }}"
                                    data-value="{{ optional($product_color)->id }}"
                                    data-display-value="{{ optional($product_color)->name }}"
                                ></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        @foreach($available_attributes as $attribute => $options)
            <div
                class="value-input-area single-input-list mt-4 attribute_options_list  {{ $quickView ? "quick-view-value-input-area" : "" }}">
                        <span class="input-title fw-500 color-heading input-list oxy-picker-title">
                            <strong class="color-light"> {{ $attribute }}: </strong>
                            <input readonly class="form--input value-size oxy-picker-value" type="text" value="">
                            <input type="hidden" id="selected_attribute_option" name="selected_attribute_option">
                        </span>
                <ul class="size-lists oxy-swatch-list {{ $quickView ? "quick-view-size-lists" : "" }}" data-type="{{ $attribute }}">
                    @foreach($options as $option)
                        <li class="list"
                            title="{{ $option }}"
                            data-value="{{ $option }}"
                            data-display-value="{{ $option }}"
                        > {{ $option }} </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>

    @php
        if ($product?->inventory?->stock_count > 0)
            {
                $text_color = 'text-success';
                $text = __('Only!').' '.$product?->inventory?->stock_count.' '.__('Item Left');
            } else {
                $text_color = 'text-danger';
                $text = __('No Item Left!');
            }
    @endphp

    {{-- Quick view keeps the standard quantity stepper + cart/buy buttons. --}}
    {{-- Product page uses the direct Cash-on-Delivery "Order Now" form below. --}}
    @if($quickView)
        <div class="quantity-area mt-4">
            <div class="quantity-flex">
                <span class="quantity-title color-heading fw-500"> {{__('Quantity:')}} </span>
                <div class="product-quantity">
                    <span class="quick-view-substract  substract"><i class="las la-minus"></i></span>
                    <input class="quick-view-quantity-input quantity-input qty_" type="number"
                           id="quick-view-quantity" name="quantity" value="1">
                    <span class="quick-view-plus plus"><i class="las la-plus"></i></span>
                </div>
                <a class="stock-available color-stock {{$text_color}}" href="javascript:void(0)"
                   id="quick_view_item_left" data-stock-text="{{$text}}"> {{$text}} </a>
            </div>
            <div class="quantity-btn mt-4">
                <div class="btn-wrapper">
                    <a href="javascript:void(0)"
                       class="quick_view_add_to_cart cmn-btn cmn-btn-bg-heading radius-0 w-100 cart-loading">{{__('Add to Cart')}} </a>
                </div>
                <div class="btn-wrapper">
                    <a href="javascript:void(0)"
                       class="quick_view_but_now  cmn-btn cmn-btn-bg-steam radius-0 w-100 cart-loading"> {{__('Buy Now')}} </a>
                </div>
            </div>
        </div>
    @else
        {{-- Hidden stock indicator kept so the variation JS (syncStock) can update it silently. --}}
        <a class="d-none" href="javascript:void(0)" id="item_left" data-stock-text="{{$text}}"></a>
        @include(include_theme_path('shop.product_details.partials.direct-order-form'))
    @endif
    <div class="wishlist-compare mt-4">
        <div class="wishlist-compare-btn">
            <a href="javascript:void(0)"
               class="{{ $quickView ? "quick_view_add_to_wishlist" : "add_to_wishlist_single_page" }} btn-wishlist share-icon fw-500">
                <span class="icon">
                    <i class="lar la-heart"></i>
                </span>
            </a>
            <a href="javascript:void(0)"
               class="btn-wishlist share-icon fw-500 {{ $quickView ? "quick-view-" : "" }}compare-btn"
               data-product_id="{{$product->id}}"
               data-bs-toggle="tooltip"
               data-bs-placement="top"
               title="{{__('Add to Compare')}}">
                    <span class="icon">
                        <i class="las la-retweet"></i>
                    </span>
            </a>
        </div>
        <div class="wishlist-share social_share_parent">
            <a href="javascript:void(0)" class="share-icon fw-500">
                    <span class="icon">
                        <i class="las la-share-alt"></i>
                    </span>
            </a>

            @php
                $product_primary_image = get_attachment_image_by_id($product->image_id);
                $product_primary_image = $product_primary_image ? $product_primary_image['img_url'] : '';
            @endphp
            <ul class="social_share_wrapper_item">
                {!! single_post_share($product->slug, $product->name, $product_primary_image) !!}
            </ul>
        </div>
    </div>
    @if($quickView)
        <div class="shop-details-stock shop-border-top pt-4 mt-4">
            <ul class="stock-category">
                <li class="category-list">
                    <span class="list-item fw-600">
                        <a href="{{route('tenant.shop.category.products', [$product?->category?->slug, 'category'])}}">{{$product?->category?->name}}</a>

                        @if($product?->subCategory?->slug)
                            |
                            <a href="{{route('tenant.shop.category.products', [$product?->subCategory?->slug, 'subcategory'])}}">{{$product?->subCategory?->name}}</a>
                        @endif

                        @foreach($product->childCategory ?? [] as $child_category)
                            @if($loop->first)
                                |
                            @endif
                            <a href="{{route('tenant.shop.category.products', [$child_category?->slug, 'child-category'])}}"> {{$child_category->name}} </a>

                            @if(!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </span>
                </li>
                @if($product->uom != null)
                    <li class="category-list">
                        <span> {{__('Unit:')}} </span>
                        <a class="list-item fw-600" href="javascript:void(0)">
                            <span>{{$product?->uom?->quantity}}</span>
                            <span>{{$product?->uom?->uom_details?->name}}</span>
                        </a>
                    </li>
                @endif
                <li class="category-list">
                    <span> {{__('SKU:')}} </span>
                    <a class="list-item fw-600" href="javascript:void(0)"> {{$product?->inventory?->sku}} </a>
                </li>
            </ul>
            <div class="delivery-options delivery-parent mt-4">
                @if($product->product_delivery_option != null)
                    @foreach($product->product_delivery_option as $option)
                        <div class="delivery-item d-flex">
                            <div class="icon">
                                <i class="{{ $option->icon }}"></i>
                            </div>
                            <div class="content">
                                <h6 class="title">{{ $option->title }}</h6>
                                <p>{{ $option->sub_title }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    @endif
</div>
