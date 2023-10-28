{{-- <embed src="{{ asset('docs') }}/{{$certificacion->DocumentoUrl}}" width="100%" height="100%"> --}}

<!doctype html>
<html>

<head>
    <style>
        .contenedor {
            position: relative; /* Cambia 'absolute' a 'relative' para que el contenido fluya correctamente */
        }

        .pdf {
            width: 100%; /* Establece el ancho al 100% del contenedor */
        }

        .bloqueo {
            position: relative; /* Cambia 'relative' a 'absolute' si deseas que el bloqueo cubra el PDF */
            background-color: rgba(255, 255, 255, 0.00);
            width: 100%; /* Establece el ancho al 100% del contenedor */
            height: 850px;
        }
    </style>
</head>

<body>
    <div class="contenedor">
        <div class="pdf" align="center">
            <object data="{{ asset('docs') }}/{{ $certificacion->DocumentoUrl }}" type="application/PDF" width="100%"
                height="850px" align="right"></object>
        </div>

        <div class="bloqueo">
            <!-- Si deseas que el bloqueo cubra el PDF, cambia 'position: relative' a 'position: absolute' -->
        </div>
    </div>
</body>

</html>
