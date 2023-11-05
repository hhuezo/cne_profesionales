<?php

namespace App\Http\Controllers\catalogo;

use App\Http\Controllers\Controller;
use App\Models\catalogo\LugarFormacion;
use Illuminate\Http\Request;

class LugarFormacionController extends Controller
{
    public function __construct()
    {
          $this->middleware('auth');
    }

    public function index()
    {
        $lugar_formaciones = LugarFormacion::get();
        return view('catalogo.lugar_formacion.index', compact('lugar_formaciones'));
    }

    public function create()
    {
        return view('catalogo.lugar_formacion.create');
    }

    public function store(Request $request)
    {
        $lugar_formacion = new LugarFormacion();
        $lugar_formacion->Nombre = $request->Nombre;
        $lugar_formacion->save();

        alert()->success('El registro ha sido creado correctamente');
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $lugar_formacion = LugarFormacion::findOrFail($id);
        return view('catalogo.lugar_formacion.edit', compact('lugar_formacion'));
    }

    public function update(Request $request, $id)
    {
        $lugar_formacion = LugarFormacion::findOrFail($id);
        $lugar_formacion->Nombre = $request->Nombre;
        $lugar_formacion->update();

        alert()->success('El registro ha sido actualizado correctamente');
        return back();
    }

    public function destroy($id)
    {
        $lugar_formacion = LugarFormacion::findOrFail($id);
        $lugar_formacion->Activo = 0;
        $lugar_formacion->update();

        alert()->success('El registro ha sido desactivado correctamente');
        return back();
    }

    public function active(Request $request)
    {
        $sector = LugarFormacion::findOrFail($request->id);
        $sector->Activo = 1;
        $sector->update();

        alert()->success('El registro ha sido activado correctamente');
        return back();
    }
}
