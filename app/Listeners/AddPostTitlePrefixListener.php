<?php

namespace App\Listeners;

use App\Events\LogPostEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddPostTitlePrefixListener
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
     * @param  \App\Events\LogPostEvent  $event
     * @return void
     */
    public function handle(LogPostEvent $event)
    {
        $post =  $event->getPost();
        $post->update(['title' => sprintf('the %s', $post->title)]);
    }
}
