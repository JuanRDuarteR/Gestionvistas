<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vaca extends Model
{
    protected $fillable = ['arete','nombre','lote', 'raza', 'origen', 'fecha_inc', 'fecha_nac', 'edad', 'estatus', 'usuario'];

    public function bajas(){
        return $this->hasOne('App\baja');

    }
    //Scope para realizar las busquedas de los animales en el index
    public function scopeSearch($query, $nombre)
    {
        return $query->where('nombre','LIKE',"%$nombre%");
    }
}
