@extends('dashboard')

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
   <div class="justify-between p-6 mb-3">
    <h1 class="mb-4 text-2xl font-bold">{{ $title }}</h1>
        {!! Form::model($model, ['route' => $route, 'method' => $method, 'enctype' => 'multipart/form-data',]) !!}
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Menu Name</label>
                {!! Form::text('name', null, [
                    'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                ]) !!}               
            </div>
            <div class="mb-5">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                {!! Form::number('price', null, [
                    'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                ]) !!}               
            </div>         
            <div class="mb-5">
                <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
               {!! Form::select('category', [
                'Main Course' => 'Main Course',
                'Second Course' => 'Second Course',
                'Third Course' => 'Third Course',
                'Appetizer' => 'Appetizer',
                'Soup' => 'Soup',
                'Salad' => 'Salad',
                'Bread' => 'Bread',
                'Sauce' => 'Sauce',
                'Breakfast' => 'Breakfast',
                'Brunch' => 'Brunch',
                'Lunch' => 'Lunch',
                'Dinner' => 'Dinner',
                'Side' => 'Side Dish',
                'Snack' => 'Snack',
                'Tea' => 'Tea',
                'Supper' => 'Supper',
                'Sweets' => 'Sweets',                                
                'Dessert' => 'Dessert Course',
                'Drink' => 'Drink',  
                'Cocktail' => 'Cocktail',
                'Wine' => 'Wine',
                'Beer' => 'Beer',
                'Mocktail' => 'Mocktail',
                'Coffee' => 'Coffee',                              
               ], null, [
                    'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
               ]) !!}             
            </div> 
            <div class="mb-5">
                <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags, Example : (Recipes, Sweet, Tasty)</label>
                {!! Form::text('tags', null, [
                    'class' => 'w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none',                    
                    'minlength' => '10', // Minimum length
                    'maxlength' => '200', // Maximum length
                ]) !!}
            </div>          
            <div class="mb-5">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                {!! Form::textarea('description', null, [
                    'class' => 'w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none',
                    'style' => 'resize: none; height: 150px;',
                    'minlength' => '10', // Minimum length
                    'maxlength' => '200', // Maximum length
                ]) !!}
            </div>

           @if (\Route::is('admin.menu.edit'))
           <div id="preview-image" class="p-6 mb-3 border max-h-max">
            <img id="image-preview" src="{{ \Storage::url($model->image) }}" alt="Image Preview" class="max-h-36 max-w-max">
            </div>
           @else
           <div id="preview-image" class="hidden p-6 mb-3 border max-h-max">
            <img id="image-preview" src="" alt="Image Preview" class="max-h-36 max-w-max" style="display: none;">
        </div>
           @endif
            
            <div class="mb-5">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                {!! Form::file('image', [
                    'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                    'onchange' => 'previewImage(this)',
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