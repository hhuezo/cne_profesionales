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

                                        <form method="POST" action="{{ url('configuracion/alcance') }}">
                                            @csrf

                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                <div class="input-area relative">
                                                    <input type="hidden" name="Id" value="{{$configuracion->Id}}">
                                                    <label for="Descipcion" class="form-label">Descripción</label>
                                                    <textarea class="form-control" name="Descripcion" required>{{ $configuracion->Descripcion }}</textarea>
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="Alcance" class="form-label">Alcance</label>
                                                    <textarea class="form-control" name="Alcance" required>{{ $configuracion->Alcance }}</textarea>
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
