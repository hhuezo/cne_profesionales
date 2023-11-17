@extends ('menu')
@section('contenido')

    <style>
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
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
                                    <div class="card-title text-slate-900 dark:text-white">Perfil</div>
                                </div>

                            </header>
                            <form method="POST" action="{{ route('perfil.update', $perfil->Id) }}"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

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
                                            <label for="Dui" class="form-label">Adjuntar foto</label>
                                            <div class="relative">
                                                <input type="file" name="FotoUrl" class="form-control !pr-12">
                                                <a href="{{ url('docs') }}/{{ $perfil->FotoUrl }}" target="_blank">
                                                    <button type="button"
                                                        class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                                        <iconify-icon icon="heroicons-solid:eye"></iconify-icon>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="input-area relative">
                                            <label for="Dui" class="form-label">Adjuntar foto</label>
                                            <input type="file" name="FotoUrl" value="{{ $perfil->FotoUrl }}"
                                                class="form-control">
                                        </div>
                                    @endif



                                </div>
                                <br>
                                <div style="text-align: right;">
                                    <button type="submit"
                                        class="btn inline-flex justify-center btn-dark">Guardar</button>
                                </div>


                            </form>
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




    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        aria-hidden="true" role="dialog" tabindex="-1" id="modal-documento">

        <form method="POST" action="{{ url('seguridad/perfil/documento') }}" enctype="multipart/form-data">
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
                    </div>
                </div>
            </div>
        </form>

    </div>








    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable({
                "paging": false, // Desactivar paginación
                "lengthChange": false, // Desactivar el control de entradas por página
                "ordering": false,
                "searching": false,
                stateSave: true,
                "bDestroy": true
            });
        });

        //combo para Departamento
        $("#Departamento").change(function() {
            var Departamento = $(this).val();
            $.get("{{ url('seguridad/perfil/get_municipio') }}" + '/' + Departamento, function(data) {
                //console.log(data);
                var _select = '<option value="">Seleccione</option>'
                for (var i = 0; i < data.length; i++)
                    _select += '<option value="' + data[i].Id + '"  >' + data[i].Nombre +
                    '</option>';

                $("#Municipio").html(_select);
            });
        });

        //combo para municipios
        $("#Municipio").change(function() {
            var Municipio = $(this).val();
            $.get("{{ url('seguridad/perfil/get_distrito') }}" + '/' + Municipio, function(data) {
                //console.log(data);
                var _select = '<option value="">Seleccione</option>'
                for (var i = 0; i < data.length; i++)
                    _select += '<option value="' + data[i].Id + '"  >' + data[i].Nombre +
                    '</option>';

                $("#Distrito").html(_select);
            });
        });
    </script>
@endsection
