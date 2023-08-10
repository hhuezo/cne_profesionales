@extends ('menu')
@section('contenido')
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
                                        <input type="text" name="name" value="{{ $perfil->usuario->name }}"
                                            class="form-control">
                                    </div>
                                    <div class="input-area relative">
                                        <label for="Apellido" class="form-label">Apellido</label>
                                        <input type="text" name="last_name" value="{{ $perfil->usuario->last_name }}"
                                            class="form-control">
                                    </div>

                                    <div class="input-area relative">
                                        <label for="Dui" class="form-label">DUI</label>
                                        <input type="text" name="Dui" value="{{ $perfil->Dui }}"
                                            class="form-control">
                                    </div>
                                    @if ($perfil->DuiURL)
                                        <div class="input-area">
                                            <label for="Dui" class="form-label">Adjuntar DUI</label>
                                            <div class="relative">
                                                <input type="file" name="DuiURL" class="form-control !pr-12">
                                                <a href="{{ url('docs') }}/{{ $perfil->DuiURL }}" target="_blank">
                                                    <button type="button"
                                                        class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                                        <iconify-icon icon="heroicons-solid:eye"></iconify-icon>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="input-area relative">
                                            <label for="Dui" class="form-label">Adjuntar DUI</label>
                                            <input type="file" name="DuiURL" value="{{ $perfil->DuiURL }}"
                                                class="form-control">
                                        </div>
                                    @endif


                                    <div class="input-area">
                                        <label for="Profesion" class="form-label">Profesión u oficio</label>
                                        <input type="text" class="form-control" value="{{ $perfil->Profesion }}"
                                            name="Profesion">
                                    </div>



                                    @if ($perfil->TituloURL)
                                        <div class="input-area">
                                            <label for="Dui" class="form-label">Adjuntar DUI</label>
                                            <div class="relative">
                                                <input type="file" name="TituloURL" class="form-control !pr-12">
                                                <a href="{{ url('docs') }}/{{ $perfil->TituloURL }}" target="_blank">
                                                    <button type="button"
                                                        class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                                        <iconify-icon icon="heroicons-solid:eye"></iconify-icon>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="input-area relative">
                                            <label for="Dui" class="form-label">Adjuntar titulo</label>
                                            <input type="file" name="TituloURL" value="{{ $perfil->TituloURL }}"
                                                class="form-control">
                                        </div>
                                    @endif


                                    <div class="input-area relative">
                                        <label for="Nacionalidad" class="form-label">Nacionalidad</label>
                                        <input type="text" name="Nacionalidad" value="{{ $perfil->Nacionalidad }}"
                                            class="form-control">
                                    </div>
                                    <div class="input-area relative">
                                        <label for="Direccion" class="form-label">Dirección</label>
                                        <input type="text" name="Direccion" value="{{ $perfil->Direccion }}"
                                            class="form-control">
                                    </div>
                                    <div class="input-area relative">
                                        <label for="Pais" class="form-label">Pais</label>
                                        <select name="Pais" class="form-control">
                                            @foreach ($paises as $obj)
                                                <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                    {{ old('Pais') == $obj->Id ? 'selected' : '' }}>{{ $obj->Nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-area relative">
                                        <label for="Telefono" class="form-label">Telefono</label>
                                        <input type="tel" name="Telefono" value="{{ $perfil->Telefono }}"
                                            class="form-control">
                                    </div>
                                    <div class="input-area relative">
                                        <label for="Departamento" class="form-label">Departamento</label>
                                        <select name="Departamento" id="Departamento" class="form-control">
                                            @if ($perfil->municipio)
                                                @foreach ($departamentos as $obj)
                                                    <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                        {{ $perfil->municipio->Departamento == $obj->Id ? 'selected' : '' }}>
                                                        {{ $obj->Nombre }}</option>
                                                @endforeach
                                            @else
                                                @foreach ($departamentos as $obj)
                                                    <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                        {{ old('Departamento') == $obj->Id ? 'selected' : '' }}>
                                                        {{ $obj->Nombre }}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                
                                    <div class="input-area relative">
                                        <label for="Municipio" class="form-label">Municipio</label>
                                        <select name="Municipio" id="Municipio" class="form-control">
                                            @if ($perfil->municipio)
                                                @foreach ($municipios as $obj)
                                                    <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                        {{ $perfil->Municipio == $obj->Id ? 'selected' : '' }}>
                                                        {{ $obj->Nombre }}</option>
                                                @endforeach
                                            @else
                                                @foreach ($municipios as $obj)
                                                    <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                        {{ old('Municipio') == $obj->Id ? 'selected' : '' }}>
                                                        {{ $obj->Nombre }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                  

                                    <div class="input-area relative">
                                        <label for="Municipio" class="form-label">Distrito</label>
                                        <select name="Distrito" id="Distrito" required class="form-control">
                                            @if ($perfil->distrito)
                                                @foreach ($distritos as $obj)
                                                    <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                        {{ $perfil->Distrito == $obj->Id ? 'selected' : '' }}>
                                                        {{ $obj->Nombre }}</option>
                                                @endforeach
                                            @else
                                                @foreach ($municipios as $obj)
                                                    <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                        {{ old('Distrito') == $obj->Id ? 'selected' : '' }}>
                                                        {{ $obj->Nombre }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>



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
    </div>
    <script type="text/javascript">
        $(document).ready(function() { //alert('');
        });

        //combo para Departamento
        $("#Departamento").change(function() {
            var Departamento = $(this).val();
            $.get("{{ url('seguridad/perfil/get_municipio') }}" + '/' + Departamento, function(data) {
                //console.log(data);
                var _select = '<option value="1">Seleccione</option>'
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
                var _select = '<option value="1">Seleccione</option>'
                for (var i = 0; i < data.length; i++)
                    _select += '<option value="' + data[i].Id + '"  >' + data[i].Nombre +
                    '</option>';

                $("#Distrito").html(_select);
            });
        });
    </script>
@endsection
