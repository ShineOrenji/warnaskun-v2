<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan - Admin Ibu Opik</title>

    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin-style.css') }}">

    <style>
        /* ---------- OVERRIDE UNTUK ORDERS ---------- */
        /* Biarkan struktur HTML tetap, hanya styling tambahan */

        /* Perbaiki table agar rapi */
        .card-body table {
            width: 100% !important;
            border-collapse: collapse !important;
        }

        .card-body table thead tr {
            background: var(--bg-hover) !important;
            border-bottom: 2px solid var(--gold) !important;
        }

        .card-body table thead th {
            padding: 12px 16px !important;
            font-size: 11px !important;
            text-transform: uppercase !important;
            color: var(--text-muted) !important;
            font-weight: 600 !important;
            letter-spacing: 0.5px !important;
            text-align: center !important;
        }

        .card-body table tbody tr {
            border-bottom: 1px solid var(--border-color) !important;
            transition: all 0.3s ease !important;
            text-align: center !important;
        }

        .card-body table tbody tr:hover {
            background: var(--bg-hover) !important;
        }

        .card-body table tbody td {
            padding: 14px 16px !important;
            font-size: 13px !important;
            color: var(--text-secondary) !important;
            vertical-align: middle !important;
        }

        .card-body table tbody td:first-child {
            font-weight: 700 !important;
            color: var(--gold) !important;
        }

        .card-body table tbody td:nth-child(2) {
            color: var(--text-primary) !important;
            font-weight: 500 !important;
        }

        .card-body table tbody td:nth-child(4) {
            color: var(--text-primary) !important;
            font-weight: 600 !important;
        }

        /* Badge */
        .card-body table tbody td .badge {
            padding: 4px 14px !important;
            border-radius: 20px !important;
            font-size: 11px !important;
            font-weight: 600 !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 6px !important;
        }

        .card-body table tbody td .badge-warning {
            background: rgba(212, 168, 67, 0.15) !important;
            color: #d4a843 !important;
        }

        .card-body table tbody td .badge-info {
            background: rgba(59, 130, 246, 0.15) !important;
            color: #3b82f6 !important;
        }

        .card-body table tbody td .badge-success {
            background: rgba(34, 197, 94, 0.15) !important;
            color: #22c55e !important;
        }

        .card-body table tbody td .bg-yellow-500 {
            background: rgba(212, 168, 67, 0.15) !important;
            color: #d4a843 !important;
        }

        .card-body table tbody td .bg-blue-500 {
            background: rgba(59, 130, 246, 0.15) !important;
            color: #3b82f6 !important;
        }

        .card-body table tbody td .bg-green-500 {
            background: rgba(34, 197, 94, 0.15) !important;
            color: #22c55e !important;
        }

        .card-body table tbody td .text-white {
            color: inherit !important;
        }

        /* Flex untuk aksi */
        .card-body table tbody td .flex {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 8px !important;
        }

        /* Button */
        .card-body table tbody td .btn {
            padding: 6px 16px !important;
            border-radius: 8px !important;
            font-size: 12px !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 6px !important;
            text-decoration: none !important;
            border: none !important;
            cursor: pointer !important;
        }

        .card-body table tbody td .btn-primary {
            background: #d4a843 !important;
            color: #000 !important;
        }

        .card-body table tbody td .btn-primary:hover {
            background: #e8c96e !important;
            transform: translateY(-1px) !important;
        }

        .card-body table tbody td .btn-sm {
            padding: 4px 12px !important;
            font-size: 11px !important;
        }

        .card-body table tbody td .text-red-500 {
            color: #ef4444 !important;
            background: transparent !important;
            border: none !important;
            font-size: 18px !important;
            cursor: pointer !important;
            transition: all 0.3s ease !important;
        }

        .card-body table tbody td .text-red-500:hover {
            color: #dc2626 !important;
            transform: scale(1.1) !important;
        }

        .card-body table tbody td .transition {
            transition: all 0.3s ease !important;
        }

        /* Total Pesanan */
        .card-body p {
            color: var(--text-secondary) !important;
            font-size: 14px !important;
            margin-bottom: 16px !important;
        }

        .card-body p strong {
            color: var(--text-primary) !important;
            font-weight: 700 !important;
        }

        /* Hapus background f5f5f5 */
        .card-body table thead tr {
            background: var(--bg-hover) !important;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .card-body table {
                font-size: 12px !important;
                min-width: 500px !important;
            }

            .card-body table thead th,
            .card-body table tbody td {
                padding: 10px 12px !important;
                font-size: 12px !important;
            }

            .card-body table tbody td .btn-sm {
                font-size: 10px !important;
                padding: 3px 10px !important;
            }

            .card-body table tbody td .text-red-500 {
                font-size: 16px !important;
            }
        }

        @media (max-width: 480px) {
            .card-body table {
                min-width: 400px !important;
                font-size: 11px !important;
            }

            .card-body table thead th,
            .card-body table tbody td {
                padding: 8px 10px !important;
                font-size: 11px !important;
            }

            .card-body table tbody td .btn-sm {
                font-size: 9px !important;
                padding: 2px 8px !important;
            }

            .card-body table tbody td .text-red-500 {
                font-size: 14px !important;
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
            <div class="logo-icon">
                <i class="fas fa-utensils"></i>
            </div>
            <div>
                <h1>Admin Panel</h1>
                <small>Warung Ibu Opik</small>
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

            <a href="{{ route('orders.index') }}" class="active">
                <i class="fas fa-shopping-cart"></i>
                <span>Pesanan</span>
                <span class="badge warning">{{ $pendingOrders ?? 0 }}</span>
            </a>

            <a href="{{ route('customers.index') }}">
                <i class="fas fa-users"></i>
                <span>Pelanggan</span>
                <span class="badge">{{ $totalCustomers ?? 0 }}</span>
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
                    <h2>Manajemen Pesanan</h2>
                    <p>Kelola semua pesanan pelanggan</p>
                </div>
            </div>

        </header>

        <!-- CONTENT -->
        <div class="content">

            <div class="card">

                <div class="card-header">
                    <h3>Daftar Pesanan</h3>
                </div>

                <div class="card-body">

                    <p style="margin-bottom: 20px;">
                        Total Pesanan :
                        <strong>{{ $orders->count() }}</strong>
                    </p>

                    <table style="width: 100%; border-collapse: collapse;">

                        <thead>
                            <tr style="background: #f5f5f5;">
                                <th style="padding: 12px;">ID</th>
                                <th>Nama</th>
                                <th>No HP</th>
                                <th>Metode</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($orders as $order)

                            <tr style="text-align: center; border-top: 1px solid #ddd;">

                                <td>#{{ $order->id }}</td>

                                <td>{{ $order->customer_name }}</td>

                                <td>{{ $order->phone }}</td>

                                <td>
                                    @if($order->delivery_type == 'antar')
                                        <span class="badge badge-warning">🚚 Antar</span>
                                    @else
                                        <span class="badge badge-info">🏪 Ambil</span>
                                    @endif
                                </td>

                                <td>
                                    Rp {{ number_format($order->total, 0, ',', '.') }}
                                </td>

                                <td>

                                    @if($order->status == 'Menunggu')
                                        <span class="badge bg-yellow-500 text-white">🟡 Menunggu</span>
                                    @elseif($order->status == 'Diproses')
                                        <span class="badge bg-blue-500 text-white">🔵 Diproses</span>
                                    @else
                                        <span class="badge bg-green-500 text-white">🟢 Selesai</span>
                                    @endif

                                </td>

                                <td class="flex items-center gap-2">

                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary btn-sm">
                                        Detail
                                    </a>

                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition text-xl" title="Hapus Pesanan">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </td>

                            </tr>

                            @empty

                            <tr>
                                <td colspan="7" style="text-align: center; padding: 20px;">
                                    Belum ada pesanan.
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
    <!-- SCRIPTS -->
    <!-- ============================================ -->
    <script src="{{ asset('assets/js/admin-script.js') }}"></script>

</body>
</html>