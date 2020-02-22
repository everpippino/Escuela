@extends('layouts.app')

@section('body-class','signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/escuela3.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <!-- <div class="section-text-center"> -->
            <div class="col-md-10 col-md-offset-1 col-sm-12">
                <div class="card card-signup">
                    <div class="header header-primary text-center">
                        <h4>Deuda original de {{$persona->apellido.', '.$persona->nombre}}</h4>                        
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>                            
                                        <th scope="col">CONCEPTO</th>
                                        <th scope="col">PERIODO</th>
                                        <th scope="col">MONTO</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($adeudado as $ad) 
                                        <tr>
                                            <td scope="row">{{$ad->concepto}}</td>
                                            <td scope="row">{{$ad->periodo}}</td>
                                            <td scope="row">{{$ad->monto}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <form class="form"  method="POST" action="{{ url('/pagar') }}">
                            @csrf

                            <input type="hidden" id="idPersona" name="idPersona" value="{{$persona->id}}"/>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class = "form-group">
                                        <span>Monto:</span>
                                        <input type="text" id="monto" name="monto" placeholder = "Ingrese el monto que desea abonar" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6">                            
                                    <button class = "btn btn-primary ">
                                        <i class = "material-icons" type="submit"> done </i> Pagar
                                    </button> 
                                </div>
                            </div>                                                                                         
                        </form>
                    </div>
                </div>
            </div>            
        </div>        
    </div>
    

    <footer class="footer">
        
    </footer>

</div>
@endsection