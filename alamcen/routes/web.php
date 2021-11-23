<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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


//Empieza modulo usuarios
Route::get('/Usuarios', [UsuarioController::class, 'index']);
Route::post('/Usuarios', [UsuarioController::class, 'create'])->name('users.create');
Route::get('/ModificarUsuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('users.edit');
Route::put('/ModificarUsuarios/{Usuarios}', [UsuarioController::class, 'update'])->name('users.update');
Route::get('/BorrarUsuarios/{id}', [UsuarioController::class, 'delete'])->name('users.delete');
//Acaba modulo usuarios