<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\NewMemberNotification;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

class SendNewMemberNotification
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $admins = User::where('level',"super_admin")->get();

        Notification::send($admins, new NewMemberNotification($event->user));
    }
}
