<?php

namespace App\Http\Controllers;

use App\Models\configuracion\ConfiguracionPais;
use App\Models\editor\Snippet;
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
        $configuracion = ConfiguracionPais::first();


        $banderas = [];
        $urls = [];
        foreach($paises as $pais)
        {
            if($pais->Id != $configuracion->Pais)
            {
                array_push($banderas,$pais->Bandera);
                array_push($urls,$pais->Url);
            }

        }

        session(['array_bandera' => $banderas]);
        session(['array_url' => $urls]);

       // dd($banderas, $urls);
        $snippet = Snippet::findOrFail(2);

        return view('welcome', compact('paises', 'snippet'));
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
        $dias = array("", "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
        $meses = array('', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
        $now = Carbon::now();
        $dia = $dias[$now->format('N') + 0];
        $mes = $meses[$now->format('m') + 0];
        $fecha = $dia . ' ' . $now->format('d') . ' de ' . $mes . ' de ' . $now->format('Y');

        // return view('login', compact('pais', 'fecha'));
        return redirect('register');
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
