<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'date_reservation', 'date_debut','date_fin','clientId','RoomId'
    ];
}
