<?php

namespace App\Http\Controllers\publico;

use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    //menu_inicio
    public function menu_inicio()
    {

        return view('inicio.flujo');
    }
}
