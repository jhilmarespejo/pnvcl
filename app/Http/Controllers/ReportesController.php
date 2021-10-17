<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Reportes.index');
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
     * @param  \App\Models\diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // return $request;
    /*** PROCESS FOR METRIC 1  ***/
        if($request->metric == 'm_1'){
            if ($request->serv_salud_m_1) {
                return view('Reportes.responses', ['total' => $this->totalCases($request), 'tasa' => '-', 'metric' => 'm_1', 'case' => $request->caso_m_1]);
            }
            if ($request->municipio_m_1) {
                $total = $this->totalCases($request);
                foreach (DB::table('municipio')->select('poblacion_2021')->where('id', $request->municipio_m_1)->get() as $population) { }
                return view('Reportes.responses', ['total' => $total, 'tasa' => (($total/$population->poblacion_2021)*100000), 'metric' => 'm_1', 'case' => $request->caso_m_1]);

            }
            if ($request->provincia_m_1) {
                $total = $this->totalCases($request);
                foreach (DB::table('provincia')->select('poblacion_2021')->where('id', $request->provincia_m_1)->get() as $population) { }
                return view('Reportes.responses', ['total' => $total, 'tasa' => (($total/$population->poblacion_2021)*100000), 'metric' => 'm_1', 'case' => $request->caso_m_1]);
            }
            if ($request->departamento_m_1) {
                $total = $this->totalCases($request);
                foreach (DB::table('sedes')->select('poblacion_2021')->where('id', $request->departamento_m_1)->get() as $population) { }
                return view('Reportes.responses', ['total' => $total, 'tasa' => (($total/$population->poblacion_2021)*100000), 'metric' => 'm_1', 'case' => $request->caso_m_1]);
            }            
            //return $records->dd();

            /*returns the number of cases BOLIVIA, rate with the population of the country and the corresponding metric*/
            $total = $this->totalCases($request);
            return view('Reportes.responses', ['total' => $total, 'tasa' => (($total/11841955)*100000), 'metric' => 'm_1', 'case' => $request->caso_m_1]);
        }

    /*** PROCESS FOR METRIC 2  ***/
        if($request->metric == 'm_2'){
            $startDate = $request->gestion_m_2.'-01-01';
            $endDate = $request->gestion_m_2.'-12-31';
            $records = DB::table('sedes')
            ->select('datos_personales.id')
            ->join('provincia', 'sedes.id', '=', 'provincia.sedes_id')
            ->join('municipio', 'provincia.id', '=', 'municipio.provincia_id')
            ->join('servicio_salud', 'servicio_salud.municipio_id', '=', 'municipio.id')
            ->join('datos_personales', 'datos_personales.servicio_salud_id', '=', 'servicio_salud.id')
            ->join('diagnostico', 'diagnostico.datos_personales_id', '=', 'datos_personales.id')
            ->join('tratamiento', 'tratamiento.datos_personales_id', '=', 'datos_personales.id')
            ->whereBetween('diagnostico.fecha_diagnostico', [$startDate, $endDate])
            ->whereBetween('tratamiento.actual_fecha_inicio', [$startDate, $endDate])
            ->where('datos_personales.tipo_caso', '=', $request->caso_m_2);

            if ($request->serv_salud_m_2) {
                $records->where('servicio_salud.id', $request->serv_salud_m_2);
                return view('Reportes.responses', ['total' => $records->get()->count(), 'tasa' => '-', 'metric' => 'm_2', 'case' => $request->caso_m_2]);
            }
            if ($request->municipio_m_2) {
                $records->where('municipio.id', $request->municipio_m_2);
                foreach (DB::table('municipio')->select('poblacion_2021')->where('id', $request->municipio_m_2)->get() as $population) { }
                return view('Reportes.responses', ['total' => $records->get()->count(), 'tasa' => (($records->get()->count()/$population->poblacion_2021)*100000), 'metric' => 'm_2', 'case' => $request->caso_m_2]);
            }
            if ($request->provincia_m_2) {
                $records->where('provincia.id', $request->provincia_m_2);
                foreach (DB::table('provincia')->select('poblacion_2021')->where('id', $request->provincia_m_2)->get() as $population) { }
                return view('Reportes.responses', ['total' => $records->get()->count(), 'tasa' => (($records->get()->count()/$population->poblacion_2021)*100000), 'metric' => 'm_2', 'case' => $request->caso_m_2]);
            }
            if ($request->departamento_m_2) {
                $records->where('sedes.id', $request->departamento_m_2);
                foreach (DB::table('sedes')->select('poblacion_2021')->where('id', $request->departamento_m_2)->get() as $population) { }
                return view('Reportes.responses', ['total' => $records->get()->count(), 'tasa' => (($records->get()->count()/$population->poblacion_2021)*100000), 'metric' => 'm_2', 'case' => $request->caso_m_2]);
            }            
            //return $records->dd();
            /*returns the number of cases, rate with the population of the country and the corresponding metric*/
            return view('Reportes.responses', ['total' => $records->get()->count(), 'tasa' => (($records->get()->count()/11841955)*100000), 'metric' => 'm_2', 'case' => $request->caso_m_2]);
        }

    /*** PROCESS FOR METRIC 3  ***/
        if($request->metric == 'm_3'){            
            $startDate = $request->gestion_m_3.'-01-01';
            $endDate = $request->gestion_m_3.'-12-31';
            $records = DB::table('sedes')
            ->select('datos_personales.id')
            ->join('provincia', 'sedes.id', '=', 'provincia.sedes_id')
            ->join('municipio', 'provincia.id', '=', 'municipio.provincia_id')
            ->join('servicio_salud', 'servicio_salud.municipio_id', '=', 'municipio.id')
            ->join('datos_personales', 'datos_personales.servicio_salud_id', '=', 'servicio_salud.id')
            ->join('diagnostico', 'diagnostico.datos_personales_id', '=', 'datos_personales.id')
            ->join('discapacidad', 'discapacidad.datos_personales_id', '=', 'datos_personales.id')
             ->orWhere(function($query2) {
                $query2->orWhere([ ['discapacidad.manos_grado', '2'],['discapacidad.manos_lat', '!=', ''] ])
                      ->orWhere([ ['discapacidad.pies_grado', '2'],['discapacidad.pies_lat', '!=', ''] ])
                      ->orWhere([ ['discapacidad.ojos_grado', '2'],['discapacidad.ojos_lat', '!=', ''] ]);
            })

            // ->orWhere(function($query2) {
            //     $query2->orWhere('discapacidad.manos_lat', 'is not null')
            //           ->orWhere('discapacidad.pies_lat', 'is not null')
            //           ->orWhere('discapacidad.ojos_lat', 'is not null');
            // })
            ->whereBetween('diagnostico.fecha_diagnostico', [$startDate, $endDate])
            ->where('datos_personales.tipo_caso', '=', $request->caso_m_3)
            ->groupBy('datos_personales.id');

            if ($request->municipio_m_3) {
                /*to avoid error division by 0 */
                if($this->totalCases($request) == 0){
                    $proportion = 'Sin datos';
                }else{
                    $records->where('municipio.id', $request->municipio_m_3);
                    $proportion = (($records->get()->count()/$this->totalCases($request))*100);
                }
                return view('Reportes.responses', ['proportion' => $proportion, 'metric' => 'm_3', 'case' => $request->caso_m_3]);
            }
            if ($request->provincia_m_3) {
                /*to avoid error division by 0 */
                if($this->totalCases($request) == 0){
                    $proportion = 'Sin datos';
                }else{
                    $records->where('provincia.id', $request->provincia_m_3);
                    $proportion = (($records->get()->count()/$this->totalCases($request))*100);
                }
                return view('Reportes.responses', ['proportion' => $proportion, 'metric' => 'm_3', 'case' => $request->caso_m_3]);
            }
            if ($request->departamento_m_3) {
                /*to avoid error division by 0 */
                if($this->totalCases($request) == 0){
                    $proportion = 'Sin datos';
                }else{                
                    $records->where('sedes.id', $request->departamento_m_3);
                    $proportion = (($records->get()->count()/$this->totalCases($request))*100);
                }
                return view('Reportes.responses', ['proportion' => $proportion, 'metric' => 'm_3', 'case' => $request->caso_m_3]);
            }            
            //return $records->dd();
            /*returns the number of cases, rate with the population of the country and the corresponding metric*/
            return view('Reportes.responses', ['proportion' => (($records->get()->count()/$this->totalCases($request))*100), 'metric' => 'm_3', 'case' => $request->caso_m_3]);
        }

    /*** PROCESS FOR METRIC 4 ***/
        if($request->metric == 'm_4'){
            $startDate = $request->gestion_m_4.'-01-01';
            $endDate = $request->gestion_m_4.'-12-31';
            $records = DB::table('sedes')
            ->select('datos_personales.id')
            ->join('provincia', 'sedes.id', '=', 'provincia.sedes_id')
            ->join('municipio', 'provincia.id', '=', 'municipio.provincia_id')
            ->join('servicio_salud', 'servicio_salud.municipio_id', '=', 'municipio.id')
            ->join('datos_personales', 'datos_personales.servicio_salud_id', '=', 'servicio_salud.id')
            ->join('diagnostico', 'diagnostico.datos_personales_id', '=', 'datos_personales.id')
            ->whereBetween('diagnostico.fecha_diagnostico', [$startDate, $endDate])
            ->where('datos_personales.tipo_caso', '=', $request->caso_m_4)
            ->where('datos_personales.sexo', '=', $request->sexo_m_4);
            $records->where('datos_personales.edad', $request->rango_m_4, '15');

            if ($request->municipio_m_4) {
                /*to avoid error division by 0 */
                if($this->totalCases($request) == 0){
                    $proportion = 'Sin datos';
                }else{
                    $records->where('municipio.id', $request->municipio_m_4);
                    $proportion = (($records->get()->count()/$this->totalCases($request))*100);
                }
                return view('Reportes.responses', ['proportion' => $proportion, 'edad' => $request->rango_m_4,'metric' => 'm_4', 'case' => $request->caso_m_4]);
            }
            if ($request->provincia_m_4) {
                /*to avoid error division by 0 */
                if($this->totalCases($request) == 0){
                    $proportion = 'Sin datos';
                }else{
                    $records->where('provincia.id', $request->provincia_m_4);
                    $proportion = (($records->get()->count()/$this->totalCases($request))*100);
                }
                return view('Reportes.responses', ['proportion' => $proportion, 'edad' => $request->rango_m_4,'metric' => 'm_4', 'case' => $request->caso_m_4]);
            }
            if ($request->departamento_m_4) {
                /*to avoid error division by 0 */
                if($this->totalCases($request) == 0){
                    $proportion = 'Sin datos';
                }else{                
                    $records->where('sedes.id', $request->departamento_m_4);
                    $proportion = (($records->get()->count()/$this->totalCases($request))*100);
                }
                return view('Reportes.responses', ['proportion' => $proportion, 'edad' => $request->rango_m_4,'metric' => 'm_4', 'case' => $request->caso_m_4]);
            }            
            //return $records->dd();
            /*returns the number of cases, rate with the population of the country and the corresponding metric*/
            return view('Reportes.responses', ['proportion' => (($records->get()->count()/$this->totalCases($request))*100), 'rango' => $request->rango_m_4,'metric' => 'm_4', 'case' => $request->caso_m_4]);
        }
    /*** PROCESS FOR METRIC 5 REVISAR  ***/
        if($request->metric == 'm_5'){
            $startDate = $request->gestion_m_5.'-01-01';
            $endDate = $request->gestion_m_5.'-12-31';
            $records = DB::table('sedes')
            ->select('datos_personales.id')
            ->join('provincia', 'sedes.id', 'provincia.sedes_id')
            ->join('municipio', 'provincia.id', 'municipio.provincia_id')
            ->join('servicio_salud', 'servicio_salud.municipio_id', 'municipio.id')
            ->join('datos_personales', 'datos_personales.servicio_salud_id', 'servicio_salud.id')
            ->join('diagnostico', 'diagnostico.datos_personales_id', 'datos_personales.id')
            ->join('tratamiento', 'tratamiento.datos_personales_id', 'datos_personales.id')
            // ->orWhere(function($query) {
            //     $query->orWhereNotNull('diagnostico.diagnostico');
            // })
            ->whereBetween('diagnostico.fecha_diagnostico', [$startDate, $endDate])
            ->where('tratamiento.esquema_actual', $request->esquema_m_5)
            ->where('datos_personales.tipo_caso', $request->caso_m_5);

            if ($request->municipio_m_5) {
                /*to avoid error division by 0 */
                if($this->totalCases($request) == 0){
                    $proportion = 'Sin datos';
                }else{
                    $records->where('municipio.id', $request->municipio_m_5);
                    $proportion = (($records->get()->count()/$this->totalCases($request))*100);
                }
                return view('Reportes.responses', ['proportion' => $proportion, 'edad' => $request->edad_m_5,'metric' => 'm_5', 'case' => $request->caso_m_5]);
            }
            if ($request->provincia_m_5) {
                /*to avoid error division by 0 */
                if($this->totalCases($request) == 0){
                    $proportion = 'Sin datos';
                }else{
                    $records->where('provincia.id', $request->provincia_m_5);
                    $proportion = (($records->get()->count()/$this->totalCases($request))*100);
                }
                return view('Reportes.responses', ['proportion' => $proportion, 'edad' => $request->edad_m_5,'metric' => 'm_5', 'case' => $request->caso_m_5]);
            }
            if ($request->departamento_m_5) {
                /*to avoid error division by 0 */
                if($this->totalCases($request) == 0){
                    $proportion = 'Sin datos';
                }else{                
                    $records->where('sedes.id', $request->departamento_m_5);
                    $proportion = (($records->get()->count()/$this->totalCases($request))*100);
                }
                return view('Reportes.responses', ['proportion' => $proportion, 'edad' => $request->edad_m_5,'metric' => 'm_5', 'case' => $request->caso_m_5]);
            }            
            //return $records->dd();
            /*returns the number of cases, rate with the population of the country and the corresponding metric*/
            return view('Reportes.responses', ['proportion' => (($records->get()->count()/$this->totalCases($request))*100), 'edad' => $request->edad_m_5,'metric' => 'm_5', 'case' => $request->caso_m_5]);
        }
    }


    public function totalCases(Request $request){

        if($request->metric=='m_1'){
            $r = array('departamento'=>$request->departamento_m_1,'provincia'=>$request->provincia_m_1,'municipio'=>$request->municipio_m_1, 'serv_salud'=>$request->serv_salud_m_1, 'gestion'=>$request->gestion_m_1, 'caso'=>$request->caso_m_1);
        }

        if($request->metric=='m_3'){
            $r = array('departamento'=>$request->departamento_m_3,'provincia'=>$request->provincia_m_3,'municipio'=>$request->municipio_m_3, 'serv_salud'=>$request->serv_salud_m_3, 'gestion'=>$request->gestion_m_3, 'caso'=>$request->caso_m_3);
        }
        if($request->metric=='m_4'){
            $r = array('departamento'=>$request->departamento_m_4,'provincia'=>$request->provincia_m_4,'municipio'=>$request->municipio_m_4, 'serv_salud'=>$request->serv_salud_m_4, 'gestion'=>$request->gestion_m_4, 'caso'=>$request->caso_m_4);
        }
        if($request->metric=='m_5'){
            $r = array('departamento'=>$request->departamento_m_5,'provincia'=>$request->provincia_m_5,'municipio'=>$request->municipio_m_5, 'serv_salud'=>$request->serv_salud_m_5, 'gestion'=>$request->gestion_m_5, 'caso'=>$request->caso_m_5);
        }

        $startDate = $r['gestion'].'-01-01';
        $endDate = $r['gestion'].'-12-31';
        $records = DB::table('sedes')
        ->select('datos_personales.nombres')
        ->join('provincia', 'sedes.id', '=', 'provincia.sedes_id')
        ->join('municipio', 'provincia.id', '=', 'municipio.provincia_id')
        ->join('servicio_salud', 'servicio_salud.municipio_id', '=', 'municipio.id')
        ->join('datos_personales', 'datos_personales.servicio_salud_id', '=', 'servicio_salud.id')
        ->join('diagnostico', 'diagnostico.datos_personales_id', '=', 'datos_personales.id')
        ->whereBetween('diagnostico.fecha_diagnostico', [$startDate, $endDate])
        ->where('datos_personales.tipo_caso', '=', $r['caso']);
        

        if ($r['serv_salud']) {
            $records->where('servicio_salud.id', $r['serv_salud']);
           //return $records->dd();
            return $records->get()->count();
        }
        if ($r['municipio']) {
            $records->where('municipio.id', $r['municipio']);
            return $records->get()->count();
        }
        if ($r['provincia']) {
            $records->where('provincia.id', $r['provincia']);
            return $records->get()->count();
        }
        if ($r['departamento']) {
            $records->where('sedes.id', $r['departamento']);
            return $records->get()->count();
        }            
        //return $records->dd();
        /*returns the number of cases Bolivia*/
        return $records->get()->count();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}


        // $records->when(Request('departamento_m_1'), function($q){
            //     return $q->where('sedes.id', Request('departamento_m_1'));
            // });
            // $records->when(Request('provincia_m_1'), function($q){
            //     return $q->where('provincia.id', Request('provincia_m_1'));
            // });
            // $records->when(Request('municipio_m_1'), function($q){
            //     return $q->where('municipio.id', Request('municipio_m_1'));
            // });
            // $records->when(Request('serv_salud'), function($q){
            //     return $q->where('servicio_salud.id', Request('serv_salud'));
        // });