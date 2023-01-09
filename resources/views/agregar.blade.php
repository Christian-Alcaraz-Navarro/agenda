@extends('layouts/plantilla')

@section('tituloPagina',"Crear un nuevo registro")

@section('contenido')

<div class="card col-9 sm-5" >
  <div class="container text-center bg-dark mb-3 text-white">
    <p class="card-text">
     <div class="row text-center">
        <div class="">
          <div class="card-body">
            <div class="card-header bg-secondary mb-3 text-white ">
              Agregar nueva persona
            </div>
          </div>
        </div>
      </div>
    </p> 
    <form action="{{route('personas.guardar')}}" method="POST" >
      @csrf
      <div class="row">
        <div class="col-5">
          <label for="">Nombre </label>
          <input type="text" name="nombre" class="form-control" value="automatico">
          <br>
        </div>

        <div class="col-5">
          <label for="">Apellido paterno </label>
          <input type="text" name="paterno" class="form-control" value="automatico">
          <br>
        </div>

        <div class="col-5">
          <label for="">Apellido materno </label>
          <input type="text" name="materno" class="form-control" value="automatico">
          <br>
        </div>

        <div class="col-5">
          <label for="">Fecha de nacimiento </label>
          <input type="date" name="fecha_nacimiento" class="form-control" >
          <br>
        </div>    
            
        <div class="col-5">
          <input type="text"  name="telefonos" id="telefonos" class="form-control" >
        </div>    
      </div>
  </div>              

 <div class="row">
  <div class="col-sm-8">
    <div class="card">
      <div class="container text-white bg-light">
        <p>
          <label class="btn btn-warning" id="agregar">
            <spam class="fas fa-plus-square text-align-center" ></spam> Agregar telefono
          </label>

          <div class="card bg-light border-light  ">
            <div class="container">
              <p class="card-text">
                <div  id="dinamic"  " name="telefono">
                </div>
                <script src="js/agregar.js"></script>
              </p>
            </div>  
          </div>
        </p>
      </div>

    </div>
  </div>

  <div class="col-sm-3 " >
    <div class="card">
      <div class="card-body ">
        <p class="card-text">
          <button class="btn btn-primary">
            <spam class="fas fa-user-plus">
            </spam> GUARDAR
          </button>
        </p>
        <a href="{{ route("personas.index")}}" class="btn btn-secondary">
          <spam class="fas fa-undo"> 
          </spam> REGRESAR
        </a>
      </div>
    </div>
  </div>
  </form> 
</div>
@endsection
