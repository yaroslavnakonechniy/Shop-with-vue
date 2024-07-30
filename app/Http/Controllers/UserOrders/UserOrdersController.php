<?php

namespace App\Http\Controllers\UserOrders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserOrdersController extends Controller
{
    public function orders(){


        return view('orders.user.index');
    }

    public function show($order){

        
        return view('orders.user.index');
    }
}
