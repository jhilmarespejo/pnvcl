<?php

namespace App\Http\Controllers;

use App\Models\Histopatologia;
use Illuminate\Http\Request;

class HistopatologiaController extends Controller
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
     * @param  \App\Models\histopatologia  $histopatologia
     * @return \Illuminate\Http\Response
     */
    public function show(histopatologia $histopatologia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\histopatologia  $histopatologia
     * @return \Illuminate\Http\Response
     */
    public function edit(histopatologia $histopatologia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\histopatologia  $histopatologia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, histopatologia $histopatologia)
    {
        Histopatologia::where('datos_personales_id', '=', $request['histopatologia']['datos_personales_id'])->update($request['histopatologia']);
        
        return redirect("paciente/edit/".$request['histopatologia']['datos_personales_id'])->with('success', '!Dato actualizado con éxito¡');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\histopatologia  $histopatologia
     * @return \Illuminate\Http\Response
     */
    public function destroy(histopatologia $histopatologia)
    {
        //
    }
}
