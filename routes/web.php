<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

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
    return view('auth/login');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Rutas administrador
Route::get('/register', [\App\Actions\Fortify\CreateNewUser::class, 'index'])
    ->middleware(['isAdmin'])
    ->name('register');

Route::post('/register', [\App\Actions\Fortify\CreateNewUser::class, 'store'])
    ->middleware(['isAdmin:'])
    ->name('register');

Route::get('/usuarios', [\App\Http\Controllers\UserController::class, 'index'])
    ->name('listarUsuarios');

Route::get('/usuarios/editar/{id}', [\App\Http\Controllers\UserController::class, 'edit'])
    ->name('editarUsuarios');

Route::put('/usuarios/actualizar/{id}', [\App\Http\Controllers\UserController::class, 'update'])
    ->name('actualizarUsuario');


