<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function show(tratamiento $tratamiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function edit(tratamiento $tratamiento)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tratamiento $tratamiento)
    {
        Tratamiento::where('datos_personales_id', '=', $request['tratamiento']['datos_personales_id'])->update($request['tratamiento']);
        return redirect("paciente/edit/".$request['tratamiento']['datos_personales_id'])->with(['success' => '!Dato actualizado con éxito¡']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(tratamiento $tratamiento)
    {
        //
    }
}
