@extends('layout.admin.main')

@section('content')
<!-- Флеш-повідомлення -->
@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="starter-template">

        <p>заказ {{ $order->name }}</p>
        <div class="panel">
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Імя замовника
                </th>
                <th>
                    Ціна
                </th>
            </tr>
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->getFullPrice() }}</td>
                    <td>
                        
                    </td>
                </tr>
            </tbody>
        </table>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Стоимость</th>
                </tr>
                </thead>
                <tbody>
                    @isset($order)
                        @foreach($order->products as $product)
                            <tr>
                                <td>
                                    <a href="">
                                        <img height="56px" src="{{ Storage::url($product->img)}}">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td><span class="">{{$product->pivot->count}}</span>
                                    <div class="btn-group">
                                        
                                    </div>
                                </td>
                                <td>{{ $product->price }} руб.</td>
                                <td>{{ $product->getPriceForCount($product->price) }} руб.</td>
                            </tr>
                        @endforeach
                    
                <tr>
                    <td colspan="3">Общая стоимость:</td>
                    <td>{{$order->getFullPrice()}} руб.</td>
                </tr>
                </tbody>
                @endisset
            </table>
            <br>
        </div>
    </div>

@endsection