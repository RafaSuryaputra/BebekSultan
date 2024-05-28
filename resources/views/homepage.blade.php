@extends('layouts.bebek')

@section('content')
<div class="items-center w-full py-12 overflow-x-hidden bg-white content-centers" id="home">
    {{-- Galeri Container --}}
    <div class="w-full mb-12">
        <div class="grid grid-cols-4 grid-rows-2 gap-5 mx-auto h-[860   px] w-[1298px] p-5">
            <div class="relative col-span-2 overflow-hidden bg-white">
                <div class="w-full h-full bg-[#292E36]/70 absolute content-center">
                    <h1 class="pt-[195px] text-center text-4xl text-white" style="font-family: 'Cormorant Infant';">Bebek Bakar A’yayo</h1>
                </div>
                <img class="w-full" src="galeri1.png" alt="">
            </div>
            <div class="overflow-hidden bg-white">
                <img class="w-full" src="galeri2.png" alt="">
            </div>
            <div class="overflow-hidden bg-white">
                <img class="w-full" src="galeri3.png" alt="">
            </div>
            <div class="overflow-hidden bg-white">
                <img class="w-full" src="galeri4.png" alt="">
            </div>
            <div class="overflow-hidden bg-white">
                <img class="w-full" src="galeri5.png" alt="">
            </div>
            <div class="col-span-2 overflow-hidden bg-white">
                <img class="w-full" src="galeri6.png" alt="">
            </div>

                <div class="w-full col-span-4 mt-16">
                    <a href="{{ route("menu") }}"><h1 class="mx-[40%] text-[#E1B168] px-5 py-3 items-center text-center border-2 border-[#E1B168]">See all dishes</h1></a>
                </div>
        </div>

        <div class="w-full mx-auto">
        </div>
    </div>

    {{-- Reservation Container --}}
    <div class="relative w-full mb-16">

        {{-- Reservation --}}
        <div class="mx-auto h-[560px] w-[1920px]">
            <div class="absolute pl-[290px] pt-[70px] w-[820px]">
                <div class="w-[160px] border-y border-[#E1B168] text-white text-base text-center mb-7">
                    <h1 class="pt-1 tracking-[3px]">RESERVATION</h1>
                </div>
                <h1 class="text-white text-[85px] leading-none -mt-5" style="font-family: 'Cormorant Infant';">This evening will be great!</h1>
                <p class="text-white w-[410px] pt-6">Don't miss out on the opportunity to savor the culinary delights at Bebek Bakar A’yayo. Secure your table now and embark on a dining experience that will leave you craving for more.</p>
                <div class="flex flex-row justify-between">
                    <div class="w-[50%]">
                        <a href="{{ route("reservation") }}">
                            <button class="mt-8 text-[#E1B168] px-7 py-3 items-center border-2 border-[#E1B168]">Book a Table </button>
                        </a>
                    </div>
                    <div class="w-[50%]">
                        <button class="items-center py-3 mt-8 text-white px-7">Get in touch </button>
                    </div>
                </div>
            </div>
            <img src="Reservasihomepage.png" alt="">
        </div>

    </div>

    {{-- Gatau ini section apa Container --}}
    <div class="w-full px-64 mb-8">
        {{-- Gatau ini section apa --}}
        <div class="grid grid-cols-2 grid-rows-2 mx-auto h-[920px] w-[1298px] p-5">
            <div class="pt-[24px] w-[420px]">
                <div class="w-[90px] border-y border-[#E1B168] text-black text-sm text-center mb-7">
                    <h1 class="pt-1 tracking-[3px]">FEATURE</h1>
                </div>
                <h1 class="text-black text-[55px] leading-tight -mt-5" style="font-family: 'Cormorant Infant';">Always fresh ingredients</h1>
                <p class="text-black w-[450px] pt-6 font-thin">The people, food and the prime locations make Rodich the perfect place good friends & family to come together and have great time.</p>
                <div class="w-[50%]">
                    <a href="{{ route("menu") }}">
                        <button class="mt-8 text-[#E1B168] px-7 py-3 items-center border-2 border-[#E1B168]">View Menu</button>
                    </a>
                </div>
            </div>
            <div class="w-full overflow-hidden"><img src="hombawahkanan.png" alt=""></div>
            <div class="w-full overflow-hidden"><img src="hombawahkiri.png" alt=""></div>
            <div class="pl-[49px] pt-[58px] w-[510px]">
                <div class="w-[90px] border-y border-[#E1B168] text-black text-sm text-center mb-7">
                    <h1 class="pt-1 tracking-[3px]">FEATURE</h1>
                </div>
                <h1 class="text-black text-[55px] leading-tight -mt-5" style="font-family: 'Cormorant Infant';">We invite you to visit our restaurant</h1>
                <p class="text-black w-[450px] pt-6 font-thin">Every time you perfectly dine with us, it should happy for great inspired food in an environment designed with individual touches unique to the local area.</p>
                <div class="w-[50%]">
                    <a href="{{ route("menu") }}">
                        <button class="mt-8 text-[#E1B168] px-7 py-3 items-center border-2 border-[#E1B168]">View Menu</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
