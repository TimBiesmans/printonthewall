<?php

namespace App\Mail;

use App\Models\QuoteRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuoteDocumentLinkMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public QuoteRequest $quote,
        public string $publicUrl,
    ) {}

    public function envelope(): Envelope
    {
        // Pas aan naar je eigen env keys
        $fromEmail = config('mail.from.address', 'no-reply@example.com');
        $fromName  = config('mail.from.name', 'Print on the wall');

        // Reply-to (optioneel, maar "enterprise" voelt beter)
        $replyToEmail = config('potw.mail.reply_to.address', $fromEmail);
        $replyToName  = config('potw.mail.reply_to.name', $fromName);

        return new Envelope(
            from: new Address($fromEmail, $fromName),
            replyTo: [new Address($replyToEmail, $replyToName)],
            subject: "Je offerte is klaar – Print on the wall",
            tags: ['potw', 'quote', 'document-link'],
            metadata: [
                'quote_id' => (string) $this->quote->id,
                'customer_email' => (string) $this->quote->email,
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.quotes.document_link',
            with: [
                'quote' => $this->quote,
                'publicUrl' => $this->publicUrl,
                'brandName' => config('app.name', 'Print on the wall'),
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}