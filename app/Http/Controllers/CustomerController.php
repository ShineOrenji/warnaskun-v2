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
        // 1. Ambil filter bulan dari URL (default bulan & tahun saat ini)
        $selectedMonth = $request->input('month', date('m'));
        $selectedYear = $request->input('year', date('Y'));

        // 2. Kueri UTAMA: Hitung total pesanan SEUMUR HIDUP berdasarkan Nomor HP saja!
        $query = OrderHistory::select(
                DB::raw('MAX(customer_name) as customer_name'), // Biar gak error, ambil nama terakhir
                'phone',
                DB::raw('COUNT(*) as total_orders'),       // Ini bakal nambah terus walau beda bulan
                DB::raw('SUM(total) as total_spent'),      
                DB::raw('MAX(order_created_at) as last_order')
            )
            ->groupBy('phone') // <-- KUNCINYA DI SINI: Cuma patokan dari Nomor HP
            ->orderByDesc('last_order');

        // 3. Logika Filter Bulan yang Benar
        if ($selectedMonth != 'all') {
            // Cari tahu: Nomor HP siapa saja yang jajan di bulan yang dipilih?
            $phonesInMonth = OrderHistory::whereMonth('order_created_at', $selectedMonth)
                                         ->whereYear('order_created_at', $selectedYear)
                                         ->pluck('phone');

            // Saring tabel utama biar cuma nampilin pelanggan yang jajan di bulan itu
            $query->whereIn('phone', $phonesInMonth);
        }

        $customers = $query->get();

        // 4. Hitung total untuk Sidebar & Tampilan Atas
        $totalCustomers = $customers->count();
        $totalMenus = Menu::count();
        $pendingOrders = Order::where('status', '!=', 'Selesai')->count();

        // 5. Kirim data ke tampilan
        return view('admin.customers', compact(
            'customers',
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