<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RegistroController;
use App\Models\Paquete;
use App\Models\Registro;
use Illuminate\Support\Facades\Route;

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
    $paquetes = Paquete::all();
    return view('welcome', compact('paquetes'));
});

// URLs para paquetes
Route::resource('paquetes', PaqueteController::class);
Route::get('/welcome', [PaqueteController::class, 'welcome'])->name('welcome');

// URLs para eventos
Route::resource('eventos', EventoController::class);

// URLs para servicios
Route::resource('servicios', ServicioController::class);


Route::resource('clientes', ClienteController::class);


// URLs para registros

Route::get('login', [RegistroController::class, 'entrada'])->name("login");
Route::get('registrar', [RegistroController::class, 'registrar'])->name('registrar');
Route::post('registrar', [RegistroController::class, 'registrar2'])->name('registrar2');
Route::post('validar', [RegistroController::class, 'validar'])->name('validar')->middleware("web");
Route::get('ver-usuarios', [RegistroController::class, 'verUsuarios'])->name('ver-usuarios');
