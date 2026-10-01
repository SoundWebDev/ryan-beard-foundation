<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactSubmissionNotification extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(public array $contactData)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Contact Form Submission: '.$this->contactData['subject'],
            replyTo: [new Address($this->contactData['email'], $this->contactData['name'])],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact.submission',
            with: ['contact' => $this->contactData],
        );
    }
}
