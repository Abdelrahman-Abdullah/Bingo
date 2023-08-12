<?php

namespace App\Listeners;

use App\Events\ContactMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendContactMail
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
    public function handle(ContactMail $event): void
    {
        Mail::to($event->contact['email'])->send(new \App\Mail\ContactMail($event->contact));
    }
}
