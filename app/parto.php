<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parto extends Model
{
    protected $fillable = ['arete_vaca','fecha','peso', 'raza', 'encargado', 'estado','sexo','usuario'];
}
