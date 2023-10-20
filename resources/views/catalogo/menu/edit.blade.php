@extends('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Menú

                                <a href="{{ url('publico/menu') }}">
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
                                    <div class="xl:col-span-3 col-span-12 lg:col-span-2 ">
                                        <div class="card p-6 h-full">
                                            &nbsp;
                                        </div>
                                    </div>
                                    <div class="xl:col-span-6 col-span-12 lg:col-span-8">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form method="POST" action="{{ route('menu.update', $menu->Id) }}">
                                            @method('PUT')
                                            @csrf

                                            <div class="card h-full">
                                                <div class="grid pt-4 pb-3 px-4">
                                                    <div class="input-area relative">
                                                        <label for="largeInput" class="form-label">Descripción</label>
                                                        <input type="text" name="Descripcion"
                                                            value="{{ $menu->Descripcion }}" required class="form-control">
                                                    </div>
                                                    <br>
                                                    <div class="input-area">
                                                        <label for="name" class="form-label">Pagina</label>
                                                        <select name="Snippet" class="form-control">
                                                            <option value="">Seleccione</option>
                                                            @foreach ($snippets as $obj)
                                                                <option value="{{ $obj->Id }}"
                                                                    {{ $obj->Id == $menu->Snippet ? 'selected' : '' }}>
                                                                    {{ $obj->nombre }}</option>
                                                            @endforeach
                                                        </select>
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






                        <header
                            class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                            <div class="flex-1">
                                <div class="card-title text-slate-900 dark:text-white">Sub menus                                  
                                        <button class="btn btn-dark btn-sm float-right" data-bs-toggle="modal" data-bs-target="#modal_nuevo">
                                            Agregar sub menú
                                        </button>                                  
                                </div>
                            </div>
                        </header>

                        <div class="xl:col-span-3 col-span-12 lg:col-span-2 ">
                            <div class="card p-6 h-full">
                                &nbsp;
                            </div>
                        </div>
                        <div class="xl:col-span-6 col-span-12 lg:col-span-8">
                            @if ($sub_menus->count() > 0)
                                <table id="myTable" class="display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr class="td-table">

                                            <td |>Id</td>
                                            <td>Descripción</td>
                                            <td>Pagina</td>
                                            <td>opciones</td>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($sub_menus as $obj)
                                            <tr>
                                                <td align="center">{{ $obj->Id }}</td>
                                                <td>{{ $obj->Descripcion }}</td>
                                                @if ($obj->snippet)
                                                    <td>{{ $obj->snippet->nombre }}</td>
                                                @else
                                                    <td></td>
                                                @endif
                                                <td align="center">
                                                    <a href="{{ url('publico/menu') }}/{{ $obj->Id }}/edit">
                                                        <iconify-icon icon="mdi:pencil-box" width="40"></iconify-icon>
                                                    </a>
                                                    &nbsp;&nbsp;
                                                    <iconify-icon data-bs-toggle="modal"
                                                        data-bs-target="#modal-delete-{{ $obj->Id }}" icon="mdi:trash"
                                                        width="40"></iconify-icon>
                                                </td>
                                            </tr>
                                            @include('catalogo.menu.modal')
                                        @endforeach

                                        </thead>
                                    <tbody>

                                </table>
                            @endif
                        </div>
                        <div class="xl:col-span-3 col-span-12 lg:col-span-2 ">
                            <div class="card p-6 h-full">
                                &nbsp;
                            </div>
                        </div>
                    </div>









                </div>
            </div>
        </div>
    </div>

    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        id="modal_nuevo" tabindex="-1" aria-labelledby="permiso_modal" aria-hidden="true">
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding        rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <!-- Modal header -->
                    <form action="{{ url('publico/sub_menu') }}" method="POST" class="forms-sample">
                        @csrf
                        <div
                            class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                            <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                                Nuevo sub menú
                            </h3>
                            <button type="button"
                                class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center                    dark:hover:bg-slate-600 dark:hover:text-white"
                                data-bs-dismiss="modal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                            11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Nuevo sub menu</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-4">
                            <div class="input-area">
                                <label for="name" class="form-label">Descripción</label>
                                <input type="text" class="form-control" required name="Descripcion">
                                <input type="hidden" class="form-control"  name="Antesesora" value="{{$menu->Id}}">
                            </div>

                            <div class="input-area">
                                <label for="name" class="form-label">Pagina</label>
                                <select name="Snippet" class="form-control">
                                    <option value="">Seleccione</option>
                                    @foreach ($snippets as $obj)
                                        <option value="{{ $obj->Id }}">{{ $obj->nombre }}</option>
                                    @endforeach
                                </select>
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
    </div>
@endsection
