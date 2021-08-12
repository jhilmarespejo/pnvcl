<?php

namespace App\Http\Controllers;

// use App\Models\servicioSalud;
// use App\Models\provincia;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ServicioSaludController extends Controller
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
        if( $request->q == 'provincias' ){
            $provincias = DB::table('provincia')->where('sedes_id',$request->sedes_id)->get();
            return view('datosPersonales.servSalud', ['provincias' => $provincias, 'new_tag' => $request->new_tag]);
        }
        if( $request->q == 'municipios' ){
            $municipios = DB::table('municipio')->where('provincia_id',$request->provincia_id)->get();
            return view('datosPersonales.servSalud', ['municipios' => $municipios, 'new_tag' => $request->new_tag]);
        }
        if( $request->q == 'sevicios_salud' ){
            $servicios_salud = DB::table('servicio_salud')->where('municipio_id',$request->municipio_id)->get();
            return view('datosPersonales.servSalud', ['servicios_salud' => $servicios_salud, 'new_tag' => $request->new_tag]);
        }
        if( $request->q == 'red_salud' ){
            $red_salud = DB::table('servicio_salud')
                ->select('red_salud.red_salud', 'red_salud.id')
                ->join('red_salud', 'red_salud.id', '=', 'servicio_salud.red_salud_id')
                ->where('servicio_salud.id',$request->id)
                ->get();
            return view('datosPersonales.servSalud', ['red_salud' => $red_salud]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\servicioSalud  $servicioSalud
     * @return \Illuminate\Http\Response
     */
    public function edit(servicioSalud $servicioSalud)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\servicioSalud  $servicioSalud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, servicioSalud $servicioSalud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\servicioSalud  $servicioSalud
     * @return \Illuminate\Http\Response
     */
    public function destroy(servicioSalud $servicioSalud)
    {
        //
    }
}
