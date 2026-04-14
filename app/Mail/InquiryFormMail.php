<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InquiryFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $companyName;
    public string $contactPerson;
    public string $phoneNumber;
    public string $location;
    public string $productName;
    public ?string $inquiryDescription;

    /**
     * Create a new message instance.
     */
    public function __construct(array $inquiryData)
    {
        $this->companyName = $inquiryData['company_name'];
        $this->contactPerson = $inquiryData['contact_person_name'];
        $this->phoneNumber = $inquiryData['phone_no'];
        $this->location = $inquiryData['location'];
        $this->productName = $inquiryData['product_name'];
        $this->inquiryDescription = $inquiryData['description'] ?? null;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Product Inquiry: ' . $this->productName,
            replyTo: [],
            from: config('mail.from.address'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.inquiry-form',
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
