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
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection