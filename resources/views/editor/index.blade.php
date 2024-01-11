@extends ('menu')
@section('contenido')

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


    <div class=" space-y-5">
        <div class="card">
            <header class=" card-header noborder">
                <h4 class="card-title">Páginas
                </h4>
                <a href="{{ url('editor/create') }}">
                    <button class="btn btn-dark">Nuevo</button>
                </a>
            </header>
            <div class="card">
                <div style=" margin-left:20px; margin-right:20px; ">
                    <span class=" col-span-8  hidden"></span>
                    <span class="  col-span-4 hidden"></span>
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden " style=" margin-bottom:20px ">
                            <table id="myTable" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr class="td-table">
                                        <th style="text-align: center">Id</th>
                                        <th>Nombre</th>
                                        <th style="text-align: center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($snippets->count() > 0)
                                        @foreach ($snippets as $obj)
                                            <tr>
                                                <td align="center">{{ $obj->Id }}</td>
                                                <td>{{ $obj->nombre }}</td>
                                                <td align="center">
                                                    <a href="{{ url('editor') }}/{{ $obj->Id }}/edit">
                                                        <iconify-icon icon="mdi:pencil-box" style="color: #475569;"
                                                            width="40"></iconify-icon>
                                                    </a>
                                                    &nbsp;&nbsp;
                                                    <a href="{{ url('editor') }}/{{ $obj->Id }}" target="_blank">
                                                        <iconify-icon icon="ph:file-html" style="color: #475569;"
                                                            width="40"></iconify-icon>
                                                    </a>

                                                    <iconify-icon data-bs-toggle="modal"
                                                        data-bs-target="#modal-delete-{{ $obj->Id }}" icon="mdi:trash"
                                                        width="40"></iconify-icon>
                                                </td>
                                            </tr>
                                            @include('editor.modal')
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    @endsection
