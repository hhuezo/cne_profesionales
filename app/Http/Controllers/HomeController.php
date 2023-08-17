<?php

namespace App\Http\Controllers;


use App\Models\catalogo\DepartamentoProvincia;
use App\Models\catalogo\DistritoCorregimiento;

use App\Models\catalogo\MunicipioDistrito;
use App\Models\catalogo\Pais;
use App\Models\User;

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
            $distrito_corregimiento = DistritoCorregimiento::findOrFail($usuario->perfil->DistritoCorregimiento);

            $distritos = DistritoCorregimiento::where('MunicipioDistrito', '=', $usuario->perfil->Municipio)->get();
            $departamentos = DepartamentoProvincia::get();
            $municipios = MunicipioDistrito::where('Activo', 1)->get();
            


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
