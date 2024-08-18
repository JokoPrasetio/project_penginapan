<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifMail extends Mailable
{
    use Queueable, SerializesModels;

    public $notifMail;
    /**
     * Create a new message instance.
     */
    public function __construct($notifMail)
    {
        $this->notifMail = $notifMail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pemesanan Makanan ',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build(){
        return $this->view('mail.pesanan')->subject('Pemesanan Makanan')->with('payload', $this->notifMail);
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
