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

                                <button class="btn btn-dark btn-sm float-right">
                                    Enviar 
                                </button>

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
                                            action="{{ route('certificacion.update', $certificacion->Id) }}">
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
                                                    <textarea class="form-control" name="TipoTecnologia"></textarea>
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="Numero" class="form-label">Número</label>
                                                    <input type="text" name="Numero" class="form-control">
                                                </div>


                                                <div class="input-area relative">
                                                    <label for="Sector" class="form-label">Sector</label>
                                                    <input type="text" name="Sector" class="form-control">
                                                </div>



                                                <div class="input-area relative">
                                                    <label for="FechaEmision" class="form-label">Fecha de
                                                        emisión</label>
                                                    <input type="date" name="FechaEmision" class="form-control">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="Nombre" class="form-label">Fecha de
                                                        vencimiento</label>
                                                    <input type="date" name="FechaVencimiento" class="form-control">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="Nombre" class="form-label">Documento</label>
                                                    <input type="file" name="Archivo" class="form-control">
                                                </div>



                                                <div class="input-area">
                                                    <label for="Nombre" class="form-label">Entidad
                                                        certificadora</label>
                                                    <div class="relative">
                                                        <select name="EntidadCertificadora"
                                                            class="form-control !pr-12 select2">
                                                            @foreach ($entidades as $obj)
                                                                <option value="{{ $obj->Id }}">{{ $obj->Nombre }}
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
                                                    <textarea class="form-control" name="RecomendacionContratista"></textarea>
                                                </div>
                                            </div>
                                            <div style="text-align: right;">
                                                <button type="submit" style="margin-right: 18px"
                                                    class="btn btn-dark">Aceptar</button>
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
                                            <th>Alcance</th>
                                            <th style="text-align: center">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($detalles->count() > 0)
                                            @foreach ($detalles as $obj)
                                                <tr>
                                                    <td align="center">{{ $obj->Id }}</td>
                                                    <td>{{ $obj->Descripcion }}</td>
                                                    <td>{{ $obj->Alcance }}</td>
                                                    <td align="center">
                                                        <a href="{{ url('registro/proyecto') }}/{{ $obj->Id }}/edit">
                                                            <iconify-icon icon="mdi:pencil-box" style="color: #475569;"
                                                                width="40"></iconify-icon>
                                                        </a>
                                                        &nbsp;&nbsp;
                                                        <iconify-icon data-bs-toggle="modal"
                                                            data-bs-target="#modal-delete-{{ $obj->Id }}"
                                                            icon="mdi:trash" style="color: #475569;"
                                                            width="40"></iconify-icon>
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


@endsection
