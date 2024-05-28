@extends('dashboard')

@section('content')
    <div class="max-w-7xl ml-12 bg-white mt-5 shadow-md py-5 px-8">
        <div class="justify-between p-3 flex border-b-2 w-full mb-6">
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
