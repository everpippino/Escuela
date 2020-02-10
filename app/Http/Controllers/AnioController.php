<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnioController extends Controller
{
    // Retorna la vista del panel de administracion de años
    public function index(){
        $anios = App\Anio::paginate();
        return view('anio/list', compact('anios'));
      }
  
      //  Retorna la vista para añadir un año a la base de datos
      public function create(){
        $anios = App\Anio::all();
        return view('anio/create', compact('anios'));
      }
  
      //  Retorna la vista para actualizar los datos de un año de la base de datos
      public function edit($id_anio){
        $anios = App\Anio::find($id_anio);
        return view('anio/edit', compact('anio'));
      }
  
      //  Borra un año de la base de datos
      public function delete($id_anio){
        App\Anio::destroy($id_anio);
        return redirect()->to('anio');
      }
  
      //  Añade y actualiza los años en la base de datos
      public function store($id_anio = null){
        $this->validate(request(), [
          'anio' => ['required'],
          'importe_basico' => ['required']
        ]);
        $datos = request()->all();
        App\Anio::updateOrCreate(['id' => $id_anio], $datos);
        return redirect()->to('anio');
      }
}