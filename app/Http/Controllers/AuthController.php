<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Fungsi untuk Daftar Akun
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'customer', // Otomatis jadi customer
        ]);

        // Langsung otomatis login setelah daftar
        Auth::login($user);

        return redirect()->back()->with('success', 'Registrasi berhasil! Selamat datang, ' . $user->name);
    }

    // Fungsi untuk Login
    public function login(Request $request)
    {
        $request->validate([
            'login_id' => 'required', // Kita ganti namanya dari email jadi login_id (bisa email/hp)
            'password' => 'required'
        ]);

        $login_type = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $credentials = [
            $login_type => $request->login_id,
            'password'  => $request->password
        ];

        // Parameter 'true' di bawah ini adalah "Remember Me" (Biar nggak perlu login terus tiap hari)
        if (auth()->attempt($credentials, true)) {
            
            // Cek apakah yang login ini Admin? Kalau iya, TENDANG!
            if (auth()->user()->role == 'admin') {
                auth()->logout();
                return back()->withErrors(['Maaf, Admin tidak boleh login lewat jalur pelanggan! wkwk'])->withInput();
            }

            return back()->with('success', 'Berhasil login!');
        }

        return back()->withErrors(['Email/No HP atau password salah!'])->withInput();
    }

    // Fungsi untuk Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success', 'Berhasil logout.');
    }
}