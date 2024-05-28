<x-guest-layout>
    <div class="md:col-span-2 md:h-screen md:block hidden sm:hidden">
        <img src="{{ asset("image 34.png") }}" alt="" class="object-cover bg-center bg-cover aspect-auto h-full">
    </div>
        <div class="md:col-span-1 col-span-3">
             <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
            <a href="{{ url()->previous() }}" style="font-family: 'Literata', serif;" class="flex items-center pl-3 gap-3 py-10">
                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7812 1.875L4.21875 7.5L10.7812 13.125V1.875Z" fill="black"/>
                </svg>                    
                <div class="flex items-center justify-center">
                    <h1 class="font-light text-sm">Back to website</h1>
                </div>                
            </a>
            <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-6 px-16 py-4" style="font-family: 'Literata', serif;">
                @csrf
                <h1 class="font-bold text-5xl">Welcome!</h1>
                <h5 class="pl-1"><span class="text-sm underline-offset-1 underline font-bold" >Create a free account</span> <span class="text-sm">or log in to get started with Bebek Ayayo</span></h5>
               
              <div class="flex flex-col gap-3">
                  {{-- Email --}}
                  <label for="email" class="pl-2 font-bold">Email</label>
                  <input type="text" name="email" class="bg-[#FEC6A5]/[.35] text-black rounded-full  border-[#eab59a] pl-6 placeholder:text-black-100/20" placeholder="abc123@gmail.com">        
                  @error('email')
                  <span class="text-red-600 mt-2">{{ $message }}</span>
                  @enderror
              </div>
             

              <div class="flex flex-col gap-3">
                {{-- password --}}
                <label for="password" class="pl-2 font-bold">Password</label>
                <input type="password" name="password" class="bg-[#FEC6A5]/[.35] text-black rounded-full  border-[#eab59a] pl-6 placeholder:text-black-100/20" placeholder="*********">        
                @error('password')
                <span class="text-red-600 mt-2">{{ $message }}</span>
                @enderror
              </div>

              <button class="bg-[#1F242C] w-full rounded-full h-10 text-white mt-6">
                Log In
              </button>

              <h1 class="text-center font-bold">Or</h1>

              <a href="{{ URL::to('googleLogin') }}" class="bg-[#FEC6A5] text-black w-full rounded-full h-10 flex justify-center items-center">                                 
                        <div class="flex gap-3 justify-center items-center">
                            <span>
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M25.4404 11.7138H24.5007V11.6654H14.0007V16.332H20.5941C19.6322 19.0486 17.0474 20.9987 14.0007 20.9987C10.1349 20.9987 7.00065 17.8644 7.00065 13.9987C7.00065 10.1329 10.1349 6.9987 14.0007 6.9987C15.7851 6.9987 17.4085 7.67186 18.6446 8.77145L21.9445 5.47153C19.8608 3.52961 17.0737 2.33203 14.0007 2.33203C7.55773 2.33203 2.33398 7.55578 2.33398 13.9987C2.33398 20.4416 7.55773 25.6654 14.0007 25.6654C20.4436 25.6654 25.6673 20.4416 25.6673 13.9987C25.6673 13.2164 25.5868 12.4529 25.4404 11.7138Z" fill="#FFC107"/>
                                    <path d="M3.67773 8.56845L7.51082 11.3795C8.54798 8.8117 11.0598 6.9987 13.9992 6.9987C15.7837 6.9987 17.4071 7.67186 18.6432 8.77145L21.9431 5.47153C19.8594 3.52961 17.0722 2.33203 13.9992 2.33203C9.51807 2.33203 5.6319 4.86195 3.67773 8.56845Z" fill="#FF3D00"/>
                                    <path d="M13.9995 25.6651C17.013 25.6651 19.7512 24.5119 21.8214 22.6364L18.2106 19.5809C16.9999 20.5017 15.5205 20.9997 13.9995 20.9984C10.965 20.9984 8.38845 19.0635 7.41778 16.3633L3.61328 19.2945C5.54411 23.0728 9.46528 25.6651 13.9995 25.6651Z" fill="#4CAF50"/>
                                    <path d="M25.4398 11.7164H24.5V11.668H14V16.3346H20.5934C20.1333 17.6275 19.3045 18.7573 18.2093 19.5844L18.2111 19.5832L21.8219 22.6387C21.5664 22.8709 25.6667 19.8346 25.6667 14.0013C25.6667 13.2191 25.5862 12.4555 25.4398 11.7164Z" fill="#1976D2"/>
                                    </svg>       
                            </span>Log In with Google                                     
                            
                        </div>
              </a>
              <a href="{{ route('register') }}" class="mt-2 text-center underline underline-offset-1">if you don't have an account</a>                
            </form>       
        </div>       
</x-guest-layout>
