<?php

namespace App\Http\Controllers\seguridad;

use App\Http\Controllers\Controller;
use App\Models\catalogo\Departamento;
use App\Models\catalogo\EntidadCertificadora;
use App\Models\catalogo\Municipio;
use App\Models\catalogo\Pais;
use App\Models\catalogo\Perfil;
use App\Models\catalogo\TipoCertificado;
use App\Models\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        $perfil = Perfil::with('usuario')->where('Usuario', '=', auth()->user()->id)->first();
        $paises = Pais::where('Activo', 1)->get();
        $departamentos = Departamento::get();
        $municipios = Municipio::where('Activo', 1)->get();
        $entidades = EntidadCertificadora::get();
        $tipos_certificados = TipoCertificado::get();
        return view('seguridad.perfil.index', compact('perfil', 'paises', 'departamentos', 'municipios', 'entidades', 'tipos_certificados'));
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
        //
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'name.required' => 'El nombre es requerido',
            'last_name.required' => 'El apellido es requerido',
        ];

        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'last_name' => 'required',
        ], $messages);


        $perfil = Perfil::findOrFail($id);
        $perfil->Dui = $request->Dui;
        $perfil->Profesion = $request->Profesion;
        $perfil->Nacionalidad = $request->Nacionalidad;
        $perfil->Direccion = $request->Direccion;
        $perfil->Pais = $request->Pais;
        //$perfil->Departamento = $request->Departamento;
        $perfil->Municipio = $request->Municipio;
        $perfil->Telefono = $request->Telefono;
        $perfil->TipoCertificado = $request->TipoCertificado;
        $perfil->NumeroCertificacion = $request->NumeroCertificacion;
        $perfil->update();

        $user = User::findOrFail($perfil->Usuario);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->update();
        return back();
    }

    public function destroy($id)
    {
        //
    }
}
