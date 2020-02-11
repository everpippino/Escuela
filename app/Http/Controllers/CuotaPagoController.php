<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CuotaPagoController extends Controller
{
    // Retorna la vista del panel de administracion de cuotaPagos
    public function index(){
        $cuotaPagos = App\CuotaPago::paginate();
        return view('cuotaPago/list', compact('cuotaPagos'));
      }
  
      //  Retorna la vista para añadir una cuotaPago a la base de datos
      public function create(){
        $cuotaPagos = App\CuotaPago::all();
        return view('cuotaPago/create', compact('cuotaPagos'));
      }
  
      //  Retorna la vista para actualizar los datos de una cuotaPago de la base de datos
      public function edit($id_cuota_pago){
        $cuotaPago = App\CuotaPago::find($id_cuota_pago);
        return view('cuotaPago/edit', compact('cuotaPago'));
      }
  
      //  Borra una cuotaPago de la base de datos
      public function delete($id_cuota_pago){
        App\CuotaPago::destroy($id_cuota_pago);
        return redirect()->to('cuotaPago');
      }
  
      //  Añade y actualiza las cuotaPagos en la base de datos
      public function store($id_cuota_pago = null){
        $this->validate(request(), [
          'monto_pagado' => ['required']
        ]);
        $datos = request()->all();
        App\CuotaPago::updateOrCreate(['id' => $id_cuota_pago], $datos);
        return redirect()->to('cuotaPago');
      }
}