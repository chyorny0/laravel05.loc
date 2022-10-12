<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class FirstJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $tries = 3;

    public $emailMessage;

    public function __construct($emailMessage, $from = "exampleFrom@tut.by", $fromName = "exampleName", $to = "exampleTo@tut.by")
    {
        $this->queue = "my_emails";
        $this->emailMesssage = $emailMessage;
        $this->from = $from;
        $this->fromName = $fromName;
        $this->to = $to;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mail = new \App\Mail\FirstMail($this->emailMessage, $this->from, $this->fromName, $this->to);
        Mail::send($mail);
    }
}



