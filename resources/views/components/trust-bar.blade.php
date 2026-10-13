@php
    $items = [
        ['icon' => 'fa-map-marker-alt', 'text' => __('website.trust.local')],
        ['icon' => 'fa-file-signature', 'text' => __('website.trust.repse')],
        ['icon' => 'fa-user-check', 'text' => __('website.trust.training')],
        ['icon' => 'fa-whatsapp', 'text' => __('website.trust.whatsapp'), 'brand' => true, 'url' => config('business.social.whatsapp')],
    ];
@endphp
<section class="trust-bar ms">
    <div class="container">
        <ul class="trust-bar-list">
            @foreach ($items as $item)
                <li>
                    <i class="{{ ($item['brand'] ?? false) ? 'fab' : 'fas' }} {{ $item['icon'] }}" aria-hidden="true"></i>
                    @isset($item['url'])
                        <a href="{{ $item['url'] }}" target="_blank" rel="noopener" data-track="click_whatsapp">{!! nl2br(e($item['text']), false) !!}</a>
                    @else
                        <span>{!! nl2br(e($item['text']), false) !!}</span>
                    @endisset
                </li>
            @endforeach
        </ul>
    </div>
</section>
