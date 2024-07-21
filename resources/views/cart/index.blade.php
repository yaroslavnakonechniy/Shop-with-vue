@extends('layout.main')

@section('content')

<div class="starter-template">
        <h1>Корзина</h1>

        <p>Оформление заказа</p>
        <div class="panel">
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
                                        <img height="56px" src="{{ Storage::url('$product->image')}}">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td><span class="">{{$product->pivot->count}}</span>
                                    <div class="btn-group">
                                        <form action="{{ route('cart.remove', $product) }}" method="POST">
                                            <button type="submit" class="btn btn-danger">

                                               <span class="glyphicon glyphicon-minus" aria-hidden="true">-</span></button>
                                            @csrf
                                        </form>
                                        <form action="{{ route('cart.add', $product) }}" method="POST">
                                            <button type="submit" class="btn btn-success">

                                               <span class="glyphicon glyphicon-plus" aria-hidden="true">+</span></button>
                                            @csrf
                                        </form>
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
            <div class="btn-group pull-right" role="group">
                <a type="button" class="btn btn-success" href="{{route('confirm.form')}}">Оформить заказ</a>
            </div>
        </div>
    </div>

@endsection