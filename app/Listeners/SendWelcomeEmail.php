<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistered;


class SendWelcomeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Verified $event): void
    {
        $email = $event->user;
        //send welcome email
        Mail::to($email)->queue(new UserRegistered());
    }
}
