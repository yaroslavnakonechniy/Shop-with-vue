<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Order\Order;

class CartController extends Controller
{
    public function index(){

        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
        }
        
        return view('cart.index', compact('order'));

    }

    public function addProduct($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }

        if($order->products->contains($productId)){
            $PivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $PivotRow->count++;
            $PivotRow->update();
        }else{
            $order->products()->attach($productId);
        }
        
        $product = Product::find($productId);

        session()->flash('success','Товар "' . $product . '" додано до корзини');
            
        return redirect()->route('cart.index');
    }
    

    public function removeProduct($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('cart.index');
        } 
        $order = Order::find($orderId);

        if($order->products->contains($productId)){
            $PivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if($PivotRow->count < 2){
                $order->products()->detach($productId);
            }else{
                $PivotRow->count--;
                $PivotRow->update();
            }
        }
           
        return redirect()->route('cart.index');
    }
}