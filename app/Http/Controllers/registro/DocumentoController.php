<?php

namespace App\Http\Controllers\registro;

use App\Http\Controllers\Controller;
use App\Models\catalogo\Documento;
use App\Models\catalogo\Perfil;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        $perfil = Perfil::findOrFail($user->perfil->Id);
        $documentos = Documento::where('Perfil', '=', $user->perfil->Id)->get();

        return view('registro.documento.index', compact('documentos', 'perfil'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $documento = new Documento();
        if ($request->file('Archivo')) {
            $file = $request->file('Archivo');
            $id_file = uniqid();
            $file->move(public_path("docs/"), $id_file . ' ' . $file->getClientOriginalName());
            $documento->Url = $id_file . ' ' . $file->getClientOriginalName();
        }

        $documento->Perfil = $request->Perfil;
        $documento->Descripcion = $request->Descripcion;
        $documento->save();

        alert()->success('El archivo hay sido agregado correctamente');
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $documento = Documento::findOrFail($id);
        return view('registro.documento.edit', compact('documento'));
    }

    public function update(Request $request, $id)
    {
        $documento = Documento::findOrFail($id);
        if ($request->file('Archivo')) {
            $file = $request->file('Archivo');
            $id_file = uniqid();
            $file->move(public_path("docs/"), $id_file . ' ' . $file->getClientOriginalName());
            $documento->Url = $id_file . ' ' . $file->getClientOriginalName();
        }
        $documento->Descripcion = $request->Descripcion;
        $documento->save();

        alert()->success('El archivo hay sido agregado correctamente');
        return back();
    }

    public function destroy($id)
    {
        $documento = Documento::findOrFail($id);
        try {
            unlink(public_path("docs/") . $documento->Url);
        } catch (Exception $e) {
        }

        $documento->delete();

        alert()->success('El archivo hay sido eliminado correctamente');
        return back();
    }
}
