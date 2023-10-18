@extends ('menu')
@section('contenido')

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


    <div class=" space-y-5">
        <div class="card">
            <header class=" card-header noborder">
                <h4 class="card-title">Proyectos
                </h4>
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#basic_modal">Nuevo</button>

            </header>
            <div class="card">
                <div style=" margin-left:20px; margin-right:20px; ">
                    <span class=" col-span-8  hidden"></span>
                    <span class="  col-span-4 hidden"></span>
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden " style=" margin-bottom:20px ">
                            <table id="myTable" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr class="td-table">
                                        <th style="text-align: center">Id</th>
                                        <th>Descripción</th>

                                        <th>Archivo</th>
                                        <th style="text-align: center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($documentos->count() > 0)
                                        @foreach ($documentos as $obj)
                                            <tr>
                                                <td align="center">{{ $obj->Id }}</td>
                                                <td>{{ $obj->Descripcion }}</td>


                                                @if ($obj->Url)
                                                    <td align="center">
                                                        <a href="{{ asset('docs') }}/{{ $obj->Url }}" target="_blank">
                                                            <iconify-icon icon="mdi:file" style="color: #475569;"
                                                                width="40"></iconify-icon>
                                                        </a>
                                                    </td>
                                                @else
                                                    <td align="center"></td>
                                                @endif


                                                <td align="center">
                                                    <a href="{{ url('registro/documento') }}/{{ $obj->Id }}/edit">
                                                        <iconify-icon icon="mdi:pencil-box" style="color: #475569;"
                                                            width="40"></iconify-icon>
                                                    </a>

                                                    &nbsp;&nbsp;
                                                    <iconify-icon data-bs-toggle="modal"
                                                        data-bs-target="#modal-delete-{{ $obj->Id }}" icon="mdi:trash"
                                                        style="color: #475569;" width="40"></iconify-icon>
                                                </td>
                                            </tr>
                                            @include('registro.documento.modal')
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
                            Nuevo documento
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

                    <form method="POST" action="{{ url('registro/documento') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="p-6 space-y-4">
                            <div class="input-area relative">
                                <input type="hidden" name="Perfil" value="{{ $perfil->Id }}" class="form-control">
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
                    </form>
                </div>
            </div>
        </div>
        <!-- END: Modals -->


    </div>









@endsection
