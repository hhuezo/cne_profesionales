@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <div class=" space-y-5">
        <div class="card">
            <header class=" card-header noborder">
                <h4 class="card-title">Reiniciar base de datos</h4>
                <form method="POST" action="{{ url('configuracion/reset_database') }}">
                    @csrf
                    <button class="btn btn-dark" onclick="loading()">Reset</button>
                </form>
            </header>
            <div class="card">

                <div id="loading-indicator" style="text-align: center; display:none">
                    <center>
                        <img src="{{ asset('img/ajax-loader.gif') }}">
                    </center>
                    <br>
                </div>

            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}" sync></script>
    <script>
        function loading() {
            // Show loading indicator
            document.getElementById('loading-indicator').style.display = 'block';
        }
    </script>
@endsection
