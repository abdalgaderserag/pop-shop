<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Set a given attribute on the base type.
     *
     * @param  mixed $value
     * @return mixed
     */
    public function setBaseTypeAttribute($value)
    {
        foreach (config('pop.category') as $category) {
            if ($category == $value)
                $this->attributes['base_type'] = $value;
        }
        $this->attributes['base_type'] = 'other';
    }

}
