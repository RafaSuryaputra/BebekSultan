@extends('dashboard')

@section('content')
    <div class="px-8 py-5 mt-5 ml-12 bg-white shadow-md max-w-7xl">
        <div class="flex justify-between w-full p-3 mb-6 border-b-2">
            <div class=""> 
                <h1 class="font-bold">{{ $title }}</h1>
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Detail user of {{ $model->name }}.</p>
            </div>           
           </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td width="15%">ID</td>
                        <td>: {{ $model->id }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>: {{ $model->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: {{ $model->email }}</td>
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td>: {{ implode(', ', $model->getRoleNames()->toArray()) }}</td>
                    </tr>                  
                </thead>
            </table>           
        </div>
    </div>

    </div>
    @push('datatables')
    @endpush
@endsection
