<?php

namespace App\Http\Controllers\catalogo;

use App\Http\Controllers\Controller;
use App\Models\catalogo\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function __construct()
    {
          $this->middleware('auth');
    }

    public function index()
    {
        $sectores = Sector::get();
        return view('catalogo.sector.index', compact('sectores'));
    }

    public function create()
    {
        return view('catalogo.sector.create');
    }

    public function store(Request $request)
    {
        $sector = new Sector();
        $sector->Nombre = $request->Nombre;
        $sector->save();

        alert()->success('El registro ha sido creado correctamente');
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $sector = Sector::findOrFail($id);
        return view('catalogo.sector.edit', compact('sector'));
    }

    public function update(Request $request, $id)
    {
        $sector = Sector::findOrFail($id);
        $sector->Nombre = $request->Nombre;
        $sector->update();

        alert()->success('El registro ha sido actualizado correctamente');
        return back();
    }

    public function destroy($id)
    {
        $sector = Sector::findOrFail($id);
        $sector->Activo = 0;
        $sector->update();

        alert()->success('El registro ha sido desactivado correctamente');
        return back();
    }

    public function active(Request $request)
    {
        $sector = Sector::findOrFail($request->id);
        $sector->Activo = 1;
        $sector->update();

        alert()->success('El registro ha sido activado correctamente');
        return back();
    }
}
