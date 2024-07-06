@extends('layout.main')

@section('content')

    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if($category->img)
                            <img src="{{ Storage::url($category->img) }}" class="card-img-top" alt="{{ $category->name }}">
                        @else
                            <img src="default-image-path.jpg" class="card-img-top" alt="{{ $category->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <a href="{{ route('main.category.products.show', $category->id) }}" class="btn btn-primary">View Category products</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
        {{ $categories->links() }}
        </div>
    </div>



@endsection