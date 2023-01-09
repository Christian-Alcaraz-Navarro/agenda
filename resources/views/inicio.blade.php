@extends('layoutS/plantilla')

@section('tituloPagina','CRUD con laravel 8')

<div class="card">  
  <h5 class="card-header">crud laravel 8</h5>
  <div class="card-body">
    <p>
      <br>
      <a href="{{route('personas.create')}}" class="btn btn-primary">
        <spam class="fas fa-user-plus fa-lg">
        </spam> 
        Agregar persona
      </a>
    </p>
  </div>

  @section('contenido')

  <div class="card-body">
    <div class="row">
     <div class="col sm-12">
       @if ($mensaje = Session::get('success') )
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{$mensaje}}
          </div>
       @endif
      </div>
    </div>
  </div>

  <div class="row text-center">
    <div class="card-body">
      <div class="card-header bg-secondary text-white ">
        Lista de personas en el sistema
      </div>
    </div>
  </div>
  <div class="table table-responsive">
    <table class="table table-hover">
      <thead>
        <th >ID </th>
        <th scope="col">Nombre </th>
        <th scope="col">Apellido paterno </th>
        <th scope="col">Apellido Materno </th>
        <th scope="col">Fecha de nacimiento </th>
            
        <th scope="col">Telefono</th>
        <th scope="col">Telefono</th>
        <th scope="col">Telefono</th>  

        <th scope="col">Editar </th>
        <th scope="col">Eliminar </th>
      </thead>

      <tbody>
        @foreach ($personas as $datosPersonas)
          <tr>
            <th scope="row">{{$datosPersonas->id}} </th>
            <td>{{$datosPersonas->nombre}} </td>
            <td>{{$datosPersonas->paterno}} </td>
            <td>{{$datosPersonas->materno}} </td>
            <td>{{$datosPersonas->fecha_nacimiento}} </td>


            @foreach ($telefonos as $telefonosPersona){
              @if($datosPersonas->id==$telefonosPersona->id_persona)
              {                
                <td>{{$telefonosPersona->telefono}}</td>
              }
              @endif
            @endforeach

            <td>
              <form action="{{route("personas.edit", [$datosPersonas->id])}}" method="GET">
                <button class="btn btn-warning btn-sm">
                  <spam class="fas fa-user-edit fa-lg"></spam>
                </button>
              </form>
            </td>

            <td>
               <form action="{{route("personas.show", $datosPersonas->id)}}" method="GET">
                <button class="btn btn-danger btn-sm">
                  <spam class="fas fa-user-times fa-lg"></spam>
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <hr>
  </div>
  <div class="row">
    <div class="col-sm-12">
      {{-- //{{$datos->links()}} --}}
    </div>
  </div>
</div>
@endsection

