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
                    <input disabled type="text" name="Nombre" id="Nombre"
                        value="{{ $usuario->name }}" class="form-control">
                </div>
                <div class="input-area relative">
                    <label for="Apellido" class="form-label">Apellido</label>
                    <input disabled type="text" name="Apellido" id="Apellido"
                        value="{{ $usuario->last_name }}" class="form-control">
                </div>
                <div class="input-area relative">
                    <label for="Email" class="form-label">Email</label>
                    <input disabled type="email" name="Email" id="Email"
                        value="{{ $usuario->email }}" class="form-control">
                </div>
                <div class="input-area relative">
                    <label for="Dui" class="form-label">Dui</label>
                    <input disabled type="text" name="Dui" id="Dui"
                        value="{{ $usuario->perfil->Dui }}" class="form-control">
                </div>
                <div class="input-area relative">
                    <label for="largeInput" class="form-label">Password</label>
                    <input disabled type="password" name="Password" id="Password" class="form-control">
                </div>
                <div class="input-area">
                    <label for="Profesion" class="form-label">Profesión u oficio</label>
                    <select disabled name="Profesion" id="Profesion" class="form-control">
                        <option value="Ingeniero" class="dark:bg-slate-700"
                            {{ old('Profesion') == $usuario->perfil->Profesion ? 'selected' : '' }}>
                            Ingeniero</option>
                        <option value="Profesión 2" class="dark:bg-slate-700"
                            {{ old('Profesion') == $usuario->perfil->Profesion ? 'selected' : '' }}>
                            Profesión 2</option>
                        <option value="Profesión 3" class="dark:bg-slate-700"
                            {{ old('Profesion') == $usuario->perfil->Profesion ? 'selected' : '' }}>
                            Profesión 3</option>
                        <option value="Profesión 4" class="dark:bg-slate-700"
                            {{ old('Profesion') == $usuario->perfil->Profesion ? 'selected' : '' }}>
                            Profesión 4</option>
                    </select>
                </div>
                <div class="input-area relative">
                    <label for="Nacionalidad" class="form-label">Nacionalidad</label>
                    <select disabled name="Nacionalidad" id="Nacionalidad" class="form-control">
                        <option value="Salvadoreño" class="dark:bg-slate-700"
                            {{ old('Nacionalidad') == $usuario->perfil->Nacionalidad ? 'selected' : '' }}>
                            Salvadoreño</option>
                        <option value="Panameño" class="dark:bg-slate-700"
                            {{ old('Nacionalidad') == $usuario->perfil->Nacionalidad ? 'selected' : '' }}>
                            Panameño</option>
                        <option value="Nacionalidad 3" class="dark:bg-slate-700"
                            {{ old('Nacionalidad') == $usuario->perfil->Nacionalidad ? 'selected' : '' }}>
                            Nacionalidad 3</option>
                        <option value="Nacionalidad 4" class="dark:bg-slate-700"
                            {{ old('Nacionalidad') == $usuario->perfil->Nacionalidad ? 'selected' : '' }}>
                            Nacionalidad 4</option>
                    </select>
                </div>
                <div class="input-area relative">
                    <label for="Direccion" class="form-label">Dirección</label>
                    <input disabled type="text" name="Direccion" id="Direccion"
                        value="{{$usuario->perfil->Direccion }}"  class="form-control">
                </div>
                <div class="input-area relative">
                    <label for="Pais" class="form-label">Pais</label>
                    <select disabled name="Pais" id="Pais" class="form-control">
                        @foreach ($paises as $obj)
                            @if ($pais->Id == $obj->Id)
                                <option class="dark:bg-slate-700" value="{{ $obj->Id }}"
                                    selected>{{ $obj->Nombre }}</option>
                            @else
                                <option class="dark:bg-slate-700"
                                    value="{{ $obj->Id }}">
                                    {{ $obj->Nombre }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="input-area relative">
                    <label for="Departamento" class="form-label">Departamento</label>
                    <select disabled name="Departamento" id="Departamento" class="form-control">
                        @foreach ($departamentos as $obj)
                            @if ($departamento->Id == $obj->Id)
                                <option class="dark:bg-slate-700" value="{{ $obj->Id }}"
                                    selected>{{ $obj->Nombre }}</option>
                            @else
                                <option class="dark:bg-slate-700"
                                    value="{{ $obj->Id }}">
                                    {{ $obj->Nombre }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="input-area relative">
                    <label for="Municipio" class="form-label">Municipio</label>
                    <select disabled name="Municipio" id="Municipio" class="form-control">
                        @foreach ($municipios as $obj)
                            <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                {{ old('Municipio') == $obj->Id ? 'selected' : '' }}>
                                {{ $obj->Nombre }}</option>
                        @endforeach
                        @foreach ($municipios as $obj)
                            @if ($usuario->perfil->Municipio == $obj->Id)
                                <option class="dark:bg-slate-700" value="{{ $obj->Id }}"
                                    selected>{{ $obj->Nombre }}</option>
                            @else
                                <option class="dark:bg-slate-700"
                                    value="{{ $obj->Id }}">
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
                    <label for="EntidadCertificadora" class="form-label">Entidad
                        Certificadora</label>
                    <select disabled name="EntidadCertificadora" id="EntidadCertificadora"
                        class="form-control">
                        @foreach ($entidades as $obj)
                            @if ($usuario->perfil->Certificador == $obj->Id)
                                <option class="dark:bg-slate-700" value="{{ $obj->Id }}"
                                    selected>{{ $obj->Nombre }}</option>
                            @else
                                <option class="dark:bg-slate-700"
                                    value="{{ $obj->Id }}">
                                    {{ $obj->Nombre }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="input-area relative">
                    <label for="TipoCertificado" class="form-label">Tipo Certificado</label>
                    <select disabled name="TipoCertificado" id="TipoCertificado" class="form-control">
                        @foreach ($tipos_certificados as $obj)
                            @if ($usuario->perfil->TipoOcupacionCertificada == $obj->Id)
                                <option class="dark:bg-slate-700" value="{{ $obj->Id }}"
                                    selected>{{ $obj->Descripcion }}</option>
                            @else
                                <option class="dark:bg-slate-700"
                                    value="{{ $obj->Id }}">
                                    {{ $obj->Descripcion }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="input-area relative">
                    <label for="NumeroCertificacion" class="form-label">Numero de
                        Certificación</label>
                    <input disabled type="text" name="NumeroCertificacion" id="NumeroCertificacion"
                        value="{{ $usuario->perfil->NumeroCertificacion }}"
                        class="form-control">
                </div>
                <div class="input-area relative">
                    <label for="VigenciaCertificacion" class="form-label">Vigencia de la
                        Certificación</label>
                    <input disabled type="date" name="VigenciaCertificacion"
                        id="VigenciaCertificacion"
                        value="{{ date('Y-m-d', strtotime($usuario->perfil->VigenciaCertificacion)) }}"
                        class="form-control">
                </div>

                <div class="input-area relative">
                        <label for="observaciones" class="form-label">Observaciones</label>
                        <textarea id="observaciones" name="observaciones" rows="5" class="form-control" value="¡Felicitaciones! Tu perfil a sido verificado"></textarea>
                </div>



            </div>
            <br>
            <div style="text-align: right;">
                <button type="submit" name="estado" value="1"
                    class="btn inline-flex justify-center btn-warning">Mandar observaciones</button>
                    <button type="submit" name="estado" value="2"
                    class="btn inline-flex justify-center btn-success">Verificar</button>
            </div>


        </form>
      </div>
    </div>
  </div>
@endsection
