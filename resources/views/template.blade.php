<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DGEHM</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('img/el_salvador.png') }} " rel="icon">
    <link href="{{ asset('img/el_salvador.png') }} " rel="apple-touch-icon">

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

        .container {
            max-width: 960px;
        }
    </style>



</head>

<body>

  

    <x-menu-header />

    <x-menu />




    <main id="main">


        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="" data-aos="fade-up">
                @yield('contenido')               

            </div>
        </section><!-- End About Section -->





    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <x-menu-footer />
    
    <!-- End Footer -->

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
