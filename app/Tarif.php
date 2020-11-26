<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $fillable = [
        'CatId', 'saisonId','prix'
    ];

    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    public function saisons()
    {
        return $this->hasMany('App\Saison');
    }
}
