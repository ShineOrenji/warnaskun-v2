<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $request)
{
    Reservation::create([
        'name' => $request->name,
        'phone' => $request->phone,
        'person' => $request->person,
        'reservation_date' => $request->reservation_date,
        'reservation_time' => $request->reservation_time,
        'message' => $request->message,
    ]);

    return back()->with('success', 'Reservasi berhasil!');
}

    public function show(Reservation $reservation)
    {
        return view('admin.reservation-detail', compact('reservation'));
    }

    public function updateStatus(Reservation $reservation)
    {
        if ($reservation->status == 'pending') {

            $reservation->status = 'confirmed';

        } elseif ($reservation->status == 'confirmed') {

            $reservation->status = 'completed';

        }

        $reservation->save();

        return back()->with('success', 'Status reservasi berhasil diperbarui.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()
            ->route('reservations.index')
            ->with('success', 'Reservasi berhasil dihapus.');
    }
}