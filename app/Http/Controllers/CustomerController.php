<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Order::select(
                'customer_name',
                'phone',
                DB::raw('COUNT(*) as total_orders'),
                DB::raw('SUM(total) as total_spent'),
                DB::raw('MAX(created_at) as last_order')
            )
            ->groupBy('customer_name', 'phone')
            ->orderByDesc('last_order')
            ->get();

        $orderCount = Order::count();

        return view('admin.customers', compact(
            'customers',
            'orderCount'
        ));
    }
}