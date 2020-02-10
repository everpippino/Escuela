<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CuotaController extends Controller
{
    // Retorna la vista del panel de administracion de cuotas
    public function index(){
        $cuotas = App\Cuota::paginate();
        return view('cuota/list', compact('cuotas'));
      }
  
      //  Retorna la vista para añadir una cuota a la base de datos
      public function create(){
        $cuotas = App\Cuota::all();
        return view('cuota/create', compact('cuotas'));
      }
  
      //  Retorna la vista para actualizar los datos de una cuota de la base de datos
      public function edit($id_cuota){
        $cuota = App\Cuota::find($id_cuota);
        return view('cuota/edit', compact('cuota'));
      }
  
      //  Borra una cuota de la base de datos
      public function delete($id_cuota){
        App\Cuota::destroy($id_cuota);
        return redirect()->to('cuota');
      }
  
      //  Añade y actualiza las id_cuotas en la base de datos
      public function store($id_cuota = null){
        $this->validate(request(), [
          'anio' => ['required'],
          'estado' => ['required'],   
          'fecha_vto' => ['required'],   
          'mes' => ['required'],   
          'monto' => ['required'],   
          'monto_pagado' => ['required']          
        ]);
        $datos = request()->all();
        App\Cuota::updateOrCreate(['id' => $id_cuota], $datos);
        return redirect()->to('cuota');
      }
}
