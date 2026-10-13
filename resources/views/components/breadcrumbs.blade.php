@props(['label'])
@php
    $seo = \App\Support\Seo::class;
    $items = [
        ['name' => __('website.nav.home'), 'url' => $seo::url('home')],
        ['name' => $label, 'url' => $seo::url($seo::currentPage())],
    ];

    $schema = [
        '@type' => 'BreadcrumbList',
        'itemListElement' => collect($items)->map(fn ($item, $index) => [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $item['name'],
            'item' => $item['url'],
        ])->all(),
    ];
@endphp
<nav aria-label="{{ __('website.nav.breadcrumb') }}">
    <ol class="breadcrumb">
        @foreach ($items as $item)
            @if ($loop->last)
                <li class="breadcrumb-item active" aria-current="page">{{ $item['name'] }}</li>
            @else
                <li class="breadcrumb-item"><a href="{{ $item['url'] }}">{{ $item['name'] }}</a></li>
            @endif
        @endforeach
    </ol>
</nav>
<x-json-ld :schema="$schema" />
