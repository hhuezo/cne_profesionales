<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificacionMail;
use Illuminate\Support\Str;
use Alert;
use Illuminate\Support\Facades\Redirect;
use App\Models\configuracion\ConfiguracionSmtp;


class UsuarioController extends Controller
{

    public function __construct()
    {
          $this->middleware('auth');
    }

    public function index()
    {

        $sql =  "select id,name,last_name,email, (SELECT GROUP_CONCAT(r.name SEPARATOR ', ') FROM roles r JOIN model_has_roles m ON r.id = m.role_id
                where m.model_id = users.id  GROUP BY m.model_id  ) as roles from users";

        $usuarios = DB::select($sql);

        return view('seguridad.usuario.index', compact('usuarios'));
    }

    public function create()
    {
        return view('seguridad.usuario.create');
    }


    public function store(Request $request)
    {
        $messages = [
            'password.required' => 'La contraseña es requerida',
            'email.unique' => 'El correo ya existe en la base de datos',
            'password.min' => 'Las claves debe tener al menos 8 caracteres',
            'name.required' => 'El nombre es requerido',
            'last_name.required' => 'El apellido es requerido',
        ];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'], //, 'confirmed'

        ], $messages);

        $user = new User();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        alert()->info('El registro ha sido modificado correctamente');
        return redirect('seguridad/usuario/' . $user->id . '/edit');
    }

    public function register_consulta(Request $request)
    {
        $messages = [
            'password.required' => 'La contraseña es requerida',
            'email.unique' => 'El correo ya existe en la base de datos',
            'password.min' => 'Las claves debe tener al menos 8 caracteres',
            'name.required' => 'El nombre es requerido',
            'last_name.required' => 'El apellido es requerido',
        ];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'], //, 'confirmed'

        ], $messages);


         // Generar token de verificación
        $verificationToken = Str::random(40);
        $user = new User();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->sector = $request->sector;
        if($request->sector == 1)
        {
            $user->otro_sector = $request->OtroSector;
        }
        $user->ocupacion = $request->ocupacion;
        if($request->ocupacion == 1)
        {
            $user->otra_ocupacion = $request->OtraOcupacion;
        }
        $user->password = Hash::make($request->password);
        $user->VerificationToken = $verificationToken;
        $user->active = 1;
        $user->save();

        $user->assignRole('consulta');


        $subject = 'Registro pendiente de verificación';
        $content = "¡Gracias por registrarte! Por favor, verifica tu cuenta haciendo clic <a href=" . route('consulta.verify', $user->VerificationToken) . ">aquí</a>.";
        $recipientEmail = $request->email;


        $configuracionSmtp = ConfiguracionSmtp::first(); // Supongamos que solo hay una configuración en la base de datos
        config([
            'mail.mailers.smtp.host' => $configuracionSmtp->smtp_host,
            'mail.mailers.smtp.port' => $configuracionSmtp->smtp_port,
            'mail.mailers.smtp.username' => $configuracionSmtp->smtp_username,
            'mail.mailers.smtp.password' => $configuracionSmtp->smtp_password,
            'mail.from.address' => $configuracionSmtp->from_address,
        ]);


        // dd($recipientEmail);
        Mail::to($recipientEmail)->send(new VerificacionMail($subject, $content));

        //Auth::login($user);
        alert()->info('Necesita verificar su correo para continuar.');
        return back();
    }

    public function login_consulta(Request $request)
    {
        $credenciales = $request->only('email', 'password');

        if (Auth::attempt($credenciales)) {
            $user = Auth::user();
            if($user->VerificationToken==null){
            return back();
            }else{
                Alert::error('ERROR', 'Necesita verificar su correo para continuar.');
                Auth::logout(); // Cierra la sesión del usuario actual
                return Redirect::to('publico/busqueda');
            }
        } else {
           // alert()->error('Credenciales no válidas');
            return back()->withErrors(['email' => 'Credenciales incorrectas']);
        }
    }

    public function verify($token)
    {
        $usuario = User::where('VerificationToken', $token)->first();

        if (!$usuario) {
            abort(404); // Token no válido
        }

        $usuario->VerificationToken = null;
        $usuario->save();

         // Iniciar sesión automáticamente
            Auth::login($usuario);

            Alert::success('Actualización', 'Tu cuenta ha sido verificada.');

            return Redirect::to('publico/busqueda');
    }




    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get();
        $roles_actuales = $user->user_has_role;

        return view('seguridad.usuario.edit', compact('user', 'roles', 'roles_actuales'));
    }

    public function link_role(Request $request)
    {

        $user = User::findOrFail($request->users_id);
        $role = Role::findOrFail($request->role);

        if ($user->hasRole($role->name)) {
            alert()->error('El rol ya esta registrado');
            return back();
        }

        $user->assignRole($role->name);
        alert()->success('El registro ha sido creado correctamente');
        return back();
    }

    public function unlink_role(Request $request)
    {

        $user = User::findOrFail($request->users_id);
        $role = Role::findOrFail($request->role);

        $user->removeRole($role->name);
        alert()->info('El registro ha sido eliminado correctamente');
        return back();
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'password.required' => 'La contraseña es requerida',
            'email.unique' => 'El correo ya existe en la base de datos',
            'password.min' => 'Las claves debe tener al menos 8 caracteres',
            'name.required' => 'El nombre es requerido',
            'last_name.required' => 'El apellido es requerido',
        ];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            //, ', 'unique:users''

        ], $messages);

        $count = User::where('email', '=', $request->email)->where('id', '<>', $id)->count();

        if ($count > 0) {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ], $messages);
        }

        $user = User::findOrFail($id);

        if ($request->password != '') {
            $request->validate([
                'password' => ['required', 'string', 'min:8'],
            ], $messages);

            $user->password = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;

        $user->update();

        alert()->success('El registro ha sido actualizado correctamente');
        return back();
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        alert()->success('El registro ha sido eliminado correctamente');
        return back();
    }
}
