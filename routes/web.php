<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TreballadorController;
use App\Http\Controllers\VolController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('index');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');
    Route::resource('clients', ClientController::class);
    Route::resource('treballadors', TreballadorController::class)->middleware('cap.only');
    Route::resource('reserva', ReservaController::class);
    Route::get('/reserva/{passaport_client}/{codi_vol}', [ReservaController::class, 'show'])->name('reserva.show');
    Route::get('/reserva/{passaport_client}/{codi_vol}/edit', [ReservaController::class, 'edit'])->name('reserva.edit');
    Route::put('/reserva/{passaport_client}/{codi_vol}', [ReservaController::class, 'update'])->name('reserva.update');
    Route::get('/reserva/{passaport_client}/{codi_vol}/pdf', [ReservaController::class, 'pdf'])->name('reserva.pdf');

    Route::get('/vols/{codi_vol}/pdf', [VolController::class, 'pdf'])->name('vols.pdf');
    Route::get('/treballadors/{id}/pdf', [TreballadorController::class, 'pdf'])->name('treballadors.pdf');

    Route::delete('/reserva/{passaport_client}/{codi_vol}', [ReservaController::class, 'destroy'])->name('reserva.destroy');



    Route::resource('vols', VolController::class);
    Route::get('/clients/{id}/pdf', [ClientController::class, 'generatePDF'])->name('clients.pdf');
});

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
