<?php

namespace Tests\Feature;

use Tests\TestCase;

class SeoTest extends TestCase
{
    public function test_home_in_spanish_has_seo_head(): void
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('<html lang="es-MX">', false)
            ->assertSee('<title>Comedor industrial, coffee break y catering en Tijuana', false)
            ->assertSee('<h1 class="hero-title">', false)
            ->assertSee('<link rel="canonical" href="http://localhost/">', false)
            ->assertSee('<meta property="og:locale" content="es_MX">', false)
            ->assertSee('Solicita tu cotización')
            ->assertDontSee('name="keywords"', false);
    }

    public function test_home_in_english_has_seo_head(): void
    {
        $response = $this->get('/en');

        $response->assertOk()
            ->assertSee('<html lang="en">', false)
            ->assertSee('<title>Industrial Dining, Coffee Break and Catering in Tijuana', false)
            ->assertSee('<link rel="canonical" href="http://localhost/en">', false)
            ->assertSee('<meta property="og:locale" content="en_US">', false)
            ->assertSee('Our Services');
    }

    public function test_both_languages_declare_hreflang_alternates(): void
    {
        foreach (['/', '/en'] as $path) {
            $this->get($path)
                ->assertSee('<link rel="alternate" hreflang="es-MX" href="http://localhost/">', false)
                ->assertSee('<link rel="alternate" hreflang="en" href="http://localhost/en">', false)
                ->assertSee('<link rel="alternate" hreflang="x-default" href="http://localhost/">', false);
        }
    }

    public function test_language_switcher_links_to_the_other_language(): void
    {
        $this->get('/')->assertSee('href="http://localhost/en"', false);
        $this->get('/en')->assertSee('href="http://localhost/"', false);
    }

    public function test_home_includes_local_business_structured_data(): void
    {
        $this->get('/')
            ->assertSee('<script type="application/ld+json">', false)
            ->assertSee('"@type":"LocalBusiness"', false)
            ->assertSee('"telephone":"+526643756259"', false);
    }

    public function test_sitemap_lists_both_languages(): void
    {
        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml; charset=UTF-8')
            ->assertSee('<loc>http://localhost/</loc>', false)
            ->assertSee('<loc>http://localhost/en</loc>', false)
            ->assertSee('hreflang="x-default"', false);
    }

    public function test_robots_points_to_sitemap(): void
    {
        $this->get('/robots.txt')
            ->assertOk()
            ->assertSee('User-agent: *')
            ->assertSee('Sitemap: http://localhost/sitemap.xml');
    }

    public function test_legacy_locale_route_redirects_permanently(): void
    {
        $this->get('/setlocale/en')->assertRedirect('http://localhost/en')->assertStatus(301);
        $this->get('/setlocale/es')->assertRedirect('http://localhost/')->assertStatus(301);
    }

    public function test_analytics_loads_only_with_measurement_id(): void
    {
        $this->get('/')->assertDontSee('googletagmanager.com', false);

        config(['services.google.analytics_id' => 'G-TEST123']);

        $this->get('/')->assertSee('googletagmanager.com/gtag/js?id=G-TEST123', false);
    }

    public function test_internal_pages_respond_in_both_languages_with_their_own_seo(): void
    {
        $pages = [
            '/comedores-industriales-tijuana' => ['es-MX', 'http://localhost/en/industrial-dining-tijuana'],
            '/en/industrial-dining-tijuana' => ['en', 'http://localhost/comedores-industriales-tijuana'],
            '/contacto' => ['es-MX', 'http://localhost/en/contact'],
            '/en/contact' => ['en', 'http://localhost/contacto'],
        ];

        foreach ($pages as $path => [$lang, $alternate]) {
            $this->get($path)
                ->assertOk()
                ->assertSee('<html lang="' . $lang . '">', false)
                ->assertSee('<link rel="canonical" href="http://localhost' . $path . '">', false)
                ->assertSee('href="' . $alternate . '"', false)
                ->assertSee('<h1>', false)
                ->assertSee('class="breadcrumb"', false);
        }
    }

    public function test_menu_links_to_new_pages_and_marks_the_active_one(): void
    {
        $this->get('/')
            ->assertSee('href="http://localhost/comedores-industriales-tijuana"', false)
            ->assertSee('href="http://localhost/contacto"', false)
            ->assertSee('href="http://localhost/#about"', false);

        $this->get('/comedores-industriales-tijuana')
            ->assertSee('aria-current="page"', false);
    }

    public function test_sitemap_lists_new_pages(): void
    {
        $this->get('/sitemap.xml')
            ->assertSee('<loc>http://localhost/comedores-industriales-tijuana</loc>', false)
            ->assertSee('<loc>http://localhost/en/industrial-dining-tijuana</loc>', false)
            ->assertSee('<loc>http://localhost/contacto</loc>', false)
            ->assertSee('<loc>http://localhost/en/contact</loc>', false);
    }

    public function test_industrial_dining_page_includes_structured_data(): void
    {
        $this->get('/comedores-industriales-tijuana')
            ->assertSee('"@type":"Service"', false)
            ->assertSee('"@id":"http://localhost/#business"', false)
            ->assertSee('"@type":"FAQPage"', false)
            ->assertSee('"@type":"BreadcrumbList"', false)
            ->assertSee('<option value="comedor" selected', false);
    }

    public function test_service_query_preselects_the_quote_form(): void
    {
        $this->get('/contacto?servicio=catering')
            ->assertSee('<option value="catering" selected', false);
    }

    public function test_site_verification_meta_uses_env_value(): void
    {
        config(['services.google.site_verification' => 'token-de-prueba']);

        $this->get('/')->assertSee('<meta name="google-site-verification" content="token-de-prueba">', false);
    }
}
