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

                                        <form method="POST" action="{{ url('registro/certificacion') }}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                <div class="input-area relative">
                                                    <label for="Descipcion" class="form-label">Descripción</label>
                                                    <textarea class="form-control" name="Descripcion"></textarea>
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="TipoTecnologia" class="form-label">Tipo de tecnología</label>
                                                    <textarea class="form-control" name="TipoTecnologia"></textarea>
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="Numero" class="form-label">Número</label>
                                                    <input type="text" name="Numero" class="form-control">
                                                </div>


                                                <div class="input-area relative">
                                                    <label for="Sector" class="form-label">Sector</label>
                                                    <input type="text" name="Sector" class="form-control">
                                                </div>



                                                <div class="input-area relative">
                                                    <label for="FechaEmision" class="form-label">Fecha de emisión</label>
                                                    <input type="date" name="FechaEmision" class="form-control">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="Nombre" class="form-label">Fecha de vencimiento</label>
                                                    <input type="date" name="FechaVencimiento" class="form-control">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="Nombre" class="form-label">Documento</label>
                                                    <input type="file" name="Archivo" class="form-control">
                                                </div>

                                              

                                                <div class="input-area">
                                                    <label for="Nombre" class="form-label">Entidad certificadora</label>
                                                    <div class="relative">
                                                        <select name="EntidadCertificadora"
                                                            class="form-control !pr-12 select2">
                                                            @foreach ($entidades as $obj)
                                                                <option value="{{ $obj->Id }}">{{ $obj->Nombre }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <button type="button"
                                                            class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                                            <iconify-icon icon="ph:plus-fill" style="color: #0f172a;" width="32"></iconify-icon>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="Nombre" class="form-label">Recomendación
                                                        contratista</label>
                                                    <textarea class="form-control" name="RecomendacionContratista"></textarea>
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

@endsection
