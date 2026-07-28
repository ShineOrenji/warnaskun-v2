<?php

use Illuminate\Support\Facades\Route;

use App\Models\Menu;

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservationAdminController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $menus = Menu::where('status', 1)->get();

    return view('home', compact('menus'));

})->name('home');

/*
|--------------------------------------------------------------------------
| CUSTOMER
|--------------------------------------------------------------------------
*/

Route::post('/reservation', [ReservationController::class, 'store'])
    ->name('reservation.store');

Route::post('/subscribe', [SubscribeController::class, 'store'])
    ->name('subscribe.store');

/*
|--------------------------------------------------------------------------
| MENU ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/menu', [MenuController::class, 'index'])
    ->name('menu.index');

Route::post('/menu', [MenuController::class, 'store'])
    ->name('menu.store');

Route::put('/menu/{menu}', [MenuController::class, 'update'])
    ->name('menu.update');

Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])
    ->name('menu.destroy');

Route::patch('/menu/{menu}/toggle-status',
    [MenuController::class, 'toggleStatus'])
    ->name('menu.toggleStatus');

/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/

Route::post('/cart/add/{menu}',
    [CartController::class, 'add'])
    ->name('cart.add');

Route::get('/cart',
    [CartController::class, 'index'])
    ->name('cart.index');

Route::patch('/cart/increase/{id}',
    [CartController::class, 'increase'])
    ->name('cart.increase');

Route::patch('/cart/decrease/{id}',
    [CartController::class, 'decrease'])
    ->name('cart.decrease');

Route::post('/cart/update/{id}',
    [CartController::class, 'update'])
    ->name('cart.update');

Route::delete('/cart/remove/{id}',
    [CartController::class, 'remove'])
    ->name('cart.remove');

/*
|--------------------------------------------------------------------------
| CHECKOUT
|--------------------------------------------------------------------------
*/

Route::get('/checkout',
    [CartController::class, 'index'])
    ->name('checkout');

Route::post('/checkout',
    [CartController::class, 'checkout'])
    ->name('cart.checkout');

Route::get('/checkout/success/{order}',
    [CartController::class, 'success'])
    ->name('cart.success');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard',
    [DashboardController::class, 'index'])
    ->name('dashboard.index');

Route::get(
    '/admin/orders/{order}/modal',
    [OrdersController::class, 'modal']
)->name('orders.modal');

/*
|--------------------------------------------------------------------------
| ORDERS
|--------------------------------------------------------------------------
*/

Route::get('/admin/orders',
    [OrdersController::class, 'index'])
    ->name('orders.index');

Route::get('/admin/orders/{order}',
    [OrdersController::class, 'show'])
    ->name('orders.show');

Route::patch('/admin/orders/{order}/status',
    [OrdersController::class, 'updateStatus'])
    ->name('orders.status');

Route::delete('/admin/orders/{order}',
    [OrdersController::class, 'destroy'])
    ->name('orders.destroy');

/*
|--------------------------------------------------------------------------
| CUSTOMERS
|--------------------------------------------------------------------------
*/

Route::get('/admin/customers',
    [CustomerController::class, 'index'])
    ->name('customers.index');

/*
|--------------------------------------------------------------------------
| RESERVATIONS
|--------------------------------------------------------------------------
*/

Route::get('/admin/reservations',
    [ReservationAdminController::class, 'index'])
    ->name('reservations.index');

Route::get('/admin/reservations/{reservation}',
    [ReservationAdminController::class, 'show'])
    ->name('reservations.show');

Route::patch('/admin/reservations/{reservation}/status',
    [ReservationAdminController::class, 'updateStatus'])
    ->name('reservations.status');

Route::delete('/admin/reservations/{reservation}',
    [ReservationAdminController::class, 'destroy'])
    ->name('reservations.destroy');

//KAMPRET