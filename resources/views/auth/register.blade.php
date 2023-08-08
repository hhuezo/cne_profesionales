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
                                        <input type="text" name="name" value="{{old('name')}}" required class="form-control">
                                    </div>
                                    <div class="input-area relative">
                                        <label for="Apellido" class="form-label">Apellido</label>
                                        <input type="text" name="last_name" value="{{old('last_name')}}" required class="form-control">
                                    </div>
                                    <div class="input-area relative">
                                        <label for="Email" class="form-label">Email</label>
                                        <input type="email" name="email" value="{{old('email')}}" required class="form-control">
                                    </div>
                                    <div class="input-area relative">
                                        <label for="largeInput" class="form-label">Password</label>
                                        <input type="password" name="password" value="{{old('password')}}" required class="form-control">
                                    </div>


                                    <div class="input-area relative">
                                        <label for="Nacionalidad" class="form-label">Nacionalidad</label>
                                        <input type="text" name="Nacionalidad" value="{{old('Nacionalidad')}}" required class="form-control">
                                        {{-- <select name="Nacionalidad" id="Nacionalidad" class="form-control">
                                            <option value="Salvadoreño" class="dark:bg-slate-700">Salvadoreño</option>
                                            <option value="Panameño" class="dark:bg-slate-700">Panameño</option>
                                            <option value="Nacionalidad 3" class="dark:bg-slate-700">Nacionalidad 3
                                            </option>
                                            <option value="Nacionalidad 4" class="dark:bg-slate-700">Nacionalidad 4
                                            </option>
                                        </select> --}}
                                    </div>

                                    <div class="input-area relative">
                                        <label for="Dui" class="form-label">DUI</label>
                                        <input type="text" name="Dui" value="{{old('Dui')}}" required class="form-control">
                                    </div>

                                    <div class="input-area relative">
                                        <label for="Pais" class="form-label">Pais</label>
                                        <select name="Pais" id="Pais" class="form-control">
                                            @foreach ($paises as $obj)
                                                <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                    {{ old('Pais') == $obj->Id ? 'selected' : '' }}>{{ $obj->Nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>



                                    {{--
                                    <div class="input-area relative">
                                        <label for="Dui" class="form-label">Adjuntar DUI</label>
                                        <input type="file" name="DuiURL" class="form-control">
                                    </div> --}}




                                    <div class="input-area">
                                        <label for="Profesion" class="form-label">Profesión u oficio</label>
                                        <input type="text" name="Profesion" value="{{old('Profesion')}}" required class="form-control">
                                    </div>

                                    <div class="input-area relative">
                                        <label for="Departamento" class="form-label">Departamento</label>
                                        <select name="Departamento" id="Departamento" class="form-control">
                                            @foreach ($departamentos as $obj)
                                                <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                    {{ old('Departamento') == $obj->Id ? 'selected' : '' }}>
                                                    {{ $obj->Nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="input-area relative">
                                        <label for="Direccion" class="form-label">Dirección</label>
                                        <input type="text" name="Direccion" value="{{old('Direccion')}}" class="form-control">
                                    </div>


                                    <div class="input-area relative">
                                        <label for="Municipio" class="form-label">Municipio</label>
                                        <select name="Municipio" id="Municipio" class="form-control">
                                            @foreach ($municipios as $obj)
                                                <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                    {{ old('Municipio') == $obj->Id ? 'selected' : '' }}>
                                                    {{ $obj->Nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="input-area relative">
                                        <label for="Telefono" class="form-label">Telefono</label>
                                        <input type="tel" name="Telefono" value="{{old('Telefono')}}" class="form-control">
                                    </div>
                                    {{-- <div class="input-area relative">
                                        <label for="Dui" class="form-label">Adjuntar titulo</label>
                                        <input type="file" name="DuiURL" class="form-control">
                                    </div> --}}

                                    <div class="input-area relative">
                                        <label for="Municipio" class="form-label">Distrito</label>
                                        <select name="Distrito" id="Distrito" required class="form-control">
                                            @foreach ($distritos as $obj)
                                                <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                    {{ old('Distrito') == $obj->Id ? 'selected' : '' }}>
                                                    {{ $obj->Nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>




                                    {{--  <div class="input-area relative">
                                        <label for="EntidadCertificadora" class="form-label">Entidad
                                            Certificadora</label>
                                        <select name="EntidadCertificadora" id="EntidadCertificadora"
                                            class="form-control">
                                            @foreach ($entidades as $obj)
                                                <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                    {{ old('EntidadCertificadora') == $obj->Id ? 'selected' : '' }}>
                                                    {{ $obj->Nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                     <div class="input-area relative">
                                        <label for="TipoCertificado" class="form-label">Tipo Certificado</label>
                                        <select name="TipoCertificado" id="TipoCertificado" class="form-control">
                                            @foreach ($tipos_certificados as $obj)
                                                <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                    {{ old('TipoCertificado') == $obj->Id ? 'selected' : '' }}>
                                                    {{ $obj->Descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                   <div class="input-area relative">
                                        <label for="NumeroCertificacion" class="form-label">Numero de
                                            Certificación</label>
                                        <input type="text" name="NumeroCertificacion" id="NumeroCertificacion"
                                            class="form-control">
                                    </div>
                                    <div class="input-area relative">
                                        <label for="VigenciaCertificacion" class="form-label">Vigencia de la
                                            Certificación</label>
                                        <input type="date" name="VigenciaCertificacion" id="VigenciaCertificacion"
                                            class="form-control">
                                    </div> --}}


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

    <script type="text/javascript">
        $(document).ready(function() {

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

        });
    </script>
</body>

</html>
