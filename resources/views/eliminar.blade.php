@extends('layouts/plantilla')

@section('tituloPagina',"Crear un nuevo registro")

@section('contenido')    
    
<div class="card">
  <br>
  <h5 class="card-header">Eliminar una Persona</h5>
  <div class="card-body">
    <p class="card-text">
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Santos protones batman!</strong> Estas seguro que no la vas a regar?????.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          </button>
      </div>
    </p>

    <table class="table table-hover">
      <thead>
        <th scope="col">ID </th>
        <th scope="col">Nombre </th>
        <th scope="col">Apellido paterno </th>
        <th scope="col">Apellido materno </th>
        <th scope="col">Fecha de nacimiento </th>
        <th scope="col">Tel 1 </th>
        <th scope="col">Tel 2 </th>
        <th scope="col">Tel 3 </th>
      </thead>

      <tbody>
        <tr>
          <th scope="row">{{$personas->id}}</th>
            <td>{{$personas->nombre}} </td>
            <td>{{$personas->paterno}} </td>
            <td>{{$personas->materno}} </td>
            <td>{{$personas->fecha_nacimiento}} </td>
            <td>{{$personas->fecha_nacimiento}} </td>
            <td>{{$personas->fecha_nacimiento}} </td>
            <td>{{$personas->fecha_nacimiento}} </td>
        </tr>
      </tbody>                 
    </table>
    <hr>

    <form action="{{ route("personas.destroy",$personas->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <a href="{{ route("personas.index")}}" class="btn btn-secondary">
      <spam class="fas fa-undo fa-lg"> </spam> Regresar
    </a>
      <button class="btn btn-danger">
      <spam class="fas fa-user-times fa-lg"></spam> Eliminar</button>
    </form>    
  </div>
</div>
@endsection
