<?php

namespace App\Http\Controllers;

use App\Models\ControlContactos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Illuminate\Routing\Redirector;
use App\Http\Controllers\Route;

class ControlContactosController extends Controller
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
            'contacto_nombres' => 'required|string',
            'contacto_apellidos' => 'required|string',
            'contacto_edad' => 'required|string|max:2',
            'contacto_sexo' => 'required|string',
            'contacto_parentesco' => 'required|string',
            // 'fecha_control' => 'required|date',
            // 'sintomatico_piel' => 'required|string',
            // 'laboratorio_baar' => 'required|string',
            // 'contacto_diagnostico' => 'required|string',
            // 'observaciones' => 'required|string',

         ],[
            'required' => 'Dato incompleto',
            'max' => 'Dato muy extenso',
            //'unique' => 'El dato YA existe',
        ],
     );
       
        DB::table('control_contactos')->insert( request()->except(['_token']) );
        return redirect("contactos/edit/".$request->datos_personales_id)->with('success', '!Dato guardado con éxito¡');
        //return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\controlContactos  $controlContactos
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\controlContactos  $controlContactos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patientRecords = DB::table('sedes')
        ->select('datos_personales.id','datos_personales.nombres','datos_personales.apellidos','datos_personales.historia_clinica','datos_personales.num_ficha','diagnostico.diagnostico','tratamiento.esquema_actual','sedes.sedes','provincia.provincia','municipio.municipio','red_salud.red_salud','servicio_salud.serv_salud')

        ->leftjoin ('provincia', 'sedes.id', '=', 'provincia.sedes_id') 
        ->leftjoin ('municipio', 'provincia.id', '=', 'municipio.provincia_id')
        ->leftjoin ('servicio_salud', 'municipio.id', '=', 'servicio_salud.municipio_id')
        ->leftjoin ('red_salud', 'servicio_salud.red_salud_id', '=', 'red_salud.id') 

        ->leftjoin ('datos_personales', 'servicio_salud.id', '=', 'datos_personales.servicio_salud_id')
        ->leftjoin ('diagnostico', 'datos_personales.id', '=', 'diagnostico.datos_personales_id')
        ->leftjoin ('tratamiento', 'diagnostico.datos_personales_id', '=', 'tratamiento.datos_personales_id')
        ->where ('datos_personales.id', '=', $id)
        ->get();

        $contacts = DB::table('control_contactos')->where('datos_personales_id','=', $id)->get();
        return view('contactos.edit', ['contacts' => $contacts, 'datos_personales_id' => $id, 'patientRecords' => $patientRecords]);
        
        //return $array = json_decode(json_encode($patientRecords), true); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\controlContactos  $controlContactos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //$contact = request()->except(['_token','_method']);
        ControlContactos::where('id', '=', $request->id)->update(request()->except(['_token','_method', 'datos_personales_id']));
        return redirect("contactos/edit/".$request->datos_personales_id)->with('success', '!Dato guardado con éxito¡');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\controlContactos  $controlContactos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        ControlContactos::destroy($request->id);
        return redirect("contactos/edit/".$request->datos_personales_id)->with('warning', '!Dato Eliminado con éxito¡');
        //return $request->id;
    }
}
