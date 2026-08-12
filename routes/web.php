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
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $menus = Menu::where('status', 1)->get();

    return view('home', compact('menus'));

})->name('home');

Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])
    ->name('login.process');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| CUSTOMER
|--------------------------------------------------------------------------
*/

Route::post('/reservation', [ReservationController::class, 'store'])
    ->name('reservation.store');

Route::post('/subscribe', [SubscribeController::class, 'store'])
    ->name('subscribe.store');

Route::get('/admin/customers',
    [CustomerController::class, 'index'])
    ->name('customers.index');

Route::get('/admin/customers/detail', 
    [CustomerController::class, 'detail'])
    ->name('customers.detail');

// Hapus SEMUA riwayat berdasarkan Nomor HP
Route::delete('/admin/customers/delete/{phone}', 
    [CustomerController::class, 'destroy'])
    ->name('customers.destroy');

// Hapus SATU transaksi saja berdasarkan ID Order History
Route::delete('/admin/customers/delete-item/{id}', 
    [CustomerController::class, 'destroyItem'])
    ->name('customers.destroyItem');

/*
|--------------------------------------------------------------------------
| MENU ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

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

Route::post('/admin/customers/update', [App\Http\Controllers\CustomerController::class, 'updateCustomer'])->name('admin.customers.update');

/*
|--------------------------------------------------------------------------
| RESERVATIONS
|--------------------------------------------------------------------------
*/

Route::get('/admin/reservations',
    [ReservationController::class, 'index'])
    ->name('reservations.index');

Route::get('/admin/reservations/{reservation}',
    [ReservationController::class, 'show'])
    ->name('reservations.show');

Route::patch('/admin/reservations/{reservation}/status',
    [ReservationController::class, 'updateStatus'])
    ->name('reservations.status');

Route::delete('/admin/reservations/{reservation}',
    [ReservationController::class, 'destroy'])
    ->name('reservations.destroy');

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

Route::get('/admin/orders/{order}/modal', 
    [OrdersController::class, 'modal'])
    ->name('orders.modal');

/*
|--------------------------------------------------------------------------
| CUSTOMERS
|--------------------------------------------------------------------------
*/

Route::get('/admin/customers',
    [CustomerController::class, 'index'])
    ->name('customers.index');


});

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


//KAMPRET
