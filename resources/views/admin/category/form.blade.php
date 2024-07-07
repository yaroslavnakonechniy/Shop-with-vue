@extends('layout.admin.main')

@section('title', 'додати Категории')

@section('content')

<form method="post" enctype="multipart/form-data"

    @isset($category)
        action="{{route('categories.update', $category)}}" 
        @else 
            action="{{route('categories.store')}}"
    @endisset>
    @csrf
    @isset($category)
        @method('PUT')
    @endisset

  <div class="form-group">
    <label for="name">Name</label>
    @error('name')
      <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <input type="text" class="form-control" id="name" name="name" value="@isset($category){{ $category->name }}@endisset"  placeholder="Enter name">
  </div>
  <div class="form-group">
    <label for="img">Image URL:</label>
    @isset($category->img)
    <div>
      <img src="{{ Storage::url($category->img) }}" height="240px">
    </div>
    @endisset
    <input type="file" name="img" id="img" class="form-control">
    @error('img')
      <div class="alert alert-danger">{{$message}}</div>
    @enderror
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection