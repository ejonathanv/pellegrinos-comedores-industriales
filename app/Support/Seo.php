<?php

namespace App\Support;

use Illuminate\Support\Facades\Route;

class Seo
{
    public static function locales(): array
    {
        return array_keys(config('seo.locales'));
    }

    public static function routeName(string $page, string $locale): string
    {
        return "{$locale}.{$page}";
    }

    public static function path(string $page, string $locale): string
    {
        $prefix = config("seo.locales.{$locale}.prefix");
        $path = trim(config("seo.pages.{$page}.{$locale}.path"), '/');

        return '/' . trim($prefix . '/' . $path, '/');
    }

    public static function url(string $page, ?string $locale = null): string
    {
        $path = self::path($page, $locale ?? app()->getLocale());

        return $path === '/' ? url('/') . '/' : url($path);
    }

    public static function currentPage(): string
    {
        $name = Route::currentRouteName();

        if ($name && str_contains($name, '.')) {
            [, $page] = explode('.', $name, 2);

            if (config("seo.pages.{$page}")) {
                return $page;
            }
        }

        return 'home';
    }

    public static function meta(?string $page = null, ?string $locale = null): array
    {
        $page ??= self::currentPage();
        $locale ??= app()->getLocale();

        return config("seo.pages.{$page}.{$locale}") + [
            'image' => config("seo.pages.{$page}.image", config('seo.default_image')),
        ];
    }

    public static function alternateLocale(?string $locale = null): string
    {
        $locale ??= app()->getLocale();

        return collect(self::locales())->first(fn ($l) => $l !== $locale);
    }
}
