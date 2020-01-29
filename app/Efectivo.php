<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Efectivo extends Model
{
  protected $table = "efectivo";

  protected $fillable = [
    // no se que poner 'codigo'
  ];

  //Me falta la relacion a pago 
}