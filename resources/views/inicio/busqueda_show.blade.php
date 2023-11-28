@extends('template')

@section('contenido')
    <!DOCTYPE html>
    <html lang="en" dir="ltr" class="light">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <title>DGEHM</title>
        <link rel="icon" type="image/png" href="{{ asset('img/el_salvador.png') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/rt-plugins.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
        <!-- START : Theme Config js-->
        <script src="{{ asset('assets/js/settings.js') }}" sync></script>

        <style>
            .card-title,
            .form-label {
                text-transform: none;
                text-align: left;
            }

            .form-label {
                font-weight: bold;
            }
        </style>

        <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
        <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}" sync></script>
        <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>


        <script>
            $(document).ready(function() {
                $('#myTable').DataTable({
                    "paging": false, // Disable pagination
                    "searching": false, // Disable search box
                    "info": false, // Disable information display
                    "lengthChange": false
                });

                $('#myTableProyectos').DataTable({
                    "paging": false, // Disable pagination
                    "searching": false, // Disable search box
                    "info": false, // Disable information display
                    "lengthChange": false
                });
            });
        </script>


    </head>

    <body class=" font-inter skin-default">


        <div class="content-wrapper transition-all duration-150" id="content_wrapper">
            <div class="page-content">
                <div class="transition-all duration-150 container-fluid" id="page_layout">
                    <div id="content_layout">


                        <div class="space-y-5 profile-page">
                            <div
                                class="profiel-wrap px-[35px] pb-10 md:pt-[84px] pt-10 rounded-lg bg-white dark:bg-slate-800 lg:flex lg:space-y-0 space-y-6 justify-between items-end relative z-[1]">
                                <div
                                    class="bg-slate-900 dark:bg-slate-700 absolute left-0 top-0 md:h-1/2 h-[150px] w-full z-[-1] rounded-t-lg">
                                </div>
                                <div class="profile-box flex-none md:text-start text-center">
                                    <div class="md:flex items-end md:space-x-6 rtl:space-x-reverse">
                                        <div class="flex-none">
                                            <div
                                                class="md:h-[186px] md:w-[186px] h-[140px] w-[140px] md:ml-0 md:mr-0 ml-auto mr-auto md:mb-0 mb-4 rounded-full ring-4                                 ring-slate-100 relative">
                                                @if ($certificacion->perfil->FotoUrl)
                                                    <img src="{{ asset('docs') }}/{{ $certificacion->perfil->FotoUrl }}"
                                                        alt="" class="w-full h-full object-cover rounded-full">
                                                @else
                                                    <img src="assets/images/users/user-1.jpg" alt=""
                                                        class="w-full h-full object-cover rounded-full">
                                                @endif
                                                {{-- <a href="profile-setting"
                                                    class="absolute right-2 h-8 w-8 bg-slate-50 text-slate-600 rounded-full shadow-sm flex flex-col items-center                                      justify-center md:top-[140px] top-[100px]">
                                                    <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                </a> --}}
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-2xl font-medium text-slate-900 dark:text-slate-200 mb-[3px]">
                                                {{ $certificacion->perfil->usuario->name }}
                                                {{ $certificacion->perfil->usuario->last_name }}
                                            </div>
                                            <div class="text-sm font-light text-slate-600 dark:text-slate-400">
                                                {{ $certificacion->perfil->profesion->Nombre }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end profile box -->
                                <div
                                    class="profile-info-500 md:flex md:text-start text-center flex-1 max-w-[516px] md:space-y-0 space-y-4">
                                    @if ($certificacion->perfil->Telefono  && $certificacion->perfil->TelefonoPublico == 1 )
                                    <div class="flex-1">
                                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                                            Teléfono
                                        </div>
                                        <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                                            {{ $certificacion->perfil->Telefono }}
                                        </div>
                                    </div>
                                    @endif

                                    <!-- end single -->
                                    <div class="flex-1">
                                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                                            Correo
                                        </div>
                                        <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                                            {{ $certificacion->perfil->usuario->email }}
                                        </div>
                                    </div>
                                    <!-- end single -->
                                    <div class="flex-1">
                                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                                            Nacionalidad
                                        </div>
                                        <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                                            {{ $certificacion->perfil->Nacionalidad }}
                                        </div>
                                    </div>
                                    <!-- end single -->
                                </div>
                                <!-- profile info-500 -->
                            </div>
                            <div class="grid grid-cols-12 gap-6">
                                <div class="lg:col-span-4 col-span-12">
                                    <div class="card h-full">
                                        <header class="card-header">
                                            <h4 class="card-title">Certificación</h4>

                                            @if ($certificacion->DocumentoUrl)
                                            <a href="{{ route('busqueda.mostrar_pdf', ['url' => $certificacion->DocumentoUrl  ]) }}"  target="_blank">
                                                    <div class="btn btn-secondary float-right">
                                                        <iconify-icon icon="teenyicons:pdf-solid"
                                                            width="24"></iconify-icon>
                                                    </div>
                                                </a>
                                            @endif
                                        </header>

                                        <div class="card-body p-6">
                                            <ul class="list space-y-8" align="left">
                                                <li class="flex space-x-3 rtl:space-x-reverse">
                                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                                        <iconify-icon icon="solar:document-linear"></iconify-icon>
                                                    </div>
                                                    <div class="flex-1">
                                                        <div
                                                            class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                            Descripción
                                                        </div>
                                                        <a href="mailto:someone@example.com"
                                                            class="text-base text-slate-600 dark:text-slate-50">
                                                            {{ $certificacion->Descripcion }}
                                                        </a>
                                                    </div>
                                                </li>
                                                <!-- end single list -->
                                                <li class="flex space-x-3 rtl:space-x-reverse">
                                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                                        <iconify-icon icon="fluent:document-28-regular"></iconify-icon>
                                                    </div>
                                                    <div class="flex-1">
                                                        <div
                                                            class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                            Alcance
                                                        </div>
                                                        <a href="tel:0189749676767"
                                                            class="text-base text-slate-600 dark:text-slate-50">
                                                            {{ $certificacion->Alcance }}
                                                        </a>
                                                    </div>
                                                </li>
                                                <!-- end single list -->
                                                <li class="flex space-x-3 rtl:space-x-reverse">
                                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                                        <iconify-icon icon="heroicons:map"></iconify-icon>
                                                    </div>
                                                    <div class="flex-1">
                                                        <div
                                                            class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                            Número
                                                        </div>
                                                        <div class="text-base text-slate-600 dark:text-slate-50">
                                                            {{ $certificacion->Numero }}
                                                        </div>
                                                    </div>
                                                </li>


                                                <li class="flex space-x-3 rtl:space-x-reverse">
                                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                                        <iconify-icon icon="material-symbols:order-approve-outline"></iconify-icon>
                                                    </div>
                                                    <div class="flex-1">
                                                        <div
                                                            class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                            Entidad certificadora
                                                        </div>
                                                        <div class="text-base text-slate-600 dark:text-slate-50">
                                                            @if ($certificacion->OtraEntidad)
                                                                {{ $certificacion->OtraEntidad }}
                                                            @else
                                                                {{ $certificacion->entidad->Nombre }}
                                                            @endif

                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="flex space-x-3 rtl:space-x-reverse">
                                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                                        <iconify-icon icon="uiw:date"></iconify-icon>
                                                    </div>
                                                    <div class="flex-1">
                                                        <div
                                                            class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                            Fecha de vencimiento
                                                        </div>
                                                        <div class="text-base text-slate-600 dark:text-slate-50">
                                                            {{ date('d/m/Y', strtotime($certificacion->FechaVencimiento)) }}
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- end single list -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="lg:col-span-8 col-span-12">
                                    <div class="card ">
                                        <header class="card-header">
                                            <h4 class="card-title">Documentos
                                            </h4>

                                            <a href="{{url('publico/busqueda')}}">
                                                <button class="btn btn-outline-dark">Volver</button>
                                                </a>
                                        </header>
                                        <div class="card-body">


                                            <div class="overflow-hidden " style=" margin-bottom:20px ">
                                                <table id="myTable" class="display" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr class="td-table" align="left">
                                                            <th>Descripción</th>
                                                            <th>Archivo</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($documentos->count() > 0)
                                                            @foreach ($documentos as $obj)
                                                                <tr align="left">
                                                                    <td>{{ $obj->Descripcion }}</td>
                                                                    @if ($obj->Url)
                                                                        <td align="center">
                                                                            <a href="{{ route('busqueda.mostrar_pdf', ['url' => $obj->Url]) }}"
                                                                                target="_blank">
                                                                                <iconify-icon icon="mdi:file"
                                                                                    style="color: #475569;"
                                                                                    width="40"></iconify-icon>
                                                                            </a>
                                                                        </td>
                                                                    @else
                                                                        <td align="center"></td>
                                                                    @endif
                                                                </tr>
                                                                @include('registro.proyecto.modal')
                                                            @endforeach
                                                        @endif

                                                    </tbody>
                                                </table>
                                            </div>



                                        </div>
                                    </div>
                                    <br>
                                    <div class="card ">
                                        <header class="card-header">
                                            <h4 class="card-title">Proyectos
                                            </h4>
                                        </header>
                                        <div class="card-body">


                                            <div class="overflow-hidden " style=" margin-bottom:20px ">
                                                <table id="myTableProyectos" class="display" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr class="td-table" align="left">
                                                            <th>Descripción</th>
                                                            <th>Tipo tecnología</th>
                                                            <th>Sector</th>
                                                            <th>Pais</th>
                                                            <th>Archivo</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($proyectos->count() > 0)
                                                            @foreach ($proyectos as $obj)
                                                                <tr align="left">
                                                                    <td>{{ $obj->Descripcion }}</td>
                                                                    <td>{{ $obj->TipoTecnologia }}</td>
                                                                    <td>{{ $obj->Sector }}</td>
                                                                    @if ($obj->pais)
                                                                        <td>{{ $obj->pais->Nombre }}</td>
                                                                    @else
                                                                        <td></td>
                                                                    @endif

                                                                    @if ($obj->ImagenUrl)
                                                                        <td align="center">
                                                                            <a href="{{ route('busqueda.mostrar_pdf', ['url' =>  $obj->ImagenUrl ]) }}"  target="_blank">
                                                                            {{-- <a href="{{ asset('docs') }}/{{ $obj->ImagenUrl }}" target="_blank"> --}}
                                                                                <iconify-icon icon="mdi:file"
                                                                                    style="color: #475569;"
                                                                                    width="40"></iconify-icon>
                                                                            </a>
                                                                        </td>
                                                                    @else
                                                                        <td align="center"></td>
                                                                    @endif
                                                                </tr>
                                                                @include('registro.proyecto.modal')
                                                            @endforeach
                                                        @endif

                                                    </tbody>
                                                </table>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        </div>


        <!-- scripts -->
        <script src="{{ asset('assets/js/rt-plugins.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>



    </body>

    </html>
@endsection
