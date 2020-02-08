<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model
{
  protected $table = "tipo_pago";

  protected $fillable = [
    'nombre',
    'cbu',
    'codigo'    
  ];

  public function pago(){
    //Relacion de una tipo_pago a un pago 
          return $this->hasOne('App\Pago');
  }
}