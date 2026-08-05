<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        $orderCount = Order::count();

        return view('admin.menu', compact('menus', 'orderCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'menu_code' => 'required|unique:menus,menu_code|max:20',
            'name' => 'required|max:255',
            'category' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('uploads/menu'), $imageName);
    }

        Menu::create([
            'menu_code'  => strtoupper($request->menu_code),
            'name'        => $request->name,
            'category'    => $request->category,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'image'       => $imageName,

            // Status otomatis
            'status'      => $request->stock > 0,
        ]);

        return back()->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {

        $request->validate([
        'menu_code' => 'required|max:20|unique:menus,menu_code,' . $menu->id,
        'name' => 'required|max:255',
        'category' => 'required',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
    ]);

        $imageName = $menu->image;

    if ($request->hasFile('image')) {

        // Upload gambar baru
        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('uploads/menu'), $imageName);

        // Hapus gambar lama
        if ($menu->image && file_exists(public_path('uploads/menu/' . $menu->image))) {
            unlink(public_path('uploads/menu/' . $menu->image));
        }
    }

        $menu->update([
        'menu_code'  => strtoupper($request->menu_code),
        'name'        => $request->name,
        'category'    => $request->category,
        'description' => $request->description,
        'price'       => $request->price,
        'stock'       => $request->stock,
        'image'       => $imageName,
        'status'      => $request->stock > 0,
    ]);

    return redirect()->route('menu.index')
        ->with('success', 'Menu berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
         // Hapus gambar
    if ($menu->image && file_exists(public_path('uploads/menu/' . $menu->image))) {
        unlink(public_path('uploads/menu/' . $menu->image));
    }

    // Hapus data
    Menu::destroy($menu->id);

    return redirect()->route('menu.index')
        ->with('success', 'Menu berhasil dihapus!');
    }
}

