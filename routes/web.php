<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\seguridad\UserController;

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

Route::get('/proyectos', function () {
    return view('proyectos');
});

//Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/test', [HomeController::class, 'test'])->name('test');

//usuarios
Route::resource('seguridad/usuarios', UserController::class);
Route::get('seguridad/usuarios/verificarUsuario/{id}',[UserController::class, 'verificarUsuario'])->name('usuarios.verificarUsuario');
Route::post('seguridad/usuarios/usuarioVerificado/{id}',[UserController::class, 'usuarioVerificado'])->name('usuarios.usuarioVerificado');


