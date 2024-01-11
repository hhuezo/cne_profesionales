<?php

namespace App\Http\Controllers;

use App\Models\catalogo\Documento;
use App\Models\catalogo\Pais;
use App\Models\catalogo\Perfil;
use App\Models\configuracion\ConfiguracionAlcance;
use App\Models\configuracion\ConfiguracionPais;
use App\Models\configuracion\ConfiguracionSmtp;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $configuracion->smtp_encryption = $request->smtp_encryption;
        $configuracion->smtp_from_name = $request->smtp_from_name;
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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function reset_database()
    {
        return view('reset_data_base.index');
    }

    public function update_database()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('busqueda_historial')->truncate();
        DB::table('certificacion')->truncate();
        DB::table('certificacion')->truncate();

        $documentos = Documento::get();
        foreach ($documentos as $documento) {
            try {
                unlink(public_path("docs/") . $documento->Url);
            } catch (Exception $e) {
            }
        }
        DB::table('documento')->truncate();
        DB::table('entidad_certificadora')->where('Id', '>', 1)->delete();

        $perfiles = Perfil::get();
        foreach($perfiles as $perfil)
        {
            try {
                unlink(public_path("docs/") . $perfil->DocumentoURL);
            } catch (Exception $e) {
            }
        }

        DB::table('perfil')->truncate();
        DB::table('lugar_formacion')->where('Id', '>', 1)->delete();
        DB::table('proyecto')->truncate();
        DB::table('sector')->where('Id', '>', 1)->delete();
        DB::table('tipo_certificado')->truncate();
        DB::table('users')->where('Id', '>', 1)->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        alert()->success('La base de datos ha sido reiniciada correctamente');
        return back();
    }
}
