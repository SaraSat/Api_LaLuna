<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class monitor extends Model
{
    protected $fillable = ['nombre', 'apellidos',
    'telefono','email','coment'];

    protected $hidden = [
        'contraseña', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}

//Aqui se ponen todos los que quieras modificar, insertar etc...