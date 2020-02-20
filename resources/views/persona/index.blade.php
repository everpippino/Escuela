@extends('layouts.app')

@section('body-class','signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/escuela3.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col" >#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Fecha de nacimiento</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">email</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($personas as $persona)  
                          <tr>
                              <th scope="row">{{$persona->id}}</th>
                              <th scope="row">{{$persona->nombre}}</th>
                              <th scope="row">{{$persona->apellido}}</th>
                              <th scope="row">{{$persona->dni}}</th>
                              <th scope="row">{{$persona->fecha_nacimiento}}</th>
                              <th scope="row">{{$persona->telefono}}</th>
                              <th scope="row">{{$persona->email}}</th>                           
                              <th><input type = "checkbox" name = "optionsCheckboxes"></th>
                          </tr>
                          @endforeach 
                        </tbody>
                      </table>
                      
                </div>
                <form class="form-inline"  method="get" action="{{ url('/deuda') }}">
                    <button class = "btn btn-primary" type="submit"> Ver deuda </button>
                    <button class = "btn btn-primary"> Atras </button>
                </form>
            </div>
            
        </div>
       
    </div>
    
    <footer class="footer">
       
    </footer>

</div>
  
@endsection