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
            $pais = Pais::findOrFail($usuario->perfil->distrito_corregimiento->municipio_distrito->departamento_provincia->Pais);
            $distrito_corregimiento = DistritoCorregimiento::findOrFail($usuario->perfil->DistritoCorregimiento);

            $distritos_corregimientos = DistritoCorregimiento::where('MunicipioDistrito','=',$usuario->perfil->distrito_corregimiento->MunicipioDistrito)->get();
            $municipios_distritos = MunicipioDistrito::where('Activo', 1)->where('DepartamentoProvincia','=',$usuario->perfil->distrito_corregimiento->municipio_distrito->DepartamentoProvincia)->get();
            $departamentos_provincia= DepartamentoProvincia::where('Pais','=',$usuario->perfil->distrito_corregimiento->municipio_distrito->departamento_provincia->Pais)->get();
     
            


            return view('home', compact(
                'usuario',
                'pais',
                'departamentos_provincia',
                'municipios_distritos',
                'distritos_corregimientos'
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
