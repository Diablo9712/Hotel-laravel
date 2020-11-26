<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service_Demande extends Model
{
    protected $fillable = [
        'ServiceId ', 'clientId'
    ];
}
