<?php

namespace App\Http\Controllers;

use App\Models\catalogo\EntidadCertificadora;
use App\Models\catalogo\Profesion;
use App\Models\registro\Certificacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusquedaController extends Controller
{

    public function index(Request $request)
    {
        $profesiones = Profesion::orderBy('Nombre')->get();
        $entidades = EntidadCertificadora::orderBy('Nombre')->get();
        $sectores = ["Bancario", "Industrial", "Comercio", "Industrial", "Comercio y Servicios", "Educación", "Residencial ", "Otros"];
        $profesiones = Profesion::get();
        $fechaHoraActual = Carbon::now();

        $certificaciones = DB::table('certificacion as c')
            ->join('perfil as p', 'c.Perfil', '=', 'p.Id')
            ->join('users as u', 'p.Usuario', '=', 'u.id')
            ->leftJoin('profesion as pro', 'pro.Id', '=', 'p.Profesion')
            ->leftJoin('entidad_certificadora as e', 'c.EntidadCertificadora', '=', 'e.Id')
            ->select(DB::raw('CONCAT(u.name, " ", u.last_name) as Nombre'), 'c.FechaVencimiento', 'pro.Nombre as Profesion', 'e.Nombre as Entidad')
            ->where('c.FechaVencimiento', '>', $fechaHoraActual->toDateTimeString())
            ->get();
        return view('inicio.busqueda', compact('certificaciones', 'profesiones', 'entidades', 'sectores', 'profesiones'));
    }


    public function busqueda(Request $request)
    {
        $texto = "";
        if ($request->Texto) {
            $texto = $request->Texto;
        }

        $sql_fechas = "";
        if ($request->FechaInicio && $request->FechaFinal) {
            $sql_fechas = " and c.FechaVencimiento between '$request->FechaInicio' and  '$request->FechaFinal'";
        }

        $sql_profesion = "";
        if ($request->Profesion) {
            $sql_profesion = " and pro.Id = $request->Profesion";
        }

        $sql_entidad = "";
        if ($request->EntidadCertificadora) {
            $sql_entidad = " and e.Id = $request->EntidadCertificadora";
        }

        $sql = "select CONCAT(u.name,' ',u.last_name) as Nombre, c.FechaVencimiento,pro.Nombre as Profesion, e.Nombre as Entidad  from certificacion c 
        inner join perfil p on c.Perfil = p.Id 
        inner join users u on p.Usuario = u.id
        left join profesion pro on pro.Id = p.Profesion
        left join entidad_certificadora e on c.EntidadCertificadora = e.Id
        where (u.name like '%$texto%' or  u.last_name like '%$texto%')
        $sql_fechas  $sql_profesion  $sql_entidad ";
        $certificaciones = DB::select($sql);

        return view('inicio.busqueda_show',compact('certificaciones'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
