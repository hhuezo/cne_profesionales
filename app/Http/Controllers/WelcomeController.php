<?php

namespace App\Http\Controllers;

use App\Models\catalogo\Perfil;
use App\Models\configuracion\ConfiguracionPais;
use App\Models\editor\Snippet;
use App\Models\Pais;
use App\Models\registro\Certificacion;
use App\Models\User;
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

        // $nombres = [
        //     "Juan", "María", "José", "Ana", "Carlos", "Laura", "Pedro", "Isabel", "Miguel", "Sofía",
        //     "Luis", "Elena", "Antonio", "Carmen", "Javier", "Rosa", "Francisco", "Manuela", "David", "Martina",
        //     "Alejandro", "Raquel", "Jorge", "Beatriz", "Daniel", "Lucía", "Alberto", "Clara", "Roberto", "Natalia",
        //     "Fernando", "Silvia", "Diego", "Patricia", "Rafael", "Victoria", "Manuel", "Eva", "Mario", "Marina",
        //     "Ángel", "Teresa", "Adrián", "Cristina", "Rubén", "Paula", "Enrique", "Lorena", "Pablo", "Sara",
        //     "Ignacio", "Rocio", "Héctor", "Alejandra", "Julio", "Abigail", "Oscar", "Nerea", "Sergio", "Miriam",
        //     "Víctor", "Alba", "Gabriel", "Lourdes", "Andrés", "Esther", "Jaime", "Celia", "Hugo", "Gloria",
        //     "Eduardo", "Alicia", "Álvaro", "Margarita", "Iván", "Angela", "Ricardo", "Monica", "Nacho", "Nuria",
        //     "Emilio", "Lara", "Salvador", "Susana", "Gonzalo", "Ramon", "Marcos", "Marta", "Felipe", "Elisa",
        //     "Mariano", "Pilar", "Nicolás", "Aurora", "Simón", "Judith", "Gustavo", "Belen", "Alex", "Michael"
        // ];


        // $apellidos = [
        //     "Gómez", "Rodríguez", "Fernández", "López", "Martínez", "Pérez", "González", "Sánchez", "Ramírez", "Torres",
        //     "Suárez", "Díaz", "Herrera", "Ruiz", "Jiménez", "Álvarez", "Moreno", "Molina", "Ortega", "Delgado",
        //     "Castro", "Ortiz", "Rubio", "Núñez", "Vega", "Guerrero", "Cruz", "Cabrera", "Romero", "Rojas",
        //     "Morales", "Gutiérrez", "Navarro", "Mendoza", "Campos", "Castillo", "Peralta", "Flores", "Aguilar", "Vargas",
        //     "Reyes", "Medina", "Arias", "Rivera", "Santos", "Fuentes", "Silva", "Padilla", "Vásquez", "Maldonado",
        //     "Aguirre", "Lara", "Cordova", "Soto", "Miranda", "Sosa", "Carrillo", "Orozco", "Barrera", "Peña",
        //     "Luna", "Gallegos", "Guzmán", "Ibarra", "Zamora", "Paredes", "Valencia", "Escobar", "Estrada", "Castañeda",
        //     "Ponce", "Calderón", "Duarte", "Nieves", "Guerra", "Galván", "Téllez", "Montes", "Reyna", "Olivera",
        //     "Serrano", "Valenzuela", "Padrón", "Aguayo", "Sandoval", "Guillén", "Cisneros", "Becerra", "León", "Bermúdez",
        //     "Ochoa", "Zavala", "Galarza", "Guzik", "Villanueva", "Cuevas", "Villalobos", "Iglesias", "Naranjo", "Quintero"
        // ];

        // $correos = [];

        // foreach ($nombres as $nombre) {
        //     array_push($correos, $nombre . "@example.com");
        // }


        // for ($i = 0; $i < 100; $i++) {
        //     $usuario = new User();
        //     $usuario->email = $correos[$i];
        //     $usuario->name = $nombres[$i];
        //     $usuario->last_name = $apellidos[$i];
        //     $usuario->password = "$2y$10$8.H90nz0nXmwYIfU1l69S.uuqP17k5ZPVq4yCpANJ4EMrhWqpVtnW";
        //     $usuario->active = 1;
        //     $usuario->save();
        // }

        //  $usuarios = User::where('id','>',55)->get();

        //  foreach($usuarios as $usuario)
        //  {
        //     $perfil = new Perfil();
        //     $perfil->Usuario = $usuario->id;
        //     $perfil->NumeroDocumento = '11111111-1';
        //     $perfil->Profesion = 2;
        //     $perfil->Pais = 130;
        //     $perfil->Nacionalidad = "Salvadoreño";
        //     $perfil->DistritoCorregimiento = 24; 
        //     $perfil->VigenciaCertificacion = '2023-12-31';
        //     //$perfil->save();
        //  }


        // $fechaHoraActual = Carbon::now();
        // $perfiles = Perfil::get();

        // $fechaInicio = Carbon::createFromDate(2023, 11, 1);
        // $fechaFin = Carbon::createFromDate(2023, 12, 31);
        
        // $fechaAleatoria = Carbon::createFromTimestamp(mt_rand($fechaInicio->timestamp, $fechaFin->timestamp));
        
        // foreach($perfiles as $perfil)
        // {
        //     $certificacion = new Certificacion();
        //     $certificacion->Perfil = $perfil->Id;
        //     $certificacion->FechaCreacion = $fechaHoraActual->toDateTimeString();
        //     $certificacion->UsuarioCreacion = $perfil->usuario->id;
        //     $certificacion->Descripcion = "Especialista en eficiencia energética.";
        //     $certificacion->Alcance = "Gestor, implementador y seguimiento de proyectos de eficiencia energética.";
        //     $certificacion->Estado = 4;
        //     $certificacion->Numero = mt_rand(1000, 600000);
        //     $certificacion->EntidadCertificadora = 2;
        //     $certificacion->FechaVencimiento = $fechaAleatoria->toDateString();
        //     $certificacion->save();
        // }

        




        $paises = Pais::where('Activo', '=', 1)->get();
        $configuracion = ConfiguracionPais::first();


        $banderas = [];
        $urls = [];
        foreach ($paises as $pais) {
            if ($pais->Id != $configuracion->Pais) {
                array_push($banderas, $pais->Bandera);
                array_push($urls, $pais->Url);
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
