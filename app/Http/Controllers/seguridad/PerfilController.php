<?php

namespace App\Http\Controllers\seguridad;

use App\Http\Controllers\Controller;
use App\Models\catalogo\Departamento;
use App\Models\catalogo\DepartamentoProvincia;
use App\Models\catalogo\Distrito;
use App\Models\catalogo\DistritoCorregimiento;
use App\Models\catalogo\Documento;
use App\Models\catalogo\EntidadCertificadora;
use App\Models\catalogo\Municipio;
use App\Models\catalogo\MunicipioDistrito;
use App\Models\catalogo\Pais;
use App\Models\catalogo\Perfil;
use App\Models\catalogo\TipoCertificado;
use App\Models\configuracion\ConfiguracionPais;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function index()
    {
       
        $perfil = Perfil::with('usuario')->where('Usuario', '=', auth()->user()->id)->first();

        $documentos = Documento::where('Perfil','=',$perfil->Id)->get();
       
        $configuracion = ConfiguracionPais::first();
        $pais = Pais::findOrFail(130);
        //dd($pais );
        $departamento_provincia = DepartamentoProvincia::where('Pais', '=', $configuracion->Pais)->get();
        if ($perfil->DistritoCorregimiento) {
            $distritos_corregimientos = DistritoCorregimiento::where('MunicipioDistrito', '=', $perfil->distrito_corregimiento->MunicipioDistrito)->get();
            $municipios_distritos = MunicipioDistrito::where('Activo', 1)->where('DepartamentoProvincia','=',$perfil->distrito_corregimiento->municipio_distrito->DepartamentoProvincia)->get();
        } else {
            if ($configuracion->Pais == 130) {
                $municipios_distritos = MunicipioDistrito::where('Activo', '=', 1)->where('DepartamentoProvincia', '=', 1)->get();
                $distritos_corregimientos = DistritoCorregimiento::where('MunicipioDistrito', '=', 1)->get();
            } else {
                $municipios_distritos = MunicipioDistrito::where('Activo', '=', 1)->where('DepartamentoProvincia', '=', 15)->get();
                $distritos_corregimientos = DistritoCorregimiento::where('MunicipioDistrito', '=', 45)->get();
            }
        }

       
        $entidades = EntidadCertificadora::get();
        $tipos_certificados = TipoCertificado::get();
        return view('seguridad.perfil.index', compact('perfil', 'pais', 'departamento_provincia', 'municipios_distritos',
         'distritos_corregimientos', 'entidades', 'tipos_certificados','documentos'));
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
        // $messages = [
        //     'name.required' => 'El nombre es requerido',
        //     'last_name.required' => 'El apellido es requerido',
        // ];

        // $request->validate([
        //     'name' => 'required',
        //     'last_name' => 'required',
        //     'last_name' => 'required',
        // ], $messages);




        $perfil = Perfil::findOrFail($id);
        $perfil->NumeroDocumento = $request->NumeroDocumento;
        // $perfil->Profesion = $request->Profesion;
        // $perfil->Direccion = $request->Direccion;
        // $perfil->DistritoCorregimiento = $request->Distrito;
        // $perfil->Telefono = $request->Telefono;
        if ($request->DocumentoURL) {
            try {
                unlink(public_path("docs/") . $perfil->DocumentoURL);
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

        if ($request->file('DocumentoURL')) {
            $file = $request->file('DocumentoURL');
            $id_file = uniqid();
            $file->move(public_path("docs/"), $id_file . ' ' . $file->getClientOriginalName());
            $perfil->DocumentoURL = $id_file . ' ' . $file->getClientOriginalName();
        }


        if ($request->file('TituloURL')) {
            $file = $request->file('TituloURL');
            $id_file = uniqid();
            $file->move(public_path("docs/"), $id_file . ' ' . $file->getClientOriginalName());
            $perfil->TituloURL = $id_file . ' ' . $file->getClientOriginalName();
        }

        $perfil->update();

        // $user = User::findOrFail($perfil->Usuario);
        // $user->name = $request->name;
        // $user->last_name = $request->last_name;
        // $user->update();
        alert()->success('La información ha sido actualizada correctamente');
        return back();
    }

    public function documento(Request $request)
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
}
