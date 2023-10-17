@extends('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">País

                                <a href="{{ url('catalogo/pais') }}">
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
                                    <div class="xl:col-span-2 col-span-12 lg:col-span-2 ">
                                        <div class="card p-6 h-full">
                                            &nbsp;
                                        </div>
                                    </div>
                                    <div class="xl:col-span-8 col-span-12 lg:col-span-8">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form method="POST" action="{{ route('pais.update', $pais->Id) }}" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf

                                            <div class="card h-full">
                                                <div class="grid pt-4 pb-3 px-4">
                                                    <div class="input-area relative">
                                                        <label for="largeInput" class="form-label">Nombre</label>
                                                        <input type="text" name="Nombre" value="{{ $pais->Nombre }}"
                                                            readonly class="form-control">
                                                    </div>
                                                    <br>
                                                    <div class="input-area relative">
                                                        <label for="largeInput" class="form-label">url</label>
                                                        <input type="text" name="Url" value="{{ $pais->Url }}"
                                                            required class="form-control">
                                                    </div>

                                                    <br>
                                                    <div class="input-area relative">
                                                        <label for="largeInput" class="form-label">Archivo</label>
                                                        <div class="relative">
                                                            <input type="file" name="Bandera" id="Bandera"
                                                                class="form-control !pr-12">
                                                            <a href="{{ url('img') }}/{{ $pais->Bandera }}"
                                                                target="_blank">
                                                                @if ($pais->Bandera)
                                                                    <button type="button"
                                                                        class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                                                        <iconify-icon
                                                                            icon="heroicons-solid:eye"></iconify-icon>
                                                                    </button>
                                                                @endif
                                                            </a>
                                                        </div>
                                                                                                             
                                                    </div>
                                                </div>
                                                <div style="text-align: right;">
                                                    <button type="submit" style="margin-right: 18px"
                                                        class="btn btn-dark">Aceptar</button>
                                                </div>

                                                <div align="center">
                                                    <img src="" alt="Preview" id="imagePreview" style="display:none; max-width: 200px; max-height: 200px;">
                                                </div>
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

                    <div class="card">
                        <div class="card-body flex flex-col p-6">
                            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                <div class="flex-1">
                                    <div class="card-title text-slate-900 dark:text-white">Documentos
                                        <button class="btn btn-outline-dark float-right" type="button" data-bs-toggle="modal"
                                            data-bs-target="#modal-documento">Agregar</button>
                                    </div>
                                </div>
            
                            </header>
                            <div style=" margin-left:20px; margin-right:20px; ">
                                <span class=" col-span-8  hidden"></span>
                                <span class="  col-span-4 hidden"></span>
                                <div class="inline-block min-w-full align-middle">
                                    <div class="overflow-hidden " style=" margin-bottom:20px ">
                                        <table id="myTable" class="display" cellspacing="0" width="100%">
                                            <thead>
                                                <tr class="td-table">
                                                    <th style="text-align: center">Descripción</th>
                                                    <th style="text-align: center">Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($documentos)
                                                    @foreach ($documentos as $obj)
                                                        <tr>
                                                            <td>{{ $obj->Descripcion }}</td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Escuchar cambios en el campo de archivo
            $('#Bandera').on('change', function(e) {
                // Obtener el archivo seleccionado
                var file = e.target.files[0];

                if (file) {
                    // Crear un objeto de FileReader para leer el contenido del archivo
                    var reader = new FileReader();

                    // Definir la función que se ejecutará cuando se complete la lectura
                    reader.onload = function(e) {
                        // Asignar la fuente de la imagen al atributo src
                        $('#imagePreview').attr('src', e.target.result);

                        // Mostrar la imagen
                        $('#imagePreview').show();
                    };

                    // Leer el contenido del archivo como una URL de datos
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>

@endsection
