<?php /*@extends('layouts.app')
@section('content')

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
*/
?>


<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Dashcode - HTML Template</title>
    <link rel="icon" type="image/png" href="assets/images/logo/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/rt-plugins.css">
    <link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
    <link rel="stylesheet" href="assets/css/app.css">
    <!-- START : Theme Config js-->
    <script src="assets/js/settings.js" sync></script>
    <!-- END : Theme Config js-->


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
                                class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                <div class="flex-1">
                                    <div class="card-title text-slate-900 dark:text-white">Registro</div>
                                </div>
                                <a href="{{ url('login') }}">
                                    <button class="btn btn-dark float-right">
                                        <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                                        </iconify-icon>
                                    </button>
                                </a>
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
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

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

                                        <select name="Nacionalidad" class="form-control select2">
                                            @foreach ($paises as $obj)
                                            <option value="{{$obj->Id}}"  {{$configuracion->Pais == $obj->Id ? 'selected':''}}  >{{$obj->Nombre}}</option>
                                            @endforeach
                                            
                                        </select>

                                        {{-- 
                                        @if ($configuracion->Pais == '130')
                                            <!-- 130 El Salvador 137 Panama-->
                                            <input type="text" name="Nacionalidad"
                                                value="{{ 'Salvadoreño(a)', old('Nacionalidad') }}" required
                                                class="form-control">
                                        @else
                                            <input type="text" name="Nacionalidad"
                                                value="{{ 'Panameño(a)', old('Nacionalidad') }}" required
                                                class="form-control">
                                        @endif--}}
                                    </div>

                                    <div class="input-area relative">
                                        @if ($configuracion->Pais == '130')
                                            <!-- 130 El Salvador 137 Panama-->
                                            <label for="Dui" class="form-label">DUI</label>
                                            <span id="codigoProvincia"></span>
                                            <input type="text" name="Dui" id="Dui"
                                                value="{{ old('Dui') }}" required class="form-control">
                                        @else
                                            <label for="Dui" class="form-label">CIP</label>
                                            <span id="codigoProvincia"></span>
                                            <input type="text" name="Dui" id="Dui"
                                                value="{{ old('Dui') }}" required class="form-control">
                                        @endif


                                    </div>


                                    <div class="input-area">
                                        <label for="Profesion" class="form-label">Profesión u oficio</label>
                                        <input type="text" name="Profesion" value="{{ old('Profesion') }}" required
                                            class="form-control">
                                    </div>

                                    <div class="input-area relative">
                                        @if ($configuracion->Pais == '130')
                                            <!-- 130 El Salvador 137 Panama-->
                                            <label for="Departamento" class="form-label">Departamento</label>
                                        @else
                                            <label for="Departamento" class="form-label">Provincia - Comarca</label>
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
                                        @if ($configuracion->Pais == '130')
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
                                        @if ($configuracion->Pais == '130')
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
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/rt-plugins.js"></script>
    <script src="assets/js/app.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>

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


                if (document.getElementById('codigoPais').value == '130') {
                    $("#Dui").inputmask("99999999-9");
                    $("#Telefono").inputmask("9999-9999");
                } else {

                    $("#Dui").inputmask(codigoProvincia + "9-999-9999");
                    // if (Departamento == 26 || Departamento == 25 || Departamento == 28 || Departamento == 23){
                    //     //Codigo de provincia de panama de dos digitos
                    //     $("#Dui").inputmask("12-999-9999");
                    // }else{
                    //     //Codigo de provincia de panama de un digito
                    //     $("#Dui").inputmask("8-999-9999");
                    // }
                }
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

            //130 El Salvador, 137 Panama
            if (document.getElementById('codigoPais').value == '130') {
                //$("#Dui").inputmask("99999999-9");
                $("#Telefono").inputmask("9999-9999");
            } else {
                //$("#Dui").inputmask("999-9999");
                $("#Telefono").inputmask("9999-9999");
            }






        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
</body>

</html>
