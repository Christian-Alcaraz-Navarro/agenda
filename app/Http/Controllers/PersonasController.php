<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    /**

     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // \DB::enableQueryLog();
        $datos= Personas::orderBy('paterno','asc')->paginate(3);
        // $query = \DB::getQueryLog();
        return view('inicio',compact('datos'));
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
        $personas->nombre = $request->post('nombre');
        $personas->paterno = $request->post('paterno');
        $personas->materno = $request->post('materno');
        $personas->fecha_nacimiento = $request->post('fecha_nacimiento');

        $id_telefono->integer('category_id')->unsigned();
            $personas->foreign('category_id')->references('id')->on('categories');


        $personas->id_telefono = $request->post('id_telefono');

        $personas->save();
        return redirect()->route("personas.index")->with("success","Agregado con exito");
        // print_r($_POST);
    }

    /**

     *
     * @param  \App\Models\Personas  $personas
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personas= Personas::find($id);
         return view('actualizar',compact('personas'));
    }

    /**
     
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $personas = personas::find($id);

        $personas->nombre = $request->post('nombre');
        $personas->paterno = $request->post('paterno');
        $personas->materno = $request->post('materno');
        $personas->fecha_nacimiento = $request->post('fecha_nacimiento');
        $personas->save();

        return redirect()->route("personas.index")->with("success","Actualizado con exito");
        // print_r($_POST);
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
