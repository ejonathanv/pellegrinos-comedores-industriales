<?php

namespace App\Http\Middleware;

use App\Support\Seo;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Fija el idioma desde el parámetro de la ruta o, en formularios, desde el campo "locale".
     */
    public function handle(Request $request, Closure $next, ?string $locale = null): Response
    {
        $locale ??= $request->input('locale');

        app()->setLocale(in_array($locale, Seo::locales(), true) ? $locale : config('seo.default_locale'));

        return $next($request);
    }
}
