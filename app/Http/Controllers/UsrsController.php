<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsrsController extends Controller
{
   
    public function update(Request $request)
    {   
        if(Auth::user()->rol == 'Ejecutivo' || Auth::user()->rol == 'Super'){
            $request->validate([
                    'user.password' => 'exclude_unless:change_password,new_password|required|min:5|max:20',
                 ],[
                    'required' => 'Error!, debe asignar un nuevo password!',
                    'min' => 'El nuevo password debe contener AL MENOS 5 caracteres',
                ]
            );

                $user = $request['user'];
            //return $user;
                if ( isset($user['password']) ) {
                    unset($user['password']); 
                    $user = array_merge(['password'=>Hash::make($request['user']['password'])], $user);
                }
            User::where('id', '=', $request->id)->update($user);
            return redirect("users/show")->with('success', '!Dato guardado con éxito¡');
        } else{
             return redirect('paciente/index');
        }
    }

    public function show()
    {
        if(Auth::user()->rol == 'Ejecutivo' || Auth::user()->rol == 'Super'){
            $users = User::all();
            $users = User::orderBy('name')->get();//->paginate(10);
            return view('auth.users', ['users' => $users]);
        } else{
             return redirect('paciente/index');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\recidenciaAnterior  $recidenciaAnterior
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(Auth::user()->rol == 'Ejecutivo' || Auth::user()->rol == 'Super'){
            User::destroy($request->id);
            return redirect("users/show")->with('warning', '!Dato Eliminado con éxito¡');
        } else{
             return redirect('paciente/index');
        }
    }
}
