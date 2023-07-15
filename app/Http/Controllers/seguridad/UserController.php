<?php

namespace App\Http\Controllers\seguridad;

use App\Http\Controllers\Controller;
use App\Mail\VerificacionMail;
use App\Models\catalogo\Departamento;
use App\Models\catalogo\EntidadCertificadora;
use App\Models\catalogo\Municipio;
use App\Models\catalogo\Pais;
use App\Models\catalogo\TipoCertificado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Alert;

class UserController extends Controller
{
    public function index()
    {
        $usuarios_sin_verificar = User::where('active', 1)->whereHas('perfil', function ($query) {
            $query->where('NivelVerificacion', 0);
        })->get();
        //dd($usuarios_sin_verificar[0]->perfil);
        return view('seguridad.usuarios.index', compact('usuarios_sin_verificar'));
    }

    public function verificarUsuario($id)
    {
        $usuario = User::where('id', $id)->first();
        $municipio = Municipio::find($usuario->perfil->Municipio);
        $departamento = $municipio->departamento;
        $pais = $departamento->pais;

        $paises = Pais::where('Activo', 1)->get();
        $departamentos = Departamento::get();
        $municipios = Municipio::where('Activo', 1)->get();
        $entidades = EntidadCertificadora::get();
        $tipos_certificados = TipoCertificado::get();
        //dd($usuario->perfil->Direccion);

        return view('seguridad.usuarios.verificar_usuarios', compact('usuario', 'municipio', 'departamento', 'pais', 'paises', 'departamentos', 'municipios', 'entidades', 'tipos_certificados'));

    }

    public function usuarioVerificado(Request $request, $id)
    {

        $usuario = User::findOrFail($id);
        $usuario->perfil->NivelVerificacion = $request->input('estado');
        $usuario->perfil->update();

        if ($usuario->perfil->NivelVerificacion == 1) {
            $subject = 'Necesitas actualizar tu información';
        } else {
            $subject = '¡Perfil verificado!';
        }
        $content = $request->Observaciones;
        $recipientEmail = $usuario->email;
        Mail::to($recipientEmail)->send(new VerificacionMail($subject, $content));

        Alert::success('Actualización','El registro ha sido actualizado correctamente');

        return Redirect::to('seguridad/usuarios');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->input('Nombre');
        $user->last_name = $request->input('Apellido');
        $user->email = $request->input('Email');

        $user->update();

        $perfil = $user->perfil;

        $perfil->Dui = $request->input('Dui');
        //$perfil->DuiURL = $request->input('DuiURL');
        $perfil->Profesion = $request->input('Profesion');
        //$perfil->TituloURL = $request->input('TituloURL');
        $perfil->Nacionalidad = $request->input('Nacionalidad');
        $perfil->Municipio = $request->input('Municipio');
        $perfil->Direccion = $request->input('Direccion');
        $perfil->Telefono = $request->input('Telefono');
        //$perfil->UsuarioIngreso = $request->input('UsuarioIngreso');
        //$perfil->FechaIngreso = $request->input('FechaIngreso');
        //if (auth()->user()->can('perfil_sin_verificar')) {
        $perfil->NivelVerificacion = 0;
        session('perfil')->NivelVerificacion=0;
        //}
        $perfil->Certificador = $request->input('EntidadCertificadora');
        $perfil->TipoOcupacionCertificada = $request->input('TipoCertificado');
        $perfil->NumeroCertificacion = $request->input('NumeroCertificacion');
        //$perfil->LicenciaURL = $request->input('LicenciaURL');
        $perfil->VigenciaCertificacion = $request->input('VigenciaCertificacion');

        $perfil->update();
        Alert::success('Actualización', 'Sus datos han sido actualizados.');

        $subject = 'Actualización de datos';
        $content = 'Le informamos que sus datos han sido actualizados exitosamente en nuestro sistema. Sin embargo, aún falta la verificación por parte de uno de nuestros administradores. Pronto recibirá un correo electrónico con instrucciones adicionales. Agradecemos su paciencia y comprensión.';
        $recipientEmail = $request->Email;
        Mail::to($recipientEmail)->send(new VerificacionMail($subject, $content));
        return back();
    }
}
