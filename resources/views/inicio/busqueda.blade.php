@extends('template')

@section('contenido')
    <!DOCTYPE html>
    <html lang="en" dir="ltr" class="light">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <title>Dashcode - HTML Template</title>
        <link rel="icon" type="image/png" href="assets/images/logo/favicon.svg">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/rt-plugins.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
        <!-- START : Theme Config js-->
        <script src="{{ asset('assets/js/settings.js') }}" sync></script>
        <!-- END : Theme Config js-->
        @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
        <style>
            .card-title,
            .form-label {
                text-transform: none;
            }

            .form-label,
            .card-title {
                text-align: left;
            }
        </style>


        <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
        <!-- Incluye DataTables JS -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
              $('#example').DataTable();
            });
          </script>
    </head>

    <body class=" font-inter skin-default">

        <div class="page-content">
            <div class="transition-all duration-150 container-fluid" id="page_layout">
                <div id="content_layout">
                    @auth
                        <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
                            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-7">
                                <div class="card">
                                    <div class="card-body flex flex-col p-6">
                                        <header
                                            class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 -mx-6 px-6">
                                            <div class="flex-1">
                                                <div class="card-title text-slate-900 dark:text-white">Busqueda</div>
                                            </div>
                                        </header>
                                        <div class="card-text h-full space-y-4">
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                <div class="input-area relative">
                                                    <label for="Nombre" class="form-label">Desde</label>
                                                    <input type="date" name="FechaInicio" class="form-control">
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="Nombre" class="form-label">Hasta</label>
                                                    <input type="date" name="FechaFinal" class="form-control">
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="Nombre" class="form-label">Profesión</label>
                                                    <select class="form-control select2" name="Profesion">
                                                        <option value="">Seleccione</option>
                                                        @foreach ($profesiones as $obj)
                                                            <option value="{{ $obj->Id }}">{{ $obj->Nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="Nombre" class="form-label">Entidad certificadora</label>
                                                    <select class="form-control select2" name="EntidadCertificadora">
                                                        <option value="">Seleccione</option>
                                                        @foreach ($entidades as $obj)
                                                            <option value="{{ $obj->Id }}">{{ $obj->Nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="input-area" style="display: none">
                                                    <div class="relative">
                                                        <input type="text" class="form-control !pr-9">
                                                        <button
                                                            class="absolute btn-dark right-0 top-1/2 -translate-y-1/2 w-9 h-full border-none flex items-center justify-center">
                                                            <iconify-icon icon="heroicons-solid:search"></iconify-icon>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>






                                            <div class="inline-block min-w-full align-middle">
                                                <div class="overflow-hidden ">
                                                    <table id="example" class="display" style="width:100%">
                                                        <thead>
                                                            <tr class="td-table">
                                                                <th style="text-align: center">Nombre</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Sofía Rodríguez Pérez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Juan Martínez Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valentina García Ramírez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Alejandro Sánchez Díaz</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Camila Torres Fernández</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Andrés Mendoza López</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valeria Castro Martínez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Javier Ruiz Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Isabella Pérez Ramírez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Lucas Díaz Herrera</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Paula Vargas Castro</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nicolás López Martínez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Martina Ramírez Sánchez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sebastián Herrera Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Antonella Díaz Pérez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Eduardo Castro Ruiz</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Clara Martínez Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Gabriel Fernández López</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Renata Pérez Díaz</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Mateo Soto Ramírez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Emilia Vargas Herrera</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tomás Silva Castro</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valentina Díaz Pérez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Francisco Ramírez Martínez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Constanza López Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Matías Herrera Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sofía Torres Díaz</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Javier Martínez Pérez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Catalina Ramírez Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Facundo Silva Herrera</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Renata López Castro</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bruno Vargas Martínez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Antonia Pérez Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Agustín Díaz Ramírez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valentina Castro Herrera</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Lucas Ruiz Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Isabella López Pérez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nicolás Sánchez Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Martina Martínez Ramírez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sebastián Díaz Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Florencia Herrera Pérez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Juan Ramírez Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valeria Vargas López</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Alejandro Pérez Díaz</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Camila Martínez Ramírez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Daniel Silva Herrera</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Martina Vargas Pérez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Eduardo López Castro</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Clara Ramírez Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tomás Díaz Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valentina Pérez Herrera</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Javier Martínez Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Renata Ramírez López</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nicolás Díaz Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Isabella Sánchez Pérez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Mateo Herrera Ramírez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Antonella Castro Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Francisco Vargas López</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sofía Pérez Díaz</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Lucas Martínez Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valentina Silva Ramírez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Emilio López Herrera</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Constanza Díaz Pérez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sebastián Ramírez Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Martina Herrera Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Facundo Castro López</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valeria Vargas Pérez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Martín Pérez Díaz</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Antonia Martínez Ramírez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ignacio Silva Herrera</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Clara Díaz Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bruno López Pérez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valentina Ramírez Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nicolás Vargas López</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Isabella Díaz Herrera</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Matías Pérez Ramírez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Renata Silva Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Juan Martínez Díaz</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sofía Ramírez López</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Alejandro Herrera Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valeria Pérez Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tomás López Martínez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Isabella Vargas Ramírez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Facundo Herrera Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Renata Castro Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Lucas Pérez Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Antonella Ramírez López</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Emilia Herrera Martínez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Daniel Vargas Díaz</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Clara Silva Ramírez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sebastián López Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valentina Díaz Herrera</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Francisco Ramírez Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sofía Martínez López</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Mateo Herrera Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Antonia Pérez Díaz</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bruno Ramírez Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Isabella Vargas López</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Renata Díaz Martínez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Martín Pérez Herrera</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valeria Silva Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Lucas Ramírez López</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Clara López Martínez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Facundo Díaz Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Antonella Herrera Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tomás Vargas Pérez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sofía Martínez Ramírez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nicolás Pérez Herrera</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Renata Silva Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Javier Ramírez López</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valentina Díaz Martínez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Mateo Herrera Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Emilia Pérez Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Lucas Silva Díaz</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valeria Ramírez Herrera</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Facundo Vargas López</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Clara Martínez Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bruno López Ramírez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Isabella Díaz Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Juan Pérez Herrera</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Renata Ramírez López</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Javier Silva Martínez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valentina López Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nicolás Herrera Díaz</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Antonia Pérez Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Emilio Ramírez Herrera</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Martina Díaz Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tomás Herrera López</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valeria Pérez Martínez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Lucas Vargas Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Isabella Ramírez Díaz</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bruno López Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Clara Martínez Herrera</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Renata Silva Pérez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sebastián Díaz Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valentina López Ramírez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Mateo Pérez Herrera</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Antonella Silva Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Francisco Ramírez Díaz</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sofía Vargas López</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Emilia Herrera Martínez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tomás Pérez Silva</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Clara Ramírez Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Facundo Díaz Herrera</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Valentina Martínez López</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nicolás Silva Ramírez</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Antonella Vargas Díaz</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bruno López Herrera</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Renata Pérez Vargas</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Javier Martínez Silva</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- END: Todo Header -->



                                    </div>
                                </div>


                            </div>
                        </div>
                    @else
                        <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
                            <!-- Basic Inputs -->
                            <div class="card" style="display: none" id="div_registro">
                                <div class="card-body flex flex-col p-6">
                                    <header class="flex items-center border-b border-slate-100 dark:border-slate-700">
                                        <div class="flex-1">
                                            <div class="card-title text-slate-900 dark:text-white">Registro</div>
                                        </div>

                                    </header>

                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <br>
                                    @endif




                                    <form method="POST" action="{{ url('register_consulta') }}">
                                        @csrf
                                        <br>
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                            <div class="input-area relative">
                                                <label for="Nombre" class="form-label">Nombre</label>
                                                <input type="text" name="name" value="{{ old('name') }}" required
                                                    class="form-control">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="Apellido" class="form-label">Apellido</label>
                                                <input type="text" name="last_name" value="{{ old('last_name') }}"
                                                    required class="form-control">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="Email" class="form-label">Email</label>
                                                <input type="email" name="email" value="{{ old('email') }}" required
                                                    class="form-control">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Password</label>
                                                <input type="password" name="password" value="{{ old('password') }}"
                                                    required class="form-control">
                                            </div>

                                            <div class="input-area relative">
                                                <label for="Nombre" class="form-label">Sector</label>
                                                <select class="form-control" name="sector">
                                                    @foreach ($sectores as $obj)
                                                        <option value="{{ $obj }}">{{ $obj }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-area relative">
                                                <label for="Apellido" class="form-label">Ocupación</label>
                                                <select class="form-control select2" name="ocupacion">
                                                    @foreach ($profesiones as $obj)
                                                        <option value="{{ $obj->Id }}">{{ $obj->Nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <br>
                                        <div style="text-align: right;">

                                            <button type="button" class="btn inline-flex justify-center btn-secondary"
                                                onclick="show_login()">Volver</button>
                                            &nbsp; &nbsp;
                                            <button type="submit"
                                                class="btn inline-flex justify-center btn-dark">Registrar</button>


                                        </div>


                                    </form>

                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7" id="div_login">
                                <div class="card ">
                                    <div class="card-body flex flex-col p-6">
                                        <header
                                            class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                            <div class="flex-1">
                                                <div class="card-title text-slate-900 dark:text-white">Para acceder a los
                                                    registros debe iniciar sesión.</div>
                                            </div>
                                        </header>
                                        <div class="card-text h-full">
                                            <p style="text-align: justify"
                                                class="text-sm font-Inter text-slate-600 dark:text-slate-300">
                                                En el Registro de Personas Certificadas podrás acceder al registro público
                                                oficial de cada una de las personas que han obtenido un Certificado de
                                                Competencias Laborales, luego de resultar Competente en
                                                los procesos de evaluación en los que han participado.
                                                Las personas certificadas podrán acceder a un comprobante de su certificación.
                                                Por su parte, a los empleadores, este registro les será útil para corroborar si
                                                un trabajador o trabajadora ha obtenido un Certificado de Competencias
                                                Laborales.
                                            </p>
                                            <br>
                                            <p style="text-align: justify"
                                                class="text-sm font-Inter text-slate-600 dark:text-slate-300">

                                            </p>

                                        </div>
                                    </div>
                                </div>

                                <div class="auth-box-3">

                                    <div class="text-center 2xl:mb-10 mb-5">
                                        <h4 class="font-medium">Iniciar sesión</h4>

                                        <div class="text-slate-500 dark:text-slate-400 text-base">
                                            Inicie sesión con su cuenta
                                        </div>
                                    </div>
                                    <!-- BEGIN: Login Form -->
                                    <form class="space-y-4" method="POST" action="{{ url('login_consulta') }}">
                                        @csrf
                                        <div class="fromGroup">
                                            <label class="block capitalize form-label">Correo electrónico</label>
                                            <div class="relative ">
                                                <input type="email" name="email" id="email"
                                                    class="form-control py-2 @error('email') is-invalid @enderror" required
                                                    autocomplete>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>Credenciales no válidas</strong>
                                                    </span>
                                                @enderror


                                            </div>
                                        </div>
                                        <div class="fromGroup">
                                            <label class="block capitalize form-label">Contraseña</label>
                                            <div class="relative ">
                                                <input type="password" id="password" name="password"
                                                    class="  form-control py-2   @error('password') is-invalid @enderror"
                                                    required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- <div class="flex justify-between">
                                            <label class="flex items-center cursor-pointer">
                                                <input type="checkbox" class="hiddens">
                                                <span class="text-slate-500 dark:text-slate-400 text-sm leading-6 capitalize">Keep me signed
                                                    in</span>
                                            </label>
                                            <a class="text-sm text-slate-800 dark:text-slate-400 leading-6 font-medium"
                                                href="forget-password-one.html">Forgot
                                                Password?
                                            </a>
                                        </div> --}}
                                        <button class="btn btn-dark block w-full text-center">Iniciar sesión</button>
                                    </form>
                                    <!-- END: Login Form -->
                                    <div class=" relative border-b-[#9AA2AF] border-opacity-[16%] border-b pt-6">
                                        <div
                                            class=" absolute inline-block bg-white dark:bg-slate-800 dark:text-slate-400 left-1/2 top-1/2 transform -translate-x-1/2
                                                px-4 min-w-max text-sm text-slate-500 dark:text-slate-400font-normal ">
                                            O
                                        </div>
                                    </div>

                                    <div
                                        class="mx-auto font-normal text-slate-500 dark:text-slate-400 2xl:mt-12 mt-6 uppercase text-sm text-center">
                                        {{-- Already registered? --}}

                                        <button class="btn btn-secondary block w-full text-center"
                                            onclick="show_register()">Registrarse</button>


                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endauth

        </div>



        <!-- scripts -->


        <script src="{{ asset('assets/js/rt-plugins.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>



        <script>
            function show_register() {
                $("#div_registro").show();
                $("#div_login").hide();
            }

            function show_login() {
                $("#div_registro").hide();
                $("#div_login").show();
            }
        </script>

    </body>

    </html>
@endsection
