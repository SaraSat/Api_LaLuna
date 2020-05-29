<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class monitor extends Model
{
    protected $fillable = ['nombre', 'apellidos',
    'telefono','email','coment'];
}

//Aqui se ponen todos los que quieras modificar, insertar etc...