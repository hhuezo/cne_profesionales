<?php

namespace App\Http\Controllers\publico;

use App\Http\Controllers\Controller;

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

        return view('inicio.perfil');
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
