@extends('layouts.app')

@section('body-class','signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/escuela3.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12">
                <div class="card card-signup">
                    <div class="header header-primary text-center">
                        <h4>Buscar alumno</h4>                        
                    </div>
                    <div class="content">
                        @if(session()->has('success'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-sm-12 col-md-7 col-md-offset-5">
                                <form class="form-inline"  method="get" action="{{ url('/admin/persona/dni') }}">
                                    <input type='integer' placeholder="Ingrese dni..." name='query' required>
                                    
                                    <button class = "btn btn-primary btn-just-icon" type="submit">
                                        <i class = "material-icons"> search </i>
                                    </button>
                                </form>
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
