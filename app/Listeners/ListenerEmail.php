<?php

namespace App\Listeners;

use App\Events\EventEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ListenerEmail
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
     * @param  \App\Events\EventEmail  $event
     * @return void
     */
    public function handle(EventEmail $event)
    {
        //
    }
}
