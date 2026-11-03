@php
    $seo = \App\Support\Seo::class;
    $business = config('business');
    $heroImage = 'img/portadas/comedor-industrial-hero.webp';
    $footerImage = 'img/portadas/contacto.webp';

    $serviceSchema = [
        '@type' => 'Service',
        'name' => __('industrial_dining.hero.title'),
        'serviceType' => __('website.quote.services.comedor'),
        'description' => $seo::meta('industrial_dining')['description'],
        'url' => $seo::url('industrial_dining'),
        'provider' => [
            '@type' => 'LocalBusiness',
            '@id' => $seo::url('home', config('seo.default_locale')) . '#business',
            'name' => $business['name'],
        ],
        'areaServed' => ['@type' => 'City', 'name' => $business['area_served']],
    ];
@endphp
<x-website-layout :footer-image="$footerImage">

    <x-page-hero
        :title="__('industrial_dining.hero.title')"
        :subtitle="__('industrial_dining.hero.subtitle')"
        :breadcrumb="__('industrial_dining.breadcrumb')"
        :image="$heroImage">
        <a href="#contact" class="btn btn-maincolor">{{ __('industrial_dining.hero.cta') }}</a>
    </x-page-hero>

    <x-trust-bar />

    <section class="ls s-py-60 s-py-xl-90 landing-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="color-darkgrey">{{ __('industrial_dining.intro.title') }}</h2>
                    <p class="fs-20">{{ __('industrial_dining.intro.text') }}</p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/img_1.webp') }}" alt="{{ __('website.services.serviceOne.title') }}" width="800" height="600" loading="lazy" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="ms s-py-60 s-py-xl-90 landing-section">
        <div class="container">
            <h2 class="text-center color-darkgrey">{{ __('industrial_dining.problems.title') }}</h2>
            <div class="row">
                @foreach (__('industrial_dining.problems.items') as $item)
                    <div class="col-md-4 mb-4">
                        <div class="landing-card">
                            <h3>{{ $item['title'] }}</h3>
                            <p>{{ $item['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="ds s-py-60 s-py-xl-90 landing-section landing-section-dark">
        <div class="container">
            <h2 class="text-center">{{ __('industrial_dining.includes.title') }}</h2>
            <div class="row">
                @foreach (__('industrial_dining.includes.items') as $item)
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="landing-card">
                            <h3 style="color: #242424;">{{ $item['title'] }}</h3>
                            <p>{{ $item['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="ms s-py-60 s-py-xl-90 landing-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <img src="{{ asset('img/galeria/comidas/slides/slide2.webp') }}" alt="{{ __('website.galleries.one.title') }}" width="1200" height="676" loading="lazy" class="img-fluid">
                </div>
                <div class="col-lg-7">
                    <h2 class="color-darkgrey">{{ __('industrial_dining.process.title') }}</h2>
                    <ol class="process-steps">
                        @foreach (__('industrial_dining.process.steps') as $step)
                            <li>
                                <h3>{{ $step['title'] }}</h3>
                                <p>{{ $step['text'] }}</p>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <x-faq :title="__('industrial_dining.faq.title')" :items="__('industrial_dining.faq.items')" />

    <x-quote-form service="comedor" :image="$footerImage" />

    <x-json-ld :schema="$serviceSchema" />

</x-website-layout>
