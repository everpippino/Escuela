<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
  protected $table = "matricula";

  protected $fillable = [
    'fecha_alta',
    'numero'
  ];

  public function division(){
    //Relacion de muchas matriculas a una division 
          return $this->belongsTo('App\Division');
  }
  public function servicio_detalle(){
    //Relacion de una matricula a muchos servicios detalle 
          return $this->hasMany('App\Servicio_detalle');
  }
  public function cuota(){
    //Relacion de una matricula a muchas cuotas
          return $this->hasMany('App\Cuota');
  }
  public function persona(){
    //Relacion de una matricula a una persona
          return $this->hasOne('App\Persona');
  }
}