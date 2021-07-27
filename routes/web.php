<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatosPersonalesController;
use App\Http\Controllers\ServicioSaludController;
use App\Http\Controllers\ResidenciaAnteriorController;
use App\Http\Controllers\TypeaheadController;
use App\Http\Controllers\ControlContactosController;
use App\Http\Controllers\ControlProgramaTtoController;
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

    Route::get('paciente/index', [DatosPersonalesController::class, 'index'])->name('paciente.index')->middleware('auth');
    Route::get('paciente/show/{id}', [DatosPersonalesController::class, 'show'])->name('paciente.show')->middleware('auth');

    Route::post('servicio/show', [ServicioSaludController::class, 'show'])->name('servicio.show');
    Route::post('residencia/show', [ResidenciaAnteriorController::class, 'show'])->name('residencia.show');

    Route::get('/autocomplete-search', [TypeaheadController::class, 'autocompleteSearch']);

    Route::get('contactos/create', [ControlContactosController::class, 'create'])->name('contactos.create')->middleware('auth');

    Route::get('contactos/edit/{id}', [ControlContactosController::class, 'edit'])->name('contactos.edit')->middleware('auth');

    Route::put('contactos/update', [ControlContactosController::class, 'update'])->name('contactos.update');

    Route::get('seguimiento/create/{id}', [ControlProgramaTtoController::class, 'create'])->name('contactos.create')->middleware('auth');

    Route::post('contactos/store', [ControlContactosController::class, 'store'])->name('contactos.store')->middleware('auth');
    Route::delete('contactos/destroy', [ControlContactosController::class, 'destroy'])->name('contactos.destroy')->middleware('auth');
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
