@extends('layouts.app')

@section('body-class','signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/escuela3.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <div class="header header-primary text-center">
                            <h4>Bienvenido</h4>
                    </div>

                    <div class="content">
                        <p>En esta seccion podra gestionar la facturaciòn de los alumnos de la Escuela<p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        
    </footer>

</div>
@endsection