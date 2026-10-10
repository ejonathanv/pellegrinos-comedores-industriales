@php
    $alternateLocale = \App\Support\Seo::alternateLocale();
@endphp
<div class="header_absolute ds cover-background ">
    <header class="page_header ds ms s-overlay">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-3 col-1">
                    <a href="{{ \App\Support\Seo::url('home') }}" class="logo">
                        <img src="{{ asset('img/pellegrinos_comedores_industriales_logo_blanco.svg') }}" alt="{{ config('business.name') }}" width="500" height="354">
                    </a>
                </div>
                <div class="col-xl-6 col-lg-5 col-4">
                    <!-- main nav start -->
                    <nav class="top-nav">
                        <ul class="nav sf-menu">
                            <li>
                                <a href="#home">
                                    {{ __('website.nav.home') }}
                                </a>
                            </li>
                            <li>
                                <a href="#about">
                                    {{ __('website.nav.about') }}
                                </a>
                            </li>
                            <li>
                                <a href="#services">
                                    {{ __('website.nav.services') }}
                                </a>
                            </li>
                            <li>
                                <a href="#gallery">
                                    {{ __('website.nav.gallery') }}
                                </a>
                            </li>
                            <li>
                                <a href="#clients">
                                    {{ __('website.nav.clients') }}
                                </a>
                            </li>
                            <li>
                                <a href="#contact">
                                    {{ __('website.nav.contact') }}
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- eof main nav -->
                </div>

                <div class="col-xl-2 col-lg-4 col-4 text-right">
                    <a href="{{ \App\Support\Seo::url(\App\Support\Seo::currentPage(), $alternateLocale) }}"
                        hreflang="{{ config("seo.locales.{$alternateLocale}.hreflang") }}"
                        lang="{{ config("seo.locales.{$alternateLocale}.html_lang") }}">
                        <i class="fa fa-globe"></i>
                        <span class="d-none d-lg-inline">
                            {{ $alternateLocale === 'en' ? 'English' : 'Español' }}
                        </span>
                    </a>
                </div>

                <div class="col-xl-2 col-lg-3 col-4 text-right d-none d-lg-block social-media-icons">
                    <a href="{{ config('business.social.facebook') }}"
                        target="_blank"
                        rel="noopener"
                        aria-label="Facebook"
                        style="color: #6382c4">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="{{ config('business.social.instagram') }}"
                        target="_blank"
                        rel="noopener"
                        aria-label="Instagram"
                        style="color: #E66490">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="{{ config('business.social.whatsapp') }}"
                        target="_blank"
                        rel="noopener"
                        aria-label="WhatsApp"
                        data-track="click_whatsapp"
                        style="color: #25d366">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>

                <span class="toggle_menu"><span></span></span>
            </div>
        </div>
    </header>
</div>
