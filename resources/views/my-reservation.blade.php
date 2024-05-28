@extends('layouts.bebek')

@section('content')
<div class="py-12 bg-gray-100 h-[600px] max-h-[600px] ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <table id="reservationTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Table Number</th>                                                       
                            <th>Date</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservations as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->table->table_number }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->date)->locale('id_ID')->isoFormat('dddd, D MMMM YYYY') }}</td>                                                              
                                <td>
                                    @if($item->status == 'pending')
                                        <span class="bg-yellow-500 text-white rounded-full px-2 py-1 text-xs">Menunggu reservasi</span>
                                    @elseif($item->status == 'approved')
                                        <span class="bg-green-500 text-white rounded-full px-2 py-1 text-xs">Reservasi dikonfirmasi</span>
                                    @elseif($item->status == 'waiting payment')
                                        <span class="bg-yellow-500 text-white rounded-full px-2 py-1 text-xs">Menunggu pembayaran</span>
                                    @elseif($item->status == 'canceled')
                                        <span class="bg-red-500 text-white rounded-full px-2 py-1 text-xs">Reservasi dibatalkan</span>
                                    @elseif($item->status == 'done')
                                        <span class="bg-green-500 text-white rounded-full px-2 py-1 text-xs">Reservasi selesai</span>
                                    @endif
                                </td>
                                <td>
                                    {!! Form::open([                                        
                                        'method' => 'DELETE',
                                        'onsubmit' => 'return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')',
                                        'class' => 'flex gap-2 delete-form',
                                    ]) !!}
                                   
    
                                    @if ($item->status == 'waiting payment' && Carbon\Carbon::parse($item->payment_due_at) > Carbon\Carbon::now())                                
                                    <a href="{{ route('payment', [$item, "#nav"]) }}"
                                        class="btn btn-warning btn-sm ml-2 mr-2 flex gap-3 text-white">
                                        <i class="fa fa-edit"></i> Lanjutkan Pembayaran
                                    </a>         
                                    @elseif($item->status == 'waiting payment' && $item->payment_due_at == null)
                                    <a href="{{ route('payment', [$item, "#nav"]) }}"
                                    class="btn btn-warning btn-sm ml-2 mr-2 flex gap-3 text-white">
                                    <i class="fa fa-edit"></i> Revisi Pembayaran Tidak Valid
                                </a>                                 
                                    @endif

                                    <a href="{{ route('my-reservation.detail', [$item, "#nav"]) }}"
                                    class="btn btn-info btn-sm ml-2 mr-2 flex gap-3 text-white">
                                    <i class="fa fa-edit"></i> Detail
                                </a>      
    
                                    {{-- <button type="button" data-event-name="{{ $item->title }}"
                                        class="bg-red-500 text-white rounded-full btn-sm items-center flex gap-3 delete-button">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button> --}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Data tidak ada</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            
            $('#reservationTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json"
                },
                "scrollY": "330px",
        "scrollCollapse": true,
        "paging": true,
            });
        });
    </script>
@endpush