@extends ('menu')
@section('contenido')
    <div class="page-content">
        <div class="transition-all duration-150 container-fluid" id="page_layout">
            <div id="content_layout">

                <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
                    <!-- Basic Inputs -->
                    <div class="card">
                        <div class="card-body flex flex-col p-6">
                            <header
                                class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                <div class="flex-1">
                                    <div class="card-title text-slate-900 dark:text-white">Usuario

                                        <a href="{{ url('seguridad/usuario') }}">
                                            <button class="btn btn-dark btn-sm float-right">
                                                <iconify-icon icon="icon-park-solid:back" style="color: white;"
                                                    width="18">
                                                </iconify-icon>
                                            </button>
                                        </a>
                                    </div>
                                </div>

                            </header>
                            <form method="POST" action="{{ route('usuario.update', $user->id) }}">
                                @method('PUT')
                                @csrf

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <br>
                                @endif

                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">


                                    <div class="input-area relative">
                                        <label for="Dui" class="form-label">Nombre</label>
                                        <input type="text" name="name" value="{{ $user->name }}" required
                                            class="form-control">
                                    </div>



                                    <div class="input-area">
                                        <label for="Profesion" class="form-label">Apellido</label>
                                        <input type="text" name="last_name" value="{{ $user->last_name }}"
                                            class="form-control" required>
                                    </div>


                                    <div class="input-area relative">
                                        <label for="Nacionalidad" class="form-label">Correo</label>
                                        <input type="email" name="email" value="{{ $user->email }}" required
                                            class="form-control">
                                    </div>
                                    <div class="input-area relative">
                                        <label for="Direccion" class="form-label">Contraseña</label>
                                        <input type="password" name="password" value="" class="form-control">
                                    </div>

                                    <div class="input-area relative">
                                        <label for="Nacionalidad" class="form-label">Profesión</label>
                                        <select name="Profesion" class="form-control">
                                            <option value="">Seleccione</option>
                                            @foreach ($profesiones as $obj)
                                                <option value="{{ $obj->Id }}"
                                                    {{ $user->ocupacion == $obj->Id ? 'selected' : '' }}>{{ $obj->Nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($user->ocupacion == 1)
                                        <div class="input-area relative" id="otra_profesion">
                                            <label for="Telefono" class="form-label">Otra profesión</label>


                                            <div class="relative">
                                                <input type="text" name="otra_ocupacion" id="otra_ocupacion" disabled
                                                    value="{{ $user->otra_ocupacion }}"
                                                    class="form-control !border-danger-500 !pr-12">
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#modal-profesion"
                                                    class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                                    <iconify-icon icon="mdi:pencil-box" style="color: #475569;"
                                                        width="40"></iconify-icon>
                                                </button>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="input-area relative">
                                        <label for="Nacionalidad" class="form-label">Sector</label>
                                        <select name="Profesion" class="form-control">
                                            <option value="">Seleccione</option>
                                            @foreach ($sectores as $obj)
                                                <option value="{{ $obj->Id }}"
                                                    {{ $user->sector == $obj->Id ? 'selected' : '' }}>{{ $obj->Nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @if ($user->sector == 1)
                                        <div class="input-area relative" id="otra_profesion">
                                            <label for="Telefono" class="form-label">Otro sector</label>

                                            <div class="relative">
                                                <input type="text" name="otro_sector" id="otro_sector" disabled
                                                    value="{{ $user->otro_sector }}"
                                                    class="form-control !border-danger-500 !pr-12">
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-sector"
                                                    class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                                    <iconify-icon icon="mdi:pencil-box" style="color: #475569;"
                                                        width="40"></iconify-icon>
                                                </button>
                                            </div>
                                        </div>
                                    @endif


                                </div>
                                <br>
                                <div style="text-align: right;">
                                    <button type="submit" class="btn inline-flex justify-center btn-dark">Guardar</button>
                                </div>


                            </form>
                        </div>


                        <div class="card-body flex flex-col p-6">
                            <div style=" margin-left:20px; margin-right:20px; ">
                                <span class=" col-span-8  hidden"></span>
                                <span class="  col-span-4 hidden"></span>
                                <div class="inline-block min-w-full align-middle">
                                    <div class="input-area">
                                        <form method="POST" action="{{ url('seguridad/usuario/link_role') }}">
                                            @csrf

                                            <div class="relative">
                                                <input type="hidden" name="users_id" value="{{ $user->id }}">
                                                <select name="role" class="form-control">
                                                    @foreach ($roles as $obj)
                                                        <option value="{{ $obj->id }}">{{ $obj->name }}</option>
                                                    @endforeach
                                                </select>
                                                <button type="submit"
                                                    class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                                    <iconify-icon icon="material-symbols:save" style="color: #0f172a;"
                                                        width="32"></iconify-icon>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div>&nbsp; </div>
                                    <div class="overflow-hidden " style=" margin-bottom:20px ">
                                        <table class="display" cellspacing="0" width="100%">
                                            <thead>
                                                <tr class="td-table">
                                                    <th>Rol</th>

                                                    <th style="text-align: center">Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($roles_actuales)
                                                    @foreach ($roles_actuales as $obj)
                                                        <tr>
                                                            <td>{{ $obj->name }} </td>

                                                            <td align="center">
                                                                <iconify-icon data-bs-toggle="modal"
                                                                    data-bs-target="#modal-delete-{{ $obj->id }}"
                                                                    icon="mdi:trash" style="color: #1769aa;"
                                                                    width="40"></iconify-icon>
                                                            </td>
                                                        </tr>
                                                        @include('seguridad.usuario.modal')
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


            </div>
        </div>
    </div>

    <div id="modal-profesion"
        class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        aria-hidden="true" role="dialog" tabindex="-1">

        <form method="POST" action="{{ url('seguridad/usuario/add_profesion') }}">
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
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="input-area relative">
                                <label for="Administrador" class="form-label">Nombre</label>
                                <input type="text" name="Nombre" required value="{{ $user->otra_ocupacion }}"
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


    <div id="modal-sector"
    class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
    aria-hidden="true" role="dialog" tabindex="-1">

    <form method="POST" action="{{ url('seguridad/usuario/add_sector') }}">
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
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="input-area relative">
                            <label for="Administrador" class="form-label">Nombre</label>
                            <input type="text" name="Nombre" required value="{{ $user->otro_sector }}"
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
@endsection
