<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\GerenteController;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\PaqueteController;
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


Route::get('login', [SistemaController::class, 'entrada'])->name("login");
Route::get('registrar', [SistemaController::class, 'registrar'])->name('registrar');
Route::post('registrar', [SistemaController::class, 'registrar2'])->name('registrar2');
Route::post('validar', [SistemaController::class, 'validar'])->name('validar');
Route::post('validar2', [SistemaController::class, 'validar2'])->name('validar2');
Route::get('salir', [SistemaController::class, 'salir'])->name('salida');


Route::get('usuario',[SistemaController::class, 'index'])->name('usuario.paquetes');
Route::get('review',[UsuarioController::class, 'review'])->name('usuario.review');
Route::get('registro',[UsuarioController::class, 'registro'])->name('usuario.registro');
Route::get('añadir',[UsuarioController::class, 'añadir'])->name('usuario.añadir');

//URL CRUD para paquetes
Route::resource('paquetes', PaqueteController::class);
Route::get('/', [PaqueteController::class, 'welcome'])->name('welcome');

//URL CRUD para evento
Route::resource('eventos', EventoController::class);
