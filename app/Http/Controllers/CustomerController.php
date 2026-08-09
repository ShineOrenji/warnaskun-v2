<?php

namespace App\Http\Controllers;

use App\Models\OrderHistory;
use App\Models\Order; // Untuk hitung sidebar
use App\Models\Menu;  // Untuk hitung sidebar
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $selectedMonth = $request->input('month', date('m'));
        $selectedYear = $request->input('year', date('Y'));

        $query = OrderHistory::select(
                DB::raw('MAX(customer_name) as customer_name'),
                'phone',
                DB::raw('COUNT(*) as total_orders'),
                DB::raw('SUM(total) as total_spent'),
                DB::raw('MAX(order_created_at) as last_order')
            )
            ->groupBy('phone')
            ->orderByDesc('last_order');

        if ($selectedMonth != 'all') {
            $phonesInMonth = OrderHistory::whereMonth('order_created_at', $selectedMonth)
                                         ->whereYear('order_created_at', $selectedYear)
                                         ->pluck('phone');
            $query->whereIn('phone', $phonesInMonth);
            
            $revenuePeriode = OrderHistory::whereMonth('order_created_at', $selectedMonth)
                                          ->whereYear('order_created_at', $selectedYear)
                                          ->sum('total');
        } else {
            $revenuePeriode = OrderHistory::sum('total');
        }

        $customers = $query->get();

        $totalCustomersCount = $customers->count();
        $totalOrdersPeriode = $customers->sum('total_orders'); // Total pesanan sesuai filter
        $revenueAllTime = OrderHistory::sum('total');
        $totalCustomers = OrderHistory::distinct('phone')->count('phone'); 
        $totalMenus = Menu::count();
        $pendingOrders = Order::where('status', '!=', 'Selesai')->count();

        // JIKA DIREQUEST LEWAT AJAX (Tanpa Reload)
        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.partials.customer-table', compact('customers'))->render(),
                'activeCustomers' => $totalCustomersCount,
                'totalOrders' => $totalOrdersPeriode,
                'revenuePeriode' => 'Rp ' . number_format($revenuePeriode, 0, ',', '.'),
                'revenueAllTime' => 'Rp ' . number_format($revenueAllTime, 0, ',', '.'),
            ]);
        }

        return view('admin.customers', compact(
            'customers',
            'totalCustomersCount',
            'totalOrdersPeriode',
            'revenuePeriode',
            'revenueAllTime',
            'totalCustomers',
            'selectedMonth',
            'selectedYear',
            'totalMenus',
            'pendingOrders'
        ));
    }

    public function detail(Request $request)
    {
        $phone = $request->query('phone');
        
        // Ambil semua riwayat pesanan milik nomor HP ini
        $histories = OrderHistory::where('phone', $phone)
                        ->orderByDesc('order_created_at')
                        ->get();

        return response()->json($histories);
    }

    // Fungsi 1: Hapus SEMUA riwayat pelanggan berdasarkan Nomor HP
    public function destroy($phone)
    {
        OrderHistory::where('phone', $phone)->delete();

        return back()->with('success', 'Semua riwayat pelanggan atas nomor tersebut berhasil dihapus!');
    }

    // Fungsi 2: Hapus SATU transaksi saja berdasarkan ID
    public function destroyItem($id)
    {
        OrderHistory::where('id', $id)->delete();

        return back()->with('success', '1 transaksi pesanan berhasil dihapus dari riwayat!');
    }

    public function updateCustomer(Request $request)
    {
        // 1. Validasi data yang diinput
        $request->validate([
            'old_phone' => 'required',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        // 2. Update SEMUA riwayat pesanan yang menggunakan nomor HP lama ini
        // Kita ubah namanya dan nomornya menjadi yang baru
        OrderHistory::where('phone', $request->old_phone)
            ->update([
                'customer_name' => $request->name,
                'phone' => $request->phone
            ]);

        // 3. Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data pelanggan berhasil diperbarui!');
    }
}