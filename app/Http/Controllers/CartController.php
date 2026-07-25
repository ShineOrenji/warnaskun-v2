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

        if (isset($cart[$menu->id])) {
            $cart[$menu->id]['qty']++;
        } else {
            $cart[$menu->id] = [
                'id' => $menu->id,
                'name' => $menu->name,
                'price' => $menu->price,
                'image' => $menu->image,
                'qty' => 1,
            ];
        }

        session()->put('cart', $cart);

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

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Menu dihapus dari keranjang.');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['qty'] = $request->qty;
            session()->put('cart', $cart);
        }

        return back();
    }

    public function increase($id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['qty']++;
    }

    session()->put('cart', $cart);

    return back();
}

    public function decrease($id)
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

        return back();
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return back()->with('error', 'Keranjang masih kosong.');
        }

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'note' => $request->note,
            'total' => $total,
            'status' => 'Menunggu'
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

        }

        session()->forget('cart');

        return redirect('/')
                ->with('success', 'Pesanan berhasil dibuat!');
    }
}