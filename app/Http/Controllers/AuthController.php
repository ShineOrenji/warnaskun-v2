<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // ==========================================
    // FUNGSI LOGIN PELANGGAN
    // ==========================================
    public function login(Request $request)
{
    $request->validate([
        'login_id' => 'required',
        'password' => 'required'
    ]);

    // Cek apakah yang diketik user itu format email atau bukan
    $login_type = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

    // Coba login pakai email ATAU phone sesuai deteksi di atas
    if (\Illuminate\Support\Facades\Auth::attempt([
        $login_type => $request->login_id, 
        'password'  => $request->password
    ])) {
        return redirect()->intended('/'); // Sukses login
    }

    // Gagal login
    return back()->withErrors(['Email/No HP atau Password salah!']);
}

    // ==========================================
    // FUNGSI REGISTER PELANGGAN
    // ==========================================
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'phone'    => 'required|string|unique:users,phone',
            'email'    => 'nullable|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email, // Email dibiarkan opsional (bisa null)
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'customer' // BERIKAN ROLE CUSTOMER SECARA OTOMATIS
        ]);

        // Langsung login otomatis (pakai fitur Remember Me)
        Auth::login($user, true);

        return back()->with('success', 'Pendaftaran berhasil!');
    }

    // ==========================================
    // FUNGSI LOGOUT PELANGGAN
    // ==========================================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success', 'Berhasil keluar dari akun.');
    }
}