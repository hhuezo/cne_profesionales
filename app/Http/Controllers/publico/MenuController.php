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
        $snippet = Snippet::findOrFail(3);
        return view('inicio.flujo',compact('snippet'));
    }

    public function menu_requisitos()
    {
        $snippet = Snippet::findOrFail(4);
        return view('inicio.requisitos',compact('snippet'));
    }

    public function menu_perfil()
    {
        $snippet = Snippet::findOrFail(5);
        return view('inicio.requisitos',compact('snippet'));
    }

    public function menu_contenido_formativo()
    {
        $snippet = Snippet::findOrFail(6);
        return view('inicio.contenido_formativo',compact('snippet'));
    }

    public function menu_unidades_formativas()
    {
        $snippet = Snippet::findOrFail(7);
        return view('inicio.unidades_formativas',compact('snippet'));
    }

    public function menu_flujo_proceso()
    {
        //8
        return view('inicio.flujo_proceso');
    }

    public function menu_requisito_registro()
    {
        //9
        return view('inicio.requisito_registro');
    }

    public function menu_requisito_proyectos()
    {
        //10
        return view('inicio.requisito_proyectos');
    }

    public function menu_usuario_consulta()
    {
        //11
        return view('inicio.usuario_consulta');
    }

    public function menu_leyes()
    {
        //11
        return view('inicio.leyes');
    }
}
