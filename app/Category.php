<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'libelle', 'image'
    ];

    public function tarifs()
    {
        return $this->hasMany('App\Tarif');
    }

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }
}
