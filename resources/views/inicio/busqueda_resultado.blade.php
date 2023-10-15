<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<!-- Incluye DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<table id="example" class="display" style="width:100%">
    <thead>
        <tr class="td-table" align="left">
            <th>Nombre</th>
            <th>Fecha vencimiento</th>
            <th>Profesión</th>
            <th>Entidad certificadora</th>
            <th>Visualizar</th>
        </tr>
    </thead>
    <tbody>
        @if ($certificaciones)
            @foreach ($certificaciones as $certificacion)
                <tr align="left">
                    <td>{{ $certificacion->Nombre }}</td>
                    <td>{{ date('d/m/Y', strtotime($certificacion->FechaVencimiento)) }}</td>
                    <td>{{ $certificacion->Profesion }}</td>
                    @if ($certificacion->OtraEntidad)
                        <td>{{ $certificacion->OtraEntidad }}</td>
                    @else
                        <td>{{ $certificacion->Entidad }}</td>
                    @endif

                    <td align="center">
                        <a href="{{ url('publico/busqueda') }}/{{ $certificacion->Id }}">
                            <iconify-icon icon="heroicons-solid:eye" width="24"></iconify-icon>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endif

    </tbody>
</table>
