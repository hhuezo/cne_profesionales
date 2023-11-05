@extends('menu')
@section('contenido')
    <div class="card">
        <header class=" card-header noborder">
            <h4 class="card-title">Perfiles
            </h4>
        </header>
        <div class="card-body px-6 pb-6">
            <div class="overflow-x-auto -mx-6 dashcode-data-table">
                <span class=" col-span-8  hidden"></span>
                <span class="  col-span-4 hidden"></span>
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                            <thead class=" bg-slate-200 dark:bg-slate-700">
                                <tr>
                                    <th scope="col" class=" table-th ">
                                        Correo
                                    </th>

                                    <th scope="col" class=" table-th ">
                                        Nombre Completo
                                    </th>
                                    <th scope="col" class=" table-th ">
                                        Profesion
                                    </th>

                                    <th scope="col" class=" table-th ">
                                        Otra profesion
                                    </th>

                                    <th scope="col" class=" table-th ">Lugar de formación</th>
                                    <th scope="col" class=" table-th ">Otro lugar de formación</th>
                                    <th scope="col" class=" table-th ">
                                        Acciones
                                    </th>
                                </tr>

                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                @foreach ($usuarios as $obj)
                                    <tr>
                                        <td class="table-td">{{ $obj->email }}</td>
                                        <td class="table-td ">{{ $obj->name . ' ' . $obj->last_name }}</td>

                                        @if ($obj->perfil->profesion)
                                            <td class="table-td ">{{ $obj->perfil->profesion->Nombre }}</td>
                                        @else
                                            <td class="table-td "></td>
                                        @endif


                                        </td>
                                        <td class="table-td ">{{ $obj->perfil->OtraProfesion }}</td>
                                        @if ($obj->perfil->lugar_formacion)
                                            <td class="table-td ">{{ $obj->perfil->lugar_formacion->Nombre }}</td>
                                        @else
                                            <td class="table-td "></td>
                                        @endif
                                        <td class="table-td ">{{ $obj->perfil->OtroLugarFormacion }}</td>
                                        <td class="table-td ">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                <a href="{{ route('usuarios.verificarUsuario', ['id' => $obj->id]) }}"><button
                                                        class="action-btn" type="button">
                                                        <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                    </button></a>
                                                {{-- <button class="action-btn" type="button">
                                                    <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                </button>
                                                <button class="action-btn" type="button">
                                                    <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                </button> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
