<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use App\Models\telefonos;
use Illuminate\Http\Request;

class TelefonosController extends Controller
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

         $telefonos= new telefonos();
         $telefonos->id_per = $personas->id;
         $telefonos->telefono = $request->post('telefono');
         $telefonos->save();

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
    //     $personas= Personas::find($id);
    //     $telefonos = telefonos::select('telefono')->where('id_per',$id)->get();
    //    // $telefonos= telefonos::find($id2);
    //     return view('actualizar',compact('personas','telefonos'));
    // }
    public function edit($id)
    {
        $personas=new Personas();
        $personas= Personas::find($id);
        // $telefonos = Personas::find($id)->telefonos()->where('id_per', '=', '10')->first();
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
    public function update(Request $request, )
    {
        $persona = new Personas();
        $telefono = new telefonos();
        

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


