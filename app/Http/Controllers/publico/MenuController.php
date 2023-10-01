<?php

namespace App\Http\Controllers\publico;

use App\Http\Controllers\Controller;
use App\Models\catalogo\Pais;
use App\Models\editor\Snippet;
use Carbon\Carbon;

class MenuController extends Controller
{
    //menu_inicio
    public function menu_flujo()
    {

        return view('inicio.flujo');
    }

    public function menu_requisitos()
    {

        return view('inicio.requisitos');
    }

    public function menu_perfil()
    {
        $paises = Pais::where('Activo', '=', 1)->get();

        $dias = array("","Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
        $meses = array('', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
        $now = Carbon::now();
        $dia = $dias[$now->format('N') + 0];
        $mes = $meses[$now->format('m') + 0];
        $fecha = $dia . ' ' . $now->format('d') . ' de ' . $mes . ' de ' . $now->format('Y');

        $snippet=Snippet::orderBy('Id', 'desc')->first();
        return view('inicio.perfil', compact('paises', 'fecha','snippet'));
    }

    public function menu_contenido_formativo()
    {

        return view('inicio.contenido_formativo');
    }

    public function menu_unidades_formativas()
    {

        return view('inicio.unidades_formativas');
    }

    public function menu_flujo_proceso()
    {

        return view('inicio.flujo_proceso');
    }

    public function menu_requisito_registro()
    {

        return view('inicio.requisito_registro');
    }

    public function menu_requisito_proyectos()
    {

        return view('inicio.requisito_proyectos');
    }

    public function menu_usuario_consulta()
    {

        return view('inicio.usuario_consulta');
    }
}
