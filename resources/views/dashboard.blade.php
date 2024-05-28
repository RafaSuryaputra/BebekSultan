<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="cupcake">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <!-- {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --}} -->
    <script async src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- {{-- Daisy UI --}} -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.2.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    <style>
        .dataTables_length label select {
            margin-right: 10px;
            margin-left: 10px;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('font/css/all.min.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>  
    <div>
        {{-- Header --}}
        <nav class="bg-[#292E36] border-b border-gray-200 fixed z-10 w-full">         
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start">
                        <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
                            class="p-2 mr-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100">
                            <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <svg id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <a  class="text-xl font-bold flex items-center lg:ml-2.5">                    
                            <span class="self-center whitespace-nowrap">
                               <img src="{{ asset('logo.svg') }}" alt="logo" class="w-10">
                                    
                            </span>
                        </a>
                    </div>
                    <div class="flex items-center">
                        {{-- Toggle Mobile Nav --}}
                        <button id="toggleSidebarMobileSearch" type="button"
                            class="p-2 text-gray-500 rounded-lg lg:hidden hover:text-gray-900 hover:bg-gray-100"></button>
                        <div class="flex space-x-4 text-white">
                            <button class="flex items-center p-2 mx-auto border-2 rounded-lg shadow-sm">
                                <i class="ml-4 text-lg fas fa-user"></i>
                                <p class="mx-2 font-medium">{{ auth()->user()->name }}</p>
                                {{-- <span class="py-3 font-semibold text-gray-500 indicator-item indicator-top indicator-end badge badge-secondary"><i class="text-lg text-gray-500 fas fa-bell"></i>&nbsp;99+</span> --}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        {{-- Header END --}}

        {{-- Side Bar-Left --}}
        <div class="flex pt-16 overflow-hidden ">
            <aside id="sidebar"
                class="fixed top-0 left-0 z-[5] flex flex-col flex-shrink-0 hidden w-64 h-full pt-16 duration-75 lg:flex transition-width"
                aria-label="Sidebar">
                <div class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200">
                    <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
                        <div class="flex-1 px-3 space-y-1 bg-white divide-y">
                            <ul class="pb-2 space-y-2">
                                {{-- <li>
                                    <a href="#"
                                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100 group">
                                        <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                        </svg>
                                        <span class="ml-3">Dashboard</span>
                                    </a>
                                </li>                             --}}
                                <li>
                                    <a href="{{ route('admin.user.index') }}"
                                        class="{{ \Route::is('admin.user.*') ? 'text-[#E1B168] font-bold' : "text-black"}} text-base  font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                        <i class="w-6 h-full pl-1 my-auto fa-solid fa-user"></i>
                                        <span class="flex-1 ml-3 whitespace-nowrap">User</span>
                                    </a>
                                </li>          
                                <li>
                                    <a href="{{ route('admin.menu.index') }}"
                                        class="{{ \Route::is('admin.menu.*') ? 'text-[#E1B168] font-bold' : "text-black"}} text-base  font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                        <i class="w-6 h-full pl-1 my-auto fa-solid fa-bowl-food"></i>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Menu</span>
                                    </a>
                                </li>  

                                <li>
                                    <a href="{{ route('admin.reservation.index') }}"
                                        class="{{ \Route::is('admin.reservation.*') ? 'text-[#E1B168] font-bold' : "text-black"}} text-base  font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                        <i class="w-6 h-full pl-1 my-auto fa-solid fa-receipt"></i>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Reservasi</span>
                                    </a>
                                </li>  
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                    <button onclick="event.preventDefault();
                                    this.closest('form').submit();" class="relative flex items-center justify-start px-3 py-3 space-x-4 text-gray-500 rounded-lg group"
                                        onclick="highlightSidebarItem(this)">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <a><span class="font-medium transition-all duration-200 ">Log Out</span></a>
                                    </button>
                                    </form>    
                                </li>                
                                                     
                            </ul>                           
                        </div>
                    </div>
                </div>
            </aside>
        </div>
        {{-- Side Bar-Left End --}}

        {{-- Content --}}
        <div class="fixed inset-0 z-10 hidden bg-gray-900 opacity-50" id="sidebarBackdrop"></div>
        <div id="main-content" class="relative w-full h-full max-w-6xl overflow-y-auto bg-gray-50 lg:ml-64 ">
            <main class="h-full ">
                <div class="w-full pt-6 pl-4 mb-24">
                    <div
                        class="w-full max-w-6xl p-6 mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        @if ($errors->all())
                        <div class="flex flex-col gap-2 mb-5 text-white bg-red-500 alert font bold" role="alert">
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        </div>
                    @endif
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>
    {{-- <div class="absolute inset-x-0 bottom-0">
        <p class="w-full pl-64 my-10 text-sm text-center text-gray-500">
            &copy; 2022-2023 <a href="#" class="hover:underline" target="_blank">Zidan</a>. All
            rights reserved.
        </p>
    </div> --}}
    {{-- Content END --}}

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    @stack('datatables')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('error2'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: '{{ session('error2') }}'
            })
        </script>
    @endif
    @if (session('success'))
        <script>
            const ToastSuccess = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            ToastSuccess.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            })
        </script>
    @endif

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
    </div>
</body>
