<?php

namespace App\Http\Controllers;

use App\Models\datosPersonales;

use Illuminate\Http\Request;

class DatosPersonalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return('INDEX');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datosPersonales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //     $request->validate([
    //         'datos_personales.nombres' => 'required|string|max:150',
    //         'datos_personales.apellidos' => 'required|string|max:150',
    //         'datos_personales.ci' => 'required|string|max:12',
    //         'datos_personales.ci_exp' => 'required|string|max:4',
    //         'datos_personales.sexo' => 'required|string|max:10',
    //         'datos_personales.fecha_nacimiento' => 'required|date',
    //         'datos_personales.edad' => 'required|numeric',
    //         'datos_personales.celular' => 'required|numeric',
    //         'datos_personales.telefono' => 'required|numeric',
    //         'datos_personales.zona' => 'required|string|max:100',
    //         'datos_personales.calle' => 'required|string|max:100',
    //         'datos_personales.numero' => 'required|string|max:20',
    //         // 'datos_personales.latlng' => 'required|string|max:1',
    //         // 'datos_personales.url_croquis' => 'required|string|max:',
    //         'datos_personales.tiempo_res_actual_cantidad' => 'required|numeric',
    //         'datos_personales.tiempo_res_actual_unidad' => 'required|string|max:6',
    //         'datos_personales.ocupacion_paciente' => 'required|string|max:100',
    //         'datos_personales.vive_solo' => 'required|string|max:2',
    //         'datos_personales.celular_referencia' => 'required|numeric',
    //         'datos_personales.serv_salud_cercano' => 'required|string|max:150',
    //         'datos_personales.lugar_contagio' => 'required|string|max:200',
    //         'datos_personales.contacto_lepra' => 'required|string|max:2',
    //         'datos_personales.parentesco'  => 'required|string|max:40',

    //         'datos_clinicos.inicio_sintomas' => 'required|digits:4',
    //         'datos_clinicos.tiempo_evolucion_cantidad' => 'required|digits:1',
    //         'datos_clinicos.tiempo_evolucion_unidad' => 'required|string|max:5',
    //         'datos_clinicos.descripcion_primeros_signos' => 'required|string',
    //         'datos_clinicos.cuadro_clinico_actual' => 'required|string',

    //         'bacteriologia.fecha_muestra' => 'required|date',
    //         'bacteriologia.laboratorio' => 'required|string|max:200',
    //         'bacteriologia.linfa' => 'required|string|max:40',
    //         'bacteriologia.fecha_resultado' => 'required|date',
    //         'bacteriologia.resultado_lobulo_oreja' => 'required|string|max:10',
    //         'bacteriologia.resultado_lesion' => 'required|string|max:10',
    //         'bacteriologia.resultado_codo' => 'required|string|max:10',

    //         'histopatologia.laboratorio_informe' => 'required|string',
    //         'histopatologia.resultado_histopatologico' => 'required|string',

    //         'diagnostico.cabeza' => 'required|string',
    //         'diagnostico.tronco' => 'required|string',
    //         'diagnostico.ext_superiores' => 'required|string',
    //         'diagnostico.ext_inferiores' => 'required|string',

    //     ],[
    //         'required' => 'Dato incompleto',
    //         'max' => 'Dato muy extenso',
    //     ],
    // );
       
        //$datosPersonales = $request->except('_token', 'datos_clinicos', 'bacteriologia', 'control_contactos', 'recidencia_anterior');
       // datosPersonales::insert($datosPersonales);
        $datosPersonales = $request->only('datos_personales');
        return ($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DatosPersonales  $datosPersonales
     * @return \Illuminate\Http\Response
     */
    public function show(DatosPersonales $datosPersonales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DatosPersonales  $datosPersonales
     * @return \Illuminate\Http\Response
     */
    public function edit(DatosPersonales $datosPersonales)
    {
        return('EDIT');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DatosPersonales  $datosPersonales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DatosPersonales $datosPersonales)
    {
        return('UPDAxTE');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DatosPersonales  $datosPersonales
     * @return \Illuminate\Http\Response
     */
    public function destroy(DatosPersonales $datosPersonales)
    {
        return('DESTROY');
    }
}


