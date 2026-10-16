<?php

namespace Tests\Feature;

use Anhskohbo\NoCaptcha\Facades\NoCaptcha;
use App\Mail\ContactMail;
use App\Mail\NewContactMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class QuoteFormTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Mail::fake();
        NoCaptcha::shouldReceive('verifyResponse')->andReturn(true);
        NoCaptcha::shouldReceive('display', 'renderJs')->andReturn('');
        config(['mail.contact_address' => 'ventas@example.com']);
    }

    private function payload(array $overrides = []): array
    {
        return array_merge([
            'company' => 'Planta Ejemplo',
            'name' => 'Ana López',
            'phone' => '6641234567',
            'email' => 'ana@example.com',
            'service' => 'comedor',
            'people' => '101-250',
            'shifts' => '2 turnos',
            'location' => 'Parque Industrial El Florido',
            'kitchen' => 'si',
            'locale' => 'es',
            'source_page' => 'industrial_dining',
            'g-recaptcha-response' => 'token',
        ], $overrides);
    }

    public function test_required_fields_are_validated(): void
    {
        $this->from('/contacto')
            ->post('/contact-to-pellegrinos', ['locale' => 'es'])
            ->assertRedirect('http://localhost/contacto#contact')
            ->assertSessionHasErrors(['company', 'name', 'phone', 'email', 'service', 'people', 'location', 'g-recaptcha-response']);

        Mail::assertNothingSent();
    }

    public function test_shifts_are_required_for_industrial_dining(): void
    {
        $this->post('/contact-to-pellegrinos', $this->payload(['shifts' => '']))
            ->assertSessionHasErrors('shifts')
            ->assertSessionDoesntHaveErrors('event_date');
    }

    public function test_event_date_is_required_for_catering_and_coffee_break(): void
    {
        foreach (['catering', 'coffee-break'] as $service) {
            $this->post('/contact-to-pellegrinos', $this->payload(['service' => $service, 'shifts' => '']))
                ->assertSessionHasErrors('event_date')
                ->assertSessionDoesntHaveErrors('shifts');
        }
    }

    public function test_successful_request_returns_to_the_source_page(): void
    {
        $this->post('/contact-to-pellegrinos', $this->payload())
            ->assertSessionHasNoErrors()
            ->assertRedirect('http://localhost/comedores-industriales-tijuana#contact')
            ->assertSessionHas('lead_submitted', ['service' => 'comedor', 'source_page' => 'industrial_dining']);

        $this->post('/contact-to-pellegrinos', $this->payload([
            'service' => 'coffee-break',
            'shifts' => '',
            'event_date' => now()->addWeek()->toDateString(),
            'source_page' => 'coffee_break',
        ]))
            ->assertSessionHasNoErrors()
            ->assertRedirect('http://localhost/coffee-break-empresarial-tijuana#contact')
            ->assertSessionHas('lead_submitted', ['service' => 'coffee-break', 'source_page' => 'coffee_break']);

        $this->post('/contact-to-pellegrinos', $this->payload([
            'service' => 'catering',
            'shifts' => '',
            'event_date' => now()->addWeek()->toDateString(),
            'source_page' => 'corporate_catering',
        ]))
            ->assertSessionHasNoErrors()
            ->assertRedirect('http://localhost/catering-corporativo-tijuana#contact')
            ->assertSessionHas('lead_submitted', ['service' => 'catering', 'source_page' => 'corporate_catering']);

        $this->post('/contact-to-pellegrinos', $this->payload(['locale' => 'en', 'source_page' => 'contact']))
            ->assertRedirect('http://localhost/en/contact#contact');
    }

    public function test_team_email_includes_qualified_fields(): void
    {
        $this->post('/contact-to-pellegrinos', $this->payload());

        Mail::assertSent(NewContactMail::class, function (NewContactMail $mail) {
            $mail->assertSeeInHtml('Planta Ejemplo');
            $mail->assertSeeInHtml('Comedor industrial');
            $mail->assertSeeInHtml('101 a 250 personas');
            $mail->assertSeeInHtml('2 turnos');
            $mail->assertSeeInHtml('Parque Industrial El Florido');
            $mail->assertSeeInHtml('http://localhost/comedores-industriales-tijuana');

            return $mail->hasTo('ventas@example.com') && $mail->hasReplyTo('ana@example.com');
        });

        Mail::assertSent(ContactMail::class, function (ContactMail $mail) {
            $mail->assertSeeInHtml('Hola Ana López');
            $mail->assertSeeInHtml('Comedor industrial');

            return $mail->hasTo('ana@example.com') && $mail->locale === 'es';
        });
    }

    public function test_generate_lead_event_includes_service(): void
    {
        $this->withSession(['lead_submitted' => ['service' => 'catering', 'source_page' => 'contact']])
            ->get('/contacto')
            ->assertSee('"service":"catering"', false)
            ->assertSee('"source_page":"contact"', false);
    }
}
