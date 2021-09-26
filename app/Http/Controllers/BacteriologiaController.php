<?php

namespace App\Http\Controllers;

use App\Models\Bacteriologia;
use Illuminate\Http\Request;

class BacteriologiaController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bacteriologia  $bacteriologia
     * @return \Illuminate\Http\Response
     */
    public function show(bacteriologia $bacteriologia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bacteriologia  $bacteriologia
     * @return \Illuminate\Http\Response
     */
    public function edit(bacteriologia $bacteriologia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bacteriologia  $bacteriologia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bacteriologia $bacteriologia)
    {
        $request->validate([
            'bacteriologia.linfa_lobulo_oreja' => 'required_with:bacteriologia.resultado_lobulo_oreja|required_without_all:bacteriologia.linfa_lesion,bacteriologia.linfa_codo,bacteriologia.linfa_otro|max:5',

            'bacteriologia.linfa_lesion' => 'required_with:bacteriologia.resultado_lesion|required_without_all:bacteriologia.linfa_lobulo_oreja,bacteriologia.linfa_codo,bacteriologia.linfa_otro|max:5',

            'bacteriologia.linfa_codo' => 'required_with:bacteriologia.resultado_codo|required_without_all:bacteriologia.linfa_lobulo_oreja,bacteriologia.linfa_lesion,bacteriologia.linfa_otro|max:5',

            'bacteriologia.linfa_otro' => 'required_with:bacteriologia.resultado_otro|required_without_all:bacteriologia.linfa_lobulo_oreja,bacteriologia.linfa_lesion,bacteriologia.linfa_codo|max:250',


            'bacteriologia.resultado_lobulo_oreja' => 'exclude_unless:bacteriologia.linfa_lobulo_oreja,1|required|string|max:20',
            'bacteriologia.resultado_lesion' => 'exclude_unless:bacteriologia.linfa_lesion,1|required|string|max:20',
            'bacteriologia.resultado_codo' => 'exclude_unless:bacteriologia.linfa_codo,1|required|string|max:20',
            'bacteriologia.resultado_otro' => 'required_with:bacteriologia.linfa_otro|string|max:20',
        ],[
            'required' => 'Dato incompleto',
            'max' => 'Dato muy extenso',
            'unique' => 'El dato ya se encuentra registrado',
            'required_with' => 'Dato incompleto',
            'required_without_all' => 'Dato incompleto',
            
        ]);
        //return $request;
        Bacteriologia::where('datos_personales_id', '=', $request['bacteriologia']['datos_personales_id'])->update($request['bacteriologia']);
        return redirect("paciente/edit/".$request['bacteriologia']['datos_personales_id'])->with('success', '!Dato actualizado con éxito¡');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bacteriologia  $bacteriologia
     * @return \Illuminate\Http\Response
     */
    public function destroy(bacteriologia $bacteriologia)
    {
        //
    }
}
