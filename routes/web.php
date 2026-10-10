<?php

use App\Http\Controllers\SeoController;
use App\Http\Controllers\WebsiteController;
use App\Http\Middleware\SetLocale;
use App\Support\Seo;
use Illuminate\Support\Facades\Route;

foreach (Seo::locales() as $locale) {
    Route::middleware(SetLocale::class . ':' . $locale)->group(function () use ($locale) {
        foreach (config('seo.pages') as $page => $definition) {
            Route::get(Seo::path($page, $locale), $definition['action'])
                ->name(Seo::routeName($page, $locale));
        }
    });
}

Route::get('/setlocale/{locale}', function (string $locale) {
    return redirect(Seo::url('home', in_array($locale, Seo::locales(), true) ? $locale : config('seo.default_locale')), 301);
});

Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [SeoController::class, 'robots'])->name('robots');

Route::post('/contact-to-pellegrinos', [WebsiteController::class, 'contactToPellegrinos'])
    ->middleware(SetLocale::class)
    ->name('contact-to-pellegrinos');
