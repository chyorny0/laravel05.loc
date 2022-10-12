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
    public function __construct($mailMessage)
    {
        $this->mailMessage = $mailMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from('adsdcf@tut.by', 'Artemi A.')
            ->to('adcwcw@tut.by')
            ->cc(['sdcsd@tut.by'])
            ->with([
                'message2' => 'dsfsrrsf',
                'mailMessage' => $this->mailMessage
            ])
            ->view('emails.first');
//        return $this->view('view.name');
    }
}
