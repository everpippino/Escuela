<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicioController extends Controller
{
    // Retorna la vista del panel de administracion de servicios
    public function index(){
        $servicios = App\Servicio::paginate();
        return view('servicio/list', compact('servicios'));
      }
  
      //  Retorna la vista para añadir un servicio a la base de datos
      public function create(){
        $servicios = App\Servicio::all();
        return view('servicio/create', compact('servicios'));
      }
  
      //  Retorna la vista para actualizar los datos de un servicio de la base de datos
      public function edit($id_servicio){
        $usuario = App\Servicio::find($id_usuario);
        return view('servicio/edit', compact('servicio'));
      }
  
      //  Borra un servicio de la base de datos
      public function delete($id_servicio){
        App\Servicio::destroy($id_servicio);
        return redirect()->to('servicio');
      }
  
      //  Añade y actualiza los servicios en la base de datos
      public function store($id_servicio = null){
        $this->validate(request(), [
          'costo' => ['required'],
          'descripcion' => ['required'],
          'nombre' => ['required']
        ]);
        $datos = request()->all();
        App\Servicio::updateOrCreate(['id' => $id_servicio], $datos);
        return redirect()->to('servicio');
      }
}