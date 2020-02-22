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
                        <h4>Pago de {{$persona->apellido.', '.$persona->nombre}}</h4>                        
                    </div>
                    <div class="content">
                        <form class="form"  method="post" action="{{ url('/admin/persona/guardar') }}">
                            @csrf

                            <div class="row">
                                <div class="col-sm-12">

                                    <table class="table table-striped">
                                        <thead>
                                        <tr>                            
                                            <th scope="col">CONCEPTO</th>
                                            <th scope="col">PERIODO</th>
                                            <th scope="col">MONTO</th>
                                            <th scope="col">MONTO A PAGAR</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($aPagar as $ap) 
                                            <tr>
                                                <td scope="row">{{$ap->concepto}}</td>
                                                <td scope="row">{{$ap->periodo}}</td>
                                                <td scope="row">{{$ap->monto}}</td>
                                                <td scope="row">
                                                    {{$ap->aPagar}}

                                                    <input type="hidden" name="tipoPago[]" value="{{$ap->tipo}}" />
                                                    <input type="hidden" name="idPago[]" value="{{$ap->id}}" />
                                                    <input type="hidden" name="montoPago[]" value="{{$ap->aPagar}}" />
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <input type="hidden" id="idPersona" name="idPersona" value="{{$persona->id}}"/>

                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class = "form-group">
                                        <span>Formas de pago:</span>
                                        <select id="medioDePago" name="medioDePago" class="form-control">
                                            <option value="caja">Caja</option>
                                            <option value="deposito">Deposito bancario</option>
                                            <option value="pmc">PagoMisCuentas</option>                                    
                                        </select>
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