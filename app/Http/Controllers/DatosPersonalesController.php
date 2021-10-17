<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\DatosPersonales;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;
// use App\Models\ResidenciaAnterior;
// use App\Models\ControlContactos;
use App\Models\Discapacidad;
use App\Models\DatosClinicos;
use App\Models\Bacteriologia;
use App\Models\Histopatologia;
use App\Models\Diagnostico;
use App\Models\Tratamiento;
use App\Models\IdentificacionCaso;
use Illuminate\Support\Facades\Auth;
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
       
        $records = DB::table('municipio')
        ->select('datos_personales.id', 'datos_personales.nombres', 'datos_personales.apellidos', 'datos_personales.edad', 'datos_personales.sexo', 'diagnostico.fecha_diagnostico', 'datos_personales.localidad', 'municipio.municipio', 'datos_personales.baar', 'diagnostico.diagnostico', 'tratamiento.actual_fecha_inicio', 'tratamiento.esquema_actual')
        
        ->join('servicio_salud', 'servicio_salud.municipio_id', '=', 'municipio.id')
        ->join('datos_personales', 'datos_personales.servicio_salud_id', '=', 'servicio_salud.id')
        ->leftjoin('diagnostico', 'diagnostico.datos_personales_id', '=', 'datos_personales.id')
        ->leftjoin('tratamiento', 'tratamiento.datos_personales_id', '=', 'datos_personales.id')
        ->leftjoin('control_contactos', 'control_contactos.datos_personales_id', '=', 'datos_personales.id')
        ->groupBy('datos_personales.id')
        ->get();

        //return $records;
        return view('datosPersonales.index', ['records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        if(Auth::user()->rol == 'Operativo' || Auth::user()->rol == 'Super'){
            return view('datosPersonales.create');
        }else{
            return redirect('paciente/index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;

        $request->validate([
            'datos_personales.tipo_caso' => 'required',
            'datos_personales.caso' => 'required',
            'datos_personales.historia_clinica' => 'required|string|max:40',
            'datos_personales.nombres' => 'required|string|max:150',
            'datos_personales.apellidos' => 'required|string|max:150',
            'datos_personales.ci_exp' => 'required|string|max:10',
            'datos_personales.ci' => 'exclude_if:datos_personales.ci_exp,Sin CI|required|unique:datos_personales|string|max:150',

            'datos_personales.otro_documento' => 'exclude_unless:datos_personales.ci_exp,Sin CI|required',
            'datos_personales.otro_documento_numero' => 'exclude_unless:datos_personales.ci_exp,Sin CI|required',

            'datos_personales.sexo' => 'required|string|max:10',
            'datos_personales.fecha_nacimiento' => 'required|date',
            'datos_personales.edad' => 'required|numeric',
            'datos_personales.celular' => 'required|numeric',
            'datos_personales.telefono' => 'required|numeric',
            'datos_personales.localidad' => 'required|string|max:250',    
            //'datos_personales.zona' => 'required|string|max:100',
            //'datos_personales.calle' => 'required|string|max:100',
            
            // 'datos_personales.latlng' => 'required_without_all:datos_personales.url_croquis|string|max:250',
            // 'datos_personales.url_croquis' => ' required_without_all:datos_personales.latlng|image|max:5000',
            
           
            'datos_personales.tiempo_res_actual' => 'required|string|max:30',
            'datos_personales.ocupacion_paciente' => 'required|string|max:100',
            'datos_personales.vive_solo' => 'required|string|max:2',
            'datos_personales.celular_referencia' => 'required|numeric',
            'datos_personales.serv_salud_id_cercano' => 'required|string|max:150',
            'datos_personales.lugar_contagio' => 'required|string|max:200',
            'datos_personales.contacto_lepra' => 'required|string|max:2',
            'datos_personales.parentesco'  => 'exclude_if:datos_personales.contacto_lepra,No|required|string|max:40',

            'datos_clinicos.inicio_sintomas' => 'required|digits:4',
            'datos_clinicos.tiempo_evolucion_cantidad' => 'required|digits:1',
            'datos_clinicos.tiempo_evolucion_unidad' => 'required|string|max:5',
            'datos_clinicos.descripcion_primeros_signos' => 'required|string',
            'datos_clinicos.cuadro_clinico_actual' => 'required|string',

            'bacteriologia.fecha_muestra' => 'required|date',
            'bacteriologia.laboratorio' => 'required|string|max:200',
            'bacteriologia.nombre_tecnico_analisis' => 'required|string|max:250',
            'bacteriologia.fecha_resultado' => 'required|date',


            'bacteriologia.linfa_lobulo_oreja' => 'required_with:bacteriologia.resultado_lobulo_oreja|required_without_all:bacteriologia.linfa_lesion,bacteriologia.linfa_codo,bacteriologia.linfa_otro|max:5',
            'bacteriologia.linfa_lesion' => 'required_with:bacteriologia.resultado_lesion|required_without_all:bacteriologia.linfa_lobulo_oreja,bacteriologia.linfa_codo,bacteriologia.linfa_otro|max:5',
            'bacteriologia.linfa_codo' => 'required_with:bacteriologia.resultado_codo|required_without_all:bacteriologia.linfa_lobulo_oreja,bacteriologia.linfa_lesion,bacteriologia.linfa_otro|max:5',
            'bacteriologia.linfa_otro' => 'required_with:bacteriologia.resultado_otro|required_without_all:bacteriologia.linfa_lobulo_oreja,bacteriologia.linfa_lesion,bacteriologia.linfa_codo|max:250',


            'bacteriologia.resultado_lobulo_oreja' => 'exclude_unless:bacteriologia.linfa_lobulo_oreja,1|required|string|max:20',
            'bacteriologia.resultado_lesion' => 'exclude_unless:bacteriologia.linfa_lesion,1|required|string|max:20',
            'bacteriologia.resultado_codo' => 'exclude_unless:bacteriologia.linfa_codo,1|required|string|max:20',
            'bacteriologia.resultado_otro' => 'required_with:bacteriologia.linfa_otro|string|max:20',

            //'histopatologia.laboratorio_informe' => 'required|string',
            //'histopatologia.resultado_histopatologico' => 'required|string',

            'diagnostico.diagnostico' => 'required',

            'diagnostico.fecha_diagnostico' => 'required|date',
            'diagnostico.cabeza' => 'required|string',
            'diagnostico.tronco' => 'required|string',
            'diagnostico.ext_superiores' => 'required|string',
            'diagnostico.ext_inferiores' => 'required|string',

            'tratamiento.tto_anterior' => 'required|string',
            'tratamiento.actual_fecha_inicio' => 'required|date',
            'tratamiento.esquema_anterior'=>'exclude_if:tratamiento.tto_anterior,Ninguno|required|string',
            'tratamiento.esquema_actual'=>'required|string',

            'identificacion_caso.activa' => 'required_without_all:identificacion_caso.transferencia,identificacion_caso.pasiva',
            'identificacion_caso.pasiva' => 'required_without_all:identificacion_caso.transferencia,identificacion_caso.activa',
            'identificacion_caso.transferencia' => 'required_without_all:identificacion_caso.pasiva,identificacion_caso.activa',
            
            'notificacion.servicio_salud' => 'required|string',
            'notificacion.fecha' => 'required|date',
            'notificacion.notificador' => 'required|string|max:250',
            'control_contactos.0.contacto_nombres' =>'required|string',
        ],[
            'required' => 'Dato incompleto',
            'max' => 'Dato muy extenso',
            'unique' => 'El dato ya se encuentra registrado',
            'required_with' => 'Dato incompleto',
            'required_without_all' => 'Dato incompleto',
            
        ]);

        
        if( isset($request->datos_personales['url_croquis']) ){
            
            $image = $request->datos_personales['url_croquis']->store('croquis');

            $datosPersonales = $request->datos_personales;
            unset($datosPersonales['url_croquis']); 
            $datosPersonales = array_merge(['url_croquis'=>$image], $datosPersonales);

           $pacienteId = DB::table('datos_personales')->insertGetId($datosPersonales);
        } else{
            $pacienteId = DB::table('datos_personales')->insertGetId($request->datos_personales);
        }



        for($i=0; $i< count($request['residencia_anterior']); $i++ ){
            if( isset($request['residencia_anterior'][$i]['municipio_id']) ){
                $residenciaAnterior[$i] = array_merge(['datos_personales_id'=>$pacienteId], $request['residencia_anterior'][$i]);
            }  
        }
        if( isset($residenciaAnterior) ){
            DB::table('residencia_anterior')->insert( $residenciaAnterior);
        }

        for($i=0; $i< count($request['control_contactos']); $i++ ){
            if( isset($request['control_contactos'][$i]['contacto_apellidos']) && isset($request['control_contactos'][$i]['contacto_nombres']) ){
                $controlContactos[$i] = array_merge(['datos_personales_id'=>$pacienteId], $request['control_contactos'][$i]);
            }    
        }
        if( isset($controlContactos) ){
            DB::table('control_contactos')->insert($controlContactos);
        }

        for( $i=0; $i< count($request['discapacidad']); $i++ ){
            if( $i < '8' ){
                $discapacidad[$i] = array_merge(['datos_personales_id'=>$pacienteId], $request['discapacidad'][$i]);
            }   
            $otrasLesiones = array_merge(['datos_personales_id'=>$pacienteId], $request['discapacidad'][8]); 
        }
        if( isset($discapacidad) ) {
            DB::table('discapacidad')->insert($discapacidad);
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

        return redirect('/paciente/index')->with('success', '!Datos guardados con éxito¡');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DatosPersonales  $datosPersonales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return Route::currentRouteAction(); 
    // return Auth::user()->rol;
        
        if(Auth::user()->rol == 'Administrador' || Auth::user()->rol == 'Super'){
        
            //$records = DB::table('datos_personales')->where('datos_personales.id', $id)->first();

            $dp_records = DB::table('sedes')
            ->select('datos_personales.*','sedes.sedes','provincia.provincia', 'municipio.municipio','servicio_salud.serv_salud', 'red_salud.red_salud')
            ->join ('provincia', 'sedes.id', 'provincia.sedes_id')
            ->join ('municipio', 'provincia.id', 'municipio.provincia_id')
            ->join ('servicio_salud', 'servicio_salud.municipio_id', 'municipio.id')
            ->join ('datos_personales', 'datos_personales.servicio_salud_id', 'servicio_salud.id')
            ->join ('red_salud', 'red_salud.sedes_id', 'sedes.id')
            ->where('datos_personales.id',$id)
            ->groupBy('datos_personales.id')
            ->get();

            $dp_addresses = DB::table('sedes')
            ->select('datos_personales.id','sedes.id as sedes_id','sedes.sedes','provincia.id as provincia_id', 'provincia.provincia', 'municipio.id as municipio_id', 'municipio.municipio')
            ->join ('provincia', 'sedes.id', 'provincia.sedes_id')
            ->join ('municipio', 'provincia.id', 'municipio.provincia_id')
            ->join ('datos_personales', 'datos_personales.municipio_id', 'municipio.id')
            ->where('datos_personales.id',$id)
            ->groupBy('datos_personales.id')
            ->get();

            $healt_services = DB::table('datos_personales')
            ->select('datos_personales.id','datos_personales.serv_salud_id_cercano','servicio_salud.serv_salud')
            ->join ('servicio_salud', 'datos_personales.serv_salud_id_cercano', 'servicio_salud.id')
            ->where('datos_personales.id',$id)
            ->get();
            //return $dp_records;
            $previous_residences = DB::table('residencia_anterior')
            ->select('municipio.id as municipio_id','municipio.municipio', 'provincia.id as provincia_id', 'provincia.provincia', 'sedes.id as sedes_id', 'sedes.sedes', 'residencia_anterior.localidad', 'residencia_anterior.tiempo_res_ant_cantidad', 'residencia_anterior.tiempo_res_ant_unidad')
            ->join('municipio', 'municipio.id', 'residencia_anterior.municipio_id')
            ->join('provincia', 'municipio.provincia_id', 'provincia.id')
            ->join('sedes', 'provincia.sedes_id', 'sedes.id')
            ->where('residencia_anterior.datos_personales_id',$id)
            ->get();

            $clinical_records = DatosClinicos::where('datos_personales_id', $id)->get();
            $bacteriology_records = Bacteriologia::where('datos_personales_id', $id)->get();
            $histopatology_records = Histopatologia::where('datos_personales_id', $id)->get();
            $disability_records = Discapacidad::where('datos_personales_id', $id)->where('discapacidad.termino_tto','No')->get();
            $treatment_records = Tratamiento::where('datos_personales_id', $id)->get();
            $identification_records = IdentificacionCaso::where('datos_personales_id', $id)->get();
            $diagnostic_records = Diagnostico::where('datos_personales_id', $id)->get();
            //$notification_records = Notificacion::where('identificacion_caso_id', $identification_records[0]['id'])->get();

            $notification_records = DB::table('notificacion')
            ->select('notificacion.id', 'notificacion.identificacion_caso_id', 'notificacion.servicio_salud', 'notificacion.servicio_salud_id', 'notificacion.fecha', 'notificacion.notificador', 'identificacion_caso.datos_personales_id')
            ->join('identificacion_caso', 'notificacion.identificacion_caso_id', 'identificacion_caso.id')
            ->where('identificacion_caso.datos_personales_id', $id)->get();

            //return $notification_records;

            return view('dpEdit.edit', compact(['id', 'dp_records', 'dp_addresses', 'healt_services', 'previous_residences', 'clinical_records', 'bacteriology_records', 'histopatology_records', 'disability_records', 'treatment_records', 'identification_records', 'notification_records', 'diagnostic_records']));
        } else{
            return redirect('paciente/index');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DatosPersonales  $datosPersonales
     * @return \Illuminate\Http\Response
     */
    public function show(DatosPersonales $datosPersonales)
    {
        return('show');
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
        //return $r=$request;
        //return $request['datos_personales']['id'];
        $datosPersonales = $request->datos_personales;
        if( isset($request->datos_personales['url_croquis']) ){
            Storage::delete($request['old_croquis']);
            $image = $request->datos_personales['url_croquis']->store('croquis');

            unset($datosPersonales['url_croquis']); 
            $datosPersonales = array_merge(['url_croquis'=>$image], $datosPersonales);
           //return  $datosPersonales;
        }
        DatosPersonales::where('id', '=', $datosPersonales['id'])->update($datosPersonales);
        return redirect("paciente/edit/".$datosPersonales['id'])->with('success', '!Dato actualizado con éxito¡');
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

    public function findci(Request $request){
        
        $records = DB::table('datos_personales')->select('datos_personales.ci', 'datos_personales.id')->where('ci',$request->ci)->get();
            return view('datosPersonales.findci', ['records' => $records]);
    }
}

