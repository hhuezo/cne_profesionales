@extends ('menu')
@section('contenido')

    <div class=" space-y-5">
        <div class="card">
            <header class=" card-header noborder">
                <h4 class="card-title">Listado de permisos                  
                </h4>
                <a href="{{url('seguridad/permission/create')}}">
                <button class="btn btn-outline-primary">Nuevo</button>
                </a>
            </header>
            <div class="card">
                <div class="overflow-x-auto -mx-6 dashcode-data-table">
                    <span class=" col-span-8  hidden"></span>
                    <span class="  col-span-4 hidden"></span>
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden ">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700"
                                id="data-table">
                                <thead class=" border-t border-slate-100 dark:border-slate-800">
                                    <tr class="td-table">
                                        <th scope="col" class=" table-th ">Id</th>
                                        <th scope="col" class=" table-th ">Descripción</th>
                                        <th scope="col" class=" table-th ">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @php($i=1)
                                    @if ($permissions->count() > 0)
                                        @foreach ($permissions as $obj)
                                            <tr class="table-td {{ $i % 2 == 0 ? 'td-table' : '' }}">
                                                <td class="table-td " align="center">{{ $obj->id }}</td>
                                                <td class="table-td ">{{ $obj->name }}</td>
                                                <td class="table-td " align="center"></td>
                                            </tr>
                                            @php($i++)
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
