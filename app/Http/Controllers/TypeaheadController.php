<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\ServicioSalud;


class TypeaheadController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
 
    public function autocompleteSearch(Request $request)
    {
          $query = $request->get('query');
          //$filterResult = User::where('name', 'LIKE', '%'. $query. '%')->get();
          //$filterResult = ServicioSalud::where('serv_salud', 'LIKE', '%'. $query. '%')->get();

            // $filterResult = DB::select("select serv_salud from servicio_salud where serv_salud LIKE '%$query%'");
            // $filterResult=json_encode($filterResult);
            //           return $filterResult;

            return ServicioSalud::select('serv_salud')
                    ->where('serv_salud', 'LIKE', '%'. $query. '%')
                    ->pluck('serv_salud');
                } 
}