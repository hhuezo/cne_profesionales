<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = Pais::where('Activo', '=', 1)->get();

        $dias = array("","Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
        $meses = array('', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
        $now = Carbon::now();
        $dia = $dias[$now->format('N') + 0];
        $mes = $meses[$now->format('m') + 0];
        $fecha = $dia . ' ' . $now->format('d') . ' de ' . $mes . ' de ' . $now->format('Y');

        return view('welcome', compact('paises', 'fecha'));
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
        session(['id_pais' => $id]);
        $pais = Pais::where('Activo', '=', 1)->get();
        $dias = array("","Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
        $meses = array('', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
        $now = Carbon::now();
        $dia = $dias[$now->format('N') + 0];
        $mes = $meses[$now->format('m') + 0];
        $fecha = $dia . ' ' . $now->format('d') . ' de ' . $mes . ' de ' . $now->format('Y');

        // return view('login', compact('pais', 'fecha'));
        return redirect('login');
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
