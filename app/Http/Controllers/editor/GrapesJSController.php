<?php

namespace App\Http\Controllers\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\catalogo\Pais;
use App\Models\editor\Snippet;
use Carbon\Carbon;

class GrapesJSController extends Controller
{
    public function editor_grapesJS()
    {
        $snippet=Snippet::orderBy('Id', 'desc')->first();
        return view('editor_paginas.editorGrapes',compact('snippet'));
    }


    public function guardarPagina(Request $request )
    {
         // Crear un nuevo snippet en la base de datos
         $snippet = new Snippet();
         $snippet->html_content = $request->input('html_content');
         $snippet->css_content = $request->input('css_content');
         //$snippet->json_content = $request->input('json_content');
         $snippet->save();

         // Devolver una respuesta JSON (opcional)
         return response()->json(['message' => 'Snippet guardado con éxito']);

    }
}
