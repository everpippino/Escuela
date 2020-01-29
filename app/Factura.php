<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
  protected $table = "factura";

  protected $fillable = [
    'codigo',
    'fecha',
    'monto',
    'path'
  ];

  public function persona(){
    //Relacion de una factura a una persona 
          return $this->hasOne('App\Persona');
  }
  public function factura_detalle(){
    //Relacion de una factura a muchos factura detalle 
          return $this->hasMany('App\Factura_detalle');
  }
  public function pago(){
    //Relacion de una factura a un pago
          return $this->hasOne('App\Pago');
  }
}