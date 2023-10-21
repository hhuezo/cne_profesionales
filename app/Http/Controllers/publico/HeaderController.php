<?php

namespace App\Http\Controllers\publico;

use App\Http\Controllers\Controller;
use App\Models\configuracion\HeaderFooter;
use Exception;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function update_image(Request $request)
    {
        //dd($request->Opcion);
        $configuracion = HeaderFooter::first();
        if($request->Opcion == 1)
        {
            if ($request->Archivo) {
                try {
                    unlink(public_path("img/") . $configuracion->LogoUno);
                } catch (Exception $e) {
                    //return $e->getMessage();
                }
            }

            if ($request->file('Archivo')) {
                $file = $request->file('Archivo');
                $id_file = uniqid();
                $file->move(public_path("img/"), $id_file . ' ' . $file->getClientOriginalName());
                $configuracion->LogoUno = $id_file . ' ' . $file->getClientOriginalName();
            }

        }
        else if($request->Opcion == 2)
        {
            if ($request->Archivo) {
                try {
                    unlink(public_path("img/") . $configuracion->LogoDos);
                } catch (Exception $e) {
                    //return $e->getMessage();
                }
            }

            if ($request->file('Archivo')) {
                $file = $request->file('Archivo');
                $id_file = uniqid();
                $file->move(public_path("img/"), $id_file . ' ' . $file->getClientOriginalName());
                $configuracion->LogoDos = $id_file . ' ' . $file->getClientOriginalName();
            }

        }
        else if($request->Opcion == 3)
        {
            if ($request->Archivo) {
                try {
                    unlink(public_path("img/") . $configuracion->LogoTres);
                } catch (Exception $e) {
                    //return $e->getMessage();
                }
            }

            if ($request->file('Archivo')) {
                $file = $request->file('Archivo');
                $id_file = uniqid();
                $file->move(public_path("img/"), $id_file . ' ' . $file->getClientOriginalName());
                $configuracion->LogoTres = $id_file . ' ' . $file->getClientOriginalName();
            }

        }

        else if($request->Opcion == 4)
        {
            if ($request->Archivo) {
                try {
                    unlink(public_path("img/") . $configuracion->LogoCuatro);
                } catch (Exception $e) {
                    //return $e->getMessage();
                }
            }

            if ($request->file('Archivo')) {
                $file = $request->file('Archivo');
                $id_file = uniqid();
                $file->move(public_path("img/"), $id_file . ' ' . $file->getClientOriginalName());
                $configuracion->LogoCuatro = $id_file . ' ' . $file->getClientOriginalName();
            }

        }

        else if($request->Opcion == 5)
        {
            if ($request->Archivo) {
                try {
                    unlink(public_path("img/") . $configuracion->LogoPie);
                } catch (Exception $e) {
                    //return $e->getMessage();
                }
            }

            if ($request->file('Archivo')) {
                $file = $request->file('Archivo');
                $id_file = uniqid();
                $file->move(public_path("img/"), $id_file . ' ' . $file->getClientOriginalName());
                $configuracion->LogoPie = $id_file . ' ' . $file->getClientOriginalName();
            }

        }


        $configuracion->update();
        alert()->info('El logo ha sido actualizado correctamente');
        return back();
    }

    
}
