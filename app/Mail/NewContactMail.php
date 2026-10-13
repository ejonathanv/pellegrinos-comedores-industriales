<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $lead;

    public function __construct(array $lead)
    {
        $this->lead = $lead;
        $this->locale = 'es';
    }

    public function envelope(): Envelope
    {
        $service = __('website.quote.services.' . $this->lead['service'], [], 'es');

        return new Envelope(
            replyTo: [new Address($this->lead['email'], $this->lead['name'])],
            subject: "Nueva solicitud de cotización: {$service} - {$this->lead['company']}",
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mails.new-contact-mail',
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
