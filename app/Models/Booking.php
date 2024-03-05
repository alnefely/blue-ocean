<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function trip()
    {
        return $this->hasOne('App\Models\Trip', 'id', 'trip_id');
    }

    public function getCreatedAtAttribute($date)
    {
        return FormatDate($date);
    }

}
