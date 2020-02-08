<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Retorna la vista del panel de administracion de usuarios
    public function index(){
        $usuarios = App\User::paginate();
        return view('usuario/list', compact('usuarios'));
      }
  
      //  Retorna la vista para añadir un usuario a la base de datos
      public function create(){
        $usuarios = App\User::all();
        return view('usuario/create', compact('usuarios'));
      }
  
      //  Retorna la vista para actualizar los datos de un perfil de la base de datos
      public function edit($id_usuario){
        $usuario = App\User::find($id_usuario);
        return view('usuario/edit', compact('usuario'));
      }
  
      //  Borra un perfil de la base de datos
      public function delete($id_usuario){
        App\User::destroy($id_usuario);
        return redirect()->to('usuario');
      }
  
      //  Añade y actualiza los perfiles en la base de datos
      public function store($id_usuario = null){
        $this->validate(request(), [
          'nombre' => ['required'],
          'email' => ['required'],
        ]);
        $datos = request()->all();
        App\User::updateOrCreate(['id' => $id_usuario], $datos);
        return redirect()->to('usuario');
      }
}
