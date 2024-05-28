@extends('layouts.bebek')

@section('content')
    <form enctype="multipart/form-data" action="{{ route("payment.store", $reservation) }}" method="POST" class="items-center w-full px-20 py-16 bg-white content-centers">
        @csrf
        @method('PUT')
        <h1>
            @if ($reservation->table->capacity == 4)
                <h1 class="text-center text-3xl pb-6 font-bold text-[#1F242C]">Total payment for 4 person: Rp.
                    {{ 4 * 10000 }}</h1>
            @elseif($reservation->table->capacity == 2)
                <h1 class="text-center text-3xl pb-6 font-bold text-[#1F242C]">Total payment for 2 person: Rp.
                    {{ 2 * 10000 }}</h1>
            @elseif($reservation->table->capacity == 6)
                <h1 class="text-center text-3xl pb-6 font-bold text-[#1F242C]">Total payment for 6 person: Rp.
                    {{ 6 * 10000 }}</h1>
            @endif
        </h1>
        <div id="preview-image" class="flex items-center justify-center card borde">
            <img id="image-preview" src="{{ Storage::url('qr.svg') }}" alt="Image Preview" class="h-[400px] mx-auto ">
        </div>
        <div class="font-bold text-3xl text-center pb-6 pt-2 text-[#1F242C] mt-4">
            <p class="pb-3 text-2xl text-center font bold">{{ $reservation->payment_due_at != null ? "The payment will be timed out in" : "Revisi pembayaran tidak valid" }}</p>
            <p id="demo" class="text-3xl text-center text-red-500 font bold"></p>
        </div>
        <h1 class="font-bold text-3xl text-center pb-6 text-[#1F242C]">Bukti Pembayaran</h1>
        {!! Form::file('payment_proof', [
            'class' =>
                'bg-[#1F242C] border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[35%] text-white mx-auto p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
            'onchange' => 'previewImage(this)',
        ]) !!}
        <button type="submit" id="pay-button"
            class="px-16 py-1 h-16 w-60 text-white rounded-lg text-center bg-[#1F242C] mx-auto mt-7 flex justify-center items-center text-2xl">Pay</button>
    </form>
@endsection

@if($reservation->payment_due_at != null)
@push('js')
    <script>
      $(document).ready(function() {       

        if({{ ($reservation->status == 'canceled' || $reservation->status == 'approved' ||  $reservation->status == 'done') ? 'true' : 'false'}}){
            window.location.href = "{{ route('homepage') }}";
        }

    var paymentDueAt = "{{ $reservation->payment_due_at }}"; // Assuming this is in the format "YYYY-MM-DD HH:mm:ss"
    var paymentDueDate = new Date(paymentDueAt);
    paymentDueDate.toLocaleString('id-ID', {
        timeZone: 'Asia/Jakarta'
    });

    function updateTimer() {
        // Get the current time in 'Asia/Jakarta' timezone
        var now = new Date();
        now.toLocaleString('id-ID', {
            timeZone: 'Asia/Jakarta'
        });

        // Calculate the difference in seconds
        var differenceInSeconds = Math.floor((paymentDueDate - now) / 1000);

        if (differenceInSeconds >= 0) {
            // Calculate minutes and seconds
            var minutes = Math.floor(differenceInSeconds / 60);
            var seconds = differenceInSeconds % 60;

            // Add leading zero if needed
            minutes = (minutes < 10) ? '0' + minutes : minutes;
            seconds = (seconds < 10) ? '0' + seconds : seconds;

            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = minutes + ":" + seconds;

            // Continue updating the timer every second
            setTimeout(updateTimer, 1000);
        } else {
            // change type button to button and disable it
            document.getElementById("pay-button").type = "button";
            document.getElementById("pay-button").disabled = true;

            document.getElementById("demo").innerHTML = "The payment has been timed out";
            // redirect to another page
            const ToastTimeOut = Swal.mixin({
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

            ToastTimeOut.fire({
                icon: 'error',
                title: 'Payment has been timed out'
            })
            
            setTimeout(function() {
                window.location.href = "{{ route('homepage') }}";
            }, 3000);                       
        }
    }

    // Initial call to start the countdown
    setTimeout(updateTimer, 400);
});

    </script>
    <script>
        function previewImage(input) {
            let boxPreview = document.getElementById('preview-image');
            let preview = document.getElementById('image-preview');

            let file = input.files[0];
            let reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                boxPreview.classList.remove('hidden');
                preview.style.display = 'block';
            };

            reader.readAsDataURL(file);
        }
    </script>
@endpush
@endif