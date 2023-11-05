<?php

use App\Http\Controllers\BusquedaController;
use App\Http\Controllers\catalogo\LugarFormacionController;
use App\Http\Controllers\catalogo\PaisController;
use App\Http\Controllers\catalogo\ProfesionController;
use App\Http\Controllers\catalogo\SectorController;
use App\Http\Controllers\catalogo\TipoCertificadoController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\editor\GrapesJSController;
use App\Http\Controllers\EditorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\publico\HeaderController;
use App\Http\Controllers\publico\MenuController;
use App\Http\Controllers\registro\CertificacionController;
use App\Http\Controllers\registro\DocumentoController;
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
Route::get('select_pais/{id}', [WelcomeController::class, 'show']);

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
Route::post('seguridad/permission/update_permission', [PermissionController::class, 'update_permission']);

Route::post('seguridad/usuario/link_role', [UsuarioController::class, 'link_role']);
Route::post('seguridad/usuario/unlink_role', [UsuarioController::class, 'unlink_role']);
Route::post('seguridad/usuario/active', [UsuarioController::class, 'active']);

Route::post('register_consulta', [UsuarioController::class, 'register_consulta']);
Route::post('login_consulta', [UsuarioController::class, 'login_consulta']);
Route::get('consulta/verify/{token}', [UsuarioController::class,'verify'])->name('consulta.verify');


Route::resource('seguridad/usuario', UsuarioController::class);
Route::resource('seguridad/role', RoleController::class);
Route::post('seguridad/role/unlink_permission', [RoleController::class, 'unlink_permission']);
Route::post('seguridad/role/link_permission', [RoleController::class, 'link_permission']);



Route::post('seguridad/perfil/documento', [PerfilController::class, 'documento']);
Route::get('seguridad/perfil/get_municipio/{id}', [PerfilController::class, 'get_municipio']);
Route::get('seguridad/perfil/get_distrito/{id}', [PerfilController::class, 'get_distrito']);
Route::get('seguridad/perfil/cambio_clave', [PerfilController::class, 'cambio_clave']);
Route::post('seguridad/perfil/cambio_clave_store', [PerfilController::class, 'cambio_clave_store']);
Route::resource('seguridad/perfil', PerfilController::class);





//usuarios
Route::resource('seguridad/usuarios', UserController::class);
Route::get('seguridad/usuarios/verificarUsuario/{id}', [UserController::class, 'verificarUsuario'])->name('usuarios.verificarUsuario');
Route::post('seguridad/usuarios/usuarioVerificado/{id}', [UserController::class, 'usuarioVerificado'])->name('usuarios.usuarioVerificado');
Route::post('seguridad/usuarios/add_profesion', [UserController::class, 'add_profesion']);
Route::post('seguridad/usuarios/add_lugar_formacion', [UserController::class, 'add_lugar_formacion']);

Route::get('seguridad/usuarios/verify/{token}', [UserController::class,'verify'])->name('usuarios.verify');



//acceso publico
Route::post('publico/sub_menu', [MenuController::class, 'store_sub_menu']);
Route::resource('publico/menu', MenuController::class);
Route::get('publico/pagina/{id}', [MenuController::class, 'page_menu']);



Route::get('publico/busqueda/show_file/{id}', [BusquedaController::class,'show_file']);
Route::get('publico/busqueda/resultado', [BusquedaController::class,'busqueda']);
Route::resource('publico/busqueda', BusquedaController::class);






//proyectos
Route::post('registro/certificacion/send', [CertificacionController::class, 'send']);
Route::post('registro/certificacion/asignar', [CertificacionController::class, 'asignar']);
Route::post('registro/certificacion/entidad', [CertificacionController::class, 'entidad']);
Route::post('registro/certificacion/observar', [CertificacionController::class, 'observar']);
Route::post('registro/certificacion/aprobar', [CertificacionController::class, 'aprobar']);
Route::resource('registro/certificacion', CertificacionController::class);
Route::resource('registro/proyecto', ProyectoController::class);
Route::resource('registro/documento', DocumentoController::class);


//configuracion

Route::get('configuracion/pais', [ConfiguracionController::class, 'pais']);
Route::get('configuracion/getUrlpais/{id}', [ConfiguracionController::class, 'getUrl']);
Route::post('configuracion/pais', [ConfiguracionController::class, 'pais_update']);

Route::get('configuracion/alcance', [ConfiguracionController::class, 'alcance']);
Route::post('configuracion/alcance', [ConfiguracionController::class, 'alcance_update']);

Route::get('configuracion/correo', [ConfiguracionController::class, 'correo']);
Route::post('configuracion/correo', [ConfiguracionController::class, 'correo_update']);


Route::post('configuracion/header_image', [HeaderController::class, 'update_image']);
Route::post('configuracion/text', [HeaderController::class, 'update_text']);


//editor de paginas
Route::get('editor/editor_grapesJS', [GrapesJSController::class, 'editor_grapesJS']);
Route::post('editor/guardarPagina', [GrapesJSController::class, 'guardarPagina']);

Route::resource('editor', EditorController::class);
Route::post('editor/guardarPagina/{id}', [EditorController::class, 'guardarPagina']);
Route::post('editor/add_documento', [EditorController::class, 'add_documento']);
Route::post('editor/del_documento', [EditorController::class, 'del_documento']);
Route::post('editor/add_noticia', [EditorController::class, 'add_noticia']);
Route::post('editor/del_noticia', [EditorController::class, 'del_noticia']);
//catalogos

Route::resource('catalogo/tipo_certificado', TipoCertificadoController::class);
Route::post('catalogo/pais/attach_tipo', [PaisController::class,'attach_tipo']);
Route::post('catalogo/pais/detach_tipo', [PaisController::class,'detach_tipo']);
Route::resource('catalogo/pais', PaisController::class);

Route::resource('catalogo/sector', SectorController::class);
Route::resource('catalogo/profesion', ProfesionController::class);
Route::resource('catalogo/lugar_formacion', LugarFormacionController::class);



Route::get('/page-test', function () {
    return view('test');
});



