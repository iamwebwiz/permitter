<?php

namespace App\Listeners\Applications;

use App\Events\ApplicationSubmitted;
use App\Notifications\ApplicationSubmittedNotification;
use Illuminate\Support\Facades\Notification;

class SendNotificationToReviewer
{
    /**
     * Handle the event.
     *
     * @param  ApplicationSubmitted  $event
     * @return void
     */
    public function handle(ApplicationSubmitted $event): void
    {
        Notification::send($event->data['reviewer'], new ApplicationSubmittedNotification($event->data));
    }
}
