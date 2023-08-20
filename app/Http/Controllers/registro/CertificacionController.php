<?php

namespace App\Http\Controllers\registro;

use App\Http\Controllers\Controller;
use App\Models\catalogo\EntidadCertificadora;
use App\Models\registro\Certificacion;
use App\Models\registro\CertificacionDetalle;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CertificacionController extends Controller
{
    public function index()
    {
        $certificaciones = Certificacion::get();
        return view('registro.certificacion.index', compact('certificaciones'));
    }

    public function create()
    {
        $entidades  = EntidadCertificadora::get();
        return view('registro.certificacion.create', compact('entidades'));
    }

    public function store(Request $request)
    {
        $messages = [
            'Descripcion.required' => 'La descripción es requerida',
            'TipoTecnologia.required' => 'El tipo de tecnología es requerida',
            'Sector.required' => 'El sector es requerido',
            'Numero.required' => 'El número de certificación es requerido',
            'FechaEmision.required' => 'La fecha de emisión es requerida',
            'FechaVencimiento.required' => 'La fecha de vencimiento es requerida',
            'EntidadCertificadora.required' => 'La entidad certificadora es requerida',
            'RecomendacionContratista.required' => 'La recomendación del contratista es requerida',
        ];

        $request->validate([
            'Descripcion' => 'required',
            'TipoTecnologia' => 'required',
            'Sector' => 'required',
            'Numero' => 'required',
            'FechaEmision' => 'required',
            'FechaVencimiento' => 'required',
            'EntidadCertificadora' => 'required',
            'RecomendacionContratista' => 'required',
        ], $messages);


        $user = User::findOrFail(auth()->user()->id);
        $perfil = $user->perfil->first();
        $time = Carbon::now('America/El_Salvador');

        $certificacion = new Certificacion();
        $certificacion->Descripcion = $request->Descripcion;
        $certificacion->Perfil =  $perfil->Id;
        $certificacion->UsuarioCreacion = $user->id;
        $certificacion->Estado = 1;
        $certificacion->FechaCreacion = $time->toDateTimeString();
        $certificacion->save();

        $detalle = new CertificacionDetalle();

        if ($request->file('Archivo')) {
            $file = $request->file('Archivo');
            $id_file = uniqid();
            $file->move(public_path("docs/"), $id_file . ' ' . $file->getClientOriginalName());
            $detalle->Archivo = $id_file . ' ' . $file->getClientOriginalName();
        }
        $detalle->Descripcion = $request->Descripcion;
        $detalle->Certificacion =  $certificacion->Id;
        $detalle->TipoTecnologia = $request->TipoTecnologia;
        $detalle->Sector = $request->Sector;
        $detalle->Numero = $request->Numero;
        $detalle->FechaEmision = $request->FechaEmision;
        $detalle->FechaVencimiento = $request->FechaFinalizacion;
        $detalle->EntidadCertificadora = $request->EntidadCertificadora;
        $detalle->RecomendacionContratista = $request->RecomendacionContratista;
        $detalle->UsuarioIngreso = $user->id;    
        $detalle->FechaCreacion = $time->toDateTimeString();
        $detalle->Estado = 1;
        
        $detalle->save();

        alert()->success('El registro ha sido creado correctamente');
        return redirect('registro/certificacion/' . $certificacion->Id . '/edit');
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
        $entidades  = EntidadCertificadora::get();
        $certificacion = Certificacion::findOrFail($id);
        $detalles = CertificacionDetalle::where('Certificacion','=',$id)->get();
        return view('registro.certificacion.edit', compact('certificacion','detalles','entidades'));
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
        $detalle = new CertificacionDetalle();

        if ($request->file('Archivo')) {
            $file = $request->file('Archivo');
            $id_file = uniqid();
            $file->move(public_path("docs/"), $id_file . ' ' . $file->getClientOriginalName());
            $detalle->Archivo = $id_file . ' ' . $file->getClientOriginalName();
        }
        $detalle->Descripcion = $request->Descripcion;
        $detalle->Certificacion =  $id;
        $detalle->TipoTecnologia = $request->TipoTecnologia;
        $detalle->Sector = $request->Sector;
        $detalle->Numero = $request->Numero;
        $detalle->FechaEmision = $request->FechaEmision;
        $detalle->FechaVencimiento = $request->FechaFinalizacion;
        $detalle->EntidadCertificadora = $request->EntidadCertificadora;
        $detalle->RecomendacionContratista = $request->RecomendacionContratista;
        $detalle->UsuarioIngreso = auth()->user()->id;    
        $detalle->Estado = 1;
        
        $detalle->save();
        
        alert()->success('El registro ha sido creado correctamente');
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
        //
    }
}
