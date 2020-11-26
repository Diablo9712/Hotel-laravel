<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $fillable = [
        'CountryId', 'nom'
    ];
    public function country()
    {
        return $this->belongsTo('App\Country','CountryId');
    }


    
    public function hotels()
    {
        return $this->hasMany('App\Hotel');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
