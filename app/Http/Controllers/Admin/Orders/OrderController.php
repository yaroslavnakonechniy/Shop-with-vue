<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order\Order;

class OrderController extends Controller
{
    public function index(){

        $orders = Order::where('status', '1')->paginate(5);

        return view('admin.orders.index', compact('orders'));
    }

    public function show($id){

        $isAdmin = auth()->user()->is_admin; 

        $order = Order::findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }

    
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
    }
    
}
