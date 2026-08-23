<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Total semua pesanan
        $totalOrders = Order::count();

        // Berdasarkan status
        $waitingOrders = Order::where('status', 'Menunggu')->count();

        $processOrders = Order::where('status', 'Diproses')->count();

        $completedOrders = Order::where('status', 'Selesai')->count();

        // Pendapatan bulan ini (hanya pesanan selesai)
        $monthlyRevenue = Order::where('status', 'Selesai')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total');

        // 5 pesanan terbaru
        $latestOrders = Order::latest()
            ->take(5)
            ->get();

        // 5 menu terlaris
        $bestMenus = OrderItem::select(
                'menu_name',
                DB::raw('SUM(qty) as total_sold')
            )
            ->groupBy('menu_name')
            ->orderByDesc('total_sold')
            ->take(5)
            ->get();

        // Total menu
        $totalMenus = Menu::count();

        // Total pelanggan unik
        $totalCustomers = Order::select('phone')
            ->distinct()
            ->count();

        // Pesanan terbaru (5 data)
        $recentOrders = Order::latest()
            ->take(5)
            ->get();

        // Aktivitas terbaru (sementara kosong)
        $recentActivities = [];
        $chartLabels = [];
        $chartData = [];

        for ($i = 6; $i >= 0; $i--) {

            $date = Carbon::now()->subDays($i);

            $chartLabels[] = $date->format('d M');

            $chartData[] = Order::where('status', 'Selesai')
                ->whereDate('created_at', $date)
                ->sum('total');
        }

        return view('admin.dashboard', compact(
        'totalOrders',
        'waitingOrders',
        'processOrders',
        'completedOrders',
        'monthlyRevenue',
        'latestOrders',
        'bestMenus',
        'totalMenus',
        'totalCustomers',
        'recentOrders',
        'recentActivities',
        'chartLabels',
        'chartData'
    ));
    }

    public function settings()
    {
        $totalMenus = \App\Models\Menu::count();
        $pendingOrders = \App\Models\Order::where('status', 'Menunggu')->count();
        
        return view('admin.settings', compact('totalMenus', 'pendingOrders'));
    }

    public function updateSettings(Request $request)
    {
        $user = auth()->user();
        
        // 1. Update data akun admin
        $user->name = $request->name;
        
        // Cek apakah login_id diisi email atau no hp
        if (filter_var($request->login_id, FILTER_VALIDATE_EMAIL)) {
            $user->email = $request->login_id;
        } else {
            $user->phone = $request->login_id;
        }

        // Jika password diisi, update password baru
        if ($request->filled('password')) {
            $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        }
        
        $user->save();

        // 2. Update Logo Web jika ada yang di-upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            // Pastikan folder public/assets/images ada, lalu Timpa file logo.png
            $file->move(public_path('assets/images'), 'logo.png');
        }

        return back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}