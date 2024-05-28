@extends('dashboard')

@section('content')
    <div class="max-w-7xl ml-12 bg-white mt-5 shadow-md py-5 px-8">
        <div class="justify-between p-3 flex border-b-2 w-full mb-6">
            <div class=""> 
                <h1 class="font-bold">{{ $title }}</h1>
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Detail menu of {{ $model->name }}.</p>
            </div>           
           </div>

        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
            <img id="image-preview" src="{{ \Storage::url($model->image) }}" alt="{{ $model->name }}" class="max-h-36 max-w-max">
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td width="15%">ID</td>
                        <td>: {{ $model->id }}</td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>: {{ $model->price }}</td>
                    </tr>
                    <tr>
                        <td>Menu Name</td>
                        <td>: {{ $model->name }}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>: {{ $model->description }}</td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>: {{ $model->category }}</td>
                    </tr>
                    <tr>
                        <td>Tags</td>
                        <td>: {{ $model->tags }}</td>
                    </tr>
                </thead>
            </table>
            {{-- poster --}}
            @isset($posters)
                @if ($posters->count() > 0)
                    <label for="end_date" class="form-label mt-4 pl-4">Poster Event</label>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($posters as $poster)
                                    <div class="col-md-3 position-relative">
                                        <form action="{{ route('admin.poster.destroy', $poster) }}" method="POST"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <img src="{{ \Storage::url($model->name . $poster->poster_path) }}"
                                                style="width: 100%;" alt="">
                                            <button type="button"
                                                class="btn btn-danger position-absolute top-0 end-0 delete-button">X</button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endisset
        </div>
    </div>

    </div>
    @push('datatables')
    @endpush
@endsection
