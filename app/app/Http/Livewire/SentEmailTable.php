<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\SentEmail;

class SentEmailTable extends Component
{
    /**
     * Array of table headers
     */
    public $headers = [
        "To",
        "Message",
        "Time Sent",
    ];
    /**
     * Array of row data
     */
    public $tableRows = [];

    /**
     * Returns a rendered view
     *
     * @return View
     */
    public function render()
    {
        $id = Auth::id();

        foreach (SentEmail::where('user_id', $id)->cursor() as $sentEmail) {
            array_push( $this->tableRows, [ $sentEmail->to, $sentEmail->message, $sentEmail->sent_at->format('Y.m.d H:i:s')] );
        }
        return view('livewire.sent-email-table');
    }
}
