<?php

namespace App\Http\Controllers\registro;

use App\Http\Controllers\Controller;
use App\Mail\VerificacionMail;
use App\Models\catalogo\EntidadCertificadora;
use App\Models\catalogo\Pais;
use App\Models\catalogo\Perfil;
use App\Models\catalogo\TipoCertificado;
use App\Models\registro\Certificacion;
use App\Models\registro\CertificacionDetalle;
use App\Models\registro\Proyecto;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class CertificacionController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        //admin
        if ($user->hasRole('administrador')) {
            $certificaciones = Certificacion::get();
        } else if ($user->hasRole('administrador local')) {
            $certificaciones = Certificacion::where('Administrador', '=', auth()->user()->id)->get();
        } else {
            $certificaciones = Certificacion::where('Perfil', '=', $user->perfil->Id)->get();
        }
        return view('registro.certificacion.index', compact('certificaciones'));
    }

    public function create()
    {
        $entidades  = EntidadCertificadora::get();
        $tipo_certificados = TipoCertificado::get();
        return view('registro.certificacion.create', compact('entidades', 'tipo_certificados'));
    }

    public function store(Request $request)
    {
        $messages = [
            'Descripcion.required' => 'La descripción es requerida',
            'Alcance.required' => 'El tipo de tecnología es requerida',
            'Numero.required' => 'El número de certificación es requerido',
            'TipoCertificado.required' => 'El tipo de certificado es requerido',
            'FechaVencimiento.required' => 'La fecha de vencimiento es requerida',
            'EntidadCertificadora.required' => 'La entidad certificadora es requerida',
            'RecomendacionContratista.required' => 'La recomendación del contratista es requerida',
            'OtraEntidad.required' => 'La otra entidad es requerida',
        ];

        $request->validate([
            'Descripcion' => 'required',
            'Alcance' => 'required',
            'Numero' => 'required',
            'TipoCertificado' => 'required',
            'FechaVencimiento' => 'required',
            'EntidadCertificadora' => 'required',
        ], $messages);


        if ($request->EntidadCertificadora == 1) {
            $request->validate([
                'OtraEntidad' => 'required',
            ], $messages);
        }


        $user = User::findOrFail(auth()->user()->id);
        $perfil = Perfil::where('Usuario', '=', auth()->user()->id)->first();
        $time = Carbon::now('America/El_Salvador');

        $certificacion = new Certificacion();
        $certificacion->Perfil =  $perfil->Id;
        $certificacion->UsuarioCreacion = $user->id;
        $certificacion->FechaCreacion = $time->toDateTimeString();
        $certificacion->Descripcion = $request->Descripcion;
        $certificacion->Estado = 1;

        $certificacion->Alcance = $request->Alcance;
        $certificacion->TipoCertificado = $request->TipoCertificado;
        $certificacion->Numero = $request->Numero;
        $certificacion->FechaVencimiento = $request->FechaVencimiento;
        $certificacion->EntidadCertificadora = $request->EntidadCertificadora;
        $certificacion->OtraEntidad = $request->OtraEntidad;

        $certificacion->save();

        alert()->success('El registro ha sido creado correctamente');
        return redirect('registro/certificacion/' . $certificacion->Id . '/edit');
    }


    public function send(Request $request)
    {
        $certificacion = Certificacion::findOrFail($request->Certificacion);
        $certificacion->Estado = 2;
        $certificacion->update();

        $content = "La certificación ha sido enviada para la aprobación de parte de los administradores";
        $recipientEmail = auth()->user()->email;
        //$recipientEmail = "hulexgsa@gmail.com";
        Mail::to($recipientEmail)->send(new VerificacionMail("Certificación enviada", $content));

        alert()->success('El registro ha sido enviado correctamente');
        return back();
    }


    public function asignar(Request $request)
    {
        $certificacion = Certificacion::findOrFail($request->Certificacion);
        $certificacion->Administrador = $request->Administrador;
        $certificacion->update();
        $user = User::findOrFail($request->Administrador);

        $content = "Una certificación ha sido asignada favor consultar en los registros";
        $recipientEmail = $user->email;
        Mail::to($recipientEmail)->send(new VerificacionMail("Certificación asignada", $content));

        alert()->success('El registro ha sido asignado correctamente');
        return back();
    }

    public function entidad(Request $request)
    {
        $entidad = new EntidadCertificadora();
        $entidad->Nombre = $request->Nombre;
        $entidad->Descripcion = $request->Descripcion;
        $entidad->AlcanceCertificacion = $request->AlcanceCertificacion;
        $entidad->Pais = $request->Pais;
        $entidad->Link = $request->Link;
        $entidad->CorreoContacto = $request->CorreoContacto;
        $entidad->save();

        $certificacion = Certificacion::findOrFail($request->Certificacion);
        $certificacion->EntidadCertificadora = $entidad->Id;
        $certificacion->OtraEntidad = "";
        $certificacion->update();

        alert()->success('El registro ha sido agregado correctamente');
        return back();
    }

    public function observar(Request $request)
    {
        $certificacion = Certificacion::findOrFail($request->Certificacion);

        $content = $request->Observacion;
        $recipientEmail = $certificacion->perfil->usuario->email;
        Mail::to($recipientEmail)->send(new VerificacionMail("Certificación observada", $content));      
       
        $certificacion->Estado = 3;
        $certificacion->update();
        alert()->success('El registro ha sido asignado correctamente');
        return back();

    }
    public function aprobar(Request $request)
    {
        $certificacion = Certificacion::findOrFail($request->Certificacion);

        $content = "Se le informa que su certificación ha sido aprobada";
        $recipientEmail = $certificacion->perfil->usuario->email;
        Mail::to($recipientEmail)->send(new VerificacionMail("Certificación aprobada", $content));

        $certificacion->Estado = 4;
        $certificacion->update();
        alert()->success('La certificación ha sido aprobada correctamente');
        return back(); 
     }

    public function edit($id)
    {
        $entidades  = EntidadCertificadora::get();
        $certificacion = Certificacion::findOrFail($id);

        $tipo_certificados = TipoCertificado::get();

        //listar admin locales
        $role = Role::findOrFail(2);
        $adminitradores_locales = $role->user_has_role;
        return view('registro.certificacion.edit', compact('certificacion', 'tipo_certificados',  'entidades', 'adminitradores_locales'));
    }

    public function update(Request $request, $id)
    {


        $messages = [
            'Descripcion.required' => 'La descripción es requerida',
            'TipoTecnologia.required' => 'El tipo de tecnología es requerida',
            'Sector.required' => 'El sector es requerido',
            'Numero.required' => 'El número de certificación es requerido',
            'FechaEmision.required' => 'La fecha de emisión es requerida',
            'FechaVencimiento.required' => 'La fecha de vencimiento es requerida',
            'EntidadCertificadora.required' => 'La entidad certificadora es requerida',
            'RecomendacionContratista.required' => 'La recomendación del contratista es requerida',
        ];

        $request->validate([
            'Descripcion' => 'required',
            'TipoTecnologia' => 'required',
            'Sector' => 'required',
            'Numero' => 'required',
            'FechaEmision' => 'required',
            'FechaVencimiento' => 'required',
            'EntidadCertificadora' => 'required',
            'RecomendacionContratista' => 'required',
        ], $messages);


        $detalle = new CertificacionDetalle();

        if ($request->file('Archivo')) {
            $file = $request->file('Archivo');
            $id_file = uniqid();
            $file->move(public_path("docs/"), $id_file . ' ' . $file->getClientOriginalName());
            $detalle->Archivo = $id_file . ' ' . $file->getClientOriginalName();
        }
        $detalle->Descripcion = $request->Descripcion;
        $detalle->Certificacion =  $id;
        $detalle->TipoTecnologia = $request->TipoTecnologia;
        $detalle->Sector = $request->Sector;
        $detalle->Numero = $request->Numero;
        $detalle->FechaEmision = $request->FechaEmision;
        $detalle->FechaVencimiento = $request->FechaVencimiento;
        $detalle->EntidadCertificadora = $request->EntidadCertificadora;
        $detalle->RecomendacionContratista = $request->RecomendacionContratista;
        $detalle->UsuarioIngreso = auth()->user()->id;
        $detalle->Estado = 1;

        $detalle->save();

        alert()->success('El registro ha sido creado correctamente');
        return back();
    }

    public function show($id)
    {
        $certificacion = Certificacion::findOrFail($id);
        $tipo_certificados = TipoCertificado::get();
        $entidades  = EntidadCertificadora::get();

        $paises = Pais::get();
        //listar admin locales
        $role = Role::findOrFail(2);
        $adminitradores_locales = $role->user_has_role;


        $perfil = Perfil::findOrFail($certificacion->Perfil);

        $proyectos = Proyecto::where('Perfil','=',$perfil->Id)->get();


        return view('registro.certificacion.show', compact(
            'certificacion',
            'tipo_certificados',
            'entidades',
            'adminitradores_locales',
            'paises','perfil','proyectos'
        ));
    }
}
