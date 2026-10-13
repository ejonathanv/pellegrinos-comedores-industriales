@php
    $business = config('business');
@endphp
<x-website-layout>

    <x-page-hero
        :title="__('website.contact_page.title')"
        :subtitle="__('website.contact_page.intro')"
        :breadcrumb="__('website.nav.contact')"
        image="img/portadas/comedor-industrial-hero.webp" />

    <x-quote-form />

    <section class="ms s-py-60 landing-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="color-darkgrey">{{ __('website.contact_page.direct') }}</h2>
                    <p class="fs-20">{{ __('website.contact_page.direct_text') }}</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <ul class="contact-direct">
                        <li>
                            <i class="fab fa-whatsapp" aria-hidden="true"></i>
                            <a href="{{ $business['social']['whatsapp'] }}" target="_blank" rel="noopener" data-track="click_whatsapp">
                                {{ __('website.contact_page.whatsapp') }}: {{ $business['phone_display'] }}
                            </a>
                        </li>
                        <li>
                            <i class="fas fa-phone" aria-hidden="true"></i>
                            <a href="tel:{{ $business['phone'] }}" data-track="click_phone">
                                {{ __('website.contact.phone') }}: {{ $business['phone_display'] }}
                            </a>
                        </li>
                        <li>
                            <i class="fas fa-envelope" aria-hidden="true"></i>
                            <a href="mailto:{{ $business['email'] }}" data-track="click_email">
                                {{ $business['email'] }}
                            </a>
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                            <span>{{ $business['address']['locality_display'] }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

</x-website-layout>
