<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Persona;

class PersonaController extends Controller
{
    // Retorna la vista del panel de administracion de personas
    public function index(){
        $personas = App\Persona::paginate();
        //dd($personas);
        return view('persona.index', compact('personas'));
        
      
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
        return redirect()->to('persona');
      }
      //  Busca y retorna una persona por dni
      public function dni (Request $request){
        $query = $request->input('query');
        $personas = Persona::where('dni','like', "%$query%")->get();
       
        return view('persona/index')-> with(compact('personas'));
      }

      //  Busca y retorna la deuda de la persona seleccionada
      public function deuda (Request $request){
        //$query = $request->input('query');
        $cuotas = Cuota::where('estado','!=', "pagada")->get();
        $servicios = ServicioDetalle::where('estado','!=', 'pagada')->get();
        return view('persona/deuda')-> with(compact('cuotas'));
      }
}
