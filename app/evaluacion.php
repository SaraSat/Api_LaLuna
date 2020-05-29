<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evaluacion extends Model
{
    protected $fillable = ['nombre', 'fecha',
    'desc','mejor','peor', 'equipo', 'recordar'];
}

//Aqui se ponen todos los que quieras modificar, insertar etc...