<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuota_pago extends Model
{
  protected $table = "cuota_pago";

  protected $fillable = [
    'precio'
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