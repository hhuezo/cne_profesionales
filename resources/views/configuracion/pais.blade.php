@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])




    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Configuración de país


                            </div>
                        </div>
                    </header>


                    <div class="transition-all duration-150 container-fluid" id="page_layout">
                        <div id="content_layout">
                            <div class="space-y-5">
                                <div class="grid grid-cols-12 gap-5">
                                    <div class="xl:col-span-3 col-span-12 lg:col-span-3 ">
                                        <div class="card p-6 h-full">
                                            &nbsp;
                                        </div>
                                    </div>
                                    <div class="xl:col-span-6 col-span-12 lg:col-span-6">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form method="POST" action="{{ url('configuracion/pais') }}">
                                            @csrf
                                            <div class="card h-full">
                                                <div class="grid pt-4 pb-3 px-4">
                                                    <div class="input-area relative">
                                                        <label for="largeInput" class="form-label">País</label>
                                                        <select class="form-control" name="Pais" id="Pais">
                                                            @foreach ($paises as $obj)
                                                                <option value="{{ $obj->Id }}"
                                                                    {{ $obj->Id == $configuracion->Pais ? 'selected' : '' }}>
                                                                    {{ $obj->Nombre }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    {{-- <br>
                                                    <div class="input-area relative">
                                                        <label for="largeInput" class="form-label">Url</label>
                                                        <input type="text" name="Url" id="Url" value="{{$configuracion->pais->Url}}"
                                                            class="form-control">
                                                    </div> --}}


                                                </div>
                                                <div style="text-align: right;">
                                                    <button type="submit" style="margin-right: 18px"
                                                        class="btn btn-dark">Aceptar</button>
                                                </div>
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

    <script>
        $(document).ready(function() {
            // Seleccionar el elemento con el id "Pais"
            $("#Pais").change(function() {
                // Obtener el texto seleccionado
                var pais = $(this).val();
                $.ajax({
                    url:  "{{url('configuracion/getUrlpais')}}/"+pais, // La URL de tu endpoint Laravel
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        //console.log(response);
                        $('#Url').val(response.Url);
                    },
                    error: function(error) {
                        console.error('Error al obtener la URL del país:', error);
                    }
                });

              
            });
        });
    </script>
@endsection
