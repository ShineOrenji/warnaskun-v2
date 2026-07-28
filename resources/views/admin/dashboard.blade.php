<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Warung Nasi Kuning Ibu Opik</title>

    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin-style.css') }}">
    <!-- Menu Modal CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/menu-modal.css') }}">
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

            <a href="{{ route('dashboard.index') }}" class="active">
                <i class="fas fa-chart-line"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('menu.index') }}">
                <i class="fas fa-utensils"></i>
                <span>Menu</span>
                <span class="badge gold">{{ $totalMenus }}</span>
            </a>

            <a href="{{ route('orders.index') }}">
                <i class="fas fa-shopping-cart"></i>
                <span>Pesanan</span>
                <span class="badge warning">{{ $pendingOrders }}</span>
            </a>

            <a href="{{ route('customers.index') }}">
                <i class="fas fa-users"></i>
                <span>Pelanggan</span>
                <span class="badge">{{ $totalCustomers }}</span>
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

            <a href="#">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
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
                    <h2>Dashboard</h2>
                    <p>Selamat datang di Admin Panel Warung Nasi Kuning Ibu Opik</p>
                </div>
            </div>
            <div class="actions">
                <div class="search">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Cari...">
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
                    <h2>Selamat Pagi, Admin! 👋</h2>
                    <p>Berikut adalah ringkasan performa Warung Ibu Opik hari ini.</p>
                </div>
                <div class="greeting-date">
                    <i class="fas fa-calendar-alt"></i>
                    <span id="currentDate"></span>
                </div>
            </div>

            <!-- ============================================ -->
            <!-- STATS CARDS -->
            <!-- ============================================ -->
            <div class="stats-grid">

                <!-- Total Pesanan -->
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="label">Total Pesanan</span>
                        <div class="icon blue">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $totalOrders }}</div>
                    <div class="stat-change up">
                        <i class="fas fa-arrow-up"></i>
                        {{ $orderGrowth ?? 0 }}% dari bulan lalu
                    </div>
                </div>

                <!-- Menunggu -->
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="label">Menunggu Konfirmasi</span>
                        <div class="icon yellow">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $waitingOrders }}</div>
                    <div class="stat-change warning">
                        <i class="fas fa-hourglass-half"></i>
                        Perlu ditindaklanjuti
                    </div>
                </div>

                <!-- Diproses -->
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="label">Sedang Diproses</span>
                        <div class="icon purple">
                            <i class="fas fa-spinner"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $processOrders }}</div>
                    <div class="stat-change info">
                        <i class="fas fa-cog fa-spin"></i>
                        Dalam pengerjaan
                    </div>
                </div>

                <!-- Selesai -->
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="label">Pesanan Selesai</span>
                        <div class="icon green">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $completedOrders }}</div>
                    <div class="stat-change up">
                        <i class="fas fa-arrow-up"></i>
                        {{ $completedGrowth ?? 0 }}% bulan ini
                    </div>
                </div>

                <!-- Pendapatan -->
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="label">Pendapatan Bulan Ini</span>
                        <div class="icon gold">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>
                    <div class="stat-value">Rp {{ number_format($monthlyRevenue, 0, ',', '.') }}</div>
                    <div class="stat-change up">
                        <i class="fas fa-arrow-up"></i>
                        {{ $revenueGrowth ?? 0 }}% dari bulan lalu
                    </div>
                </div>

            </div>

            <!-- ============================================ -->
            <!-- CHARTS & ACTIVITY -->
            <!-- ============================================ -->
            <div class="grid-2">

                <!-- Chart Pendapatan -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-chart-bar" style="color: var(--gold);"></i>
                            Grafik Pendapatan
                        </h3>
                        <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                            <button class="btn btn-primary btn-sm chart-btn" data-period="week">Minggu</button>
                            <button class="btn btn-outline btn-sm chart-btn" data-period="month">Bulan</button>
                            <button class="btn btn-outline btn-sm chart-btn" data-period="year">Tahun</button>
                        </div>
                    </div>
                    <div class="chart-container" style="height:320px;">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                <!-- Aktivitas Terbaru -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-bolt" style="color: var(--gold);"></i>
                            Aktivitas Terbaru
                        </h3>
                        <a href="#" class="link">Lihat Semua</a>
                    </div>
                    <div class="activity-list">
                        @if(isset($recentActivities) && count($recentActivities) > 0)
                            @foreach($recentActivities as $activity)
                            <div class="activity-item">
                                <div class="dot {{ $activity['type'] ?? 'gold' }}"></div>
                                <div class="content">
                                    <p>{{ $activity['message'] }}</p>
                                    <span class="time">{{ $activity['time'] }}</span>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="activity-item">
                                <div class="dot gold"></div>
                                <div class="content">
                                    <p>Belum ada aktivitas terbaru</p>
                                    <span class="time">-</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <!-- ============================================ -->
            <!-- PESANAN TERBARU -->
            <!-- ============================================ -->
            <div class="card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-list" style="color: var(--gold);"></i>
                        Pesanan Terbaru
                    </h3>
                    <a href="{{ route('orders.index') }}" class="link">Lihat Semua</a>
                </div>
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>ID Pesanan</th>
                                <th>Pelanggan</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th style="text-align: right;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($recentOrders) && count($recentOrders) > 0)
                                @foreach($latestOrders as $order)
                                <tr>
                                    <td><strong>#{{ $order->id }}</strong></td>
                                    <td>
                                        <div class="user-cell">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($order->customer_name) }}&background=d4a843&color=000&size=30" alt="">
                                            <span>{{ $order->customer_name }}</span>
                                        </div>
                                    </td>
                                    <td><strong>Rp {{ number_format($order->total, 0, ',', '.') }}</strong></td>
                                    <td>
                                        @php
                                            $statusMap = [
                                                'waiting' => 'badge-warning',
                                                'process' => 'badge-info',
                                                'completed' => 'badge-success',
                                                'cancelled' => 'badge-danger'
                                            ];
                                            $statusLabel = [
                                                'waiting' => 'Menunggu',
                                                'process' => 'Diproses',
                                                'completed' => 'Selesai',
                                                'cancelled' => 'Dibatalkan'
                                            ];
                                        @endphp
                                        <span class="badge {{ $statusMap[$order->status] ?? 'badge-warning' }}">
                                            {{ $statusLabel[$order->status] ?? $order->status }}
                                        </span>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($order->created_at->format('d M Y'))->format('d M Y') }}</td>
                                    <td style="text-align: right;">
                                        <button
                                            class="btn btn-outline btn-sm btn-detail"
                                            data-id="{{ $order->id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" style="text-align: center; padding: 40px 20px; color: var(--text-muted);">
                                        <i class="fas fa-inbox" style="font-size: 36px; display: block; margin-bottom: 12px;"></i>
                                        Belum ada pesanan terbaru
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </main>

    <!-- ============================================ -->
    <!-- MODAL DETAIL PESANAN -->
    <!-- ============================================ -->
    <div id="orderModal"
        class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">

        <div class="modal-order-container">

            <div class="modal-order-header">
                <h2 class="modal-order-title">
                    <i class="fas fa-receipt"></i>
                    Detail Pesanan
                </h2>
                <button id="closeModal" class="modal-order-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div id="modalContent" class="modal-order-body">
                <div class="modal-loading">
                    <i class="fas fa-spinner fa-spin"></i>
                    <span>Memuat data...</span>
                </div>
            </div>

        </div>

    </div>

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
            document.getElementById('date').textContent = dayName + ', ' + date + ' ' + month + ' ' + year;
            document.getElementById('currentDate').textContent = dayName + ', ' + date + ' ' + month + ' ' + year;
        }
        updateClock();
        setInterval(updateClock, 1000);

        // ---------- RUN ON LOAD ----------
        document.addEventListener('DOMContentLoaded', function() {
            animateChart();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assets/js/admin-script.js') }}"></script>

    <script>
    const ctx = document.getElementById('revenueChart');

    if (ctx) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($chartLabels),
                datasets: [{
                    label: 'Pendapatan',
                    data: @json($chartData),
                    borderWidth: 1,
                    borderRadius: 8,
                    backgroundColor: '#d4a843'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,

                plugins: {
                    legend: {
                        display: false
                    }
                },

                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                }
            }
        });
    }
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const modal = document.getElementById('orderModal');
    const content = document.getElementById('modalContent');
    const close = document.getElementById('closeModal');

    document.querySelectorAll('.btn-detail').forEach(btn => {

        btn.addEventListener('click', async function () {

            const id = this.dataset.id;

            modal.classList.remove('hidden');
            modal.classList.add('flex');

            content.innerHTML = `
                <div class="text-center py-10">
                    Tunggu rek...
                </div>
            `;

            const response = await fetch(`/admin/orders/${id}/modal`);
            const html = await response.text();

            content.innerHTML = html;

        });

    });

    close.addEventListener('click', () => {

        modal.classList.remove('flex');
        modal.classList.add('hidden');

    });

    modal.addEventListener('click', function(e){

        if(e.target === modal){

            modal.classList.remove('flex');
            modal.classList.add('hidden');

        }

    });

});
</script>

        <!-- ==========================
            MODAL DETAIL PESANAN
        ========================== -->

        <div id="orderModal"
            style="display:none;
                    position:fixed;
                    inset:0;
                    background:rgba(0,0,0,.6);
                    z-index:9999;
                    align-items:center;
                    justify-content:center;">

            <div style="
                width:700px;
                max-width:95%;
                background:#1b1b1b;
                color:black;
                border-radius:12px;
                overflow:hidden;
            ">

                <div style="
                    padding:20px;
                    display:flex;
                    justify-content:space-between;
                    align-items:center;
                    border-bottom:1px solid #333;
                ">

                    <h3>📋 Detail Pesanan</h3>

                    <button id="closeModal"
                            style="
                                background:none;
                                border:none;
                                color:black;
                                font-size:22px;
                                cursor:pointer;">
                        ✕
                    </button>

                </div>

                <div id="modalContent"
                    style="padding:25px;">

                    Loading...

                </div>

            </div>

        </div>
</body>
</html>