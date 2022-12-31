@extends('layoutS/plantilla')

@section('tituloPagina','CRUD con laravel 8')

<div class="card">
  <h5 class="card-header">crud laravel 8</h5>
  <div class="card-body">
     <p>
      <br>
          <a href="{{route('personas.create')}}" class="btn btn-primary">
            <spam class="fas fa-user-plus fa-lg"></spam> Agregar persona
          </a>
        </p>
  </div>
{{-- @php
  print_r($datos);
@endphp --}}
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
    {{-- <h5 class="card-title text-center">/h5> <br> --}}
    <div class="table table-responsive"> 
      <table class="table table-hover">
      <thead>
        <th scope="col">ID </th>
        <th scope="col">Nombre </th>
        <th scope="col">Apellido paterno </th>
        <th scope="col">Apellido Materno </th>
        <th scope="col">Fecha de nacimiento </th>
        <th scope="col">Tel 1 </th>
        <th scope="col">Tel 2 </th>
        <th scope="col">Tel 3 </th>
        <th scope="col">Editar </th>
        <th scope="col">Eliminar </th>
      </thead>
      <tbody>
        @foreach ($datos as $item)        
        <tr>
           <th scope="row">{{$item->id}} </th>
           <td>{{$item->nombre}} </td>
           <td>{{$item->paterno}} </td>
           <td>{{$item->materno}} </td>
           <td>{{$item->fecha_nacimiento}} </td>

           <td>{{$item->telefono1}} </td>
           <td>{{$item->telefono2}} </td>
           <td>{{$item->telefono3}} </td>
           <td>
              <form action="{{route("personas.edit", $item->id)}}" method="GET">
                <button class="btn btn-warning btn-sm">
                  <spam class="fas fa-user-edit fa-lg"></spam> 
                </button>
              </form>
           </td>

           <td>
            <form action="{{route("personas.show", $item->id)}}" method="GET">
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
        {{$datos->links()}}
      </div> 
    </div>
</div>
@endsection

