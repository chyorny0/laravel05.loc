<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FirstMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailMessage, $from = "exampleFrom@tut.by", $fromName = "exampleName", $to = "exampleTo@tut.by")
    {
        $this->mailMessage = $mailMessage;
        $this->from = $from;
        $this->fromName = $fromName;
        $this->to = $to;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from($this->from, $this->fromName)
            ->to($this->to)
            ->with([
                'mailMessage' => $this->mailMessage
            ])
            ->view('emails.first');
    }
}
