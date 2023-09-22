<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <meta name="description" content="CNE">
    <meta name="keywords" content="CNE">

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/aos/aos.css" rel="stylesheet">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="page d-flex align-items-center py-4">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="row w-100 text-white ps-5 py-3">
                <div class="col d-flex align-items-center">
                    <div><span class="bass">{{ $fecha }}</span></div>
                </div>
                <div class="col text-center">
                    <a href="{{ url('login') }}">
                        <button type="button" class="btn text-white"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-file-person"
                                viewBox="0 0 16 16">
                                <path
                                    d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                                <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg> Identificarse</button></a>
                </div>
                <div class="col text-center">
                    <a href="{{ url('register') }}"><button type="button" class="btn text-white"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-add" viewBox="0 0 16 16">
                                <path
                                    d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                                <path
                                    d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                            </svg> Registrarse</button></a>
                </div>
                <div class="col text-center">
                    <div class="input-group rounded">
                        <input type="search" class="form-control rounded" placeholder="Buscar" aria-label="Buscar"
                            aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </section>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between py-4">
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="#" class="logo logos"><img src="img/Para_web.png" alt=""></a>
            <a href="#" class="logo logos"><img src="img/image15.jpeg" alt=""></a>
            <a href="#" class="logo logos"><img src="img/image16.jpeg" alt=""></a>
            <a href="#" class="logo logos"><img src="img/image17.png" alt=""></a>
        </div>
    </header><!-- End Header -->
    <header id="header" class="d-flex align-items-center page sticky-header">
        <div class="container d-flex align-items-center justify-content-center">

            <!-- <h1 class="logo"><a href="#">HOME<span>.</span></a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

            <nav id="navbar" class="navbar">
                <ul class="text-center">
                    <li class="dropdown"><a href="#"><span>Inicio</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li class="dropdown"><a href="#"><span>Proceso de certificación</span> <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="{{ url('publico/menu_flujo') }}">Flujo del proceso o pasos</a></li>
                                    <li><a href="{{ url('publico/menu_requisitos') }}">Requisito para la
                                            certificación</a></li>
                                    <li><a href="{{ url('publico/menu_perfil') }}">Perfil del profesional</a></li>
                                    <li><a href="{{ url('publico/menu_contenido_formativo') }}">Contenido formativo</a>
                                    </li>
                                    <li><a href="{{ url('publico/menu_unidades_formativas') }}">Unidades formativas</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Organismos certificadores <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">n1</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="scrollto" href="#">Registros<i
                                class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li class="dropdown"><a href="#"><span>Instrucciones para el registro de
                                        certif.</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li>
                                    <li><a href="{{ url('publico/menu_flujo_proceso') }}">Flujo del proceso o pasos</a>
                                    </li>
                                    <li>
                                    <li><a href="{{ url('publico/menu_requisito_registro') }}">Requisitos para el
                                            registro</a>
                                    </li>
                                    <li>
                                    <li><a href="{{ url('publico/menu_requisito_proyectos') }}">Registro de
                                            proyectos</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Directorio especialista certificados<i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="{{ url('publico/menu_usuario_consulta') }}">Registro de usuario de
                                            consulta</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#">Documentos técnicos<i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li class="dropdown"><a href="">Marco normatico<i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="">Leyes</a></li>
                                    <li><a href="">Reglamentos ténicos</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="">PRESENTACIONES<i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="">n1</a></li>
                                    <li><a href="">n2</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="">Manuales<i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="">n1</a></li>
                                    <li><a href="">n2</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="">Encuestas de consumo e.<i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="">Sectorial</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="">Estudios <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="">Alumbrado público</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Contactenos</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li class="dropdown"><a href="#"><span>Consulta de procesos</span> <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Ingresar campos</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#"><span>Preguntas frecuente</span> <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Ingresar campos</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <div class="container d-flex align-items-center justify-content-center p-4">
        <a href="#" class=""><img src="img/image18.png" alt=""></a>
    </div>
</body>
<footer id="footer">
    <div class="footer-top page text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-contact">
                    <img src="img/Logo_Gobierno.svg" class="img-fluid" alt=""><br>
                    <a href="https://maps.app.goo.gl/mnZjopCXPKfLNTYC9" class="text-white">
                        <p>
                            Alameda Manuel Enrique Araujo 5500<br> San Salvador<br>
                            El Salvador <br><br>
                    </a>
                    <strong>Telefono:</strong> +503 0000-0000<br>
                    <strong>Correo:</strong> info@example.com<br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Enlaces Utiles</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Documentos</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Formularios</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Horarios</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Entidades</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links text-white">
                    <h4>Redes Sociales</h4>
                    <p>Lorem Ipsum</p>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</footer><!-- End Footer -->

</html>
<style>
    .bass {
        vertical-align: baseline !important;
        align-items: center;
        justify-content: center;
    }

    .page {
        background-color: #3c4557 !important;
    }

    .page2 {
        background-color: #92d050;
    }

    .btn-info {
        background-color: #2a6099;
        border: solid 1px #2a6099;
    }

    .btn:hover {
        font-weight: bold;
    }

    .content1 {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
    }

    HEAD .sticky-header {
        position: sticky;
        top: 0;
        /* Cambia esto al color de fondo que desees */
        z-index: 100;
        /* Asegura que esté por encima de otros elementos */
    }
</style>
