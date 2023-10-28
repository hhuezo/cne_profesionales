<?php

namespace App\Http\Controllers\catalogo;

use App\Http\Controllers\Controller;
use App\Models\catalogo\TipoCertificado;
use Illuminate\Http\Request;

class TipoCertificadoController extends Controller
{
    public function __construct()
    {
          $this->middleware('auth');
    }

    public function index()
    {
        $tipo_certificados = TipoCertificado::get();
        return view('catalogo.tipo_certificado.index', compact('tipo_certificados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogo.tipo_certificado.create');
    }


    public function store(Request $request)
    {
        $messages = [
            'Descripcion.required' => 'La descripción es requerida',
            'Alcance.required' => 'El alcance es requerido',
        ];

        $request->validate([
            'Descripcion' => 'required',
            'Alcance' => 'required',
        ], $messages);

        $tipo_certificado = new TipoCertificado();
        $tipo_certificado->Descripcion = $request->Descripcion;
        $tipo_certificado->Alcance = $request->Alcance;
        $tipo_certificado->save();
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
        return view('catalogo.tipo_certificado.edit', ['tipo_certificado' => TipoCertificado::findOrFail($id)]);
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
            'Alcance.required' => 'El alcance es requerido',
        ];

        $request->validate([
            'Descripcion' => 'required',
            'Alcance' => 'required',
        ], $messages);

        $tipo_certificado = TipoCertificado::findOrFail($id);
        $tipo_certificado->Descripcion = $request->Descripcion;
        $tipo_certificado->Alcance = $request->Alcance;
        $tipo_certificado->save();
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
        $tipo_certificado = TipoCertificado::findOrFail($id);
        $tipo_certificado->delete();
        alert()->info('El registro ha sido eliminado correctamente');
        return back();
    }
}
