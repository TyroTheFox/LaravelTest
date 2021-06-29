<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Mail\Email;
use App\Models\SentEmail;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmailMessage;

class SendEmailForm extends Component
{
    public $address;
    public $messageString;
    public $messageSent = false;

    /**
     * On mount will set defaults
     */
    public function mount()
    {
        $this->messageString = '';
        $this->address = '';
    }

    /**
     * Dispatches an email job
     */
    public function sendEmail()
    {
        SendEmailMessage::dispatch($this->address, $this->messageString);
    }

    /**
     * Returns a rendered view
     *
     * @return View
     */
    public function render()
    {
        return view('livewire.send-email-form');
    }
}
