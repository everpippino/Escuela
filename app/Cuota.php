<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
  protected $table = "cuota";

  protected $fillable = [
    'anio',
    'estado',
    'fecha_vto',
    'mes',
    'monto',
    'monto_pagado'
  ];

  public function matricula(){
    //Relacion de muchas cuotas a una matricula 
          return $this->belongsTo('App\Matricula');
  }  
}