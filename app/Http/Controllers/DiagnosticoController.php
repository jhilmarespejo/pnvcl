<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
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
     * @param  \App\Models\diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function show(diagnostico $diagnostico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function edit(diagnostico $diagnostico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, diagnostico $diagnostico)
    {
        //return $request;

         Diagnostico::where('datos_personales_id', '=', $request['diagnostico']['datos_personales_id'])->update($request['diagnostico']);
        
        return redirect("paciente/edit/".$request['diagnostico']['datos_personales_id'])->with('success', '!Dato actualizado con éxito¡');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function destroy(diagnostico $diagnostico)
    {
        //
    }
}
