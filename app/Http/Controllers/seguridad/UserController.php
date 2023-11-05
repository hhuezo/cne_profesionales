<?php

namespace App\Http\Controllers\seguridad;

use Alert;
use App\Http\Controllers\Controller;
use App\Mail\VerificacionMail;
use App\Models\catalogo\DepartamentoProvincia;
use App\Models\catalogo\DistritoCorregimiento;
use App\Models\catalogo\EntidadCertificadora;
use App\Models\catalogo\LugarFormacion;
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
use App\Models\configuracion\ConfiguracionSmtp;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::where('active', 1)->whereHas('perfil')->get();


        return view('seguridad.usuarios.index', compact('usuarios'));
    }

    public function verificarUsuario($id)
    {
        $usuario = User::findOrFail($id);

        $distritos_corregimientos = DistritoCorregimiento::where('MunicipioDistrito', '=', $usuario->perfil->distrito_corregimiento->MunicipioDistrito)->get();

        $municipios_distritos = MunicipioDistrito::where('Activo', 1)->where('DepartamentoProvincia', '=', $usuario->perfil->distrito_corregimiento->municipio_distrito->DepartamentoProvincia)->get();
        $departamentos_provincia = DepartamentoProvincia::where('Pais', '=', $usuario->perfil->distrito_corregimiento->municipio_distrito->departamento_provincia->Pais)->get();

        $pais = Pais::findOrFail($usuario->perfil->distrito_corregimiento->municipio_distrito->departamento_provincia->Pais);
        $entidades = EntidadCertificadora::get();
        $profesiones = Profesion::where('Activo', '=', 1)->get();
        $lugares_formacion = LugarFormacion::where('Activo','=',1)->get();
        return view('seguridad.usuarios.verificar_usuarios', compact('usuario', 'pais', 'departamentos_provincia',
            'municipios_distritos', 'distritos_corregimientos', 'entidades', 'profesiones','lugares_formacion'));

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


        $configuracionSmtp = ConfiguracionSmtp::first(); // Supongamos que solo hay una configuración en la base de datos
        config([
            'mail.mailers.smtp.host' => $configuracionSmtp->smtp_host,
            'mail.mailers.smtp.port' => $configuracionSmtp->smtp_port,
            'mail.mailers.smtp.username' => $configuracionSmtp->smtp_username,
            'mail.mailers.smtp.password' => $configuracionSmtp->smtp_password,
            'mail.from.address' => $configuracionSmtp->from_address,
            'mail.mailers.smtp.encryption' => $configuracionSmtp->smtp_encryption,
            'mail.from.name' => $configuracionSmtp->smtp_from_name,
        ]);


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


        $configuracionSmtp = ConfiguracionSmtp::first(); // Supongamos que solo hay una configuración en la base de datos
        config([
            'mail.mailers.smtp.host' => $configuracionSmtp->smtp_host,
            'mail.mailers.smtp.port' => $configuracionSmtp->smtp_port,
            'mail.mailers.smtp.username' => $configuracionSmtp->smtp_username,
            'mail.mailers.smtp.password' => $configuracionSmtp->smtp_password,
            'mail.from.address' => $configuracionSmtp->from_address,
            'mail.mailers.smtp.encryption' => $configuracionSmtp->smtp_encryption,
            'mail.from.name' => $configuracionSmtp->smtp_from_name,
        ]);


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
        $perfil->OtraProfesion = "";
        $perfil->save();

        alert()->success('La profesión ha sido agregada correctamente');
        return back();

    }

    public function add_lugar_formacion(Request $request)
    {

        $lugar_formacion = new LugarFormacion();
        $lugar_formacion->Nombre = $request->Nombre;
        $lugar_formacion->save();

        $perfil = Perfil::findOrFail($request->Perfil);
        $perfil->LugarFormacion = $lugar_formacion->Id;
        $perfil->OtroLugarFormacion = "";
        $perfil->save();

        alert()->success('La profesión ha sido agregada correctamente');
        return back();

    }


}
