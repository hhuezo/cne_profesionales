<?php

namespace App\Http\Controllers;


use App\Models\catalogo\DepartamentoProvincia;
use App\Models\catalogo\DistritoCorregimiento;

use App\Models\catalogo\MunicipioDistrito;
use App\Models\catalogo\Pais;
use App\Models\catalogo\Perfil;
use App\Models\catalogo\Profesion;
use App\Models\registro\BusquedaHistorial;
use App\Models\User;
use Illuminate\Http\Request;
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
    public function index(Request $request)
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

            $fecha_inicio = "";
            $fecha_final = "";

            if ($request->FechaInicio && $request->FechaFinal) {
                $fecha_inicio = $request->FechaInicio;
                $fecha_final = $request->FechaFinal;
            }

            if ($request->FechaInicio && $request->FechaFinal) {
                $profesiones = BusquedaHistorial::join('profesion', 'profesion.Id', '=', 'busqueda_historial.Profesion')
                ->select(DB::raw('ifnull(count(busqueda_historial.Id),0) as Conteo'), 'profesion.Nombre as Profesion')
                ->whereBetween('Fecha', [$fecha_inicio,$fecha_final])
                ->where('Profesion', '<>', null)->take(10)
                ->groupBy('profesion.Id')
                ->get();


                $entidades = BusquedaHistorial::join('entidad_certificadora', 'entidad_certificadora.Id', '=', 'busqueda_historial.EntidadCertificadora')
                ->select(DB::raw('ifnull(count(busqueda_historial.Id),0) as Conteo'), 'entidad_certificadora.Nombre as Entidad')
                ->where('EntidadCertificadora', '<>', null)->take(10)
                ->whereBetween('Fecha', [$fecha_inicio,$fecha_final])
                ->groupBy('entidad_certificadora.Id')
                ->get();

                $perfiles = BusquedaHistorial::join('perfil', 'perfil.Id', '=', 'busqueda_historial.Perfil')
                ->join('users', 'users.id', '=', 'perfil.Usuario')
                ->select(DB::raw('ifnull(count(busqueda_historial.Id),0) as Conteo'),  DB::raw('concat(users.name , " " , users.last_name) as Nombre'))
                ->where('Perfil', '<>', null)->take(10)
                ->whereBetween('Fecha', [$fecha_inicio,$fecha_final])
                ->groupBy('perfil.Id')
                ->get();

                $visitas = BusquedaHistorial::where('Tipo','=',4)->whereBetween('Fecha', [$fecha_inicio,$fecha_final])->count();
            }
            else{
                $profesiones = BusquedaHistorial::join('profesion', 'profesion.Id', '=', 'busqueda_historial.Profesion')
                ->select(DB::raw('ifnull(count(busqueda_historial.Id),0) as Conteo'), 'profesion.Nombre as Profesion')
                ->where('Profesion', '<>', null)->take(10)
                ->groupBy('profesion.Id')
                ->get();

                $entidades = BusquedaHistorial::join('entidad_certificadora', 'entidad_certificadora.Id', '=', 'busqueda_historial.EntidadCertificadora')
                ->select(DB::raw('ifnull(count(busqueda_historial.Id),0) as Conteo'), 'entidad_certificadora.Nombre as Entidad')
                ->where('EntidadCertificadora', '<>', null)->take(10)
                ->groupBy('entidad_certificadora.Id')
                ->get();

                $perfiles = BusquedaHistorial::join('perfil', 'perfil.Id', '=', 'busqueda_historial.Perfil')
                ->join('users', 'users.id', '=', 'perfil.Usuario')
                ->select(DB::raw('ifnull(count(busqueda_historial.Id),0) as Conteo'),  DB::raw('concat(users.name , " " , users.last_name) as Nombre'))
                ->where('Perfil', '<>', null)->take(10)
                ->groupBy('perfil.Id')
                ->get();

                $visitas = BusquedaHistorial::where('Tipo','=',4)->count();
            }

            $profesionales = Perfil::count();


            $profesionesArray = $profesiones->pluck('Profesion')->toArray();
            $profesionesConteoArray = $profesiones->pluck('Conteo')->toArray();


            $entidadesArray = $entidades->pluck('Entidad')->toArray();
            $entidadesConteoArray = $entidades->pluck('Conteo')->toArray();


            $perfilesArray = $perfiles->pluck('Nombre')->toArray();
            $perfilesConteoArray = $perfiles->pluck('Conteo')->toArray();

            return view('home', compact(
                'profesionesArray',
                'profesionesConteoArray',
                'entidadesArray',
                'entidadesConteoArray',
                'perfilesArray',
                'perfilesConteoArray',
                'visitas',
                'profesionales'
            ));
        } else if ($usuario->hasRole('consulta')) {
            return redirect('publico/busqueda/');
        } else {
            return view('home');
        }
    }

    public function test()
    {
        return view('test');
    }
}
