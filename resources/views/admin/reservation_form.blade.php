@extends('dashboard')

@section('content')
    <div class="px-8 py-5 mt-5 ml-12 bg-white shadow-md max-w-7xl">
        <div class="flex justify-between w-full p-3 mb-6 border-b-2">
            <div class=""> 
                <h1 class="font-bold">{{ $title }}</h1>
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Detail user of {{ $model->name }}.</p>
            </div>           
           </div>

           @if($model->payment_proof)
              <button id="proofBtn" data-modal-target="default-modal" data-modal-toggle="default-modal" type="button">                
                  <div class="flex flex-col items-center justify-center mb-5 ">
                      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bukti Pembayaran:</label>
                      <img id="image-preview" src="{{ \Storage::url($model->payment_proof) }}" alt="{{ $model->name }}" class="max-h-36 max-w-max">
                    </div>
                </button>
              @endif

        <form class="table-responsive" action="{{ route("reservation.update", $model) }}" method="POST">
            @csrf
            @method('PUT')
            <table class="table table-striped">
                <thead class="text-lg">
                    <tr>
                        <td width="15%">ID</td>
                        <td>: {{ $model->id }}</td>
                    </tr>
                    <tr>
                        <td>Table Number</td>
                        <td>: {{ $model->table->table_number }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>: {{ $model->name }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>: {{ $model->phone }}</td>
                    </tr>
                    <tr>
                        <td>Reservation for date</td>
                        <td>: {{ \Carbon\Carbon::parse($model->date)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}</td>
                    </tr>
                    <tr>
                        <td>Reservation created at</td>
                        <td>: {{ \Carbon\Carbon::parse($model->created_at)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}</td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td> 
                            @if ($model->table->id != 1 || $model->table->id != 4 || $model->table->id != 10)
                            <h1 class="font-bold text-[#1F242C]">: Rp.
                                {{ 4 * 15000 }}</h1>
                        @elseif($model->table->id == 1 || $model->table->id == 4)
                            <h1 class="font-bold text-[#1F242C]">: Rp.
                                {{ 2 * 15000 }}</h1>
                        @elseif($model->table->id == 10)
                            <h1 class="font-bold text-[#1F242C]">: Rp.
                                {{ 6 * 15000 }}</h1>
                        @endif
                        </td>
                    </tr>    
                    <tr>
                        <td>Status</td>    
                        <td>
                            {{-- Change to select input --}}
                            : <select name="status" id="" class="px-4 ml-2 rounded-xl">
                                <option value="pending" {{ old($model->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ old($model->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="waiting payment" {{ old($model->status) == 'waiting payment' ? 'selected' : '' }}>Waiting Payment</option>
                                <option value="canceled" {{ old($model->status) == 'canceled' ? 'selected' : '' }}>Canceled</option>
                                <option value="done" {{ old($model->status) == 'done' ? 'selected' : '' }}>Done</option>                                
                            </select>
                            <button type="submit" class="ml-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update Status</button>
                      
                        </td>                        
                    </tr>                                   
                </thead>
            </table>
        </form>
    </div>


                    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <!--
    Background backdrop, show/hide based on modal state.

    Entering: "ease-out duration-300"
      From: "opacity-0"
      To: "opacity-100"
    Leaving: "ease-in duration-200"
      From: "opacity-100"
      To: "opacity-0"
  -->
  <div id="bg-modal" class="fixed inset-0 bg-gray-800/50 blur-md"></div>
 
  <div id="modal" class="fixed inset-0 z-50 overflow-y-auto">
    <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
      <!--
        Modal panel, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
      <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl  h-[800px] sm:my-8 sm:w-full sm:max-w-lg">
        <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
          <div class="flex justify-center flex-shrink-0 w-full">
                        <img id="image-preview" src="{{ \Storage::url($model->payment_proof) }}" alt="{{ $model->name }}" class="max-h-[670px] max-w-[100%]">
                    </div> 
            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left"> 
            </div>
          </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 sm:flex sm:flex-row-reverse sm:px-6">
          <button id="closeBtn" type="button" class="inline-flex justify-center w-full px-3 py-2 mt-3 text-sm font-semibold text-gray-900 bg-white rounded-md shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
@push("datatables")
    <script>
        const closeBtn = document.getElementById("closeBtn");
        const proofBtn = document.getElementById("proofBtn");
        const modal = document.getElementById("modal")
            const bgModal = document.getElementById("bg-modal")

        proofBtn.addEventListener("click", function(){
            modal.classList.remove("hidden")
            bgModal.classList.remove("hidden")
        })
   
        closeBtn.addEventListener("click", function(){
            modal.classList.add("hidden")
            bgModal.classList.add("hidden")
        })
      
    </script>
@endpush
@endsection
