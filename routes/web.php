<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\GerenteController;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuarioController;
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
    return view('welcome');
});

//Urls de sistema controller

Route::resource('sistema', SistemaController::class);
Route::get('salir', [SistemaController::class, 'salir'])->name('salida');


//Urls para usuarios
Route::resource('usuarios', UsuarioController::class);

//Urls  para paquetes
Route::resource('paquetes', PaqueteController::class);
Route::get('/', [PaqueteController::class, 'welcome'])->name('welcome');

//Urls  para evento
Route::resource('eventos', EventoController::class);

//Urls para servicios
Route::resource('servicios', ServicioController::class);


//Urls de se
