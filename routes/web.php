<?php

use App\Http\Controllers\MisReservas;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ServicioController;
use App\Models\Servicio;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    
    return view('welcome',['servicios'=>Servicio::where('estado','ACTIVO')->get()]);
})->name('inicio');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('servicios', ServicioController::class);

    Route::get('servicios-fotos/{id}',[ ServicioController::class,'fotos'])->name('servicios.fotos');
    Route::post('servicios-fotos-guardar',[ ServicioController::class,'fotosGuardar'])->name('servicios.fotos-guardar');
    


    // reservas

    Route::get('reserva-detalle/{id}',[ ReservaController::class,'detalle'])->name('reserva.detalle');
    Route::post('reserva-guardar',[ ReservaController::class,'guardar'])->name('reserva.guardar');


    // mis reservas
    Route::get('mis-reservas',[ MisReservas::class,'index'])->name('mis-reserva.index');
    Route::get('mis-reservas-recibo/{id}',[ MisReservas::class,'reciboPdf'])->name('mis-reserva.recibo-pdf');
    Route::get('mis-reservas-eliminar/{id}',[ MisReservas::class,'eliminar'])->name('mis-reserva.eliminar');
    Route::get('mis-reservas-detalle/{id}',[ MisReservas::class,'detalle'])->name('mis-reserva.detalle');
    




});

require __DIR__.'/auth.php';
