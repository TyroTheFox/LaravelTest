<?php

namespace App\View\Components\Email;

use Illuminate\View\Component;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;

class EmailSendForm extends Component
{
    public $address = "";
    public $message = "";
    public $messageSent = false;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function sendEmail()
    {
        dd( $message );
        Mail::to($address)->send(new Email($message));
        $messageSent = true;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.email.email-send-form');
    }
}
