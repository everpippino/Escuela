<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicioDetallePagoController extends Controller
{
    // Retorna la vista del panel de administracion de servicioDetallePago
    public function index(){
        $servicioDetallePagos = App\ServicioDetallePago::paginate();
        return view('servicioDetallePago/list', compact('servicioDetallePagos'));
      }
  
      //  Retorna la vista para añadir un servicioDetallePago a la base de datos
      public function create(){
        $servicioDetallePagos = App\ServicioDetallePago::all();
        return view('servicioDetallePago/create', compact('servicioDetallePagos'));
      }
  
      //  Retorna la vista para actualizar los datos de un servicioDetallePago de la base de datos
      public function edit($id_servicio_detalle_pago){
        $servicioDetallePago = App\ServicioDetallePago::find($id_servicio_detalle_pago);
        return view('servicioDetallePago/edit', compact('servicioDetallePago'));
      }
  
      //  Borra un servicioDetallePago de la base de datos
      public function delete($id_servicio_detalle_pago){
        App\ServicioDetallePago::destroy($id_servicio_detalle_pago);
        return redirect()->to('servicioDetallePago');
      }
  
      //  Añade y actualiza los servicioDetallePagos en la base de datos
      public function store($id_servicio_detalle_pago = null){
        $this->validate(request(), [
          'monto_pagado' => ['required']
        ]);
        $datos = request()->all();
        App\ServicioDetallePago::updateOrCreate(['id' => $id_servicio_detalle_pago], $datos);
        return redirect()->to('servicioDetallePago');
      }
}
