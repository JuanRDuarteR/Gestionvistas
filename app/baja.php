<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class baja extends Model
{
    protected $fillable = ['vaca_id','arete','nombre','lote', 'raza', 'origen', 'fecha_inc', 'fecha_nac', 'edad', 'fecha_baja', 'motivo', 'usuario'];

    public function vaca(){
        return $this->belongsTo('App\vaca');

    }
}
