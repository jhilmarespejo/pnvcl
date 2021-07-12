<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\DatosPersonales;
// use App\Models\ResidenciaAnterior;
// use App\Models\ControlContactos;
// use App\Models\Discapacidad;
// use App\Models\DatosClinicos;
// use App\Models\Bacteriologia;
// use App\Models\Histopatologia;
// use App\Models\Diagnostico;
// use App\Models\Tratamiento;
// use App\Models\IdentificacionCaso;
// use App\Models\Notificacion;


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
        
         $request->validate([
    //         'datos_personales.nombres' => 'required|string|max:150',
    //         'datos_personales.apellidos' => 'required|string|max:150',
             'datos_personales.ci' => 'required|string|unique',
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

    //         'diagnostico.fecha_diagnostico' => 'required|date',
    //         'diagnostico.cabeza' => 'required|string',
    //         'diagnostico.tronco' => 'required|string',
    //         'diagnostico.ext_superiores' => 'required|string',
    //         'diagnostico.ext_inferiores' => 'required|string',

    //         'tratamiento.tto_anterior' => 'required|string',
    //         'tratamiento.actual_fecha_inicio' => 'required|date',

    //         'identificacion_caso.activa' => 'required|string',
    //         'notificacion.fecha' => 'required|date',
         ],[
            'required' => 'Dato incompleto',
            'max' => 'Dato muy extenso',
            'unique' => 'El dato YA existe',
        ],
     );
       
        //$datosPersonales = $request->except('_token', 'datos_clinicos', 'bacteriologia', 'control_contactos', 'residencia_anterior');

        //$datos_personales = $request['datos_personales'];
        $pacienteId = DB::table('datos_personales')->insertGetId($request['datos_personales']);


        for($i=0; $i< count($request['residencia_anterior']); $i++ ){
            if( isset($request['residencia_anterior'][$i]['municipio_id']) ){
                $residenciaAnterior[$i] = array_merge(['datos_personales_id'=>$pacienteId], $request['residencia_anterior'][$i]);
            }  
        }
        DB::table('residencia_anterior')->insert( $residenciaAnterior);

        for($i=0; $i< count($request['control_contactos']); $i++ ){
            if( isset($request['control_contactos'][$i]['apellidos']) && isset($request['control_contactos'][$i]['nombres']) ){
                $controlContactos[$i] = array_merge(['datos_personales_id'=>$pacienteId], $request['control_contactos'][$i]);
            }    
        }
        DB::table('control_contactos')->insert($controlContactos);

        for($i=0; $i< count($request['discapacidad']); $i++ ){
            if( isset($request['discapacidad'][$i]['manos_lat']) || 
            isset($request['discapacidad'][$i]['pies_lat']) ||
            isset($request['discapacidad'][$i]['ojos_lat']) ){
                $discapacidad[$i] = array_merge(['datos_personales_id'=>$pacienteId], $request['discapacidad'][$i]);
                $j=$i;
            }    
        }
        DB::table('discapacidad')->insert($discapacidad);

        if(isset($request['discapacidad']['8']['lesiones_faringeas']) ||
            isset($request['discapacidad']['8']['aplastamiento_nariz']) ||
            isset($request['discapacidad']['8']['paralisis_fasial']) ||
            isset($request['discapacidad']['8']['otros'])){
                $otrasLesiones[$j+1] = array_merge(['datos_personales_id'=>$pacienteId], $request['discapacidad'][8]);
            DB::table('discapacidad')->insert($otrasLesiones);
        }    
        

        $datosClinicos = array_merge(['datos_personales_id'=>$pacienteId], $request['datos_clinicos']);
        DB::table('datos_clinicos')->insert($datosClinicos);

        $bacteriologia = array_merge(['datos_personales_id'=>$pacienteId], $request['bacteriologia']);
        DB::table('bacteriologia')->insert($bacteriologia);

        $histopatologia = array_merge(['datos_personales_id'=>$pacienteId], $request['histopatologia']);
        DB::table('histopatologia')->insert($histopatologia);

        $diagnostico = array_merge(['datos_personales_id'=>$pacienteId], $request['diagnostico']);
        DB::table('diagnostico')->insert($diagnostico);

        $tratamiento = array_merge(['datos_personales_id'=>$pacienteId], $request['tratamiento']);
        DB::table('tratamiento')->insert($tratamiento);

        $identificacionCaso = array_merge(['datos_personales_id'=>$pacienteId], $request['identificacion_caso']);
        $identificacionId = DB::table('identificacion_caso')->insertGetId($identificacionCaso);

        $notificacion = array_merge(['identificacion_caso_id'=>$identificacionId], $request['notificacion']);
        Db::table('notificacion')->insert($notificacion);

        return redirect('/')->with('success', '!Datos guardados con éxito¡');
        
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


