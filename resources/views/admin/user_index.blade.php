
 
    @extends('dashboard')

    @section('content')
    <div class="overflow-x-auto shadow-md sm:rounded-lg px-7">
            <div class="justify-between p-3 flex border-b-2 w-full mb-6">
                <div class=""> 
                    <h1 class="font-bold">{{ $title }}</h1>
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a Users of Bebek Ayayo.</p>
                </div>
                <div>
                    <a href="{{ route($routePrefix . '.create') }}">
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add User</button>
                    </a>
                </div>
               </div>
                <table id="menuDataTables" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>                           
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($models as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>                              
                                <td>
                                    {!! Form::open([
                                        'route' => [$routePrefix . '.destroy', $item->id],
                                        'method' => 'DELETE',
                                        'onsubmit' => 'return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')',
                                        'class' => 'flex gap-2 delete-form',
                                    ]) !!}
                                    <a href="{{ route($routePrefix . '.edit', $item) }}"
                                        class="btn btn-warning btn-sm ml-2 mr-2 flex gap-3 text-white">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
    
                                    <a href="{{ route($routePrefix . '.show', $item->id) }}"
                                        class="btn btn-info btn-sm ml-2 mr-2 flex gap-3 text-white">
                                        <i class="fa fa-edit"></i> Detail
                                    </a>
    
                                    <button type="button" data-event-name="{{ $item->title }}"
                                        class="bg-red-500 text-white rounded-full btn-sm items-center flex gap-3 delete-button">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
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
        @push('datatables')
            <script>
                $(document).ready(function() {
                    $('#menuDataTables').DataTable({
                        "scrollY": "490px",
        "scrollCollapse": true,
        "paging": true,
                });
                });
            </script>
            <script>
                // Ambil semua tombol hapus
                const deleteButtons = document.querySelectorAll('.delete-button');
    
                // Tambahkan event listener ke setiap tombol hapus
                deleteButtons.forEach(function(button) {
                    button.addEventListener('click', function(e) {
                        // Tampilkan konfirmasi SweetAlert
                        e.preventDefault();
                        Swal.fire({
                            title: 'Konfirmasi',
                            text: 'Apakah Anda yakin ingin menghapus?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Ya, hapus!',
                        }).then((result) => {
                            // Jika pengguna menekan "Ya", submit form
                            if (result.isConfirmed) {
                                const form = button.closest('.delete-form');
                                console.log(form)
                                form.submit();
                            }
                        });
                    });
                });
            </script>
        @endpush
    @endsection
    