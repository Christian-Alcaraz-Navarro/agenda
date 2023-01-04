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

            <form action="{{route('personas.guardar')}}" method="POST" >
              @csrf
              <div class="row">
                <div class="col-5">
                  <label for="">Nombre </label>
                  <input type="text" name="nombre" class="form-control" >
                  <br>
                </div>
                
                <div class="col-5">
                  <label for="">Apellido paterno </label>
                  <input type="text" name="paterno" class="form-control" >
                  <br>
                </div>

                <div class="col-5">
                  <label for="">Apellido materno </label>
                  <input type="text" name="materno" class="form-control" >
                  <br>
                </div>

                <div class="col-5">
                  <label for="">Fecha de nacimiento </label>
                  <input type="date" name="fecha_nacimiento" class="form-control" >
                  <br>
                </div>
              </div>
          </div>    
        </div>
          </p>  
           
          <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="row text-center">
                    <div class="card-body">
                     <div class="card-header bg-secondary mb-3 text-white ">
                        Agregar Telefonos
                     </div>

                     <div class="card w-4" 
                     <div class="container  bg-dark mb-3 text-white">
                       <p class="card-text">
                        <label class="btn btn-primary" id="agregar"> 
                          <spam class="fas fa-plus-square align " ></spam> Agregar telefono
                          
                        </label>
                      
                      
                   <div class="card  bg-light">
                   
                    
                     <div class="container">
                      <p class="card-text">
                              <div class=" text-black" id="dinamic" class="form-control"></div>
                              <script src="js/main.js"></script>
                              {{-- <input type="hidden" name="dimension" id="dimension" value="{{$total}}>  --}}
                              </div> 
                              
                      </p>
                    </div> 
                    </div>
                  </div>
                </div>
                      
                    </div>
                  </div>
                </div>
            

            <div class="col-sm-2 ">
              <div class="card bg-warning">
                <div class="card-body">
                  <p class="card-text">

                    <button class="btn btn-primary"> 
                      <spam class="fas fa-user-plus"></spam> GUARDAR
                    </button>
                  </p>
                    <a href="{{ route("personas.index")}}" class="btn btn-secondary">
                    <spam class="fas fa-undo"> </spam> REGRESAR
                    </a>
                  
                </div>
              </div>
            </div>

          </div>
        </div>

          </div>
        </div>
        </div>
        
       </div>  
</form>

        </div>   
      
      


      

@endsection