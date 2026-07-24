<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();

        return view('admin.menu', compact('menus'));
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
        $imageName = null;

        if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('uploads/menu'), $imageName);
    }

        Menu::create([
        'name' => $request->name,
        'category' => $request->category,
        'description' => $request->description,
        'price' => $request->price,
        'image' => $imageName,
        'status' => $request->status,
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
    'name' => $request->name,
    'category' => $request->category,
    'description' => $request->description,
    'price' => $request->price,
    'image' => $imageName,
    'status' => $request->status,
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

    public function toggleStatus(Menu $menu)
    {
        $menu->status = !$menu->status;

        $menu->save();

        return back()->with('success', 'Status menu berhasil diubah.');
    }
}

