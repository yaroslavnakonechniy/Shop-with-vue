<form method = "GET" action ="{{route('layout.main')}}">
        <div class="filters row">
            <div class="col-sm-6 col-md-3">
                <label for="price_from">from
                    <input type="text" name="price_from" id="price_from" size="6" value="{{ request()->price_from}}">to
                </label>
                <label for="price_to">
                    <input type="text" name="price_to" id="price_to" size="6"  value="{{ request()->price_to }}">
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="hit">hit
                    <input type="checkbox" name="hit" id="hit" @if(request()->has('hit')) checked @endif> 
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="new">new
                    <input type="checkbox" name="new" id="new" @if(request()->has('new')) checked @endif> 
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="recommend">recommend
                    <input type="checkbox" name="recommend" id="recommend" @if(request()->has('recommend')) checked @endif> 
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                @foreach($categories as $category)
                    <label for="category_{{ $category->id }}">{{ $category->name }}
                        <input type="checkbox" name="category_ids[]" id="category_{{ $category->id }}" value="{{ $category->id }}"
                            @if(is_array(request()->input('category_ids')) && in_array($category->id, request()->input('category_ids'))) checked @endif>
                    </label>
                @endforeach
            </div>        
            <div class="col-sm-6 col-md-3">
                <button type="submit" class="btn btn-primary">filter</button>
                <a href="{{ route('layout.main') }}" class="btn btn-warning">reset</a>
            </div>
        </div>
    </form>