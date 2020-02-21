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
      public function deuda ($id){
        $persona = Persona::where('id','=', "$id")->first();
        $matricula = $persona->matricula()->first();
        $cuotas = $matricula->cuota()->where('estado','!=', "pagada")->get();
        $servicios = $matricula->servicio_detalle()->where('estado','!=', "pagada")->get();
        $adeudado = DB::select('select a.tipo, a.concepto, a.periodo, a.monto
        from
        (select 0 as tipo,\'cuota\' as concepto, c.mes as periodo, c.monto as monto
        from persona p inner join matricula m on p.id=m.persona_id
             inner join cuota c on m.id=c.matricula_id
        where c.estado != \'pagada\' and m.persona_id = :id1
        union
        select 1 as tipo, s.nombre as concepto, month(sd.fecha_vto) as periodo, sd.precio_actual as monto
        from persona p inner join matricula m on p.id = m.persona_id
             inner join servicio_detalle sd on m.id = sd.matricula_id
             inner join servicio s on s.id = sd.servicio_id
        where sd.estado != \'pagada\' and m.persona_id = :id2) as a
        order by periodo , tipo' , [ "id1" => $id, "id2" => $id]);
        
        return view('persona/deuda')-> with(compact('adeudado'));
      }
}

//Cuota::where('estado','!=', "pagada")->get();
//ServicioDetalle::where('estado','!=', 'pagada')->get();