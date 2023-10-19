@extends ('menu')
@section('contenido')

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


    <div class=" space-y-5">
        <div class="card">
            <header class=" card-header noborder">
                <h4 class="card-title">Paises
                </h4>

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
                                        {{-- <th style="text-align: center">Id</th> --}}
                                        <th>Nombre</th>
                                        <th>Url</th>
                                        <th>Activo</th>
                                        <th style="text-align: center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($paises->count() > 0)
                                        @foreach ($paises as $obj)
                                            <tr>
                                                {{-- <td align="center">{{ $obj->Id }}</td> --}}
                                                <td>{{ $obj->Nombre }}</td>
                                                <td>{{ $obj->Url }}</td>
                                                @if ($obj->Activo == 1)
                                                    <td align="center"><input type="checkbox" checked></td>
                                                @else
                                                    <td align="center"><input type="checkbox"></td>
                                                @endif

                                                <td align="center">
                                                    <a href="{{ url('catalogo/pais') }}/{{ $obj->Id }}/edit">
                                                        <iconify-icon icon="mdi:pencil-box" style="color: #475569;"
                                                            width="40"></iconify-icon>
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#myTable').DataTable({
                    "ordering": false,
                    "bDestroy": true
                });
            });
        </script>

    @endsection
