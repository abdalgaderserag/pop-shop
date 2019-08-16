<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function getAmountAttribute($value)
    {
        $item = $this->item()->dissociate();
//        check if item limited why? check the next comment.
        if ($item->stock != null) {

//            if the amount of the cart bigger than the stock amount
//            assign the amount of item to the cart amount.
            if ($value > $item->stock) {
//                TODO : bind this to the view.
                \session()->flash('lessStock', 'the item amount in the stock is less than what you want');
                $this->attributes['amount'] = $item->stock;
                return $item->stock;
            }
        }
        return $value;
    }

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
