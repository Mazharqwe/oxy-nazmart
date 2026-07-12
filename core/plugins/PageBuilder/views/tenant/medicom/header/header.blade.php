<div class="banner-area banner-two theme-three oxy-hero" data-padding-top="{{$data['padding_top']}}"
     data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container container-one">
        @php
            $titles = $data['repeater_data']['title_'] ?? [];
        @endphp
        <div class="oxy-hero-grid">
            @foreach($titles as $key => $value)
                @php
                    $title = esc_html($value) ?? '';
                    $subtitle = esc_html($data['repeater_data']['subtitle_'][$key]) ?? '';
                    $button_text = esc_html($data['repeater_data']['shop_button_text_'][$key]) ?? '';
                    $button_url = esc_url($data['repeater_data']['shop_button_url_'][$key]) ?? '';
                    $figure_image = $data['repeater_data']['figure_image_'][$key] ?? '';
                @endphp

                @if($loop->first)
                    <a href="{{!empty($button_url) && $button_url !== '#' ? $button_url : route('tenant.shop')}}"
                       class="oxy-hero-main">
                        <div class="oxy-hero-main-thumb">
                            {!! render_image_markup_by_attachment_id($figure_image) !!}
                        </div>
                        <span class="oxy-hero-viewing">{{__('Viewing')}}</span>
                        <div class="oxy-hero-main-contents">
                            <h1 class="oxy-hero-main-title">
                                {!! get_tenant_highlighted_text($title, 'banner-image-content-title-span') !!}
                            </h1>
                            <p class="oxy-hero-main-subtitle">{{!empty($subtitle) ? $subtitle : __('All products')}}</p>
                        </div>
                    </a>

                    @if(count($titles) > 1)
                        <div class="oxy-hero-tiles">
                    @endif
                @else
                    <a href="{{!empty($button_url) && $button_url !== '#' ? $button_url : route('tenant.shop')}}"
                       class="oxy-hero-tile">
                        <div class="oxy-hero-tile-thumb">
                            {!! render_image_markup_by_attachment_id($figure_image) !!}
                        </div>
                        <div class="oxy-hero-tile-contents">
                            <h4 class="oxy-hero-tile-title">{!! get_tenant_highlighted_text($title, 'banner-image-content-title-span') !!}</h4>
                            <span class="oxy-hero-tile-subtitle">{{!empty($button_text) ? $button_text : __('Shop')}}</span>
                        </div>
                    </a>
                @endif

                @if($loop->last && count($titles) > 1)
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
