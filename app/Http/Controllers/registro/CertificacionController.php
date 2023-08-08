<?php

namespace App\Http\Controllers\registro;

use App\Http\Controllers\Controller;
use App\Models\catalogo\Pais;
use App\Models\registro\Certificacion;
use App\Models\User;
use Illuminate\Http\Request;

class CertificacionController extends Controller
{
    public function index()
    {
        $certificaciones = Certificacion::get();
        return view('registro.certificacion.index', compact('certificaciones'));
    }

    public function create()
    {
        $paises = Pais::get();
        return view('registro.certificacion.create', compact('paises'));
    }

    public function store(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $perfil = $user->perfil->first();
        $certificacion = new Certificacion();

        if ($request->file('Archivo')) {
            $file = $request->file('Archivo');
            $id_file = uniqid();
            $file->move(public_path("docs/"), $id_file . ' ' . $file->getClientOriginalName());
            $certificacion->Archivo = $id_file . ' ' . $file->getClientOriginalName();
        }
        $certificacion->Descripcion = $request->Descripcion;
        $certificacion->TipoTecnologia = $request->TipoTecnologia;
        $certificacion->Sector = $request->Sector;
        $certificacion->Activo = 1;
        $certificacion->Perfil =  $perfil->Id;
        $certificacion->UsuarioIngreso = $user->id;
        $certificacion->FechaInicio = $request->FechaInicio;
        $certificacion->FechaFinalizacion = $request->FechaFinalizacion;
        $certificacion->Pais = $request->Pais;
        $certificacion->RecomendacionContratista = $request->RecomendacionContratista;
        $certificacion->save();

        alert()->success('El registro ha sido creado correctamente');
        return back();
    }


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
