<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CampaignCustomizedMail extends Mailable
{
    use Queueable, SerializesModels;

    private User $user;
    public $subject;
    private string $htmlContent;
    private string $textContent;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, string $subject, string $htmlContent, string $textContent)
    {
        //
        $this->user = $user;
        $this->subject = $subject;
        $this->htmlContent = $htmlContent;
        $this->textContent = $textContent;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.campaigns.custom',
            with: [
                'user' => $this->user,
                'htmlContent' => $this->htmlContent,
                'textContent' => $this->textContent
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
