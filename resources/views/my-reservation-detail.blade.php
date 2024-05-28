@extends('layouts.bebek')

@section('content')
<div class="py-12 bg-gray-100 h-[860px] max-h-[860px]">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex justify-between w-full p-3 mb-6 border-b-2">
                    <div class=""> 
                        <h1 class="font-bold">{{ $title }}</h1>
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Detail reservation of {{ $model->id }}.</p>
                    </div>           
                   </div>
        
              @if($model->payment_proof)
              <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button">                
                  <div class="flex flex-col items-center justify-center mb-5 ">
                      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bukti Pembayaran:</label>
                      <img id="image-preview" src="{{ \Storage::url($model->payment_proof) }}" alt="{{ $model->name }}" class="max-h-36 max-w-max">
                    </div>
                </button>
              @endif
        
                <div class="table-responsive">
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
                                    @if ($model->table->capacity == 4)
                                    <h1 class="font-bold text-[#1F242C]">: Rp.
                                        {{ 4 * 10000 }}</h1>
                                @elseif($model->table->capacity == 2)
                                    <h1 class="font-bold text-[#1F242C]">: Rp.
                                        {{ 2 * 10000 }}</h1>
                                @elseif($model->table->capacity == 6)
                                    <h1 class="font-bold text-[#1F242C]">: Rp.
                                        {{ 6 * 10000 }}</h1>
                                @endif
                                </td>
                            </tr>    
                            <tr>
                                <td>Status</td>    
                                <td>
                                    @if($model->status == 'pending')
                                        : <span class="px-2 py-1 text-base text-white bg-yellow-500 rounded-full">Menunggu reservasi</span>
                                    @elseif($model->status == 'approved')
                                        : <span class="px-2 py-1 text-base text-white bg-green-500 rounded-full">Reservasi dikonfirmasi</span>
                                    @elseif($model->status == 'waiting payment')
                                        : <span class="px-2 py-1 text-base text-white bg-yellow-500 rounded-full">Menunggu pembayaran</span>
                                    @elseif($model->status == 'canceled')
                                        : <span class="px-2 py-1 text-base text-white bg-red-500 rounded-full">Reservasi dibatalkan</span>
                                    @elseif($model->status == 'done')
                                        : <span class="px-2 py-1 text-base text-white bg-green-500 rounded-full">Reservasi selesai</span>
                                    @endif
                                </td>
                            </tr>                     
                        </thead>
                    </table>
            </div>
        </div>
    </div>
</div>

<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Bukti Pembayaran
                </h3>
                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 space-y-4 md:p-5">
                <div class="flex flex-col md:flex-row md:items-center md:space-x-3">
                    <div class="flex justify-center flex-shrink-0 mx-auto">
                        <img id="image-preview" src="{{ \Storage::url($model->payment_proof) }}" alt="{{ $model->name }}" class="max-h-96 max-w-[80%]">
                    </div>                  
                </div>
            </div>
            <!-- Modal footer -->
          
        </div>
    </div>
</div>
@endsection

@push('js')

@endpush