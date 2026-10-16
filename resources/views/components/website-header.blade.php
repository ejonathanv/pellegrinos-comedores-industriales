@php
    $seo = \App\Support\Seo::class;
    $alternateLocale = $seo::alternateLocale();
    $currentPage = $seo::currentPage();
    $homeUrl = $seo::url('home');
    $contactUrl = $seo::url('contact');
    $servicePages = ['industrial_dining', 'coffee_break', 'corporate_catering'];

    $navItems = [
        ['label' => __('website.nav.home'), 'url' => $homeUrl, 'active' => $currentPage === 'home'],
        [
            'label' => __('website.nav.services'),
            'url' => $homeUrl . '#services',
            'active' => in_array($currentPage, $servicePages, true),
            'children' => [
                ['label' => __('website.nav.industrial_dining'), 'url' => $seo::url('industrial_dining'), 'active' => $currentPage === 'industrial_dining'],
                ['label' => __('website.nav.coffee_break'), 'url' => $seo::url('coffee_break'), 'active' => $currentPage === 'coffee_break'],
                ['label' => __('website.nav.corporate_catering'), 'url' => $seo::url('corporate_catering'), 'active' => $currentPage === 'corporate_catering'],
            ],
        ],
        ['label' => __('website.nav.about'), 'url' => $homeUrl . '#about', 'active' => false],
        ['label' => __('website.nav.clients'), 'url' => $homeUrl . '#clients', 'active' => false],
        ['label' => __('website.nav.contact'), 'url' => $contactUrl, 'active' => $currentPage === 'contact'],
    ];
@endphp
<div class="header_absolute ds cover-background ">
    <header class="page_header ds ms s-overlay">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-3 col-1">
                    <a href="{{ $homeUrl }}" class="logo">
                        <img src="{{ asset('img/pellegrinos_comedores_industriales_logo_blanco.svg') }}" alt="{{ config('business.name') }}" width="500" height="354">
                    </a>
                </div>
                <div class="col-xl-7 col-lg-5 col-4 header-nav-col">
                    <!-- main nav start -->
                    <nav class="top-nav">
                        <ul class="nav sf-menu">
                            @foreach ($navItems as $item)
                            <li @class(['active' => $item['active']])>
                                <a href="{{ $item['url'] }}" @if ($item['active'] && empty($item['children'])) aria-current="page" @endif>
                                    {{ $item['label'] }}
                                </a>
                                @if (! empty($item['children']))
                                <ul>
                                    @foreach ($item['children'] as $child)
                                    <li @class(['active' => $child['active']])>
                                        <a href="{{ $child['url'] }}" @if ($child['active']) aria-current="page" @endif>
                                            {{ $child['label'] }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                            <li class="nav-quote">
                                <a href="{{ $contactUrl }}" class="btn btn-maincolor nav-quote-btn">
                                    {{ __('website.nav.quote') }}
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- eof main nav -->
                </div>

                <div class="col-xl-1 col-lg-4 col-4 text-right">
                    <a href="{{ $seo::url($currentPage, $alternateLocale) }}"
                        hreflang="{{ config("seo.locales.{$alternateLocale}.hreflang") }}"
                        lang="{{ config("seo.locales.{$alternateLocale}.html_lang") }}">
                        <i class="fa fa-globe"></i>
                        <span class="d-none d-lg-inline">
                            {{ $alternateLocale === 'en' ? 'English' : 'Español' }}
                        </span>
                    </a>
                </div>

                <div class="col-xl-2 col-lg-3 col-4 text-right d-none d-lg-block social-media-icons header-social-col">
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
