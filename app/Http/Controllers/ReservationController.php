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
}