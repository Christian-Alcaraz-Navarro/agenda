<?php

namespace App\Http\Controllers;

use App\Models\telefonos;
use Illuminate\Http\Request;

class TelefonosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $telefonos= new telefonos();
        $telefonos->telefono_1 = $request->post('telefono_1');
        $telefonos->telefono_2 = $request->post('telefono_2');
        $telefonos->telefono_3  = $request->post('telefono_3');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\telefonos  $telefonos
     * @return \Illuminate\Http\Response
     */
    public function show(telefonos $telefonos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\telefonos  $telefonos
     * @return \Illuminate\Http\Response
     */
    public function edit(telefonos $telefonos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\telefonos  $telefonos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, telefonos $telefonos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\telefonos  $telefonos
     * @return \Illuminate\Http\Response
     */
    public function destroy(telefonos $telefonos)
    {
        //
    }
}
