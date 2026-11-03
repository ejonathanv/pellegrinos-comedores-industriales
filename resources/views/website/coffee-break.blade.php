@php
    $seo = \App\Support\Seo::class;
    $business = config('business');
    $heroImage = 'img/coffee-break/coffee-break-hero.webp';

    $serviceSchema = [
        '@type' => 'Service',
        'name' => __('coffee_break.hero.title'),
        'serviceType' => __('website.quote.services.coffee-break'),
        'description' => $seo::meta('coffee_break')['description'],
        'url' => $seo::url('coffee_break'),
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
        :title="__('coffee_break.hero.title')"
        :subtitle="__('coffee_break.hero.subtitle')"
        :breadcrumb="__('coffee_break.breadcrumb')"
        :image="$heroImage">
        <a href="#contact" class="btn btn-maincolor">{{ __('coffee_break.hero.cta') }}</a>
    </x-page-hero>

    <x-trust-bar />

    <section class="ls s-py-60 s-py-xl-90 landing-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="color-darkgrey">{{ __('coffee_break.intro.title') }}</h2>
                    <p class="fs-20">{{ __('coffee_break.intro.text') }}</p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('img/coffee-break/coffee-break-intro.webp') }}" alt="{{ __('website.services.serviceTwo.title') }}" width="1600" height="901" loading="lazy" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="ms s-py-60 s-py-xl-90 landing-section">
        <div class="container">
            <h2 class="text-center color-darkgrey">{{ __('coffee_break.problems.title') }}</h2>
            <div class="row">
                @foreach (__('coffee_break.problems.items') as $item)
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
            <h2 class="text-center">{{ __('coffee_break.includes.title') }}</h2>
            <div class="row">
                @foreach (__('coffee_break.includes.items') as $item)
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
                    <img src="{{ asset('img/coffee-break/coffee-break-process.webp') }}" alt="{{ __('coffee_break.process.title') }}" width="1600" height="901" loading="lazy" class="img-fluid">
                </div>
                <div class="col-lg-7">
                    <h2 class="color-darkgrey">{{ __('coffee_break.process.title') }}</h2>
                    <ol class="process-steps">
                        @foreach (__('coffee_break.process.steps') as $step)
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

    <x-faq :title="__('coffee_break.faq.title')" :items="__('coffee_break.faq.items')" />

    <x-quote-form service="coffee-break" :image="$heroImage" />

    <x-json-ld :schema="$serviceSchema" />

</x-website-layout>
