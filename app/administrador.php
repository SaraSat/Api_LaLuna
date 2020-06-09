<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class administrador extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $guard = 'admin';
    protected $fillable = ['password', 'cargo', 'user_id'];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
