@extends('layouts.app')

@section('body-class','signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/escuela3.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <form class="form-inline"  method="get" action="{{ url('/dni') }}">
                        <input type='integer' placeholder="Ingrese dni..." name='query' required>
                        
                        <button class = "btn btn-primary btn-just-icon" type="submit">
                            <i class = "material-icons"> search </i>
                        </button>
                    </form>
             
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        
    </footer>

</div>
@endsection
