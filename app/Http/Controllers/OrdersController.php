<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::with('items')
                ->latest()
                ->get();

        return view('admin.orders', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('items');

        return view('admin.order-detail', compact('order'));
    }
}