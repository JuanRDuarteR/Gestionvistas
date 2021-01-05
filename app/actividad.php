<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actividad extends Model
{
    protected $fillable = ['nombre_act','descripcion','lote_animal', 'fecha', 'encargado', 'producto','usuario'];

    
}
