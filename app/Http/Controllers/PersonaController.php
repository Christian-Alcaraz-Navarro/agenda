<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use App\Models\Telefonos;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**

     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $personas= Personas::all();
        $telefonos= Telefonos::all();
        // $idPersona = 1;
        // $telefonosPersona = Personas::with('telefonos')->where('id',$idPersona)->get();
        
        // logger($telefonosPersona);
        return view('inicio',compact('personas','telefonos'));
    }

    /**

     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         return view('agregar');
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Revisar comentarios en migracion para crear tabla de telefonos
        $arrayTelfonos = [];//Definimos var tipo array
        //Validamos que el campo telefonos contenga valores y si contiene creamos array por telefono separandolo por comos
        if ($request->telefonos != null && $request->telefonos != null) {
            $arrayTelfonos = explode(",", $request->telefonos);//Explode es una funcion predefinida de php que permite crear array a partir de una cadena pasandole un un separador y la cadena ver documentacion
        }

        $personas= new personas();  //TODO: Recuerda que un modelo simpre va en singular y con mayuscula la primera porque es una Clase de PHP corrigelo
        $personas->id = $request->post('id');
        $personas->nombre = $request->post('nombre');
        $personas->paterno = $request->post('paterno');
        $personas->materno = $request->post('materno');
        $personas->fecha_nacimiento = $request->post('fecha_nacimiento');
        $personas->save();
        //Obtner el id del modelo que se inserto
        $personas->id = $request->post('id');
        $id = $personas->id;

        //iterar $arrayTelfonos y hacer un incert por cada valor en el array y guardar en telfonos
        foreach ($arrayTelfonos as $key => $telefono) {
            $telefonos = new telefonos();//TODO: Corregir modelo Telefono
            $telefonos->id_persona = $id;
            $telefonos->telefono = $telefono;
            $telefonos->save();
        }

        return redirect()->route("personas.index")->with("success","Agregado con exito");

        // return redirect()->route("personas.index")->with("success","Agregado con exito");

    }

    /**

     *
     * @param  \App\Models\Personas  $telefonos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personas= Personas::find($id);
         return view('eliminar',compact('personas'));
    }

    /**
     *
     * @param  \App\Models\Personas  $personas
     * @param  \App\Models\Telefonos  $telefonos
     * @return \Illuminate\Http\Response
     */

 
    public function edit($id,Request $request)
    {
        $personas= Personas::with('telefonos')->where('id',$id)->first();
        $arrayTelfonos = [];//Definimos var tipo array
        //Validamos que el campo telefonos contenga valores y si contiene creamos array por telefono separandolo por comos
        // if ($request->telefonos != null && $request->telefonos != null) {
        //     logger($arrayTelfonos = explode(",", $request->telefonos));//Explode es una funcion predefinida de php que permite crear array a partir de una cadena pasandole un un separador y la cadena ver documentacion
        // }
        return view('actualizar',compact('personas'));
    }

    /**

     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personas  $personas
     * @param  \App\Models\Telefonos  $telefonos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Personas $persona)
    {
        $id = $request->post('id');
        // $persona= Personas::with('telefonos')->where('id',$id)->first();
        $persona->nombre = $request->input('nombre');
        $persona->paterno = $request->input('paterno');
        $persona->materno = $request->input('materno');
        $persona->fecha_nacimiento = $request->input('fecha_nacimiento');
        $persona->save();
        $arrayTelf = explode(",",$request->telefonos);
        

        foreach ($arrayTelf as $key => $telefono) {
            $telefonos= new Telefonos();
            $telefonos->id_persona = $id;
            logger($telefonos->telefono =$telefono);
            $telefonos->save();
        }
        
        
        // $persona->telefonos->detach();

        return redirect()->route("personas.index")->with("success","Actualizado con exito");
    }

    /**

     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personas = Personas::find($id);
        $personas->delete();

        return redirect()->route("personas.index")->with("success","Eliminado con exito");
    }
}



