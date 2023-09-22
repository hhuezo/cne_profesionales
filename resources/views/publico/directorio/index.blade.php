@extends('menu_publico')
@section('contenido')
    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Busqueda

                                <a href="{{ url('/') }}">
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




                                        <div class="input-area">
                                            <div class="relative">
                                                <input type="text" class="form-control !pr-12" placeholder="Buscar">
                                                <button
                                                    class="absolute btn-dark right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                                    <iconify-icon icon="heroicons-solid:search"></iconify-icon>
                                                </button>
                                            </div>
                                        </div>


                                        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-12">




                                            <div style=" margin-left:20px; margin-right:20px; ">
                                                <div class="inline-block min-w-full align-middle">
                                                    <div class="overflow-hidden " style=" margin-bottom:20px ">
                                                        <table class="display" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr class="td-table">
                                                                    <th style="text-align: center">Fecha</th>
                                                                    <th style="text-align: center">Solicitante</th>
                                                                    <th style="text-align: center">Número documento</th>
                                                                    <th>Descripción</th>
                                                                    <th>Estado</th>
                                                                    <th style="text-align: center">Opciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>#951</td>


                                                                    <td>Jenny Wilson</td>
                                                                    <td align="center">aaaaa
                                                                    </td>
                                                                    <td>3/26/2022</td>

                                                                    <td>13</td>

                                                                    <td>13</td>
                                                                </tr>


                                                            </tbody>
                                                        </table>
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
            </div>
        </div>
    </div>
@endsection
