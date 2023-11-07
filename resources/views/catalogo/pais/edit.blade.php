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
                                        <form method="POST" action="{{ route('pais.update', $pais->Id) }}"
                                            enctype="multipart/form-data">
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
                                                             class="form-control">
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
                                                    <br>
                                                    <div class="input-area relative">
                                                        <label for="largeInput" class="form-label">Activo</label>
                                                        @if ($pais->Activo == 1)
                                                            <input name="Activo" type="checkbox" value="1" checked>
                                                        @else
                                                            <input name="Activo" type="checkbox"  >
                                                        @endif
                                                    </div>
                                                </div>
                                                <div style="text-align: right;">
                                                    <button type="submit" style="margin-right: 18px"
                                                        class="btn btn-dark">Aceptar</button>
                                                </div>

                                                <div align="center">
                                                    <img src="" alt="Preview" id="imagePreview"
                                                        style="display:none; max-width: 200px; max-height: 200px;">
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
                            <header
                                class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                <div class="flex-1">
                                    <div class="card-title text-slate-900 dark:text-white">Tipo documento
                                        <button class="btn btn-outline-dark float-right" type="button"
                                            data-bs-toggle="modal" data-bs-target="#basic_modal">Agregar</button>
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
                                                    <th style="text-align: center">Predeterminado</th>
                                                    <th style="text-align: center">Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($tipo_documentos)
                                                    @foreach ($tipo_documentos as $obj)
                                                        <tr>
                                                            <td>{{ $obj->Nombre }}</td>
                                                            <td align="center"><input type="checkbox" {{$obj->Predeterminado == 1 ? 'checked':''}} ></td>
                                                            <td align="center">
                                                                <iconify-icon data-bs-toggle="modal"
                                                                    data-bs-target="#modal-delete-{{ $obj->Id }}"
                                                                    icon="mdi:trash" style="color: #475569;"
                                                                    width="40"></iconify-icon>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @include('catalogo.pais.modal')
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



    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        id="basic_modal" tabindex="-1" aria-labelledby="basic_modal" aria-hidden="true">




        <!-- BEGIN: Modal -->
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                        <h3 class="text-xl font-medium text-white dark:text-white">
                            Nuevo tipo documento
                        </h3>
                        <button type="button"
                            class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white"
                            data-bs-dismiss="modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->

                    <form method="POST" action="{{ url('catalogo/pais/attach_tipo') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="p-6 space-y-4">
                            <div class="input-area relative">
                                <input type="hidden" name="Pais" value="{{ $pais->Id }}" class="form-control">
                                <label for="largeInput" class="form-label">Nombre</label>
                                <input type="text" name="Nombre" required class="form-control">
                            </div>

                            <div class="input-area relative">
                                <label for="largeInput" class="form-label">Predeterminado</label>
                                <input type="checkbox" value="1" name="Predeterminado">
                            </div>

                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                            <button type="submit"
                                class="btn inline-flex justify-center text-white bg-black-500">Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END: Modals -->


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
