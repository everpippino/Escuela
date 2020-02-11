<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConceptoController extends Controller
{
    // Retorna la vista del panel de administracion de conceptos
    public function index(){
        $conceptos = App\Concepto::paginate();
        return view('concepto/list', compact('conceptos'));
      }
  
      //  Retorna la vista para añadir un concepto a la base de datos
      public function create(){
        $conceptos = App\Concepto::all();
        return view('concepto/create', compact('conceptos'));
      }
  
      //  Retorna la vista para actualizar los datos de un concepto de la base de datos
      public function edit($id_concepto){
        $concepto = App\Concepto::find($id_concepto);
        return view('concepto/edit', compact('concepto'));
      }
  
      //  Borra un concepto de la base de datos
      public function delete($id_concepto){
        App\Concepto::destroy($id_concepto);
        return redirect()->to('concepto');
      }
  
      //  Añade y actualiza los conceptos en la base de datos
      public function store($id_concepto = null){
        $this->validate(request(), [
          'nombre' => ['required'],
          'precio' => ['required']
        ]);
        $datos = request()->all();
        App\Concepto::updateOrCreate(['id' => $id_concepto], $datos);
        return redirect()->to('concepto');
      }
}
