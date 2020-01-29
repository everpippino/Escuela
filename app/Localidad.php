<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
  protected $table = "localidad";

  protected $fillable = [
    'nombre'
  ];

  public function domicilio(){
    //Relacion de una localidad a muchos domicilios
        return $this->hasMany('App\Domicilio');
  }
}