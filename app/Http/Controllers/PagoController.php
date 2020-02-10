<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagoController extends Controller
{
    // Retorna la vista del panel de administracion de pagos
    public function index(){
        $pagos = App\Pago::paginate();
        return view('pago/list', compact('pagos'));
      }
  
      //  Retorna la vista para añadir un pago a la base de datos
      public function create(){
        $pagos = App\Pago::all();
        return view('pago/create', compact('pagos'));
      }
  
      //  Retorna la vista para actualizar los datos de un pago de la base de datos
      public function edit($id_pago){
        $pago = App\Pago::find($id_pago);
        return view('pago/edit', compact('pago'));
      }
  
      //  Borra un Pago de la base de datos
      public function delete($id_pago){
        App\Pago::destroy($id_pago);
        return redirect()->to('pago');
      }
  
      //  Añade y actualiza los pagos en la base de datos
      public function store($id_pago = null){
        $this->validate(request(), [
          'fecha' => ['required'],
          'monto' => ['required']
        ]);
        $datos = request()->all();
        App\Pago::updateOrCreate(['id' => $id_pago], $datos);
        return redirect()->to('pago');
      }
}

