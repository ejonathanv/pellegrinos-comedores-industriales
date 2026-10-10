@php
    $business = config('business');
    $homeUrl = \App\Support\Seo::url('home', config('seo.default_locale'));

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        '@id' => $homeUrl . '#business',
        'name' => $business['name'],
        'legalName' => $business['legal_name'],
        'url' => $homeUrl,
        'logo' => asset($business['logo']),
        'image' => asset(config('seo.default_image')),
        'description' => \App\Support\Seo::meta('home')['description'],
        'telephone' => $business['phone'],
        'email' => $business['email'],
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => $business['address']['street'],
            'postalCode' => $business['address']['postal_code'],
            'addressLocality' => $business['address']['city'],
            'addressRegion' => $business['address']['region'],
            'addressCountry' => $business['address']['country'],
        ],
        'areaServed' => [
            '@type' => 'City',
            'name' => $business['area_served'],
        ],
        'sameAs' => [
            $business['social']['facebook'],
            $business['social']['instagram'],
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) !!}</script>
