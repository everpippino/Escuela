<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anio extends Model
{
  protected $table = "anio";

  protected $fillable = [
    'anio',
    'importe_basico'
  ];

  public function division(){
    //Relacion de un año a muchas divisiones
        return $this->hasMany('App\Division');
  }
}