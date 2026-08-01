<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;
use App\Models\Order;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {

            $cart = session()->get('cart', []);

            foreach ($cart as $id => $item) {
                if (!Menu::find($id)) {
                    unset($cart[$id]);
                }
            }

            session()->put('cart', $cart);

            $totalMenus = Menu::count();

            $pendingOrders = Order::whereIn('status', [
                'Menunggu',
                'Diproses'
            ])->count();

            $totalCustomers = Order::where('status', 'Selesai')
                ->select('phone')
                ->distinct()
                ->count();

            $view->with([
            'cartCount' => collect($cart)->sum('qty'),
            'totalMenus'     => $totalMenus,
            'pendingOrders'  => $pendingOrders,
            'totalCustomers' => $totalCustomers,
        ]);

        });
    }
}
