<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VinculoController extends Controller
{
    // Retorna la vista del panel de administracion de vinculos
    public function index(){
        $vinculos = App\Vinculo::paginate();
        return view('vinculo/list', compact('vinculos'));
      }
  
      //  Retorna la vista para añadir un vinculo a la base de datos
      public function create(){
        $vinculos = App\Vinculo::all();
        return view('vinculo/create', compact('vinculos'));
      }
  
      //  Retorna la vista para actualizar los datos de un vinculo de la base de datos
      public function edit($id_vinculo){
        $vinculo = App\Vinculo::find($id_vinculo);
        return view('vinculo/edit', compact('vinculo'));
      }
  
      //  Borra un vinculo de la base de datos
      public function delete($id_vinculo){
        App\Vinculo::destroy($id_vinculo);
        return redirect()->to('vinculo');
      }
  
      //  Añade y actualiza los vinculos en la base de datos
      public function store($id_vinculo = null){
        $this->validate(request(), [
          'nombre' => ['required']
        ]);
        $datos = request()->all();
        App\Vinculo::updateOrCreate(['id' => $id_vinculo], $datos);
        return redirect()->to('vinculo');
      }
}
