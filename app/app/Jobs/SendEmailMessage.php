<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

use App\Mail\Email;
use App\Models\SentEmail;

class SendEmailMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $address;
    public $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($address, $message)
    {
        $this->address = $address;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Allow only 2 emails every 1 second
        Redis::throttle('send-email-mailgun')->allow(2)->every(1)->then(function () {
            $id = Auth::id();
            Mail::to($this->address)->send(new Email($this->message));
            $sentEmail = SentEmail::create([
                'user_id' => $id,
                'to' => $this->address,
                'message' => $this->message,
            ]);
        }, function () {
            // Could not obtain lock; this job will be re-queued
            return $this->release(2);
        });
    }
}
