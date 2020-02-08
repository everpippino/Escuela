<div>
    @foreach ($usuarios as $usuario)

    <h1>{{$usuario->nombre}}</h1>
    <h1>{{$usuario->email}}</h1>
    <h1>{{$usuario->apellido}}</h1>
        
    @endforeach

</div>