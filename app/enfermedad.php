<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class enfermedad extends Model
{
    protected $fillable = ['arete_vaca','fecha','enfermedad', 'tratamiento', 'encargado','estado','usuario'];
}
