@extends('menu')
@section('contenido')
    @php
        //dd(auth()->user()->name,session('perfil')->Dui,auth()->user(),session('perfil'));
    @endphp
    @if (isset(session('perfil')->NivelVerificacion))
        @if (session('perfil')->NivelVerificacion == 0)
            <div class="card ">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Verificación de perfil pendiente</div>
                        </div>
                    </header>
                    <div class="card-text h-full">
                        <p style="text-align: justify" class="text-sm font-Inter text-slate-600 dark:text-slate-300">
                            Queremos informarte que es necesario que verifiques tu perfil para poder continuar con el proceso. Pronto recibirás un correo de verificación en tu bandeja de entrada.
                        </p>
                        <br>
                        <p style="text-align: justify" class="text-sm font-Inter text-slate-600 dark:text-slate-300">
                            Es importante que estés pendiente de tu correo electrónico, ya que nos comunicaremos contigo a
                            través de esa vía para notificarte sobre el estado de tu perfil y cualquier otra información
                            relevante. Te recomendamos revisar tu bandeja de entrada, así como la carpeta de spam o correo
                            no deseado en caso de que nuestra comunicación se haya filtrado allí.
                        </p>
                        <br>

                        <p style="text-align: justify" class="text-sm font-Inter text-slate-600 dark:text-slate-300">
                            Agradecemos tu comprensión y paciencia durante este proceso. Si tienes alguna pregunta o
                            necesitas asistencia adicional, no dudes en contactarnos.
                        </p>
                    </div>
                </div>
            @elseif (session('perfil')->NivelVerificacion == 1)
                <div class="card">
                    <header class=" card-header noborder">
                        <h4 class="card-title">Actualizar Datos
                        </h4>
                    </header>
                    <div class="card-body px-6 pb-6">
                        <div class="overflow-x-auto -mx-8 dashcode-data-table">
                            <span class=" col-span-8  hidden"></span>
                            <span class="  col-span-4 hidden"></span>
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden ">
                                    <form method="post" action="{{ route('usuarios.update', auth()->user()->id) }}">
                                        @method('PUT')
                                        @csrf

                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                            <div class="input-area relative">
                                                <label for="Nombre" class="form-label">Nombre</label>
                                                <input type="text" name="Nombre" id="Nombre"
                                                    value="{{ $usuario->name }}" class="form-control">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="Apellido" class="form-label">Apellido</label>
                                                <input type="text" name="Apellido" id="Apellido"
                                                    value="{{ $usuario->last_name }}" class="form-control">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="Email" class="form-label">Email</label>
                                                <input type="email" name="Email" id="Email"
                                                    value="{{ $usuario->email }}" class="form-control">
                                            </div>
                                            {{-- <div class="input-area relative">
                                                <label for="Dui" class="form-label">Dui</label>
                                                <input type="text" name="Dui" value="{{ $usuario->perfil->Dui }}"
                                                    class="form-control">
                                            </div> --}}

                                            <div class="input-area relative">
                                                <label for="Nacionalidad" class="form-label">Pais de origen</label>

                                                <select name="Nacionalidad" class="form-control select2">
                                                    @foreach ($paises as $obj)
                                                        <option value="{{ $obj->Id }}"
                                                            {{ $usuario->perfil->Nacionalidad == $obj->Id ? 'selected' : '' }}>
                                                            {{ $obj->Nombre }}</option>
                                                    @endforeach

                                                </select>

                                            </div>

                                            <div class="input-area">
                                                <label for="Profesion" class="form-label">Profesión u oficio</label>
                                                <select class="form-control" name="Profesion" id="Profesion">
                                                    <option value="0">Seleccione</option>
                                                    @foreach ($profesiones as $obj)
                                                        <option value="{{ $obj->Id }}"  {{ $usuario->perfil->Profesion == $obj->Id ? 'selected' : '' }}>{{ $obj->Nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="input-area relative" id="otra_profesion" style="display: none">
                                                <label for="Telefono" class="form-label">Otra profesión</label>
                                                <input type="text" name="OtraProfesion" id="OtraProfesion"
                                                    value="{{ $usuario->perfil->OtraProfesion }}" class="form-control">
                                            </div>
{{--
                                            <div class="input-area relative">
                                                <label for="Pais" class="form-label">Pais</label>
                                                <input type="text" value="{{$pais->Nombre}}" class="form-control" disabled>
                                            </div> --}}
                                            <div class="input-area relative">
                                                <label for="Direccion" class="form-label">Dirección</label>
                                                <input type="text" name="Direccion" id="Direccion"
                                                    value="{{ $usuario->perfil->Direccion }}" class="form-control">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="Departamento" class="form-label">Departamento</label>

                                                <select name="Departamento" id="Departamento" class="form-control">
                                                    @foreach ($departamentos_provincia as $obj)
                                                        @if ($usuario->perfil->distrito_corregimiento->municipio_distrito->DepartamentoProvincia == $obj->Id)
                                                            <option class="dark:bg-slate-700" value="{{ $obj->Id }}"
                                                                selected>{{ $obj->Nombre }}</option>
                                                        @else
                                                            <option class="dark:bg-slate-700" value="{{ $obj->Id }}">
                                                                {{ $obj->Nombre }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-area relative">
                                                <label for="Telefono" class="form-label">Telefono</label>
                                                <input type="tel" name="Telefono" id="Telefono"
                                                    value="{{ $usuario->perfil->Telefono }}" class="form-control">
                                            </div>

                                            <div class="input-area relative">
                                                <label for="Municipio" class="form-label">Municipio</label>
                                                <select name="Municipio" id="Municipio" class="form-control">

                                                    @foreach ($municipios_distritos as $obj)
                                                        @if ($usuario->perfil->distrito_corregimiento->MunicipioDistrito == $obj->Id)
                                                            <option class="dark:bg-slate-700" value="{{ $obj->Id }}"
                                                                selected>{{ $obj->Nombre }}</option>
                                                        @else
                                                            <option class="dark:bg-slate-700"
                                                                value="{{ $obj->Id }}">
                                                                {{ $obj->Nombre }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="input-area relative">
                                                <label for="Municipio" class="form-label">Distrito</label>
                                                <select name="Distrito" id="Distrito" class="form-control">

                                                    @foreach ($distritos_corregimientos as $obj)
                                                    @if ($usuario->perfil->DistritoCorregimiento == $obj->Id)
                                                            <option class="dark:bg-slate-700" value="{{ $obj->Id }}"
                                                                selected>{{ $obj->Nombre }}</option>
                                                        @else
                                                            <option class="dark:bg-slate-700"
                                                                value="{{ $obj->Id }}">
                                                                {{ $obj->Nombre }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>




                                        </div>
                                        <br>
                                        <div style="text-align: right;">
                                            <button type="submit"
                                                class="btn inline-flex justify-center btn-dark">Actualizar</button>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endif
    @endif


    <!-- scripts -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            validar();
            $("#Departamento").change(function() {
                // var para la Departamento
                var Departamento = $(this).val();

                //funcionpara las municipios
                $.get("{{ url('seguridad/perfil/get_municipio') }}" + '/' + Departamento, function(data) {
                    //esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
                    console.log(data);
                    var _select = '<option value="">Seleccione</option>'
                    for (var i = 0; i < data.length; i++)
                        _select += '<option value="' + data[i].Id + '">' + data[i].Nombre +
                        '</option>';

                    $("#Municipio").html(_select);

                });


            });


            //combo para municipios
            $("#Municipio").change(function() {
                var Municipio = $(this).val();
                $.get("{{ url('seguridad/perfil/get_distrito') }}" + '/' + Municipio, function(data) {
                    //console.log(data);
                    var _select = ''
                    for (var i = 0; i < data.length; i++)
                        _select += '<option value="' + data[i].Id + '"  >' + data[i].Nombre +
                        '</option>';

                    $("#Distrito").html(_select);
                });
            });

            $("#Profesion").change(function() {
                validar();
            });

        });

        function validar (){
            if ($("#Profesion").val() == 1) {
                $("#otra_profesion").css("display", "block");
                $("#OtraProfesion").attr("required", true);
            } else {
                $("#otra_profesion").css("display", "none");
                $("#OtraProfesion").attr("required", false);
            }
        };
    </script>
@endsection
