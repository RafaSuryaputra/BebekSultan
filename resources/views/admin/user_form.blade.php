@extends('dashboard')

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
   <div class="justify-between p-6 mb-3">
    <h1 class="font-bold mb-4 text-2xl">{{ $title }}</h1>
        {!! Form::model($model, ['route' => $route, 'method' => $method, 'enctype' => 'multipart/form-data',]) !!}
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User Name</label>
                {!! Form::text('name', null, [
                    'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                ]) !!}               
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">email</label>
                {!! Form::email('email', null, [
                    'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                ]) !!}               
            </div>  
            <div class="mb-5">
                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Role</label>                
                {!! Form::select('role', [
                    'admin' => 'admin',
                    'user' => 'user',
                ], null, [
                    'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                    'placeholder' => 'Pilih Role',
                ]) !!}
            </div>            
            <div class="mb-5">                
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password</label>                
                {!! Form::password('password',[
                    'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                ]) !!}               
            </div>                 
            <div class="mb-5">
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                {!! Form::password('password_confirmation', [
                    'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                ]) !!}
            </div>                  
                      
            <button type="submit"
                class="text-white mb-10 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        {!! Form::close() !!}
    </div>
    @push("datatables")
    <script>
        function previewImage(input) {            
            var boxPreview = document.getElementById('preview-image');
            var preview = document.getElementById('image-preview');

            var file = input.files[0];
            var reader = new FileReader();

            reader.onload = function (e) {            
                preview.src = e.target.result;
                boxPreview.classList.remove('hidden'); 
                preview.style.display = 'block';
            };
    
            reader.readAsDataURL(file);
        }
    </script>
    @endpush
@endsection