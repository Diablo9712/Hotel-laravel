<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'number', 'phone','occupee','CatId','HotelId'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    public function hotels()
    {
        return $this->hasMany('App\Hotel');
    }
}
