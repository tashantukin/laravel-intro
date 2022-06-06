<?php

namespace App\Listeners;

use App\Events\LogPostEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogPostListener
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
        Log::debug('post',['details' => $event->getPost()]);
    }
}
