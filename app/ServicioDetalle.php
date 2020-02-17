<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio_detalle extends Model
{
  protected $table = "servicio_detalle";

  protected $fillable = [
    'fecha_alta',
    'fecha_baja',
    'fecha_vto',
    'estado',
    'precio_actual'
  ];

  public function matricula(){
    //Relacion de muchos servicios detalle a una matricula 
          return $this->belongsTo('App\Matricula');
  }
  public function servicio(){
    //Relacion de muchos servicios detalle a un servicio 
          return $this->belongsTo('App\Servicio');
  }
}