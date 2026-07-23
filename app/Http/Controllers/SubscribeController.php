<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        Subscribe::create([
            'email_address' => $request->email_address,
        ]);

        return back()->with('success', 'Berlangganan berhasil!');
    }
}