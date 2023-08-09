<?php

namespace App\Http\Controllers;

use App\Models\catalogo\Departamento;
use App\Models\catalogo\Distrito;
use App\Models\catalogo\EntidadCertificadora;
use App\Models\catalogo\Municipio;
use App\Models\catalogo\Pais;
use App\Models\catalogo\TipoCertificado;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuario = User::findOrFail(auth()->user()->id);

        if ($usuario->perfil) {
            $paises = Pais::where('Activo', 1)->get();
            $departamentos = Departamento::get();
            $municipios = Municipio::where('Activo', 1)->get();
            $distritos = Distrito::where('Municipio', '=', $usuario->perfil->Municipio)->get();


            return view('home', compact(
                'usuario',
                'paises',
                'departamentos',
                'municipios',
                'distritos'
            ));
        }
        else{
            return view('home');
        }
    }

    public function test()
    {
        return view('test');
    }
}
