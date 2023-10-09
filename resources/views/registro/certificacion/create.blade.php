@extends('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Certificación

                                <a href="{{ url('registro/certificacion') }}">
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

                                        <form method="POST" action="{{ url('registro/certificacion') }}"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                <div class="input-area relative">
                                                    <label for="Descipcion" class="form-label">Descripción</label>
                                                    <textarea class="form-control" name="Descripcion" required autofocus >{{ old('Descripcion') }}</textarea>
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="Alcance" class="form-label">Alcance</label>
                                                    <textarea class="form-control" readonly name="Alcance" required>{{ $alcance->Alcance }}</textarea>
                                                </div>

                                                <div class="input-area">
                                                    <label for="Nombre" class="form-label">Entidad certificadora</label>
                                                    <select name="EntidadCertificadora" id="EntidadCertificadora" required disabled
                                                        class="form-control !pr-12 select2">                                                        
                                                        @foreach ($entidades as $obj)
                                                            <option value="{{ $obj->Id }}"
                                                                {{ old('EntidadCertificadora') == $obj->Id ? 'selected' : '' }}>
                                                                {{ $obj->Nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="input-area relative" id="otra_entidad">
                                                    <label for="Nombre" class="form-label">Otra entidad
                                                        certificadora</label>
                                                    <input type="text" name="OtraEntidad" readonly id="OtraEntidad" required value="Organismo Salvadoreño de Normalización (OSN) "
                                                        required class="form-control">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="Numero" class="form-label">Número</label>
                                                    <input type="text" name="Numero" value="{{ old('Numero') }}"
                                                        required class="form-control">
                                                </div>


                                                {{-- <div class="input-area">
                                                    <label for="Nombre" class="form-label">Tipo certificado</label>
                                                    <select name="TipoCertificado" required
                                                        class="form-control !pr-12 select2">
                                                        @foreach ($tipo_certificados as $obj)
                                                            <option value="{{ $obj->Id }}"
                                                                {{ old('TipoCertificado') == $obj->Id ? 'selected' : '' }}>
                                                                {{ $obj->Descripcion }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div> --}}


                                            

                                               

                                                <div class="input-area relative">
                                                    <label for="Nombre" class="form-label">Fecha de vencimiento</label>
                                                    <input type="date" name="FechaVencimiento" min="{{ date('Y-m-d') }}"
                                                        value="{{ old('FechaVencimiento') }}" required
                                                        class="form-control">
                                                </div>



                                            </div>
                                            <br>
                                            <div style="text-align: right;">
                                                <button type="submit"
                                                    class="btn inline-flex justify-center btn-dark">Guardar</button>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $("#EntidadCertificadora").change(function() {               
                if($(this).val() == 1)
                {
                    $("#otra_entidad").css("display", "block");
                    $("#OtraEntidad").attr("required", true);
                }
                else{
                    $("#otra_entidad").css("display", "none");
                    $("#OtraEntidad").attr("required", false);
                }
                $("#OtraEntidad").val("");
            });
        });
    </script>

@endsection
