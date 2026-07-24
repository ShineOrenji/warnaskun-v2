<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\MenuController;

Route::get('/', function () {
    return view('home');
});

Route::post('/reservation', [ReservationController::class, 'store'])
    ->name('reservation.store');

Route::post('/subscribe', [SubscribeController::class, 'store'])
    ->name('subscribe.store');
    
Route::post('/menu', [MenuController::class, 'store'])
    ->name('menu.store');

Route::put('/menu/{menu}', [MenuController::class, 'update'])
    ->name('menu.update');

Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])
    ->name('menu.destroy');

Route::patch('/menu/{menu}/toggle-status', [MenuController::class, 'toggleStatus'])
    ->name('menu.toggleStatus');

// <- TESTER TAMBAH MENU ->

Route::get('/menu-test', function () {
    return view('menu-test');
});

Route::get('/admin/menu', [MenuController::class, 'index'])
    ->name('menu.index');