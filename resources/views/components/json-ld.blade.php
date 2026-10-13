@props(['schema'])
<script type="application/ld+json">{!! json_encode(['@context' => 'https://schema.org'] + $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) !!}</script>
