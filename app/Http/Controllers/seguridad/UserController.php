<?php

namespace App\Http\Controllers\seguridad;

use App\Http\Controllers\Controller;
use App\Models\catalogo\Departamento;
use App\Models\catalogo\EntidadCertificadora;
use App\Models\catalogo\Municipio;
use App\Models\catalogo\Pais;
use App\Models\catalogo\TipoCertificado;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $usuarios_sin_verificar = User::where('active', 0)->whereHas('perfil', function ($query) {
            $query->where('Activo', 0);
        })->get();
        //dd($usuarios_sin_verificar[0]->perfil);
        return view('seguridad.usuarios.index', compact('usuarios_sin_verificar'));
    }

    public function verificarUsuario($id){
        $usuario = User::where('id', $id)->first();
        $municipio = Municipio::find($usuario->perfil->Municipio);
        $departamento= $municipio->departamento;
        $pais=$departamento->pais;

        $paises = Pais::where('Activo', 1)->get();
        $departamentos = Departamento::get();
        $municipios = Municipio::where('Activo', 1)->get();
        $entidades = EntidadCertificadora::get();
        $tipos_certificados = TipoCertificado::get();
        //dd($usuario->perfil->Direccion);

        return view('seguridad.usuarios.verificar_usuarios', compact('usuario','municipio','departamento','pais','paises', 'departamentos', 'municipios', 'entidades', 'tipos_certificados'));

    }

    public function usuarioVerificado(Request $request,$id){

        $usuario = User::findOrFail($id);
        $usuario->perfil->Activo = $request->input('estado');
        $usuario->perfil->update();

        $subject = 'Registro pendiente de verificación';
        $content = $request->Obersaciones;
        $recipientEmail = $request->Email;
        Mail::to($recipientEmail)->send(new VerificacionMail($subject, $content));

        alert()->success('El registro ha sido actualizado correctamente');
        return Redirect::to('seguridad/usuarios/index');
    }
}
