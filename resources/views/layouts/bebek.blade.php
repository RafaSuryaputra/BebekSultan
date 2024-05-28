<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- Tailwind --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.2.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Lora:ital@1&family=Raleway:ital,wght@1,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Infant:wght@700&family=Josefin+Sans&family=Lora:ital@1&family=Raleway:ital,wght@1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('font/css/all.min.css') }}">

    {{-- Daisy --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.24/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased" style="font-family: 'Josefin Sans';">
    {{-- Logo --}}
    <legend class="bg-[#292E36] md:text-center py-2 px-4">
        <div class="container flex flex-row items-center justify-between mx-auto p-14">

            {{-- Call --}}
            <button class="text-white px-5 py-3 flex items-center border-2 border-[#E1B168]">Call - 0817-0288-799 </button>

            {{-- Search --}}
            <div class="absolute inset-x-0">
                <img class="mx-auto inset-0 h-[152px]" src="Logo.svg" alt="">
            </div>

            {{-- Login/Register --}}
            <div class="flex items-center h-full gap-7">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="bg-[#292E36] inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div class="">
                                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M59.5 29.5391C59.5 45.8228 46.2994 59.0234 30.0156 59.0234C13.7319 59.0234 0.53125 45.8228 0.53125 29.5391C0.53125 13.2553 13.7319 0.0546875 30.0156 0.0546875C46.2994 0.0546875 59.5 13.2553 59.5 29.5391Z" fill="#E1B168"/>
                                    <path d="M30.0179 10.3125C24.2475 10.3125 19.5706 14.9456 19.5706 20.6619V22.3868C19.5706 28.1032 24.2475 32.7363 30.0179 32.7363C35.7882 32.7363 40.4651 28.1032 40.4651 22.3868V20.6619C40.4651 14.9456 35.7882 10.3125 30.0179 10.3125ZM30.0145 37.911C23.0392 37.911 14.0894 41.6486 11.5141 44.9656C9.92268 47.0165 11.4377 49.9853 14.0477 49.9853H45.9846C48.5947 49.9853 50.1097 47.0165 48.5182 44.9656C45.943 41.6503 36.9897 37.911 30.0145 37.911Z" fill="#292E36"/>
                                    </svg>
                            </div>

                            <div class="ms-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @auth


                        <x-dropdown-link :href="route('profile.edit', '#nav')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                        @endauth

                        @guest
                        <x-dropdown-link :href="route('login')">
                            {{ __('Log in') }}
                        </x-dropdown-link>
                        @endguest
                    </x-slot>
                </x-dropdown>

                <a href="{{ route("my-reservation", "#nav") }}" class="z-10">
                    <button class="text-[#292E36] px-7 py-3 flex items-center border-2 border-[#E1B168] bg-[#E1B168]">My Reservasion</button>
                </a>
            </div>

        </div>
    </legend>

    {{-- Navbar --}}
    <nav id="nav" class="bg-[#292E36] text-white border-t-4 z-10 border-[#5C6168] shadow-sm sticky top-0">
      <div class="container flex flex-row items-center justify-between px-16 py-4 mx-auto">

        <div class="flex">
            <a href="{{ route("homepage", "#home") }}" class="text-xl mr-8 {{ Route::is("homepage") ? 'underline underline-offset-8 text-[#E1B168]' : 'hover:underline-offset-8 hover:text-[#E1B168]' }}">Home</a>
            {{-- ini blm --}}
            <a href="{{ route('about', "#nav") }}" class="text-xl mr-8 {{ Route::is("about") ? 'underline underline-offset-8 text-[#E1B168]' : 'hover:underline-offset-8 hover:text-[#E1B168]' }}">About</a>
            <a href="{{ route("menu", "#nav") }}" class="text-xl mr-8 {{ Route::is("menu") ? 'underline underline-offset-8 text-[#E1B168]' : 'hover:underline-offset-8 hover:text-[#E1B168]' }}">Menu</a>
            <a href="{{ route("reservation", "#reservation") }}" class="text-xl mr-8 {{ Route::is("reservation") || Route::is("table") || Route::is("payment") || Route::is("payment.success") ? 'underline underline-offset-8 text-[#E1B168]' : 'hover:underline-offset-8 hover:text-[#E1B168]' }}">Reservation</a>
            {{-- ini juga --}}
            <a href="{{ route("contact", '#nav') }}" class="text-xl mr-8 {{ Route::is("contact") ? 'underline underline-offset-8 text-[#E1B168]' : 'hover:underline-offset-8 hover:text-[#E1B168]' }}">Contact</a>
            <a href="{{ route("delivery", '#nav') }}" class="text-xl mr-8 {{ Route::is("delivery") ? 'underline underline-offset-8 text-[#E1B168]' : 'hover:underline-offset-8 hover:text-[#E1B168]' }}">Delivery Orders</a>
        </div>

        <div class="flex gap-5">
            <a href="https://www.instagram.com/bebekayayo?utm_source=ig_web_button_share_sheet&igsh=YzAwZjE1ZTI0Zg==" target="_blank">
                <svg width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.9597 2.1027C18.2721 2.10645 19.5296 2.60703 20.4576 3.49513C21.3857 4.38323 21.9087 5.58667 21.9127 6.84262V16.3214C21.9087 17.5774 21.3857 18.7808 20.4576 19.6689C19.5296 20.557 18.2721 21.0576 16.9597 21.0614H7.05489C5.7425 21.0576 4.48497 20.557 3.55697 19.6689C2.62896 18.7808 2.10587 17.5774 2.10195 16.3214V6.84262C2.10587 5.58667 2.62896 4.38323 3.55697 3.49513C4.48497 2.60703 5.7425 2.10645 7.05489 2.1027H16.9597ZM16.9597 0.207031H7.05489C3.24122 0.207031 0.121094 3.19297 0.121094 6.84262V16.3214C0.121094 19.9711 3.24122 22.957 7.05489 22.957H16.9597C20.7734 22.957 23.8935 19.9711 23.8935 16.3214V6.84262C23.8935 3.19297 20.7734 0.207031 16.9597 0.207031Z" fill="white"/>
                    <path d="M18.4457 6.84375C18.1519 6.84375 17.8646 6.76036 17.6203 6.60412C17.376 6.44788 17.1855 6.22582 17.0731 5.966C16.9606 5.70619 16.9312 5.4203 16.9885 5.14448C17.0458 4.86866 17.1874 4.61531 17.3951 4.41646C17.6029 4.21761 17.8677 4.08218 18.1559 4.02732C18.4441 3.97246 18.7428 4.00062 19.0143 4.10823C19.2858 4.21585 19.5179 4.3981 19.6811 4.63192C19.8444 4.86575 19.9315 5.14066 19.9315 5.42188C19.9319 5.60871 19.8938 5.79379 19.8193 5.96648C19.7448 6.13917 19.6353 6.29608 19.4973 6.42819C19.3592 6.5603 19.1953 6.66502 19.0148 6.73633C18.8344 6.80765 18.641 6.84415 18.4457 6.84375ZM12.0076 7.79133C12.7912 7.79133 13.5573 8.01372 14.2089 8.43037C14.8605 8.84702 15.3683 9.43923 15.6682 10.1321C15.9681 10.825 16.0466 11.5874 15.8937 12.3229C15.7408 13.0585 15.3634 13.7341 14.8093 14.2644C14.2552 14.7947 13.5492 15.1558 12.7806 15.3021C12.012 15.4485 11.2153 15.3734 10.4913 15.0864C9.76727 14.7994 9.14845 14.3134 8.71307 13.6898C8.2777 13.0662 8.04531 12.3331 8.04531 11.5832C8.04644 10.5778 8.46425 9.61399 9.20707 8.90312C9.94989 8.19225 10.9571 7.7924 12.0076 7.79133ZM12.0076 5.89566C10.8321 5.89566 9.68309 6.22923 8.70575 6.85418C7.72841 7.47913 6.96667 8.3674 6.51685 9.40665C6.06703 10.4459 5.94933 11.5895 6.17865 12.6927C6.40797 13.796 6.97399 14.8094 7.80515 15.6048C8.63631 16.4002 9.69527 16.9419 10.8481 17.1614C12.001 17.3808 13.1959 17.2682 14.2819 16.8377C15.3678 16.4073 16.296 15.6783 16.9491 14.743C17.6021 13.8077 17.9507 12.708 17.9507 11.5832C17.9507 10.0747 17.3245 8.62811 16.21 7.5615C15.0954 6.49488 13.5838 5.89566 12.0076 5.89566Z" fill="white"/>
                </svg>
            </a>
            <a href="https://www.facebook.com/profile.php?id=100069899448560" target="_blank">
            <svg width="25" height="23" viewBox="0 0 25 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M24.665 11.6484C24.665 5.3668 19.3427 0.273438 12.7788 0.273438C6.21484 0.273438 0.892578 5.3668 0.892578 11.6484C0.892578 17.3258 5.23847 22.0317 10.9216 22.8858V14.9375H7.90279V11.6484H10.9216V9.14238C10.9216 6.29203 12.6965 4.71629 15.4113 4.71629C16.7119 4.71629 18.0724 4.93871 18.0724 4.93871V7.73828H16.5728C15.0971 7.73828 14.6355 8.61477 14.6355 9.51562V11.6484H17.9318L17.4054 14.9375H14.636V22.8868C20.3191 22.0332 24.665 17.3273 24.665 11.6484Z" fill="white"/>
            </svg>
</a>
        </div>

      </div>
    </nav>

    {{-- Main --}}
    <main class="bg-[#292E36] ">
        {{-- Content Title --}}
        <div class="bg-[#292E36] border-t-4 border-[#5C6168] text-white py-8">
            <div class="mx-auto w-[240px] border-y border-[#E1B168] content-center text-center">
                <h1 class="text-5xl" style="font-family: 'Cormorant Infant';">{{ $title }}</h1>
            </div>
        </div>

        {{-- Content --}}
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-[#292E36] px-4">
        {{-- <div class="container flex flex-row items-center justify-between mx-auto py-14 p-14"> --}}

            {{-- Instagram
            <div class="items-center h-full">
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.6746 2.52848C18.987 2.53223 20.2445 3.03281 21.1725 3.92091C22.1005 4.80901 22.6236 6.01245 22.6275 7.2684V16.7472C22.6236 18.0032 22.1005 19.2066 21.1725 20.0947C20.2445 20.9828 18.987 21.4834 17.6746 21.4871H7.76974C6.45734 21.4834 5.19982 20.9828 4.27181 20.0947C3.3438 19.2066 2.82072 18.0032 2.8168 16.7472V7.2684C2.82072 6.01245 3.3438 4.80901 4.27181 3.92091C5.19982 3.03281 6.45734 2.53223 7.76974 2.52848H17.6746ZM17.6746 0.632812H7.76974C3.95607 0.632813 0.835938 3.61875 0.835938 7.2684V16.7472C0.835938 20.3969 3.95607 23.3828 7.76974 23.3828H17.6746C21.4882 23.3828 24.6084 20.3969 24.6084 16.7472V7.2684C24.6084 3.61875 21.4882 0.632812 17.6746 0.632812Z" fill="white"/>
                    <path d="M19.1606 7.26953C18.8667 7.26953 18.5795 7.18614 18.3351 7.0299C18.0908 6.87367 17.9004 6.6516 17.7879 6.39178C17.6755 6.13197 17.646 5.84608 17.7034 5.57026C17.7607 5.29445 17.9022 5.04109 18.11 4.84224C18.3178 4.64339 18.5825 4.50797 18.8707 4.4531C19.1589 4.39824 19.4577 4.4264 19.7292 4.53402C20.0007 4.64163 20.2327 4.82388 20.396 5.05771C20.5592 5.29153 20.6464 5.56644 20.6464 5.84766C20.6468 6.03449 20.6086 6.21957 20.5341 6.39226C20.4596 6.56495 20.3502 6.72186 20.2121 6.85397C20.0741 6.98608 19.9101 7.0908 19.7297 7.16212C19.5492 7.23343 19.3558 7.26993 19.1606 7.26953ZM12.7224 8.21711C13.5061 8.21711 14.2721 8.4395 14.9237 8.85615C15.5753 9.2728 16.0831 9.86501 16.383 10.5579C16.6829 11.2507 16.7614 12.0132 16.6085 12.7487C16.4556 13.4842 16.0783 14.1599 15.5241 14.6902C14.97 15.2205 14.264 15.5816 13.4954 15.7279C12.7268 15.8742 11.9301 15.7991 11.2061 15.5121C10.4821 15.2252 9.86329 14.7391 9.42792 14.1156C8.99254 13.492 8.76016 12.7589 8.76016 12.0089C8.76128 11.0036 9.17909 10.0398 9.92191 9.3289C10.6647 8.61803 11.6719 8.21819 12.7224 8.21711ZM12.7224 6.32145C11.547 6.32145 10.3979 6.65501 9.42059 7.27996C8.44325 7.90491 7.68151 8.79318 7.23169 9.83243C6.78187 10.8717 6.66418 12.0153 6.89349 13.1185C7.12281 14.2218 7.68884 15.2352 8.51999 16.0306C9.35115 16.826 10.4101 17.3677 11.563 17.5872C12.7158 17.8066 13.9108 17.694 14.9967 17.2635C16.0827 16.833 17.0109 16.1041 17.6639 15.1688C18.317 14.2334 18.6655 13.1338 18.6655 12.0089C18.6655 10.5005 18.0394 9.05389 16.9248 7.98728C15.8103 6.92066 14.2986 6.32145 12.7224 6.32145Z" fill="white"/>
                </svg>
            </div> --}}

            {{-- Logo --}}
            {{-- <div class="absolute inset-x-0">
                <img class="mx-auto inset-0 h-[80px]" src="Logo.svg" alt="">
            </div> --}}

            {{-- Facebook
            <div class="items-center h-full">
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24.165 12.0781C24.165 5.79648 18.8427 0.703125 12.2788 0.703125C5.71484 0.703125 0.392578 5.79648 0.392578 12.0781C0.392578 17.7555 4.73847 22.4614 10.4216 23.3155V15.3672H7.40279V12.0781H10.4216V9.57207C10.4216 6.72172 12.1965 5.14598 14.9113 5.14598C16.2119 5.14598 17.5724 5.3684 17.5724 5.3684V8.16797H16.0728C14.5971 8.16797 14.1355 9.04445 14.1355 9.94531V12.0781H17.4318L16.9054 15.3672H14.136V23.3165C19.8191 22.4629 24.165 17.757 24.165 12.0781Z" fill="white"/>
                </svg>
            </div> --}}
        {{-- </div> --}}
        <div class="container flex flex-row justify-between pt-8 pb-10 mx-auto text-white px-14">

            {{-- Contact --}}
            <div class="h-full text-lg">
                <div class="w-[90px] border-y border-[#E1B168] text-center mb-5">
                    <h1 class="pt-1">CONTACT</h1>
                </div>
                <h1>Jl. Bengawan No.67, Bandung</h1>
                <h1><span class="text-[#E1B168]">Call</span> - +62 817 0288 799</h1>
                <h1 class="text-[#E1B168]">bebekayayo@gmail.com</h1>
            </div>

            <div class="h-full">
                  {{-- Logo --}}
            <div class="relative inset-x-0 mb-5">
                <img class="mx-auto inset-0 h-[80px]" src="Logo.svg" alt="">
            </div>               
                <form action="{{ route("subscribe") }}" method="POST" class="flex flex-row w-[350px] border-[#858585] border">
                    @csrf
                    <input name="email" class="w-[500px] h-[50px] bg-[#292E36] pl-2" type="email" placeholder="Enter your email address">
                    <button type="submit" class="w-[250px] h-[50px] bg-[#FFFFFF] text-[#292E36] border-[#858585]" type="submit">Subscribe</button>
                </form>
            </div>

            <div class="h-full text-lg text-right">
                <div class="w-[170px] border-y border-[#E1B168] text-center mb-5 ml-auto">
                    <h1 class="pt-1">WORKING HOURS</h1>
                </div>
                <h1 class="text-right"><span class="text-[#E1B168]">Mon – Thu:</span> 11.00am – 9.30pm</h1>
                <h1 class="text-right"><span class="text-[#E1B168]">Sat:</span> 11.00am – 9.30pm</h1>
                <h1 class="text-right"><span class="text-[#E1B168]">Fri:</span> 1.00am – 9.30pm</h1>
            </div>


        </div>
        <div class="bg-[#292E36] text-white border-t-2 border-[#5C6168] shadow-sm">
            <div class="container flex flex-row items-center justify-between px-16 py-8 mx-auto">

              <div class="flex">
                  <a href="" class="mr-8 text-xl">© Copyright - Bebek Bakar Ayayo | Designed by <span class="text-[#E1B168]">Kelompok 9</span></a>
              </div>

              <div class="flex">
                  <p>Bebek Bakar Ayayo</p>
              </div>

            </div>
          </div>
    </footer>
    @stack('js')

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
</body>
</html>
