@extends('vendor/laravel-grapes/builder_root')

@section('contentScript')
<meta name="csrf-token" content="{{ csrf_token() }}">
@if($snippet!=NULL)
@php
    $contenidoHtml = $snippet->html_content;
$contenidoHtmlFormateado = str_replace("\n", "\\n", $contenidoHtml);
//dd($snippet->css_content);
@endphp
<script >
    editor.setComponents('{!! $contenidoHtmlFormateado !!}');
    editor.setStyle('{!! $snippet->css_content !!}');
    //editor.render();
</script>
@endif
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">

    // Escucha el evento 'component:selected'
    editor.on('component:selected', function(component) {
        // Comprueba si el componente seleccionado es un 'wrapper'
        if (component.get('type') === 'wrapper') {
            // Haz algo con el componente...
            console.log('Has seleccionado un componente de tipo "wrapper"');
        }
    });



    document.getElementById('btn-guardar').addEventListener('click', function() {

        let html = editor.getHtml();
        let css = editor.getCss();
        //let components = editor.getComponents();
        //console.log(components);

        let parametros = {
                        _token: $('meta[name="csrf-token"]').attr('content'), // Incluye el token CSRF
                        "html_content": html,
                        "css_content": css,
                        //"json_content":components,
                    };
        $.ajax({
                    url: "{{ url('/editor/guardarPagina', '') }}",
                    type: 'POST',
                    data: parametros,
                    success: function (response) {
                        console.log(response.message);
                        Swal.fire({
                        title: 'Exito!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });

                    },
                    error: function (error) {
                        // Las credenciales son incorrectas, muestra un mensaje de error
                        console.error(error.responseJSON.message);

                    }
                });
    });

</script>
@endsection
