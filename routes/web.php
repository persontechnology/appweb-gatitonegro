<?php

use App\Http\Controllers\MisReservas;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ReservasAdminController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UserController;
use App\Models\Servicio;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/limpiar-cache', function () {
    
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    return 'ok';
    // Artisan::call('storage:link');
    // Artisan::call('key:generate');
    // Artisan::call('migrate:fresh --seed');
});


Route::get('/', function () {
    
    return view('welcome',['servicios'=>Servicio::where('estado','ACTIVO')->get()]);
})->name('inicio');

Route::get('/dashboard', function () {
    $data = array(
        'solicitados'=>Auth::user()->reservas->where('estado','SOLICITADO'),
        'reservados'=>Auth::user()->reservas->where('estado','RESERVADO'),
        'rechazados'=>Auth::user()->reservas->where('estado','RECHAZADO')
    );

    return view('dashboard',$data);

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('servicios', ServicioController::class);

    Route::get('servicios-fotos/{id}',[ ServicioController::class,'fotos'])->name('servicios.fotos');
    Route::post('servicios-fotos-guardar',[ ServicioController::class,'fotosGuardar'])->name('servicios.fotos-guardar');
    
    // usuarios
    Route::resource('usuarios', UserController::class);


    // reservas

    Route::get('reserva-detalle/{id}',[ ReservaController::class,'detalle'])->name('reserva.detalle');
    Route::post('reserva-guardar',[ ReservaController::class,'guardar'])->name('reserva.guardar');


    // mis reservas
    Route::get('mis-reservas',[ MisReservas::class,'index'])->name('mis-reserva.index');
    Route::get('mis-reservas-recibo/{id}',[ MisReservas::class,'reciboPdf'])->name('mis-reserva.recibo-pdf');
    Route::get('mis-reservas-eliminar/{id}',[ MisReservas::class,'eliminar'])->name('mis-reserva.eliminar');
    Route::get('mis-reservas-detalle/{id}',[ MisReservas::class,'detalle'])->name('mis-reserva.detalle');



    // reservas admin
    Route::resource('reservas-admin', ReservasAdminController::class);
    Route::post('reservas-admin-estado/{id}', [ReservasAdminController::class,'estado'])->name('reservas-admin.estado');
    




});

require __DIR__.'/auth.php';
