@extends('layout.main')

@section('content')

    <div class="container justify-content-center">
        <div class="row">
            <div class="col-md-6 mb-6">
                <div class="card">
                    @if($product->img)
                        <img src="{{ Storage::url($product->img) }}" class="card-img-top" alt="{{ $product->name }}">
                    @else
                        <img src="default-image-path.jpg" class="card-img-top" alt="{{ $product->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-title">{{ $product->name }}</p>
                        <span class="text-muted">${{ $product->price }}</span>
                    </div>
                    <div class="card-body">
                        <a href="" class="btn btn-success">Add to basket</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
