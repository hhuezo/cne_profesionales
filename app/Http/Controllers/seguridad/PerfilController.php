<?php

namespace App\Http\Controllers\seguridad;

use App\Http\Controllers\Controller;
use App\Models\catalogo\Departamento;
use App\Models\catalogo\Distrito;
use App\Models\catalogo\DistritoCorregimiento;
use App\Models\catalogo\EntidadCertificadora;
use App\Models\catalogo\Municipio;
use App\Models\catalogo\MunicipioDistrito;
use App\Models\catalogo\Pais;
use App\Models\catalogo\Perfil;
use App\Models\catalogo\TipoCertificado;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function index()
    {
        $perfil = Perfil::with('usuario')->where('Usuario', '=', auth()->user()->id)->first();
        $paises = Pais::where('Activo', 1)->get();
        $departamentos = Departamento::get();
        if ($perfil->municipio) {
            $municipios = Municipio::where('Activo', 1)->where('Departamento', '=', $perfil->municipio->Departamento)->get();
        } else {
            $municipios = Municipio::where('Activo', 1)->where('Departamento', '=', 1)->get();
        }

        if ($perfil->distrito) {
            $distritos = Distrito::where('Municipio', '=', $perfil->distrito->Municipio)->get();
        } else {
            $distritos = Distrito::where('Municipio', '=', 1)->get();
        }
        $entidades = EntidadCertificadora::get();
        $tipos_certificados = TipoCertificado::get();
        return view('seguridad.perfil.index', compact('perfil', 'paises', 'departamentos', 'municipios', 'distritos', 'entidades', 'tipos_certificados'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function cambio_clave()
    {
        return view('seguridad.perfil.cambio_clave');
    }

    public function cambio_clave_store(Request $request)
    {


        $messages = [
            'password.required' => 'La contraseña es requerida',
            'password.confirmed' => 'Las claves no coinciden',
            'password.min' => 'Las claves debe tener al menos 8 caracteres',
        ];

        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], $messages);

        $user = User::findOrFail(auth()->user()->id);
        $user->password = Hash::make($request->password);
        $user->update();
        alert()->success('La clave ha sido actualizada correctamente');
        return back();
    }



    public function get_municipio($id)
    {
        return MunicipioDistrito::where('DepartamentoProvincia', '=', $id)->get();
    }


    public function get_distrito($id)
    {
        return DistritoCorregimiento::where('MunicipioDistrito', '=', $id)->get();
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
        $perfil->Distrito = $request->Distrito;
        $perfil->Municipio = $request->Municipio;
        $perfil->Telefono = $request->Telefono;
        //$perfil->TipoCertificado = $request->TipoCertificado;
        //$perfil->NumeroCertificacion = $request->NumeroCertificacion;


        if ($request->DuiURL) {
            try {
                unlink(public_path("docs/") . $perfil->DuiURL);
            } catch (Exception $e) {
                //return $e->getMessage();
            }
        }


        if ($request->TituloURL) {
            try {
                unlink(public_path("docs/") . $perfil->TituloURL);
            } catch (Exception $e) {
                //return $e->getMessage();
            }
        }

        if ($request->file('DuiURL')) {
            $file = $request->file('DuiURL');
            $id_file = uniqid();
            $file->move(public_path("docs/"), $id_file . ' ' . $file->getClientOriginalName());
            $perfil->DuiURL = $id_file . ' ' . $file->getClientOriginalName();
        }


        if ($request->file('TituloURL')) {
            $file = $request->file('TituloURL');
            $id_file = uniqid();
            $file->move(public_path("docs/"), $id_file . ' ' . $file->getClientOriginalName());
            $perfil->TituloURL = $id_file . ' ' . $file->getClientOriginalName();
        }

        $perfil->update();

        $user = User::findOrFail($perfil->Usuario);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->update();
        alert()->success('La información ha sido actualizada correctamente');
        return back();
    }

    public function destroy($id)
    {
        //
    }
}
