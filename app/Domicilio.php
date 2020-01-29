<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
  protected $table = "domicilio";

  protected $fillable = [
    'calle',
    'departamento',
    'numero',
    'piso'
  ];

  public function persona(){
    //Relacion de un domicilio a una persona 
          return $this->hasOne('App\Persona');
  }
  public function localidad(){
    //Relacion de muchos domicilios a una localidad 
          return $this->belongsTo('App\Localidad');
  }
}
