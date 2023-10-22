@extends('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "ordering": false, // Desactivar el ordenamiento
                "searching": false, // Desactivar la búsqueda
                "lengthChange": false, // Ocultar la opción "Show entries"
                "paging": false, // Desactivar la paginación
                "bDestroy": true
            });
        });
    </script>


    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Pagina

                                <a href="{{ url('editor') }}">
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
                                    <div class="xl:col-span-3 col-span-12 lg:col-span-3 ">
                                        <div class="card p-6 h-full">
                                            &nbsp;
                                        </div>
                                    </div>
                                    <div class="xl:col-span-6 col-span-12 lg:col-span-6">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form method="POST" action="{{ route('editor.update', $snippet->Id) }}">
                                            @method('PUT')
                                            @csrf

                                            <div class="card h-full">
                                                <div class="grid pt-4 pb-3 px-4">
                                                    <div class="input-area relative">
                                                        <label for="largeInput" class="form-label">Nombre</label>
                                                        <input type="text" name="nombre" value="{{ $snippet->nombre }}"
                                                            required class="form-control">
                                                    </div>


                                                </div>
                                                <div style="text-align: right;">
                                                    <button type="submit" style="margin-right: 18px"
                                                        class="btn btn-dark">Aceptar</button>
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


                </div>
            </div>
        </div>
    </div>





    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">Opciones</div>
                </div>
            </header>
            <div class="card-text h-full ">
                <div>
                    <ul class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4"
                        id="tabs-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-home"
                                class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent active dark:text-slate-300"
                                id="tabs-home-tab" data-bs-toggle="pill" data-bs-target="#tabs-home" role="tab"
                                aria-controls="tabs-home" aria-selected="true">Archivos</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-profile"
                                class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300"
                                id="tabs-profile-tab" data-bs-toggle="pill" data-bs-target="#tabs-profile"
                                role="tab" aria-controls="tabs-profile" aria-selected="false">Noticias</a>
                        </li>
                       
                    </ul>
                    <div class="tab-content" id="tabs-tabContent">
                        <div class="tab-pane fade show active" id="tabs-home" role="tabpanel"
                            aria-labelledby="tabs-home-tab">

                            <div class="card-header">
                                <h4 class="card-title">Archivos</h4>
                                <div>
                                    <button class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modal-documento">Agregar</button>
                                </div>
                            </div>
                            <div class="card-body p-6">

                                @foreach ($documentos as $obj)
                                    <li class="block py-[8px]">
                                        <div class="flex space-x-2 rtl:space-x-reverse">
                                            <div class="flex-1 flex space-x-2 rtl:space-x-reverse">
                                                <div class="flex-none">
                                                    <div class="h-8 w-8">
                                                        <img src={{ asset('assets/images/icon/pdf-1.svg') }}
                                                            alt=""
                                                            class="block w-full h-full object-cover rounded-full border hover:border-white border-transparent">
                                                    </div>
                                                </div>
                                                <div class="flex-1">
                                                    <span class="block text-slate-600 text-sm dark:text-slate-300">
                                                        Fecha creación {{ date('d/m/Y', strtotime($obj->FechaCreacion)) }}
                                                    </span>
                                                    <span class="block font-normal text-xs text-slate-500 mt-1">

                                                    </span>
                                                </div>
                                                <div class="flex-1">
                                                    <span class="block text-slate-600 text-sm dark:text-slate-300">
                                                       Fecha modificación {{ date('d/m/Y', strtotime($obj->FechaModificacion)) }}
                                                    </span>
                                                    <span class="block font-normal text-xs text-slate-500 mt-1">

                                                    </span>
                                                </div>
                                                <div class="flex-1">
                                                    <span class="block text-slate-600 text-sm dark:text-slate-300">
                                                        {{ $obj->Descripcion }}
                                                    </span>
                                                    <span class="block font-normal text-xs text-slate-500 mt-1">

                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex-none">
                                                <a href="{{ asset('docs') }}/{{ $obj->Url }}" target="blank">
                                                    <button type="button" class="text-xs text-slate-900 dark:text-white">
                                                        <iconify-icon icon="mdi:eye" width="40"></iconify-icon>
                                                    </button>
                                                </a>
                                            </div>
                                            <div class="flex-none">
                                                <iconify-icon data-bs-toggle="modal"
                                                    data-bs-target="#modal-delete-{{ $obj->Id }}" icon="mdi:trash"
                                                    style="color: #475569;" width="40"></iconify-icon>
                                            </div>


                                        </div>
                                    </li>
                                    @include('editor.modal')
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tabs-profile" role="tabpanel" aria-labelledby="tabs-profile-tab">
                            <div class="card-header">
                                <h4 class="card-title">Noticias</h4>
                                <div>
                                    <button class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modal-noticia">Agregar</button>
                                </div>
                            </div>
                            <div class="card-body p-6">

                                @if ($noticias->count() > 0)
                                <table id="myTable" class="display" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr class="td-table">
                                            <th style="text-align: center">Id</th>
                                            <th style="text-align: center">Fecha creación</th>
                                            <th style="text-align: center">Fecha modificación</th>
                                            <th>Título</th>
                                            <th>Descripción</th>
                                            <th style="text-align: center">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($noticias as $obj)
                                            <tr>
                                                <td align="center">{{ $obj->Id }}</td>
                                                <td>{{ date('d/m/Y', strtotime($obj->FechaCreacion)) }}</td>
                                                <td>{{ date('d/m/Y', strtotime($obj->FechaModificacion)) }}</td>
                                                <td>{{ $obj->Titulo }}</td>
                                                <td>{{ substr( $obj->Descripcion,0,200) }}....</td>
                                                <td align="center">
                                                    <a href="{{ asset('docs') }}/{{ $obj->Url }}"
                                                        target="blank">
                                                        <button type="button"
                                                            class="text-xs text-slate-900 dark:text-white">
                                                            <iconify-icon icon="mdi:eye"
                                                                width="40"></iconify-icon>
                                                        </button>
                                                    </a>
                                                    &nbsp;&nbsp;
                                                    <iconify-icon data-bs-toggle="modal"
                                                        data-bs-target="#modal-delete-{{ $obj->Id }}"
                                                        icon="mdi:trash" style="color: #475569;"
                                                        width="40"></iconify-icon>

                                                </td>
                                            </tr>
                                            @include('editor.modal_noticia')
                                        @endforeach


                                    </tbody>
                                </table>
                            @endif
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        aria-hidden="true" role="dialog" tabindex="-1" id="modal-documento">

        <form method="POST" action="{{ url('editor/add_documento') }}" enctype="multipart/form-data">
            @csrf

            <!-- BEGIN: Modal -->
            <div class="modal-dialog relative w-auto pointer-events-none">
                <div
                    class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                    <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                            <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                                Agregar documento
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
                                <input type="hidden" name="Snippet" value="{{ $snippet->Id }}" class="form-control">
                                <label for="largeInput" class="form-label">Descripción</label>
                                <input type="text" name="Descripcion" required class="form-control">
                            </div>

                            <div class="input-area relative">
                                <label for="largeInput" class="form-label">Archivo</label>
                                <input type="file" name="Archivo" required class="form-control">
                            </div>

                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                            <button type="submit"
                                class="btn inline-flex justify-center text-white bg-black-500">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>


    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        aria-hidden="true" role="dialog" tabindex="-1" id="modal-noticia">

        <form method="POST" action="{{ url('editor/add_noticia') }}" enctype="multipart/form-data">
            @csrf

            <!-- BEGIN: Modal -->
            <div class="modal-dialog relative w-auto pointer-events-none">
                <div
                    class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                    <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                            <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                                Agregar noticia
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
                                <input type="hidden" name="Snippet" value="{{ $snippet->Id }}" class="form-control">
                                <label for="largeInput" class="form-label">Título</label>
                                <input type="text" name="Titulo" required class="form-control">
                            </div>

                            <div class="input-area relative">
                                <label for="largeInput" class="form-label">Descripción</label>
                                <textarea name="Descripcion" required class="form-control"></textarea>
                            </div>

                            <div class="input-area relative">
                                <label for="largeInput" class="form-label">Archivo</label>
                                <input type="file" name="Archivo" accept="image/*" required class="form-control">
                            </div>

                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                            <button type="submit"
                                class="btn inline-flex justify-center text-white bg-black-500">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
