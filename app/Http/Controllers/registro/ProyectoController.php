<?php

namespace App\Http\Controllers\registro;

use App\Http\Controllers\Controller;
use App\Models\catalogo\Pais;
use App\Models\registro\Proyecto;
use App\Models\User;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::get();
        return view('registro.proyecto.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Pais::get();
        return view('registro.proyecto.create', compact('paises'));
    }

    public function store(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $perfil = $user->perfil->first();
        $proyecto = new Proyecto();

        if ($request->file('Archivo')) {
            $file = $request->file('Archivo');
            $id_file = uniqid();
            $file->move(public_path("docs/"), $id_file . ' ' . $file->getClientOriginalName());
            $proyecto->Archivo = $id_file . ' ' . $file->getClientOriginalName();
        }
        $proyecto->Descripcion = $request->Descripcion;
        $proyecto->TipoTecnologia = $request->TipoTecnologia;
        $proyecto->Sector = $request->Sector;
        $proyecto->Activo = 1;
        $proyecto->Perfil =  $perfil->Id;
        $proyecto->UsuarioIngreso = $user->id;
        $proyecto->FechaInicio = $request->FechaInicio;
        $proyecto->FechaFinalizacion = $request->FechaFinalizacion;
        $proyecto->Pais = $request->Pais;
        $proyecto->RecomendacionContratista = $request->RecomendacionContratista;
        $proyecto->save();

        alert()->success('El registro ha sido creado correctamente');
        return back();
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
