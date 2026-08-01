<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi - Admin Ibu Opik</title>

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
                <span class="badge gold">{{ $totalMenus ?? 0 }}</span>
            </a>

            <a href="{{ route('orders.index') }}">
                <i class="fas fa-shopping-cart"></i>
                <span>Pesanan</span>
                <span class="badge warning">{{ $pendingOrders ?? 0 }}</span>
            </a>

            <a href="{{ route('customers.index') }}">
                <i class="fas fa-users"></i>
                <span>Pelanggan</span>
                <span class="badge">{{ $totalCustomers ?? 0 }}</span>
            </a>

            <a href="{{ route('reservations.index') }}" class="active">
                <i class="fas fa-calendar-check"></i>
                <span>Reservasi</span>
                <span class="badge warning">
                    {{ $reservations->where('status', 'Menunggu')->count() }}
                </span>
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
                    <h2>Manajemen Reservasi</h2>
                    <p>Kelola semua reservasi pelanggan Warung Ibu Opik</p>
                </div>
            </div>

        </header>

        <!-- ============================================ -->
        <!-- CONTENT -->
        <!-- ============================================ -->
        <div class="content">

            <div class="card">

                <div class="card-header">
                    <h3>Daftar Reservasi</h3>
                </div>

                <div class="card-body">

                    <p style="margin-bottom: 20px;">
                        Total Reservasi :
                        <strong>{{ $reservations->count() }}</strong>
                    </p>

                    <table style="width: 100%; border-collapse: collapse;">

                        <thead>
                            <tr style="background: #f5f5f5;">
                                <th style="padding: 12px;">No</th>
                                <th>Nama</th>
                                <th>No HP</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Orang</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($reservations as $index => $reservation)

                            <tr style="text-align: center; border-top: 1px solid #ddd;">

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $reservation->name }}</td>

                                <td>{{ $reservation->phone }}</td>

                                <td>{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d M Y') }}</td>

                                <td>{{ $reservation->reservation_time }}</td>

                                <td>{{ $reservation->person }} org</td>

                                <td>
                                    @php
                                        $statusMap = [
                                        'Menunggu' => [
                                            'class' => 'badge-warning',
                                            'label' => 'Menunggu'
                                        ],

                                        'Diterima' => [
                                            'class' => 'badge-info',
                                            'label' => 'Diterima'
                                        ],

                                        'Selesai' => [
                                            'class' => 'badge-success',
                                            'label' => 'Selesai'
                                        ],

                                        'Ditolak' => [
                                            'class' => 'badge-danger',
                                            'label' => 'Ditolak'
                                        ]
                                    ];
                                        $status = $statusMap[$reservation->status] ?? $statusMap['Menunggu'];
                                    @endphp
                                    <span class="badge {{ $status['class'] }}">
                                        {{ $status['label'] }}
                                    </span>
                                </td>

                                <td class="flex items-center gap-2">

                                    <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-primary btn-sm">
                                        Detail
                                    </a>

                                    @if($reservation->status != 'Selesai')

                                    <form action="{{ route('reservations.status', $reservation->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <button type="submit" class="btn btn-success btn-sm">
                                            {{ $reservation->status == 'Menunggu' ? 'Terima' : 'Selesaikan' }}
                                        </button>
                                    </form>

                                    @endif

                                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus reservasi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition text-xl" title="Hapus Reservasi">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </td>

                            </tr>

                            @empty

                            <tr>
                                <td colspan="8" style="text-align: center; padding: 20px;">
                                    Belum ada reservasi.
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