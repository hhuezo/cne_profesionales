<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Mail\VerificacionMail;
use App\Models\catalogo\DepartamentoProvincia;
use App\Models\catalogo\DistritoCorregimiento;
use App\Models\catalogo\EntidadCertificadora;
use App\Models\catalogo\MunicipioDistrito;
use App\Models\catalogo\Pais;
use App\Models\catalogo\Perfil;
use App\Models\catalogo\Profesion;
use App\Models\catalogo\TipoCertificado;
use App\Models\configuracion\ConfiguracionPais;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'password.required' => 'La contraseña es requerida',
            'email.unique' => 'El correo ya existe en la base de datos',
            'password.min' => 'Las claves debe tener al menos 8 caracteres',
            'name.required' => 'El nombre es requerido',
            'last_name.required' => 'El apellido es requerido',
            'Nacionalidad.required' => 'La nacionalidad es requerida',
            'Direccion.required' => 'El dirección es requerida',
            'Profesion.required' => 'El profesión es requerida',
            'Dui.required' => 'El DUI es requerido',
        ];

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'], //, 'confirmed'
            'Nacionalidad' => ['required'],
            'Direccion' => ['required'],
            'Profesion' => ['required'],
            //'Dui' => ['required'],
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $this->validator($data)->validate();

        $usuario = User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'active' => 1,
        ]);

        // Generar token de verificación
        $verificationToken = Str::random(40);
        $usuario->remember_token = $verificationToken;
        $usuario->save();


       

        $perfil = new Perfil();


        if ($data['FotoUrl']) {
            try {
                unlink(public_path("docs/") . $perfil->FotoUrl);
            } catch (Exception $e) {
                //return $e->getMessage();
            }
        }

        if ($data['FotoUrl']) {
            $file = $data['FotoUrl'];
            $id_file = uniqid();
            $file->move(public_path("docs/"), $id_file . ' ' . $file->getClientOriginalName());
            $perfil->FotoUrl = $id_file . ' ' . $file->getClientOriginalName();
        }


        $perfil->Usuario = $usuario->id;
        $perfil->Pais = session('id_pais');
        $perfil->Nacionalidad = $data['Nacionalidad'];
        $perfil->OtraProfesion = $data['OtraProfesion'];
        $perfil->Profesion = $data['Profesion'];
        $perfil->DistritoCorregimiento = $data['Distrito'];
        $perfil->Direccion = $data['Direccion'];
        $perfil->Telefono = $data['Telefono'];
        $perfil->NivelVerificacion = 0;

        $perfil->save();

        return $usuario;
    }

    public function showRegistrationForm()
    {

        /* if(!session('id_pais'))
        {
            return Redirect::to('/');
        }*/

        $configuracion = ConfiguracionPais::first();

        $pais = $configuracion->Pais;

        $departamento_provincia = DepartamentoProvincia::where('Pais', '=', $pais)->get();
        if ($pais == 130) {
            $municipio_distrito = MunicipioDistrito::where('Activo', '=', 1)->where('DepartamentoProvincia', '=', 1)->get();
            $distrito_corregimiento = DistritoCorregimiento::where('MunicipioDistrito', '=', 1)->get();
        } else {
            $municipio_distrito = MunicipioDistrito::where('Activo', '=', 1)->where('DepartamentoProvincia', '=', 15)->get();
            $distrito_corregimiento = DistritoCorregimiento::where('MunicipioDistrito', '=', 45)->get();
        }

        $entidades = EntidadCertificadora::get();
        $tipos_certificados = TipoCertificado::get();
        $profesiones = Profesion::where('Activo', '=', 1)->get();

        $paises = Pais::get();

        return view('auth.register', compact(
            'departamento_provincia',
            'municipio_distrito',
            'distrito_corregimiento',
            'entidades',
            'tipos_certificados',
            'paises',
            'profesiones',
            'pais'
        ));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {

        //$this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);

        $subject = 'Registro pendiente de verificación';
        $content = "¡Gracias por registrarte! Por favor, verifica tu cuenta haciendo clic <a href=" . route('usuarios.verify', $user->remember_token) . ">aquí</a>.";
        $recipientEmail = $request->email;
        // dd($recipientEmail);
        Mail::to($recipientEmail)->send(new VerificacionMail($subject, $content));

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    protected function registered(Request $request, $user)
    {
        $user->load('perfil');
        session(['perfil' => $user->perfil]);

        return redirect()->intended($this->redirectPath());
    }
}
