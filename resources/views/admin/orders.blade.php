<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan - Admin Ibu Opik</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Forum&family=DM+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/admin-style.css') }}">
</head>

<body>

    <!-- SIDEBAR -->
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
            <img src="https://ui-avatars.com/api/?name=Admin&background=d4a843&color=000&size=40">

            <div>
                <div class="name">Admin Ibu Opik</div>
                <div class="role">Super Admin</div>
            </div>
        </div>

        <nav class="sidebar-nav">

            <div class="nav-label">Main Menu</div>

            <a href="{{ route('menu.index') }}">
                <i class="fas fa-utensils"></i>
                <span>Menu</span>
            </a>

            <a href="{{ route('orders.index') }}" class="active">
                <i class="fas fa-shopping-cart"></i>
                <span>Pesanan</span>

                <span class="badge gold">
                    {{ $orders->count() }}
                </span>
            </a>

            <div class="nav-label" style="margin-top:24px;">
                Settings
            </div>

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

    <div class="sidebar-overlay"></div>

    <main class="main-content">

        <header class="topbar">

            <div class="page-title">

                <button class="hamburger">
                    <i class="fas fa-bars"></i>
                </button>

                <div>

                    <h2>Manajemen Pesanan</h2>

                    <p>Kelola semua pesanan pelanggan</p>

                </div>

            </div>

        </header>

        <div class="content">

            <div class="card">

                <div class="card-header">

                    <h3>Daftar Pesanan</h3>

                </div>

                <div class="card-body">

                    <p style="margin-bottom:20px;">
    Total Pesanan :
    <strong>{{ $orders->count() }}</strong>
</p>

<table style="width:100%; border-collapse:collapse;">

    <thead>

        <tr style="background:#f5f5f5;">

            <th style="padding:12px;">ID</th>

            <th>Nama</th>

            <th>No HP</th>

            <th>Total</th>

            <th>Status</th>

            <th>Aksi</th>

        </tr>

    </thead>

    <tbody>

        @forelse($orders as $order)

        <tr style="text-align:center; border-top:1px solid #ddd;">

            <td>#{{ $order->id }}</td>

            <td>{{ $order->customer_name }}</td>

            <td>{{ $order->phone }}</td>

            <td>
                Rp {{ number_format($order->total,0,',','.') }}
            </td>

            <td>

                <span class="badge badge-warning">

                    {{ ucfirst($order->status) }}

                </span>

            </td>

            <td>

                <a href="#"
                   class="btn btn-outline btn-sm">

                    Detail

                </a>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="6">

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

    <script src="{{ asset('assets/js/admin-script.js') }}"></script>

</body>

</html>
