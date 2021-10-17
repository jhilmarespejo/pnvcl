<?php

namespace App\Http\Controllers;

use App\Models\ControlProgramaTto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
    public function edit($id)
    {
        $patientRecords = DB::table('municipio')
        ->select('datos_personales.id', 'datos_personales.nombres', 'datos_personales.apellidos', 'datos_personales.edad', 'datos_personales.sexo', 'datos_personales.localidad', 'datos_personales.zona', 'datos_personales.calle', 'datos_personales.numero', 'datos_personales.historia_clinica', 'datos_personales.num_ficha', 'servicio_salud.serv_salud',  'diagnostico.fecha_diagnostico', 'diagnostico.diagnostico',  'tratamiento.actual_fecha_inicio', 'tratamiento.esquema_actual')
        
        ->join('servicio_salud', 'servicio_salud.municipio_id', '=', 'municipio.id')
        ->join('datos_personales', 'datos_personales.servicio_salud_id', '=', 'servicio_salud.id')
        ->leftjoin('diagnostico', 'diagnostico.datos_personales_id', '=', 'datos_personales.id')
        ->leftjoin('tratamiento', 'tratamiento.datos_personales_id', '=', 'datos_personales.id')
        // ->leftjoin('control_contactos', 'control_contactos.datos_personales_id', '=', 'datos_personales.id')
        ->where('datos_personales.id', $id)
        ->get();

        $tracing = DB::table('control_programa_tto')->where('datos_personales_id','=', $id)->get();
        $discapacidades = DB::table('discapacidad')->where('datos_personales_id','=', $id)->where('termino_tto','=', 'Si')->get();

        //return view('seguimiento.edit', ['patientRecords' => $patientRecords, 'tracing' => $tracing], discapacidades);
        return view('seguimiento.edit', compact(['patientRecords', 'tracing', 'discapacidades']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->rol == 'Administrador' || Auth::user()->rol == 'Operativo' || Auth::user()->rol == 'Super' ){
            $request->validate([
                'fecha' => 'required|date',
                'poliquimioterapia' => 'required|date',

                'culmina_tto' => 'exclude_if:alta_medica.alta_medica_check,null|required|string|max:100',
                'fecha_fin_tto' => 'exclude_if:alta_medica.alta_medica_check,null|required|date',
                'notificador_alta' => 'exclude_if:alta_medica.alta_medica_check,null|required|string|max:200',

                'er_fecha' => 'required_with:er_eritema_nl,er_reversion,er_fen_luc,er_otros',

                'er_eritema_nl' => 'exclude_if:er_fecha,null|required_without_all:er_reversion,er_fen_luc,er_otros',
                'er_reversion' => 'exclude_if:er_fecha,null|required_without_all:er_eritema_nl,er_fen_luc,er_otros',
                'er_fen_luc' => 'exclude_if:er_fecha,null|required_without_all:er_eritema_nl,er_reversion,er_otros',
                'er_otros' => 'exclude_if:er_fecha,null|required_without_all:er_reversion,er_fen_luc,er_eritema_nl',
                            
            ],[
                'required' => 'Dato incompleto',
                'required_with' => 'Dato incompleto',
                'required_without_all' => 'Dato incompleto',
            ]
            );
            
            DB::table('control_programa_tto')->insert( request()->except(['_token', 'discapacidad', 'alta_medica']) );

            if( isset($request['discapacidad']) ){
                //return $request;
                for( $i=0; $i< count($request['discapacidad']); $i++ ){
                    if( $i < '8' ){
                        $discapacidad[$i] = array_merge(['datos_personales_id'=>$request['datos_personales_id']], $request['discapacidad'][$i]);
                    }    
                }
                if( isset($discapacidad) ) {
                    DB::table('discapacidad')->insert($discapacidad);
                }
                if(isset($request['discapacidad']['8']['lesiones_faringeas']) ||
                    isset($request['discapacidad']['8']['aplastamiento_nariz']) ||
                    isset($request['discapacidad']['8']['paralisis_fasial']) ||
                    isset($request['discapacidad']['8']['otros'])){
                        $otrasLesiones[$i+1] = array_merge(['datos_personales_id'=>$request['datos_personales_id']], $request['discapacidad'][8]);
                    DB::table('discapacidad')->insert($otrasLesiones);
                }    
            }

            return redirect("seguimiento/edit/".$request->datos_personales_id)->with('success', '!Dato guardado con éxito¡');
        } else{
             return redirect(str_replace(url('/'), '', url()->previous()));
        }

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
    public function create(controlProgramaTto $controlProgramaTto)
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
