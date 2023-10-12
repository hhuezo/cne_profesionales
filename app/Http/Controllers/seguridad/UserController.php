<?php

namespace App\Http\Controllers\seguridad;

use Alert;
use App\Http\Controllers\Controller;
use App\Mail\VerificacionMail;
use App\Models\catalogo\DepartamentoProvincia;
use App\Models\catalogo\DistritoCorregimiento;
use App\Models\catalogo\EntidadCertificadora;
use App\Models\catalogo\MunicipioDistrito;
use App\Models\catalogo\Pais;
use App\Models\catalogo\Perfil;
use App\Models\catalogo\Profesion;
use App\Models\catalogo\TipoCertificado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $usuarios_sin_verificar = User::where('active', 1)->whereHas('perfil', function ($query) {
            $query->where('NivelVerificacion', 0);
        })->get();

        return view('seguridad.usuarios.index', compact('usuarios_sin_verificar'));
    }

    public function verificarUsuario($id)
    {
        $usuario = User::findOrFail($id);

        $distritos_corregimientos = DistritoCorregimiento::where('MunicipioDistrito', '=', $usuario->perfil->distrito_corregimiento->MunicipioDistrito)->get();

        $municipios_distritos = MunicipioDistrito::where('Activo', 1)->where('DepartamentoProvincia', '=', $usuario->perfil->distrito_corregimiento->municipio_distrito->DepartamentoProvincia)->get();
        $departamentos_provincia = DepartamentoProvincia::where('Pais', '=', $usuario->perfil->distrito_corregimiento->municipio_distrito->departamento_provincia->Pais)->get();

        $pais = Pais::findOrFail($usuario->perfil->distrito_corregimiento->municipio_distrito->departamento_provincia->Pais);
        $entidades = EntidadCertificadora::get();
        $tipos_certificados = TipoCertificado::get();
        $profesiones = Profesion::where('Activo', '=', 1)->get();
        return view('seguridad.usuarios.verificar_usuarios', compact('usuario', 'pais', 'departamentos_provincia',
            'municipios_distritos', 'distritos_corregimientos', 'entidades', 'tipos_certificados', 'profesiones'));

    }

    public function usuarioVerificado(Request $request, $id)
    {

        $usuario = User::findOrFail($id);
        $usuario->perfil->NivelVerificacion = $request->input('estado');
        $usuario->perfil->update();

        if ($request->estado == 2) {
            $usuario->assignRole('solicitante');
        }

        if ($usuario->perfil->NivelVerificacion == 1) {
            $subject = 'Necesitas actualizar tu información';
        } else {
            $subject = '¡Perfil verificado!';
        }
        $content = $request->Observaciones;
        $recipientEmail = $usuario->email;
        Mail::to($recipientEmail)->send(new VerificacionMail($subject, $content));

        Alert::success('Actualización', 'El registro ha sido actualizado correctamente')->showConfirmButton()->autoClose(20000);

        return Redirect::to('seguridad/usuarios');
    }

    public function verify($token)
    {
        $usuario = User::where('VerificationToken', $token)->first();

        if (!$usuario) {
            abort(404); // Token no válido
        }

        $usuario->perfil->NivelVerificacion = 2;
        $usuario->perfil->update();
        $usuario->assignRole('solicitante');

        $usuario->VerificationToken = null;
        $usuario->save();

         // Iniciar sesión automáticamente
            Auth::login($usuario);
            $usuario->load('perfil');
            session(['perfil' => $usuario->perfil]);

            Alert::success('Actualización', 'Tu cuenta ha sido verificada.');

            return Redirect::to('/home');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->input('Nombre');
        $user->last_name = $request->input('Apellido');
        $user->email = $request->input('Email');

        $user->update();

        $perfil = $user->perfil;

        //$perfil->Dui = $request->input('Dui');
        //$perfil->DuiURL = $request->input('DuiURL');
        $perfil->Profesion = $request->input('Profesion');
        //$perfil->TituloURL = $request->input('TituloURL');
        $perfil->Nacionalidad = $request->input('Nacionalidad');
        $perfil->Direccion = $request->input('Direccion');
        $perfil->Telefono = $request->input('Telefono');
        $perfil->DistritoCorregimiento = $request->input('Distrito');
        $perfil->OtraProfesion = $request->input('OtraProfesion');
        //if (auth()->user()->can('perfil_sin_verificar')) {
        $perfil->NivelVerificacion = 0;
        session('perfil')->NivelVerificacion = 0;
        //}

        $perfil->update();
        Alert::success('Actualización', 'Sus datos han sido actualizados.');

        $subject = 'Actualización de datos';
        $content = 'Le informamos que sus datos han sido actualizados exitosamente en nuestro sistema. Sin embargo, aún falta la verificación por parte de uno de nuestros administradores. Pronto recibirá un correo electrónico con instrucciones adicionales. Agradecemos su paciencia y comprensión.';
        $recipientEmail = $request->Email;
        Mail::to($recipientEmail)->send(new VerificacionMail($subject, $content));
        return back();
    }

    public function add_profesion(Request $request)
    {

        $profesion = new Profesion();
        $profesion->Nombre = $request->Nombre;
        $profesion->save();

        $perfil = Perfil::findOrFail($request->Perfil);
        $perfil->Profesion = $profesion->Id;
        $perfil->save();

        alert()->success('La profesión ha sido agregada correctamente');
        return back();

    }
}
