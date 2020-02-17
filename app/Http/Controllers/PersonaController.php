<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
    // Retorna la vista del panel de administracion de personas
    public function index(){
        $personas = App\Persona::paginate();
        return view('persona/list', compact('personas'));
      }
  
      //  Retorna la vista para añadir una persona a la base de datos
      public function create(){
        $personas = App\Persona::all();
        return view('persona/create', compact('personas'));
      }
  
      //  Retorna la vista para actualizar los datos de una persona de la base de datos
      public function edit($id_persona){
        $persona = App\Persona::find($id_persona);
        return view('persona/edit', compact('persona'));
      }
  
      //  Borra una persona de la base de datos
      public function delete($id_persona){
        App\Persona::destroy($id_persona);
        return redirect()->to('persona');
      }
  
      //  Añade y actualiza las personas en la base de datos
      public function store($id_persona = null){
        $this->validate(request(), [
          'apellido' => ['required'],
          'dni' => ['required'],
          'email' => ['required'],
          'fecha_nacimiento' => ['required'],
          'nombre' => ['required']
        ]);
        $datos = request()->all();
        App\Persona::updateOrCreate(['id' => $id_persona], $datos);
        return redirect()->to('usuario');
      }
      //  Busca y retorna una persona por dni
      public function dni($dni){
        $persona = App\Persona::find($dni);
        return view('persona/dni', compact('persona'));
      }
}
