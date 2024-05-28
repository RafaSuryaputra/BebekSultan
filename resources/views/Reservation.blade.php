@extends('layouts.bebek')

@section('content')
<div class="items-center w-full py-12 bg-white px-18 content-centers" id="reservation">
    {{-- Content Form Rsv --}}
    <div class="mt-24 mx-auto w-[1098px] h-[622px]">

        {{-- container form --}}
        <div class="h-full bg-white">

            {{-- Reservation section --}}
            <div class="flex flex-row w-full h-full gap-10">
                <div class="w-[55%] py-8">
                    <div class="w-[130px] border-y border-[#E1B168] text-center mb-3">
                        <h1 class="pt-1 tracking-widest">RESERVATION</h1>
                    </div>
                    <h1 class="mb-2 text-5xl" style="font-family: 'Cormorant Infant';">Book your table now</h1>
                    <p class="w-[75%]">The people, food and the prime locations make Rodich the perfect place good friends & family to come together and have great time.</p>
                    <form action="{{ route('table') }}" method="GET">
                        <div class="grid w-full grid-cols-1 gap-6 mt-4">
                            <div class="">
                                <input value="{{auth()->user()->name}}"  name="name" class="w-[100%] h-[50px] border border-[#292E3] bg-[#fff] placeholder-[#555555] pl-2" type="text" placeholder="Name">
                            </div>
                            <div class="">
                                <input value="{{auth()->user()->phone ?? ''}}" name="phone" class="w-[100%] h-[50px] border border-[#292E3] bg-[#fff] placeholder-[#555555] pl-2" type="tel" placeholder="Phone">
                            </div>
                            <div class="">
                                <input name="date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="w-[100%] h-[50px] border border-[#292E3] bg-[#fff] placeholder-[#555555] pl-2" type="date" placeholder="Date">
                            </div>
                            {{-- <div class="">
                                <input name="" class="w-[100%] h-[50px] border border-[#292E3] bg-[#fff] placeholder-[#555555] pl-2" type="text" placeholder="Person">
                            </div> --}}
                        </div>
                        <button class="mt-8 text-[#E1B168] px-7 py-3 flex items-center border-2 border-[#E1B168]">Book a Table </button>
                    </form>
                </div>
                <div class="w-[45%] bg-gray-300">
                    <img class="w-full h-full" src="Reservasi.png" alt="">
                </div>
            </div>


        </div>


    </div>
    {{-- Content Bottom --}}
    <div class="mb-40 mx-auto w-[1098px] h-[502px] mt-40">
        <div class="h-full mt-10 bg-white">
            {{-- I don't know what is this section for, I just make it as customer says OK! --}}
            <div class="flex flex-row w-full h-full gap-10">
                <div class="w-[45%] bg-gray-300">
                    <img class="w-full h-full" src="ChoseUS.png" alt="">
                </div>
                <div class="w-[55%] py-8">
                    <div class="w-[150px] border-y border-[#E1B168] text-center mb-3">
                        <h1 class="pt-1 tracking-widest">WHY CHOOSE US</h1>
                    </div>
                    <h1 class="mb-2 text-5xl" style="font-family: 'Cormorant Infant';">Why We Are The Best?</h1>
                    <p class="w-[80%]">Bring the table winwin survival strateges ensure proactive  the domination the end of the day going forward new normal that
                        has evolved froms generation on the runway heading  towards streamlined cloud solution generated content in real times will have multiple touchpoints.</p>

                        <div class="grid grid-cols-2 gap-6 mt-8 w-[80%]">
                            <div class="w-full">
                                <button class="w-full text-[#292E36] px-7 h-[65px] content-center flex items-center border-2 border-[#EAEAEA] bg-[#fff ]">
                                    <svg width="30" height="29" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.16579 6.86701C1.01862 6.63449 0.966684 6.35285 1.02103 6.08204C1.07538 5.81123 1.23171 5.57265 1.45676 5.4171C5.4057 2.54468 10.1418 1 15 1C19.8582 1 24.5943 2.54468 28.5432 5.4171C28.7683 5.57265 28.9246 5.81123 28.979 6.08204C29.0333 6.35285 28.9814 6.63449 28.8342 6.86701L15.8861 27.5014C15.7922 27.6539 15.6616 27.7798 15.5066 27.867C15.3516 27.9542 15.1772 28 15 28C14.8228 28 14.6484 27.9542 14.4934 27.867C14.3384 27.7798 14.2078 27.6539 14.1139 27.5014L1.16579 6.86701Z" stroke="#E1B168" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M4 10C7.10277 7.41337 10.9895 6 15 6C19.0105 6 22.8972 7.41337 26 10" stroke="#E1B168" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M19.3447 20.2505C18.7388 20.1374 18.1728 19.8988 17.6918 19.5538C17.2108 19.2088 16.828 18.7668 16.574 18.263C16.3199 17.7593 16.2016 17.2077 16.2285 16.6521C16.2554 16.0966 16.4267 15.5525 16.7287 15.0631C17.0308 14.5737 17.4554 14.1525 17.9685 13.8332C18.4817 13.5138 19.0693 13.3051 19.6846 13.2235C20.2999 13.142 20.9259 13.19 21.5128 13.3636C22.0996 13.5372 22.6311 13.8317 23.0649 14.2235" stroke="#E1B168" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6 14.225C6.24017 13.6321 6.64325 13.1137 7.16584 12.7256C7.68844 12.3375 8.31077 12.0944 8.96582 12.0224C9.62088 11.9505 10.2839 12.0524 10.8834 12.3173C11.4829 12.5821 11.9962 12.9999 12.3682 13.5255C12.7401 14.0512 12.9565 14.6648 12.9941 15.3004C13.0317 15.936 12.8891 16.5695 12.5815 17.1326C12.274 17.6957 11.8133 18.1672 11.2489 18.4962C10.6845 18.8253 10.0379 18.9995 9.37858 19H9.14557" stroke="#E1B168" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>&nbsp; Fresh Food</span>
                                </button>
                            </div>
                            <div class="">
                                <button class="w-full text-[#292E36] px-7 h-[65px] content-center flex items-center border-2 border-[#EAEAEA] bg-[#fff ]">
                                    <svg width="38" height="36" viewBox="0 0 38 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M26.043 10.9571H32.2941C32.528 10.9554 32.7568 11.0293 32.9506 11.169C33.1444 11.3087 33.2941 11.5076 33.38 11.7397L35.4343 17.2179" stroke="#E1B168" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M2.56445 20.3477H26.0428" stroke="#E1B168" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M27.9983 30.5201C29.9433 30.5201 31.5201 28.9433 31.5201 26.9983C31.5201 25.0533 29.9433 23.4766 27.9983 23.4766C26.0533 23.4766 24.4766 25.0533 24.4766 26.9983C24.4766 28.9433 26.0533 30.5201 27.9983 30.5201Z" stroke="#E1B168" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.0003 30.5201C11.9453 30.5201 13.522 28.9433 13.522 26.9983C13.522 25.0533 11.9453 23.4766 10.0003 23.4766C8.05526 23.4766 6.47852 25.0533 6.47852 26.9983C6.47852 28.9433 8.05526 30.5201 10.0003 30.5201Z" stroke="#E1B168" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M24.4781 26.6094H13.5215" stroke="#E1B168" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6.08621 26.6095H3.73837C3.42703 26.6095 3.12844 26.4909 2.90829 26.28C2.68813 26.069 2.56445 25.7828 2.56445 25.4845V9.73438C2.56445 9.43601 2.68813 9.14986 2.90829 8.93888C3.12844 8.7279 3.42703 8.60937 3.73837 8.60938H26.0428V23.6844" stroke="#E1B168" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M26.043 17.2188H35.4343V25.5666C35.4343 25.8434 35.3106 26.1088 35.0905 26.3045C34.8703 26.5002 34.5717 26.6101 34.2604 26.6101H32.3039" stroke="#E1B168" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>&nbsp; Fast Delivery</span>
                                </button>
                            </div>
                            <div class="">
                                <button class="w-full text-[#292E36] px-7 h-[65px] content-center flex items-center border-2 border-[#EAEAEA] bg-[#fff ]">
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22 11L12.6614 20L8 15.5" stroke="#E1B168" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15 29C22.732 29 29 22.732 29 15C29 7.26801 22.732 1 15 1C7.26801 1 1 7.26801 1 15C1 22.732 7.26801 29 15 29Z" stroke="#E1B168" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>&nbsp; Qualty Maintain</span>
                                </button>
                            </div>
                            <div class="">
                                <button class="w-full text-[#292E36] px-7 h-[65px] content-center flex items-center border-2 border-[#EAEAEA] bg-[#fff ]">
                                    <svg width="32" height="30" viewBox="0 0 32 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15 8V15" stroke="#E1B168" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M23 19L15 15" stroke="#E1B168" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M24 11H31V5" stroke="#E1B168" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M25.4641 24.8955C23.4607 26.8545 20.9076 28.189 18.1279 28.7302C15.3482 29.2713 12.4666 28.9947 9.8478 27.9354C7.22896 26.8761 4.9905 25.0817 3.41557 22.7792C1.84063 20.4766 1 17.7694 1 15C1 12.2306 1.84063 9.52337 3.41557 7.22083C4.9905 4.9183 7.22896 3.12389 9.8478 2.0646C12.4666 1.00531 15.3482 0.72873 18.1279 1.26985C20.9076 1.81097 23.4607 3.14547 25.4641 5.10455L31 10.4977" stroke="#E1B168" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>&nbsp; 24/7 Service</span>
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
