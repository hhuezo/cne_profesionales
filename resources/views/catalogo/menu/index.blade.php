@extends ('menu')
@section('contenido')

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="card">
        <header class=" card-header noborder">
            <h4 class="card-title">Menus
            </h4>
            <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modal_nuevo">Nuevo</button>
        </header>
        <div class="card-body px-6 pb-6">
            <div style=" margin-left:20px; margin-right:20px; ">
                <span class=" col-span-8  hidden"></span>
                <span class="  col-span-4 hidden"></span>
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden " style=" margin-bottom:20px ">
                        <table id="myTable" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr class="td-table">

                                    <td |>Id</td>
                                    <td >Descripción</td>
                                    <td >Pagina</td>
                                    <td >opciones</td>

                                </tr>
                            </thead>
                            <tbody>
                                @if ($menus->count() > 0)
                                    @foreach ($menus as $obj)
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
                                        @include('catalogo.sector.modal')
                                    @endforeach
                                @endif
                                </thead>
                            <tbody>

                        </table>
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
                    <form action="{{ url('publico/menu') }}" method="POST" class="forms-sample">
                        @csrf
                        <div
                            class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                            <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                                Nuevo menú
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
                                <span class="sr-only">Nuevo permiso</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-4">
                            <div class="input-area">
                                <label for="name" class="form-label">Descripción</label>
                                <input type="text" class="form-control" required name="Descripcion">
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
