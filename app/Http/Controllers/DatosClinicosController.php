<?php

namespace App\Http\Controllers;

use App\Models\DatosClinicos;
use Illuminate\Http\Request;

class DatosClinicosController extends Controller
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
     * @param  \App\Models\datosClinicos  $datosClinicos
     * @return \Illuminate\Http\Response
     */
    public function show(datosClinicos $datosClinicos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\datosClinicos  $datosClinicos
     * @return \Illuminate\Http\Response
     */
    public function edit(datosClinicos $datosClinicos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\datosClinicos  $datosClinicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, datosClinicos $datosClinicos)
    {
        DatosClinicos::where('datos_personales_id', '=', $request['datos_clinicos']['datos_personales_id'])->update($request['datos_clinicos']);

       // return \Redirect::route('regions', ['id'=>$id,'OTHER_PARAM'=>'XXX',...])->with('message', 'State saved correctly!!!');

        return redirect("paciente/edit/".$request['datos_clinicos']['datos_personales_id'])->with(['success' => '!Dato actualizado con éxito¡']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\datosClinicos  $datosClinicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(datosClinicos $datosClinicos)
    {
        //
    }
}
