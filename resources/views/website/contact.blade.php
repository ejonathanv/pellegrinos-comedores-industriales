@php
    $heroImage = 'img/portadas/comedor-industrial-hero.webp';
@endphp
<x-website-layout :footer-image="$heroImage">

    <x-page-hero
        :title="__('website.contact_page.title')"
        :subtitle="__('website.contact_page.intro')"
        :breadcrumb="__('website.nav.contact')"
        :image="$heroImage" />

    <x-quote-form :image="$heroImage" />

</x-website-layout>
