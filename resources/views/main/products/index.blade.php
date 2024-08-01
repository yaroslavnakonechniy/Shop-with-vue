@extends('layout.main')

@section('content')

    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="labels">
                            @if($product->isNew())
                                <span class="badge badge-success">Новинка</span>
                            @endif
    
                            @if($product->isRecommend())
                                <span class="badge badge-warning">Рекомендуем</span>
                            @endif
    
                            @if($product->isHit())
                                <span class="badge badge-danger">Хит продаж!</span>
                            @endif
                        </div>
                        @if($product->img)
                            <img src="{{ Storage::url($product->img) }}" class="card-img-top" alt="{{ $product->name }}">
                        @else
                            <img src="default-image-path.jpg" class="card-img-top" alt="{{ $product->name }}">
                        @endif
                        <div class="d-flex justify-content-between">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <span class="text-muted">${{ $product->price }}</span>
                            </div>
                        <div class="card-body">
                            <a href="{{route('main.product.show', $product->id)}}" class="btn btn-primary">View Product</a>
                            <form action="{{route('cart.add', $product)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success">Add to basket</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Відображення пагінації -->
        <div >
            {{ $products->links() }}
        </div>
    </div>



@endsection