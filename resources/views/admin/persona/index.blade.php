@extends('layouts.app')

@section('body-class','signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/escuela3.jpg')}}'); background-size: cover; background-position: top center;">
  <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-sm-12">
            <div class="card card-signup">
                <div class="header header-primary text-center">
                    <h4>Personas encontradas</h4>                        
                </div>
                <div class="content">
                  <div class="row">
                    <div class="col-sm-12">
                      <table class = "table">
                        <thead>
                            <tr>
                                <th class = "text-center"> # </th>
                                <th class = "text-center"> Nombre </th>
                                <th class = "text-center"> Apellido </th>
                                <th class = "text-center"> DNI </th>
                                <th class = "text-center"> Fecha de nacimiento </th>
                                <th class = "text-center"> Telefono </th>
                                <th class = "text-center"> email </th>
                                <th class = "text-center"> Acciones </th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($personas as $persona) 
                            <tr>
                                <td class = "text-center">{{$persona->id}}</td>
                                <td class = "text-center"> {{$persona->nombre}} </td>
                                <td class = "text-center">{{$persona->apellido}}</td>
                                <td class = "text-center">{{$persona->dni}}</td>
                                <td class = "text-center"> {{$persona->fecha_nacimiento}}</td>
                                <td class = "text-center"> {{$persona->telefono}}</td>
                                <td class = "text-center"> {{$persona->email}}</td>
                                <td class = "td-actions text-center"><a href="{{ url('/admin/persona/deuda/'.$persona->id)}}">Ver deuda</a></td>
                            </tr>
                            @endforeach   
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    
    <footer class="footer">
       
    </footer>

</div>
  
@endsection