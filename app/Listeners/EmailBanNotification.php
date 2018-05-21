<?php

namespace App\Listeners;

use App\Events\UserWasBanned;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailBanNotification implements ShouldQueue
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
     * @param  UserWasBanned  $event
     * @return void
     */
    public function handle(UserWasBanned $event)
    {
        var_dump($event->user->name . 'was banned');
    }
}
