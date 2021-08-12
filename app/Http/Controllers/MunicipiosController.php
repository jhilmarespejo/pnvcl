<?php

namespace App\Http\Controllers;

// use App\Models\servicioSalud;
 use App\Models\Municipio;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MunicipiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param  \App\Models\servicioSalud  $servicioSalud
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // if( $request->q == 'provincias' ){
        //     $provincias = DB::table('provincia')->where('sedes_id',$request->sedes_id)->get();
        //     return view('datosPersonales.servSalud', ['provincias' => $provincias]);
        // }
        if( $request->q == 'municipios' ){
            //return $request;
            $municipios = DB::table('municipio')
            ->select('municipio')
            ->where('municipio', 'LIKE', '%'. $request->municipio. '%')
            ->get();
            return view('Municipios.show', ['municipios' => $municipios]);
        }
        // if( $request->q == 'sevicios_salud' ){
        //     $servicios_salud = DB::table('servicio_salud')->where('municipio_id',$request->municipio_id)->get();
        //     return view('datosPersonales.servSalud', ['servicios_salud' => $servicios_salud]);
        // }
        // if( $request->q == 'red_salud' ){
        //     $red_salud = DB::table('servicio_salud')
        //         ->select('red_salud.red_salud', 'red_salud.id')
        //         ->join('red_salud', 'red_salud.id', '=', 'servicio_salud.red_salud_id')
        //         ->where('servicio_salud.id',$request->id)
        //         ->get();
        //     return view('datosPersonales.servSalud', ['red_salud' => $red_salud]);
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\servicioSalud  $servicioSalud
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\servicioSalud  $servicioSalud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\servicioSalud  $servicioSalud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request /*servicioSalud $servicioSalud*/)
    {
        //
    }
}
