<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function role()
    {
        return $this->hasOne('App\Models\Role', 'id', 'role_id');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getCreatedAtAttribute($date)
    {
        return FormatDate($date);
    }
}
