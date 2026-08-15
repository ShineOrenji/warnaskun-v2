<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use App\Models\OrderHistory;
use App\Models\UserNotification;

class OrdersController extends Controller
{
    public function index()
    {
        
        $menus = Menu::all(); //
        
        // Hanya ambil pesanan yang statusnya BUKAN 'Selesai'
        $orders = Order::with('items')
                ->where('status', '!=', 'Selesai')
                ->latest()
                ->get();

        return view('admin.orders', compact('orders', 'menus')); //[cite: 3]
    }

    public function show(Order $order)
    {
        $order->load('items');

        return view('admin.order-detail', compact('order'));
    }

    public function modal(Order $order)
    {
        $order->load('items');

        // Kita kirim data order ke tampilan modal khusus (atau langsung render HTML-nya di sini)
        return view('admin.order-modal-content', compact('order'));
    }

    public function updateStatus(Order $order)
    {
        if ($order->status == 'Menunggu') {
            
            $order->status = 'Diproses';
            $order->save();

            // KIRIM NOTIF PESANAN DIPROSES KE PELANGGAN
            if ($order->user_id) {
                UserNotification::create([
                    'user_id' => $order->user_id,
                    'title'   => 'Pesanan Diproses 🍳',
                    'message' => "Hore! Pesanan #" . $order->id . " kamu sedang disiapkan oleh Ibu Opik."
                ]);
            }
            
        } elseif ($order->status == 'Diproses') {

            $order->load('items');
            $itemsDetail = [];
            foreach ($order->items as $item) {
                $itemsDetail[] = $item->toArray();
            }

            OrderHistory::create([
                'customer_name' => $order->customer_name,
                'phone' => $order->phone,
                'delivery_type' => $order->delivery_type,
                'address' => $order->address,      
                'landmark' => $order->landmark,    
                'note' => $order->note,            
                'total' => $order->total,
                'items_detail' => $itemsDetail,
                'order_created_at' => $order->created_at,
            ]);

            $order->status = 'Selesai';
            $order->payment_status = 'paid';
            $order->save();

            // KIRIM NOTIF PESANAN SELESAI / SIAP ANTAR KE PELANGGAN
            if ($order->user_id) {
                $pesan_selesai = $order->delivery_type == 'antar' 
                    ? "Pesanan #" . $order->id . " sudah jadi dan siap diantar ke tempatmu! 🛵" 
                    : "Pesanan #" . $order->id . " sudah siap! Silakan datang dan ambil di Warung Ibu Opik ya. 🏪";

                UserNotification::create([
                    'user_id' => $order->user_id,
                    'title'   => 'Pesanan Selesai! 🎉',
                    'message' => $pesan_selesai
                ]);
            }
        }

        // Cek jika request dari AJAX/Modal, berikan respon JSON
        if (request()->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Status berhasil diperbarui!']);
        }

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