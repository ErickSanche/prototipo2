<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Auth;
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

// URLs para paquetes
Route::resource('paquetes', PaqueteController::class);
Route::get('/welcome', [PaqueteController::class, 'welcome'])->name('welcome');

// URLs para eventos
Route::resource('eventos', EventoController::class);

// URLs para servicios
Route::resource('servicios', ServicioController::class);

// URLs para clientes
Route::resource('clientes', ClienteController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
