<section class="category-area category-inner-border" data-padding-top="{{$data['padding_top']}}" data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container container-one">
        <div class="section-title theme-three">
            <h2 class="title"> {{$data['section_title']}} </h2>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mt-4">
                <div class="global-slick-init category-slider nav-style-one nav-color-four slider-inner-margin" data-infinite="true" data-arrows="true" data-dots="false" data-slidesToShow="5" data-swipeToSlide="true" data-autoplay="false" data-autoplaySpeed="2500" data-prevArrow='<div class="prev-icon"><i class="las la-angle-left"></i></div>'
                     data-nextArrow='<div class="next-icon"><i class="las la-angle-right"></i></div>' data-responsive='[{"breakpoint": 1800,"settings": {"slidesToShow": 5}},{"breakpoint": 1600,"settings": {"slidesToShow": 4}},{"breakpoint": 1400,"settings": {"slidesToShow": 4}},{"breakpoint": 992,"settings": {"slidesToShow": 3}},{"breakpoint": 576,"settings": {"slidesToShow": 2} }]'
                     data-rtl="{{get_user_lang_direction() == 1 ? 'true' : 'false'}}">
                    @foreach($data['categories_info'] ?? [] as $category)
                        <div class="single-slider-item">
                            <a href="{{route('tenant.shop.category.products', [$category->slug, 'category'])}}"
                               class="oxy-category-tile">
                                <div class="oxy-category-tile-thumb">
                                    {!! render_image_markup_by_attachment_id($category->image_id) !!}
                                </div>
                                <div class="oxy-category-tile-contents">
                                    <h3 class="oxy-category-tile-title">{{$category->name}}</h3>
                                    <span class="oxy-category-tile-subtitle">
                                        {{__('Shop')}}{{isset($category->product_count) ? ' · '.$category->product_count : ''}}
                                    </span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
