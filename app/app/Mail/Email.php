<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $messageString;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messageString)
    {
        $this->messageString = $messageString;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fromConfig = config('mail.from');
        return $this->from($fromConfig['address'], $fromConfig['name'])->view('email.sentMessage');
    }
}
