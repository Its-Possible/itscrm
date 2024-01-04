<?php

namespace App\Mail;

use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BirthdayPersonalizedMail extends Mailable
{
    use Queueable, SerializesModels;

    private string|null $body;
    private string $layout;
    private Customer $customer;

    /**
     * Create a new message instance.
     */
    public function __construct(string $layout, Customer $customer, string $body = null)
    {
        //
        $this->body = $body;
        $this->layout = $layout;
        $this->customer = $customer;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'A Clinica Mais deseja-lhe um feliz aniversário',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.birthdays.'. $this->layout,
            with: [
                "customer" => $this->customer
            ]
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
