<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\MenuController;
use App\Models\Menu;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;

Route::get('/', function () {

    $menus = Menu::where('status', 1)->get();

    return view('home', compact('menus'));

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

Route::get('/admin/menu', [MenuController::class, 'index'])
    ->name('menu.index');

Route::post('/cart/add/{menu}', [CartController::class, 'add'])
    ->name('cart.add');

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/cart/remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');

Route::post('/cart/update/{id}', [CartController::class, 'update'])
    ->name('cart.update');

Route::get('/checkout', [CartController::class, 'index'])
    ->name('cart.index');

Route::patch('/cart/increase/{id}', [CartController::class, 'increase'])
    ->name('cart.increase');

Route::patch('/cart/decrease/{id}', [CartController::class, 'decrease'])
    ->name('cart.decrease');

Route::post('/checkout', [CartController::class, 'checkout'])
    ->name('cart.checkout');

Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');

// ADMIN - PESANAN Page//

Route::get('/admin/orders', [OrdersController::class, 'index'])
    ->name('orders.index');

Route::get('/admin/orders/{order}', [OrdersController::class, 'show'])
    ->name('orders.show');