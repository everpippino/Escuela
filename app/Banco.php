<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
  protected $table = "banco";

  protected $fillable = [
    'nombre'
  ];

  public function deposito(){
    //Relacion de un banco a muchos depositos
        return $this->hasMany('App\Deposito');
  }
}