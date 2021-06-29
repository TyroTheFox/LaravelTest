<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\SentEmail;

class SentEmailTable extends Component
{
    public $headers = [
        "To",
        "Message",
        "Time Sent",
    ];
    public $tableRows = [];

    public function render()
    {
        $id = Auth::id();

        foreach (SentEmail::where('user_id', $id)->cursor() as $sentEmail) {
            array_push( $this->tableRows, [ $sentEmail->to, $sentEmail->message, $sentEmail->sent_at->format('Y.m.d H:i:s')] );
        }
        return view('livewire.sent-email-table');
    }
}
