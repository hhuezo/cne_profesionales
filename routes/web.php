<?php

use App\Http\Controllers\catalogo\TipoCertificadoController;
use App\Http\Controllers\ConfiguracionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\registro\CertificacionController;
use App\Http\Controllers\registro\ProyectoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\seguridad\PerfilController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\WelcomeController;

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


Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [WelcomeController::class, 'index']);
//Route::get('select_pais/{id}', [WelcomeController::class, 'show']);
//Route::get('login', [WelcomeController::class, 'show']);

Route::get('login', [Auth\LoginController::class, 'showLoginForm']);
Route::post('login', [Auth\Logincontroller::class, 'login']);


Route::get('/proyectos', function () {
    return view('proyectos');
});

//Route::get('/', [HomeController::class, 'index']);




Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/test', [HomeController::class, 'test'])->name('test');




Route::resource('seguridad/permission', PermissionController::class);
Route::post('seguridad/permission/update_permission', [PermissionController::class,'update_permission']);

Route::post('seguridad/usuario/link_role', [UsuarioController::class,'link_role']);
Route::post('seguridad/usuario/unlink_role', [UsuarioController::class,'unlink_role']);
Route::resource('seguridad/usuario', UsuarioController::class);
Route::resource('seguridad/role', RoleController::class);
Route::post('seguridad/role/unlink_permission', [RoleController::class,'unlink_permission']);
Route::post('seguridad/role/link_permission', [RoleController::class,'link_permission']);

Route::get('seguridad/perfil/get_municipio/{id}', [PerfilController::class,'get_municipio']);
Route::get('seguridad/perfil/get_distrito/{id}', [PerfilController::class,'get_distrito']);
Route::get('seguridad/perfil/cambio_clave', [PerfilController::class,'cambio_clave']);
Route::post('seguridad/perfil/cambio_clave_store', [PerfilController::class,'cambio_clave_store']);
Route::resource('seguridad/perfil', PerfilController::class);



//usuarios
Route::resource('seguridad/usuarios', UserController::class);
Route::get('seguridad/usuarios/verificarUsuario/{id}',[UserController::class, 'verificarUsuario'])->name('usuarios.verificarUsuario');
Route::post('seguridad/usuarios/usuarioVerificado/{id}',[UserController::class, 'usuarioVerificado'])->name('usuarios.usuarioVerificado');






//proyectos
Route::post('registro/certificacion/send', [CertificacionController::class, 'send']);
Route::post('registro/certificacion/asignar', [CertificacionController::class, 'asignar']);
Route::post('registro/certificacion/entidad', [CertificacionController::class, 'entidad']);
Route::post('registro/certificacion/observar', [CertificacionController::class, 'observar']);
Route::post('registro/certificacion/aprobar', [CertificacionController::class, 'aprobar']);
Route::resource('registro/certificacion', CertificacionController::class);
Route::resource('registro/proyecto', ProyectoController::class);



//configuracion

Route::get('configuracion/pais', [ConfiguracionController::class, 'pais']);
Route::post('configuracion/pais', [ConfiguracionController::class, 'pais_update']);



//catalogos

Route::resource('catalogo/tipo_certificado', TipoCertificadoController::class);
