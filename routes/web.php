<?php

use App\Http\Controllers\EmpleadoController;
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

Route::resource('empleados', EmpleadoController::class)->except('show','edit')->middleware('auth');

Route::post('empleados/{empleado}/activar', [EmpleadoController::class, 'activate'])->name('empleados.activate')->middleware('auth');
Route::get('empleados/desactivados', [EmpleadoController::class, 'index_disable'])->name('empleados.index.disable')->middleware('auth');
Route::get('empleados/{codigo}', [EmpleadoController::class, 'show'])->name('empleados.show')->middleware('auth');
Route::get('empleados/{codigo}/edit', [EmpleadoController::class, 'edit'])->name('empleados.edit')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
