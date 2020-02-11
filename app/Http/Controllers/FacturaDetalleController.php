<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacturaDetalleController extends Controller
{
    // Retorna la vista del panel de administracion de facturaDetalle
    public function index(){
        $facturaDetalles = App\FacturaDetalle::paginate();
        return view('facturaDetalle/list', compact('facturaDetalles'));
      }
  
      //  Retorna la vista para añadir una facturaDetalle a la base de datos
      public function create(){
        $facturaDetalles = App\FacturaDetalle::all();
        return view('facturaDetalle/create', compact('facturaDetalles'));
      }
  
      //  Retorna la vista para actualizar los datos de una facturaDetalle de la base de datos
      public function edit($id_factura_detalle){
        $facturaDetalle = App\FacturaDetalle::find($id_factura_detalle);
        return view('facturaDetalle/edit', compact('facturaDetalle'));
      }
  
      //  Borra una facturaDetalle de la base de datos
      public function delete($id_factura_detalle){
        App\FacturaDetalle::destroy($id_factura_detalle);
        return redirect()->to('facturaDetalle');
      }
  
      //  Añade y actualiza las facturaDetalles en la base de datos
      public function store($id_factura_detalle = null){
        $this->validate(request(), [
          'precio' => ['required']
        ]);
        $datos = request()->all();
        App\FacturaDetalle::updateOrCreate(['id' => $id_factura_detalle], $datos);
        return redirect()->to('facturaDetalle');
      }
}