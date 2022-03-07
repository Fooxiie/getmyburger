<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show(Request $request)
    {
        $isfiltered = $request->query('isfiltered');
        if ($isfiltered) {
            $orders = Order::all();
        } else {
            $orders = Order::getTodayOrders();
        }
        return view('order.order', compact('orders', 'isfiltered'));
    }

    public function delete(Request $req)
    {
        $order = Order::query()->find($req->query('id'));
        $order->delete();
        return back();
    }
}
