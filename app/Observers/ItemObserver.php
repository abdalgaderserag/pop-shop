<?php

namespace App\Observers;

use App\Cart;
use App\Item;
use App\Notifications\NewItem;
use App\Notifications\UpdatedItem;

class ItemObserver
{
    /**
     * Handle the item "created" event.
     *
     * @param  \App\Item $item
     * @return void
     */
    public function created(Item $item)
    {
        $user = $item->user()->dissociate();
        $user->notify(new NewItem($item));
    }

    /**
     * Handle the item "updated" event.
     *
     * @param  \App\Item $item
     * @return void
     */
    public function updated(Item $item)
    {
        $inCarts = Cart::all()->where('item_id', $item->id);
        foreach ($inCarts as $cart) {
            $user = $cart->user()->dissociate();
            $user->notify(new UpdatedItem($item));
        }
    }

    /**
     * Handle the item "deleted" event.
     *
     * @param  \App\Item $item
     * @return void
     */
    public function deleted(Item $item)
    {
        //
    }

    /**
     * Handle the item "restored" event.
     *
     * @param  \App\Item $item
     * @return void
     */
    public function restored(Item $item)
    {
        //
    }

    /**
     * Handle the item "force deleted" event.
     *
     * @param  \App\Item $item
     * @return void
     */
    public function forceDeleted(Item $item)
    {
        //
    }
}
