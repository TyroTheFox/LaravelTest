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

    public function mount()
    {
        $this->messageString = '';
        $this->address = '';
    }

    public function sendEmail()
    {
        SendEmailMessage::dispatch($this->address, $this->messageString);
    }

    public function render()
    {
        return view('livewire.send-email-form');
    }
}
