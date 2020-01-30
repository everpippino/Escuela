<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
  protected $table = "pago";

  protected $fillable = [
    'fecha',
    'monto'    
  ];

  public function caja(){
    //Relacion de un pago a una caja 
          return $this->hasOne('App\Pago');
  }
  public function persona(){
    //Relacion de un pago a una persona 
          return $this->hasOne('App\Persona');
  }
  public function factura(){
    //Relacion de un pago a una factura 
          return $this->hasOne('App\Factura');
  }
  public function tipo_pago(){
    //Relacion de una pago a un tipo_pago 
          return $this->hasOne('App\Tipo_pago');
  }
}