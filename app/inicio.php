<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inicio extends Model
{
    protected $fillable = ['nombre', 'dia',
    'fecha','hora','lugar','desc',
    'precio', 'horaF', 'lugarF'];
}
