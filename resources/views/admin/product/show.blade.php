@extends('layout.admin.main')

@section('title', 'Продукт ' . $product->name)

@section('content')
<a class="btn btn-warning" type="button" href="{{ route('products.edit', $product) }}">Редактировать</a>
                                
    <div class="col-md-12">
        <h1>{{$product->name}}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $product->id }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td>Ціна</td>
                <td>{{ $product->price }}</td>
            </tr>
            <tr>
                <td>Категорія</td>
                <td>{{ $product->category->name }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img src="{{ Storage::url($product->img) }}"
                         height="240px"></td>
            </tr>
            <tr>
                <td>Кол-во товаров</td>
                <td>12</td>
            </tr>
            <tr>
                <td>Лейблы</td>
                <td>
                    @if($product->isNew())
                        <span class="badge badge-success">Новинка</span>
                    @endif

                    @if($product->isRecommend())
                        <span class="badge badge-warning">Рекомендуем</span>
                    @endif

                    @if($product->isHit())
                        <span class="badge badge-danger">Хит продаж!</span>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection