@extends('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "ordering": false,
                "searching": false,
                "lengthChange": false,
                "paging": false,
                "columnDefs": [{
                    "orderable": false,
                    "targets": "_all"
                }]
            });
        });
    </script>

    <style>
        .dataTables_info {
            display: none;
        }
    </style>

    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">
                                <a href="{{ url('registro/certificacion') }}">
                                    <button class="btn btn-dark btn-sm">
                                        <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                                        </iconify-icon>
                                    </button>
                                </a>
                                &nbsp;&nbsp;Certificación
                                @can('enviar certificacion')
                                @if ($certificacion->Estado == 1)
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modal-send"
                                        class="btn btn-dark btn-sm float-right">
                                        Enviar
                                    </button>
                                @endif
                                @endcan

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
                                        <form method="POST"
                                            action="{{ route('certificacion.update', $certificacion->Id) }}"
                                            enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf

                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">

                                                <div class="input-area relative">
                                                    <label for="TipoTecnologia" class="form-label">Descripción</label>
                                                    <textarea class="form-control" readonly name="Descripcion">{{ $certificacion->Descripcion }}</textarea>
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="TipoTecnologia" class="form-label">Tipo de
                                                        tecnología</label>
                                                    <textarea class="form-control" name="TipoTecnologia" required>{{ old('TipoTecnologia') }}</textarea>
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="Numero" class="form-label">Número</label>
                                                    <input type="text" name="Numero" value="{{ old('Numero') }}"
                                                        required class="form-control">
                                                </div>


                                                <div class="input-area relative">
                                                    <label for="Sector" class="form-label">Sector</label>
                                                    <input type="text" name="Sector" value="{{ old('Sector') }}"
                                                        required class="form-control">
                                                </div>



                                                <div class="input-area relative">
                                                    <label for="FechaEmision" class="form-label">Fecha de emisión</label>
                                                    <input type="date" name="FechaEmision"
                                                        value="{{ old('FechaEmision') }}" required class="form-control">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="Nombre" class="form-label">Fecha de vencimiento</label>
                                                    <input type="date" name="FechaVencimiento"
                                                        value="{{ old('FechaVencimiento') }}" required class="form-control">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="Nombre" class="form-label">Documento</label>
                                                    <input type="file" name="Archivo" value="{{ old('Archivo') }}"
                                                        required class="form-control">
                                                </div>



                                                <div class="input-area">
                                                    <label for="Nombre" class="form-label">Entidad certificadora</label>
                                                    <div class="relative">
                                                        <select name="EntidadCertificadora" required
                                                            class="form-control !pr-12 select2">
                                                            @foreach ($entidades as $obj)
                                                                <option value="{{ $obj->Id }}"
                                                                    {{ old('EntidadCertificadora') == $obj->Id ? 'selected' : '' }}>
                                                                    {{ $obj->Nombre }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <button type="button"
                                                            class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                                            <iconify-icon icon="ph:plus-fill" style="color: #0f172a;"
                                                                width="32"></iconify-icon>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="Nombre" class="form-label">Recomendación
                                                        contratista</label>
                                                    <textarea name="RecomendacionContratista" required class="form-control">{{ old('RecomendacionContratista') }}</textarea>
                                                </div>
                                            </div>
                                            <div style="text-align: right;">
                                                @if ($certificacion->Estado == 1)
                                                    <button type="submit" style="margin-right: 18px"
                                                        class="btn btn-dark">Agregar</button>
                                                @endif
                                            </div>
                                    </div>
                                    </form>
                                </div>

                            </div>

                        </div>




                    </div>

                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Detalle
                            </div>
                        </div>
                    </header>
                    <div>&nbsp; </div>
                    <div style=" margin-left:20px; margin-right:20px; ">
                        <span class=" col-span-8  hidden"></span>
                        <span class="  col-span-4 hidden"></span>
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden " style=" margin-bottom:20px ">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">Id</th>
                                            <th>Descripción</th>
                                            <th>Número</th>
                                            <th>Sector</th>
                                            <th>Fecha emisión</th>
                                            <th>Fecha vencimiento</th>
                                            <th>Estado</th>
                                            <th style="text-align: center">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($detalles->count() > 0)
                                            @php($i = 1)
                                            @foreach ($detalles as $obj)
                                                <tr>
                                                    <td align="center">{{ $i }}</td>
                                                    <td>{{ $obj->Descripcion }}</td>
                                                    <td>{{ $obj->Numero }}</td>
                                                    <td>{{ $obj->Sector }}</td>
                                                    @if ($obj->FechaEmision)
                                                        <td>{{ date('d/m/Y', strtotime($obj->FechaEmision)) }}</td>
                                                    @else
                                                        <td></td>
                                                    @endif

                                                    @if ($obj->FechaVencimiento)
                                                        <td>{{ date('d/m/Y', strtotime($obj->FechaVencimiento)) }}</td>
                                                    @else
                                                        <td></td>
                                                    @endif

                                                    @if ($obj->estado)
                                                        <td>{{ $obj->estado->Nombre }}</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    <td align="center">
                                                        @if ($certificacion->Estado == 1)
                                                            <a
                                                                href="{{ url('registro/proyecto') }}/{{ $obj->Id }}/edit">
                                                                <iconify-icon icon="mdi:pencil-box"
                                                                    style="color: #475569;" width="40"></iconify-icon>
                                                            </a>
                                                            &nbsp;&nbsp;
                                                            <iconify-icon data-bs-toggle="modal"
                                                                data-bs-target="#modal-delete-{{ $obj->Id }}"
                                                                icon="mdi:trash" style="color: #475569;"
                                                                width="40"></iconify-icon>
                                                        @else
                                                            <iconify-icon icon="mdi:pencil-box" style="color: #475569;"
                                                                width="40"></iconify-icon>
                                                            &nbsp;&nbsp;
                                                            <iconify-icon data-bs-toggle="modal" icon="mdi:trash"
                                                                style="color: #475569;" width="40"></iconify-icon>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @php($i++)
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


    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        aria-hidden="true" role="dialog" tabindex="-1" id="modal-send">

        <form method="POST" action="{{ url('registro/certificacion/send') }}">
            @csrf
            <div class="modal-dialog relative w-auto pointer-events-none">
                <div
                    class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
                              rounded-md outline-none text-current">
                    <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                            <h3 class="text-base font-medium text-white dark:text-white capitalize">
                                Enviar
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
                            <h6 class="text-base text-slate-900 dark:text-white leading-6">
                                Confirme si desea enviar a aprobación
                            </h6>
                            <input type="hidden" name="Certificacion" value="{{ $certificacion->Id }}">

                        </div>
                        <!-- Modal footer -->
                        <div class=" items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                            <button type="submit"
                                class="btn inline-flex justify-center text-white bg-black-500 float-right"
                                style="margin-bottom: 15px">Accept</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        aria-hidden="true" role="dialog" tabindex="-1" id="modal-asignar">

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
                                <select name="Administrador"  class="form-control" required>
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
                                style="margin-bottom: 15px">Accept</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

@endsection
