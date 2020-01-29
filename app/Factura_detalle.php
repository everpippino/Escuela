<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura_detalle extends Model
{
  protected $table = "factura_detalle";

  protected $fillable = [
    'precio'
  ];

  public function factura(){
    //Relacion de muchas factura detalle a una factura 
          return $this->belongsTo('App\Factura');
  }
  public function concepto(){
    //Relacion de muchas factura detalle a un concepto 
          return $this->belongsTo('App\Concepto');
  }
}