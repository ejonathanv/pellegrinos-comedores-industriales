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

</x-website-layout>
