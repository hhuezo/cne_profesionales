
@extends('template')

@section('contenido')


<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Dashcode - HTML Template</title>
    <link rel="icon" type="image/png" href="{{ asset('img/el_salvador.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/rt-plugins.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <!-- START : Theme Config js-->
    <script src="{{ asset('assets/js/settings.js') }}" sync></script>
    <!-- END : Theme Config js-->

    <style>
        .card-title,
        .form-label {
            text-transform: none;
        }

        .form-label, .card-title{
            text-align: left;
        }
    </style>
</head>

<body class=" font-inter skin-default">

    <div class="page-content">
        <div class="transition-all duration-150 container-fluid" id="page_layout">
            <div id="content_layout">

                <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
                    <!-- Basic Inputs -->
                    <div class="card">
                        <div class="card-body flex flex-col p-6">
                            <header
                                class="flex items-center border-b border-slate-100 dark:border-slate-700">
                                <div class="flex-1">
                                    <div class="card-title text-slate-900 dark:text-white">Registro</div>
                                </div>
                                {{-- <a href="{{ url('/') }}">
                                    <button class="btn btn-dark float-right">
                                        <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                                        </iconify-icon>
                                    </button>
                                </a> --}}
                            </header>

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
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <br>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                    <div class="input-area relative">
                                        <label for="Nombre" class="form-label">Nombre</label>
                                        <input type="text" name="name" value="{{ old('name') }}" required
                                            class="form-control">
                                    </div>
                                    <div class="input-area relative">
                                        <label for="Apellido" class="form-label">Apellido</label>
                                        <input type="text" name="last_name" value="{{ old('last_name') }}" required
                                            class="form-control">
                                    </div>
                                    <div class="input-area relative">
                                        <label for="Email" class="form-label">Email</label>
                                        <input type="email" name="email" value="{{ old('email') }}" required
                                            class="form-control">
                                    </div>
                                    <div class="input-area relative">
                                        <label for="largeInput" class="form-label">Password</label>
                                        <input type="password" name="password" value="{{ old('password') }}" required
                                            class="form-control">
                                    </div>


                                    <div class="input-area relative">
                                        <label for="Nacionalidad" class="form-label">Pais de origen</label>

                                        <select name="Nacionalidad" class="select2 form-control w-full mt-2 py-2">
                                            @foreach ($paises as $obj)
                                                <option value="{{ $obj->Id }}"
                                                    {{ $pais == $obj->Id ? 'selected' : '' }}>
                                                    {{ $obj->Nombre }}</option>
                                            @endforeach

                                        </select>

                                    </div>






                                    <div class="input-area relative">
                                        @if ($pais == '130')
                                            <!-- 130 El Salvador 137 Panama-->
                                            <label for="Departamento" class="form-label">Departamento</label>
                                        @else
                                            <label for="Departamento" class="form-label">Provincia -
                                                Comarca</label>
                                        @endif

                                        <select name="Departamento" id="Departamento" class="form-control">
                                            <option value="0">Seleccione</option>
                                            @foreach ($departamento_provincia as $obj)
                                                <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                    {{ old('Departamento') == $obj->Id ? 'selected' : '' }}>
                                                    {{ $obj->Nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="input-area relative">
                                        <label for="Direccion" class="form-label">Dirección</label>
                                        <input type="text" name="Direccion" value="{{ old('Direccion') }}"
                                            class="form-control">
                                    </div>


                                    <div class="input-area relative">
                                        @if ($pais == '130')
                                            <!-- 130 El Salvador 137 Panama-->
                                            <label for="Municipio" class="form-label">Municipio</label>
                                        @else
                                            <label for="Municipio" class="form-label">Distrito</label>
                                        @endif
                                        <select name="Municipio" id="Municipio" class="form-control">
                                            <option value="0">Seleccione</option>
                                            @foreach ($municipio_distrito as $obj)
                                                <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                    {{ old('Municipio') == $obj->Id ? 'selected' : '' }}>
                                                    {{ $obj->Nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="input-area relative">
                                        <label for="Telefono" class="form-label">Telefono</label>
                                        <input type="tel" name="Telefono" id="Telefono"
                                            value="{{ old('Telefono') }}" class="form-control">
                                    </div>

                                    <div class="input-area relative">
                                        @if ($pais == '130')
                                            <!-- 130 El Salvador 137 Panama-->
                                            <label for="Distrito" class="form-label">Distrito</label>
                                        @else
                                            <label for="Distrito" class="form-label">Corregimiento</label>
                                        @endif

                                        <select name="Distrito" id="Distrito" required class="form-control">
                                            <option value="0">Seleccione</option>
                                            @foreach ($distrito_corregimiento as $obj)
                                                <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                    {{ old('Distrito') == $obj->Id ? 'selected' : '' }}>
                                                    {{ $obj->Nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="input-area">
                                        <label for="Profesion" class="form-label">Profesión u oficio</label>
                                        <select class="form-control" name="Profesion" id="Profesion">
                                            <option value="0">Seleccione</option>
                                            @foreach ($profesiones as $obj)
                                                <option value="{{ $obj->Id }}">{{ $obj->Nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="input-area relative" id="otra_profesion" style="display: none">
                                        <label for="Telefono" class="form-label">Otra profesión</label>
                                        <input type="text" name="OtraProfesion" id="OtraProfesion"
                                            value="{{ old('OtraProfesion') }}" class="form-control">
                                    </div>


                                    <div class="input-area">
                                        <label for="Profesion" class="form-label">Lugar de formación en eficiencia energética</label>
                                        <select class="form-control" name="LugarFormacion" id="LugarFormacion">
                                            <option value="0">Seleccione</option>
                                            @foreach ($lugares_formacion as $obj)
                                                <option value="{{ $obj->Id }}">{{ $obj->Nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="input-area relative" id="otro_lugar_formacion" style="display: none">
                                        <label for="Telefono" class="form-label">Otra lugar de formación</label>
                                        <input type="text" name="OtroLugarFormacion" id="OtroLugarFormacion"
                                            value="{{ old('OtroLugarFormacion') }}" class="form-control">
                                    </div>

                                    <div class="input-area relative" id="FotoUrl">
                                        <label for="Telefono" class="form-label">Adjuntar foto</label>
                                        <input type="file" name="FotoUrl" required class="form-control">
                                    </div>


                                </div>
                                <br>
                                <div style="text-align: right;">
                                    <button type="submit"
                                        class="btn inline-flex justify-center btn-dark">Registrar</button>
                                </div>


                            </form>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>





    <!-- scripts -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('assets/js/rt-plugins.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {

            $("#Departamento").change(function() {
                // var para la Departamento
                const Departamento = $(this).val();
                const DepartamentoText = $("#Departamento option:selected").text();

                const myArray = DepartamentoText.split("-");
                const codigoProvincia = myArray[0].trim();


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


        });

        $("#Profesion").change(function() {
            if ($(this).val() == 1) {
                $("#otra_profesion").css("display", "block");
                $("#OtraProfesion").attr("required", true);
            } else {
                $("#otra_profesion").css("display", "none");
                $("#OtraProfesion").attr("required", false);
            }
            $("#OtraProfesion").val("");
        });

        $("#LugarFormacion").change(function() {
            if ($(this).val() == 1) {
                $("#otro_lugar_formacion").css("display", "block");
                $("#OtroLugarFormacion").attr("required", true);
            } else {
                $("#otro_lugar_formacion").css("display", "none");
                $("#OtroLugarFormacion").attr("required", false);
            }
            $("#OtroLugarFormacion").val("");
        });
    </script>

</body>

</html>
@endsection
