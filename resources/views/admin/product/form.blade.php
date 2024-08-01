@extends('layout.admin.main')

@section('button-for-add', 'Add products')

@isset($product)
    @section('title', 'Редактировать товар ' . $product->name)
@else
    @section('title', 'Создать товар')
@endisset
@section('content')
    <div class="col-md-12">
        @isset($product)
            <h1>Редактировать товар <b>{{ $product->name }}</b></h1>
        @else
            <h1>Добавить товар</h1>
        @endisset
        <form method="POST" enctype="multipart/form-data"
              @isset($product)
              action="{{ route('products.update', $product) }}"
              @else
              action="{{ route('products.store') }}"
            @endisset
        >
            <div>
                @isset($product)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                      @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($product){{ $product->name }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">Категория: </label>
                      @error('category_id')
                        <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    <div class="col-sm-6">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                @isset($product)
                                    @if($product->category_id == $category->id)
                                        selected
                                        @endif
                                    @endisset
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                      @error('description')
                        <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    <div class="col-sm-6">
								<textarea name="description" id="description" cols="72" rows="7"> 
                    @isset($product)
                      {{ $product->description }}
                    @endisset
                </textarea>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="img">Image URL:</label>
                    @isset($product->img)
                      <div>
                        <img src="{{ asset('storage/' . $product->img) }}" alt="Product Photo" style="width: 150px; height: auto;">
                        <input type="hidden" name="img" value="{{ $product->img }}">
                      </div>
                    @endisset
                    <input type="file" name="img" id="img" class="form-control">
                    @error('img')
                      <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <br>
                <div class="input-group row">
                    <label for="price" class="col-sm-2 col-form-label">Цена: </label>
                      @error('description')
                        <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="price" id="price"
                               value="@isset($product){{ $product->price }}@endisset">
                    </div>
                </div>
                <br>
                    @foreach(
                        [
                        "new" => "новий",
                        "hit" => "хіт",
                        "recommend" => "рекомендуючі"
                    ] as $field => $title)
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="code" class="col-sm-10 col-form-label">{{$title}}: </label>
                            <input type="checkbox" class="form-control" name="{{$field}}" id="{{$field}}"
                               
                               @if(isset($product) && $product->$field === 1)
                                    checked="checked"
                                @endif
                            >
                            </div>
                    </div>
                    <br>
                    @endforeach
                
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection