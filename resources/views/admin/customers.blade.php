<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pelanggan - Admin Ibu Opik</title>

    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin-style.css') }}">

    <style>
        /* ---------- CSS KHUSUS PRINT (AGAR BERSIH DI KERTAS PUTIH) ---------- */
        @media print {
            /* Sembunyikan semua elemen dashboard yang tidak perlu dicetak */
            body * {
                visibility: hidden;
            }
            
            /* Hanya tampilkan modal detail beserta isinya */
            #detailModal, #detailModal * {
                visibility: visible;
            }

            /* Paksa background jadi putih bersih dan teks jadi hitam */
            body, html {
                background: white !important;
                color: black !important;
                height: auto !important;
                overflow: visible !important;
            }

            #detailModal {
                position: absolute !important;
                left: 0 !important;
                top: 0 !important;
                width: 100% !important;
                background: white !important;
                color: black !important;
                display: block !important;
                z-index: 999999;
            }

            .modal-content {
                background: white !important;
                color: black !important;
                border: none !important;
                box-shadow: none !important;
                width: 100% !important;
                max-width: 100% !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            /* Ubah kotak card transaksi jadi border tipis rapi dengan background putih */
            #detailModal div[style*="background: var(--bg-card)"],
            #detailModal div[style*="background: var(--bg-primary)"] {
                background: #ffffff !important;
                border: 1px solid #ccc !important;
                color: black !important;
            }

            /* Paksa semua teks di dalam modal jadi hitam legam agar tidak bentrok */
            #detailModal h2, 
            #detailModal span, 
            #detailModal strong, 
            #detailModal p, 
            #detailModal li, 
            #detailModal div {
                color: #000000 !important;
            }

            /* Kembalikan warna khusus untuk total harga atau badge biar tetap kontras */
            #detailModal .total-spent, 
            #detailModal div[style*="color: var(--gold)"] {
                color: #b8922f !important; /* Warna emas gelap yang tetap jelas dicetak */
            }

            /* Sembunyikan tombol tutup, tombol cetak itu sendiri, dan tombol tempat sampah */
            .modal-close, 
            button, 
            .fas.fa-trash-alt {
                display: none !important;
            }
        }
    </style>
</head>
<body>

    <!-- ============================================ -->
    <!-- SIDEBAR -->
    <!-- ============================================ -->
    <aside class="sidebar">
        <div class="sidebar-brand">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Warung Ibu Opik">
            </div>
        </div>

        <div class="sidebar-user">
            <img src="https://ui-avatars.com/api/?name=Admin&background=d4a843&color=000&size=40" alt="Admin">
            <div>
                <div class="name">Admin Ibu Opik</div>
                <div class="role">Super Admin</div>
            </div>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-label">Main Menu</div>

            <a href="{{ route('dashboard.index') }}">
                <i class="fas fa-chart-line"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('menu.index') }}">
                <i class="fas fa-utensils"></i>
                <span>Menu</span>
                <span class="badge gold">{{ $totalMenus ?? 0 }}</span>
            </a>

            <a href="{{ route('orders.index') }}">
                <i class="fas fa-shopping-cart"></i>
                <span>Pesanan</span>
                <span class="badge warning">{{ $pendingOrders ?? 0 }}</span>
            </a>

            <a href="{{ route('customers.index') }}" class="active">
                <i class="fas fa-users"></i>
                <span>Pelanggan</span>
            </a>

            <a href="{{ route('reservations.index') }}">
                <i class="fas fa-calendar-check"></i>
                <span>Reservasi</span>
            </a>

            <div class="nav-label" style="margin-top: 24px;">Settings</div>

            <a href="#">
                <i class="fas fa-cog"></i>
                <span>Pengaturan</span>
            </a>

            <button type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="display: flex; align-items: center; gap: 12px; padding: 10px 12px; border-radius: 8px; color: var(--text-secondary, #a0a0a0); text-decoration: none; font-size: 14px; font-family: 'DM Sans', sans-serif; transition: all 0.3s ease; margin-bottom: 2px; cursor: pointer; width: 100%; background: transparent; border: none; text-align: left;">
                <i class="fas fa-sign-out-alt" style="width: 20px; font-size: 16px; text-align: center;"></i>
                <span>Logout</span>
            </button>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
    </aside>

    <!-- SIDEBAR OVERLAY -->
    <div class="sidebar-overlay"></div>

    <!-- ============================================ -->
    <!-- MAIN CONTENT -->
    <!-- ============================================ -->
    <main class="main-content">

        <!-- TOPBAR -->
        <header class="topbar">
            <div class="page-title">
                <button class="hamburger" aria-label="Toggle menu">
                    <i class="fas fa-bars"></i>
                </button>
                <div>
                    <h2>Riwayat & Rekap Pelanggan</h2>
                    <p>Daftar pelanggan yang sudah selesai melakukan pemesanan</p>
                </div>
            </div>
            <div class="actions">
                <div class="search">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Cari pelanggan..." id="customerSearch">
                </div>
                <div class="notif">
                    <i class="fas fa-bell"></i>
                    <span class="dot"></span>
                </div>
                <div class="time">
                    <div id="clock"></div>
                    <div id="date"></div>
                </div>
            </div>
        </header>

        <!-- ============================================ -->
        <!-- CONTENT -->
        <!-- ============================================ -->
        <div class="content">

            <!-- GREETING -->
            <div class="greeting-card">
                <div class="greeting-text">
                    <h2>👥 Riwayat Pelanggan</h2>
                    <p>Kelola dan pantau rekap data pelanggan setia Warung Ibu Opik</p>
                </div>
                <div class="greeting-date">
                    <i class="fas fa-calendar-alt"></i>
                    <span id="currentDate"></span>
                </div>
            </div>

            <!-- ============================================ -->
            <!-- STATS CARDS (DENGAN ID UNTUK AJAX) -->
            <!-- ============================================ -->
            <div class="stats-grid">

                <!-- KARTU 1: Pelanggan Aktif -->
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="label">Pelanggan Aktif</span>
                        <div class="icon blue">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="stat-value" id="statActiveCustomers">{{ $totalCustomersCount ?? 0 }}</div>
                    <div class="stat-change info">
                        <i class="fas fa-user-check"></i>
                        Pada periode terpilih
                    </div>
                </div>

                <!-- KARTU 2: Total Pesanan Selesai (Bukan Jumlah Pelanggan) -->
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="label">Pesanan Selesai</span>
                        <div class="icon blue">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                    </div>
                    <div class="stat-value" id="statTotalOrders">{{ $customers->sum('total_orders') }}</div>
                    <div class="stat-change info">
                        <i class="fas fa-clipboard-check"></i>
                        Total transaksi periode ini
                    </div>
                </div>

                <!-- KARTU 3: Pendapatan Sesuai Bulan -->
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="label" id="revenueLabel">Pemasukan Periode Ini</span>
                        <div class="icon green">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>
                    <div class="stat-value" id="statRevenuePeriode">Rp {{ number_format($revenuePeriode ?? 0, 0, ',', '.') }}</div>
                    <div class="stat-change up">
                        <i class="fas fa-calendar-alt"></i>
                        Total di periode terpilih
                    </div>
                </div>

                <!-- KARTU 4: Grand Total (Sepanjang Masa) -->
                <div class="stat-card" style="border: 1px solid var(--gold); background: rgba(212, 168, 67, 0.05);">
                    <div class="stat-header">
                        <span class="label" style="color: var(--gold); font-weight: 700;">Pendapatan Keseluruhan</span>
                        <div class="icon gold">
                            <i class="fas fa-crown"></i>
                        </div>
                    </div>
                    <!-- TAMBAHKAN ID DISINI -->
                    <div class="stat-value" id="statRevenueAllTime" style="color: var(--gold);">Rp {{ number_format($revenueAllTime ?? 0, 0, ',', '.') }}</div>
                    <div class="stat-change" style="color: var(--gold-dark);">
                        <i class="fas fa-chart-line"></i>
                        Sejak web pertama dibuat
                    </div>
                </div>

            </div>

            <!-- ============================================ -->
            <!-- CUSTOMERS TABLE -->
            <!-- ============================================ -->
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                    <h3>
                        <i class="fas fa-list" style="color: var(--gold);"></i>
                        Daftar Riwayat Pelanggan
                    </h3>
                    
                    <div style="display: flex; gap: 8px; flex-wrap: wrap; align-items: center;">
                        
                        <!-- FILTER BULAN -->
                        <form action="{{ route('customers.index') }}" method="GET" style="display: flex; gap: 8px; margin-right: 10px;">
                            <select name="month" id="filterBulan" onchange="this.form.submit()" style="padding: 6px 12px; border-radius: 8px; border: 1px solid var(--border-color); font-family: 'DM Sans', sans-serif; background: var(--bg-primary); color: var(--text-primary);">
                                <option value="all" {{ ($selectedMonth ?? 'all') == 'all' ? 'selected' : '' }}>Semua Waktu</option>
                                <option value="01" {{ ($selectedMonth ?? '') == '01' ? 'selected' : '' }}>Januari</option>
                                <option value="02" {{ ($selectedMonth ?? '') == '02' ? 'selected' : '' }}>Februari</option>
                                <option value="03" {{ ($selectedMonth ?? '') == '03' ? 'selected' : '' }}>Maret</option>
                                <option value="04" {{ ($selectedMonth ?? '') == '04' ? 'selected' : '' }}>April</option>
                                <option value="05" {{ ($selectedMonth ?? '') == '05' ? 'selected' : '' }}>Mei</option>
                                <option value="06" {{ ($selectedMonth ?? '') == '06' ? 'selected' : '' }}>Juni</option>
                                <option value="07" {{ ($selectedMonth ?? '') == '07' ? 'selected' : '' }}>Juli</option>
                                <option value="08" {{ ($selectedMonth ?? '') == '08' ? 'selected' : '' }}>Agustus</option>
                                <option value="09" {{ ($selectedMonth ?? '') == '09' ? 'selected' : '' }}>September</option>
                                <option value="10" {{ ($selectedMonth ?? '') == '10' ? 'selected' : '' }}>Oktober</option>
                                <option value="11" {{ ($selectedMonth ?? '') == '11' ? 'selected' : '' }}>November</option>
                                <option value="12" {{ ($selectedMonth ?? '') == '12' ? 'selected' : '' }}>Desember</option>
                            </select>
                            <input type="hidden" name="year" value="{{ $selectedYear ?? date('Y') }}">
                        </form>

                        <button class="btn btn-outline btn-sm" onclick="exportData()">
                            <i class="fas fa-download"></i> Export
                        </button>
                        <button class="btn btn-outline btn-sm" onclick="window.print()">
                            <i class="fas fa-print"></i> Print
                        </button>
                    </div>
                </div>

                    <!-- NOTIFIKASI SUKSES HAPUS -->
                @if(session('success'))
                <div style="background: rgba(34, 197, 94, 0.1); border-left: 4px solid #22c55e; color: #166534; padding: 16px 20px; border-radius: 8px; margin-bottom: 24px; display: flex; align-items: center; gap: 12px; font-weight: 500;">
                    <i class="fas fa-check-circle" style="font-size: 20px; color: #22c55e;"></i>
                    {{ session('success') }}
                </div>
                @endif

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No HP</th>
                                <th class="text-center">Total Order</th>
                                <th class="text-center">Total Belanja</th>
                                <th class="text-center">Order Terakhir</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="customerTableBody">
                            @forelse($customers as $index => $customer)
                            <tr class="customer-row">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="user-cell">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($customer->customer_name) }}&background=d4a843&color=000&size=30" alt="{{ $customer->customer_name }}">
                                        <span>{{ $customer->customer_name }}</span>
                                    </div>
                                </td>
                                <td>{{ $customer->phone }}</td>
                                <td class="text-center">
                                    <span class="order-count">{{ $customer->total_orders }} Transaksi</span>
                                </td>
                                <td class="text-center">
                                    <strong class="total-spent">Rp {{ number_format($customer->total_spent, 0, ',', '.') }}</strong>
                                </td>
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($customer->last_order)->format('d M Y') }}
                                </td>
                                <td class="text-center">
                                    @php
                                        // $jml adalah jumlah total order si pelanggan dari dulu sampai sekarang
                                        $jml = $customer->total_orders; 
                                    @endphp

                                    {{-- Jika order kurang dari 10 (1 sampai 9 kali) --}}
                                    @if($jml < 10)
                                        <span class="badge" style="background: rgba(59, 130, 246, 0.15); color: #3b82f6;">
                                            <i class="fas fa-star" style="font-size: 10px;"></i> Baru
                                        </span>
                                    
                                    {{-- Jika order antara 10 sampai 19 kali --}}
                                    @elseif($jml >= 10 && $jml < 20)
                                        <span class="badge" style="background: rgba(34, 197, 94, 0.15); color: #22c55e;">
                                            <i class="fas fa-medal" style="font-size: 10px;"></i> Reguler
                                        </span>
                                    
                                    {{-- Jika order 20 kali atau lebih! --}}
                                    @else
                                        <span class="badge" style="background: rgba(212, 168, 67, 0.15); color: var(--gold);">
                                            <i class="fas fa-crown" style="font-size: 10px;"></i> Langganan
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center" style="display: flex; gap: 8px; justify-content: center;">
                                    <button type="button" class="btn btn-sm btn-outline" onclick="showDetail('{{ $customer->phone }}', '{{ $customer->customer_name }}')" title="Lihat Detail Riwayat">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    
                                    {{-- Tombol Edit Baru (Anti Error Tanda Petik) --}}
                                    <button type="button" class="btn btn-sm btn-outline" style="color: #3b82f6; border-color: rgba(59,130,246,0.3);" onclick="openEditModal('{{ $customer->phone }}', '{{ addslashes($customer->customer_name) }}')" title="Edit Data Pelanggan">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    
                                    <!-- Tombol hapus sekarang cuma manggil fungsi Javascript -->
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $customer->phone }}', '{{ $customer->customer_name }}')" title="Hapus Pelanggan Ini">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" style="text-align: center; padding: 60px 20px;">
                                    Belum ada riwayat pelanggan untuk periode ini.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </main>

    <!-- ============================================ -->
    <!-- MODAL DETAIL PELANGGAN -->
    <!-- ============================================ -->
    <div id="detailModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>
                    <i class="fas fa-history" style="color: var(--gold);"></i>
                    Riwayat <span id="modalCustomerName" style="margin-left: 5px;"></span>
                </h2>
                <button class="modal-close" onclick="closeModal()">&times;</button>
            </div>
            <div class="modal-body" id="detailBody" style="background: var(--bg-primary); padding: 20px;">
                <!-- Isi detail akan diload lewat Javascript -->
            </div>
        </div>
    </div>

    <!-- ============================================== -->
    <!--        MODAL EDIT DATA PELANGGAN -->
    <!-- ============================================== -->
    <div id="editCustomerModal" style="display: none; align-items: center; justify-content: center; position: fixed; z-index: 99999; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.75); backdrop-filter: blur(4px);">
        
        <!-- Kotak Modal (Warna dan Style disamakan dengan Dark Mode bawaan) -->
        <div style="background: #1e1e1e; border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; width: 90%; max-width: 420px; padding: 24px; position: relative; box-shadow: 0 10px 25px rgba(0,0,0,0.5);">
            
            <!-- Tombol Silang (X) di pojok kanan atas -->
            <button type="button" onclick="closeEditModal()" style="position: absolute; top: 16px; right: 16px; background: transparent; border: none; color: #9ca3af; font-size: 20px; cursor: pointer;">
                <i class="fas fa-times"></i>
            </button>
            
            <!-- Header Modal -->
            <h2 style="margin-top: 0; margin-bottom: 20px; font-size: 18px; color: #ffffff; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 12px; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-user-edit" style="color: #3b82f6;"></i> Edit Pelanggan
            </h2>

            <form action="{{ route('admin.customers.update') }}" method="POST">
                @csrf
                <input type="hidden" name="old_phone" id="editOldPhone">
                
                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 8px; color: #9ca3af; font-size: 13px; font-weight: 600;">Nama Pelanggan</label>
                    <input type="text" name="name" id="editName" required style="width: 100%; background: #121212; color: #ffffff; border: 1px solid rgba(255,255,255,0.1); padding: 10px 14px; border-radius: 8px; outline: none; font-family: inherit;">
                </div>
                
                <div style="margin-bottom: 24px;">
                    <label style="display: block; margin-bottom: 8px; color: #9ca3af; font-size: 13px; font-weight: 600;">Nomor WhatsApp/HP</label>
                    <input type="text" name="phone" id="editPhone" required style="width: 100%; background: #121212; color: #ffffff; border: 1px solid rgba(255,255,255,0.1); padding: 10px 14px; border-radius: 8px; outline: none; font-family: inherit;">
                </div>
                
                <div style="display: flex; justify-content: flex-end; gap: 10px;">
                    <button type="button" onclick="closeEditModal()" style="background: transparent; border: 1px solid rgba(255,255,255,0.2); color: #ffffff; padding: 8px 16px; border-radius: 6px; cursor: pointer; font-family: inherit;">Batal</button>
                    <button type="submit" style="background: #3b82f6; border: none; color: #ffffff; padding: 8px 16px; border-radius: 6px; cursor: pointer; font-weight: 600; font-family: inherit;">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ============================================ -->
    <!-- MODAL KONFIRMASI HAPUS -->
    <!-- ============================================ -->
    <div id="deleteModal" class="modal">
        <div class="modal-content" style="max-width: 400px; text-align: center; padding: 32px 24px;">
            <div style="width: 64px; height: 64px; background: rgba(239, 68, 68, 0.1); color: #ef4444; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 32px; margin: 0 auto 16px;">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h2 style="font-size: 20px; font-weight: 600; margin-bottom: 8px; color: var(--text-primary);">Yakin Mau Dihapus?</h2>
            <p style="color: var(--text-secondary); font-size: 14px; margin-bottom: 24px;">
                Semua riwayat pesanan atas nama <strong id="deleteModalName" style="color: var(--text-primary);"></strong> akan hilang selamanya dan tidak bisa dikembalikan lho!
            </p>
            <div style="display: flex; gap: 12px; justify-content: center;">
                <button type="button" class="btn btn-outline" onclick="closeDeleteModal()" style="flex: 1; justify-content: center;">Batal</button>
                <button type="button" class="btn btn-danger" onclick="submitDelete()" style="flex: 1; justify-content: center;">Ya, Hapus!</button>
            </div>
        </div>
    </div>

    <!-- FORM HAPUS GLOBAL (Disembunyikan) -->
    <form id="globalDeleteForm" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <!-- ============================================ -->
    <!-- MODAL KONFIRMASI HAPUS 1 TRANSAKSI -->
    <!-- ============================================ -->
    <div id="deleteItemModal" class="modal">
        <div class="modal-content" style="max-width: 400px; text-align: center; padding: 32px 24px;">
            <div style="width: 64px; height: 64px; background: rgba(239, 68, 68, 0.1); color: #ef4444; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 32px; margin: 0 auto 16px;">
                <i class="fas fa-trash-alt"></i>
            </div>
            <h2 style="font-size: 20px; font-weight: 600; margin-bottom: 8px; color: var(--text-primary);">Hapus Transaksi Ini?</h2>
            <p style="color: var(--text-secondary); font-size: 14px; margin-bottom: 24px;">
                Hanya 1 transaksi ini saja yang akan dihapus. Riwayat transaksi lainnya milik pelanggan ini tetap aman.
            </p>
            <div style="display: flex; gap: 12px; justify-content: center;">
                <button type="button" class="btn btn-outline" onclick="closeDeleteItemModal()" style="flex: 1; justify-content: center;">Batal</button>
                <button type="button" class="btn btn-danger" onclick="submitDeleteItem()" style="flex: 1; justify-content: center;">Ya, Hapus!</button>
            </div>
        </div>
    </div>

    <!-- Tambahkan Script Javascript ini di bagian bawah sebelum </body> -->
    <script>
        function showDetail(phone, name) {
            const modal = document.getElementById('detailModal');
            const detailBody = document.getElementById('detailBody');
            document.getElementById('modalCustomerName').textContent = name;
            
            modal.classList.add('show');
            detailBody.innerHTML = '<div style="text-align:center; padding:20px;"><i class="fas fa-spinner fa-spin" style="color:var(--gold); font-size:24px;"></i><p>Memuat riwayat...</p></div>';

            fetch(`/admin/customers/detail?phone=${phone}`)
                .then(response => response.json())
                .then(data => {
                    if(data.length === 0) {
                        detailBody.innerHTML = '<p style="text-align:center;">Tidak ada riwayat.</p>';
                        return;
                    }

                    // Tambahkan tombol Print di atas riwayat dalam modal
                    let html = `
                        <div style="display: flex; justify-content: flex-end; margin-bottom: 16px;">
                            <button type="button" class="btn btn-outline btn-sm" onclick="window.print()" style="display: flex; align-items: center; gap: 6px;">
                                <i class="fas fa-print"></i> Cetak Riwayat Ini
                            </button>
                        </div>
                    `;

                    data.forEach((order, index) => {
                        const date = new Date(order.order_created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute:'2-digit' });
                        
                        let deliveryBadge = '';
                        if (order.delivery_type === 'antar') {
                            deliveryBadge = '<span style="color: #fbbf24; font-weight: 600;"><i class="fas fa-motorcycle"></i> Antar ke Alamat</span>';
                        } else {
                            deliveryBadge = '<span style="color: #3b82f6; font-weight: 600;"><i class="fas fa-store"></i> Ambil Sendiri</span>';
                        }

                        html += `
                        <div style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: 8px; margin-bottom: 16px; padding: 16px; position: relative;">
                            
                            <!-- Tombol Hapus 1 Transaksi Ini -->
                            <button type="button" onclick="confirmDeleteItem(${order.id})" title="Hapus transaksi ini saja" style="position: absolute; top: 12px; right: 12px; background: transparent; border: none; color: #ef4444; cursor: pointer; font-size: 14px; padding: 4px;">
                                <i class="fas fa-trash-alt"></i>
                            </button>

                            <!-- Header Transaksi -->
                            <div style="display:flex; justify-content:space-between; border-bottom: 1px dashed var(--border-color); padding-bottom: 12px; margin-bottom: 12px; padding-right: 28px;">
                                <div>
                                    <span class="badge badge-success" style="margin-bottom: 6px;">Transaksi #${data.length - index}</span>
                                    <div style="font-size: 12px; color: var(--text-muted);"><i class="fas fa-clock"></i> ${date} WIB</div>
                                </div>
                                <div style="text-align: right;">
                                    <div style="color: var(--gold); font-weight: bold; font-size: 16px;">Rp ${parseInt(order.total).toLocaleString('id-ID')}</div>
                                </div>
                            </div>

                            <!-- Informasi Pelanggan (Nama & No HP), Pengiriman & Catatan -->
                            <div style="background: var(--bg-primary); padding: 10px 12px; border-radius: 6px; margin-bottom: 12px; font-size: 12px; color: var(--text-secondary);">
                                <div style="margin-bottom: 4px;"><strong>Nama:</strong> <span style="color: var(--text-primary); font-weight: 600;">${order.customer_name}</span></div>
                                <div style="margin-bottom: 4px;"><strong>No WhatsApp/HP:</strong> <span style="color: var(--text-primary); font-weight: 600;">${order.phone}</span></div>
                                <div style="margin-bottom: 4px;"><strong>Metode:</strong> ${deliveryBadge}</div>
                                ${order.delivery_type === 'antar' && order.address ? `<div style="margin-bottom: 4px;"><strong>Alamat:</strong> ${order.address}</div>` : ''}
                                ${order.landmark ? `<div style="margin-bottom: 4px;"><strong>Patokan:</strong> ${order.landmark}</div>` : ''}
                                <div><strong>Catatan:</strong> ${order.note ? order.note : '-'}</div>
                            </div>

                            <!-- Daftar Menu yang Dipesan -->
                            <div>
                                <p style="font-size: 12px; color: var(--text-muted); margin-bottom: 6px; font-weight: 600;"><i class="fas fa-utensils"></i> Menu yang Dipesan:</p>
                                <ul style="list-style:none; padding:0; margin:0; font-size: 13px;">`;
                        
                        if(order.items_detail && order.items_detail.length > 0) {
                            order.items_detail.forEach(item => {
                                let menuName = item.menu_name || item.name || 'Menu';
                                let qty = item.quantity || item.qty || 1;
                                let subtotal = item.subtotal ? `Rp ${parseInt(item.subtotal).toLocaleString('id-ID')}` : '';
                                
                                html += `<li style="display:flex; justify-content:space-between; margin-bottom: 4px; border-bottom: 1px solid rgba(255,255,255,0.03); padding-bottom: 4px;">
                                            <span><span style="color:var(--gold); font-weight:bold;">${qty}x</span> ${menuName}</span>
                                            <span style="color: var(--text-secondary);">${subtotal}</span>
                                         </li>`;
                            });
                        } else {
                            html += `<li>Detail item tidak tersedia</li>`;
                        }

                        html += `</ul></div></div>`;
                    });

                    detailBody.innerHTML = html;
                })
                .catch(error => {
                    detailBody.innerHTML = '<p style="text-align:center; color:red;">Gagal memuat detail pesanan.</p>';
                    console.error(error);
                });
        }

        function closeModal() {
            document.getElementById('detailModal').classList.remove('show');
        }

        // ---------- HAPUS SEMUA RIWAYAT ----------
        function confirmDelete(phone, name) {
            document.getElementById('deleteModalName').textContent = name;
            document.getElementById('globalDeleteForm').action = `/admin/customers/delete/${phone}`;
            document.getElementById('deleteModal').classList.add('show');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('show');
        }

        function submitDelete() {
            document.getElementById('globalDeleteForm').submit();
        }

        // ---------- HAPUS SATU TRANSAKSI ----------
        function confirmDeleteItem(id) {
            document.getElementById('globalDeleteForm').action = `/admin/customers/delete-item/${id}`;
            document.getElementById('deleteItemModal').classList.add('show');
        }

        function closeDeleteItemModal() {
            document.getElementById('deleteItemModal').classList.remove('show');
        }

        function submitDeleteItem() {
            document.getElementById('globalDeleteForm').submit();
        }

        // ---------- KLIK OUTSIDE MODAL ----------
        window.onclick = function(event) {
            const detailModal = document.getElementById('detailModal');
            const deleteModal = document.getElementById('deleteModal');
            const deleteItemModal = document.getElementById('deleteItemModal');
            
            if (event.target === detailModal) closeModal();
            if (event.target === deleteModal) closeDeleteModal();
            if (event.target === deleteItemModal) closeDeleteItemModal();
        }

        // ---------- FILTER BULAN TANPA RELOAD (AJAX SUPER CEPAT) ----------
        let filterBulan = document.getElementById('filterBulan');
        if (filterBulan) {
            // Hilangkan fungsi submit form bawaan
            if (filterBulan.form) filterBulan.form.onsubmit = e => e.preventDefault();

            filterBulan.addEventListener('change', function() {
                let month = this.value;
                let url = `/admin/customers?month=${month}`;
                let tbody = document.getElementById('customerTableBody');
                
                // Tampilkan loading di tabel
                tbody.innerHTML = `<tr><td colspan="8" style="text-align:center; padding: 50px;"><i class="fas fa-spinner fa-spin" style="font-size:28px; color:var(--gold);"></i><p style="margin-top:12px; color:var(--text-muted);">Memuat rekap bulan ini...</p></td></tr>`;

                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.text())
                .then(html => {
                    // Ambil kembali elemen dari hasil fetch HTML halaman tersebut
                    let doc = new DOMParser().parseFromString(html, 'text/html');
                    
                    // 1. Update Tabel Bawah
                    let newTbody = doc.getElementById('customerTableBody');
                    if (newTbody) {
                        tbody.innerHTML = newTbody.innerHTML;
                    }

                    // 2. Update Kotak Statistik di Atas secara Instan
                    let newActive = doc.getElementById('statActiveCustomers')?.textContent;
                    let newOrders = doc.getElementById('statTotalOrders')?.textContent;
                    let newRevenue = doc.getElementById('statRevenuePeriode')?.textContent;
                    let newAllTime = doc.getElementById('statRevenueAllTime')?.textContent;

                    if (newActive) document.getElementById('statActiveCustomers').textContent = newActive;
                    if (newOrders) document.getElementById('statTotalOrders').textContent = newOrders;
                    if (newRevenue) document.getElementById('statRevenuePeriode').textContent = newRevenue;
                    if (newAllTime) document.getElementById('statRevenueAllTime').textContent = newAllTime;

                    // Jalankan ulang kotak pencarian jika sedang aktif
                    let searchInput = document.getElementById('customerSearch');
                    if (searchInput && searchInput.value) {
                        // Trigger pencarian ulang
                        searchInput.dispatchEvent(new Event('input'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Gagal memperbarui data.');
                });
            });
        }

        // ==========================================
        //      FITUR MODAL EDIT PELANGGAN
        // ==========================================
        const editModal = document.getElementById('editCustomerModal');

        // Fungsi Buka Modal
        function openEditModal(phone, name) {
            document.getElementById('editOldPhone').value = phone;
            document.getElementById('editName').value = name;
            document.getElementById('editPhone').value = phone;
            
            // Paksa muncul
            editModal.style.display = 'flex';
        }

        // Fungsi Tutup Modal (Tombol X atau Batal)
        function closeEditModal() {
            editModal.style.display = 'none';
        }

        // Fitur Tutup Modal pas diklik di area luar (background gelap)
        window.addEventListener('click', function(event) {
            // Kalau yang diklik adalah background gelapnya (bukan kotak isinya)
            if (event.target === editModal) {
                closeEditModal();
            }
        });
    </script>

    <!-- ============================================ -->
    <!-- SCRIPTS -->
    <!-- ============================================ -->
    <script>
        // ---------- CLOCK ----------
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            document.getElementById('clock').textContent = hours + ':' + minutes;

            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            const dayName = days[now.getDay()];
            const date = now.getDate();
            const month = months[now.getMonth()];
            const year = now.getFullYear();
            
            if(document.getElementById('date')) document.getElementById('date').textContent = dayName + ', ' + date + ' ' + month + ' ' + year;
            if(document.getElementById('currentDate')) document.getElementById('currentDate').textContent = dayName + ', ' + date + ' ' + month + ' ' + year;
        }
        updateClock();
        setInterval(updateClock, 1000);

        

        // ---------- EXPORT DATA KE CSV YANG BERSIH & RAPI ----------
        window.exportData = function() {
            const rows = document.querySelectorAll('.customer-row');
            if (rows.length === 0) {
                alert('Tidak ada data untuk diexport!');
                return;
            }

            // Tambahkan BOM (\uFEFF) di awal agar karakter khusus / format Excel Indonesia terbaca normal
            let csv = '\uFEFFNo;Nama Pelanggan;Nomor HP;Total Transaksi;Total Belanja (Rp);Order Terakhir;Status\n';

            rows.forEach(function(row) {
                const cells = row.querySelectorAll('td');
                const no = cells[0]?.textContent?.trim() || '';
                const name = cells[1]?.querySelector('span')?.textContent?.trim() || '';
                const phone = cells[2]?.textContent?.trim() || '';
                const orders = cells[3]?.textContent?.trim().replace(' Transaksi', '') || '';
                
                // Bersihkan format mata uang Rp dan titik ribuan agar jadi angka murni di Excel
                let spent = cells[4]?.textContent?.trim() || '0';
                spent = spent.replace('Rp', '').replace(/\./g, '').trim();

                const lastOrder = cells[5]?.textContent?.trim() || '';
                const status = cells[6]?.querySelector('.badge')?.textContent?.trim() || '';

                csv += `"${no}";"${name}";"${phone}";"${orders}";"${spent}";"${lastOrder}";"${status}"\n`;
            });

            // Download file dengan separator titik koma (;) agar otomatis rapi masuk kolom Excel
            const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `Rekap-Riwayat-Pelanggan-${new Date().toISOString().split('T')[0]}.csv`;
            a.style.display = 'none';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);
        };
    </script>

    <script src="{{ asset('assets/js/admin-script.js') }}"></script>

</body>
</html>