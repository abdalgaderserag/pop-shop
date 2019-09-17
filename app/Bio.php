<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{

    protected $fillable = [
        'payment_id',
    ];

    public function getTypeAttribute()
    {
        if ($this->attributes['type'] == 1)
            return 'style';
        return 'dark';
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
