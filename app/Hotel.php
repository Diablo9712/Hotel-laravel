<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'namehotel','CountryId', 'CityId','address','codepostal','phone'
    ];
    public function country()
    {
        return $this->belongsTo('App\Country','CountryId');
    }

 
    public function city()
    {
        return $this->belongsTo('App\City','CityId ');
    }
}
