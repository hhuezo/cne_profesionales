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
                                    <div class="card-title text-slate-900 dark:text-white">Usuario</div>
                                </div>

                            </header>
                            <form method="POST" action="{{ route('usuario.store') }}">
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
                                        <input type="password" name="password" value="" required class="form-control">
                                    </div>




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

@endsection
