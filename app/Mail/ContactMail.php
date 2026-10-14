<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $lead;

    public function __construct(array $lead)
    {
        $this->lead = $lead;
        $this->locale = $lead['locale'] ?? app()->getLocale();
    }

    public function envelope(): Envelope
    {
        $subject = $this->locale === 'es'
            ? "Recibimos tu solicitud de cotización - Pellegrino's Comedores Industriales"
            : "We received your quote request - Pellegrino's Comedores Industriales";

        return new Envelope(subject: $subject);
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mails.contact-mail',
            with: ['locale' => $this->locale],
        );
    }

    /**
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
