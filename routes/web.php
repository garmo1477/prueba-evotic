<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Coche_PropController;

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

Route::get('/', [Coche_PropController::class, 'index'])->name('index');
Route::get('crear-coche', [Coche_PropController::class, 'create'])->name('crear-coche');
Route::post('guardar-coche', [Coche_PropController::class, 'store'])->name('guardar-coche');

/** 
 * Ruta para el ajax
 */
Route::get('coches-propi', [Coche_PropController::class, 'buscar_coches_propis'])->name('coches-propi');