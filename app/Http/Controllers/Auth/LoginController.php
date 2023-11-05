<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\catalogo\Municipio;
use App\Models\catalogo\Pais;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    protected function attemptLogin(Request $request)
    {
        return Auth::attempt(
            $this->credentials($request) + ['active' => 1],
            $request->filled('remember')
        );
    }

    protected function authenticated(Request $request, $user)
    {
        $user->load('perfil');
        session(['perfil' => $user->perfil]);

        if (isset(session('perfil')->NivelVerificacion) && session('perfil')->NivelVerificacion == 1) {
            /*$municipio = Municipio::find(session('perfil')->Municipio);
            session(['departamento' => $municipio->departamento]);
            session(['pais' => session('departamento')->pais]);*/
            //dd(session('departamento')->Id,session('pais')->Id);
        }
        return redirect()->intended($this->redirectPath());
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }




    public function showLoginForm()
    {
        /*if(!session('id_pais'))
        {
            return Redirect::to('/');
        }*/
        $paises = Pais::where('Activo', '=', 1)->get();
        return view('auth.login', compact('paises'));
    }
}
