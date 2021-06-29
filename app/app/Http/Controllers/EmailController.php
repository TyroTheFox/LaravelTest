<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailMessage;

class EmailController extends Controller
{
    public function send($address, $message) {
        SendEmailMessage::dispatch($address, $message);
    }
}
