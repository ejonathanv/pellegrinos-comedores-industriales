<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;
    public $locale;

    /**
     * Create a new message instance.
     */
    public function __construct($request)
    {
        $this->request = $request;
        $this->locale = session()->get('locale') ? session()->get('locale') : 'es';
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        // Si la sesion es "es" entonces el subject sera "Gracias por contactarnos - Pellegrinos Comedores Industriales"
        if($this->locale == 'es'){
            return new Envelope(
                subject: 'Gracias por contactarnos - Pellegrinos Comedores Industriales',
            );
        }

        // Si la sesion es "en" entonces el subject sera "Contact Mail"
        return new Envelope(
            subject: 'Thank you for contacting us - Pellegrinos Comedores Industriales',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.contact-mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
