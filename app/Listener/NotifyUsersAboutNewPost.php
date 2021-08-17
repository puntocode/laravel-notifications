<?php

namespace App\Listener;

use App\Events\PostCreated;
use App\Models\User;
use App\Notifications\PostPublished;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NotifyUsersAboutNewPost implements ShouldQueue
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
     * @param  PostCreated  $event
     * @return void
     */
    public function handle($event)
    {
        $users = User::all();
        Notification::send($users, new PostPublished($event->post));
    }


}
