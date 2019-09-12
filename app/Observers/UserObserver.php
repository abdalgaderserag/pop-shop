<?php

namespace App\Observers;

use App\Bio;
use App\Notifications\AddAvatarNotification;
use App\Notifications\NewAccountNotification;
use App\User;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User $user
     * @return void
     */
    public function created(User $user)
    {
        $bio = new Bio();
        $bio->user_id = $user->id;
        $bio->avatar = config('pop.def-avatar');
        $bio->save();
//        $user->notify(new NewAccountNotification());
//        if ($user->avatar == config('pop.def-avatar'))
//            $user->notify(new AddAvatarNotification());
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User $user
     * @return void
     */
    public function deleted(User $user)
    {
        $user->bio()->delete();
        foreach ($user->items as $item)
            $item->delete();
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
