<?php

namespace App\Http\Controllers;

use App\Models\catalogo\Documento;
use App\Models\catalogo\EntidadCertificadora;
use App\Models\catalogo\Profesion;
use App\Models\registro\Certificacion;
use App\Models\registro\Proyecto;
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


        return view('inicio.busqueda', compact( 'profesiones', 'entidades', 'sectores', 'profesiones'));
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

        $sql = "select c.Id,CONCAT(u.name,' ',u.last_name) as Nombre, c.FechaVencimiento,pro.Nombre as Profesion, e.Nombre as Entidad,c.OtraEntidad
        from certificacion c 
        inner join perfil p on c.Perfil = p.Id 
        inner join users u on p.Usuario = u.id
        left join profesion pro on pro.Id = p.Profesion
        left join entidad_certificadora e on c.EntidadCertificadora = e.Id
        where (u.name like '%$texto%' or  u.last_name like '%$texto%')
        $sql_fechas  $sql_profesion  $sql_entidad ";
        $certificaciones = DB::select($sql);

        return view('inicio.busqueda_resultado',compact('certificaciones'));
        
    }

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

    public function show($id)
    {
        $certificacion = Certificacion::findOrFail($id);
        $proyectos = Proyecto::where('Perfil','=',$certificacion->Perfil)->get();
        $documentos = Documento::where('Perfil','=',$certificacion->Perfil)->get();
        return view('inicio.busqueda_show', compact('certificacion','proyectos','documentos'));
    }

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
