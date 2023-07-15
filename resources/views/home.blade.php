@extends('menu')
@section('contenido')
    @php
        //dd(auth()->user()->name,session('perfil')->Dui,auth()->user(),session('perfil'));
    @endphp
    @if (auth()->user()->active == 0)
        @if (session('perfil')->Activo == 0)
            <!-- Light / Bold Headings -->
            <div class="card ">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Verificación de perfil pendiente</div>
                        </div>
                    </header>
                    <div class="card-text h-full">
                        <p style="text-align: justify" class="text-sm font-Inter text-slate-600 dark:text-slate-300">
                            Queremos informarte que tu perfil está pendiente de verificación por parte de nuestro equipo
                            administrativo. Te pedimos paciencia mientras revisamos y validamos la información
                            proporcionada.
                        </p>
                        <br>
                        <p style="text-align: justify" class="text-sm font-Inter text-slate-600 dark:text-slate-300">
                            Es importante que estés pendiente de tu correo electrónico, ya que nos comunicaremos contigo a
                            través de esa vía para notificarte sobre el estado de tu perfil y cualquier otra información
                            relevante. Te recomendamos revisar tu bandeja de entrada, así como la carpeta de spam o correo
                            no deseado en caso de que nuestra comunicación se haya filtrado allí.
                        </p>
                        <br>

                        <p style="text-align: justify" class="text-sm font-Inter text-slate-600 dark:text-slate-300">
                            Agradecemos tu comprensión y paciencia durante este proceso. Si tienes alguna pregunta o
                            necesitas asistencia adicional, no dudes en contactarnos.
                        </p>
                    </div>
                </div>
            @elseif (session('perfil')->Activo == 1)
                <div class="card">
                    <header class=" card-header noborder">
                        <h4 class="card-title">Actualizar Datos
                        </h4>
                    </header>
                    <div class="card-body px-6 pb-6">
                        <div class="overflow-x-auto -mx-8 dashcode-data-table">
                            <span class=" col-span-8  hidden"></span>
                            <span class="  col-span-4 hidden"></span>
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden ">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                            <div class="input-area relative">
                                                <label for="Nombre" class="form-label">Nombre</label>
                                                <input type="text" name="Nombre" id="Nombre"
                                                    value="{{ auth()->user()->name }}" class="form-control">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="Apellido" class="form-label">Apellido</label>
                                                <input type="text" name="Apellido" id="Apellido"
                                                    value="{{ auth()->user()->last_name }}" class="form-control">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="Email" class="form-label">Email</label>
                                                <input type="email" name="Email" id="Email"
                                                    value="{{ auth()->user()->email }}" class="form-control">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="Dui" class="form-label">Dui</label>
                                                <input type="text" name="Dui" id="Dui"
                                                    value="{{ session('perfil')->Dui }}" class="form-control">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Password</label>
                                                <input type="password" name="Password" id="Password" class="form-control">
                                            </div>
                                            <div class="input-area">
                                                <label for="Profesion" class="form-label">Profesión u oficio</label>
                                                <select name="Profesion" id="Profesion" class="form-control">
                                                    <option value="Ingeniero" class="dark:bg-slate-700"
                                                        {{ old('Profesion') == session('perfil')->Profesion ? 'selected' : '' }}>
                                                        Ingeniero</option>
                                                    <option value="Profesión 2" class="dark:bg-slate-700"
                                                        {{ old('Profesion') == session('perfil')->Profesion ? 'selected' : '' }}>
                                                        Profesión 2</option>
                                                    <option value="Profesión 3" class="dark:bg-slate-700"
                                                        {{ old('Profesion') == session('perfil')->Profesion ? 'selected' : '' }}>
                                                        Profesión 3</option>
                                                    <option value="Profesión 4" class="dark:bg-slate-700"
                                                        {{ old('Profesion') == session('perfil')->Profesion ? 'selected' : '' }}>
                                                        Profesión 4</option>
                                                </select>
                                            </div>
                                            <div class="input-area relative">
                                                <label for="Nacionalidad" class="form-label">Nacionalidad</label>
                                                <select name="Nacionalidad" id="Nacionalidad" class="form-control">
                                                    <option value="Salvadoreño" class="dark:bg-slate-700"
                                                        {{ old('Nacionalidad') == session('perfil')->Nacionalidad ? 'selected' : '' }}>
                                                        Salvadoreño</option>
                                                    <option value="Panameño" class="dark:bg-slate-700"
                                                        {{ old('Nacionalidad') == session('perfil')->Nacionalidad ? 'selected' : '' }}>
                                                        Panameño</option>
                                                    <option value="Nacionalidad 3" class="dark:bg-slate-700"
                                                        {{ old('Nacionalidad') == session('perfil')->Nacionalidad ? 'selected' : '' }}>
                                                        Nacionalidad 3</option>
                                                    <option value="Nacionalidad 4" class="dark:bg-slate-700"
                                                        {{ old('Nacionalidad') == session('perfil')->Nacionalidad ? 'selected' : '' }}>
                                                        Nacionalidad 4</option>
                                                </select>
                                            </div>
                                            <div class="input-area relative">
                                                <label for="Direccion" class="form-label">Dirección</label>
                                                <input type="text" name="Direccion" id="Direccion"
                                                    value="{{ session('perfil')->Direccion }}" class="form-control">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="Pais" class="form-label">Pais</label>
                                                <select name="Pais" id="Pais" class="form-control">
                                                    @foreach ($paises as $obj)
                                                        @if (session('pais')->Id == $obj->Id)
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
                                                <select name="Departamento" id="Departamento" class="form-control">
                                                    @foreach ($departamentos as $obj)
                                                        @if (session('departamento')->Id == $obj->Id)
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
                                                <select name="Municipio" id="Municipio" class="form-control">
                                                    @foreach ($municipios as $obj)
                                                        <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                            {{ old('Municipio') == $obj->Id ? 'selected' : '' }}>
                                                            {{ $obj->Nombre }}</option>
                                                    @endforeach
                                                    @foreach ($municipios as $obj)
                                                        @if (session('perfil')->Municipio == $obj->Id)
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
                                                <input type="tel" name="Telefono" id="Telefono"
                                                    value="{{ session('perfil')->Telefono }}" class="form-control">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="EntidadCertificadora" class="form-label">Entidad
                                                    Certificadora</label>
                                                <select name="EntidadCertificadora" id="EntidadCertificadora"
                                                    class="form-control">
                                                    @foreach ($entidades as $obj)
                                                        @if (session('perfil')->Certificador == $obj->Id)
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
                                                <select name="TipoCertificado" id="TipoCertificado" class="form-control">
                                                    @foreach ($tipos_certificados as $obj)
                                                        @if (session('perfil')->TipoOcupacionCertificada == $obj->Id)
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
                                                <input type="text" name="NumeroCertificacion" id="NumeroCertificacion"
                                                    value="{{ session('perfil')->NumeroCertificacion }}"
                                                    class="form-control">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="VigenciaCertificacion" class="form-label">Vigencia de la
                                                    Certificación</label>
                                                <input type="date" name="VigenciaCertificacion"
                                                    id="VigenciaCertificacion"
                                                    value="{{ date('Y-m-d', strtotime(session('perfil')->VigenciaCertificacion)) }}"
                                                    class="form-control">
                                            </div>


                                        </div>
                                        <br>
                                        <div style="text-align: right;">
                                            <button type="submit"
                                                class="btn inline-flex justify-center btn-dark">Actualizar</button>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif (session('perfil')->Activo == 2)
                <div class="card ">
                    <div class="card-body flex flex-col p-6">
                        <header
                            class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                            <div class="flex-1">
                                <div class="card-title text-slate-900 dark:text-white">¡Perfil verificado!
                                </div>
                            </div>
                        </header>
                        <div class="card-text h-full">
                            <p style="text-align: justify" class="text-sm font-Inter text-slate-600 dark:text-slate-300">
                                Nos complace informarte que tu perfil ha sido verificado exitosamente. Ahora puedes
                                disfrutar de todas las funcionalidades y beneficios de nuestra plataforma. ¡Gracias por tu
                                paciencia y colaboración!
                            </p>
                        </div>
                    </div>
        @endif
    @endif
@endsection
