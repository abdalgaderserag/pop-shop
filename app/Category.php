<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'base_type', 'seconder_type', 'location', 'exchangeable', 'used',
    ];

    protected $casts = [
        'exchangeable' => 'boolean',
        'used' => 'boolean',
        'unlimited' => 'boolean',
    ];

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

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
