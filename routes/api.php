<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\InicioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// autenticación

Route::post('/registro',[AuthController::class,'registro']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/reset-password',[AuthController::class,'resetPassword']);

// inicio
Route::get('/listado-reservas',[InicioController::class,'listadoReservas']);
Route::post('/obtener-usuario',[InicioController::class,'obtenerUsuario']);
Route::post('/reservar-servicio',[InicioController::class,'reservarServicio']);

// reservas
Route::post('/listar-reservas-solicitados',[InicioController::class,'listarReservasSolicitados']);
Route::post('/reservar-rechazar-reserva',[InicioController::class,'reservarRechazarReserva']);
Route::post('/listar-mis-reservas',[InicioController::class,'listarMisReservas']);
Route::post('/reservar-eliminar',[InicioController::class,'reservarEliminar']);


Route::get('/datos-sensores',[InicioController::class,'datos']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
