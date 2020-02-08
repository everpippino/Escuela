<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuotaPago extends Model
{
  protected $table = "cuota_pago";

  protected $fillable = [
    'monto_pagado'
  ];

  public function pago(){
    //Relacion de muchas cuota pago a un pago 
          return $this->belongsTo('App\Pago');
  }
  public function cuota(){
    //Relacion de muchas cuota pago a una cuota 
          return $this->belongsTo('App\Cuota');
  }
}