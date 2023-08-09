<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificacionMail;
use App\Models\catalogo\Departamento;
use App\Models\catalogo\Distrito;
use App\Models\catalogo\EntidadCertificadora;
use App\Models\catalogo\Municipio;
use App\Models\catalogo\Pais;
use App\Models\catalogo\Perfil;
use App\Models\catalogo\TipoCertificado;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
            'Dui' => ['required'],
        ] ,$messages);
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

        $perfil = new Perfil();
        // Set the values from the validated data
        $perfil->Usuario = $usuario->id;
        $perfil->Nacionalidad = $data['Nacionalidad'];
        $perfil->Dui = $data['Dui'];
        $perfil->Pais = $data ['Pais'];
        $perfil->Profesion = $data['Profesion'];
        $perfil->Municipio = $data['Municipio'];
        $perfil->Distrito = $data['Distrito'];
        //$perfil->TituloURL = $data['TituloURL'];
        $perfil->Direccion = $data['Direccion'];
        $perfil->Telefono = $data['Telefono'];
        $perfil->NivelVerificacion = 0;
        //$perfil->Certificador = $data['EntidadCertificadora'];
        //$perfil->TipoOcupacionCertificada = $data['TipoCertificado'];
        //$perfil->NumeroCertificacion = $data['NumeroCertificacion'];

        //$perfil->VigenciaCertificacion = $data['VigenciaCertificacion'];

        $perfil->save();

        return $usuario;

    }

    public function showRegistrationForm()
    {
        $paises = Pais::where('Activo', 1)->get();
        $departamentos = Departamento::get();
        $municipios = Municipio::where('Activo', '=',1)->where('Departamento','=', 1)->get();
        $entidades = EntidadCertificadora::get();
        $tipos_certificados = TipoCertificado::get();
        $distritos = Distrito::where('Municipio', '=', 1)->get();

        return view('auth.register', compact('paises', 'departamentos', 'municipios','distritos', 'entidades', 'tipos_certificados'));
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
        $content = 'Le informamos que su cuenta ha sido registrada exitosamente en nuestro sistema. Sin embargo, aún falta la verificación por parte de uno de nuestros administradores. Pronto recibirá un correo electrónico con instrucciones adicionales. Agradecemos su paciencia y comprensión.';
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
