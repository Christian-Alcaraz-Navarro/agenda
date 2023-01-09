@extends('layouts/plantilla')

@section('tituloPagina',"Actualizar registro")

@section('contenido')    
    



<div class="card">
  <div class="card-body">
    <br>
    <div class="row text-center">
      <div class="card-body">
        <div class="card-header bg-secondary text-white ">
          Actualizar registro de persona
        </div>
      </div>
    </div>

    <p class="card-text">
      <form action="{{route('personas.update', ['Personas->id'])}}" method="POST">     
        @csrf
        @method("PUT")

        <p class="card-text">
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Estas actualizando el registro # {{$personas->id}}</strong> Estas seguro que no la vas a regar?????.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </p>     
      
        <div class="row">      
          <div class="col-5">
            <label for="">Nombre </label>
            <input type="text" name="nombre" class="form-control" required value="{{$personas->nombre}}">
            <br>
          </div>

          <div class="col-5">
            <label for="">Apellido paterno </label>
            <input type="text" name="paterno" class="form-control" required  value="{{$personas->paterno}}">
            <br>
          </div>

          <div class="col-5">
            <label for="">Apellido materno </label>
            <input type="text" name="materno" class="form-control" required  value="{{$personas->materno}}">
            <br>
          </div>

          <div class="col-5">
            <label for="">Fecha de nacimiento </label>
            <input type="date" name="fecha_nacimiento" class="form-control" required value="{{$personas->fecha_nacimiento}}">
            <br>
          </div>

          <div class="col-5">
            <input type="text" name="telefonos" id="telefonos" class="form-control" >
          </div> 
    </p>
  </div>
</div>

  <div class="row">
    <div class="col-sm-5">
      <div class="card">
        <div class="card-body text-center">
          <label class="btn btn-primary" id="agregar">
            <spam class="fas fa-plus-square text-center " ></spam> Agregar telefono
          </label>
          <div class="card bg-light border-light  ">
            <div class="container">
              <p class="card-text">
                <div  id="dinamic"  " name="telefono">
                </div>
                <script src="/js/editar.js"></script>
              </p>
            </div>  
          </div>
          <p class="card-text">
            
          <div class="col">
            
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-2">
      <div class="card">
        <div class="card-body ">
          <p class="card-text">
            <a href="{{ route("personas.index")}}" class="btn btn-outline-dark mb-3" disabled >
                <spam class="fas fa-undo fa-lg"> </spam>__Regresar
            </a>
            <button class="btn btn-warning"> 
              <spam class="fas fa-user-edit fa-lg"></spam> Actualizar
            </button> 
          </p>
          </a>
        </div>
      </div>
    </div>
  </div>



  </form>
</div> 

</div>
@endsection