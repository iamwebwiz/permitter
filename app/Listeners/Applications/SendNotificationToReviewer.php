<?php

namespace App\Listeners\Applications;

use App\Events\ApplicationSubmitted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationToReviewer
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
     * @param  ApplicationSubmitted  $event
     * @return void
     */
    public function handle(ApplicationSubmitted $event)
    {
        //
    }
}
