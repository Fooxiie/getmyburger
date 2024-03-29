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

    public function resume(Request $request)
    {
        $orders = Order::getTodayOrders();
        $fries = 0;
        $nbBurger = $orders->count();
        $crispys = 0;
        $burgers = array();
        $globalPrice = 0;
        foreach ($orders as $order) {
            $globalPrice += $order->totalPrice();
            $fries += $order->fries;
            $crispys += $order->crispy;
            if (!isset($burgers[$order->burger->name])) {
                $burgers[$order->burger->name] = 1;
            } else {
                $burgers[$order->burger->name] = $burgers[$order->burger->name] + 1;
            }
        }
        return view('order.resume_order', compact('burgers', 'fries', 'globalPrice', 'crispys', 'nbBurger'));
    }

    public function submit(Request $request)
    {
        $order = new Order();
        $order->customer = $request->input('customer');
        $order->drink = $request->input('drink');
        $order->fries = $request->input('fries');
        $order->crispy = $request->input('crispy');
        $order->burger_id = $request->input('burger');
        $order->save();
        return redirect(route('order.ok', compact('order')));
    }

    public function ok(Request $request)
    {
        $order = Order::query()->find($request->query('order'));
        return view('order.order_ok', compact('order'));
    }

    public function paid(Request $request) {
        $order = Order::query()->find($request->query('id'));
        $order->paid = ($order->paid == 1) ? 0 : 1;
        $order->save();
        return redirect(route('order.show'));
    }
}
