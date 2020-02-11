<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalidadController extends Controller
{
    // Retorna la vista del panel de administracion de localidades
    public function index(){
        $localidades = App\Localidad::paginate();
        return view('localidad/list', compact('localidades'));
      }
  
      //  Retorna la vista para añadir una localidad a la base de datos
      public function create(){
        $localidades = App\Localidad::all();
        return view('localidad/create', compact('localidades'));
      }
  
      //  Retorna la vista para actualizar los datos de una localidad de la base de datos
      public function edit($id_localidad){
        $localidad = App\Localidad::find($id_localidad);
        return view('localidad/edit', compact('localidad'));
      }
  
      //  Borra una localidad de la base de datos
      public function delete($id_localidad){
        App\Localidad::destroy($id_localidad);
        return redirect()->to('localidad');
      }
  
      //  Añade y actualiza las localidades en la base de datos
      public function store($id_localidad = null){
        $this->validate(request(), [
          'nombre' => ['required']
        ]);
        $datos = request()->all();
        App\Localidad::updateOrCreate(['id' => $id_localidad], $datos);
        return redirect()->to('localidad');
      }
}
