<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatosPersonalesController;
use App\Http\Controllers\ServicioSaludController;
use App\Http\Controllers\ResidenciaAnteriorController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { 
    return view('home');
});

Route::get('paciente', [DatosPersonalesController::class, 'index'])->name('paciente.index');



    Route::get('paciente/create', [DatosPersonalesController::class, 'create'])->name('paciente.create')->middleware('auth');
    Route::post('paciente/store', [DatosPersonalesController::class, 'store'])->name('paciente.store')->middleware('auth');

    Route::post('servicio/show', [ServicioSaludController::class, 'show'])->name('servicio.show');
    Route::post('residencia/show', [ResidenciaAnteriorController::class, 'show'])->name('residencia.show');
//Route::resource('paciente', [DatosPersonalesController::class]);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
