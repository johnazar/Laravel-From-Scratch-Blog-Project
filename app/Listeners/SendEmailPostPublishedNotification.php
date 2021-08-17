<?php

namespace App\Listeners;

use App\Events\PostPublishedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendEmailPostPublishedNotification
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
        Log::info('Post published '.$event->post->title .'Send by email to: '.$followers);
    }
}
