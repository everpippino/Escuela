<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago_mis_cuentas extends Model
{
  protected $table = "pago_mis_cuentas";

  protected $fillable = [
    'codigo'
  ];

  //Me falta la relacion a pago 
}