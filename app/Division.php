<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
  protected $table = "division";

  protected $fillable = [
    'aula',
    'nombre'
  ];

  public function anio(){
    //Relacion de muchas divisiones a un año 
          return $this->belongsTo('App\Anio');
  }
  public function matricula(){
    //Relacion de una division a muchas matriculas 
          return $this->hasMany('App\Matricula');
  }
}