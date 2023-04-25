<?php

namespace App\Listeners;

use App\Events\Registered as RegisteredEvent;
use App\Mail\SendEmailVerification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class Registered
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(RegisteredEvent $event)
    {
//        dd($event);
        Mail::to($event->email)->send(
            new SendEmailVerification($event->email,$event->personal_id, $event->password,$event->api_key)
        );
    }
}
