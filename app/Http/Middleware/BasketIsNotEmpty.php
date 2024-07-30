<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Order\Order;

class BasketIsNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /*
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::find($orderId);
            if($order->products->count() == 0){
                return $next($request);
            }
        }
        session()->flash('warning', 'Basket is empty!!');
        return redirect()->route('layout.main');
        
        */

        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::find($orderId);
            if($order->products->count() == 0){
                session()->flash('warning', 'Basket is empty!!');
                return redirect()->route('layout.main');
            }
        }

        return $next($request);
    }
}
