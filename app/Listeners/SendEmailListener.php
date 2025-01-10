<?php
namespace App\Listeners;


use App\Events\SendEmailEvent;

class SendEmailListener
{

    public function __construct()
    {

    }
    /**
     * Handle the event.
     *
     * @param  \App\Events\SendEmailEvent   $event
     * @return void
     */
    // public function handle
    public function handle(SendEmailEvent $event)
    {
        $data = $event->data;
        \Mail::to($data['email'])->send(new \App\Mail\MailServer($data));
    }
}