<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = [
        'title', 'details', 'budget', 'cents', 'images', 'stock',
    ];

//    protected $hidden = [
//        'cents'
//    ];

    protected $casts = [
        'images' => 'array',
    ];


    public function getStockAttribute($value)
    {
        if ($value === null)
            return 'unlimited';
        return $value;
    }


//    assign the cents to budget
    public function getBudgetAttribute($value)
    {
        return $value . '.' . $this->attributes['cents'];
    }

//    turn the array to string and store it in database
//    used to edit the image store shape
    /*public function setImagesAttribute($value)
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
    }*/


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
