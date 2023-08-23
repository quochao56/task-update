<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use QH\Product\Models\Sale\Sale;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public Sale $sale;
    /**
     * Create a new message instance.
     */
    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        $recipientEmail = $this->sale->customer->email;

    if (!empty($recipientEmail)) {
        return $this->subject('Order Confirmation')
            ->to($recipientEmail)
            ->view('mail.order')
            ->with(['sale' => $this->sale]);
    } else {
        // Handle the case where the email address is empty or null
        // You can log an error or take appropriate action here.
    }
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
