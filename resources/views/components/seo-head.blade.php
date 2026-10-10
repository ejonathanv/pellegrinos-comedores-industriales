@php
    $seo = \App\Support\Seo::class;

    $page = $seo::currentPage();
    $locale = app()->getLocale();
    $meta = $seo::meta($page, $locale);
    $canonical = $seo::url($page, $locale);
    $image = asset($meta['image']);
@endphp
<title>{{ $meta['title'] }}</title>
<meta name="description" content="{{ $meta['description'] }}">
<meta name="author" content="{{ config('business.legal_name') }}">
<link rel="canonical" href="{{ $canonical }}">

@foreach ($seo::locales() as $alternate)
<link rel="alternate" hreflang="{{ config("seo.locales.{$alternate}.hreflang") }}" href="{{ $seo::url($page, $alternate) }}">
@endforeach
<link rel="alternate" hreflang="x-default" href="{{ $seo::url($page, config('seo.default_locale')) }}">

<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ config('business.name') }}">
<meta property="og:title" content="{{ $meta['title'] }}">
<meta property="og:description" content="{{ $meta['description'] }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $image }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:locale" content="{{ config("seo.locales.{$locale}.og_locale") }}">
@foreach ($seo::locales() as $alternate)
@continue($alternate === $locale)
<meta property="og:locale:alternate" content="{{ config("seo.locales.{$alternate}.og_locale") }}">
@endforeach

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $meta['title'] }}">
<meta name="twitter:description" content="{{ $meta['description'] }}">
<meta name="twitter:image" content="{{ $image }}">

@if (config('services.google.site_verification'))
<meta name="google-site-verification" content="{{ config('services.google.site_verification') }}">
@endif
