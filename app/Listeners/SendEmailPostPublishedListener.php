<?php

namespace App\Listeners;

use App\Events\PostPublishedEvent;
use App\Mail\PostPublishedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailPostPublishedListener
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
     * @param  PostPublished  $event
     * @return void
     */
    public function handle(PostPublishedEvent $event)
    {
        $followers = $event->post->author->followers()->pluck('name');
        $followersemails = $event->post->author->followers()->pluck('email');
        $followersemails->map(function ($email) use($event) {
            return Mail::to($email)->send(new PostPublishedMail($event->post));
        });
        Log::info('Post published '.$event->post->title .'Send by email to: '.$followers);

    }
}
