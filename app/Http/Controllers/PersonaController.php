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
        
        return view('persona/deuda')-> with(compact('persona','adeudado'));
      }

      //  Paga segun el monto ingresado, para el alumno indicado, la deuda mas atrasada
      public function pagar(Request $request){
        $id=$request->idPersona;
        $persona = Persona::where('id','=', $id)->first();
        $monto = $request->monto;
        $adeudado = DB::select('select a.tipo, a.id, a.concepto, a.periodo, a.monto
          from
          (select 0 as tipo, c.id, \'cuota\' as concepto, c.mes as periodo, c.monto as monto
          from persona p inner join matricula m on p.id=m.persona_id
              inner join cuota c on m.id=c.matricula_id
          where c.estado != \'pagada\' and m.persona_id = :id1
          union
          select 1 as tipo, sd.id, s.nombre as concepto, month(sd.fecha_vto) as periodo, sd.precio_actual as monto
          from persona p inner join matricula m on p.id = m.persona_id
              inner join servicio_detalle sd on m.id = sd.matricula_id
              inner join servicio s on s.id = sd.servicio_id
          where sd.estado != \'pagada\' and m.persona_id = :id2) as a
          order by periodo , tipo' , 
        [ "id1" => $id, "id2" => $id]);

        $i=0;
        $aPagar= [];
        while ($monto > 0  && $i<count($adeudado)) {
          if ($monto - $adeudado[$i]->monto >=  0) {
            $pagar = $adeudado[$i]->monto;

            $pago = new APagar();
            $pago->tipo = $adeudado[$i]->tipo;
            $pago->id = $adeudado[$i]->id;
            $pago->concepto = $adeudado[$i]->concepto;
            $pago->periodo = $adeudado[$i]->periodo;
            $pago->monto = $adeudado[$i]->monto;
            $pago->aPagar = $pagar;
            $aPagar[$i] = $pago;
            
            $monto = $monto - $adeudado[$i]->monto;
          } else {
            $pago = new APagar();
            $pago->tipo = $adeudado[$i]->tipo;
            $pago->id = $adeudado[$i]->id;
            $pago->concepto = $adeudado[$i]->concepto;
            $pago->periodo = $adeudado[$i]->periodo;
            $pago->monto = $adeudado[$i]->monto;
            $pago->aPagar = $monto;
            $aPagar[$i] = $pago;
            
            $monto = 0;
          }
          
          $i++;
        }
        
        return view('persona/pagar')-> with(compact('persona','aPagar','monto'));
      }
      
      //  Paga segun el monto ingresado, para el alumno indicado, la deuda mas atrasada
      public function guardar(Request $request){
        dd($request);
        $cantConceptos = count($request->tipoPago);
        // registro el pago
        for($i = 0; $i < $cantConceptos; $i++) {
          $tipo = $request->tipoPago[$i];
          $idPago = $request->idPago[$i];
          $montoPago = $request->montoPago[$i];
        }
      }
}

class APagar {
  public $tipo;
  public $id;
  public $concepto;
  public $periodo;
  public $monto;
  public $aPagar;
}
//Cuota::where('estado','!=', "pagada")->get();
//ServicioDetalle::where('estado','!=', 'pagada')->get();