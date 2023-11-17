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
                                Perfil

                                <a href="{{ url('seguridad/usuarios/') }}">
                                    <button class="btn btn-dark btn-sm float-right">
                                        <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                                        </iconify-icon>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </header>


                    <div class="transition-all duration-150 container-fluid" id="page_layout">
                        <div id="content_layout">
                            <div class="space-y-5">
                                <div class="grid grid-cols-12 gap-5">

                                    <div class="xl:col-span-12 col-span-12 lg:col-span-12">




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
                                                        aria-controls="tabs-profile" aria-selected="false">Documentos </a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a href="#tabs-messages"
                                                        class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300"
                                                        id="tabs-messages-tab" data-bs-toggle="pill"
                                                        data-bs-target="#tabs-messages" role="tab"
                                                        aria-controls="tabs-messages" aria-selected="false">Proyectos</a>
                                                </li>

                                            </ul>
                                            <div class="tab-content" id="tabs-tabContent">
                                                <div class="tab-pane fade show active" id="tabs-home" role="tabpanel"
                                                    aria-labelledby="tabs-home-tab">



                                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                        <div class="input-area relative">
                                                            <label for="Nombre" class="form-label">Nombre</label>
                                                            <input type="text" name="name" value="{{ $perfil->usuario->name }}" disabled
                                                                class="form-control">
                                                        </div>
                                                        <div class="input-area relative">
                                                            <label for="Apellido" class="form-label">Apellido</label>
                                                            <input type="text" name="last_name" value="{{ $perfil->usuario->last_name }}"
                                                                disabled class="form-control">
                                                        </div>

                                                        <div class="input-area">
                                                            <label for="Profesion" class="form-label">Profesión u oficio</label>
                                                            <input type="text" class="form-control" value="{{ $perfil->profesion->Nombre }}"
                                                                disabled name="Profesion">
                                                        </div>


                                                        <div class="input-area relative">
                                                            <label for="Direccion" class="form-label">Dirección</label>
                                                            <input type="text" name="Direccion" value="{{ $perfil->Direccion }}" disabled
                                                                class="form-control">
                                                        </div>




                                                        <div class="input-area relative">
                                                            <label for="Departamento" class="form-label">Departamento</label>
                                                            <input type="text"
                                                                value="{{ $perfil->distrito_corregimiento->municipio_distrito->departamento_provincia->Nombre }}"
                                                                disabled class="form-control">
                                                            {{-- ->municipio_distrito --}}
                                                        </div>

                                                        <div class="input-area relative">
                                                            <label for="Telefono" class="form-label">Telefono</label>
                                                            <input type="tel" name="Telefono" value="{{ $perfil->Telefono }}"
                                                                class="form-control">
                                                        </div>



                                                        <div class="input-area relative">
                                                            <label for="Municipio" class="form-label">Municipio</label>
                                                            <input type="text"
                                                                value="{{ $perfil->distrito_corregimiento->municipio_distrito->Nombre }}"
                                                                disabled class="form-control">
                                                        </div>

                                                        <div class="input-area relative">
                                                            <label for="Telefono" class="form-label">&nbsp;</label>
                                                            <label class="switch">
                                                                <input name="TelefonoPublico" type="checkbox" value="1" {{$perfil->TelefonoPublico == 1 ? 'checked':''}}>
                                                                <span class="slider round"></span>

                                                            </label>  <strong>¿Desea hacer publico su número telefonico?</strong>
                                                        </div>


                                                        <div class="input-area relative">
                                                            <label for="Telefono" class="form-label">Tipo documento</label>
                                                            <select name="TipoDocumento" class="form-control">
                                                                @foreach ($tipo_documentos as $tipo)
                                                                    <option value="{{ $tipo->Id }}"
                                                                        {{ $tipo->Id == $perfil->TipoDocumento ? 'selected' : '' }}>
                                                                        {{ $tipo->Nombre }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>


                                                        <div class="input-area relative">
                                                            <label for="Municipio" class="form-label">Distrito</label>
                                                            <input type="text" value="{{ $perfil->distrito_corregimiento->Nombre }}"
                                                                disabled class="form-control">
                                                        </div>


                                                        <div class="input-area relative">
                                                            <label for="Dui" class="form-label">Numero documento</label>
                                                            <input type="text" name="NumeroDocumento" value="{{ $perfil->NumeroDocumento }}"
                                                                class="form-control">
                                                        </div>






                                                        @if ($perfil->FotoUrl)
                                                            <div class="input-area">
                                                                <label for="Dui" class="form-label">Fotografia</label>
                                                                <div class="relative">
                                                                    <a href="{{ url('docs') }}/{{ $perfil->FotoUrl }}" target="_blank">
                                                                        <button type="button"
                                                                            class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                                                            <iconify-icon icon="heroicons-solid:eye"></iconify-icon>
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endif



                                                    </div>



                                                </div>


                                                <div class="tab-pane fade" id="tabs-profile" role="tabpanel"
                                                    aria-labelledby="tabs-profile-tab">

                                                    <div class="inline-block min-w-full align-middle">
                                                        <div class="overflow-hidden " style=" margin-bottom:20px ">
                                                            <table  class="display" cellspacing="0" width="100%">
                                                                <thead>
                                                                    <tr class="td-table">
                                                                        <th>Descripción</th>
                                                                        <th>Ver documento</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if ($documentos)
                                                                        @foreach ($documentos as $obj)
                                                                            <tr>
                                                                                <td align="center">{{ $obj->Descripcion }}</td>
                                                                                <td align="center">
                                                                                    <a href="{{ url('docs') }}/{{ $obj->Url }}" target="_blank">
                                                                                        <iconify-icon icon="heroicons-solid:eye"
                                                                                            width="24"></iconify-icon>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endif

                                                                </tbody>
                                                            </table>
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




@endsection
