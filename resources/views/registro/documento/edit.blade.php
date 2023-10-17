@extends('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

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
                                        <div class="card-title text-slate-900 dark:text-white">Documento</div>
                                    </div>
                                    <a href="{{ url('registro/documento') }}">
                                        <button class="btn btn-dark btn-sm float-right">
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
                                                    <form method="POST"
                                                        action="{{ route('documento.update', $documento->Id) }}"
                                                        enctype="multipart/form-data">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="card h-full">
                                                            <div class="grid pt-4 pb-3 px-4">
                                                                <div class="input-area relative">
                                                                    <label for="Descripcion"
                                                                        class="form-label">Descripción</label>
                                                                    <textarea name="Descripcion" class="form-control" required>{{ $documento->Descripcion }}</textarea>
                                                                </div>


                                                                <br>
                                                                <div class="input-area">
                                                                    <label for="Archivo" class="form-label">Archivo</label>
                                                                    <div class="relative">
                                                                        <input type="file" name="Archivo"
                                                                            class="form-control">
                                                                        @if ($documento->Url)
                                                                            <a href="{{ asset('docs') }}/{{ $documento->Url }}"
                                                                                target="_blank">
                                                                                <button type="button"
                                                                                    class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                                                                    <iconify-icon
                                                                                        icon="heroicons-solid:eye"></iconify-icon>
                                                                                </button>
                                                                            </a>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                                <br>
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
    </body>


@endsection
