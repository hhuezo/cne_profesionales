<?php

namespace App\Http\Controllers\catalogo;

use App\Http\Controllers\Controller;
use App\Models\catalogo\Profesion;
use Illuminate\Http\Request;

class ProfesionController extends Controller
{
    public function index()
    {
        $profesiones = Profesion::where('Activo','=',1)->get();
        return view('catalogo.profesion.index', compact('profesiones'));
    }

    public function create()
    {
        return view('catalogo.profesion.create');
    }

    public function store(Request $request)
    {
        $profesion = new Profesion();
        $profesion->Nombre = $request->Nombre;
        $profesion->save();

        alert()->success('El registro ha sido creado correctamente');
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $profesion = Profesion::findOrFail($id);
        return view('catalogo.profesion.edit', compact('profesion'));
    }

    public function update(Request $request, $id)
    {
        $profesion = Profesion::findOrFail($id);
        $profesion->Nombre = $request->Nombre;
        $profesion->update();

        alert()->success('El registro ha sido actualizado correctamente');
        return back();
    }

    public function destroy($id)
    {
        $profesion = Profesion::findOrFail($id);
        $profesion->Activo = 0;
        $profesion->update();

        alert()->success('El registro ha sido desactivado correctamente');
        return back();
    }
}