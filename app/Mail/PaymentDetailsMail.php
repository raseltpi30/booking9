<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentDetailsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $newData;

    /**
     * Create a new message instance.
     */
    public function __construct($validatedData)
    {
        $this->newData = $validatedData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // subject: 'Invoice Ecommerce From OneTechBD Mail',
            subject: 'New simple mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.payment_details',
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

// <?php

// namespace App\Mail;

// use Illuminate\Bus\Queueable;
// use Illuminate\Mail\Mailable;
// use Illuminate\Queue\SerializesModels;

// class PaymentDetailsMail extends Mailable
// {
//     use Queueable, SerializesModels;

//     public $data;

//     /**
//      * Create a new message instance.
//      *
//      * @param array $data
//      * @return void
//      */
//     public function __construct(array $data)
//     {
//         $this->data = $data;
//     }

//     /**
//      * Build the message.
//      *
//      * @return $this
//      */
//     public function build()
//     {
//         return $this->view('emails.payment_details')
//             ->with('data', $this->data)
//             ->subject('Payment Details');
//     }
// }
