@extends('layouts.app')

@section('body-class','signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/escuela3.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="section-text-center">
                <h2 class="title">Deuda original de PEPITO</h2>
            
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                        <div class="card card-signup">
                            <table class="table table-striped">
                                <thead>
                                <tr>                            
                                    <th scope="col">CONCEPTO</th>
                                    <th scope="col">PERIODO</th>
                                </tr>
                                </thead>
                                <tbody>
                                 
                                </tbody>
                            </table>
                    
                        </div>
                    </div>
            </div>
        </div>
    </div>


    <footer class="footer">
        
    </footer>

</div>
@endsection