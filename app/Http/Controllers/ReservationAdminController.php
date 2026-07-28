<?php

namespace App\Http\Controllers;

use App\Models\Reservation;

class ReservationAdminController extends Controller
{
    public function index()
    {
        $reservations = Reservation::latest()->get();

        return view('admin.reservations', compact('reservations'));
    }

    public function show(Reservation $reservation)
    {
        return view('admin.reservation-detail', compact('reservation'));
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()
            ->route('reservations.index')
            ->with('success', 'Reservasi berhasil dihapus.');
    }
}