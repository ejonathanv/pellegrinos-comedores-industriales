@php
    $seo = \App\Support\Seo::class;

    $services = [
        [
            'key' => 'serviceOne',
            'image' => 'images/img_1.webp',
            'url' => $seo::url('industrial_dining'),
            'cta' => __('website.services.cta_more'),
        ],
        [
            'key' => 'serviceTwo',
            'image' => 'img/coffee-break/coffee-break-intro.webp',
            'url' => $seo::url('coffee_break'),
            'cta' => __('website.services.cta_more'),
        ],
        [
            'key' => 'serviceThree',
            'image' => 'img/catering/catering-intro.webp',
            'url' => $seo::url('corporate_catering'),
            'cta' => __('website.services.cta_more'),
        ],
    ];
@endphp
<!-- Servicios -->
<section id="services" class="ls ms s-py-90 s-py-xl-160">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-xl-3 section-special small-section">
                <div>
                    <div class="content-center">
                        <h2 class="text-center text-lg-left mt-0 mb-2 color-darkgrey section-heading">
                            <span>
                                {{ __('website.services.title') }}
                            </span>
                        </h2>
                        <p class="justify-text color-darkgrey fw-500">
                            <span>
                                {{ __('website.services.description') }}
                            </span>
                        </p>
                        <div class="divider-35"></div>
                        <div class="owl-custom-nav hidden-below-lg">
                            <a href="#" class="owl-prev" aria-label="Anterior"><i class="fa fa-chevron-left"></i></a>
                            <a href="#" class="owl-next" aria-label="Siguiente"><i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-9">
                <div class="quote-carousel owl-carousel" data-margin="60" data-responsive-xl="2" data-responsive-ml="2" data-responsive-lg="2" data-responsive-md="1" data-responsive-sm="2" data-responsive-xs="1" data-dots="false" data-loop="true" data-autoplay="true">
                    @foreach ($services as $service)
                    <div class="vertical-item service-layout-1 ls">
                        <div class="item-media service-card-media" style="background-image: url('{{ asset($service['image']) }}');">
                            <a href="{{ $service['url'] }}" tabindex="-1" aria-label="{{ __("website.services.{$service['key']}.title") }}"></a>
                        </div>
                        <div class="item-content">
                            <div class="item-content-wrap">
                                <h3 class="mt-1 service-card-title">
                                    <a href="{{ $service['url'] }}">{{ __("website.services.{$service['key']}.title") }}</a>
                                </h3>
                                <p class="justify-text">
                                    {{ __("website.services.{$service['key']}.description") }}
                                </p>
                                <a href="{{ $service['url'] }}" class="btn btn-maincolor btn-small service-card-cta">
                                    {{ $service['cta'] }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
