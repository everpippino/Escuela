<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
  protected $table = "persona";

  protected $fillable = [
    'apellido',
    'dni',
    'email',
    'fecha_nacimiento',
    'nombre',
    'telefono',
  ];

  public function pago(){
    //Relacion de una persona a un pago 
          return $this->hasOne('App\Pago');
  }
  public function domicilio(){
    //Relacion de una persona a un domicilio 
          return $this->hasOne('App\Domicilio');
  }
  public function factura(){
    //Relacion de una persona a una factura 
          return $this->hasOne('App\Factura');
  }
  public function vinculo(){
    //Relacion de una persona a muchos vinculos
          return $this->hasMany('App\Vinculo');
  }
  
}