<?php

namespace App\Http\Controllers;

use App\Models\catalogo\Pais;
use App\Models\configuracion\ConfiguracionAlcance;
use App\Models\configuracion\ConfiguracionPais;
use App\Models\configuracion\ConfiguracionSmtp;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function __construct()
    {
          $this->middleware('auth');
    }
    public function pais()
    {
        $paises = Pais::where('Activo', '=', 1)->get();
        $configuracion = ConfiguracionPais::first();
        return view('configuracion.pais', compact('paises', 'configuracion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function alcance()
    {
        $configuracion = ConfiguracionAlcance::first();
        return view('configuracion.alcance', compact('configuracion'));
    }

    public function alcance_update(Request $request)
    {
        $configuracion = ConfiguracionAlcance::findOrFail($request->Id);
        $configuracion->Descripcion = $request->Descripcion;
        $configuracion->Alcance = $request->Alcance;
        $configuracion->update();

        alert()->success('El registro ha sido modificado correctamente');
        return back();
    }



    public function correo()
    {
        $configuracion = ConfiguracionSmtp::first();
        return view('configuracion.correo', compact('configuracion'));
    }

    public function correo_update(Request $request)
    {
        $configuracion = ConfiguracionSmtp::findOrFail($request->Id);
        $configuracion->smtp_host = $request->smtp_host;
        $configuracion->smtp_port = $request->smtp_port;
        $configuracion->smtp_username = $request->smtp_username;
        $configuracion->smtp_password = $request->smtp_password;
        $configuracion->from_address = $request->from_address;
        $configuracion->update();

        alert()->success('El registro ha sido modificado correctamente');
        return back();
    }



    public function getUrl($id)
    {
        return Pais::findOrFail($id);
    }



    public function pais_update(Request $request)
    {
        $configuracion = ConfiguracionPais::first();
        $configuracion->Pais = $request->Pais;
        $configuracion->update();


        // $pais = Pais::findOrFail($configuracion->Pais);
        // $pais->Url = $request->Url;
        // $pais->update();
        alert()->success('El registro ha sido modificado correctamente');
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
