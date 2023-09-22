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
}
