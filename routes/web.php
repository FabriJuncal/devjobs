<?php

use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\VacanteController;
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

// Para esto agregamos el valor "verified" en la función "middleware([])"
// Agregamos una 2da validación para que el usuario pueda ver las páginas de la plataforma
Route::get('/dashboard',[ VacanteController::class, 'index'])->middleware(['auth' ,'verified'])->name('vacantes.index');
Route::get('/vacantes/create',[ VacanteController::class, 'create'])->middleware(['auth' ,'verified'])->name('vacantes.create');
Route::get('/vacantes/{vacante}/edit',[ VacanteController::class, 'edit'])->middleware(['auth' ,'verified'])->name('vacantes.edit');
Route::get('/vacantes/{vacante}',[ VacanteController::class, 'show'])->name('vacantes.show');

// Notificaciones
Route::get('/notificaciones', NotificacionController::class)->name('notificaciones.index');

require __DIR__.'/auth.php';
