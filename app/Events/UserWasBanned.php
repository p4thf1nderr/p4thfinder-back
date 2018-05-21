<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;


class UserWasBanned extends Event implements ShouldBroadcast
{
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;   
    }

    public function broadcastOn()
    {
        return [];
    }
}
