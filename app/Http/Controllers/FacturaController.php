<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacturaController extends Controller
{
    // Retorna la vista del panel de administracion de facturas
    public function index(){
        $facturas = App\Factura::paginate();
        return view('factura/list', compact('facturas'));
      }
  
      //  Retorna la vista para añadir una factura a la base de datos
      public function create(){
        $facturas = App\Factura::all();
        return view('factura/create', compact('facturas'));
      }
  
      //  Retorna la vista para actualizar los datos de una factura de la base de datos
      public function edit($id_factura){
        $factura = App\Factura::find($id_factura);
        return view('factura/edit', compact('factura'));
      }
  
      //  Borra una factura de la base de datos
      public function delete($id_factura){
        App\Factura::destroy($id_factura);
        return redirect()->to('factura');
      }
  
      //  Añade y actualiza las facturas en la base de datos
      public function store($id_factura = null){
        $this->validate(request(), [
          'codigo' => ['required'],
          'fecha' => ['required'],
          'monto' => ['required'],
          'path' => ['required']
        ]);
        $datos = request()->all();
        App\Factura::updateOrCreate(['id' => $id_factura], $datos);
        return redirect()->to('factura');
      }
}
