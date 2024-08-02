<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category\Category;
use App\Models\Product\Product;

class MainController extends Controller
{

    public function index(Request $request){

        //dd($request->all());
        $categories = Category::all();
        $productsQuery = Product::query();
        
        if($request->filled('price_from')){
            $productsQuery->where('price', '>=', $request->price_from);
        }

        if($request->filled('price_to')){
            $productsQuery->where('price', '<=', $request->price_to);
        }

        if ($request->has('category_ids')) {
            $productsQuery->whereIn('category_id', $request->input('category_ids'));
        }

        foreach(['new', 'hit', 'recommend'] as $field){
            if($request->has($field)){
                $productsQuery->where($field, 1);
            }
        }

        $products = $productsQuery->paginate(5)->withPath("?" . $request->getQueryString());

        return view('main.products.index', compact('products', 'categories'));
    }

    public function categoriesShow(){

        $categories = Category::paginate(5);

        return view('main.categories.index', compact('categories'));
    }

    public function categoryProductsShow($id){

        $category = Category::findOrFail($id);
        $products = $category->products()->paginate(5);

        return view('main.products.index', compact('products'));
    }

    public function productsShow(){

        $products = Product::paginate(5);

        return view('main.products.index', compact('products'));
    }

    public function productShow($id){

        $product = Product::find($id);
        
        return view('main.products.show', compact('product'));
    }

    
}
