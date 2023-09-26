@extends('menu')
@section('contenido')
    <!-- Basic Inputs -->
    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">Verificar usuario</div>
                </div>
            </header>
            <div class="card-text h-full space-y-4">
                <form method="POST" action="{{ route('usuarios.usuarioVerificado', $usuario->id) }}">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                        <div class="input-area relative">
                            <label for="Nombre" class="form-label">Nombre</label>
                            <input disabled type="text" name="Nombre" id="Nombre" value="{{ $usuario->name }}"
                                class="form-control">
                        </div>
                        <div class="input-area relative">
                            <label for="Apellido" class="form-label">Apellido</label>
                            <input disabled type="text" name="Apellido" id="Apellido" value="{{ $usuario->last_name }}"
                                class="form-control">
                        </div>
                        <div class="input-area relative">
                            <label for="Email" class="form-label">Email</label>
                            <input disabled type="email" name="Email" id="Email" value="{{ $usuario->email }}"
                                class="form-control">
                        </div>
                        <div class="input-area relative">
                            <label for="Nacionalidad" class="form-label">Nacionalidad</label>
                            <input type="text" name="Nacionalidad" value="{{ $usuario->perfil->nacionalidad->Nombre }}" disabled
                                class="form-control">
                        </div>

                        <div class="input-area">
                            <label for="Profesion" class="form-label">Profesión u oficio</label>
                            <select name="Profesion"  id="Profesion" class="form-control" disabled>
                                @foreach ($profesiones as $obj)
                                    <option value="{{ $obj->Id }}"  {{ $usuario->perfil->Profesion == $obj->Id ? 'selected' : '' }}>{{ $obj->Nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        @if ($usuario->perfil->Profesion == 1)
                            <div class="input-area relative" id="otra_profesion" style="display: none">
                                <label for="Telefono" class="form-label">Otra profesión</label>


                                <div class="relative">

                                    <input type="text" name="OtraProfesion" id="OtraProfesion" disabled
                                    value="{{ $usuario->perfil->OtraProfesion }}" class="form-control !border-danger-500 !pr-12">
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#modal-profesion"
                                        class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                        <iconify-icon icon="mdi:pencil-box"
                                            style="color: #475569;"
                                            width="40"></iconify-icon>
                                    </button>
                                </div>



                            </div>
                        @endif

                        <div class="input-area relative">
                            <label for="Direccion" class="form-label">Dirección</label>
                            <input disabled type="text" name="Direccion" id="Direccion"
                                value="{{ $usuario->perfil->Direccion }}" class="form-control">
                        </div>
                        <div class="input-area relative">
                            <label for="Pais" class="form-label">Pais</label>
                            <input type="text" value="{{ $pais->Nombre }}" class="form-control" disabled>
                        </div>
                        <div class="input-area relative">
                            <label for="Departamento" class="form-label">Departamento</label>
                            <select disabled name="Departamento" id="Departamento" class="form-control">
                                {{ $usuario->perfil->Id }}
                                @foreach ($departamentos_provincia as $obj)
                                    @if ($usuario->perfil->distrito_corregimiento->municipio_distrito->DepartamentoProvincia == $obj->Id)
                                        <option class="dark:bg-slate-700" value="{{ $obj->Id }}" selected>
                                            {{ $obj->Nombre }}</option>
                                    @else
                                        <option class="dark:bg-slate-700" value="{{ $obj->Id }}">
                                            {{ $obj->Nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="input-area relative">
                            <label for="Municipio" class="form-label">Municipio</label>

                            <select name="Municipio" id="Municipio" class="form-control" disabled>

                                @foreach ($municipios_distritos as $obj)
                                    @if ($usuario->perfil->distrito_corregimiento->MunicipioDistrito == $obj->Id)
                                        <option class="dark:bg-slate-700" value="{{ $obj->Id }}" selected>
                                            {{ $obj->Nombre }} </option>
                                    @else
                                        <option class="dark:bg-slate-700" value="{{ $obj->Id }}">
                                            {{ $obj->Nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="input-area relative">
                            <label for="EntidadCertificadora" class="form-label">Distrito</label>
                            <select disabled name="Distrito" class="form-control">
                                @foreach ($distritos_corregimientos as $obj)
                                    @if ($usuario->perfil->DistritoCorregimiento == $obj->Id)
                                        <option class="dark:bg-slate-700" value="{{ $obj->Id }}" selected>
                                            {{ $obj->Nombre }}</option>
                                    @else
                                        <option class="dark:bg-slate-700" value="{{ $obj->Id }}">
                                            {{ $obj->Nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="input-area relative">
                            <label for="Telefono" class="form-label">Telefono</label>
                            <input disabled type="tel" name="Telefono" id="Telefono"
                                value="{{ $usuario->perfil->Telefono }}" class="form-control">
                        </div>




                        <!--    <div class="input-area relative">
                            <label for="observaciones" class="form-label">Observaciones</label>
                            <textarea id="observaciones" name="Observaciones" rows="5" class="form-control">Nos complace informarte que tu perfil ha sido verificado exitosamente.
                                Ahora puedes disfrutar de todas las funcionalidades y beneficios de nuestra plataforma.
                                ¡Gracias por tu paciencia y colaboración!</textarea>
                        </div>-->



                    </div>
                    <br>
                    <div style="text-align: right;">
                     <!--      <button type="submit" name="estado" value="1"
                            class="btn inline-flex justify-center btn-warning">Enviar observaciones</button>
                        <button type="submit" name="estado" value="2"
                            class="btn inline-flex justify-center btn-success">Verificar</button>-->
                    </div>


                </form>
            </div>
        </div>
    </div>


    <div id="modal-profesion"
    class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
    aria-hidden="true" role="dialog" tabindex="-1">

    <form method="POST" action="{{ url('seguridad/usuarios/add_profesion') }}">
        @csrf
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
              rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                        <h3 class="text-base font-medium text-white dark:text-white">
                            Agregar profesión
                        </h3>
                        <button type="button"
                            class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                          dark:hover:bg-slate-600 dark:hover:text-white"
                            data-bs-dismiss="modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                  11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-4">
                        <input type="hidden" name="Perfil" value="{{ $usuario->perfil->Id }}">
                        <div class="input-area relative">
                            <label for="Administrador" class="form-label">Nombre</label>
                            <input type="text" name="Nombre" required value="{{$usuario->perfil->OtraProfesion }}"
                                class="form-control">
                        </div>


                    </div>
                    <!-- Modal footer -->
                    <div class=" items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                        <button type="submit"
                            class="btn inline-flex justify-center text-white bg-black-500 float-right"
                            style="margin-bottom: 15px">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

    <script type="text/javascript">
        $(document).ready(function() {

            validar();

            $("#Profesion").change(function() {
                validar();
                $("#OtraProfesion").val("");
            });

            function validar() {
                if ($("#Profesion").val() == 1) {
                    $("#otra_profesion").css("display", "block");
                    $("#OtraProfesion").attr("required", true);
                } else {
                    $("#otra_profesion").css("display", "none");
                    $("#OtraProfesion").attr("required", false);
                }
            }
        });
    </script>
@endsection
