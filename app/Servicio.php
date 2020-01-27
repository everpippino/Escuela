<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
  protected $table = "servicio";

  protected $fillable = [
    'costo',
    'descripcion',
    'nombre'
  ];

  public function servicio_detalle(){
    //Relacion de un servicio a muchos servicios detalle
        return $this->hasMany('App\Servicio_detalle');
  }
}