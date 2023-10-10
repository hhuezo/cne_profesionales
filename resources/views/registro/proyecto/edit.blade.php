@extends('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <body class=" font-inter skin-default">

        <div class="page-content">
            <div class="transition-all duration-150 container-fluid" id="page_layout">
                <div id="content_layout">

                    <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
                        <!-- Basic Inputs -->
                        <div class="card">
                            <div class="card-body flex flex-col p-6">
                                <header
                                    class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                    <div class="flex-1">
                                        <div class="card-title text-slate-900 dark:text-white">Proyecto</div>
                                    </div>
                                    <a href="{{ url('registro/proyecto') }}">
                                        <button class="btn btn-dark btn-sm float-right">
                                            <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                                            </iconify-icon>
                                        </button>
                                    </a>
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
                                <form method="POST" action="{{ route('proyecto.update', $proyecto->Id) }}"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                        <div class="input-area relative">
                                            <label for="Descripcion" class="form-label">Descripción</label>
                                            <textarea name="Descripcion" class="form-control" required>{{ $proyecto->Descripcion }}</textarea>
                                        </div>
                                        <div class="input-area relative">
                                            <label for="RecomendacionContratista" class="form-label">Recomendacion
                                                contratista</label>
                                            <textarea name="RecomendacionContratista" class="form-control" required>{{ $proyecto->RecomendacionContratista }}</textarea>
                                        </div>

                                        <div class="input-area relative">
                                            <label for="TipoTecnologia" class="form-label">Tipo tecnología</label>
                                            <input type="text" name="TipoTecnologia"
                                                value="{{ $proyecto->TipoTecnologia }}" required class="form-control">
                                        </div>
                                        <div class="input-area relative">
                                            <label for="Sector" class="form-label">Sector</label>
                                            <input type="text" name="Sector" value="{{ $proyecto->Sector }}" required
                                                class="form-control">
                                        </div>


                                        <div class="input-area relative">
                                            <label for="FechaInicio" class="form-label">Fecha inicio</label>
                                            <input type="date" name="FechaInicio" value="{{ $proyecto->FechaInicio }}"
                                                required class="form-control">
                                        </div>
                                        <div class="input-area relative">
                                            <label for="FechaFinalizacion" class="form-label">Fecha finalización</label>
                                            <input type="date" name="FechaFinalizacion"
                                                value="{{ $proyecto->FechaFinalizacion }}" required class="form-control">
                                        </div>

                                        <div class="input-area relative">
                                            <label for="largeInput" class="form-label">Pais</label>
                                            <select name="Pais" class="form-control select2">
                                                @foreach ($paises as $obj)
                                                    <option value="{{ $obj->Id }}"
                                                        {{ $proyecto->Pais == $obj->Id ? 'selected' : '' }}>
                                                        {{ $obj->Nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>




                                        <div class="input-area">
                                            <label for="Archivo" class="form-label">Archivo</label>
                                            <div class="relative">
                                                <input type="file" name="Archivo" class="form-control">
                                                @if ($proyecto->ImagenUrl)
                                                    <a href="{{ asset('docs') }}/{{ $proyecto->ImagenUrl }}" target="_blank">
                                                        <button type="button"
                                                            class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                                            <iconify-icon icon="heroicons-solid:eye"></iconify-icon>
                                                        </button>
                                                    </a>
                                                @endif

                                            </div>
                                        </div>


                                    </div>
                                    <br>
                                    <div style="text-align: right;">
                                        <button type="submit"
                                            class="btn inline-flex justify-center btn-dark">Aceptar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="xl:col-span-3 col-span-12 lg:col-span-3 ">
                                <div class="card p-6 h-full">
                                    &nbsp;
                                </div>
                            </div>
                        </div>

                    </div>




                </div>
            </div>


        </div>
    </body>


@endsection
