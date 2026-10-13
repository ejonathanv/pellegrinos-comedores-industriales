@props(['title', 'breadcrumb', 'subtitle' => null])
<section class="page_title ds s-overlay s-parallax page-hero">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>{{ $title }}</h1>
                @if ($subtitle)
                    <p class="page-hero-subtitle">{{ $subtitle }}</p>
                @endif
                {{ $slot }}
                <x-breadcrumbs :label="$breadcrumb" />
            </div>
        </div>
    </div>
</section>
