<?php

namespace App\Mail;

use App\Models\Customer;
use App\Models\Doctor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BirthdayReminderPersonalizedMail extends Mailable
{
    use Queueable, SerializesModels;

    private string $frequency;
    private object $birthdays;

    /**
     * Create a new message instance.
     */
    public function __construct(string $frequency, object $birthdays)
    {
        //
        $this->frequency = $frequency;
        $this->birthdays = $birthdays;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {

        $subject = match($this->frequency) {
            "month", "monthly" => "Os aniversários deste mês!",
            "week", "weekly" => "Os aniversários desta semana",
            default => "Os aniversários de hoje"
        };

        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.birthdays.reminders.' . $this->frequency,
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
