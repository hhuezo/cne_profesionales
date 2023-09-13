@extends ('menu')
@section('contenido')

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


    <div class=" space-y-5">
        <div class="card">
            <header class=" card-header noborder">
                <h4 class="card-title">Listado de roles
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
                                    <tr>
                                        <th style="text-align: center">Id</th>
                                        <th>Descripción</th>
                                        <th style="text-align: center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($roles->count() > 0)
                                        @foreach ($roles as $obj)
                                            <tr>
                                                <td align="center">{{ $obj->id }}</td>
                                                <td>{{ $obj->name }}</td>
                                                <td align="center">

                                                    <a href="{{ url('seguridad/role') }}/{{ $obj->id }}/edit">
                                                        <iconify-icon icon="mdi:pencil-box" style="color: #1769aa;"
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

  
    </div>



@endsection
