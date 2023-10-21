<div>
    <style>
        #footer .footer-top .footer-contact p {
            color: #ffff;
        }
        .container{
            max-width:93%;
        }
    </style>
    <footer id="footer">
        <div class="footer-top page text-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 footer-contact">

                        <a href="#" class="text-white">
                            <p @can('edit menu') onclick="mostrarModalTexto(1,'{{ $configuracion->Institucion }}')" @endcan>
                                {{$configuracion->Institucion}}</p>
                            <p @can('edit menu') onclick="mostrarModalTexto(2,'{{ $configuracion->Direccion }}')" @endcan> 87 Avenida Norte y Calle El Mirador Torre Futura Nivel 16
                                {{$configuracion->Direccion}}
                            </p>

                            <br><br>
                        </a>
                        <strong @can('edit menu') onclick="mostrarModalTexto(3,'{{ $configuracion->Telefono }}')" @endcan>Telefono: {{$configuracion->Telefono}}</strong> <br>
                        <strong @can('edit menu') onclick="mostrarModalTexto(4,'{{ $configuracion->Correo }}')" @endcan>Correo: {{ $configuracion->Correo }}</strong><br>
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links" align="center">
                        @if ($configuracion->LogoPie)
                            <img src="{{ asset('img') }}/{{ $configuracion->LogoPie }}"
                                @can('edit menu') onclick="mostrarModal(5)" @endcan class="img-fluid" alt="">
                        @endif
                        <br><br><br>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links text-white" align="center">
                        <p>Únete a nuestra comunidad</p>
                        <div class="social-links mt-3">
                            <a href="{{$configuracion->Facebook}}" target="_blank" class="facebook"><i
                                    class="bx bxl-facebook"></i></a>
                            <a href="{{$configuracion->Instagram}}" target="_blank"  class="instagram"><i
                                    class="bx bxl-instagram"></i></a>
                            <a href="{{$configuracion->Twitter}}" target="_blank"  class="twitter"><i class="bx bxl-twitter"></i></a>
                            {{-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> --}}
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </footer>



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
                        <button type="button" class="btn btn-secondary" onclick="ocultarModalTexto()">Cerrar</button>
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
