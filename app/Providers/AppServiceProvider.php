<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;

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

            $view->with('cartCount', count($cart));

        });
    }
}
