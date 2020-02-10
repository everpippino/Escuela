<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    // Retorna la vista del panel de administracion de matriculas
    public function index(){
        $matriculas = App\Matricula::paginate();
        return view('matricula/list', compact('matriculas'));
      }
  
      //  Retorna la vista para añadir una matricula a la base de datos
      public function create(){
        $matriculas = App\Matricula::all();
        return view('matricula/create', compact('matriculas'));
      }
  
      //  Retorna la vista para actualizar los datos de una matricula de la base de datos
      public function edit($id_matricula){
        $matricula = App\Matricula::find($id_matricula);
        return view('matricula/edit', compact('matricula'));
      }
  
      //  Borra una matricula de la base de datos
      public function delete($id_matricula){
        App\Matricula::destroy($id_matricula);
        return redirect()->to('matricula');
      }
  
      //  Añade y actualiza las matriculas en la base de datos
      public function store($id_matricula = null){
        $this->validate(request(), [
          'fecha_alta' => ['required'],
          'numero' => ['required'],
        ]);
        $datos = request()->all();
        App\Matricula::updateOrCreate(['id' => $id_matricula], $datos);
        return redirect()->to('matricula');
      }
}
