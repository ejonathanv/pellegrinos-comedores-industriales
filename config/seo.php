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
                'title' => "Comedor industrial, coffee break y catering en Tijuana | Pellegrino's",
                'description' => 'Comedor industrial, coffee break y catering corporativo en Tijuana. Servicio local desde Ciudad Industrial con REPSE y personal capacitado. Solicita tu cotización.',
            ],
            'en' => [
                'path' => '/',
                'title' => "Industrial Dining, Coffee Break and Catering in Tijuana | Pellegrino's",
                'description' => 'Industrial dining, coffee break and corporate catering in Tijuana. Local service from Ciudad Industrial with REPSE registration and trained staff. Request a quote.',
            ],
        ],

        'industrial_dining' => [
            'action' => [App\Http\Controllers\WebsiteController::class, 'industrialDining'],
            'changefreq' => 'monthly',
            'priority' => '0.9',
            'es' => [
                'path' => 'comedores-industriales-tijuana',
                'title' => "Comedores industriales en Tijuana para empresas | Pellegrino's",
                'description' => 'Servicio de comedor industrial en Tijuana para plantas y empresas: diagnóstico de tu operación, propuesta de menú y seguimiento. REPSE y personal capacitado. Cotiza hoy.',
            ],
            'en' => [
                'path' => 'industrial-dining-tijuana',
                'title' => "Industrial Dining Services in Tijuana for Companies | Pellegrino's",
                'description' => 'Industrial dining service in Tijuana for plants and companies: assessment of your operation, menu proposal and follow-up. REPSE registered, trained staff. Get a quote.',
            ],
        ],

        'contact' => [
            'action' => [App\Http\Controllers\WebsiteController::class, 'contact'],
            'changefreq' => 'yearly',
            'priority' => '0.7',
            'es' => [
                'path' => 'contacto',
                'title' => "Solicita una cotización de comedor o catering en Tijuana | Pellegrino's",
                'description' => 'Cuéntanos cuántas personas atiendes, tus turnos y la ubicación de tu planta. Preparamos una propuesta de comedor industrial, coffee break o catering en Tijuana.',
            ],
            'en' => [
                'path' => 'contact',
                'title' => "Request a Dining or Catering Quote in Tijuana | Pellegrino's",
                'description' => 'Tell us how many people you serve, your shifts and your plant location. We prepare a proposal for industrial dining, coffee break or catering in Tijuana.',
            ],
        ],
    ],
];
