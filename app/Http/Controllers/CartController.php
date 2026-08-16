<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{
    public function add(Menu $menu)
    {
        $cart = session()->get('cart', []);

        if ($menu->stock <= 0) {
            return back()->with('error', 'Maaf, stok menu ini sudah habis.');
        }

        if (isset($cart[$menu->id])) {

            if ($cart[$menu->id]['qty'] >= $menu->stock) {
                return back()->with(
                    'error',
                    "Stok {$menu->name} hanya tersedia {$menu->stock}."
                );
            }

            $cart[$menu->id]['qty']++;

        } else {

            $cart[$menu->id] = [
                'id'  => $menu->id,
                'name'  => $menu->name,
                'price' => $menu->price,
                'image' => $menu->image,
                'qty'   => 1,
            ];

        }

        session()->put('cart', $cart);

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'cartCount' => collect($cart)->sum('qty'),
                'message' => 'Menu berhasil ditambahkan ke keranjang!'
            ]);
        }

        return back()->with('success', 'Menu berhasil ditambahkan ke keranjang!');
    }

    public function index()
    {
        if (!auth()->check()) {
            // Arahkan ke beranda ('/') sambil ngirim pesan error biar modal loginnya pop-up otomatis!
            return redirect('/')->withErrors(['Silakan login terlebih dahulu untuk melihat pesanan.']);
        }
        
        $cart = session()->get('cart', []);
        return view('checkout', compact('cart'));
    }

    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'cart' => $cart
            ]);
        }

        return back()->with('success', 'Menu dihapus.');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $qty = (int) $request->qty;

            if ($qty < 1) {
                $qty = 1;
            }

            if ($qty > 999) {
                $qty = 999;
            }

            $cart[$id]['qty'] = $qty;

            session()->put('cart', $cart);
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'cartCount' => count($cart),
                'message' => 'Quantity berhasil diperbarui!'
            ]);
        }

        return back();
    }

    public function increase(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        }

        session()->put('cart', $cart);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'cart' => $cart
            ]);
        }

        return back();
    }

    public function decrease(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            if ($cart[$id]['qty'] > 1) {
                $cart[$id]['qty']--;
            } else {
                unset($cart[$id]);
            }

        }

        session()->put('cart', $cart);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'cart' => $cart
            ]);
        }

        return back();
    }

    public function checkout(Request $request)
    {
        if (!auth()->check()) {
            return redirect('/')->withErrors(['Kamu harus login dulu sebelum membuat pesanan!']);
        }

        $cart = session()->get('cart', []);

        $request->validate([
            'customer_name' => 'required',
            'phone' => 'required',
            'delivery_type' => 'required',
            'address' => 'required_if:delivery_type,antar',
            'payment_method' => 'required'
        ]);

        if (empty($cart)) {
            return back()->with('error', 'Keranjang masih kosong.');
        }

        $total = 0;
        foreach ($cart as $id => $item) {
            $menu = Menu::find($id);
            if (!$menu) return back()->with('error', 'Menu tidak ditemukan.');
            if ($menu->stock < $item['qty']) {
                return back()->with('error', "Stok {$menu->name} tidak mencukupi.");
            }
            $total += $item['price'] * $item['qty'];
        }

        // 2. SIMPAN PESANAN
        $order = Order::create([
            'user_id'       => auth()->id(),
            'customer_name' => $request->customer_name,
            'phone'         => $request->phone,
            'delivery_type' => $request->delivery_type,
            'address'       => $request->address,
            'landmark'      => $request->landmark,
            'note'          => $request->note,
            'payment_method'=> $request->payment_method,
            'payment_status'=> 'pending',
            'total'         => $total,
            'status'        => 'Menunggu',
        ]);

        // 3. PANGGIL MIDTRANS HANYA JIKA PILIH QRIS
        if ($request->payment_method == 'qris') {
            \Midtrans\Config::$serverKey = config('services.midtrans.server_key') ?: env('MIDTRANS_SERVER_KEY');
            \Midtrans\Config::$isProduction = false; 
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $params = [
                'transaction_details' => [
                    'order_id' => 'OPIK-' . $order->id . '-' . time(),
                    'gross_amount' => (int) $total,
                ],
                'customer_details' => [
                    'first_name' => $request->customer_name,
                    'phone' => $request->phone,
                ],
                'enabled_payments' => ['gopay', 'other_qris'],
                'expiry' => [
                    'start_time' => date("Y-m-d H:i:s O", time()),
                    'unit' => 'minutes',
                    'duration' => 10
                ]
            ];

            try {
                $snapToken = \Midtrans\Snap::getSnapToken($params);
                session(['snap_token' => $snapToken]);
            } catch (\Exception $e) {
                $order->delete();
                return back()->with('error', 'Gagal terhubung ke Midtrans: ' . $e->getMessage());
            }
        }

        // 4. SIMPAN ITEM MENU
        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $id,
                'menu_name' => $item['name'],
                'price' => $item['price'],
                'qty' => $item['qty'],
                'subtotal' => $item['price'] * $item['qty']
            ]);

            $menu = Menu::find($id);
            if ($menu) $menu->decrement('stock', $item['qty']);
        }

        session()->forget('cart');

        return redirect()->route('cart.success', ['order' => $order->id]);
    }

    public function success(Order $order)
    {
        return view('checkout-success', compact('order'));
    }

    public function paymentSuccess(Order $order)
    {
        $order->update([
            'payment_status' => 'paid',
            'status' => 'Menunggu' //
        ]);
        
        return response()->json(['success' => true]);
    }

    public function paymentFinish(Request $request)
    {
        // Midtrans akan mengembalikan URL seperti: 
        // /payment-finish?order_id=OPIK-37-123456&transaction_status=settlement
        $order_id_midtrans = $request->order_id;
        $status = $request->transaction_status;

        // Cek apakah ada order ID dan statusnya settlement (lunas) atau capture
        if ($order_id_midtrans && ($status == 'settlement' || $status == 'capture')) {
            
            // Ekstrak ID asli dari format "OPIK-37-123456" (kita ambil angka 37 nya saja)
            $parts = explode('-', $order_id_midtrans);
            
            if (isset($parts[1])) {
                $id_asli = $parts[1];
                $order = Order::find($id_asli);
                
                if ($order && $order->payment_status != 'paid') {
                    $order->update([
                        'payment_status' => 'paid',
                        'status' => 'Menunggu'
                    ]);
                }
            }
        }

        // Arahkan kembali ke halaman Riwayat Pesanan pelanggan
        // Arahkan kembali ke halaman Success (bukan ke riwayat)
        return redirect()->route('cart.success', ['order' => $id_asli])->with('success', 'Pembayaran Berhasil!');
    }
}