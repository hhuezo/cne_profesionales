<div>
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between py-4">
            <!-- Uncomment below if you prefer to use an image logo -->
            @if ($configuracion->LogoUno)
                <a href="#" class="logo logos" onclick="mostrarModal(1)"><img
                        src="{{ asset('img') }}/{{ $configuracion->LogoUno }}" alt=""></a>
            @endif

            @if ($configuracion->LogoDos)
                <a href="#" class="logo logos" onclick="mostrarModal(2)"><img
                        src="{{ asset('img') }}/{{ $configuracion->LogoDos }}" alt=""></a>
            @endif

            @if ($configuracion->LogoTres)
                <a href="#" class="logo logos" onclick="mostrarModal(3)"><img
                        src="{{ asset('img') }}/{{ $configuracion->LogoTres }}" alt=""></a>
            @endif


            @if ($configuracion->LogoCuatro)
                <a href="#" class="logo logos" onclick="mostrarModal(4)"><img
                        src="{{ asset('img') }}/{{ $configuracion->LogoCuatro }}" alt=""></a>
            @endif

        </div>
    </header>


    <!-- Modal -->
    <div class="modal fade" id="archivoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar archivo</h5>
                </div>
                <form method="POST" action="{{ url('configuracion/header_image') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="Opcion" id="Opcion">
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Archivo</label>
                            <input type="file" name="Archivo" accept="image/*" required class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="ocultarModal()">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function mostrarModal(opcion) {
            var modal = $("#archivoModal");
            document.getElementById('Opcion').value = opcion;
            modal.modal("show");
        }

        function ocultarModal() {
            var modal = $("#archivoModal");
            modal.modal("hide");
        }
    </script>

</div>
