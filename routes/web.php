<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SubscribeController;

Route::get('/', function () {
    return view('home');
});

Route::post('/reservation', [ReservationController::class, 'store'])
    ->name('reservation.store');

Route::post('/subscribe', [SubscribeController::class, 'store'])
    ->name('subscribe.store');
