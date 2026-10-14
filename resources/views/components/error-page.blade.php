@props(['code'])
@php
    $locale = request()->segment(1) === 'en' || request()->input('locale') === 'en' ? 'en' : config('seo.default_locale');
    app()->setLocale($locale);

    $error = __("errors.codes.{$code}");
@endphp
<x-website-layout :error-title="$error['title']">

    <section class="page_title ds s-overlay page-hero error-hero"
        style="background-image: url('{{ asset('img/portadas/comedor-industrial-hero.webp') }}');">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    @if (is_numeric($code))
                        <p class="error-code">{{ $code }}</p>
                    @endif
                    <h1>{{ $error['title'] }}</h1>
                    <p class="page-hero-subtitle">{{ $error['message'] }}</p>
                    <div class="hero-actions">
                        <a href="{{ \App\Support\Seo::url('home') }}" class="btn btn-maincolor">
                            {{ __('errors.back_home') }}
                        </a>
                        <a href="{{ \App\Support\Seo::url('contact') }}" class="btn btn-outline-light">
                            {{ __('errors.contact') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-website-layout>
