@extends('layouts.app')

@section('body-class','signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/escuela3.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
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
                                                    <input type="hidden" name="montoPago[]" value="{{$ap->aPagar}}" required/>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <input type="hidden" id="idPersona" name="idPersona" value="{{$persona->id}}"/>
                            <input type="hidden" id="monto" name="monto" value="{{$montoTotal}}"/>
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class = "form-group">
                                        <span>Formas de pago:</span>
                                        <select id="medioDePago" name="medioDePago" class="form-control">
                                            <option value="efectivo">Caja</option>
                                            <option value="deposito">Deposito bancario</option>
                                            <option value="pmc">PagoMisCuentas</option>                                    
                                        </select>
                                        <input type='integer' placeholder="Ingrese nº transferencia" name='transferencia' id='transferencia' style="display:none" >
                                        <input type='integer' placeholder="Ingrese nº codigo" name='codigo' id='codigo' style="display:none" >
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">                            
                                    <button class = "btn btn-primary " type="submit">Pagar</button> 
                                    <a href="{{ url('/admin/persona/deuda/'.$persona->id)}}" rel="tooltip"  class="btn btn-primary ">Cancelar</a>
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

<script type="text/javascript">
var select = document.getElementById('medioDePago');
select.addEventListener('change',
  function(){
    var selectedOption = this.options[select.selectedIndex];

    if (selectedOption.value == "efectivo") {
        //oculto los input
        document.getElementById("transferencia").style.display = "none";
        document.getElementById("codigo").style.display = "none";
    }

    if (selectedOption.value == "deposito") {
        //oculto el input de pagoMisCuentas
        document.getElementById("transferencia").style.display = "block";
        document.getElementById("codigo").style.display = "none";
    }
    
    if (selectedOption.value == "pmc") {
        //oculto el input de deposito
        document.getElementById("transferencia").style.display = "none";
        document.getElementById("codigo").style.display = "block";
    }

  });

</script>

@endsection
