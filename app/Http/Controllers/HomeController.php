<?php

namespace App\Http\Controllers;

use App\Models\catalogo\Departamento;
use App\Models\catalogo\EntidadCertificadora;
use App\Models\catalogo\Municipio;
use App\Models\catalogo\Pais;
use App\Models\catalogo\TipoCertificado;
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
        $paises = Pais::where('Activo', 1)->get();
        $departamentos = Departamento::get();
        $municipios = Municipio::where('Activo', 1)->get();
        $entidades = EntidadCertificadora::get();
        $tipos_certificados = TipoCertificado::get();

        return view('home', compact('paises', 'departamentos', 'municipios', 'entidades', 'tipos_certificados'));
    }

    public function test()
    {
        return view('test');
    }


}
