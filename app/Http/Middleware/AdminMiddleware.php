<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login DAN rolenya adalah 'admin'
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request); // Silakan masuk, Tuan Admin!
        }

        // Kalau pelanggan nyasar, tendang ke beranda!
        return redirect('/')->withErrors(['Akses Ditolak! Ini kawasan rahasia dapur Ibu Opik.']);
    }
}