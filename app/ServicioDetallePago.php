<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio_detalle_pago extends Model
{
  protected $table = "servicio_detalle_pago";

  protected $fillable = [
    'monto_pagado'
  ];

  public function pago(){
    //Relacion de muchos servicioDetallePago a un pago 
          return $this->belongsTo('App\Pago');
  }
  public function servicioDetalle(){
    //Relacion de muchas servicioDetallePago a un servicioDetalle 
          return $this->belongsTo('App\ServicioDetalle');
  }
}