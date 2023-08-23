<?php

namespace App\Mail;

use App\Models\Campaign;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BirthdayEmail extends Mailable
{
    use Queueable, SerializesModels;

    private object $customer;

    /**
     * Create a new message instance.
     */
    public function __construct(object $customer)
    {
        //
        $this->customer = $customer;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Feliz aniversário!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $campaign = Campaign::find(1);

        return new Content(
            htmlString: $campaign->htmlContent,
            with: ['customer' => $this->customer]
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
