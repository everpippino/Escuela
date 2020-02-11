<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicioDetalleController extends Controller
{
    // Retorna la vista del panel de administracion de servicioDetalle
    public function index(){
        $servicioDetalles = App\ervicioDetalle::paginate();
        return view('servicioDetalle/list', compact('servicioDetalles'));
      }
  
      //  Retorna la vista para añadir un servicioDetalle a la base de datos
      public function create(){
        $servicioDetalles = App\User::all();
        return view('servicioDetalle/create', compact('servicioDetalles'));
      }
  
      //  Retorna la vista para actualizar los datos de un servicioDetalle de la base de datos
      public function edit($id_usuario){
        $usuario = App\User::find($id_usuario);
        return view('servicioDetalle/edit', compact('servicioDetalle'));
      }
  
      //  Borra un servicioDetalle de la base de datos
      public function delete($id_usuario){
        App\User::destroy($id_usuario);
        return redirect()->to('servicioDetalle');
      }
  
      //  Añade y actualiza los perfiles en la base de datos
      public function store($id_usuario = null){
        $this->validate(request(), [
          'nombre' => ['required'],
          'email' => ['required'],
        ]);
        $datos = request()->all();
        App\User::updateOrCreate(['id' => $id_usuario], $datos);
        return redirect()->to('servicioDetalle');
      }
}