<?php

namespace App\Http\Controllers;

use App\Models\residenciaAnterior;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResidenciaAnteriorController extends Controller
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
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\recidenciaAnterior  $recidenciaAnterior
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if( $request->q == 'provincias' ){
            $provincias = DB::table('provincia')->where('sedes_id',$request->sedes_id)->get();
            return view('residenciaAnterior.options', ['provincias' => $provincias, 'position' => preg_replace('/[^0-9]/', '', $request->position)]);
        }
        if( $request->q == 'municipios' ){
            $municipios = DB::table('municipio')->where('provincia_id',$request->provincia_id)->get();
            return view('residenciaAnterior.options', ['municipios' => $municipios, 'position' => preg_replace('/[^0-9]/', '', $request->position)]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\recidenciaAnterior  $recidenciaAnterior
     * @return \Illuminate\Http\Response
     */
    public function edit(residenciaAnterior $recidenciaAnterior)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\recidenciaAnterior  $recidenciaAnterior
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, residenciaAnterior $recidenciaAnterior)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\recidenciaAnterior  $recidenciaAnterior
     * @return \Illuminate\Http\Response
     */
    public function destroy(residenciaAnterior $recidenciaAnterior)
    {
        //
    }
}
