<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class ContactoMail extends Mailable
{
    public function __construct(public array $datos) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->datos['asunto'],
            replyTo: [new Address($this->datos['correo'], $this->datos['nombre'])],
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.contacto');
    }
}