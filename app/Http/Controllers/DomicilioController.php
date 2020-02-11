<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DomicilioController extends Controller
{
    // Retorna la vista del panel de administracion de domicilios
    public function index(){
        $domicilios = App\Domicilio::paginate();
        return view('domicilio/list', compact('domicilios'));
      }
  
      //  Retorna la vista para añadir un domicilio a la base de datos
      public function create(){
        $domicilios = App\Domicilio::all();
        return view('domicilio/create', compact('domicilios'));
      }
  
      //  Retorna la vista para actualizar los datos de un domicilio de la base de datos
      public function edit($id_domicilio){
        $domicilio = App\Domicilio::find($id_domicilio);
        return view('domicilio/edit', compact('domicilio'));
      }
  
      //  Borra un domicilio de la base de datos
      public function delete($id_domicilio){
        App\Domicilio::destroy($id_domicilio);
        return redirect()->to('domicilio');
      }
  
      //  Añade y actualiza los domicilios en la base de datos
      public function store($id_domicilio = null){
        $this->validate(request(), [
          'calle' => ['required'],
          'numero' => ['required']
        ]);
        $datos = request()->all();
        App\Domicilio::updateOrCreate(['id' => $id_domicilio], $datos);
        return redirect()->to('domicilio');
      }
}
