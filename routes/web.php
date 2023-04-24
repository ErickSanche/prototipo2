<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\GerenteController;
use App\Http\Controllers\IdiomaControler;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuarioController;
use App\Models\Paquete;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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


Route::get('paquetes',[PaqueteController::class, 'index'])->name('paquetes.index');
Route::get('crearpaquete',[PaqueteController::class, 'create'])->name('paquetes.create');
Route::post('guardar',[PaqueteController::class, 'store'])->name('paquetes.store');
Route::get('actualizar/{cual?}',[PaqueteController::class, 'edit'])->name('paquetes.edit');
Route::put('actualizar/{cual?}',[PaqueteController::class, 'update'])->name('paquetes.update');
Route::delete('paquetes/{id}', [PaqueteController::class, 'destroy'])->name('paquetes.destroy');
Route::delete('/paquetes/clear', [PaqueteController::class, 'clear'])->name('paquetes.clear');

Route::get('usuario',[SistemaController::class, 'index'])->name('usuario.paquetes');
Route::get('review',[UsuarioController::class, 'review'])->name('usuario.review');
Route::get('registro',[UsuarioController::class, 'registro'])->name('usuario.registro');
Route::get('añadir',[UsuarioController::class, 'añadir'])->name('usuario.añadir');


Route::get('agregarusuario',[GerenteController::class, 'agregarusuario'])->name('gerente.agregarusuario');
Route::get('agregarservicios',[GerenteController::class, 'agregarservicios'])->name('gerente.agregarservicios');
Route::get('verusuario',[GerenteController::class, 'verusuario'])->name('gerente.verusuario');
Route::get('verservicios',[GerenteController::class, 'verservicios'])->name('gerente.verservicios');

Route::get('abonar',[EmpleadoController::class, 'abonar'])->name('empleado.abonar');
Route::get('empleado',[EmpleadoController::class, 'eventos'])->name('empleado.eventos');

Route::get('/', [PaqueteController::class, 'welcome'])->name('welcome');

Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
Route::get('/eventos/create', [EventoController::class, 'create'])->name('eventos.create');
Route::post('/eventos', [EventoController::class, 'store'])->name('eventos.store');
Route::get('/eventos/{evento}', [EventoController::class, 'show'])->name('eventos.show');
Route::get('/eventos/{evento}/edit', [EventoController::class, 'edit'])->name('eventos.edit');
Route::put('/eventos/{evento}', [EventoController::class, 'update'])->name('eventos.update');
Route::delete('/eventos/{evento}', [EventoController::class, 'destroy'])->name('eventos.destroy');
