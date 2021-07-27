<?php

namespace App\Http\Controllers;

use App\Models\ControlProgramaTto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlProgramaTtoController extends Controller
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
    public function create($id)
    {
        $patientRecords = DB::table('municipio')
        ->select('datos_personales.id',
        'datos_personales.nombres',
        'datos_personales.apellidos',
        'datos_personales.edad',
        'datos_personales.sexo',
        'datos_personales.localidad',
        'datos_personales.zona',
        'datos_personales.calle',
        'datos_personales.numero',
        'datos_personales.historia_clinica',
        'datos_personales.num_ficha',
        'servicio_salud.serv_salud',

        'diagnostico.fecha_diagnostico',
        'diagnostico.multibacilar_lepromatosa',
        'diagnostico.multibacilar_dimofa',
        'diagnostico.paucibacilar_tuberculoide',
        'diagnostico.paucibacilar_indeterminada',

        'tratamiento.actual_fecha_inicio')
        
        ->join('servicio_salud', 'servicio_salud.municipio_id', '=', 'municipio.id')
        ->join('datos_personales', 'datos_personales.servicio_salud_id', '=', 'servicio_salud.id')
        ->leftjoin('diagnostico', 'diagnostico.datos_personales_id', '=', 'datos_personales.id')
        ->leftjoin('tratamiento', 'tratamiento.datos_personales_id', '=', 'datos_personales.id')
        ->leftjoin('control_contactos', 'control_contactos.datos_personales_id', '=', 'datos_personales.id')
        ->where('datos_personales.id', $id)
        ->get();

        return view('seguimiento.create', ['patientRecords' => $patientRecords]);
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
     * @param  \App\Models\controlProgramaTto  $controlProgramaTto
     * @return \Illuminate\Http\Response
     */
    public function show(controlProgramaTto $controlProgramaTto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\controlProgramaTto  $controlProgramaTto
     * @return \Illuminate\Http\Response
     */
    public function edit(controlProgramaTto $controlProgramaTto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\controlProgramaTto  $controlProgramaTto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, controlProgramaTto $controlProgramaTto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\controlProgramaTto  $controlProgramaTto
     * @return \Illuminate\Http\Response
     */
    public function destroy(controlProgramaTto $controlProgramaTto)
    {
        //
    }
}
