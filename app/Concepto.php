<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
  protected $table = "concepto";

  protected $fillable = [
    'nombre',
    'precio'
  ];

  public function factura_detalle(){
    //Relacion de un concepto a muchas facturas detalle
        return $this->hasMany('App\Factura_detalle');
  }
}