@extends('template')

@section('contenido')
    <!DOCTYPE html>
    <html lang="en" dir="ltr" class="light">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <title>Dashcode - HTML Template</title>
        <link rel="icon" type="image/png" href="assets/images/logo/favicon.svg">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/rt-plugins.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
        <!-- START : Theme Config js-->
        <script src="{{ asset('assets/js/settings.js') }}" sync></script>
        <!-- END : Theme Config js-->
        @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
        <style>
            .card-title,
            .form-label {
                text-transform: none;
            }

            .form-label,
            .card-title {
                text-align: left;
            }
        </style>
    </head>

    <body class=" font-inter skin-default">

        <div class="page-content">
            <div class="transition-all duration-150 container-fluid" id="page_layout">
                <div id="content_layout">
                    @auth
                        <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
                            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-7">
                                <div class="card">
                                    <div class="card-body flex flex-col p-6">
                                        <header
                                            class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 -mx-6 px-6">
                                            <div class="flex-1">
                                                <div class="card-title text-slate-900 dark:text-white">Busqueda</div>
                                            </div>
                                        </header>
                                        <div class="card-text h-full space-y-4">
                                            <div class="input-area">
                                                <div class="relative">
                                                    <input type="text" class="form-control !pr-9">
                                                    <button
                                                        class="absolute btn-dark right-0 top-1/2 -translate-y-1/2 w-9 h-full border-none flex items-center justify-center">
                                                        <iconify-icon icon="heroicons-solid:search" ></iconify-icon>
                                                    </button>
                                                </div>
                                            </div>






                                            <div class="inline-block min-w-full align-middle">
                                                <div class="overflow-hidden ">
                                                  <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" id="data-table">
                                                    <thead class=" border-t border-slate-100 dark:border-slate-800">
                                                      <tr>
                      
                                                        <th scope="col" class=" table-th ">
                                                          Id
                                                        </th>
                      
                                                        <th scope="col" class=" table-th ">
                                                          Order
                                                        </th>
                      
                                                        <th scope="col" class=" table-th ">
                                                          Customer
                                                        </th>
                      
                                                        <th scope="col" class=" table-th ">
                                                          Date
                                                        </th>
                      
                                                        <th scope="col" class=" table-th ">
                                                          Quantity
                                                        </th>
                      
                                                        <th scope="col" class=" table-th ">
                                                          Amount
                                                        </th>
                      
                                                        <th scope="col" class=" table-th ">
                                                          Status
                                                        </th>
                      
                                                        <th scope="col" class=" table-th ">
                                                          Action
                                                        </th>
                      
                                                      </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                      
                                                      <tr>
                                                        <td class="table-td">1</td>
                                                        <td class="table-td ">#951</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="1" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">3/26/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            13
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $1779.53
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                                    bg-success-500">
                                                            paid
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">2</td>
                                                        <td class="table-td ">#238</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="2" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">2/6/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            13
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $2215.78
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                                    bg-warning-500">
                                                            due
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">3</td>
                                                        <td class="table-td ">#339</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="3" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">9/6/2021</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            1
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $3183.60
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                                    bg-warning-500">
                                                            due
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">4</td>
                                                        <td class="table-td ">#365</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="4" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">11/7/2021</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            13
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $2587.86
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                                    bg-danger-500">
                                                            cancled
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton4" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">5</td>
                                                        <td class="table-td ">#513</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="5" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">5/6/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            12
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $3840.73
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                                    bg-success-500">
                                                            paid
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton5" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">6</td>
                                                        <td class="table-td ">#534</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="6" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">2/14/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            12
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $4764.18
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                                    bg-danger-500">
                                                            cancled
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton6" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">7</td>
                                                        <td class="table-td ">#77</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="7" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">7/30/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            6
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $2875.05
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                                    bg-success-500">
                                                            paid
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton7" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">8</td>
                                                        <td class="table-td ">#238</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="8" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">6/30/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            9
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $2491.02
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                                    bg-warning-500">
                                                            due
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton8" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">9</td>
                                                        <td class="table-td ">#886</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="9" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">8/9/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            8
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $3006.95
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                                    bg-warning-500">
                                                            due
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton9" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">10</td>
                                                        <td class="table-td ">#3</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="10" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">8/4/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            12
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $2160.32
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                                    bg-success-500">
                                                            paid
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton10" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">11</td>
                                                        <td class="table-td ">#198</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="11" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">4/5/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            8
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $1272.66
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                                    bg-success-500">
                                                            paid
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton11" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">12</td>
                                                        <td class="table-td ">#829</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="12" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">8/9/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            2
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $4327.86
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                                    bg-danger-500">
                                                            cancled
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton12" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">13</td>
                                                        <td class="table-td ">#595</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="13" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">2/10/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            11
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $3671.81
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                                    bg-danger-500">
                                                            cancled
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton13" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">14</td>
                                                        <td class="table-td ">#374</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="14" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">2/10/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            2
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $3401.82
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                                    bg-success-500">
                                                            paid
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton14" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">15</td>
                                                        <td class="table-td ">#32</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="15" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">5/20/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            4
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $2387.49
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                                    bg-danger-500">
                                                            cancled
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton15" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">16</td>
                                                        <td class="table-td ">#89</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="16" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">5/3/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            15
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $4236.61
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                                    bg-warning-500">
                                                            due
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton16" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">17</td>
                                                        <td class="table-td ">#912</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="17" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">10/31/2021</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            11
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $2975.66
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                                    bg-success-500">
                                                            paid
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton17" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">18</td>
                                                        <td class="table-td ">#621</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="18" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">1/13/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            5
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $4576.13
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                                    bg-danger-500">
                                                            cancled
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton18" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">19</td>
                                                        <td class="table-td ">#459</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="19" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">6/14/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            5
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $1276.56
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                                    bg-danger-500">
                                                            cancled
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton19" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">20</td>
                                                        <td class="table-td ">#108</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="20" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">10/8/2021</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            4
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $1078.64
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                                    bg-warning-500">
                                                            due
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton20" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">21</td>
                                                        <td class="table-td ">#492</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="21" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">11/17/2021</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            9
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $1678.19
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                                    bg-success-500">
                                                            paid
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton21" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">22</td>
                                                        <td class="table-td ">#42</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="22" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">4/4/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            9
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $1822.02
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                                    bg-danger-500">
                                                            cancled
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton22" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">23</td>
                                                        <td class="table-td ">#841</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="23" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">3/21/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            5
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $1578.39
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                                    bg-warning-500">
                                                            due
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton23" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">24</td>
                                                        <td class="table-td ">#561</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="24" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">6/18/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            12
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $2130.49
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                                    bg-danger-500">
                                                            cancled
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton24" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">25</td>
                                                        <td class="table-td ">#720</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="25" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">8/15/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            8
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $3721.11
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                                    bg-warning-500">
                                                            due
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton25" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">26</td>
                                                        <td class="table-td ">#309</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="26" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">4/28/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            8
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $4683.45
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                                    bg-success-500">
                                                            paid
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton26" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">27</td>
                                                        <td class="table-td ">#24</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="27" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">9/6/2021</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            7
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $2863.71
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                                    bg-success-500">
                                                            paid
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton27" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">28</td>
                                                        <td class="table-td ">#518</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="28" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">9/11/2021</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            4
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $3879.41
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                                    bg-danger-500">
                                                            cancled
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton28" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">29</td>
                                                        <td class="table-td ">#98</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="29" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">1/27/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            5
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $4660.81
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                                    bg-success-500">
                                                            paid
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton29" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">30</td>
                                                        <td class="table-td ">#940</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="30" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">9/16/2021</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            6
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $4800.75
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                                    bg-warning-500">
                                                            due
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton30" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">31</td>
                                                        <td class="table-td ">#925</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="31" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">1/8/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            1
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $2299.05
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                                    bg-danger-500">
                                                            cancled
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton31" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">32</td>
                                                        <td class="table-td ">#122</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="32" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">11/18/2021</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            1
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $3578.02
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                                    bg-success-500">
                                                            paid
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton32" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">33</td>
                                                        <td class="table-td ">#371</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="33" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">3/30/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            13
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $1996.06
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                                    bg-danger-500">
                                                            cancled
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton33" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">34</td>
                                                        <td class="table-td ">#296</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="34" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">11/13/2021</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            5
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $2749.00
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                                    bg-warning-500">
                                                            due
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton34" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">35</td>
                                                        <td class="table-td ">#887</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="35" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">12/7/2021</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            11
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $4353.01
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                                    bg-success-500">
                                                            paid
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton35" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">36</td>
                                                        <td class="table-td ">#30</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="36" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">9/9/2021</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            15
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $3252.37
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                                    bg-warning-500">
                                                            due
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton36" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">37</td>
                                                        <td class="table-td ">#365</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="37" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">2/12/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            5
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $4044.10
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                                    bg-warning-500">
                                                            due
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton37" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">38</td>
                                                        <td class="table-td ">#649</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="38" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">3/6/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            5
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $3859.92
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                                    bg-success-500">
                                                            paid
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton38" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">39</td>
                                                        <td class="table-td ">#923</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="39" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">7/25/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            14
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $1652.47
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                                    bg-success-500">
                                                            paid
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton39" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">40</td>
                                                        <td class="table-td ">#423</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="40" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">3/2/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            8
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $2700.12
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                                    bg-danger-500">
                                                            cancled
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton40" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">41</td>
                                                        <td class="table-td ">#703</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="41" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">12/8/2021</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            8
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $4508.13
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                                    bg-danger-500">
                                                            cancled
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton41" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">42</td>
                                                        <td class="table-td ">#792</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="42" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">11/22/2021</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            11
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $4938.04
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                                    bg-warning-500">
                                                            due
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton42" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">43</td>
                                                        <td class="table-td ">#400</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="43" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">4/6/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            1
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $3471.32
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                                    bg-warning-500">
                                                            due
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton43" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">44</td>
                                                        <td class="table-td ">#718</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="44" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">2/4/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            4
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $4011.60
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                                    bg-success-500">
                                                            paid
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton44" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">45</td>
                                                        <td class="table-td ">#970</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="45" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">3/30/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            15
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $3723.64
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                                    bg-warning-500">
                                                            due
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton45" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">46</td>
                                                        <td class="table-td ">#786</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="46" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">11/20/2021</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            2
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $2441.15
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                                    bg-danger-500">
                                                            cancled
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton46" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">47</td>
                                                        <td class="table-td ">#925</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="47" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">10/24/2021</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            11
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $1196.76
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                                    bg-danger-500">
                                                            cancled
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton47" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">48</td>
                                                        <td class="table-td ">#929</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="48" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">6/30/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            10
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $3579.57
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                                    bg-danger-500">
                                                            cancled
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton48" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">49</td>
                                                        <td class="table-td ">#377</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="49" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">11/16/2021</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            4
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $2657.84
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                                    bg-warning-500">
                                                            due
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton49" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                      <tr>
                                                        <td class="table-td">50</td>
                                                        <td class="table-td ">#661</td>
                                                        <td class="table-td">
                                                          <span class="flex">
                                                <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                                  <img src="assets/images/all-img/customer_1.png" alt="50" class="object-cover w-full h-full rounded-full">
                                                </span>
                                                          <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">Jenny Wilson</span>
                                                          </span>
                                                        </td>
                                                        <td class="table-td ">8/15/2022</td>
                                                        <td class="table-td ">
                                                          <div>
                                                            6
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            $2905.94
                                                          </div>
                                                        </td>
                                                        <td class="table-td ">
                      
                                                          <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                                    bg-success-500">
                                                            paid
                                                          </div>
                      
                                                        </td>
                                                        <td class="table-td ">
                                                          <div>
                                                            <div class="relative">
                                                              <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton50" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                        shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      View</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Edit</a>
                                                                  </li>
                                                                  <li>
                                                                    <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                            dark:hover:text-white">
                                                                      Delete</a>
                                                                  </li>
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      </tr>
                      
                                                    </tbody>
                                                  </table>
                                                </div>
                                              </div>
                                          
                                        </div>
                                        <!-- END: Todo Header -->


                                        
                                    </div>
                                </div>


                            </div>
                        </div>
                    @else
                        <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
                            <!-- Basic Inputs -->
                            <div class="card" style="display: none" id="div_registro">
                                <div class="card-body flex flex-col p-6">
                                    <header class="flex items-center border-b border-slate-100 dark:border-slate-700">
                                        <div class="flex-1">
                                            <div class="card-title text-slate-900 dark:text-white">Registro</div>
                                        </div>

                                    </header>

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




                                    <form method="POST" action="{{ url('register_consulta') }}">
                                        @csrf
                                        <br>
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                            <div class="input-area relative">
                                                <label for="Nombre" class="form-label">Nombre</label>
                                                <input type="text" name="name" value="{{ old('name') }}" required
                                                    class="form-control">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="Apellido" class="form-label">Apellido</label>
                                                <input type="text" name="last_name" value="{{ old('last_name') }}" required
                                                    class="form-control">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="Email" class="form-label">Email</label>
                                                <input type="email" name="email" value="{{ old('email') }}" required
                                                    class="form-control">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Password</label>
                                                <input type="password" name="password" value="{{ old('password') }}" required
                                                    class="form-control">
                                            </div>

                                        </div>
                                        <br>
                                        <div style="text-align: right;">

                                            <button type="button" class="btn inline-flex justify-center btn-secondary"
                                                onclick="show_login()">Volver</button>
                                            &nbsp; &nbsp;
                                            <button type="submit"
                                                class="btn inline-flex justify-center btn-dark">Registrar</button>


                                        </div>


                                    </form>

                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7" id="div_login">
                                <div class="card ">
                                    <div class="card-body flex flex-col p-6">
                                        <header
                                            class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                            <div class="flex-1">
                                                <div class="card-title text-slate-900 dark:text-white">Para acceder a los
                                                    registros debe iniciar sesión.</div>
                                            </div>
                                        </header>
                                        <div class="card-text h-full">
                                            <p style="text-align: justify"
                                                class="text-sm font-Inter text-slate-600 dark:text-slate-300">
                                                En el Registro de Personas Certificadas podrás acceder al registro público
                                                oficial de cada una de las personas que han obtenido un Certificado de
                                                Competencias Laborales, luego de resultar Competente en
                                                los procesos de evaluación en los que han participado.
                                                Las personas certificadas podrán acceder a un comprobante de su certificación.
                                                Por su parte, a los empleadores, este registro les será útil para corroborar si
                                                un trabajador o trabajadora ha obtenido un Certificado de Competencias
                                                Laborales.
                                            </p>
                                            <br>
                                            <p style="text-align: justify"
                                                class="text-sm font-Inter text-slate-600 dark:text-slate-300">

                                            </p>

                                        </div>
                                    </div>
                                </div>

                                <div class="auth-box-3">

                                    <div class="text-center 2xl:mb-10 mb-5">
                                        <h4 class="font-medium">Iniciar sesión</h4>

                                        <div class="text-slate-500 dark:text-slate-400 text-base">
                                            Inicie sesión con su cuenta
                                        </div>
                                    </div>
                                    <!-- BEGIN: Login Form -->
                                    <form class="space-y-4" method="POST" action="{{ url('login_consulta') }}">
                                        @csrf
                                        <div class="fromGroup">
                                            <label class="block capitalize form-label">Correo electrónico</label>
                                            <div class="relative ">
                                                <input type="email" name="email" id="email"
                                                    class="form-control py-2 @error('email') is-invalid @enderror" required
                                                    autocomplete>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>Credenciales no válidas</strong>
                                                    </span>
                                                @enderror


                                            </div>
                                        </div>
                                        <div class="fromGroup">
                                            <label class="block capitalize form-label">Contraseña</label>
                                            <div class="relative ">
                                                <input type="password" id="password" name="password"
                                                    class="  form-control py-2   @error('password') is-invalid @enderror"
                                                    required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- <div class="flex justify-between">
                                            <label class="flex items-center cursor-pointer">
                                                <input type="checkbox" class="hiddens">
                                                <span class="text-slate-500 dark:text-slate-400 text-sm leading-6 capitalize">Keep me signed
                                                    in</span>
                                            </label>
                                            <a class="text-sm text-slate-800 dark:text-slate-400 leading-6 font-medium"
                                                href="forget-password-one.html">Forgot
                                                Password?
                                            </a>
                                        </div> --}}
                                        <button class="btn btn-dark block w-full text-center">Iniciar sesión</button>
                                    </form>
                                    <!-- END: Login Form -->
                                    <div class=" relative border-b-[#9AA2AF] border-opacity-[16%] border-b pt-6">
                                        <div
                                            class=" absolute inline-block bg-white dark:bg-slate-800 dark:text-slate-400 left-1/2 top-1/2 transform -translate-x-1/2
                                                px-4 min-w-max text-sm text-slate-500 dark:text-slate-400font-normal ">
                                            O
                                        </div>
                                    </div>

                                    <div
                                        class="mx-auto font-normal text-slate-500 dark:text-slate-400 2xl:mt-12 mt-6 uppercase text-sm text-center">
                                        {{-- Already registered? --}}

                                        <button class="btn btn-secondary block w-full text-center"
                                            onclick="show_register()">Registrarse</button>


                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endauth

        </div>



        <!-- scripts -->
        <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

        <script src="{{ asset('assets/js/rt-plugins.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>


        <script>
            function show_register() {
                $("#div_registro").show();
                $("#div_login").hide();
            }

            function show_login() {
                $("#div_registro").hide();
                $("#div_login").show();
            }
        </script>

    </body>

    </html>
@endsection
