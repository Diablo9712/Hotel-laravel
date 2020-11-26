<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saison extends Model
{
    protected $fillable = [
        'libelle', 'date_debut','date_fin'
    ];

    public function tarifs()
    {
        return $this->hasMany('App\Tarif');
    }
}
