@extends('menu')
@section('contenido')
    <!-- Basic Inputs -->
    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">Verificar Usuario</div>
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
                            <input type="text" name="Nacionalidad" value="{{ $usuario->perfil->Nacionalidad }}" required
                                class="form-control">
                        </div>
                        <div class="input-area relative">
                            <label for="Dui" class="form-label">Dui</label>
                            <input disabled type="text" name="Dui" id="Dui" value="{{ $usuario->perfil->Dui }}"
                                class="form-control">
                        </div>

                        <div class="input-area">
                            <label for="Profesion" class="form-label">Profesión u oficio</label>
                            <input disabled type="text" name="Profesion" value="{{ $usuario->perfil->Profesion }}"
                            class="form-control">
                        </div>
                       
                        <div class="input-area relative">
                            <label for="Direccion" class="form-label">Dirección</label>
                            <input disabled type="text" name="Direccion" id="Direccion"
                                value="{{ $usuario->perfil->Direccion }}" class="form-control">
                        </div>
                        <div class="input-area relative">
                            <label for="Pais" class="form-label">Pais</label>
                            <select disabled name="Pais" id="Pais" class="form-control">
                                @foreach ($paises as $obj)
                                    @if ($usuario->perfil->Pais == $obj->Id)
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
                            <label for="Departamento" class="form-label">Departamento</label>
                            <select disabled name="Departamento" id="Departamento" class="form-control">
                                {{$usuario->perfil->Id }}
                                @foreach ($departamentos as $obj)
                                    @if ($usuario->perfil->municipio->Departamento == $obj->Id)
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
                    
                            <select  name="Municipio" id="Municipio" class="form-control">
                      
                                @foreach ($municipios as $obj)
                                    @if ($usuario->perfil->Municipio == $obj->Id)
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
                            <select disabled name="Distrito"  class="form-control">
                                @foreach ($distritos as $obj)
                                    @if ($usuario->perfil->Distrito == $obj->Id)
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
                      
                      
                       

                        <div class="input-area relative">
                            <label for="observaciones" class="form-label">Observaciones</label>
                            <textarea id="observaciones" name="Observaciones" rows="5" class="form-control">Nos complace informarte que tu perfil ha sido verificado exitosamente.
                                Ahora puedes disfrutar de todas las funcionalidades y beneficios de nuestra plataforma.
                                ¡Gracias por tu paciencia y colaboración!</textarea>
                        </div>



                    </div>
                    <br>
                    <div style="text-align: right;">
                        <button type="submit" name="estado" value="1"
                            class="btn inline-flex justify-center btn-warning">Enviar observaciones</button>
                        <button type="submit" name="estado" value="2"
                            class="btn inline-flex justify-center btn-success">Verificar</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
