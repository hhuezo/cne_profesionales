@extends('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">
                                Certificación
                                @can('enviar certificacion')
                                    @if ($certificacion->Estado == 1 || $certificacion->Estado == 3)
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#modal-send"
                                            class="btn btn-dark btn-sm float-right">
                                            Enviar
                                        </button>
                                    @else
                                        <a href="{{ url('registro/certificacion') }}">
                                            <button class="btn btn-dark btn-sm float-right">
                                                <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                                                </iconify-icon>
                                            </button>
                                        </a>
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
                                                    <label for="Descipcion" class="form-label">Descripción</label>
                                                    <textarea class="form-control" name="Descripcion" readonly required>{{ $certificacion->Descripcion }}</textarea>
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="Alcance" class="form-label">Alcance</label>
                                                    <textarea class="form-control" readonly name="Alcance" required>{{ $certificacion->Alcance }}</textarea>
                                                </div>

                                                <div class="input-area">
                                                    <label for="Nombre" class="form-label">Entidad certificadora</label>
                                                    <select name="EntidadCertificadora" id="EntidadCertificadora" required
                                                         class="form-control !pr-12 select2">
                                                        @foreach ($entidades as $obj)
                                                            <option value="{{ $obj->Id }}"
                                                                {{ $certificacion->EntidadCertificadora == $obj->Id ? 'selected' : '' }}>
                                                                {{ $obj->Nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="input-area relative" id="div_otra_entidad">
                                                    <label for="Nombre" class="form-label">Otra entidad
                                                        certificadora</label>
                                                    <input type="text" name="OtraEntidad" id="OtraEntidad" required
                                                         value="{{ $certificacion->OtraEntidad }}" required
                                                        class="form-control">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="Numero" class="form-label">Número</label>
                                                    <input type="text" name="Numero"
                                                        value="{{ $certificacion->Numero }}" required class="form-control">
                                                </div>


                                                {{-- <div class="input-area">
                                                    <label for="Nombre" class="form-label">Tipo certificado</label>
                                                    <select name="TipoCertificado" required
                                                        class="form-control !pr-12 select2">
                                                        @foreach ($tipo_certificados as $obj)
                                                            <option value="{{ $obj->Id }}"
                                                                {{ $certificacion->TipoCertificado == $obj->Id ? 'selected' : '' }}>
                                                                {{ $obj->Descripcion }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div> --}}




                                                <div class="input-area relative">
                                                    <label for="Nombre" class="form-label">Fecha de vencimiento</label>
                                                    <input type="date" name="FechaVencimiento" min="{{ date('Y-m-d') }}"
                                                        value="{{ $certificacion->FechaVencimiento }}" required
                                                        class="form-control">
                                                </div>

                                                <div class="input-area">
                                                    <label for="Archivo" class="form-label">Archivo</label>
                                                    <div class="relative">
                                                        <input type="file" name="Archivo" class="form-control">
                                                        @if ($certificacion->DocumentoUrl)
                                                            <a href="{{ asset('docs') }}/{{ $certificacion->DocumentoUrl }}"
                                                                target="_blank">
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
                                                @if ($certificacion->Estado == 1 || $certificacion->Estado == 3)
                                                    <button type="submit"
                                                        class="btn inline-flex justify-center btn-dark">Guardar</button>
                                                @endif
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
                                style="margin-bottom: 15px">Aceptar</button>
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
                                <select name="Administrador" class="form-control" required>
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

    <script type="text/javascript">
        $(document).ready(function() {
            if (document.getElementById('EntidadCertificadora').value == 1) {
                //console.log("otra");
                $("#div_otra_entidad").css("display", "block");
                $("#OtraEntidad").attr("required", true);
            } else {
                $("#div_otra_entidad").css("display", "none");
                $("#OtraEntidad").attr("required", false);

                //console.log("no");
            }

            $("#EntidadCertificadora").change(function() {
                validar();
                $("#OtraEntidad").val("");
            });


        });

        function validar() {
            if (document.getElementById('EntidadCertificadora').value == 1) {
                //console.log("otra");
                $("#div_otra_entidad").css("display", "block");
                $("#OtraEntidad").attr("required", true);
            } else {
                $("#div_otra_entidad").css("display", "none");
                $("#OtraEntidad").attr("required", false);

                //console.log("no");
            }
            $("#OtraEntidad").val("");
        }
    </script>

@endsection
