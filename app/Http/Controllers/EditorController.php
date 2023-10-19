<?php

namespace App\Http\Controllers;

use App\Models\editor\Snippet;
use App\Models\editor\SnippetDocumento;
use App\Models\editor\SnippetNoticia;
use Exception;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function index()
    {
        $snippets = Snippet::get();

        return view('editor.index', compact('snippets'));
    }

    public function create()
    {
        return view('editor.create');
    }

    public function store(Request $request)
    {
        $snippet = new Snippet();
        $snippet->nombre = $request->nombre;
        $snippet->save();

        alert()->success('El registro ha sido creado correctamente');
        return back();
    }

    public function show($id)
    {
        $snippet = Snippet::findOrFail($id);
        return view('editor.show',compact('snippet'));
    }

    public function add_documento(Request $request)
    {
        $documento = new SnippetDocumento();
        if ($request->file('Archivo')) {
            $file = $request->file('Archivo');
            $id_file = uniqid();
            $file->move(public_path("docs/"), $id_file . ' ' . $file->getClientOriginalName());
            $documento->Url = $id_file . ' ' . $file->getClientOriginalName();
        }

        $documento->Snippet = $request->Snippet;
        $documento->Descripcion = $request->Descripcion;
        $documento->save();

        alert()->success('El archivo hay sido agregado correctamente');
        return back();
    }

    public function del_documento(Request $request)
    {
        $documento = SnippetDocumento::findOrFail($request->Id);

        if ($documento->Url) {
            try {
                unlink(public_path("docs/") . $documento->Url);
            } catch (Exception $e) {
                //return $e->getMessage();
            }
        }
        $documento->delete();
        alert()->success('El archivo hay sido eliminado correctamente');
        return back();

    }


    public function add_noticia(Request $request)
    {
        $noticia = new SnippetNoticia();
        if ($request->file('Archivo')) {
            $file = $request->file('Archivo');
            $id_file = uniqid();
            $file->move(public_path("docs/"), $id_file . ' ' . $file->getClientOriginalName());
            $noticia->Url = $id_file . ' ' . $file->getClientOriginalName();
        }

        $noticia->Snippet = $request->Snippet;
        $noticia->Titulo = $request->Titulo;
        $noticia->Descripcion = $request->Descripcion;
        $noticia->save();

        alert()->success('El archivo hay sido agregado correctamente');
        return back();
    }

    public function del_noticia(Request $request)
    {
        $noticia = SnippetNoticia::findOrFail($request->Id);

        if ($noticia->Url) {
            try {
                unlink(public_path("docs/") . $noticia->Url);
            } catch (Exception $e) {
                //return $e->getMessage();
            }
        }
        $noticia->delete();
        alert()->success('El archivo hay sido eliminado correctamente');
        return back();

    }
    
    


    public function guardarPagina(Request $request,$id )
    {
         // Crear un nuevo snippet en la base de datos  
         $snippet = Snippet::findOrFail($id);
         $snippet->html_content = $request->input('html_content');
         $snippet->css_content = $request->input('css_content');
         //$snippet->json_content = $request->input('json_content');
         $snippet->update();

         // Devolver una respuesta JSON (opcional)
         return response()->json(['message' => 'Snippet guardado con éxito']);

    }

    public function edit($id)
    {
        $snippet = Snippet::findOrFail($id);
        $documentos = SnippetDocumento::where('Snippet','=',$id)->get();
        $noticias = SnippetNoticia::where('Snippet','=',$id)->get();
        return view('editor.edit',compact('snippet','documentos','noticias'));
    }

    public function update(Request $request, $id)
    {
        $snippet = Snippet::findOrFail($id);
        $snippet->nombre = $request->nombre;
        $snippet->save();

        alert()->success('El registro ha sido creado correctamente');
        return back();
    }

    public function destroy($id)
    {
        //
    }
}
