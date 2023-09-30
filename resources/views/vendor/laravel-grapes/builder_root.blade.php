<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} | Page Builder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/laravel-grapes.css') }}" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }
    </style>
    @routes
</head>

<body>
    <div class="card">
        <button type="button" class="btn btn-primary" id="btn-guardar">Guardar</button>
    </div>

    <input id="Pages" type="hidden" pages-data="">
    <input id="Languages" type="hidden" lang-data="{{ json_encode(config('lg.languages')) }}">
    <div id="gjs" style="height:100%; overflow:hidden" class="gjs-editor-cont"></div>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">

            <strong class="mr-auto"></strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="outline:0;">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="{{ asset('/js/laravel-grapes.js') }}"></script>
</body>

<script type="text/javascript">
    var editor = grapesjs.init({
        // Tus opciones aquí...
    });

    // Escucha el evento 'component:selected'
    editor.on('component:selected', function(component) {
        // Comprueba si el componente seleccionado es un 'wrapper'
        if (component.get('type') === 'wrapper') {
            // Haz algo con el componente...
            console.log('Has seleccionado un componente de tipo "wrapper"');
        }
    });


    document.getElementById('btn-guardar').addEventListener('click', function() {
        // var gjsContent = document.getElementById('gjs').innerHTML;
        // console.log(gjsContent);
        //console.log("hola");
        let tipo = componente.get('type');
        console.log(tipo);
    });
</script>

</html>
