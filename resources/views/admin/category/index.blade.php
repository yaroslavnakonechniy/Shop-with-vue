@extends('layout.admin.main')

@section('content')
<!-- Флеш-повідомлення -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

<div class="col-md-12">
        <h1>Categories</h1>
        <a class="btn btn-success" type="button"
           href="{{ route('categories.create') }}">Add category</a>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Название
                </th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('categories.show', $category) }}">Открыть</a>
                                <a class="btn btn-warning" type="button" href="{{ route('categories.edit', $category) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $categories->links() }}
    </div>

@endsection