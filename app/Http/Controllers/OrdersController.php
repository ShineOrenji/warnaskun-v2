<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use App\Models\OrderHistory;
use App\Models\UserNotification;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    // ===============================================
    // 1. HALAMAN DAPUR (MAMAH OPIK)
    // ===============================================
    public function index()
    {
        $menus = Menu::all(); 
        
        // Mamamu cuma lihat yang belum jadi (Menunggu & Diproses)
        $orders = Order::with('items')
                ->whereIn('status', ['Menunggu', 'Diproses'])
                ->latest()
                ->get();

        return view('admin.orders', compact('orders', 'menus')); 
    }

    // ===============================================
    // 2. HALAMAN ANTREAN KURIR (KASIR / KURIR)
    // ===============================================
    public function readyOrders()
    {
        // Kurir cuma lihat yang udah dibungkus (Siap)
        $orders = Order::with('items')
                ->where('status', 'Siap')
                ->latest()
                ->get();

        return view('admin.ready-orders', compact('orders'));
    }

    // ===============================================
    // 3. LIHAT DETAIL ORDER (HALAMAN PENUH)
    // ===============================================
    public function show(Order $order)
    {
        $order->load('items');
        return view('admin.order-detail', compact('order'));
    }

    // ===============================================
    // 4. MUNCULIN DATA MODAL (YANG TADI ERROR)
    // ===============================================
    public function modal(Order $order)
    {
        $order->load('items');
        return view('admin.order-modal-content', compact('order'));
    }

    // ===============================================
    // 5. UPDATE STATUS (3 FASE)
    // ===============================================
    public function updateStatus(Order $order)
    {
        // FASE 1: DARI MENUNGGU -> DIPROSES (Mulai Dimasak di Dapur)
        if ($order->status == 'Menunggu') {
            
            $order->status = 'Diproses';
            $order->save();

            if ($order->user_id) {
                UserNotification::create([
                    'user_id' => $order->user_id,
                    'title'   => 'Pesanan Diproses 🍳',
                    'message' => "Hore! Pesanan lezatmu sedang disiapkan oleh Ibu Opik."
                ]);
            }
            
        } 
        // FASE 2: DARI DIPROSES -> SIAP (Keluar dari Dapur, Masuk ke Antrean Kurir)
        elseif ($order->status == 'Diproses') {
            
            $order->status = 'Siap'; 
            $order->save();

            if ($order->user_id) {
                $pesan_selesai = $order->delivery_type == 'antar' 
                    ? "Pesanan kamu sudah jadi dan sedang dalam perjalanan diantar kurir! 🛵 Siapkan pembayaran ya jika pakai Cash." 
                    : "Pesanan kamu sudah siap! Silakan datang dan ambil di Warung Ibu Opik ya. 🏪";

                UserNotification::create([
                    'user_id' => $order->user_id,
                    'title'   => 'Pesanan Siap! 🎉',
                    'message' => $pesan_selesai
                ]);
            }

        }
        // FASE 3: DARI SIAP -> SELESAI (Uang Diterima -> Tutup Buku ke Histori)
        elseif ($order->status == 'Siap') {

            $order->load('items');
            $itemsDetail = [];
            foreach ($order->items as $item) {
                $itemsDetail[] = $item->toArray();
            }

            // Memasukkan data ke riwayat (Histori/Pelanggan)
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

            // Set final status
            $order->status = 'Selesai';
            $order->payment_status = 'paid';
            $order->save();

            if ($order->user_id) {
                UserNotification::create([
                    'user_id' => $order->user_id,
                    'title'   => 'Transaksi Selesai ✅',
                    'message' => "Terima kasih sudah memesan di Warung Nasi Kuning Ibu Opik. Selamat menikmati!"
                ]);
            }
        }

        // Cek jika request dari AJAX/Modal, berikan respon JSON
        if (request()->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Status berhasil diperbarui!']);
        }

        return back()->with('success', 'Status pesanan berhasil diperbarui.');
    }

    // ===============================================
    // 6. HAPUS ORDER
    // ===============================================
    public function destroy(Order $order)
    {
        $order->items()->delete();
        $order->delete();

        // Pakai back() supaya kembali ke halaman terakhir (entah itu dari Dapur atau Kurir)
        return back()->with('success', 'Pesanan batal berhasil dihapus dari sistem.');
    }
}