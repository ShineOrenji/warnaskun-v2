<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan - Admin Ibu Opik</title>

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
            <img src="{{ asset('assets/images/logo.png') }}" alt="Warung Ibu Opik">
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
                @if(isset($totalMenus) && $totalMenus > 0)
                    <span class="badge gold">{{ $totalMenus }}</span>
                @endif
            </a>

            <a href="{{ route('orders.index') }}">
                <i class="fas fa-shopping-cart"></i>
                <span>Pesanan</span>
                @if(isset($pendingOrders) && $pendingOrders > 0)
                    <span class="badge warning">{{ $pendingOrders }}</span>
                @endif
            </a>

            <a href="{{ route('admin.ready_orders') }}">
                <i class="fas fa-motorcycle"></i>
                <span>Antrean Kurir</span>
            </a>

            <a href="{{ route('customers.index') }}">
                <i class="fas fa-users"></i>
                <span>Pelanggan</span>
            </a>

            <a href="{{ route('reservations.index') }}">
                <i class="fas fa-calendar-check"></i>
                <span>Reservasi</span>
            </a>

            <div class="nav-label" style="margin-top: 24px;">Settings</div>

            <a href="{{ route('admin.settings') }}" class="active">
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
                    <h2>Pengaturan Sistem</h2>
                    <p>Kelola data akun admin dan konfigurasi web</p>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <div class="content">

            @if(session('success'))
            <div style="background: rgba(34, 197, 94, 0.1); border-left: 4px solid #22c55e; color: #166534; padding: 16px 20px; border-radius: 8px; margin-bottom: 24px; display: flex; align-items: center; gap: 12px; font-weight: 500;">
                <i class="fas fa-check-circle" style="font-size: 20px; color: #22c55e;"></i>
                {{ session('success') }}
            </div>
            @endif

            <div class="card" style="max-width: 900px; margin: 0 auto;">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-cog" style="color: var(--gold);"></i>
                        Konfigurasi Website & Akun Admin
                    </h3>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                            
                            <!-- Bagian Akun Admin -->
                            <div style="background: var(--bg-primary); padding: 20px; border-radius: 8px; border: 1px solid var(--border-color);">
                                <h4 style="margin-bottom: 15px; color: var(--gold); border-bottom: 1px solid var(--border-color); padding-bottom: 10px; font-size: 16px;">
                                    <i class="fas fa-user-shield" style="margin-right: 6px;"></i> Akun Admin
                                </h4>
                                
                                <div style="margin-bottom: 15px;">
                                    <label style="display: block; font-size: 13px; color: var(--text-secondary); margin-bottom: 6px;">Nama Admin</label>
                                    <input type="text" name="name" value="{{ auth()->user()->name }}" required style="width: 100%; background: var(--bg-card); color: var(--text-primary); border: 1px solid var(--border-color); padding: 10px 14px; border-radius: 8px; outline: none;">
                                </div>
                                
                                <div style="margin-bottom: 15px;">
                                    <label style="display: block; font-size: 13px; color: var(--text-secondary); margin-bottom: 6px;">No WhatsApp / Email</label>
                                    <input type="text" name="login_id" value="{{ auth()->user()->phone ?? auth()->user()->email }}" required style="width: 100%; background: var(--bg-card); color: var(--text-primary); border: 1px solid var(--border-color); padding: 10px 14px; border-radius: 8px; outline: none;">
                                </div>
                                
                                <div style="margin-bottom: 10px;">
                                    <label style="display: block; font-size: 13px; color: var(--text-secondary); margin-bottom: 6px;">Password Baru (Kosongkan jika tidak diubah)</label>
                                    <input type="password" name="password" placeholder="••••••••" style="width: 100%; background: var(--bg-card); color: var(--text-primary); border: 1px solid var(--border-color); padding: 10px 14px; border-radius: 8px; outline: none;">
                                </div>
                            </div>

                            <!-- Bagian Tampilan Web -->
                            <div style="background: var(--bg-primary); padding: 20px; border-radius: 8px; border: 1px solid var(--border-color);">
                                <h4 style="margin-bottom: 15px; color: var(--gold); border-bottom: 1px solid var(--border-color); padding-bottom: 10px; font-size: 16px;">
                                    <i class="fas fa-globe" style="margin-right: 6px;"></i> Tampilan Web
                                </h4>
                                
                                <div style="margin-bottom: 15px;">
                                    <label style="display: block; font-size: 13px; color: var(--text-secondary); margin-bottom: 6px;">Nama Alat / Judul Web</label>
                                    <input type="text" name="app_name" value="Warung Nasi Kuning Ibu Opik" style="width: 100%; background: var(--bg-card); color: var(--text-primary); border: 1px solid var(--border-color); padding: 10px 14px; border-radius: 8px; outline: none;">
                                </div>
                                
                                <div style="margin-bottom: 10px;">
                                    <label style="display: block; font-size: 13px; color: var(--text-secondary); margin-bottom: 6px;">Ganti Logo Web (PNG/JPG)</label>
                                    <input type="file" name="logo" accept="image/*" style="width: 100%; background: var(--bg-card); color: var(--text-secondary); border: 1px solid var(--border-color); padding: 8px; border-radius: 8px; outline: none; font-size: 12px;">
                                    <div style="margin-top: 10px;">
                                        <span style="font-size: 11px; color: var(--text-muted); display: block; margin-bottom: 4px;">Logo Saat Ini:</span>
                                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height: 35px; background: #222; padding: 4px 8px; border-radius: 4px;">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 12px; justify-content: center; font-size: 15px;">
                            <i class="fas fa-save" style="margin-right: 6px;"></i> Simpan Perubahan Pengaturan
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </main>

    <!-- Admin JS -->
    <script src="{{ asset('assets/js/admin-script.js') }}"></script>
</body>
</html>