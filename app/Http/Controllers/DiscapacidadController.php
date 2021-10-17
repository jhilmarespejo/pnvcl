<?php

namespace App\Http\Controllers;

use App\Models\Discapacidad;
use Illuminate\Http\Request;

class DiscapacidadController extends Controller
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
        return $request;    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\discapacidad  $discapacidad
     * @return \Illuminate\Http\Response
     */
    public function show(discapacidad $discapacidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\discapacidad  $discapacidad
     * @return \Illuminate\Http\Response
     */
    public function edit(discapacidad $discapacidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\discapacidad  $discapacidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, discapacidad $discapacidad)
    {
        // return $request->discapacidad[8];
        for( $i=0; $i< count($request['discapacidad']); $i++ ){
            if( $i < '8' ){
                Discapacidad::where('id', '=', $request->discapacidad[$i]['id'])->update( $request->discapacidad[$i]);
            }    
        }
        Discapacidad::where('id', '=', $request->discapacidad[8]['id'])->update( $request->discapacidad[8]);
        return redirect("paciente/edit/".$request->datos_personales_id)->with('success', '!Dato actualizado con éxito¡');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\discapacidad  $discapacidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(discapacidad $discapacidad)
    {
        //
    }
}
