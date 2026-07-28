<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelanggan - Admin Ibu Opik</title>

    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin-style.css') }}">
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
                <span class="badge gold">{{ $totalMenus }}</span>
            </a>

            <a href="{{ route('orders.index') }}">
                <i class="fas fa-shopping-cart"></i>
                <span>Pesanan</span>
                <span class="badge warning">{{ $pendingOrders }}</span>
            </a>

            <a href="{{ route('customers.index') }}" class="active">
                <i class="fas fa-users"></i>
                <span>Pelanggan</span>
                <span class="badge">{{ $totalCustomers}}</span>
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
                    <h2>Data Pelanggan</h2>
                    <p>Daftar pelanggan yang pernah melakukan pemesanan di Warung Ibu Opik</p>
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
                    <h2>👥 Manajemen Pelanggan</h2>
                    <p>Kelola dan pantau data pelanggan setia Warung Ibu Opik</p>
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

                <div class="stat-card">
                    <div class="stat-header">
                        <span class="label">Total Pelanggan</span>
                        <div class="icon gold">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $customers->count() }}</div>
                    <div class="stat-change up">
                        <i class="fas fa-arrow-up"></i>
                        {{ $newCustomersThisMonth ?? 0 }} pelanggan baru bulan ini
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <span class="label">Total Pesanan</span>
                        <div class="icon blue">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $customers->sum('total_orders') }}</div>
                    <div class="stat-change up">
                        <i class="fas fa-arrow-up"></i>
                        {{ $ordersGrowth ?? 0 }}% dari bulan lalu
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <span class="label">Total Pendapatan</span>
                        <div class="icon green">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>
                    <div class="stat-value">Rp {{ number_format($customers->sum('total_spent'), 0, ',', '.') }}</div>
                    <div class="stat-change up">
                        <i class="fas fa-arrow-up"></i>
                        {{ $revenueGrowth ?? 0 }}% dari bulan lalu
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <span class="label">Pelanggan Aktif</span>
                        <div class="icon purple">
                            <i class="fas fa-user-check"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $activeCustomers ?? 0 }}</div>
                    <div class="stat-change info">
                        <i class="fas fa-clock"></i>
                        Aktif 30 hari terakhir
                    </div>
                </div>

            </div>

            <!-- ============================================ -->
            <!-- CUSTOMERS TABLE -->
            <!-- ============================================ -->
            <div class="card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-list" style="color: var(--gold);"></i>
                        Daftar Pelanggan
                    </h3>
                    <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                        <button class="btn btn-outline btn-sm" onclick="exportData()">
                            <i class="fas fa-download"></i> Export
                        </button>
                        <button class="btn btn-outline btn-sm" onclick="window.print()">
                            <i class="fas fa-print"></i> Print
                        </button>
                    </div>
                </div>

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
                                <th style="text-align: right;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="customerTableBody">
                            @forelse($customers as $index => $customer)
                            <tr class="customer-row" data-id="{{ $customer->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="user-cell">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($customer->customer_name) }}&background=d4a843&color=000&size=30" alt="{{ $customer->customer_name }}">
                                        <span>{{ $customer->customer_name }}</span>
                                    </div>
                                </td>
                                <td>{{ $customer->phone }}</td>
                                <td class="text-center">
                                    <span class="order-count">{{ $customer->total_orders }}</span>
                                </td>
                                <td class="text-center">
                                    <strong class="total-spent">Rp {{ number_format($customer->total_spent, 0, ',', '.') }}</strong>
                                </td>
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($customer->last_order)->format('d M Y') }}
                                </td>
                                <td class="text-center">
                                    @php
                                        $status = 'active';
                                        $statusLabel = 'Aktif';
                                        $statusClass = 'badge-success';
                                        
                                        if ($customer->total_orders == 0) {
                                            $status = 'inactive';
                                            $statusLabel = 'Tidak Aktif';
                                            $statusClass = 'badge-danger';
                                        } elseif ($customer->total_orders < 3) {
                                            $status = 'new';
                                            $statusLabel = 'Baru';
                                            $statusClass = 'badge-info';
                                        }
                                    @endphp
                                    <span class="badge {{ $statusClass }}">
                                        {{ $statusLabel }}
                                    </span>
                                </td>
                                <td style="text-align: right;">
                                    <button class="btn btn-outline btn-sm view-customer" data-id="{{ $customer->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline btn-sm edit-customer" data-id="{{ $customer->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm delete-customer" data-id="{{ $customer->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" style="text-align: center; padding: 60px 20px;">
                                    <i class="fas fa-users" style="font-size: 48px; color: var(--text-muted); display: block; margin-bottom: 12px;"></i>
                                    <p style="color: var(--text-secondary); font-size: 16px;">Belum ada pelanggan</p>
                                    <p style="color: var(--text-muted); font-size: 13px; margin-top: 4px;">Pelanggan akan muncul setelah melakukan pemesanan</p>
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
        <div class="modal-content modal-detail">
            <div class="modal-header">
                <h2>
                    <i class="fas fa-user" style="color: var(--gold);"></i>
                    Detail Pelanggan
                </h2>
                <button class="modal-close" id="closeDetailModal">&times;</button>
            </div>
            <div class="modal-body" id="detailBody">
                <div class="detail-loading">
                    <i class="fas fa-spinner fa-spin"></i>
                    <p>Memuat data...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================ -->
    <!-- MODAL EDIT PELANGGAN -->
    <!-- ============================================ -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>
                    <i class="fas fa-edit" style="color: var(--gold);"></i>
                    Edit Pelanggan
                </h2>
                <button class="modal-close" id="closeEditModal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editId" name="id">

                    <div class="form-group">
                        <label for="editName">Nama <span class="required">*</span></label>
                        <input type="text" id="editName" name="customer_name" placeholder="Masukkan nama" required>
                    </div>

                    <div class="form-group">
                        <label for="editPhone">No HP <span class="required">*</span></label>
                        <input type="tel" id="editPhone" name="phone" placeholder="Masukkan nomor HP" required>
                    </div>

                    <div class="modal-actions">
                        <button type="button" class="btn btn-outline" id="cancelEditModal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="editSubmitBtn">
                            <i class="fas fa-save"></i> Update Pelanggan
                        </button>
                    </div>
                </form>
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

        // ---------- SEARCH ----------
        const searchInput = document.getElementById('customerSearch');
        const rows = document.querySelectorAll('.customer-row');
        const countEl = document.getElementById('customerCount');

        if (searchInput) {
            searchInput.addEventListener('keyup', function() {
                const query = this.value.toLowerCase().trim();
                let visibleCount = 0;

                rows.forEach(function(row) {
                    const text = row.textContent.toLowerCase();
                    const isVisible = text.includes(query);
                    row.style.display = isVisible ? '' : 'none';
                    if (isVisible) visibleCount++;
                });

                if (countEl) countEl.textContent = visibleCount;
            });
        }

        // ---------- EXPORT DATA ----------
        window.exportData = function() {
            const rows = document.querySelectorAll('.customer-row');
            let csv = 'No,Nama,No HP,Total Order,Total Belanja,Order Terakhir,Status\n';

            rows.forEach(function(row) {
                const cells = row.querySelectorAll('td');
                const no = cells[0]?.textContent?.trim() || '';
                const name = cells[1]?.querySelector('span')?.textContent || '';
                const phone = cells[2]?.textContent || '';
                const orders = cells[3]?.textContent?.trim() || '';
                const spent = cells[4]?.textContent?.trim() || '';
                const lastOrder = cells[5]?.textContent?.trim() || '';
                const status = cells[6]?.querySelector('.badge')?.textContent || '';

                csv += `"${no}","${name}","${phone}","${orders}","${spent}","${lastOrder}","${status}"\n`;
            });

            const blob = new Blob([csv], { type: 'text/csv' });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `pelanggan-${new Date().toISOString().split('T')[0]}.csv`;
            a.click();
            window.URL.revokeObjectURL(url);
        };
    </script>

    <script src="{{ asset('assets/js/admin-script.js') }}"></script>
    <script src="{{ asset('assets/js/customers.js') }}"></script>

</body>
</html>