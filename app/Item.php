<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    public function getBudgetAttribute($value)
    {
        return $value . '.' . $this->attributes['cents'];
    }

    public function setImagesAttribute($value)
    {
        if (is_array($value)) {
            $images = '';
            foreach ($value as $image)
                $images = $images . $image . ',';
            $this->attributes['images'] = $images;

        } elseif (is_string($value))
            $this->attributes['images'] = $value;
        else
            $this->attributes['images'] = null;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->hasOne('App\Category');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
