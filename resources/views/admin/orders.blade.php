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

                <!-- ============================================ -->
                <!-- HEADER CARD -->
                <!-- ============================================ -->
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                    <h3>
                        <i class="fas fa-clipboard-list" style="color: var(--gold);"></i>
                        Daftar Pesanan
                    </h3>
                    
                    <div style="background: var(--gold-bg); color: var(--gold); padding: 6px 16px; border-radius: 8px; font-weight: 600; font-size: 14px; border: 1px solid rgba(212, 168, 67, 0.2);">
                        Total: {{ $orders->count() }} Pesanan
                    </div>
                </div>

                <div class="card-body">

                    <!-- NOTIFIKASI SUKSES -->
                    @if(session('success'))
                    <div style="background: rgba(34, 197, 94, 0.1); border-left: 4px solid #22c55e; color: #166534; padding: 16px 20px; border-radius: 8px; margin-bottom: 24px; display: flex; align-items: center; gap: 12px; font-weight: 500;">
                        <i class="fas fa-check-circle" style="font-size: 20px; color: #22c55e;"></i>
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="table-wrapper" style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse; min-width: 700px;">
                            <thead>
                                <tr>
                                    <th style="padding: 12px; text-align: left;">Order ID</th>
                                    <th style="text-align: left;">Nama Pelanggan</th>
                                    <th style="text-align: left;">No HP</th>
                                    <th style="text-align: center;">Metode</th>
                                    <th style="text-align: right;">Total Harga</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($orders as $order)
                                <tr style="border-bottom: 1px solid var(--border-color);">
                                    
                                    <!-- ID & Nama -->
                                    <td style="font-weight: bold; color: var(--gold);">#{{ $order->id }}</td>
                                    
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 10px;">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($order->customer_name) }}&background=d4a843&color=000&size=30" alt="Avatar" style="border-radius: 50%; border: 2px solid var(--gold);">
                                            <span style="font-weight: 500; color: var(--text-primary);">{{ $order->customer_name }}</span>
                                        </div>
                                    </td>
                                    
                                    <td style="color: var(--text-secondary);">{{ $order->phone }}</td>

                                    <!-- Metode Pengiriman dengan Icon -->
                                    <td style="text-align: center;">
                                        @if($order->delivery_type == 'antar')
                                            <span class="badge" style="background: rgba(245, 158, 11, 0.15); color: #f59e0b;">
                                                <i class="fas fa-motorcycle"></i> Antar
                                            </span>
                                        @else
                                            <span class="badge" style="background: rgba(59, 130, 246, 0.15); color: #3b82f6;">
                                                <i class="fas fa-store"></i> Ambil
                                            </span>
                                        @endif
                                    </td>

                                    <!-- Harga -->
                                    <td style="text-align: center; color: var(--text-primary); font-weight: 600;">Rp {{ number_format($order->total, 0, ',', '.') }}
                                    </td>

                                    <!-- Status Pesanan (Animasi Mutar untuk Diproses) -->
                                    <td style="text-align: center;">
                                        @if($order->status == 'Menunggu')
                                            <span class="badge" style="background: rgba(239, 68, 68, 0.15); color: #ef4444;">
                                                <i class="fas fa-clock"></i> Menunggu
                                            </span>
                                        @elseif($order->status == 'Diproses')
                                            <span class="badge" style="background: rgba(59, 130, 246, 0.15); color: #3b82f6;">
                                                <i class="fas fa-spinner fa-spin"></i> Diproses
                                            </span>
                                        @else
                                            <span class="badge" style="background: rgba(34, 197, 94, 0.15); color: #22c55e;">
                                                <i class="fas fa-check-circle"></i> Selesai
                                            </span>
                                        @endif
                                    </td>

                                    <!-- Tombol Aksi (Mata & Tempat Sampah) -->
                                    <td style="text-align: center;">
                                        <div style="display: flex; gap: 8px; justify-content: center; align-items: center;">
                                            <button type="button" class="btn btn-sm btn-outline" style="color: #3b82f6; border-color: rgba(59,130,246,0.3);" onclick="openOrderModal({{ $order->id }})" title="Lihat Detail Pesanan">
                                                <i class="fas fa-eye"></i>
                                            </button>

                                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Pesanan">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" style="text-align: center; padding: 40px 20px; color: var(--text-muted);">
                                        <i class="fas fa-clipboard" style="font-size: 32px; margin-bottom: 12px; opacity: 0.5; display: block;"></i>
                                        Belum ada pesanan yang masuk.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>

                </div>

            </div>

        </div>

    </main>

    <!-- ============================================ -->
    <!-- SCRIPTS -->
    <!-- ============================================ -->
    <script src="{{ asset('assets/js/admin-script.js') }}"></script>

    <!-- ============================================ -->
<!-- MODAL DETAIL PESANAN -->
<!-- ============================================ -->
<div id="orderDetailModal" class="modal">
    <div class="modal-content" style="max-width: 600px;">
        <div class="modal-header">
            <h2>
                <i class="fas fa-info-circle" style="color: var(--gold);"></i>
                Informasi Pesanan
            </h2>
            <button class="modal-close" onclick="closeOrderModal()">&times;</button>
        </div>
        <div class="modal-body" id="orderModalBody">
            <!-- Konten akan dimuat secara otomatis lewat AJAX -->
            <div style="text-align: center; padding: 40px; color: var(--text-muted);">
                <i class="fas fa-spinner fa-spin" style="font-size: 28px; color: var(--gold); margin-bottom: 10px;"></i>
                <p>Memuat detail pesanan...</p>
            </div>
        </div>
    </div>
</div>

<script>
    function openOrderModal(orderId) {
        const modal = document.getElementById('orderDetailModal');
        const modalBody = document.getElementById('orderModalBody');

        // Tampilkan modal dan beri loading
        modal.classList.add('show');
        modalBody.innerHTML = `
            <div style="text-align: center; padding: 40px; color: var(--text-muted);">
                <i class="fas fa-spinner fa-spin" style="font-size: 28px; color: var(--gold); margin-bottom: 10px;"></i>
                <p>Memuat detail pesanan...</p>
            </div>
        `;

        // Ambil data HTML dari server menggunakan fetch (tanpa reload)
        fetch(`/admin/orders/${orderId}/modal`)
            .then(response => response.text())
            .then(html => {
                modalBody.innerHTML = html;
            })
            .catch(error => {
                modalBody.innerHTML = `<p style="text-align: center; color: #ef4444;">Gagal memuat data pesanan.</p>`;
                console.error(error);
            });
    }

    function closeOrderModal() {
        document.getElementById('orderDetailModal').classList.remove('show');
    }

    // Tutup modal jika klik di luar kotak modal
    window.addEventListener('click', function(event) {
        const modal = document.getElementById('orderDetailModal');
        if (event.target === modal) {
            closeOrderModal();
        }
    });

    // Fungsi menampilkan Toast Notifikasi yang keren
    function showToast(title, message) {
        const toast = document.getElementById('toastNotification');
        document.getElementById('toastTitle').textContent = title;
        document.getElementById('toastMessage').textContent = message;

        // Munculkan toast
        toast.style.transform = 'translateY(0)';
        toast.style.opacity = '1';

        // Sembunyikan otomatis setelah 3 detik
        setTimeout(() => {
            toast.style.transform = 'translateY(100px)';
            toast.style.opacity = '0';
        }, 3000);
    }

    function updateOrderStatus(orderId, currentStatus) {
        const modalBody = document.getElementById('orderModalBody');
        // Ambil nama pelanggan dari atribut di dalam konten modal
        const container = modalBody.querySelector('[data-customer-name]');
        const customerName = container ? container.getAttribute('data-customer-name') : 'Pelanggan';

        modalBody.innerHTML = `
            <div style="text-align: center; padding: 40px; color: var(--text-muted);">
                <i class="fas fa-spinner fa-spin" style="font-size: 28px; color: var(--gold); margin-bottom: 10px;"></i>
                <p>Memproses status pesanan...</p>
            </div>
        `;

        fetch(`/admin/orders/${orderId}/status`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            closeOrderModal();
            
            // Tentukan teks notifikasi berdasarkan status sebelumnya
            if (currentStatus === 'Menunggu') {
                showToast('Status Diperbarui', `Pesanan atas nama ${customerName} kini sedang Diproses.`);
            } else {
                showToast('Pesanan Selesai!', `Pesanan atas nama ${customerName} telah selesai dan masuk ke Riwayat.`);
            }

            // Refresh halaman setelah 1.5 detik agar animasi toast sempat terlihat
            setTimeout(() => {
                location.reload();
            }, 1500);
        })
        .catch(error => {
            alert('Gagal memperbarui status pesanan.');
            console.error(error);
            openOrderModal(orderId);
        });
    }
</script>

<!-- ============================================ -->
<!-- TOAST NOTIFIKASI MELAYANG -->
<!-- ============================================ -->
<div id="toastNotification" style="position: fixed; bottom: 30px; right: 30px; background: #1a1a1a; border-left: 4px solid #22c55e; color: #fff; padding: 16px 24px; border-radius: 8px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); display: flex; align-items: center; gap: 12px; z-index: 9999; transform: translateY(100px); opacity: 0; transition: all 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);">
    <i class="fas fa-check-circle" style="color: #22c55e; font-size: 24px;"></i>
    <div>
        <h4 style="font-size: 14px; font-weight: 600; margin: 0; color: #fff;" id="toastTitle">Berhasil!</h4>
        <p style="font-size: 13px; color: var(--text-secondary); margin: 2px 0 0 0;" id="toastMessage">Pesan notifikasi di sini</p>
    </div>
</div>

</body>
</html>