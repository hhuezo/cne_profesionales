<?php

namespace App\Http\Controllers\seguridad;

use App\Http\Controllers\Controller;
use App\Models\catalogo\DepartamentoProvincia;
use App\Models\catalogo\DistritoCorregimiento;
use App\Models\catalogo\Documento;
use App\Models\catalogo\EntidadCertificadora;
use App\Models\catalogo\MunicipioDistrito;
use App\Models\catalogo\Pais;
use App\Models\catalogo\Perfil;
use App\Models\catalogo\TipoCertificado;
use App\Models\catalogo\TipoDocumento;
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

        $documentos = Documento::where('Perfil', '=', $perfil->Id)->get();

        $configuracion = ConfiguracionPais::first();
        $pais = Pais::findOrFail($configuracion->Pais);
        //dd($pais );
        $departamento_provincia = DepartamentoProvincia::where('Pais', '=', $configuracion->Pais)->get();
        if ($perfil->DistritoCorregimiento) {
            $distritos_corregimientos = DistritoCorregimiento::where('MunicipioDistrito', '=', $perfil->distrito_corregimiento->MunicipioDistrito)->get();
            $municipios_distritos = MunicipioDistrito::where('Activo', 1)->where('DepartamentoProvincia', '=', $perfil->distrito_corregimiento->municipio_distrito->DepartamentoProvincia)->get();
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
        $tipo_documentos = TipoDocumento::where('Pais', '=', $pais->Id)->get();
        return view('seguridad.perfil.index', compact(
            'perfil',
            'pais',
            'departamento_provincia',
            'municipios_distritos',
            'distritos_corregimientos',
            'entidades',
            'tipo_documentos',
            'documentos'
        ));
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
        $perfil = Perfil::findOrFail($id);
        $perfil->NumeroDocumento = $request->NumeroDocumento;
        $perfil->TipoDocumento = $request->TipoDocumento;
        $perfil->Telefono = $request->Telefono;
        if($request->TelefonoPublico != null)
        {
            $perfil->TelefonoPublico = $request->TelefonoPublico;
        } 
        else{
            $perfil->TelefonoPublico = 0;
        }    
        

        if ($request->FotoUrl) {
            try {
                unlink(public_path("docs/") . $perfil->FotoUrl);
            } catch (Exception $e) {
                //return $e->getMessage();
            }
        }



        if ($request->file('FotoUrl')) {
            $file = $request->file('FotoUrl');
            $id_file = uniqid();
            $file->move(public_path("docs/"), $id_file . ' ' . $file->getClientOriginalName());
            $perfil->FotoUrl = $id_file . ' ' . $file->getClientOriginalName();
        }




        $perfil->update();

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
