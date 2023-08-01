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
                                <div class="card-title text-slate-900 dark:text-white">Perfil</div>
                            </div>

                        </header>
                        <form method="POST">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                <div class="input-area relative">
                                    <label for="Nombre" class="form-label">Nombre</label>
                                    <input type="text" name="Nombre" value="{{ $perfil->usuario->name }}" class="form-control">
                                </div>
                                <div class="input-area relative">
                                    <label for="Apellido" class="form-label">Apellido</label>
                                    <input type="text" name="Apellido" value="{{ $perfil->usuario->last_name }}" class="form-control">
                                </div>

                                <div class="input-area relative">
                                    <label for="Dui" class="form-label">DUI</label>
                                    <input type="text" name="Dui" value="{{ $perfil->Dui }}" class="form-control">
                                </div>

                                <div class="input-area relative">
                                    <label for="Dui" class="form-label">Adjuntar DUI</label>
                                    <input type="file" name="DuiURL"  class="form-control">
                                </div>

                                <div class="input-area">
                                    <label for="Profesion" class="form-label">Profesión u oficio</label>
                                    <select name="Profesion" id="Profesion" class="form-control">
                                        <option value="Ingeniero" class="dark:bg-slate-700">Ingeniero</option>
                                        <option value="Profesión 2" class="dark:bg-slate-700">Profesión 2</option>
                                        <option value="Profesión 3" class="dark:bg-slate-700">Profesión 3</option>
                                        <option value="Profesión 4" class="dark:bg-slate-700">Profesión 4</option>
                                    </select>
                                </div>
                                <div class="input-area relative">
                                    <label for="Dui" class="form-label">Adjuntar titulo</label>
                                    <input type="file" name="DuiURL"  class="form-control">
                                </div>
                                <div class="input-area relative">
                                    <label for="Nacionalidad" class="form-label">Nacionalidad</label>
                                    <select name="Nacionalidad" id="Nacionalidad" class="form-control">
                                        <option value="Salvadoreño" class="dark:bg-slate-700">Salvadoreño</option>
                                        <option value="Panameño" class="dark:bg-slate-700">Panameño</option>
                                        <option value="Nacionalidad 3" class="dark:bg-slate-700">Nacionalidad 3
                                        </option>
                                        <option value="Nacionalidad 4" class="dark:bg-slate-700">Nacionalidad 4
                                        </option>
                                    </select>
                                </div>
                                <div class="input-area relative">
                                    <label for="Direccion" class="form-label">Dirección</label>
                                    <input type="text" name="Direccion" id="Direccion" class="form-control">
                                </div>
                                <div class="input-area relative">
                                    <label for="Pais" class="form-label">Pais</label>
                                    <select name="Pais" id="Pais" class="form-control">
                                        @foreach ($paises as $obj)
                                            <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                {{ old('Pais') == $obj->Id ? 'selected' : '' }}>{{ $obj->Nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-area relative">
                                    <label for="Departamento" class="form-label">Departamento</label>
                                    <select name="Departamento" id="Departamento" class="form-control">
                                        @foreach ($departamentos as $obj)
                                            <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                {{ old('Departamento') == $obj->Id ? 'selected' : '' }}>
                                                {{ $obj->Nombre }}</option>
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
                                    </select>
                                </div>
                                <div class="input-area relative">
                                    <label for="Telefono" class="form-label">Telefono</label>
                                    <input type="tel" name="Telefono" id="Telefono" class="form-control">
                                </div>
                                <div class="input-area relative">
                                    <label for="EntidadCertificadora" class="form-label">Entidad
                                        Certificadora</label>
                                    <select name="EntidadCertificadora" id="EntidadCertificadora"
                                        class="form-control">
                                        @foreach ($entidades as $obj)
                                            <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                {{ old('EntidadCertificadora') == $obj->Id ? 'selected' : '' }}>
                                                {{ $obj->Nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-area relative">
                                    <label for="TipoCertificado" class="form-label">Tipo Certificado</label>
                                    <select name="TipoCertificado" id="TipoCertificado" class="form-control">
                                        @foreach ($tipos_certificados as $obj)
                                            <option value="{{ $obj->Id }}" class="dark:bg-slate-700"
                                                {{ old('TipoCertificado') == $obj->Id ? 'selected' : '' }}>
                                                {{ $obj->Descripcion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-area relative">
                                    <label for="NumeroCertificacion" class="form-label">Numero de
                                        Certificación</label>
                                    <input type="text" name="NumeroCertificacion" id="NumeroCertificacion"
                                        class="form-control">
                                </div>
                                <div class="input-area relative">
                                    <label for="VigenciaCertificacion" class="form-label">Vigencia de la
                                        Certificación</label>
                                    <input type="date" name="VigenciaCertificacion" id="VigenciaCertificacion"
                                        class="form-control">
                                </div>


                            </div>
                            <br>
                            <div style="text-align: right;">
                                <button type="submit"
                                    class="btn inline-flex justify-center btn-dark">Registrar</button>
                            </div>


                        </form>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>




@endsection
