<?php

/*
| Páginas públicas del sitio por idioma. Las rutas, el head (title, description,
| canonical, hreflang, Open Graph) y el sitemap se generan desde aquí.
*/

return [
    'default_locale' => 'es',

    'locales' => [
        'es' => ['prefix' => '', 'hreflang' => 'es-MX', 'html_lang' => 'es-MX', 'og_locale' => 'es_MX'],
        'en' => ['prefix' => 'en', 'hreflang' => 'en', 'html_lang' => 'en', 'og_locale' => 'en_US'],
    ],

    'default_image' => 'img/og/pellegrinos-og.jpg',

    'pages' => [
        'home' => [
            'action' => [App\Http\Controllers\WebsiteController::class, 'index'],
            'changefreq' => 'monthly',
            'priority' => '1.0',
            'es' => [
                'path' => '/',
                'title' => "Comedores industriales en Tijuana para empresas | Pellegrino's",
                'description' => 'Comedor industrial, coffee break y catering corporativo en Tijuana. Servicio local desde Ciudad Industrial con REPSE y personal capacitado. Solicita tu cotización.',
            ],
            'en' => [
                'path' => '/',
                'title' => "Industrial Dining Services in Tijuana for Companies | Pellegrino's",
                'description' => 'Industrial dining, coffee break and corporate catering in Tijuana. Local service from Ciudad Industrial with REPSE registration and trained staff. Request a quote.',
            ],
        ],
    ],
];
