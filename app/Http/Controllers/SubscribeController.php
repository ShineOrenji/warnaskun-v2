<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
    $request->validate([
            'email_address' => 'required|email|unique:subscribes,email_address'
        ], [
            'email_address.required' => 'Email tidak boleh kosong!',
            'email_address.unique' => 'Email ini sudah berlangganan sebelumnya.'
        ]);

        Subscribe::create([
            'email_address' => $request->email_address,
        ]);

        return back()->with('success', 'Berlangganan berhasil!');
    }
}