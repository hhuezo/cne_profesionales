<!DOCTYPE html>
<!-- Template Name: DashCode - HTML, React, Vue, Tailwind Admin Dashboard Template Author: Codeshaper Website: https://codeshaper.net Contact: support@codeshaperbd.net Like: https://www.facebook.com/Codeshaperbd Purchase: https://themeforest.net/item/dashcode-admin-dashboard-template/42600453 License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project. -->
<html lang="zxx" dir="ltr" class="light semiDark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>DGEHM</title>
    <link rel="icon" type="image/png" href="{{ asset('img/el_salvador.png') }}">
    <!-- BEGIN: Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- END: Google Font -->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/SimpleBar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rt-plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <!-- END: Theme CSS-->
    <script src="{{ asset('assets/js/settings.js') }}" sync></script>
    <script src="{{ asset('assets/js/iconify-icon.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}" sync></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <style>
        .card-title,
        .form-label,
        .table-td {
            text-transform: none;
        }
    </style>
</head>

<body class=" font-inter dashcode-app" id="body_class">
    <!-- [if IE]> <p class="browserupgrade"> You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security. </p> <![endif] -->
    <main class="app-wrapper">
        <!-- BEGIN: Sidebar -->
        <!-- BEGIN: Sidebar -->
        <div class="sidebar-wrapper group">
            <div id="bodyOverlay"
                class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden"></div>
            <div class="logo-segment">
                <a class="flex items-center" href="{{ url('/') }}">
                    {{-- <img src="{{ asset('assets/images/logo/logo-c.svg') }}" class="black_logo" alt="logo">
                    <img src="{{ asset('assets/images/logo/logo-c-white.svg') }}" class="white_logo" alt="logo"> --}}
                    <span
                        class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">DGEHM</span>
                </a>
                <!-- Sidebar Type Button -->
                <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
                    <iconify-icon class="sidebarDotIcon extend-icon text-slate-900 dark:text-slate-200"
                        icon="fa-regular:dot-circle"></iconify-icon>
                    <iconify-icon class="sidebarDotIcon collapsed-icon text-slate-900 dark:text-slate-200"
                        icon="material-symbols:circle-outline"></iconify-icon>
                </div>
                <button class="sidebarCloseIcon text-2xl">
                    <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line">
                    </iconify-icon>
                </button>
            </div>
            <div id="nav_shadow"
                class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
      opacity-0">
            </div>
            <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] overflow-y-auto z-50"
                id="sidebar_menus">

                <ul class="sidebar-menu">
                    <li>
                        <a href="{{ url('home') }}" class="navItem">
                            <span class="flex items-center">

                                <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
                                <span>Home</span>
                            </span>
                        </a>
                    </li>
                    @can('edit users')
                        <li class="">
                            <a href="#" class="navItem">
                                <span class="flex items-center">
                                    <iconify-icon class=" nav-icon" icon="heroicons-outline:user-group"></iconify-icon>
                                    <span>Seguridad</span>
                                </span>
                                <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                            </a>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a href="{{ url('seguridad/usuario') }}">Usuario</a>
                                </li>
                                <li>
                                    <a href="{{ url('seguridad/role') }}">Rol</a>
                                </li>
                                {{-- <li>
                                    <a href="{{ url('seguridad/permission') }}">Permisos</a>
                                </li> --}}
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('seguridad/usuarios') }}" class="navItem">
                                <span class="flex items-center">

                                    <iconify-icon class=" nav-icon" icon="heroicons-outline:user"></iconify-icon>
                                    <span>Información de perfil</span>
                                </span>
                            </a>
                        </li>
                    @endcan



                    @can('read catalogos')
                        <li class="">
                            <a href="#" class="navItem">
                                <span class="flex items-center">
                                    <iconify-icon class=" nav-icon" icon="heroicons-outline:clipboard-list">
                                    </iconify-icon>
                                    {{-- <span>Verificar Usuarios</span>
                                <iconify-icon class=" nav-icon" icon="heroicons-outline:user"></iconify-icon> --}}
                                    <span>Catalogos</span>
                                </span>
                                <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                            </a>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a href="{{ url('catalogo/sector') }}">Sector</a>
                                </li>

                                <li>
                                    <a href="{{ url('catalogo/profesion') }}">Profesión</a>
                                </li>

                                <li>
                                    <a href="{{ url('catalogo/lugar_formacion') }}">Lugares formación</a>
                                </li>

                                <li>
                                    <a href="{{ url('catalogo/pais') }}">Paises</a>
                                </li>

                            </ul>
                        </li>
                    @endcan

                    @can('edit users')
                        <li class="">
                            <a href="#" class="navItem">
                                <span class="flex items-center">
                                    <iconify-icon class=" nav-icon" icon="grommet-icons:document-config"
                                        style="color: white;"></iconify-icon>

                                    <span>Configuración</span>
                                </span>

                                <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                            </a>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a href="{{ url('configuracion/pais') }}">País</a>
                                </li>
                                <li>
                                    <a href="{{ url('configuracion/alcance') }}">Alcance</a>
                                </li>
                                <li>
                                    <a href="{{ url('editor') }}">Editor de páginas</a>
                                </li>

                                <li>
                                    <a href="{{ url('configuracion/correo') }}">Correo</a>
                                </li>

                                <li>
                                    <a href="{{ url('publico/menu') }}">Menús</a>
                                </li>



                            </ul>
                        </li>
                    @endcan

                    @can('read certificacion')
                        <li>
                            <a href="{{ url('registro/certificacion') }}" class="navItem">
                                <span class="flex items-center">

                                    <iconify-icon class=" nav-icon" icon="heroicons-outline:user"></iconify-icon>
                                    <span>Certificación</span>
                                </span>
                            </a>
                        </li>
                    @endcan


                    @can('read proyecto')
                        <li>
                            <a href="{{ url('registro/proyecto') }}" class="navItem">
                                <span class="flex items-center">
                                    <iconify-icon class=" nav-icon" icon="material-symbols:add-notes"
                                        style="color: white;"></iconify-icon>
                                    <span>Proyectos realizados</span>
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('registro/documento') }}" class="navItem">
                                <span class="flex items-center">
                                    <iconify-icon class=" nav-icon" icon="material-symbols:add-notes"
                                        style="color: white;"></iconify-icon>
                                    <span>Documentos</span>
                                </span>
                            </a>
                        </li>
                    @endcan

                </ul>



                <!-- Upgrade Your Business Plan Card Start -->

                <!-- Upgrade Your Business Plan Card Start -->
            </div>
        </div>
        <!-- End: Sidebar -->
        <!-- End: Sidebar -->
        <!-- BEGIN: Settings -->

        <!-- BEGIN: Settings -->
        <!-- Settings Toggle Button -->
        <button style="display:none"
            class="fixed ltr:md:right-[-29px] ltr:right-0 rtl:left-0 rtl:md:left-[-29px] top-1/2 z-[888] translate-y-1/2 bg-slate-800 text-slate-50 dark:bg-slate-700 dark:text-slate-300 cursor-pointer transform rotate-90 flex items-center text-sm font-medium px-2 py-2 shadow-deep ltr:rounded-b rtl:rounded-t"
            data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">
            <iconify-icon class="text-slate-50 text-lg animate-spin" icon="material-symbols:settings-outline-rounded">
            </iconify-icon>
            <span class="hidden md:inline-block ltr:ml-2 rtl:mr-2">Settings</span>
        </button>

        <!-- BEGIN: Settings Modal -->
        <div class="offcanvas offcanvas-end fixed bottom-0 flex flex-col max-w-full bg-white dark:bg-slate-800 invisible bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out text-gray-700 top-0 ltr:right-0 rtl:left-0 border-none w-96"
            tabindex="-1" id="offcanvas" aria-labelledby="offcanvas">
            <div class="offcanvas-header flex items-center justify-between p-4 pt-3 border-b border-b-slate-300">
                <div>
                    <h3 class="block text-xl font-Inter text-slate-900 font-medium dark:text-[#eee]">
                        Theme customizer
                    </h3>
                    <p class="block text-sm font-Inter font-light text-[#68768A] dark:text-[#eee]">Customize & Preview
                        in Real Time</p>
                </div>
                <button type="button"
                    class="box-content text-2xl w-4 h-4 p-2 pt-0 -my-5 -mr-2 text-black dark:text-white border-none rounded-none opacity-100 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="offcanvas">
                    <iconify-icon icon="line-md:close"></iconify-icon>
                </button>
            </div>
            <div class="offcanvas-body flex-grow overflow-y-auto">
                <div class="settings-modal">
                    <div class="p-6">

                        <h3 class="mt-4">Theme</h3>
                        <form class="input-area flex items-center space-x-8 rtl:space-x-reverse" id="themeChanger">
                            <div class="input-group flex items-center">
                                <input type="radio" id="light" name="theme" value="light"
                                    class="themeCustomization-checkInput">
                                <label for="light" class="themeCustomization-checkInput-label">Light</label>
                            </div>
                            <div class="input-group flex items-center">
                                <input type="radio" id="dark" name="theme" value="dark"
                                    class="themeCustomization-checkInput">
                                <label for="dark" class="themeCustomization-checkInput-label">Dark</label>
                            </div>
                            <div class="input-group flex items-center">
                                <input type="radio" id="semiDark" name="theme" value="semiDark"
                                    class="themeCustomization-checkInput">
                                <label for="semiDark" class="themeCustomization-checkInput-label">Semi Dark</label>
                            </div>
                        </form>
                    </div>
                    <div class="divider"></div>
                    <div class="p-6">

                        <div class="flex items-center justify-between mt-5">
                            <h3 class="!mb-0">Rtl</h3>
                            <label id="rtl_ltr"
                                class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer">
                                <span
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-black-600"></span>
                            </label>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="p-6">
                        <h3>Content Width</h3>
                        <div class="input-area flex items-center space-x-8 rtl:space-x-reverse">
                            <div class="input-group flex items-center">
                                <input type="radio" id="fullWidth" name="content-width" value="fullWidth"
                                    class="themeCustomization-checkInput">
                                <label for="fullWidth" class="themeCustomization-checkInput-label ">Full Width</label>
                            </div>
                            <div class="input-group flex items-center">
                                <input type="radio" id="boxed" name="content-width" value="boxed"
                                    class="themeCustomization-checkInput">
                                <label for="boxed" class="themeCustomization-checkInput-label ">Boxed</label>
                            </div>
                        </div>
                        <h3 class="mt-4">Menu Layout</h3>
                        <div class="input-area flex items-center space-x-8 rtl:space-x-reverse">
                            <div class="input-group flex items-center">
                                <input type="radio" id="vertical_menu" name="menu_layout" value="vertical"
                                    class="themeCustomization-checkInput">
                                <label for="vertical_menu"
                                    class="themeCustomization-checkInput-label ">Vertical</label>
                            </div>
                            <div class="input-group flex items-center">
                                <input type="radio" id="horizontal_menu" name="menu_layout" value="horizontal"
                                    class="themeCustomization-checkInput">
                                <label for="horizontal_menu"
                                    class="themeCustomization-checkInput-label ">Horizontal</label>
                            </div>
                        </div>
                        <div id="menuCollapse" class="flex items-center justify-between mt-5">
                            <h3 class="!mb-0">Menu Collapsed</h3>
                            <label
                                class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer">
                                <span
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-black-500"></span>
                            </label>
                        </div>
                        <div id="menuHidden" class="!flex items-center justify-between mt-5">
                            <h3 class="!mb-0">Menu Hidden</h3>
                            <label id="menuHide"
                                class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer">
                                <span
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-black-500"></span>
                            </label>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="p-6">
                        <h3>Navbar Type</h3>
                        <div class="input-area flex flex-wrap items-center space-x-4 rtl:space-x-reverse">
                            <div class="input-group flex items-center">
                                <input type="radio" id="nav_floating" name="navbarType" value="floating"
                                    class="themeCustomization-checkInput">
                                <label for="nav_floating"
                                    class="themeCustomization-checkInput-label ">Floating</label>
                            </div>
                            <div class="input-group flex items-center">
                                <input type="radio" id="nav_sticky" name="navbarType" value="sticky"
                                    class="themeCustomization-checkInput">
                                <label for="nav_sticky" class="themeCustomization-checkInput-label ">Sticky</label>
                            </div>
                            <div class="input-group flex items-center">
                                <input type="radio" id="nav_static" name="navbarType" value="static"
                                    class="themeCustomization-checkInput">
                                <label for="nav_static" class="themeCustomization-checkInput-label ">Static</label>
                            </div>
                            <div class="input-group flex items-center">
                                <input type="radio" id="nav_hidden" name="navbarType" value="hidden"
                                    class="themeCustomization-checkInput">
                                <label for="nav_hidden" class="themeCustomization-checkInput-label ">Hidden</label>
                            </div>
                        </div>
                        <h3 class="mt-4">Footer Type</h3>
                        <div class="input-area flex items-center space-x-4 rtl:space-x-reverse">
                            <div class="input-group flex items-center">
                                <input type="radio" id="footer_sticky" name="footerType" value="sticky"
                                    class="themeCustomization-checkInput">
                                <label for="footer_sticky" class="themeCustomization-checkInput-label ">Sticky</label>
                            </div>
                            <div class="input-group flex items-center">
                                <input type="radio" id="footer_static" name="footerType" value="static"
                                    class="themeCustomization-checkInput">
                                <label for="footer_static" class="themeCustomization-checkInput-label ">Static</label>
                            </div>
                            <div class="input-group flex items-center">
                                <input type="radio" id="footer_hidden" name="footerType" value="hidden"
                                    class="themeCustomization-checkInput">
                                <label for="footer_hidden" class="themeCustomization-checkInput-label ">Hidden</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Settings Modal -->
        <!-- END: Settings -->

        <!-- End: Settings -->
        <div class="flex flex-col justify-between min-h-screen">
            <div>
                <!-- BEGIN: Header -->
                <!-- BEGIN: Header -->
                <div class="z-[9]" id="app_header">
                    <div
                        class="app-header z-[999] ltr:ml-[248px] rtl:mr-[248px] bg-white dark:bg-slate-800 shadow-sm dark:shadow-slate-700">
                        <div class="flex justify-between items-center h-full">
                            <div
                                class="flex items-center md:space-x-4 space-x-2 xl:space-x-0 rtl:space-x-reverse vertical-box">
                                <a href="index.html" class="mobile-logo xl:hidden inline-block">
                                    <img src="{{ asset('assets/images/logo/logo-c.svg') }}" class="black_logo"
                                        alt="logo">
                                    <img src="{{ asset('assets/images/logo/logo-c-white.svg') }}" class="white_logo"
                                        alt="logo">
                                </a>
                                <button class="smallDeviceMenuController hidden md:inline-block xl:hidden">
                                    <iconify-icon
                                        class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white"
                                        icon="heroicons-outline:menu-alt-3"></iconify-icon>
                                </button>


                            </div>
                            <!-- end vertcial -->
                            <div class="items-center space-x-4 rtl:space-x-reverse horizental-box">
                                <a href="index.html">
                                    <span class="xl:inline-block hidden">
                                        <img src="{{ asset('assets/images/logo/logo.svg') }}" class="black_logo "
                                            alt="logo">
                                        <img src="{{ asset('assets/images/logo/logo-white.svg') }}"
                                            class="white_logo" alt="logo">
                                    </span>
                                    <span class="xl:hidden inline-block">
                                        <img src="{{ asset('assets/images/logo/logo-c.svg') }}" class="black_logo "
                                            alt="logo">
                                        <img src="{{ asset('assets/images/logo/logo-c-white.svg') }}"
                                            class="white_logo " alt="logo">
                                    </span>
                                </a>
                                <button
                                    class="smallDeviceMenuController  open-sdiebar-controller xl:hidden inline-block">
                                    <iconify-icon
                                        class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white"
                                        icon="heroicons-outline:menu-alt-3"></iconify-icon>
                                </button>

                            </div>

                            <div
                                class="nav-tools flex items-center lg:space-x-5 space-x-3 rtl:space-x-reverse leading-0">





                                <!-- END: Notification Dropdown -->

                                <!-- BEGIN: Profile Dropdown -->
                                <!-- Profile DropDown Area -->
                                <div class="md:block hidden w-full">
                                    <button
                                        class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center  inline-flex items-center"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div
                                            class="lg:h-8 lg:w-8 h-7 w-7 rounded-full flex-1 ltr:mr-[10px] rtl:ml-[10px]">
                                            @if (auth()->user()->perfil)
                                                <img src="{{ asset('docs') }}/{{ auth()->user()->perfil->FotoUrl }}"
                                                    alt="user"
                                                    class="block w-full h-full object-cover rounded-full">
                                            @else
                                                <img src="{{ asset('assets/images/all-img/user.png') }}"
                                                    alt="user"
                                                    class="block w-full h-full object-cover rounded-full">
                                            @endif

                                        </div>
                                        @php
                                            //dd(session()->all(),auth()->user())
                                        @endphp
                                        <span
                                            class="flex-none text-slate-600 dark:text-white text-sm font-normal items-center lg:flex hidden overflow-hidden text-ellipsis whitespace-nowrap">{{ auth()->user()->email }}
                                        </span>
                                        <svg class="w-[16px] h-[16px] dark:text-white hidden lg:inline-block text-base inline-block ml-[10px] rtl:mr-[10px]"
                                            aria-hidden="true" fill="none" stroke="currentColor"
                                            viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div
                                        class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 shadow w-44 dark:bg-slate-800 border dark:border-slate-700 !top-[23px] rounded-md    overflow-hidden">
                                        <ul class="py-1 text-sm text-slate-800 dark:text-slate-200">
                                            @can('edit perfil')
                                                <li>
                                                    <a href="{{ url('seguridad/perfil') }}"
                                                        class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600 dark:text-white font-normal">
                                                        <iconify-icon icon="heroicons-outline:user"
                                                            class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1">
                                                        </iconify-icon>
                                                        <span class="font-Inter">Perfil</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('edit password')
                                                <li>
                                                    <a href="{{ url('seguridad/perfil/cambio_clave') }}"
                                                        class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600 dark:text-white font-normal">
                                                        <iconify-icon icon="mdi:password-outline"
                                                            class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1"></iconify-icon>
                                                        <span class="font-Inter">Cambio de contraseña</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            {{--  <li>
                                                <a href="email.html"
                                                    class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600  dark:text-white font-normal">
                                                    <iconify-icon icon="heroicons-outline:mail"
                                                        class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1">
                                                    </iconify-icon>
                                                    <span class="font-Inter">Email</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="todo.html"
                                                    class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600  dark:text-white font-normal">
                                                    <iconify-icon icon="heroicons-outline:clipboard-check"
                                                        class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1">
                                                    </iconify-icon>
                                                    <span class="font-Inter">Todo</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="settings.html"
                                                    class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600  dark:text-white font-normal">
                                                    <iconify-icon icon="heroicons-outline:cog"
                                                        class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1">
                                                    </iconify-icon>
                                                    <span class="font-Inter">Settings</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="pricing.html"
                                                    class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600 dark:text-white font-normal">
                                                    <iconify-icon icon="heroicons-outline:credit-card"
                                                        class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1">
                                                    </iconify-icon>
                                                    <span class="font-Inter">Price</span>
                                                </a>
                                            </li>
                                            <li> --}}
                                            <a class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
                                                    dark:text-white font-normal"
                                                href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                <iconify-icon icon="heroicons-outline:login"
                                                    class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1">
                                                </iconify-icon>
                                                <span class="font-Inter">Cerrar sesión</span>
                                            </a>

                                            </li>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                                <!-- END: Header -->
                                <button class="smallDeviceMenuController md:hidden block leading-0">
                                    <iconify-icon class="cursor-pointer text-slate-900 dark:text-white text-2xl"
                                        icon="heroicons-outline:menu-alt-3"></iconify-icon>
                                </button>
                                <!-- end mobile menu -->
                            </div>
                            <!-- end nav tools -->
                        </div>
                    </div>
                </div>

                <!-- END: Header -->
                <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]"
                    id="content_wrapper">
                    <div class="page-content">
                        <div class="transition-all duration-150 container-fluid" id="page_layout">
                            <div id="content_layout">
                                @yield('contenido')
                                @include('sweetalert::alert')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BEGIN: Footer For Desktop and tab -->
            {{-- <footer class="md:block hidden" id="footer">
                <div
                    class="site-footer px-6 bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-300 py-4 ltr:ml-[248px] rtl:mr-[248px]">
                    <div class="grid md:grid-cols-2 grid-cols-1 md:gap-5">
                        <div class="text-center ltr:md:text-start rtl:md:text-right text-sm">
                            COPYRIGHT ©
                            <span id="thisYear"></span>
                            DGEHM, All rights Reserved
                        </div>
                        <div class="ltr:md:text-right rtl:md:text-end text-center text-sm">
                            Hand-crafted &amp; Made by
                            <a href="https://codeshaper.net" target="_blank" class="text-primary-500 font-semibold">
                                DGEHM
                            </a>
                        </div>
                    </div>
                </div>
            </footer> --}}
            <!-- END: Footer For Desktop and tab -->
            <div
                class="bg-white bg-no-repeat custom-dropshadow footer-bg dark:bg-slate-700 flex justify-around items-center backdrop-filter backdrop-blur-[40px] fixed left-0 bottom-0 w-full z-[9999] bothrefm-0 py-[12px] px-4 md:hidden">
                <a href="chat.html">
                    <div>
                        <span
                            class="relative cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center mb-1 dark:text-white text-slate-900 ">
                            <iconify-icon icon="heroicons-outline:mail"></iconify-icon>
                            <span
                                class="absolute right-[5px] lg:hrefp-0 -hrefp-2 h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center justify-center rounded-full text-white z-[99]">
                                10
                            </span>
                        </span>
                        <span class="block text-[11px] text-slate-600 dark:text-slate-300">
                            Messages
                        </span>
                    </div>
                </a>
                <a href="profile.html"
                    class="relative bg-white bg-no-repeat backdrop-filter backdrop-blur-[40px] rounded-full footer-bg dark:bg-slate-700  h-[65px] w-[65px] z-[-1] -mt-[40px] flex justify-center items-center">
                    <div class="h-[50px] w-[50px] rounded-full relative left-[0px] hrefp-[0px] custom-dropshadow">
                        <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt=""
                            class="w-full h-full rounded-full border-2 border-slate-100">
                    </div>
                </a>
                <a href="#">
                    <div>
                        <span
                            class=" relative cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center mb-1 dark:text-white text-slate-900">
                            <iconify-icon icon="heroicons-outline:bell"></iconify-icon>
                            <span
                                class="absolute right-[17px] lg:hrefp-0 -hrefp-2 h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center justify-center rounded-full text-white z-[99]">
                                2
                            </span>
                        </span>
                        <span class=" block text-[11px] text-slate-600 dark:text-slate-300">
                            Notifications
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </main>
    <!-- scripts -->

    <!-- Core Js -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/rt-plugins.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/SimpleBar.js') }}"></script>

    <script src="{{ asset('assets/js/iconify.js') }}"></script>
    <!-- Jquery Plugins -->


    <!-- app js -->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>



</body>










</html>
