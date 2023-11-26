<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento PDF</title>
    <style>
        #the-canvas {
            border: 1px solid black;
            direction: ltr;
        }

        body, html {
            height: 100%;
            margin: 0;
        }

        .container {
        display: grid;
        place-items: center;
        height: 100vh;
        }
    </style>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('mjs/pdf.mjs') }}" type="module"></script>

<script type="module">
  // If absolute URL from the remote server is provided, configure the CORS
  // header on that server.
  var url = "{{ asset('docs').'/'.$url }}";

  // Loaded via <script> tag, create shortcut to access PDF.js exports.
  var { pdfjsLib } = globalThis;

  // The workerSrc property shall be specified.
  pdfjsLib.GlobalWorkerOptions.workerSrc = "{{asset('mjs/pdf.worker.mjs')}}";

  var pdfDoc = null,
      pageNum = 1,
      pageRendering = false,
      pageNumPending = null,
      scale = 1.5,
      canvas = document.getElementById('the-canvas'),
      ctx = canvas.getContext('2d');

  /**
   * Get page info from document, resize canvas accordingly, and render page.
   * @param num Page number.
   */
  function renderPage(num) {
    pageRendering = true;
    // Using promise to fetch the page
    pdfDoc.getPage(num).then(function(page) {
      var viewport = page.getViewport({scale: scale});
      canvas.height = viewport.height;
      canvas.width = viewport.width;

      // Render PDF page into canvas context
      var renderContext = {
        canvasContext: ctx,
        viewport: viewport
      };
      var renderTask = page.render(renderContext);

      // Wait for rendering to finish
      renderTask.promise.then(function() {
        pageRendering = false;
        if (pageNumPending !== null) {
          // New page rendering is pending
          renderPage(pageNumPending);
          pageNumPending = null;
        }
      });
    });

    // Update page counters
    document.getElementById('page_num').textContent = num;
  }

  /**
   * If another page rendering in progress, waits until the rendering is
   * finised. Otherwise, executes rendering immediately.
   */
  function queueRenderPage(num) {
    if (pageRendering) {
      pageNumPending = num;
    } else {
      renderPage(num);
    }
  }

  /**
   * Displays previous page.
   */
  function onPrevPage() {
    if (pageNum <= 1) {
      return;
    }
    pageNum--;
    queueRenderPage(pageNum);
  }
  document.getElementById('prev').addEventListener('click', onPrevPage);

  /**
   * Displays next page.
   */
  function onNextPage() {
    if (pageNum >= pdfDoc.numPages) {
      return;
    }
    pageNum++;
    queueRenderPage(pageNum);
  }
  document.getElementById('next').addEventListener('click', onNextPage);

  /**
   * Asynchronously downloads PDF.
   */
  pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
    pdfDoc = pdfDoc_;
    document.getElementById('page_count').textContent = pdfDoc.numPages;

    // Initial/first page rendering
    renderPage(pageNum);
  });
</script>
<div class="container">

<div>
  <button id="prev">Anterior</button>
  <button id="next">Siguiente</button>
  &nbsp; &nbsp;
  <span>Pagina: <span id="page_num"></span> / <span id="page_count"></span></span>
</div>

<canvas id="the-canvas"></canvas>
</div>

    <!-- Script para deshabilitar la impresión y el menú contextual -->
    <script>
       $(document).ready(function () {
            // Deshabilitar la impresión
            window.addEventListener('beforeprint', function (e) {
                e.preventDefault();
                return false;
            });

            window.addEventListener('afterprint', function (e) {
                e.preventDefault();
                return false;
            });

            // También puedes deshabilitar el menú contextual
            window.addEventListener('contextmenu', function (e) {
                e.preventDefault();
                return false;
            });

            // Deshabilitar la impresión
        $(document).keydown(function(e) {
            if ((e.ctrlKey || e.metaKey) && (e.key === 'P' || e.key === 'p' || e.charCode === 16)) {
                e.preventDefault();
                e.stopPropagation();
            }
        });
        });
    </script>

</body>
</html>
