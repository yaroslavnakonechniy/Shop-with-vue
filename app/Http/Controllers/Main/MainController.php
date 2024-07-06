<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category\Category;
use App\Models\Product\Product;

class MainController extends Controller
{

    public function index(){

        $products = Product::paginate(5);

        return view('main.products.index', compact('products'));
    }

    public function categoriesShow(){

        $categories = Category::paginate(5);

        return view('main.categories.index', compact('categories'));
    }

    public function categoryProductsShow($id){

        $category = Category::findOrFail($id);
        $products = $category->products;

        return view('main.products.index', compact('products'));
    }

    public function productsShow(){

        $products = Product::all();

        return view('main.products.index', compact('products'));
    }

    public function productShow($id){

        $product = Product::find($id);
        
        return view('main.products.show', compact('product'));
    }

    
}
