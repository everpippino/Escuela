<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
  protected $table = "deposito";

  protected $fillable = [
    'cbu',
    'cuenta'
  ];

  public function banco(){
    //Relacion de muchos depositos a un banco 
          return $this->belongsTo('App\Banco');
  }
  
    //Me falta la relacion a pago 
     
}