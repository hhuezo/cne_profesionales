@extends('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">
                                Certificación

                                @can('asignar certificacion')
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#modal-asignar"
                                            class="btn btn-dark btn-sm float-right">
                                            {{ $certificacion->Administrador == null ? 'Asignar' : 'Reasignar' }}
                                        </button>

                                @endcan
                            </div>
                        </div>
                    </header>


                    <div class="transition-all duration-150 container-fluid" id="page_layout">
                        <div id="content_layout">
                            <div class="space-y-5">
                                <div class="grid grid-cols-12 gap-5">

                                    <div class="xl:col-span-12 col-span-12 lg:col-span-12">
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



                                        <div>
                                            <ul class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4"
                                                id="tabs-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a href="#tabs-home"
                                                        class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent active dark:text-slate-300"
                                                        id="tabs-home-tab" data-bs-toggle="pill" data-bs-target="#tabs-home"
                                                        role="tab" aria-controls="tabs-home"
                                                        aria-selected="true">General</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a href="#tabs-profile"
                                                        class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300"
                                                        id="tabs-profile-tab" data-bs-toggle="pill"
                                                        data-bs-target="#tabs-profile" role="tab"
                                                        aria-controls="tabs-profile" aria-selected="false">Perfil</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a href="#tabs-messages"
                                                        class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300"
                                                        id="tabs-messages-tab" data-bs-toggle="pill"
                                                        data-bs-target="#tabs-messages" role="tab"
                                                        aria-controls="tabs-messages" aria-selected="false">Proyectos</a>
                                                </li>
                                                {{-- <li class="nav-item" role="presentation">
                                                    <a href="#tabs-settings"
                                                        class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300"
                                                        id="tabs-settings-tab" data-bs-toggle="pill"
                                                        data-bs-target="#tabs-settings" role="tab"
                                                        aria-controls="tabs-settings" aria-selected="false">settings</a>
                                                </li> --}}
                                            </ul>
                                            <div class="tab-content" id="tabs-tabContent">
                                                <div class="tab-pane fade show active" id="tabs-home" role="tabpanel"
                                                    aria-labelledby="tabs-home-tab">

                                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                        <div class="input-area relative">
                                                            <label for="Descipcion" class="form-label">Nombre</label>
                                                            <input type="text" name="Numero"
                                                                value="{{ $perfil->usuario->name }} {{ $perfil->usuario->last_name }}" disabled
                                                                class="form-control">
                                                        </div>
                                                        <div class="input-area relative">
                                                            <label for="Alcance" class="form-label">Correo</label>
                                                            <input type="text" name="Numero"
                                                                value="{{ $perfil->usuario->email }}" disabled
                                                                class="form-control">
                                                        </div>
                                                        <div class="input-area relative">
                                                            <label for="Descipcion" class="form-label">Descripción</label>
                                                            <textarea class="form-control" name="Descripcion" required disabled>{{ $certificacion->Descripcion }}</textarea>
                                                        </div>
                                                        <div class="input-area relative">
                                                            <label for="Alcance" class="form-label">Alcance</label>
                                                            <textarea class="form-control" name="Alcance" required disabled>{{ $certificacion->Alcance }}</textarea>
                                                        </div>

                                                        <div class="input-area relative">
                                                            <label for="Numero" class="form-label">Número</label>
                                                            <input type="text" name="Numero"
                                                                value="{{ $certificacion->Numero }}" required disabled
                                                                class="form-control">
                                                        </div>


                                                        {{-- <div class="input-area">
                                                            <label for="Nombre" class="form-label">Tipo
                                                                certificado</label>
                                                            <select name="TipoCertificado" required disabled
                                                                class="form-control !pr-12 select2">
                                                                @foreach ($tipo_certificados as $obj)
                                                                    <option value="{{ $obj->Id }}"
                                                                        {{ $certificacion->TipoCertificado == $obj->Id ? 'selected' : '' }}>
                                                                        {{ $obj->Descripcion }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                        </div> --}}


                                                        <div class="input-area">
                                                            <label for="Nombre" class="form-label">Entidad
                                                                certificadora</label>
                                                            <select name="EntidadCertificadora" id="EntidadCertificadora"
                                                                required disabled class="form-control !pr-12 select2">
                                                                @foreach ($entidades as $obj)
                                                                    <option value="{{ $obj->Id }}"
                                                                        {{ $certificacion->EntidadCertificadora == $obj->Id ? 'selected' : '' }}>
                                                                        {{ $obj->Nombre }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>



                                                        @if ($certificacion->EntidadCertificadora == 1)
                                                            <div class="input-area">
                                                                <label for="Nombre" class="form-label">Otra entidad
                                                                    certificadora</label>
                                                                <div class="relative">
                                                                    <input type="text" name="OtraEntidad"
                                                                        id="OtraEntidad" disabled
                                                                        value="{{ $certificacion->OtraEntidad }}"
                                                                        class="form-control !border-danger-500 !pr-12">
                                                                    <button type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#modal-entidad"
                                                                        class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                                                        <iconify-icon icon="mdi:pencil-box"
                                                                            style="color: #475569;"
                                                                            width="40"></iconify-icon>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        @endif


                                                        <div class="input-area relative">
                                                            <label for="Nombre" class="form-label">Fecha de
                                                                vencimiento</label>
                                                            <input type="date" name="FechaVencimiento"
                                                                min="{{ date('Y-m-d') }}"
                                                                value="{{ $certificacion->FechaVencimiento }}" required
                                                                disabled class="form-control">
                                                        </div>



                                                    </div>

                                                    <br>
                                                    @if ($certificacion->Estado == 2)
                                                        <div style="text-align: center;">
                                                            <button type="button" data-bs-toggle="modal"
                                                                data-bs-target="#modal-observacion"
                                                                class="btn inline-flex justify-center btn-warning">Observar</button>&nbsp;&nbsp;
                                                            <button type="submit" data-bs-toggle="modal"
                                                            data-bs-target="#modal-aprobar"
                                                                class="btn inline-flex justify-center btn-dark">Aprobar</button>
                                                        </div>
                                                    @endif



                                                </div>
                                                <div class="tab-pane fade" id="tabs-profile" role="tabpanel"
                                                    aria-labelledby="tabs-profile-tab">

                                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                        <div class="input-area relative">
                                                            <label for="Nombre" class="form-label">Nombre</label>
                                                            <input type="text" name="name"
                                                                value="{{ $perfil->usuario->name }}" disabled
                                                                class="form-control">
                                                        </div>
                                                        <div class="input-area relative">
                                                            <label for="Apellido" class="form-label">Apellido</label>
                                                            <input type="text" name="last_name"
                                                                value="{{ $perfil->usuario->last_name }}" disabled
                                                                class="form-control">
                                                        </div>

                                                        <div class="input-area relative">
                                                            <label for="Dui" class="form-label">Número documento</label>
                                                            <input type="text" name="Dui"
                                                                value="{{ $perfil->NumeroDocumento }}" disabled
                                                                class="form-control">
                                                        </div>
                                                        @if ($perfil->DocumentoURL)
                                                            <div class="input-area">
                                                                <label for="Dui" class="form-label">Archivo documento</label>
                                                                <div class="relative">
                                                                    <input type="file" name="DuiURL"
                                                                        class="form-control !pr-12" disabled>
                                                                    <a href="{{ url('docs') }}/{{ $perfil->DocumentoURL }}"
                                                                        target="_blank">
                                                                        <button type="button"
                                                                            class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                                                            <iconify-icon
                                                                                icon="heroicons-solid:eye"></iconify-icon>
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="input-area relative">
                                                                <label for="Dui" class="form-label">Archivo documento</label>
                                                                <input type="file" name="DuiURL"
                                                                    value="{{ $perfil->DuiURL }}" disabled
                                                                    class="form-control">
                                                            </div>
                                                        @endif


                                                        <div class="input-area">
                                                            <label for="Profesion" class="form-label">Profesión u
                                                                oficio</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $perfil->profesion->Nombre }}" disabled
                                                                name="Profesion">
                                                        </div>



                                                        @if ($perfil->TituloURL)
                                                            <div class="input-area">
                                                                <label for="Dui" class="form-label">Archivo título</label>
                                                                <div class="relative">
                                                                    <input type="file" name="TituloURL"
                                                                        class="form-control !pr-12" disabled>
                                                                    <a href="{{ url('docs') }}/{{ $perfil->TituloURL }}"
                                                                        target="_blank">
                                                                        <button type="button"
                                                                            class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                                                            <iconify-icon
                                                                                icon="heroicons-solid:eye"></iconify-icon>
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="input-area relative">
                                                                <label for="Dui" class="form-label">Archivo título</label>
                                                                <input type="file" name="TituloURL"
                                                                    value="{{ $perfil->TituloURL }}" disabled
                                                                    class="form-control">
                                                            </div>
                                                        @endif


                                                        {{-- <div class="input-area relative">
                                                            <label for="Nacionalidad"
                                                                class="form-label">Nacionalidad</label>
                                                            <input type="text" name="Nacionalidad"
                                                                value="{{ $perfil->Nacionalidad }}" disabled
                                                                class="form-control">
                                                        </div> --}}
                                                        <div class="input-area relative">
                                                            <label for="Direccion" class="form-label">Dirección</label>
                                                            <input type="text" name="Direccion"
                                                                value="{{ $perfil->Direccion }}" disabled
                                                                class="form-control">
                                                        </div>
                                                        <div class="input-area relative">
                                                            <label for="Pais" class="form-label">Pais origen</label>
                                                            <input type="text" value="{{ $perfil->pais->Nombre }}"
                                                                disabled class="form-control">
                                                        </div>
                                                        <div class="input-area relative">
                                                            <label for="Telefono" class="form-label">Telefono</label>
                                                            <input type="tel" name="Telefono"
                                                                value="{{ $perfil->Telefono }}" disabled
                                                                class="form-control">
                                                        </div>
                                                        <div class="input-area relative">
                                                            <label for="Departamento"
                                                                class="form-label">Departamento</label>
                                                            <input type="tel" name="Telefono"
                                                                value="{{ $perfil->distrito_corregimiento->municipio_distrito->departamento_provincia->Nombre }}"
                                                                disabled class="form-control">
                                                        </div>

                                                        <div class="input-area relative">
                                                            <label for="Municipio" class="form-label">Municipio</label>
                                                            <input type="tel" name="Telefono"
                                                                value="{{ $perfil->distrito_corregimiento->municipio_distrito->Nombre }}"
                                                                disabled class="form-control">

                                                        </div>



                                                        <div class="input-area relative">
                                                            <label for="Municipio" class="form-label">Distrito</label>
                                                            <input type="tel" name="Telefono"
                                                                value="{{ $perfil->distrito_corregimiento->Nombre }}"
                                                                disabled class="form-control">

                                                        </div>



                                                    </div>



                                                </div>
                                                <div class="tab-pane fade" id="tabs-messages" role="tabpanel"
                                                    aria-labelledby="tabs-messages-tab">



                                                    <div class="overflow-hidden " style=" margin-bottom:20px ">
                                                        <table id="myTable" class="display" cellspacing="0"
                                                            width="100%">
                                                            <thead>
                                                                <tr class="td-table">
                                                                    <th>Descripción</th>
                                                                    <th>Tipo tecnología</th>
                                                                    <th>Sector</th>
                                                                    <th>Pais</th>
                                                                    <th>Fecha inicio</th>
                                                                    <th>Fecha finalización</th>
                                                                    <th>Archivo</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if ($proyectos->count() > 0)
                                                                    @foreach ($proyectos as $obj)
                                                                        <tr>
                                                                            <td>{{ $obj->Descripcion }}</td>
                                                                            <td>{{ $obj->TipoTecnologia }}</td>
                                                                            <td>{{ $obj->Sector }}</td>
                                                                            @if ($obj->pais)
                                                                                <td>{{ $obj->pais->Nombre }}</td>
                                                                            @else
                                                                                <td></td>
                                                                            @endif
                                                                            <td>{{ date('d/m/Y', strtotime($obj->FechaInicio)) }}
                                                                            </td>
                                                                            <td>{{ date('d/m/Y', strtotime($obj->FechaFinalizacion)) }}
                                                                            </td>
                                                                            @if ($obj->ImagenUrl)
                                                                                <td align="center">
                                                                                    <a href="{{ asset('docs') }}/{{ $obj->ImagenUrl }}"
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
                                                                    @endforeach
                                                                @endif

                                                            </tbody>
                                                        </table>
                                                    </div>









                                                </div>
                                                {{-- <div class="tab-pane fade" id="tabs-settings" role="tabpanel"
                                                    aria-labelledby="tabs-settings-tab">
                                                    <p class="text-sm text-gray-500 dark:text-gray-200">
                                                        This is some placeholder content the
                                                        <strong>Settings</strong>
                                                        tab's associated content. Clicking another tab will toggle the
                                                        visibility of this one for the next. The tab JavaScript swaps
                                                        classes to control the content visibility and styling. consectetur
                                                        adipisicing elit. Ab ipsa!
                                                    </p>
                                                </div> --}}
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





    <div id="modal-asignar"
        class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        aria-hidden="true" role="dialog" tabindex="-1">

        <form method="POST" action="{{ url('registro/certificacion/asignar') }}">
            @csrf
            <div class="modal-dialog relative w-auto pointer-events-none">
                <div
                    class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
                      rounded-md outline-none text-current">
                    <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                            <h3 class="text-base font-medium text-white dark:text-white">
                                {{ $certificacion->Administrador == null ? 'Asignar' : 'Reasignar' }} administrador local
                            </h3>
                            <button type="button"
                                class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                                  dark:hover:bg-slate-600 dark:hover:text-white"
                                data-bs-dismiss="modal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                          11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-4">
                            <div class="input-area relative">
                                <label for="Administrador" class="form-label">Adminstrador local</label>
                                <select name="Administrador" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    @foreach ($adminitradores_locales as $obj)
                                        <option value="{{ $obj->id }}" class="dark:bg-slate-700"
                                            {{ $certificacion->Administrador == $obj->id ? 'selected' : '' }}>
                                            {{ $obj->name }} {{ $obj->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="Certificacion" value="{{ $certificacion->Id }}">

                        </div>
                        <!-- Modal footer -->
                        <div class=" items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                            <button type="submit"
                                class="btn inline-flex justify-center text-white bg-black-500 float-right"
                                style="margin-bottom: 15px">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <div id="modal-entidad"
        class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        aria-hidden="true" role="dialog" tabindex="-1">

        <form method="POST" action="{{ url('registro/certificacion/entidad') }}">
            @csrf
            <div class="modal-dialog relative w-auto pointer-events-none">
                <div
                    class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
                  rounded-md outline-none text-current">
                    <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                            <h3 class="text-base font-medium text-white dark:text-white">
                                Agregar entidad certificadora
                            </h3>
                            <button type="button"
                                class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                              dark:hover:bg-slate-600 dark:hover:text-white"
                                data-bs-dismiss="modal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                      11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-4">
                            <input type="hidden" name="Certificacion" value="{{ $certificacion->Id }}">
                            <div class="input-area relative">
                                <label for="Administrador" class="form-label">Nombre</label>
                                <input type="text" name="Nombre" required value="{{ $certificacion->OtraEntidad }}"
                                    class="form-control">
                            </div>

                            <div class="input-area relative">
                                <label for="Administrador" class="form-label">Descripción</label>
                                <input type="text" name="Descripcion" required class="form-control">
                            </div>

                            <div class="input-area relative">
                                <label for="Administrador" class="form-label">Alcance</label>
                                <input type="text" name="AlcanceCertificacion" required class="form-control">
                            </div>

                            <div class="input-area relative">
                                <label for="Administrador" class="form-label">Pais</label>
                                <select name="Pais" class="form-control">
                                    @foreach ($paises as $obj)
                                        <option value="{{ $obj->Id }}">{{ $obj->Nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-area relative">
                                <label for="Administrador" class="form-label">Link</label>
                                <input type="text" name="Link" class="form-control">
                            </div>

                            <div class="input-area relative">
                                <label for="Administrador" class="form-label">Correo de contacto</label>
                                <input type="email" name="CorreoContacto" class="form-control">
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class=" items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                            <button type="submit"
                                class="btn inline-flex justify-center text-white bg-black-500 float-right"
                                style="margin-bottom: 15px">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <div id="modal-observacion"
        class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        aria-hidden="true" role="dialog" tabindex="-1">

        <form method="POST" action="{{ url('registro/certificacion/observar') }}">
            @csrf
            <div class="modal-dialog relative w-auto pointer-events-none">
                <div
                    class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
                      rounded-md outline-none text-current">
                    <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                            <h3 class="text-base font-medium text-white dark:text-white">
                                Enviar observación
                            </h3>
                            <button type="button"
                                class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                                  dark:hover:bg-slate-600 dark:hover:text-white"
                                data-bs-dismiss="modal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                          11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-4">
                            <div class="input-area relative">
                                <input type="hidden" name="Certificacion" value="{{ $certificacion->Id }}">
                                <label for="Administrador" class="form-label">Observación</label>
                                <textarea name="Observacion" class="form-control"></textarea>
                            </div>


                        </div>
                        <!-- Modal footer -->
                        <div class=" items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                            <button type="submit"
                                class="btn inline-flex justify-center text-white bg-black-500 float-right"
                                style="margin-bottom: 15px">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>


    <div id="modal-aprobar"
        class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        aria-hidden="true" role="dialog" tabindex="-1">

        <form method="POST" action="{{ url('registro/certificacion/aprobar') }}">
            @csrf
            <div class="modal-dialog relative w-auto pointer-events-none">
                <div
                    class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
                  rounded-md outline-none text-current">
                    <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                            <h3 class="text-base font-medium text-white dark:text-white">
                                Aprobar certificación
                            </h3>
                            <button type="button"
                                class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                              dark:hover:bg-slate-600 dark:hover:text-white"
                                data-bs-dismiss="modal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                      11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-4">
                            <div class="input-area relative">
                                <h6 class="text-base text-slate-900 dark:text-white leading-6">
                                    Confirme si desea aprobar la certificación
                                </h6>
                                <input type="hidden" name="Certificacion" value="{{ $certificacion->Id }}">
                            </div>


                        </div>
                        <!-- Modal footer -->
                        <div class=" items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                            <button type="submit"
                                class="btn inline-flex justify-center text-white bg-black-500 float-right"
                                style="margin-bottom: 15px">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <script type="text/javascript">
        $(document).ready(function() {


        });
    </script>

@endsection
