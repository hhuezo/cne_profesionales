<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>BizLand Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('template/img/favicon.png') }} " rel="icon">
    <link href="{{ asset('template/img/apple-touch-icon.png') }} " rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('template/vendor/aos/aos.css') }} " rel="stylesheet">
    <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
    <link href="{{ asset('template/vendor/bootstrap-icons/bootstrap-icons.css') }} " rel="stylesheet">
    <link href="{{ asset('template/vendor/boxicons/css/boxicons.min.css') }} " rel="stylesheet">
    <link href="{{ asset('template/vendor/glightbox/css/glightbox.min.css') }} " rel="stylesheet">
    <link href="{{ asset('template/vendor/swiper/swiper-bundle.min.css') }} " rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('template/css/style.css') }} " rel="stylesheet">

    <!-- =======================================================
  * Template Name: BizLand
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <style>
        .page {
            background-color: #3c4557 !important;
        }

        #topbar {
            background: #3c4557 !important;
        }

        #footer .footer-top .footer-links ul a {
            color: #ffff;
        }

        .about {
            text-align: center;
        }

        .aos-init {
            margin-top: -70px;
        }
    </style>

    <?php
    $dias = ['', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
    $meses = ['', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    
    $dia = $dias[date('N')];
    $mes = $meses[date('m') + 0];
    $fecha = $dia . ' ' . date('d') . ' de ' . $mes . ' de ' . date('Y');
    ?>


</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i><a href="#">{{ $fecha }}</a></i>

                @if (auth()->check())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">
                        <i class="d-flex align-items-center ms-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-rolodex" viewBox="0 0 16 16">
                                <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                <path
                                    d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1H1Zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1V2Z" />
                            </svg>
                            &nbsp &nbsp
                        Cerrar sesión</button>
                        </i>
                </form>
                    @else
                    <a href="{{ url('login') }}">
                        <i class="d-flex align-items-center ms-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-rolodex" viewBox="0 0 16 16">
                                <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                <path
                                    d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1H1Zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1V2Z" />
                            </svg>
                            <span>Iniciar sesión</span></i>
                    </a>
                    <a href="{{ url('register') }}">
                        <i class="d-flex align-items-center ms-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                <path
                                    d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                            </svg>
                            <span>Registro de profesionales</span></i>
                    </a>
                @endif


            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                @if (session('array_bandera'))
                    @for ($i = 0; $i < count(session('array_bandera')); $i++)
                        <a href="{{ session('array_url')[$i] }}" class="linkedin" target="_blank"><img
                                style="width: 20px" src="{{ asset('img') }}/{{ session('array_bandera')[$i] }}"></a>
                    @endfor
                @endif
            </div>
        </div>
    </section>

    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between py-4">
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="#" class="logo logos"><img src="{{ asset('img/Para_web.png') }}" alt=""></a>
            <a href="#" class="logo logos"><img src="{{ asset('img/image15.jpeg') }}" alt=""></a>
            <a href="#" class="logo logos"><img src="{{ asset('img/image16.jpeg') }}" alt=""></a>
            <a href="#" class="logo logos"><img src="{{ asset('img/image17.png') }}" alt=""></a>
        </div>
    </header><!-- End Header -->

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            {{-- <h1 class="logo">&nbsp; </h1> --}}
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->




            <nav id="navbar" class="navbar">
                <ul class="text-center">
                    <li class="dropdown"><a href="{{ url('/') }}"><span>Inicio</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li class="dropdown"><a href="#"><span>Proceso de certificación</span> <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="{{ url('publico/menu_flujo') }}">Flujo del proceso o pasos</a></li>
                                    <li><a href="{{ url('publico/menu_requisitos') }}">Requisito para la
                                            certificación</a></li>
                                    <li><a href="{{ url('publico/menu_perfil') }}">Perfil del profesional</a></li>
                                    <li><a href="{{ url('publico/menu_contenido_formativo') }}">Contenido
                                            formativo</a>
                                    </li>
                                    <li><a href="{{ url('publico/menu_unidades_formativas') }}">Unidades
                                            formativas</a>
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
                                    <li><a href="{{ url('publico/menu_flujo_proceso') }}">Flujo del proceso o
                                            pasos</a>
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

                    <li class="dropdown"><a href="{{ url('publico/busqueda') }}"><span>Personas certificadas</span>
                        </a>

                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->



    <main id="main">


        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="" data-aos="fade-up">
                @yield('contenido')
                {{-- <div class="section-title">
          <h2>About</h2>
          <h3>Find Out More <span>About Us</span></h3>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <img src="{{ asset( 'template/img/about.jpg') }} " class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li>
                <i class="bx bx-store-alt"></i>
                <div>
                  <h5>Ullamco laboris nisi ut aliquip consequat</h5>
                  <p>Magni facilis facilis repellendus cum excepturi quaerat praesentium libre trade</p>
                </div>
              </li>
              <li>
                <i class="bx bx-images"></i>
                <div>
                  <h5>Magnam soluta odio exercitationem reprehenderi</h5>
                  <p>Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna pasata redi</p>
                </div>
              </li>
            </ul>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum
            </p>
          </div>
        </div> --}}

            </div>
        </section><!-- End About Section -->





    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top page text-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <img src="{{ asset('img/Logo_Gobierno.svg') }}" class="img-fluid"
                            alt=""><br><br><br>
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

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('template/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('template/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('template/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('template/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('template/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('template/js/main.js') }}"></script>

</body>

</html>
