<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\RegistroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('eventos',EventoController::class);
Route::apiResource('paquetes',PaqueteController::class);
Route::get('registrar', [RegistroController::class, 'registrar']);
Route::post('registrar', [RegistroController::class, 'registrar2']);
Route::get('login', [RegistroController::class, 'entrada']);
Route::post('validar', [RegistroController::class, 'validar']);
Route::post('paquetes', [PaqueteController::class, 'store']);
Route::apiResource('clientes',ClienteController::class);
Route::get('ver-usuarios', [RegistroController::class, 'verUsuarios']);
Route::apiResource('registros',RegistroController::class);

