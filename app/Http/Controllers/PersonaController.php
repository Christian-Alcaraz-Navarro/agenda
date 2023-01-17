<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use App\Models\Telefonos;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class PersonaController extends Controller
{
    /**

     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas= Personas::all();
        $telefonos = Telefonos::all('id_persona','telefono');
        //$maximot=Telefonos::groupBy('id_persona')->count('id_persona')->orderby('id_persona','desc');
        $colleccion = Telefonos::selectRaw('COUNT(`id_persona`) AS total, id_persona')->groupBy('id_persona')->orderBy('total','desc')->first();
        $maximot=0;
        if (isset($colleccion->total)) 
            $maximot = $colleccion->total;              
        return view('inicio',compact('personas','telefonos','maximot'));
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

 
    public function edit($id)
    {
        $personas= Personas::with('telefonos')->where('id',$id)->first();
        return view('actualizar',compact('personas'));
    }

    /**

     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personas  $personas
     * @param  \App\Models\Telefonos  $telefonos
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $persona = Personas::find($id);
        $persona->nombre = $request->input('nombre');
        $persona->paterno = $request->input('paterno');
        $persona->materno = $request->input('materno');
        $persona->fecha_nacimiento = $request->input('fecha_nacimiento');
        $persona->save();

        $arrayTelf = explode(",",$request->final);
        

        foreach ($arrayTelf as $key => $final) {
            $telefonos= new Telefonos();
            $telefonos->id_persona = $id;
            logger($telefonos->telefono =$final);
            $telefonos->save();
        }
        //$persona->telefonos->detach();
        return redirect()->route("personas.index")->with("success","Actualizado con exito");
    }

    /**

     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $numero= Personas::with('telefonos')->where('id',$id);

        Telefonos::where('id_persona', $id)->delete();
        $personas = Personas::find($id);
        $personas->delete();
        return redirect()->route("personas.index")->with("success","Eliminado con exito");
    }
}



