<?php

namespace App\Http\Controllers\registro;

use App\Http\Controllers\Controller;
use App\Models\catalogo\Pais;
use App\Models\catalogo\Perfil;
use App\Models\configuracion\ConfiguracionPais;
use App\Models\registro\Proyecto;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;

class ProyectoController extends Controller
{
    public function index()
    {
        $perfil = Perfil::where('Usuario','=',auth()->user()->id)->first();
        $proyectos = Proyecto::where('Perfil','=',$perfil->Id)->get();
        return view('registro.proyecto.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $configuracion = ConfiguracionPais::first();
        $paises = Pais::get();
        return view('registro.proyecto.create', compact('paises','configuracion'));
    }

    public function store(Request $request)
    {

        $messages = [
            'Descripcion.required' => 'La descripción es requerida',
            'TipoTecnologia.required' => 'El tipo de tecnología es requerido',
            'Sector.required' => 'El sector es requerido',
            'FechaInicio.required' => 'La fecha de inicio es requerida',
            'FechaFinalizacion.required' => 'La fecha de finalización es requerida',
            'Pais.required' => 'El pais es requerido',
            'RecomendacionContratista.required' => 'La recomendacion de contratista es requerida',
            'Archivo.required' => 'El archivo es requerido',
        ];

        $request->validate([
            'Descripcion' => 'required',
            'TipoTecnologia' => 'required',
            'Sector' => 'required',
            'FechaInicio' => 'required',
            'FechaFinalizacion' => 'required',
            'Pais' => 'required',
            'RecomendacionContratista' => 'required',
            'Archivo' => 'required',
        ], $messages);

        $time = Carbon::now('America/El_Salvador');

        $user = User::findOrFail(auth()->user()->id);
        $perfil = Perfil::where('Usuario', '=', $user->id)->first();
        $proyecto = new Proyecto();

        if ($request->file('Archivo')) {
            $file = $request->file('Archivo');
            $id_file = uniqid();
            $file->move(public_path("docs/"), $id_file . ' ' . $file->getClientOriginalName());
            $proyecto->ImagenUrl = $id_file . ' ' . $file->getClientOriginalName();
        }

        $proyecto->Descripcion = $request->Descripcion;
        $proyecto->TipoTecnologia = $request->TipoTecnologia;
        $proyecto->Sector = $request->Sector;
        $proyecto->Activo = 1;
        $proyecto->Perfil =  $perfil->Id;
        $proyecto->FechaInicio = $request->FechaInicio;
        $proyecto->FechaFinalizacion = $request->FechaFinalizacion;
        $proyecto->Pais = $request->Pais;
        $proyecto->RecomendacionContratista = $request->RecomendacionContratista;

        $proyecto->UsuarioIngreso = $user->id;
        $proyecto->FechaIngreso = $time->toDateTimeString();
        $proyecto->save();

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
        $proyecto = Proyecto::findOrFail($id);
        $paises = Pais::get();
        return view('registro.proyecto.edit', compact('proyecto', 'paises'));
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

        $messages = [
            'Descripcion.required' => 'La descripción es requerida',
            'TipoTecnologia.required' => 'El tipo de tecnología es requerido',
            'Sector.required' => 'El sector es requerido',
            'FechaInicio.required' => 'La fecha de inicio es requerida',
            'FechaFinalizacion.required' => 'La fecha de finalización es requerida',
            'Pais.required' => 'El pais es requerido',
            'RecomendacionContratista.required' => 'La recomendacion de contratista es requerida',
            'Archivo.required' => 'El archivo es requerido',
        ];

        $request->validate([
            'Descripcion' => 'required',
            'TipoTecnologia' => 'required',
            'Sector' => 'required',
            'FechaInicio' => 'required',
            'FechaFinalizacion' => 'required',
            'Pais' => 'required',
            'RecomendacionContratista' => 'required',
        ], $messages);

        $time = Carbon::now('America/El_Salvador');


        $user = User::findOrFail(auth()->user()->id);
        $perfil = Perfil::where('Usuario', '=', $user->id)->first();
        $proyecto = Proyecto::findOrFail($id);

        if ($request->file('Archivo')) {

            try {
                unlink(public_path("docs/" . $proyecto->ImagenUrl));
            } catch (Exception) {
            }

            $file = $request->file('Archivo');
            $id_file = uniqid();
            $file->move(public_path("docs/"), $id_file . ' ' . $file->getClientOriginalName());
            $proyecto->ImagenUrl = $id_file . ' ' . $file->getClientOriginalName();
        }

        $proyecto->Descripcion = $request->Descripcion;
        $proyecto->TipoTecnologia = $request->TipoTecnologia;
        $proyecto->Sector = $request->Sector;
        $proyecto->Activo = 1;
        $proyecto->Perfil =  $perfil->Id;
        $proyecto->FechaInicio = $request->FechaInicio;
        $proyecto->FechaFinalizacion = $request->FechaFinalizacion;
        $proyecto->Pais = $request->Pais;
        $proyecto->RecomendacionContratista = $request->RecomendacionContratista;

        $proyecto->UsuarioModificacion = $user->id;
        $proyecto->FechaModificacion = $time->toDateTimeString();
        $proyecto->save();

        alert()->success('El registro ha sido modificado correctamente');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $proyecto = Proyecto::findOrFail($id);

        try {
            unlink(public_path("docs/" . $proyecto->ImagenUrl));
        } catch (Exception) {
        }

        $proyecto->delete();
        alert()->success('El registro ha sido eliminado correctamente');
        return back();
    }
}
