<div>
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <?php
    $dias = ['', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
    $meses = ['', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    
    $dia = $dias[date('N')];
    $mes = $meses[date('m') + 0];
    $fecha = $dia . ' ' . date('d') . ' de ' . $mes . ' de ' . date('Y');
    ?>


    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i><a href="#">{{ $fecha }}</a></i>

                @if (auth()->check())
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">
                            <i class="d-flex align-items-center ms-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-rolodex" viewBox="0 0 16 16">
                                    <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                    <path
                                        d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1H1Zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1V2Z" />
                                </svg>
                                &nbsp &nbsp
                                Cerrar sesión</button>
                        </i>
                    </form>
                @else
                    <a href="{{ url('login') }}">
                        <i class="d-flex align-items-center ms-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-rolodex" viewBox="0 0 16 16">
                                <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                <path
                                    d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1H1Zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1V2Z" />
                            </svg>
                            <span>Iniciar sesión</span></i>
                    </a>
                    <a href="{{ url('register') }}">
                        <i class="d-flex align-items-center ms-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                <path
                                    d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                            </svg>
                            <span>Registro de profesionales</span></i>
                    </a>
                @endif


            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                @can('edit menu')
                    <a href="#" class="twitter" onclick="mostrarModalTexto(5,'{{ $configuracion->Facebook }}')"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="facebook" onclick="mostrarModalTexto(6,'{{ $configuracion->Instagram }}')"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="instagram" onclick="mostrarModalTexto(7,'{{ $configuracion->Twitter }}')"><i class="bi bi-twitter"></i></a>
                @endcan
                @if (session('array_bandera'))
                    @for ($i = 0; $i < count(session('array_bandera')); $i++)
                        <a href="{{ session('array_url')[$i] }}" class="linkedin" target="_blank"><img
                                style="width: 20px" src="{{ asset('img') }}/{{ session('array_bandera')[$i] }}"></a>
                    @endfor
                @endif
            </div>
        </div>
    </section>



    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between py-4">
            <!-- Uncomment below if you prefer to use an image logo -->
            @if ($configuracion->LogoUno)
                <a href="#" class="logo logos" @can('edit menu') onclick="mostrarModal(1)" @endcan><img
                        src="{{ asset('img') }}/{{ $configuracion->LogoUno }}" alt=""></a>
            @endif

            @if ($configuracion->LogoDos)
                <a href="#" class="logo logos" @can('edit menu') onclick="mostrarModal(2)" @endcan><img
                        src="{{ asset('img') }}/{{ $configuracion->LogoDos }}" alt=""></a>
            @endif

            @if ($configuracion->LogoTres)
                <a href="#" class="logo logos" @can('edit menu') onclick="mostrarModal(3)" @endcan><img
                        src="{{ asset('img') }}/{{ $configuracion->LogoTres }}" alt=""></a>
            @endif


            @if ($configuracion->LogoCuatro)
                <a href="#" class="logo logos" @can('edit menu') onclick="mostrarModal(4)" @endcan><img
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

    <div class="modal fade" id="textoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar texto</h5>
                </div>
                <form method="POST" action="{{ url('configuracion/text') }}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="Opcion" id="OpcionTexto">
                        <div class="input-area relative">
                            <textarea rows="5" name="Texto" id="Descripcion" required class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            onclick="ocultarModalTexto()">Cerrar</button>
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

        function mostrarModalTexto(opcion, descripcion) {
            var modal = $("#textoModal");
            document.getElementById('OpcionTexto').value = opcion;
            document.getElementById('Descripcion').value = descripcion;
            modal.modal("show");
        }

        function ocultarModalTexto() {
            var modal = $("#textoModal");
            modal.modal("hide");
        }
    </script>

</div>
