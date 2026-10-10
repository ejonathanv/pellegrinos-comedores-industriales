<!DOCTYPE html>
<html lang="{{ config('seo.locales.' . app()->getLocale() . '.html_lang') }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<x-seo-head />
	<x-json-ld-business />

	<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/favicon/apple-icon-57x57.png') }}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/favicon/apple-icon-60x60.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicon/apple-icon-72x72.png') }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/favicon/apple-icon-76x76.png') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicon/apple-icon-114x114.png') }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicon/apple-icon-120x120.png') }}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/favicon/apple-icon-144x144.png') }}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/favicon/apple-icon-152x152.png') }}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-icon-180x180.png') }}">
	<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('img/favicon/android-icon-192x192.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon/favicon-96x96.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
	<link rel="manifest" href="{{ asset('img/favicon/manifest.json') }}">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="{{ asset('img/favicon/ms-icon-144x144.png') }}">
	<meta name="theme-color" content="#ffffff">

	<link rel="preload" as="image" href="{{ asset('img/portadas/slide1.webp') }}" fetchpriority="high">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/animations.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
	<link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}" class="color-switcher-link">
	{!! NoCaptcha::renderJs(app()->getLocale()) !!}
	<script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
	<script src="https://kit.fontawesome.com/133291f590.js" crossorigin="anonymous" defer></script>
	<x-analytics />
</head>
<body>
	<div class="preloader">
		<div class="preloader_image pulse"></div>
	</div>
	<div id="canvas">
		<div id="box_wrapper">
			<x-website-header />
			{{ $slot }}
			<x-website-footer />
		</div>
	</div>
	<script src="{{ asset('js/compressed.js') }}" defer></script>
	<script src="{{ asset('js/main.js') }}" defer></script>
	<script src="{{ asset('js/lazy-media.js') }}" defer></script>
	<script src="{{ asset('js/tracking.js') }}" defer></script>
	@if (session('lead_submitted'))
		<script>
			document.addEventListener('DOMContentLoaded', function () {
				window.pellegrinosTrack('generate_lead', { form_name: 'contact' });
			});
		</script>
	@endif
</body>
</html>
