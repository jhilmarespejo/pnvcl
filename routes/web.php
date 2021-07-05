<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatosPersonalesController;

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

Route::get('paciente/create', [DatosPersonalesController::class, 'create'])->name('paciente.create');
Route::post('paciente/store', [DatosPersonalesController::class, 'store'])->name('paciente.store');
//Route::resource('paciente', [DatosPersonalesController::class]);
