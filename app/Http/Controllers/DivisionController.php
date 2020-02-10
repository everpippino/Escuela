<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DivisionController extends Controller
{
    // Retorna la vista del panel de administracion de divisiones
    public function index(){
        $divisiones = App\Division::paginate();
        return view('division/list', compact('divisiones'));
      }
  
      //  Retorna la vista para añadir una division a la base de datos
      public function create(){
        $divisiones = App\Division::all();
        return view('division/create', compact('divisiones'));
      }
  
      //  Retorna la vista para actualizar los datos de una division de la base de datos
      public function edit($id_division){
        $division = App\Division::find($id_division);
        return view('division/edit', compact('division'));
      }
  
      //  Borra una division de la base de datos
      public function delete($id_division){
        App\Division::destroy($id_division);
        return redirect()->to('division');
      }
  
      //  Añade y actualiza las divisiones en la base de datos
      public function store($id_division = null){
        $this->validate(request(), [
          'aula' => ['required'],
          'nombre' => ['required']
        ]);
        $datos = request()->all();
        App\Division::updateOrCreate(['id' => $id_division], $datos);
        return redirect()->to('division');
      }
}
