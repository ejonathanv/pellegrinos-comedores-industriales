<?php

namespace App\Http\Controllers;

use App\Support\Seo;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    public function sitemap(): Response
    {
        $entries = [];

        foreach (config('seo.pages') as $page => $definition) {
            $alternates = collect(Seo::locales())->mapWithKeys(fn ($locale) => [
                config("seo.locales.{$locale}.hreflang") => Seo::url($page, $locale),
            ]);
            $alternates['x-default'] = Seo::url($page, config('seo.default_locale'));

            foreach (Seo::locales() as $locale) {
                $entries[] = [
                    'loc' => Seo::url($page, $locale),
                    'changefreq' => $definition['changefreq'] ?? 'monthly',
                    'priority' => $definition['priority'] ?? '0.5',
                    'alternates' => $alternates,
                ];
            }
        }

        return response()
            ->view('seo.sitemap', ['entries' => $entries])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function robots(): Response
    {
        $lines = [
            'User-agent: *',
            'Disallow:',
            '',
            'Sitemap: ' . route('sitemap'),
        ];

        return response(implode("\n", $lines) . "\n")
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}
