<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lunero extends Model
{
    protected $fillable = ['nombre', 'apellidos',
    'telf', 'telf2','tutores',
    'patologias','coment'];
}
