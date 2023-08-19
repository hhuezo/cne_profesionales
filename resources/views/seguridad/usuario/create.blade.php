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
                                    <div class="card-title text-slate-900 dark:text-white">Nuevo usuario</div>
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
                                        <input type="text" name="name" value="{{old('name')}}" required class="form-control">
                                    </div>
                                 


                                    <div class="input-area">
                                        <label for="Profesion" class="form-label">Apellido</label>
                                        <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control" required >
                                    </div>



                                  


                                    <div class="input-area relative">
                                        <label for="Nacionalidad" class="form-label">Correo</label>
                                        <input type="email" name="email" value="{{old('email')}}" required class="form-control">
                                    </div>
                                    <div class="input-area relative">
                                        <label for="Direccion" class="form-label">Contraseña</label>
                                        <input type="password" name="password" value="{{old('password')}}" required class="form-control">
                                    </div>
                                   

                                  

                                </div>
                                <br>
                                <div style="text-align: right;">
                                    <button type="submit"
                                        class="btn inline-flex justify-center btn-dark">Guardar</button>
                                </div>


                            </form>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>

@endsection
