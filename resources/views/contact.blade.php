@extends('layouts.bebek')

@section('content')
<div class="w-full py-16 bg-white ">
    <form class=" grid grid-cols-3 h-[540px] px-52 pt-20" method="POST" action="{{ route("mailUs") }}">
        @csrf
        {{-- left --}}
        <div class="bg-[#FFF8F5] h-full flex gap-5 flex-col p-12">
            <div>
                <p class="text-3xl font-bold">Contact Information</p>
            </div>
            <div>
                <p>Bring the table winwin survival strateges ensure proactive domination the end of the day going real times multiple touchpoints.</p>
            </div>
            <div class="flex items-center gap-5">
                <svg width="60" height="60" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <circle cx="25.8184" cy="25.8184" r="25.8184" fill="#292E36"/>
                    <rect x="9.95508" y="9.95312" width="32.3507" height="32.3507" fill="url(#pattern0)"/>
                    <defs>
                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_0_1" transform="scale(0.01)"/>
                    </pattern>
                    <image id="image0_0_1" width="100" height="100" xlink:href="data:image/png;base64,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"/>
                    </defs>
                    </svg>
                <p>Bebek Bakar A’yayo, jalan bengawan no.67</p>                    
            </div>
            <div class="flex items-center gap-5">
                <svg width="52" height="53" viewBox="0 0 52 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="25.8184" cy="26.4551" r="25.8184" fill="#292E36"/>
                    <path d="M16.9868 20.934L25.4252 27.4973L33.8637 20.934M15.5803 17.1836H35.2701C36.5646 17.1836 37.6141 18.233 37.6141 19.5276V33.5917C37.6141 34.8863 36.5646 35.9357 35.2701 35.9357H15.5803C14.2858 35.9357 13.2363 34.8863 13.2363 33.5917V19.5276C13.2363 18.233 14.2858 17.1836 15.5803 17.1836Z" stroke="white" stroke-width="2.07064" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <p>Bebekayayo@gmail.com</p>                    
            </div>
            <div class="flex items-center gap-5">
               <div class="w-[52px] h-[52px] rounded-full bg-[#292E36] flex items-center justify-center">
                <img src="{{ asset("Call.svg") }}" alt="">
               </div>                    
                <p>08123456789</p>                    
            </div>
            <div class="flex gap-3">
                <div class="w-[52px] h-[52px] rounded-full bg-[#292E36] flex items-center justify-center">
                    <a href="https://www.instagram.com/bebekayayo?utm_source=ig_web_button_share_sheet&igsh=YzAwZjE1ZTI0Zg==" target="_blank">
                        <svg width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.9597 2.1027C18.2721 2.10645 19.5296 2.60703 20.4576 3.49513C21.3857 4.38323 21.9087 5.58667 21.9127 6.84262V16.3214C21.9087 17.5774 21.3857 18.7808 20.4576 19.6689C19.5296 20.557 18.2721 21.0576 16.9597 21.0614H7.05489C5.7425 21.0576 4.48497 20.557 3.55697 19.6689C2.62896 18.7808 2.10587 17.5774 2.10195 16.3214V6.84262C2.10587 5.58667 2.62896 4.38323 3.55697 3.49513C4.48497 2.60703 5.7425 2.10645 7.05489 2.1027H16.9597ZM16.9597 0.207031H7.05489C3.24122 0.207031 0.121094 3.19297 0.121094 6.84262V16.3214C0.121094 19.9711 3.24122 22.957 7.05489 22.957H16.9597C20.7734 22.957 23.8935 19.9711 23.8935 16.3214V6.84262C23.8935 3.19297 20.7734 0.207031 16.9597 0.207031Z" fill="white"/>
                            <path d="M18.4457 6.84375C18.1519 6.84375 17.8646 6.76036 17.6203 6.60412C17.376 6.44788 17.1855 6.22582 17.0731 5.966C16.9606 5.70619 16.9312 5.4203 16.9885 5.14448C17.0458 4.86866 17.1874 4.61531 17.3951 4.41646C17.6029 4.21761 17.8677 4.08218 18.1559 4.02732C18.4441 3.97246 18.7428 4.00062 19.0143 4.10823C19.2858 4.21585 19.5179 4.3981 19.6811 4.63192C19.8444 4.86575 19.9315 5.14066 19.9315 5.42188C19.9319 5.60871 19.8938 5.79379 19.8193 5.96648C19.7448 6.13917 19.6353 6.29608 19.4973 6.42819C19.3592 6.5603 19.1953 6.66502 19.0148 6.73633C18.8344 6.80765 18.641 6.84415 18.4457 6.84375ZM12.0076 7.79133C12.7912 7.79133 13.5573 8.01372 14.2089 8.43037C14.8605 8.84702 15.3683 9.43923 15.6682 10.1321C15.9681 10.825 16.0466 11.5874 15.8937 12.3229C15.7408 13.0585 15.3634 13.7341 14.8093 14.2644C14.2552 14.7947 13.5492 15.1558 12.7806 15.3021C12.012 15.4485 11.2153 15.3734 10.4913 15.0864C9.76727 14.7994 9.14845 14.3134 8.71307 13.6898C8.2777 13.0662 8.04531 12.3331 8.04531 11.5832C8.04644 10.5778 8.46425 9.61399 9.20707 8.90312C9.94989 8.19225 10.9571 7.7924 12.0076 7.79133ZM12.0076 5.89566C10.8321 5.89566 9.68309 6.22923 8.70575 6.85418C7.72841 7.47913 6.96667 8.3674 6.51685 9.40665C6.06703 10.4459 5.94933 11.5895 6.17865 12.6927C6.40797 13.796 6.97399 14.8094 7.80515 15.6048C8.63631 16.4002 9.69527 16.9419 10.8481 17.1614C12.001 17.3808 13.1959 17.2682 14.2819 16.8377C15.3678 16.4073 16.296 15.6783 16.9491 14.743C17.6021 13.8077 17.9507 12.708 17.9507 11.5832C17.9507 10.0747 17.3245 8.62811 16.21 7.5615C15.0954 6.49488 13.5838 5.89566 12.0076 5.89566Z" fill="white"/>
                        </svg>
                    </a>                    
                   </div>
                   <div class="w-[52px] h-[52px] rounded-full bg-[#292E36] flex items-center justify-center">
                   <a href="https://www.facebook.com/profile.php?id=100069899448560" target="_blank">
                    <svg width="25" height="23" viewBox="0 0 25 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24.665 11.6484C24.665 5.3668 19.3427 0.273438 12.7788 0.273438C6.21484 0.273438 0.892578 5.3668 0.892578 11.6484C0.892578 17.3258 5.23847 22.0317 10.9216 22.8858V14.9375H7.90279V11.6484H10.9216V9.14238C10.9216 6.29203 12.6965 4.71629 15.4113 4.71629C16.7119 4.71629 18.0724 4.93871 18.0724 4.93871V7.73828H16.5728C15.0971 7.73828 14.6355 8.61477 14.6355 9.51562V11.6484H17.9318L17.4054 14.9375H14.636V22.8868C20.3191 22.0332 24.665 17.3273 24.665 11.6484Z" fill="white"/>
                    </svg>
                    </a>
                   </div>
            </div>           
        </div>
        {{-- right --}}
        <div class="h-full col-span-2 px-12 py-4 ">
            <div class=" w-[100px] border-y border-[#E1B168] content-center text-center">
                <h1 class="text-2xl" style="font-family: 'Cormorant Infant';">{{ "Mail Us" }}</h1>                
            </div>
            <h1 class="pt-5 text-2xl" style="font-family: 'Cormorant Infant';">Have a Question?</h1>
            <div>
                <div class="grid w-full grid-cols-2 gap-6 mt-4">
                    <div class="">
                        <input name="name" class="w-[100%] h-[50px] border border-[#292E3] bg-[#fff] placeholder-[#555555] pl-2" type="text" placeholder="Name">
                    </div>
                    <div class="">
                        <input name="email" class="w-[100%] h-[50px] border border-[#292E3] bg-[#fff] placeholder-[#555555] pl-2" type="email" placeholder="Email">
                    </div>
                    <div class="">
                        <input name="phone" class="w-[100%] h-[50px] border border-[#292E3] bg-[#fff] placeholder-[#555555] pl-2" type="tel" placeholder="Phone">
                    </div>
                    <div class="">
                        <input name="subject" class="w-[100%] h-[50px] border border-[#292E3] bg-[#fff] placeholder-[#555555] pl-2" type="text" placeholder="Subject">
                    </div>                    
                    <div class="col-span-2">
                        <textarea name="messages" class="w-[100%] h-40 border border-[#292E3] bg-[#fff] placeholder-[#555555]  pl-2 px-4 py-2" id="" cols="30" rows="10" placeholder="Message"></textarea>
                    </div>
                    <div class="">
                        <button href="{{ route("menu") }}"><h1 class=" text-black px-14 py-3 items-center text-center border-2 border-[#E1B168] ">Send</h1></button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- bottom --}}
    <div class="flex justify-center mt-44">
          <div class=" w-[200px] border-y border-[#E1B168] content-center text-center">
                <h1 class="text-2xl" style="font-family: 'Cormorant Infant';">{{ "VISIT US!" }}</h1>                
            </div>           
    </div>
    <p class="mt-3 mb-8 text-2xl font-bold text-center" style="font-family: 'Cormorant Infant';">
        Come and visit our Branches
    </p>

    <div class="justify-center px-60 gap-20 grid grid-cols-2  h-[490px]">
        <div class="flex border-l-[2px] border-b-[2px] border-t-[2px]">
            <div class="flex flex-col justify-center gap-4 px-4 pr-10 w-72">
                <h1 class="text-2xl" style="font-family: 'Cormorant Infant';">Kota  Bandung</h1>
                <h1 class="text-xl">Jalan Bengawan No 67.</h1>
                <div class="flex gap-2">
                    <svg width="28" height="22" viewBox="0 0 28 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.76838 5.31526L14.2472 11.9099L22.7261 5.31526M4.35524 1.54688H24.1392C25.44 1.54688 26.4945 2.60135 26.4945 3.90211V18.0335C26.4945 19.3343 25.44 20.3888 24.1392 20.3888H4.35524C3.05448 20.3888 2 19.3343 2 18.0335V3.90211C2 2.60135 3.05448 1.54688 4.35524 1.54688Z" stroke="#E1B168" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <h1 class="text-lg">bebekayayo@gmail.com</h1>                        
                </div>
                <div class="flex gap-2">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25.7294 20.6632C24.7943 19.7212 22.5298 18.3463 21.431 17.7922C20.0002 17.0715 19.8825 17.0126 18.7579 17.8482C18.0077 18.4058 17.509 18.9039 16.6311 18.7166C15.7532 18.5294 13.8454 17.4737 12.175 15.8085C10.5045 14.1434 9.38754 12.1803 9.19971 11.3053C9.01188 10.4303 9.51826 9.9375 10.0706 9.18559C10.849 8.12573 10.7901 7.94909 10.1247 6.51828C9.60599 5.40543 8.19108 3.16207 7.24545 2.23175C6.23388 1.23254 6.23388 1.40918 5.58207 1.68003C5.05141 1.9033 4.54232 2.1747 4.06117 2.49082C3.11908 3.11673 2.59621 3.63665 2.23056 4.418C1.86491 5.19935 1.70063 7.03113 3.58895 10.4615C5.47726 13.8919 6.80208 15.646 9.54416 18.3804C12.2862 21.1149 14.3948 22.5851 17.4772 24.3139C21.2903 26.4495 22.7529 26.0332 23.5366 25.6681C24.3203 25.3031 24.8426 24.7849 25.4697 23.8428C25.7866 23.3625 26.0586 22.854 26.2823 22.3237C26.5537 21.6742 26.7303 21.6742 25.7294 20.6632Z" stroke="#E1B168" stroke-width="2.1" stroke-miterlimit="10"/>
                        </svg>
                        
                    <h1 class="text-lg">+62 817 0288 799</h1>                        
                </div>
            </div>
            <div class="">
                <img src="{{ asset("kiri.png") }}" alt="" class="w-full h-full">
            </div>
        </div>
        <div class="flex border-l-[2px] border-b-[2px] border-t-[2px]">
            <div class="flex flex-col justify-center gap-4 px-4 pr-10 w-72">
                <h1 class="text-2xl" style="font-family: 'Cormorant Infant';">Kota Bogor</h1>
                <h1 class="text-xl">Jalan Pangrango No 32,</h1>
                <div class="flex gap-2">
                    <svg width="28" height="22" viewBox="0 0 28 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.76838 5.31526L14.2472 11.9099L22.7261 5.31526M4.35524 1.54688H24.1392C25.44 1.54688 26.4945 2.60135 26.4945 3.90211V18.0335C26.4945 19.3343 25.44 20.3888 24.1392 20.3888H4.35524C3.05448 20.3888 2 19.3343 2 18.0335V3.90211C2 2.60135 3.05448 1.54688 4.35524 1.54688Z" stroke="#E1B168" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <h1 class="text-lg">bebekayayo@gmail.com</h1>                        
                </div>
                <div class="flex gap-2">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25.7294 20.6632C24.7943 19.7212 22.5298 18.3463 21.431 17.7922C20.0002 17.0715 19.8825 17.0126 18.7579 17.8482C18.0077 18.4058 17.509 18.9039 16.6311 18.7166C15.7532 18.5294 13.8454 17.4737 12.175 15.8085C10.5045 14.1434 9.38754 12.1803 9.19971 11.3053C9.01188 10.4303 9.51826 9.9375 10.0706 9.18559C10.849 8.12573 10.7901 7.94909 10.1247 6.51828C9.60599 5.40543 8.19108 3.16207 7.24545 2.23175C6.23388 1.23254 6.23388 1.40918 5.58207 1.68003C5.05141 1.9033 4.54232 2.1747 4.06117 2.49082C3.11908 3.11673 2.59621 3.63665 2.23056 4.418C1.86491 5.19935 1.70063 7.03113 3.58895 10.4615C5.47726 13.8919 6.80208 15.646 9.54416 18.3804C12.2862 21.1149 14.3948 22.5851 17.4772 24.3139C21.2903 26.4495 22.7529 26.0332 23.5366 25.6681C24.3203 25.3031 24.8426 24.7849 25.4697 23.8428C25.7866 23.3625 26.0586 22.854 26.2823 22.3237C26.5537 21.6742 26.7303 21.6742 25.7294 20.6632Z" stroke="#E1B168" stroke-width="2.1" stroke-miterlimit="10"/>
                        </svg>
                        
                    <h1 class="text-lg">+62 817 0288 799</h1>                        
                </div>
            </div>
            <div class="col-span-2">
                <img src="{{ asset("kanan.png") }}" alt="" class="h-full">
            </div>
        </div>       
    </div>
</div>
@endsection