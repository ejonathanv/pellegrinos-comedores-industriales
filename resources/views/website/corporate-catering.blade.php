@php
    $seo = \App\Support\Seo::class;
    $business = config('business');
    $heroImage = 'img/catering/catering-hero.webp';

    $serviceSchema = [
        '@type' => 'Service',
        'name' => __('corporate_catering.hero.title'),
        'serviceType' => __('website.quote.services.catering'),
        'description' => $seo::meta('corporate_catering')['description'],
        'url' => $seo::url('corporate_catering'),
        'provider' => [
            '@type' => 'LocalBusiness',
            '@id' => $seo::url('home', config('seo.default_locale')) . '#business',
            'name' => $business['name'],
        ],
        'areaServed' => ['@type' => 'City', 'name' => $business['area_served']],
    ];
@endphp
<x-website-layout :footer-image="$heroImage">

    <x-page-hero
        :title="__('corporate_catering.hero.title')"
        :subtitle="__('corporate_catering.hero.subtitle')"
        :breadcrumb="__('corporate_catering.breadcrumb')"
        :image="$heroImage">
        <a href="#contact" class="btn btn-maincolor">{{ __('corporate_catering.hero.cta') }}</a>
    </x-page-hero>

    <x-trust-bar />

    <section class="ls s-py-60 s-py-xl-90 landing-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="color-darkgrey">{{ __('corporate_catering.intro.title') }}</h2>
                    <p class="fs-20">{{ __('corporate_catering.intro.text') }}</p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('img/catering/catering-intro.webp') }}" alt="{{ __('website.services.serviceThree.title') }}" width="1600" height="901" loading="lazy" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="ms s-py-60 s-py-xl-90 landing-section">
        <div class="container">
            <h2 class="text-center color-darkgrey">{{ __('corporate_catering.problems.title') }}</h2>
            <div class="row">
                @foreach (__('corporate_catering.problems.items') as $item)
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
            <h2 class="text-center">{{ __('corporate_catering.includes.title') }}</h2>
            <div class="row">
                @foreach (__('corporate_catering.includes.items') as $item)
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
                    <img src="{{ asset('img/catering/catering-process.webp') }}" alt="{{ __('corporate_catering.process.title') }}" width="1600" height="901" loading="lazy" class="img-fluid">
                </div>
                <div class="col-lg-7">
                    <h2 class="color-darkgrey">{{ __('corporate_catering.process.title') }}</h2>
                    <ol class="process-steps">
                        @foreach (__('corporate_catering.process.steps') as $step)
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

    <x-faq :title="__('corporate_catering.faq.title')" :items="__('corporate_catering.faq.items')" />

    <x-quote-form service="catering" :image="$heroImage" />

    <x-json-ld :schema="$serviceSchema" />

</x-website-layout>
