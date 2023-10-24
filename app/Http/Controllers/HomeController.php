<?php

namespace App\Http\Controllers;


use App\Models\catalogo\DepartamentoProvincia;
use App\Models\catalogo\DistritoCorregimiento;

use App\Models\catalogo\MunicipioDistrito;
use App\Models\catalogo\Pais;
use App\Models\catalogo\Profesion;
use App\Models\registro\BusquedaHistorial;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

            $distritos_corregimientos = DistritoCorregimiento::where('MunicipioDistrito', '=', $usuario->perfil->distrito_corregimiento->MunicipioDistrito)->get();
            $municipios_distritos = MunicipioDistrito::where('Activo', 1)->where('DepartamentoProvincia', '=', $usuario->perfil->distrito_corregimiento->municipio_distrito->DepartamentoProvincia)->get();
            $departamentos_provincia = DepartamentoProvincia::where('Pais', '=', $usuario->perfil->distrito_corregimiento->municipio_distrito->departamento_provincia->Pais)->get();

            $paises = Pais::get();
            $profesiones = Profesion::get();


            return view('home', compact(
                'usuario',
                'pais',
                'departamentos_provincia',
                'municipios_distritos',
                'distritos_corregimientos',
                'paises',
                'profesiones'
            ));
        } else if (auth()->user()->can('dashboard')) {
            $profesiones = BusquedaHistorial::join('profesion', 'profesion.Id', '=', 'busqueda_historial.Profesion')
                ->select(DB::raw('ifnull(count(busqueda_historial.Id),0) as Conteo'), 'profesion.Nombre as Profesion')
                ->where('Profesion', '<>', null)->take(10)
                ->groupBy('profesion.Id')
                ->get();

            $profesionesArray = $profesiones->pluck('Profesion')->toArray();
            $profesionesConteoArray = $profesiones->pluck('Conteo')->toArray();


            $entidades = BusquedaHistorial::join('entidad_certificadora', 'entidad_certificadora.Id', '=', 'busqueda_historial.EntidadCertificadora')
                ->select(DB::raw('ifnull(count(busqueda_historial.Id),0) as Conteo'), 'entidad_certificadora.Nombre as Entidad')
                ->where('EntidadCertificadora', '<>', null)->take(10)
                ->groupBy('entidad_certificadora.Id')
                ->get();

            $entidadesArray = $entidades->pluck('Entidad')->toArray();
            $entidadesConteoArray = $entidades->pluck('Conteo')->toArray();

            $perfiles = BusquedaHistorial::join('perfil', 'perfil.Id', '=', 'busqueda_historial.Perfil')
                ->join('users','users.id','=','perfil.Usuario')
                ->select(DB::raw('ifnull(count(busqueda_historial.Id),0) as Conteo'),  DB::raw('concat(users.name , " " , users.last_name) as Nombre'))
                ->where('Perfil', '<>', null)->take(10)
                ->groupBy('perfil.Id')
                ->get();
                $perfilesArray = $perfiles->pluck('Nombre')->toArray();
                $perfilesConteoArray = $perfiles->pluck('Conteo')->toArray();

            return view('home', compact('profesionesArray', 'profesionesConteoArray','entidadesArray',
            'entidadesConteoArray','perfilesArray','perfilesConteoArray'));
        } 
        else if($usuario->hasRole('consulta'))
        {
            return redirect('publico/busqueda/');
        }
        else {
            return view('home');
        }
    }

    public function test()
    {
        return view('test');
    }
}
