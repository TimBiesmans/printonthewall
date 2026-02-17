<?php

namespace App\Mail;

use App\Models\QuoteRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuoteRequestReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public QuoteRequest $quote
    ) {}

    /**
     * Mail subject / envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nieuwe offerte-aanvraag - Print on the wall',
        );
    }

    /**
     * Mail view
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.quote_request_received',
            with: [
                'quote' => $this->quote,
            ],
        );
    }

    /**
     * Attachments
     */
    public function attachments(): array
    {
        return [];
    }
}