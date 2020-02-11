<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicioDetalleController extends Controller
{
    // Retorna la vista del panel de administracion de servicioDetalle
    public function index(){
        $servicioDetalles = App\ServicioDetalle::paginate();
        return view('servicioDetalle/list', compact('servicioDetalles'));
      }
  
      //  Retorna la vista para añadir un servicioDetalle a la base de datos
      public function create(){
        $servicioDetalles = App\ServicioDetalle::all();
        return view('servicioDetalle/create', compact('servicioDetalles'));
      }
  
      //  Retorna la vista para actualizar los datos de un servicioDetalle de la base de datos
      public function edit($id_servicio_detalle){
        $usuario = App\ServicioDetalle::find($id_servicio_detalle);
        return view('servicioDetalle/edit', compact('servicioDetalle'));
      }
  
      //  Borra un servicioDetalle de la base de datos
      public function delete($id_servicio_detalle){
        App\ServicioDetalle::destroy($id_servicio_detalle);
        return redirect()->to('servicioDetalle');
      }
  
      //  Añade y actualiza los servicioDetalle en la base de datos
      public function store($id_servicio_detalle = null){
        $this->validate(request(), [
          'fecha_alta' => ['required'],
          'fecha_baja' => ['required'],
          'fecha_vto' => ['required'],
          'monto_pagado' => ['required'],
          'precio_actual' => ['required']
        ]);
        $datos = request()->all();
        App\ServicioDetalle::updateOrCreate(['id' => $id_servicio_detalle], $datos);
        return redirect()->to('servicioDetalle');
      }
}

