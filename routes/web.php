<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatosPersonalesController;
use App\Http\Controllers\ServicioSaludController;
use App\Http\Controllers\ResidenciaAnteriorController;
use App\Http\Controllers\TypeaheadController;
use App\Http\Controllers\ControlContactosController;
use App\Http\Controllers\ControlProgramaTtoController;
use App\Http\Controllers\MunicipiosController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DatosClinicosController;
use App\Http\Controllers\BacteriologiaController;
use App\Http\Controllers\HistopatologiaController;

use App\Http\Controllers\DiscapacidadController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\IdentificacionCasoController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\UsrsController;

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
})->name('home');

Route::get('paciente', [DatosPersonalesController::class, 'index'])->name('paciente.index');

    Route::get('paciente/create', [DatosPersonalesController::class, 'create'])->name('paciente.create')->middleware('auth');
    Route::post('paciente/store', [DatosPersonalesController::class, 'store'])->name('paciente.store')->middleware('auth');
    Route::post('paciente/findci', [DatosPersonalesController::class, 'findci'])->name('paciente.findci')->middleware('auth');

    Route::get('paciente/index', [DatosPersonalesController::class, 'index'])->name('paciente.index')->middleware('auth');
    Route::get('paciente/edit/{id}', [DatosPersonalesController::class, 'edit'])->name('paciente.edit')->middleware('auth');
    Route::put('paciente/update', [DatosPersonalesController::class, 'update'])->name('paciente.update')->middleware('auth');

    Route::post('servicio/show', [ServicioSaludController::class, 'show'])->name('servicio.show');
    Route::post('residencia/show', [ResidenciaAnteriorController::class, 'show'])->name('residencia.show');

    Route::get('/autocomplete-search', [TypeaheadController::class, 'autocompleteSearch']);

    Route::get('contactos/create', [ControlContactosController::class, 'create'])->name('contactos.create')->middleware('auth');

    Route::get('contactos/edit/{id}', [ControlContactosController::class, 'edit'])->name('contactos.edit')->middleware('auth');

    Route::put('contactos/update', [ControlContactosController::class, 'update'])->name('contactos.update')->middleware('auth');

    Route::get('seguimiento/edit/{id}', [ControlProgramaTtoController::class, 'edit'])->name('seguimiento.edit')->middleware('auth');

    Route::post('contactos/store', [ControlContactosController::class, 'store'])->name('contactos.store')->middleware('auth');

    Route::delete('contactos/destroy', [ControlContactosController::class, 'destroy'])->name('contactos.destroy')->middleware('auth');
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    //Route::resource('municipios', MunicipiosController::class)->middleware('auth');
    Route::post('municipios/show', [MunicipiosController::class, 'show'])->name('municipios.show')->middleware('auth');

    Route::get('reportes/index', [ReportesController::class, 'index'])->name('reportes.index');

    Route::post('reportes/show', [ReportesController::class, 'show'])->name('reportes.show');

    Route::post('seguimiento/store', [ControlProgramaTtoController::class, 'store'])->name('seguimiento.store')->middleware('auth');

    //Route::get('datosclinicos/edit/{id}', [DatosClinicos::class, 'edit'])->name('datosclinicos.edit')->middleware('auth');

    Route::put('datosclinicos/update', [DatosClinicosController::class, 'update'])->name('datosclinicos.update')->middleware('auth');

    Route::put('bacteriologia/update', [BacteriologiaController::class, 'update'])->name('bacteriologia.update')->middleware('auth');

    Route::put('histopatologia/update', [HistopatologiaController::class, 'update'])->name('histopatologia.update')->middleware('auth');

    Route::put('diagnostico/update', [DiagnosticoController::class, 'update'])->name('diagnostico.update')->middleware('auth');

    Route::put('discapacidades/update', [DiscapacidadController::class, 'update'])->name('discapacidades.update')->middleware('auth');

    Route::put('tratamiento/update', [TratamientoController::class, 'update'])->name('tratamiento.update')->middleware('auth');

    Route::put('identificacioncaso/update', [IdentificacionCasoController::class, 'update'])->name('identificacioncaso.update')->middleware('auth');
    
    Route::put('notificacion/update', [NotificacionController::class, 'update'])->name('notificacion.update')->middleware('auth');
    Route::put('notificacion/update', [NotificacionController::class, 'update'])->name('notificacion.update')->middleware('auth');

    Route::get('users/show', [UsrsController::class, 'show'])->name('users.show')->middleware('auth');

    Route::put('users/update', [UsrsController::class, 'update'])->name('users.update')->middleware('auth');

    Route::delete('users/destroy', [UsrsController::class, 'destroy'])->name('users.destroy')->middleware('auth');

    


    // Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('auth');

    // Auth::routes(['register' => true])->middleware('auth');;