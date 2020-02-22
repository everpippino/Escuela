<div>
    @foreach ($personas as $persona)

    <h1>{{$persona->apellido}}</h1>
    <h1>{{$persona->nombre}}</h1>
    <h1>{{$persona->dni}}</h1>
    <h1>{{$persona->fechaNacimiento}}</h1>
   
        
    @endforeach

</div>