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
        $cart = session()->get('cart', []);

        foreach ($cart as $id => $item) {

            if (!Menu::find($id)) {
                unset($cart[$id]);
            }

        }

        session()->put('cart', $cart);

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
        $cart = session()->get('cart', []);

        $request->validate([
        'customer_name' => 'required',
        'phone' => 'required',
        'delivery_type' => 'required',
        'address' => 'required_if:delivery_type,antar',
    ]);

        if (empty($cart)) {
            return back()->with('error', 'Keranjang masih kosong.');
        }

        $total = 0;

        foreach ($cart as $id => $item) {

            $menu = Menu::find($id);

            if (!$menu) {

                return back()->with('error', 'Menu tidak ditemukan.');

            }

            if ($menu->stock < $item['qty']) {

                return back()->with(
                    'error',
                    "Stok {$menu->name} tidak mencukupi. Sisa stok: {$menu->stock}"
                );

            }

        }

        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        $order = Order::create([
        'customer_name' => $request->customer_name,
        'phone'         => $request->phone,
        'delivery_type' => $request->delivery_type,
        'address'       => $request->address,
        'landmark'      => $request->landmark,
        'note'          => $request->note,
        'total'         => $total,
        'status'        => 'Menunggu',
    ]);

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

                if ($menu) {

                    $menu->decrement('stock', $item['qty']);

                }

        }

        session()->forget('cart');

        return redirect()->route('cart.success', [
            'order' => $order->id
        ]);
    }

    public function success(Order $order)
    {
        return view('checkout-success', compact('order'));
    }
}