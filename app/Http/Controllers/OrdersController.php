<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;

class OrdersController extends Controller
{
    public function index()
    {
        
        $menus = Menu::all();
        $orders = Order::with('items')
                ->latest()
                ->get();

        return view('admin.orders', compact('orders', 'menus'));
    }

    public function show(Order $order)
    {
        $order->load('items');

        return view('admin.order-detail', compact('order'));
    }

    public function modal(Order $order)
    {
        $order->load('items');

        return view('admin.order-modal', compact('order'));
}

    public function updateStatus(Order $order)
    {
        if ($order->status == 'Menunggu') {

            $order->status = 'Diproses';

        } elseif ($order->status == 'Diproses') {

            $order->status = 'Selesai';

        }

        $order->save();

        return back()->with('success', 'Status pesanan berhasil diperbarui.');
    }

    public function destroy(Order $order)
    {
        $order->items()->delete();

        $order->delete();

        return redirect()
            ->route('orders.index')
            ->with('success', 'Pesanan berhasil dihapus.');
    }
}