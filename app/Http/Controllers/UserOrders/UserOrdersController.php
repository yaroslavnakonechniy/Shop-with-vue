<?php

namespace App\Http\Controllers\UserOrders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order\Order;

class UserOrdersController extends Controller
{
    public function index(){

        $orders = Auth::user()->orders()->where('status', 1)->paginate(5);

        return view('user.orders.index', compact('orders'));
    }

    public function show($order){

        $order = Order::findOrFail($order);

        return view('user.orders.show', compact('order'));
    }
}
