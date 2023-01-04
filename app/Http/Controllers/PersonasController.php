<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use App\Models\telefonos;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    /**

     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $datos= Personas::all();
        $telefonos= telefonos::all();
        return view('inicio',compact('datos','telefonos'));
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
        $personas= new personas();
        $personas->id = $request->post('id');
        $personas->nombre = $request->post('nombre');
        $personas->paterno = $request->post('paterno');
        $personas->materno = $request->post('materno');
        $personas->fecha_nacimiento = $request->post('fecha_nacimiento');
        $personas->save();

        $telefonos = $request->telefono;
        logger($request->all());
        $tel_input = $request->post('telefono');
        foreach ($request->post('telefono',[]) as $valor) { 
            $registrar = new telefonos();
            $registrar->telefono = $tel_input[$valor];
            $registrar->save();   
            // print_r($telefono->telefono);
            
            return redirect()->route("inicio")->with("success","Agregado con exito");
        }
        
        return redirect()->route("personas.index")->with("success","Agregado con exito");
        
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

    // public function edit($id)
    // {

    //     return view('actualizar',compact('personas','telefonos'));
    // }
    public function edit( $id)
    {
         $personas= Personas::find($id);
       
        $telefonos = telefonos::select('telefono')->where('id_per',$id)->get();
       // $telefonos= telefonos::find($id2);
        return view('actualizar',compact('personas','telefonos'));
    }
    


    /**
     
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personas  $personas
     * @param  \App\Models\Telefonos  $telefonos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Personas $persona, telefonos $telefono)
    {
        $persona->nombre = $request->input('nombre');
        $persona->paterno = $request->input('paterno');
        $persona->materno = $request->input('materno');
        $persona->fecha_nacimiento = $request->input('fecha_nacimiento');
        
        $telefono->telefono = $request->input('telefono');
        $persona->save();
        $telefono->save();

        return redirect()->route("personas.index")->with("success","Actualizado con exito");
    }

    /**
    
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personas = personas::find($id);
        $personas->delete();
        
        return redirect()->route("personas.index")->with("success","Eliminadocon exito");
    }
}


