<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // 1. Halaman Index Admin Reservasi
    public function index()
    {
        $reservations = Reservation::latest()->get();
        $totalMenus = Menu::count();
        $pendingOrders = Order::where('status', '!=', 'Selesai')->count();
        $totalCustomers = Order::distinct('phone')->count('phone');

        return view('admin.reservations', compact('reservations', 'totalMenus', 'pendingOrders', 'totalCustomers'));
    }

    // 2. Simpan Reservasi dari Halaman Depan (User)
    public function store(Request $request)
    {
        Reservation::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'person' => $request->person,
            'reservation_date' => $request->reservation_date,
            'reservation_time' => $request->reservation_time,
            'message' => $request->message,
            'status' => 'Menunggu', // Default status awal
        ]);

        return back()->with('success', 'Reservasi berhasil dikirim!');
    }

    // 3. Lihat Detail Reservasi (Modal / Halaman Detail)
    public function show(Reservation $reservation)
    {
        return view('admin.reservation-detail', compact('reservation'));
    }

    // 4. Update Status (Menunggu -> Diterima -> Selesai)
    public function updateStatus(Reservation $reservation)
    {
        if ($reservation->status == 'Menunggu') {
            $reservation->update([
                'status' => 'Diterima'
            ]);
        } elseif ($reservation->status == 'Diterima') {
            $reservation->update([
                'status' => 'Selesai'
            ]);
        }

        return back()->with('success', 'Status reservasi berhasil diperbarui.');
    }

    // 5. Hapus Reservasi
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()
            ->route('reservations.index')
            ->with('success', 'Reservasi berhasil dihapus.');
    }
}