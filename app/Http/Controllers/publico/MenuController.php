<?php

namespace App\Http\Controllers\publico;

use App\Http\Controllers\Controller;
use App\Models\configuracion\Menu;
use App\Models\editor\Snippet;
use App\Models\editor\SnippetDocumento;
use App\Models\editor\SnippetNoticia;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        $menus = Menu::where('Antesesora','=',null)->get();
        $snippets = Snippet::where('Id','>',2)->get();
        return view('catalogo.menu.index',compact('menus','snippets'));
    }

     //menu_inicio
     public function store(Request $request)
     {
         $menu = new Menu();
         $menu->Descripcion = $request->Descripcion;
         if($request->Snippet)
         {
            $menu->Snippet = $request->Snippet;
         }
         $menu->save();
         alert()->success('El registro ha sido creado correctamente');
         return back();
     }

     public function store_sub_menu(Request $request)
     {
         $menu = new Menu();
         $menu->Descripcion = $request->Descripcion;
         $menu->Antesesora = $request->Antesesora;
         if($request->Snippet)
         {
            $menu->Snippet = $request->Snippet;
         }
         $menu->save();
         alert()->success('El registro ha sido creado correctamente');
         return back();
     }



     public function edit($id)
     {
        $menu = Menu::findOrFail($id);
        $sub_menus = Menu::where('Antesesora','=',$id)->get();
        $snippets = Snippet::where('Id','>',2)->get();
        return view('catalogo.menu.edit',compact('menu','snippets','sub_menus'));
     }


     public function update(Request $request,$id)
     {
        $menu = Menu::findOrFail($id);
        $menu->Descripcion = $request->Descripcion;
        if($request->Snippet)
        {
           $menu->Snippet = $request->Snippet;
        }
        $menu->update();
        alert()->success('El registro ha sido modificado correctamente');
        return back();
     }


     public function destroy($id)
     {
         $menu = Menu::findOrFail($id);
         $menu->delete();
         alert()->info('El registro ha sido eliminado correctamente');
         return back();
     }

    public function page_menu($id)
    {
        $snippet = Snippet::findOrFail($id);
        $documentos = SnippetDocumento::where('Snippet','=',$id)->get();
        $noticias = SnippetNoticia::where('Snippet','=',$id)->get();
        return view('inicio.index',compact('snippet','documentos',
        'noticias'));

    }


}
