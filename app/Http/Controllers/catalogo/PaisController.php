<?php

namespace App\Http\Controllers\catalogo;

use App\Http\Controllers\Controller;
use App\Models\catalogo\Pais;
use App\Models\catalogo\TipoDocumento;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function __construct()
    {
          $this->middleware('auth');
    }

    public function index()
    {
        $paises = Pais::orderBy('Activo', 'desc')->get();
        return view('catalogo.pais.index', compact('paises'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function attach_tipo(Request $request)
    {
        $tipo_documento = new TipoDocumento();
        $tipo_documento->Nombre  = $request->Nombre;
        $tipo_documento->Pais  = $request->Pais;
        if($request->Predeterminado)
        {
            $tipo_documento->Predeterminado = 1;
        }
        $tipo_documento->save();

        TipoDocumento::where('Id','<>',$tipo_documento ->Id)->update(['Predeterminado' => 0]);


        alert()->success('El registro ha sido agregado correctamente');
        return back();
    }

    public function detach_tipo(Request $request)
    {
        $tipo_documento = TipoDocumento::findOrFail($request->Id);
        $tipo_documento->delete();


        alert()->success('El registro ha sido eliminado correctamente');
        return back();
    }

    public function edit($id)
    {
        $pais = Pais::findOrFail($id);
        $tipo_documentos = TipoDocumento::where('Pais', '=', $id)->get();
        return view('catalogo.pais.edit', compact('pais', 'tipo_documentos'));
    }


    public function update(Request $request, $id)
    {
        $pais = Pais::findOrFail($id);

        if ($request->file('Bandera')) {

            $file = $request->file('Bandera');
            $id_file = uniqid();
            $file->move(public_path("img/"), $id_file . ' ' . $file->getClientOriginalName());
            $pais->Bandera = $id_file . ' ' . $file->getClientOriginalName();
        }

        $pais->Url = $request->Url;
        if ($request->Activo == null) {
            $pais->Activo = 0;
        } else {
            $pais->Activo = 1;
        }
        $pais->update();

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
        //
    }
}
