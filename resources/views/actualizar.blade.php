@extends('layouts/plantilla')

@section('tituloPagina',"Actualizar registro")

@section('contenido')    
    
<div class="card">
  <br>
  <div class="row text-center">
    <div class="card-body">
     <div class="card-header bg-secondary text-white ">
      Actualizar registro de persona
     </div>
    </div>
  </div>
      <p class="card-text">
        <form action="{{route('personas.update',$personas->id)}}" method="POST">
          @csrf
          @method("PUT")

          <div class="row">
            <div class="col-8">
              <label for="">Nombre </label>
              <input type="text" name="nombre" class="form-control" required value="{{$personas->nombre}}">
              <br>
            </div>

            <div class="col-8">
              <label for="" class="label ma">Apellido paterno </label>
              <input type="text" name="paterno" class="form-control" required required value="{{$personas->paterno}}">
              <br>
            </div>

            <div class="col-8">
              <label for="">Apellido materno </label>
              <input type="text" name="materno" class="form-control" required required value="{{$personas->materno}}">
              <br>
            </div>

            <div class="col-10">
              <label for="">Fecha de nacimiento </label>
              <input type="date" name="fecha_nacimiento" class="form-control" required required value="{{$personas->fecha_nacimiento}}">
              <br>
            </div>

            <div class="col-4">
              <label for="">Tel 1 </label>
              <input type="tel" name="Telefono_1" class="form-control" required required value="{{$personas->fecha_nacimiento}}">
              <br>
            </div>

            <div class="col-4">
              <label for="">Tel 2 </label>
              <input type="tel" name="Telefono_2" class="form-control" required required value="{{$personas->fecha_nacimiento}}">
              <br>
            </div>

            <div class="col-4">
              <label for="">Tel 3 </label>
              <input type="tel" name="Telefono_3" class="form-control" required required value="{{$personas->fecha_nacimiento}}">
              <br>
            </div>



            </div>
            <br>
            <a href="{{ route("personas.index")}}" class="btn btn-outline-dark" disabled>
                <spam class="fas fa-undo fa-lg"> </spam> Regresar
             </a>
            <button class="btn btn-warning"> 
              <spam class="fas fa-user-edit fa-lg"></spam> Actualizar
            </button>
        </form>
      </p>

    </div>
  </div>
@endsection