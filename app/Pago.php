<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
  protected $table = "pago";

  protected $fillable = [
    'fecha',
    'monto',
    'tipo_pago',
    'transferencia',
    'codigo'  
  ];

  public function persona(){
    //Relacion de un pago a una persona 
          return $this->hasOne('App\Persona');
  }
  public function factura(){
    //Relacion de un pago a una factura 
          return $this->hasOne('App\Factura');
  }
 
  public function cuota_pago(){
    //Relacion de una pago a muchas cuota_pago
          return $this->hasMany('App\CuotaPago');
  }
  public function servicio_detalle_pago(){
    //Relacion de una matricula a muchas cuotas
          return $this->hasMany('App\ServicioDetallePago');
  }
}