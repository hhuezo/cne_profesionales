@extends('menu')
@section('contenido')
    <style>
        .simplebar-content-wrapper {
            background-color: #1E293B
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <div class="accordion" id="accordionExample">
        @foreach ($detalles as $detalle)
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-{{ $detalle->Id }}" aria-expanded="false"
                        aria-controls="collapse-{{ $detalle->Id }}">
                        {{ $detalle->Descripcion }}
                    </button>
                </h2>
                <div id="collapse-{{ $detalle->Id }}" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">


                        <div>&nbsp;</div>

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
                                <form method="POST" action="{{ route('certificacion.update', $certificacion->Id) }}"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf

                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">

                                        <div class="input-area relative">
                                            <label for="TipoTecnologia" class="form-label">Descripción</label>
                                            <textarea class="form-control" readonly name="Descripcion">{{ $detalle->Descripcion }}</textarea>
                                        </div>

                                        <div class="input-area relative">
                                            <label for="TipoTecnologia" class="form-label">Tipo de
                                                tecnología</label>
                                            <textarea class="form-control" name="TipoTecnologia" required>{{ $detalle->TipoTecnologia }}</textarea>
                                        </div>

                                        <div class="input-area relative">
                                            <label for="Numero" class="form-label">Número</label>
                                            <input type="text" name="Numero" value="{{ $detalle->Numero }}" required
                                                class="form-control">
                                        </div>


                                        <div class="input-area relative">
                                            <label for="Sector" class="form-label">Sector</label>
                                            <input type="text" name="Sector" value="{{ $detalle->Sector }}" required
                                                class="form-control">
                                        </div>



                                        <div class="input-area relative">
                                            <label for="FechaEmision" class="form-label">Fecha de emisión</label>
                                            <input type="date" name="FechaEmision" value="{{ $detalle->FechaEmision }}"
                                                required class="form-control">
                                        </div>

                                        <div class="input-area relative">
                                            <label for="Nombre" class="form-label">Fecha de vencimiento</label>
                                            <input type="date" name="FechaVencimiento"
                                                value="{{ $detalle->FechaVencimiento }}" required class="form-control">
                                        </div>

                                        <div class="input-area relative">
                                            <label for="Nombre" class="form-label">Documento</label>
                                            <input type="file" name="Archivo" value="{{ old('Archivo') }}" required
                                                class="form-control">
                                        </div>



                                        <div class="input-area">
                                            <label for="Nombre" class="form-label">Entidad certificadora</label>
                                            @if ($detalle->entidad)
                                                <input type="text" value="{{ $detalle->entidad->Nombre }}"
                                                    class="form-control">
                                            @else
                                                <input type="text" class="form-control">
                                            @endif

                                        </div>

                                        <div class="input-area relative">
                                            <label for="Nombre" class="form-label">Recomendación
                                                contratista</label>
                                            <textarea name="RecomendacionContratista" required class="form-control">{{ $detalle->RecomendacionContratista }}</textarea>
                                        </div>
                                    </div>
                                    <div style="text-align: right;">
                                        <button type="submit" style="margin-right: 18px"
                                            class="btn btn-dark">Agregar</button>

                                    </div>
                            </div>
                            </form>
                        </div>








                    </div>
                </div>
            </div>
        @endforeach


    </div>
@endsection
