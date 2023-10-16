<?php

namespace App\Http\Controllers\catalogo;

use App\Http\Controllers\Controller;
use App\Models\catalogo\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function index()
    {
        $paises = Pais::orderBy('Activo','desc')->get();
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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('catalogo.pais.edit', ['pais' => Pais::findOrFail($id)]);
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
