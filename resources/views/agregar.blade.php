@extends('layouts/plantilla')

@section('tituloPagina',"Crear un nuevo registro")

@section('contenido')    
    
<div class="card">
        <div class="row text-center">
          <div class="">
            <div class="card-body">
             <div class="card-header bg-secondary mb-3 text-white ">
                Agregar nueva persona
             </div>
            </div>
          </div>
        </div>
        <div class="container">
          <p class="card-text">
            <form action="{{route('personas.guardar')}}" method="POST" >
              @csrf
              <div class="row">
                <div class="col-8">
                  <label for="">Nombre </label>
                  <input type="text" name="nombre" class="form-control" required>
                  <br>
                </div>
                
                <div class="col-8">
                  <label for="">Apellido paterno </label>
                  <input type="text" name="paterno" class="form-control" required>
                  <br>
                </div>

                <div class="col-8">
                  <label for="">Apellido materno </label>
                  <input type="text" name="materno" class="form-control" required>
                  <br>
                </div>

                <div class="col-10">
                  <label for="">Fecha de nacimiento </label>
                  <input type="date" name="fecha_nacimiento" class="form-control" required>
                  <br>
                </div>

                <div class="col-3">
                  <label for="">Tel 1 </label>
                  <input type="tel" name="Telefono_1" class="form-control" required>
                  <br>
                </div>  
                
                <div class="col-3">
                  <label for="">Tel 2 </label>
                  <input type="tel" name="Telefono_2" class="form-control" required>
                  <br>
                </div> 

                <div class="col-3">
                  <label for="">Tel 3 </label>
                  <input type="tel" name="Telefono_3" class="form-control" required>
                  <br>
                </div> 
                
              </div>
                  <br><br>
                <a href="{{ route("personas.index")}}" class="btn btn-secondary">
                <spam class="fas fa-undo"> </spam> Regresar
                </a>
                <button class="btn btn-primary"> 
                  <spam class="fas fa-user-plus"></spam> Agregar persona
                </button>
              
            </form>
          </p>

    </div>
    </div>
  </div>
@endsection