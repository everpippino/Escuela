<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
  protected $table = "caja";

  protected $fillable = [
    'numero'
  ];

  public function pago(){
    //Relacion de una caja a un pago
        return $this->hasOne('App\Pago');
  }
}