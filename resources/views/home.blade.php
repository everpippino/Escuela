@extends('layouts.app')
@section('body-class','signup-page')
@section('content')
<div class="container"  style="background-image: url('{{ asset('img/escuela3.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="header header-filter">
        
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">MODULO DE FACTURACION</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    BIENVENIDO!
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
