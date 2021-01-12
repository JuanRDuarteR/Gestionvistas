<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vaca extends Model
{
    protected $fillable = ['arete','nombre','lote', 'raza', 'origen', 'fecha_inc', 'fecha_nac', 'edad', 'usuario'];

    public function bajas(){
        return $this->hasOne('App\baja');
    }

    public function partos()
    {
      return $this->hasOne('App\parto');
    }

    //Scope para realizar las busquedas de los animales en el index
    public function scopeSearch($query, $nombre)
    {
        return $query->where('nombre','LIKE',"%$nombre%");
    }
}
