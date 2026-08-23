<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Pelanggan - Warung Nasi Kuning Ibu Opik</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        /* ========== RESET BODY ========== */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            overflow: auto !important;
            height: auto !important;
            min-height: 100vh;
            background: var(--eerie-black-1);
            padding-top: 0 !important;
            margin: 0 !important;
        }

        /* ========== HEADER FIX ========== */
        .header {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            width: 100% !important;
            z-index: 100 !important;
            background-color: var(--eerie-black-4) !important;
            padding-block: 15px !important;
            border-bottom: 1px solid rgba(255,255,255,0.08) !important;
            min-height: 65px !important;
        }

        .header .container {
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            gap: 8px !important;
            padding-inline: 20px !important;
        }

        /* ========== KONTEN ========== */
        .guide-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 120px 20px 60px;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .header { padding-block: 10px !important; min-height: 58px !important; }
            .header .container { padding-inline: 12px !important; }
            .guide-container { padding: 120px 12px 40px; }
        }

        @media (max-width: 480px) {
            .header { padding-block: 8px !important; min-height: 52px !important; }
            .header .container { padding-inline: 10px !important; }
            .guide-container { padding: 120px 10px 30px; }
        }

        /* ========== STYLE GUIDE LAINNYA ========== */
        .guide-header {
            text-align: center;
            padding: 30px 20px;
            margin-bottom: 40px;
            background: #1a1a1a;
            border-radius: 16px;
            border: 1px solid #2a2a2a;
        }

        .guide-header .icon-wrap {
            width: 80px;
            height: 80px;
            background: rgba(255, 204, 0, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            border: 2px solid var(--gold-crayola);
        }

        .guide-header .icon-wrap i {
            font-size: 36px;
            color: var(--gold-crayola);
        }

        .guide-header h1 {
            font-family: 'Forum', cursive;
            font-size: 3.2rem;
            color: #fff;
            margin-bottom: 8px;
        }

        .guide-header p {
            font-size: 1.6rem;
            color: var(--quick-silver);
            max-width: 600px;
            margin: 0 auto;
        }

        .guide-section {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 12px;
            padding: 20px 24px;
            margin-bottom: 16px;
            transition: all 0.3s ease;
        }

        .guide-section:hover {
            border-color: var(--gold-crayola);
        }

        .guide-section .section-header {
            display: flex;
            align-items: center;
            gap: 14px;
            cursor: pointer;
            user-select: none;
        }

        .guide-section .section-header .num {
            width: 32px;
            height: 32px;
            background: rgba(255, 204, 0, 0.1);
            color: var(--gold-crayola);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.3rem;
            flex-shrink: 0;
            border: 1px solid var(--gold-crayola);
        }

        .guide-section .section-header h2 {
            font-size: 1.6rem;
            font-weight: 600;
            color: #fff;
        }

        .guide-section .section-header i {
            color: var(--gold-crayola);
            font-size: 1.4rem;
            transition: all 0.3s ease;
            margin-left: auto;
        }

        .guide-section .section-header i.rotate {
            transform: rotate(180deg);
        }

        .guide-section .section-body {
            display: none;
            padding-top: 16px;
            padding-left: 46px;
            color: var(--quick-silver);
            font-size: 1.5rem;
            line-height: 1.8;
        }

        .guide-section .section-body.open {
            display: block;
        }

        .guide-section .section-body ol {
            padding-left: 20px;
            margin: 10px 0;
        }

        .guide-section .section-body ol li {
            padding: 6px 0;
            border-bottom: 1px solid rgba(255,255,255,0.04);
        }

        .guide-section .section-body ol li:last-child {
            border-bottom: none;
        }

        .guide-section .section-body ol li::marker {
            color: var(--gold-crayola);
            font-weight: 700;
        }

        .guide-section .section-body .step-card {
            background: #0d0d0d;
            border: 1px solid #2a2a2a;
            border-radius: 8px;
            padding: 14px 18px;
            margin: 12px 0;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .guide-section .section-body .step-card .step-icon {
            font-size: 2rem;
            flex-shrink: 0;
        }

        .guide-section .section-body .step-card .step-text {
            color: #fff;
            font-weight: 500;
        }

        .guide-section .section-body .step-card .step-desc {
            color: var(--quick-silver);
            font-size: 1.3rem;
            margin-left: auto;
        }

        .badge-guide {
            padding: 2px 12px;
            border-radius: 20px;
            font-size: 1.1rem;
            font-weight: 600;
            display: inline-block;
        }

        .badge-guide.gold {
            background: rgba(255, 204, 0, 0.15);
            color: var(--gold-crayola);
        }

        .badge-guide.green {
            background: rgba(34, 197, 94, 0.15);
            color: #22c55e;
        }

        .badge-guide.blue {
            background: rgba(59, 130, 246, 0.15);
            color: #3b82f6;
        }

        .btn-guide {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 28px;
            background: var(--gold-crayola);
            color: #000;
            border: none;
            border-radius: 8px;
            font-size: 1.4rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-guide:hover {
            background: #e6b800;
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(255,204,0,0.3);
        }

        .guide-footer {
            text-align: center;
            padding: 30px 20px 10px;
            border-top: 1px solid #2a2a2a;
            margin-top: 10px;
        }

        .guide-footer p {
            color: #6b6b6b;
            font-size: 1.3rem;
        }

        .guide-footer a {
            color: var(--gold-crayola);
            text-decoration: none;
        }

        /* ========== MODAL STYLE ========== */
        .auth-modal-overlay { 
            position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
            background: rgba(0,0,0,0.85); backdrop-filter: blur(5px); 
            display: none; align-items: center; justify-content: center; 
            z-index: 999999; opacity: 0; transition: opacity 0.3s ease; 
        }
        .auth-modal-overlay.show { display: flex; opacity: 1; }
        .auth-modal-box { 
            background: #111; border: 1px solid var(--gold-crayola); 
            width: 90%; max-width: 400px; border-radius: 12px; padding: 30px; 
            position: relative; color: #fff; box-shadow: 0 10px 40px rgba(0,0,0,0.5); 
        }
        .auth-close-btn { 
            position: absolute; top: 15px; right: 15px; background: transparent; 
            border: none; color: #fff; font-size: 24px; cursor: pointer; 
        }
        .auth-close-btn:hover { color: #ef4444; }
        .auth-tabs { display: flex; border-bottom: 2px solid #333; margin-bottom: 20px; }
        .auth-tab { 
            flex: 1; text-align: center; padding: 10px; cursor: pointer; 
            font-family: 'Forum', serif; font-size: 20px; color: #888; 
        }
        .auth-tab.active { color: var(--gold-crayola); border-bottom: 2px solid var(--gold-crayola); }
        .auth-form { display: none; }
        .auth-form.active { display: block; }
        .auth-input-group { margin-bottom: 18px; text-align: left; }
        .auth-input-group label { display: block; font-size: 13px; margin-bottom: 5px; color: #aaa; }
        .auth-input-group input { 
            width: 100%; padding: 12px 14px; 
            background: #1a1a1a; border: 1.5px solid #333; 
            color: #fff; border-radius: 8px; outline: none; 
            font-size: 14px; 
        }
        .auth-input-group input:focus { border-color: var(--gold-crayola); }
        .auth-submit-btn { 
            width: 100%; padding: 13px; 
            background: var(--gold-crayola); color: #000; font-weight: bold; 
            border: none; border-radius: 8px; cursor: pointer; font-size: 16px; 
        }
        .auth-submit-btn:hover { background: #b8922f; }
        .input-wrapper-relative { position: relative; }
        .toggle-password { 
            position: absolute; right: 14px; top: 50%; transform: translateY(-50%); 
            color: #666; cursor: pointer; 
        }
        .toggle-password:hover { color: var(--gold-crayola); }
        .swipe-item {
            position: relative; overflow: hidden; border-radius: 8px; margin-bottom: 8px;
            background: #ef4444; transition: height 0.25s ease, margin 0.25s ease, opacity 0.25s ease;
        }
        .swipe-item.hidden { height: 0 !important; margin: 0 !important; opacity: 0; overflow: hidden; }
        .swipe-content-wrapper {
            position: relative; z-index: 2; background: #1e1e1e;
            border-left: 3px solid var(--gold-crayola); padding: 12px;
            border-radius: 8px; transform: translateX(0); transition: transform 0.15s ease;
            cursor: grab;
        }
        .swipe-delete-bg {
            position: absolute; right: 0; top: 0; bottom: 0; width: 80px;
            background: #ef4444; display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 20px; border-radius: 0 8px 8px 0; z-index: 1;
            pointer-events: none;
        }
        .swipe-content-wrapper .swipe-hint {
            position: absolute; right: 12px; top: 50%; transform: translateY(-50%);
            font-size: 14px; color: #666; animation: swipeHintAnim 1.5s infinite;
            pointer-events: none;
        }
        @keyframes swipeHintAnim {
            0%,100% { transform: translateY(-50%) translateX(0); opacity: 0.5; }
            50% { transform: translateY(-50%) translateX(-6px); opacity: 1; }
        }
    </style>
</head>
<body>

<!-- ============================================ -->
<!-- HEADER -->
<!-- ============================================ -->
<header class="header" data-header>
    <div class="container">
        <a href="#" class="logo">
            <img src="./assets/images/logo.png" width="160" height="50" alt="Warung Nasi Kuning Ibu Opik">
        </a>

        <nav class="navbar" data-navbar>
            <button class="close-btn" aria-label="tutup menu" data-nav-toggler>
                <ion-icon name="close-outline"></ion-icon>
            </button>
            <a href="#" class="logo mobile-logo">
                <img src="./assets/images/logo.png" width="160" height="50" alt="Warung Nasi Kuning Ibu Opik">
            </a>
            <ul class="navbar-list">
                <li class="navbar-item"><a href="{{ url('/') }}" class="navbar-link hover-underline" data-nav-link><div class="separator"></div><span class="span">Beranda</span></a></li>
                <li class="navbar-item"><a href="{{ url('/') }}#menu" class="navbar-link hover-underline" data-nav-link><div class="separator"></div><span class="span">Menu</span></a></li>
                <li class="navbar-item"><a href="{{ url('/') }}#about" class="navbar-link hover-underline" data-nav-link><div class="separator"></div><span class="span">Tentang Kami</span></a></li>
                <li class="navbar-item"><a href="{{ url('/') }}#reservasi" class="navbar-link hover-underline" data-nav-link><div class="separator"></div><span class="span">Reservasi</span></a></li>
                <li class="navbar-item"><a href="{{ route('customer.guide') }}" class="navbar-link hover-underline active" data-nav-link><div class="separator"></div><span class="span">Panduan</span></a></li>
                <li class="navbar-item"><a href="{{ url('/') }}#contact" class="navbar-link hover-underline" data-nav-link><div class="separator"></div><span class="span">Kontak</span></a></li>
                @guest
                <li class="navbar-item mobile-login-menu" style="margin-top:15px;border-top:1px solid rgba(255,255,255,0.1);padding-top:15px;">
                    <a href="javascript:void(0)" onclick="openAuthModal(); closeNavbar();" class="navbar-link hover-underline" style="color:var(--gold-crayola);">
                        <div class="separator"></div>
                        <span class="span"><i class="fas fa-sign-in-alt" style="margin-right:8px;"></i>Login / Daftar</span>
                    </a>
                </li>
                @endguest
            </ul>
            <div class="text-center">
                <p class="headline-1 navbar-title">Kunjungi Kami</p>
                <address class="body-4">Kp. Cimuntuk RT 01/01, Jl. Raya Sukatani</address>
                <p class="body-4 navbar-text">Buka: 08.00 - 23.00</p>
                <a href="mailto:fahmirhamadan5@gmail.com" class="body-4 sidebar-link">fahmirhamadan5@gmail.com</a>
                <div class="separator"></div>
                <p class="contact-label">Pemesanan</p>
                <a href="tel:+6285559150809" class="body-1 contact-number hover-underline">+62 855 5915 0809</a>
            </div>
        </nav>

        <style>
            .profile-dropdown { position: relative; display: flex; align-items: center; z-index: 10; }
            .profile-trigger { display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 4px 12px 4px 4px; border-radius: 30px; background: rgba(212,168,67,0.1); border: 1px solid rgba(212,168,67,0.3); }
            .profile-trigger:hover { background: rgba(212,168,67,0.2); }
            .profile-avatar { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; border: 2px solid var(--gold-crayola); }
            .profile-name { color: #fff; font-size: 14px; font-weight: 600; white-space: nowrap; }
            .profile-menu { position: absolute; top: calc(100% + 8px); right: 0; background: #1e1e1e; min-width: 220px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); border: 1px solid rgba(255,255,255,0.1); padding: 10px 0; z-index: 50; opacity: 0; visibility: hidden; transform: translateY(10px); transition: all 0.3s ease; }
            .profile-menu::before { content: ''; position: absolute; top: -8px; left: 0; width: 100%; height: 8px; }
            .profile-dropdown:hover .profile-menu { opacity: 1; visibility: visible; transform: translateY(0); }
            .profile-menu-item { display: flex; align-items: center; gap: 12px; padding: 12px 20px; color: #ccc; text-decoration: none; transition: 0.3s; font-size: 14px; }
            .profile-menu-item:hover { background: rgba(255,255,255,0.05); color: var(--gold-crayola); }
            .profile-menu-item i { width: 20px; text-align: center; }
            .profile-menu-divider { height: 1px; background: rgba(255,255,255,0.1); margin: 8px 0; }
            .btn-logout-dropdown { width: 100%; text-align: left; background: transparent; border: none; color: #ef4444; font-family: inherit; cursor: pointer; }
            .btn-logout-dropdown:hover { background: rgba(239,68,68,0.1); color: #ef4444; }
            .header-action-group { display: flex; align-items: center; gap: 20px; }
            @media (max-width:1199px) { .desktop-login-btn { display: none !important; } .btn-header-pesanan { display: none !important; } .header-action-group { gap: 10px !important; margin-left: auto; margin-right: 15px; } }
            @media (min-width:1200px) { .mobile-login-menu { display: none !important; } .navbar { margin-inline: auto !important; } }
            @media (max-width:768px) { .profile-name, .profile-trigger .fa-chevron-down { display: none; } .profile-trigger { padding: 2px; } .header-action-group { margin-right: 10px; } }
        </style>

        <div class="header-action-group">
            <div class="outer-auth-container" style="display:flex;align-items:center;">
                @auth
                    @php $unread_notifs = \App\Models\UserNotification::where('user_id', auth()->id())->where('is_read', false)->count(); @endphp
                    <div class="profile-dropdown">
                        <div class="profile-trigger">
                            <div style="position:relative;display:inline-block;">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=d4a843&color=000&bold=true" alt="Avatar" class="profile-avatar">
                                @if($unread_notifs > 0)
                                    <span id="badgeNotifHijau" style="position:absolute;top:-4px;right:-4px;background:#22c55e;color:#fff;font-size:10px;font-weight:bold;min-width:18px;height:18px;display:flex;align-items:center;justify-content:center;padding:0 4px;border-radius:10px;border:2px solid #1e1e1e;">{{ $unread_notifs > 99 ? '99+' : $unread_notifs }}</span>
                                @endif
                            </div>
                            <span class="profile-name">{{ explode(' ', Auth::user()->name)[0] }}</span>
                            <i class="fas fa-chevron-down" style="color:var(--gold-crayola);font-size:12px;"></i>
                        </div>
                        <div class="profile-menu">
                            <div style="padding:10px 20px;border-bottom:1px solid rgba(255,255,255,0.1);margin-bottom:8px;">
                                <div style="font-size:12px;color:#888;">Masuk sebagai</div>
                                <div style="font-size:14px;color:#fff;font-weight:600;">{{ Auth::user()->email ?? Auth::user()->phone }}</div>
                            </div>
                            @if(auth()->user()->role == 'customer')
                                <a href="javascript:void(0)" onclick="bukaModalRiwayat()" class="profile-menu-item"><i class="fas fa-history"></i> Riwayat Pesanan</a>
                                <a href="javascript:void(0)" onclick="bukaModalNotif()" class="profile-menu-item"><i class="fas fa-bell"></i> Notifikasi</a>
                            @elseif(auth()->user()->role == 'admin')
                                <a href="{{ route('dashboard.index') }}" class="profile-menu-item"><i class="fas fa-tachometer-alt"></i> Dashboard Admin</a>
                            @endif
                            <div class="profile-menu-divider"></div>
                            <form action="{{ auth()->user()->role == 'admin' ? route('logout') : route('pelanggan.logout') }}" method="POST" style="margin:0;">
                                @csrf
                                <button type="submit" class="profile-menu-item btn-logout-dropdown"><i class="fas fa-sign-out-alt"></i> Keluar</button>
                            </form>
                        </div>
                    </div>
                @else
                    <button onclick="openAuthModal()" class="btn btn-primary desktop-login-btn" style="padding:10px 20px;min-width:max-content;min-height:45px;">
                        <span class="text text-1">Login</span>
                        <span class="text text-2" aria-hidden="true">Login</span>
                    </button>
                @endauth
            </div>
            <a href="{{ route('cart.index') }}" class="btn btn-secondary btn-header-pesanan">
                <span class="text text-1">Pesanan @if($cartCount > 0) ({{ $cartCount }}) @endif</span>
                <span class="text text-2" aria-hidden="true">Pesanan @if($cartCount > 0) ({{ $cartCount }}) @endif</span>
            </a>
        </div>

        <button class="nav-open-btn" aria-label="buka menu" data-nav-toggler>
            <span class="line line-1"></span>
            <span class="line line-2"></span>
            <span class="line line-3"></span>
        </button>
        <div class="overlay" data-nav-toggler data-overlay></div>
    </div>
</header>

<!-- ============================================ -->
<!-- KONTEN PANDUAN -->
<!-- ============================================ -->
<main>
    <div class="guide-container">
        <div class="guide-header">
            <div class="icon-wrap"><i class="fas fa-hands-helping"></i></div>
            <h1>Panduan Pelanggan</h1>
            <p>Panduan lengkap cara memesan di Warung Nasi Kuning Ibu Opik</p>
        </div>

        <!-- SECTION 1 -->
        <div class="guide-section">
            <div class="section-header" onclick="toggleSection(this)">
                <span class="num">1</span>
                <h2>Cara Memesan Menu</h2>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="section-body">
                <p>Ikuti langkah-langkah mudah ini:</p>
                <ol>
                    <li><strong>Pilih Menu</strong> - Cari menu di halaman <a href="{{ url('/') }}#menu" style="color:var(--gold-crayola);">Menu Lezat Kami</a></li>
                    <li><strong>Klik Tombol Pesan</strong> - Tekan tombol <span class="badge-guide gold">Pesan</span></li>
                    <li><strong>Lihat Keranjang</strong> - Klik ikon <span class="badge-guide gold"><i class="fas fa-shopping-cart"></i></span> di pojok kanan bawah</li>
                    <li><strong>Checkout</strong> - Klik tombol <span class="badge-guide gold">Pesanan</span> di navbar</li>
                    <li><strong>Isi Data</strong> - Lengkapi data pemesan dan pilih metode pengiriman</li>
                    <li><strong>Konfirmasi</strong> - Klik <span class="badge-guide green"><i class="fas fa-check-circle"></i> Buat Pesanan</span></li>
                </ol>
            </div>
        </div>

        <!-- SECTION 2 -->
        <div class="guide-section">
            <div class="section-header" onclick="toggleSection(this)">
                <span class="num">2</span>
                <h2>Metode Pengiriman</h2>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="section-body">
                <p>Kami menyediakan dua metode:</p>
                <ol>
                    <li><strong><i class="fas fa-truck" style="color:var(--gold-crayola);"></i> Antar</strong> - Pesanan diantar ke alamat Anda</li>
                    <li><strong><i class="fas fa-store" style="color:var(--gold-crayola);"></i> Ambil Sendiri</strong> - Datang langsung ke warung</li>
                </ol>
            </div>
        </div>

        <!-- SECTION 3 -->
        <div class="guide-section">
            <div class="section-header" onclick="toggleSection(this)">
                <span class="num">3</span>
                <h2>Reservasi Meja</h2>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="section-body">
                <p>Pesan meja untuk datang langsung:</p>
                <ol>
                    <li>Pilih tanggal & jam</li>
                    <li>Isi nama, nomor HP, dan jumlah orang</li>
                    <li>Klik <span class="badge-guide gold"><i class="fas fa-calendar-check"></i> Pesan Meja</span></li>
                </ol>
            </div>
        </div>

        <!-- SECTION 4 -->
        <div class="guide-section">
            <div class="section-header" onclick="toggleSection(this)">
                <span class="num">4</span>
                <h2>Pembayaran</h2>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="section-body">
                <p>Metode pembayaran:</p>
                <ol>
                    <li><strong>Cash</strong> - Bayar langsung</li>
                    <li><strong>E-Wallet</strong> - OVO, DANA, GoPay</li>
                    <li><strong>Transfer Bank</strong> - BCA, Mandiri, BNI</li>
                </ol>
            </div>
        </div>

        <!-- SECTION 5 -->
        <div class="guide-section">
            <div class="section-header" onclick="toggleSection(this)">
                <span class="num">5</span>
                <h2>Hubungi Kami</h2>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="section-body">
                <p><i class="fas fa-phone" style="color:var(--gold-crayola);"></i> <a href="tel:+6285559150809" style="color:var(--gold-crayola);">+62 855 5915 0809</a></p>
                <p><i class="fas fa-envelope" style="color:var(--gold-crayola);"></i> <a href="mailto:fahmirhamadan5@gmail.com" style="color:var(--gold-crayola);">fahmirhamadan5@gmail.com</a></p>
                <p><i class="fas fa-map-marker-alt" style="color:var(--gold-crayola);"></i> Kp. Cimuntuk RT 01/01, Jl. Raya Sukatani</p>
                <a href="{{ url('/') }}#reservasi" class="btn-guide" style="margin-top:16px;"><i class="fas fa-calendar-check"></i> Reservasi Sekarang</a>
            </div>
        </div>

        <!-- SECTION 6 -->
        <div class="guide-section">
            <div class="section-header" onclick="toggleSection(this)">
                <span class="num">6</span>
                <h2>FAQ</h2>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="section-body">
                <ul style="list-style:none;padding:0;">
                    <li style="padding:10px 0;border-bottom:1px solid #2a2a2a;">
                        <strong style="color:#fff;">Apakah ada biaya pengiriman?</strong>
                        <p style="color:var(--quick-silver);font-size:1.3rem;">Tergantung jarak, info saat checkout.</p>
                    </li>
                    <li style="padding:10px 0;border-bottom:1px solid #2a2a2a;">
                        <strong style="color:#fff;">Berapa lama proses pemesanan?</strong>
                        <p style="color:var(--quick-silver);font-size:1.3rem;">15-30 menit tergantung jumlah pesanan.</p>
                    </li>
                    <li style="padding:10px 0;">
                        <strong style="color:#fff;">Bisa request menu khusus?</strong>
                        <p style="color:var(--quick-silver);font-size:1.3rem;">Bisa! Tulis catatan saat checkout.</p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="guide-footer">
            <p><i class="fas fa-utensils" style="color:var(--gold-crayola);"></i> Warung Nasi Kuning Ibu Opik &copy; {{ date('Y') }} - <a href="{{ url('/') }}">Kembali ke Beranda</a></p>
        </div>
    </div>
</main>

<!-- ============================================ -->
<!-- MODAL LOGIN -->
<!-- ============================================ -->
<div id="authModal" class="auth-modal-overlay">
    <div class="auth-modal-box">
        <button class="auth-close-btn" onclick="closeAuthModal()">&times;</button>
        <div class="auth-tabs">
            <div class="auth-tab active" onclick="switchAuthTab('login')">Masuk</div>
            <div class="auth-tab" onclick="switchAuthTab('register')">Daftar</div>
        </div>
        @if($errors->any())
            <div class="auth-alert" style="background:rgba(239,68,68,0.1);color:#ef4444;padding:10px;border-radius:8px;margin-bottom:15px;border:1px solid rgba(239,68,68,0.25);">
                @foreach($errors->all() as $error)<div>- {{ $error }}</div>@endforeach
            </div>
        @endif
        <form id="formLogin" class="auth-form active" action="{{ route('pelanggan.login') }}" method="POST">
            @csrf
            <div class="auth-input-group">
                <label>Email / No WhatsApp</label>
                <input type="text" name="login_id" required placeholder="Masukkan Email atau No HP">
            </div>
            <div class="auth-input-group">
                <label>Password</label>
                <div class="input-wrapper-relative">
                    <input type="password" id="loginPw" name="password" required placeholder="Masukkan password">
                    <i class="fas fa-eye toggle-password" onclick="togglePw('loginPw', this)"></i>
                </div>
            </div>
            <button type="submit" class="auth-submit-btn">Masuk ke Akun</button>
        </form>
        <form id="formRegister" class="auth-form" action="{{ route('pelanggan.register') }}" method="POST">
            @csrf
            <div class="auth-input-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" required placeholder="Contoh: Budi Santoso">
            </div>
            <div class="auth-input-group">
                <label>Email (Opsional)</label>
                <input type="email" name="email" placeholder="budi@gmail.com">
            </div>
            <div class="auth-input-group">
                <label>No WhatsApp</label>
                <input type="tel" name="phone" required placeholder="08xxxxxxxxxx" oninput="this.value=this.value.replace(/[^0-9]/g,'');" minlength="10" maxlength="14">
            </div>
            <div class="auth-input-group">
                <label>Password</label>
                <div class="input-wrapper-relative">
                    <input type="password" id="regPw" name="password" required minlength="6" placeholder="Minimal 6 karakter">
                    <i class="fas fa-eye toggle-password" onclick="togglePw('regPw', this)"></i>
                </div>
            </div>
            <button type="submit" class="auth-submit-btn">Daftar Sekarang</button>
        </form>
    </div>
</div>

<!-- MODAL RIWAYAT -->
<div id="modalListRiwayat" class="auth-modal-overlay">
    <div class="auth-modal-box" style="padding:20px;max-width:450px;text-align:left;">
        <div style="display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid rgba(255,255,255,0.1);padding-bottom:10px;margin-bottom:15px;">
            <h3 style="color:#fff;font-size:16px;font-weight:bold;margin:0;"><i class="fas fa-history" style="color:var(--gold-crayola);margin-right:8px;"></i> Riwayat Pesanan</h3>
            <button class="auth-close-btn" style="position:static;" onclick="tutupModalRiwayat()">&times;</button>
        </div>
        <div id="containerDataRiwayat" style="max-height:380px;overflow-y:auto;padding-right:5px;">
            <div style="text-align:center;padding:30px 0;color:#888;">
                <i class="fas fa-spinner fa-spin" style="font-size:24px;color:var(--gold-crayola);"></i>
                <p style="margin-top:10px;font-size:13px;">Memuat riwayat...</p>
            </div>
        </div>
        <div style="text-align:center;margin-top:15px;border-top:1px solid rgba(255,255,255,0.1);padding-top:15px;">
            <a href="{{ route('customer.orders') }}" style="color:var(--gold-crayola);text-decoration:none;font-size:14px;font-weight:bold;">Lihat Riwayat Lengkap <i class="fas fa-arrow-right" style="margin-left:5px;"></i></a>
        </div>
    </div>
</div>

<!-- MODAL NOTIF -->
<div id="modalListNotif" class="auth-modal-overlay">
    <div class="auth-modal-box" style="padding:20px;max-width:400px;text-align:left;">
        <div style="display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid rgba(255,255,255,0.1);padding-bottom:10px;margin-bottom:15px;">
            <h3 style="color:#fff;font-size:16px;font-weight:bold;margin:0;"><i class="fas fa-bell" style="color:var(--gold-crayola);margin-right:8px;"></i> Notifikasi Saya</h3>
            <button class="auth-close-btn" style="position:static;" onclick="tutupModalNotif()">&times;</button>
        </div>
        <div id="notif-list-container" style="max-height:350px;overflow-y:auto;padding-right:5px;">
            @auth
                @php $semua_notif = \App\Models\UserNotification::where('user_id', auth()->id())->latest()->take(5)->get(); @endphp
                @forelse($semua_notif as $notif)
                    <div id="notif-item-{{ $notif->id }}" class="swipe-item" data-id="{{ $notif->id }}">
                        <div class="swipe-delete-bg"><i class="fas fa-trash-alt"></i></div>
                        <div class="swipe-content-wrapper">
                            <strong style="color:var(--gold-crayola);display:block;font-size:14px;padding-right:25px;">{{ $notif->title }}</strong>
                            <p style="margin:6px 0 0 0;font-size:13px;color:#ccc;line-height:1.5;">{{ $notif->message }}</p>
                            <span style="font-size:11px;color:#888;display:block;margin-top:8px;"><i class="fas fa-clock"></i> {{ $notif->created_at->diffForHumans() }}</span>
                            <div class="swipe-hint"><i class="fas fa-angle-double-left"></i></div>
                        </div>
                    </div>
                @empty
                    <div style="text-align:center;padding:30px 0;">
                        <i class="fas fa-bell-slash" style="color:#444;font-size:32px;margin-bottom:10px;"></i>
                        <p style="color:#888;font-size:13px;">Belum ada notifikasi.</p>
                    </div>
                @endforelse
            @endauth
        </div>
    </div>
</div>

<!-- CONFIRM MODAL -->
<div id="customConfirmModal" class="auth-modal-overlay" style="z-index:9999999;">
    <div class="auth-modal-box" style="max-width:350px;text-align:center;padding:30px 20px;">
        <i class="fas fa-exclamation-triangle" style="font-size:45px;color:#ef4444;margin-bottom:15px;"></i>
        <h3 style="color:#fff;font-size:18px;margin-bottom:10px;">Konfirmasi Hapus</h3>
        <p id="confirmMessage" style="color:#ccc;font-size:14px;margin-bottom:25px;">Apakah kamu yakin ingin menghapus data ini?</p>
        <form id="deleteForm" method="POST" action="">
            @csrf @method('DELETE')
            <div style="display:flex;gap:10px;justify-content:center;">
                <button type="button" onclick="tutupConfirmModal()" style="padding:10px 20px;border-radius:6px;border:1px solid #444;background:transparent;color:#fff;cursor:pointer;">Batal</button>
                <button type="submit" style="padding:10px 20px;border-radius:6px;border:none;background:#ef4444;color:#fff;cursor:pointer;font-weight:bold;">Ya, Hapus</button>
            </div>
        </form>
    </div>
</div>

<!-- ============================================ -->
<!-- FOOTER -->
<!-- ============================================ -->
<footer class="footer section has-bg-image text-center" style="background-image:url('{{ asset('assets/images/footer-bg.png') }}');">
    <div class="container">
        <div class="footer-top grid-list">
            <div class="footer-brand has-before has-after">
                <a href="#" class="logo"><img src="{{ asset('assets/images/logo.png') }}" width="160" height="50" loading="lazy" alt="Warung Nasi Kuning Ibu Opik"></a>
                <address class="body-4">Kp. Cimuntuk RT 01/01, Jl. Raya Sukatani</address>
                <a href="mailto:fahmirhamadan5@gmail.com" class="body-4 contact-link">fahmirhamadan5@gmail.com</a>
                <a href="tel:+6285559150809" class="body-4 contact-link">Pemesanan : +62 855 5915 0809</a>
                <p class="body-4">Buka : 08.00 - 23.00</p>
                <div class="wrapper"><div class="separator"></div><div class="separator"></div><div class="separator"></div></div>
                <p class="title-1">Dapatkan Berita & Penawaran</p>
                <p class="label-1">Berlangganan & Dapatkan <span class="span">Diskon 25%.</span></p>
                <form action="{{ route('subscribe.store') }}" method="POST" class="input-wrapper">
                    @csrf
                    <div class="icon-wrapper">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email_address" placeholder="Email Anda" required autocomplete="off" class="input-field">
                    </div>
                    <button type="submit" class="btn btn-secondary">
                        <span class="text text-1">Berlangganan</span>
                        <span class="text text-2" aria-hidden="true">Berlangganan</span>
                    </button>
                </form>
            </div>
            <ul class="footer-list">
                <li><a href="{{ url('/') }}#home" class="label-2 footer-link hover-underline">Beranda</a></li>
                <li><a href="{{ url('/') }}#menu" class="label-2 footer-link hover-underline">Menu</a></li>
                <li><a href="{{ url('/') }}#about" class="label-2 footer-link hover-underline">Tentang Kami</a></li>
                <li><a href="{{ url('/') }}#contact" class="label-2 footer-link hover-underline">Kontak</a></li>
            </ul>
            <ul class="footer-list">
                <li><a href="https://facebook.com/fhmirmdnn" class="label-2 footer-link hover-underline">Facebook</a></li>
                <li><a href="https://instagram.com/fhmirmdnn" class="label-2 footer-link hover-underline">Instagram</a></li>
                <li><a href="#" class="label-2 footer-link hover-underline">Google Map</a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p class="copyright">&copy; 2025 Warung Nasi Kuning Ibu Opik. All Rights Reserved | Crafted by <a href="https://github.com/ShineOrenji" target="_blank" class="link">ShineOrenji</a></p>
        </div>
    </div>
</footer>

<!-- ============================================ -->
<!-- SCRIPTS -->
<!-- ============================================ -->
<script>
    function toggleSection(header) {
        const body = header.nextElementSibling;
        const icon = header.querySelector('.fa-chevron-down');
        if (body.classList.contains('open')) {
            body.classList.remove('open');
            icon.classList.remove('rotate');
        } else {
            body.classList.add('open');
            icon.classList.add('rotate');
        }
    }

    function closeNavbar() {
        const navbar = document.querySelector('.navbar');
        const overlay = document.querySelector('.overlay');
        if (navbar) navbar.classList.remove('active');
        if (overlay) overlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    function openAuthModal() { document.body.style.overflow = 'hidden'; document.getElementById('authModal').classList.add('show'); }
    function closeAuthModal() { document.body.style.overflow = 'auto'; document.getElementById('authModal').classList.remove('show'); }

    function switchAuthTab(tab) {
        document.querySelectorAll('.auth-tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.auth-form').forEach(f => f.classList.remove('active'));
        if (tab === 'login') {
            document.querySelectorAll('.auth-tab')[0].classList.add('active');
            document.getElementById('formLogin').classList.add('active');
        } else {
            document.querySelectorAll('.auth-tab')[1].classList.add('active');
            document.getElementById('formRegister').classList.add('active');
        }
    }

    function togglePw(inputId, icon) {
        const input = document.getElementById(inputId);
        if (input.type === "password") { input.type = "text"; icon.classList.replace("fa-eye", "fa-eye-slash"); }
        else { input.type = "password"; icon.classList.replace("fa-eye-slash", "fa-eye"); }
    }

    function bukaModalRiwayat() {
        document.body.style.overflow = 'hidden';
        document.getElementById('modalListRiwayat').classList.add('show');
        fetch("{{ route('pelanggan.api.orders') }}")
            .then(res => res.json())
            .then(data => {
                const container = document.getElementById('containerDataRiwayat');
                if (!data || data.length === 0) {
                    container.innerHTML = `<div style="text-align:center;padding:30px 0;"><i class="fas fa-shopping-bag" style="color:#444;font-size:32px;margin-bottom:10px;"></i><p style="color:#888;font-size:13px;">Kamu belum pernah melakukan pesanan.</p></div>`;
                    return;
                }
                let html = '';
                data.forEach(order => {
                    let badgeColor = order.payment_status === 'paid' ? 'rgba(34,197,94,0.2)' : 'rgba(234,179,8,0.2)';
                    let textColor = order.payment_status === 'paid' ? '#22c55e' : '#eab308';
                    let statusText = order.payment_status === 'paid' ? 'LUNAS' : 'PENDING';
                    let itemsListHtml = '';
                    if (order.items && order.items.length > 0) {
                        order.items.forEach(item => {
                            itemsListHtml += `<div style="display:flex;justify-content:space-between;font-size:12px;color:#ccc;margin-bottom:3px;"><span>${item.qty}x ${item.menu_name}</span><span>Rp ${parseInt(item.subtotal).toLocaleString('id-ID')}</span></div>`;
                        });
                    }
                    html += `
                        <div style="padding:14px;background:rgba(255,255,255,0.05);border-radius:8px;margin-bottom:12px;border:1px solid rgba(255,255,255,0.1);position:relative;">
                            <button onclick="konfirmasiHapus('riwayat', ${order.id})" style="position:absolute;top:12px;right:12px;background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.3);color:#ef4444;border-radius:4px;padding:4px 8px;cursor:pointer;font-size:11px;"><i class="fas fa-trash"></i></button>
                            <div style="margin-bottom:6px;padding-right:30px;">
                                <span style="color:var(--gold-crayola);font-weight:bold;font-size:13px;display:block;margin-bottom:4px;">#Order ID: ${order.id}</span>
                                <span style="background:${badgeColor};color:${textColor};padding:2px 8px;border-radius:10px;font-size:10px;font-weight:bold;">${statusText}</span>
                                <span style="font-size:11px;color:#888;margin-left:6px;"><i class="fas fa-clock"></i> ${new Date(order.created_at).toLocaleString('id-ID')}</span>
                            </div>
                            <div style="font-size:11px;color:#aaa;margin-bottom:8px;line-height:1.6;">
                                <div><i class="fas fa-user" style="width:14px;"></i> ${order.name ?? 'Pelanggan'}</div>
                                <div><i class="fas fa-phone" style="width:14px;"></i> ${order.phone ?? '-'}</div>
                                <div><i class="fas fa-motorcycle" style="width:14px;"></i> Tipe: <b style="color:#fff;">${(order.delivery_type || 'Bawa Pulang').toUpperCase()}</b></div>
                                ${order.note ? `<div style="color:var(--gold-crayola);"><i class="fas fa-sticky-note" style="width:14px;"></i> Catatan: ${order.note}</div>` : ''}
                            </div>
                            <div style="background:rgba(0,0,0,0.3);padding:8px;border-radius:6px;margin-bottom:8px;">
                                <div style="font-size:11px;color:var(--gold-crayola);font-weight:bold;margin-bottom:4px;">Daftar Menu:</div>
                                ${itemsListHtml}
                            </div>
                            <div style="font-size:12px;color:#aaa;margin-bottom:2px;">Metode Pembayaran: <b style="color:#fff;">${(order.payment_method || '').toUpperCase()}</b></div>
                            <div style="font-size:14px;font-weight:bold;color:#fff;display:flex;justify-content:space-between;align-items:center;margin-top:6px;border-top:1px dashed rgba(255,255,255,0.1);padding-top:6px;">
                                <span>Total Pesanan:</span>
                                <span style="color:#22c55e;">Rp ${parseInt(order.total).toLocaleString('id-ID')}</span>
                            </div>
                        </div>`;
                });
                container.innerHTML = html;
            });
    }

    function tutupModalRiwayat() { document.body.style.overflow = 'auto'; document.getElementById('modalListRiwayat').classList.remove('show'); }

    function bukaModalNotif() {
        document.body.style.overflow = 'hidden';
        document.getElementById('modalListNotif').classList.add('show');
        const badge = document.getElementById('badgeNotifHijau');
        if (badge) badge.style.display = 'none';
        fetch("{{ route('pelanggan.notif.read') }}", { method: "POST", headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}", "Content-Type": "application/json" } });
    }

    function tutupModalNotif() { document.body.style.overflow = 'auto'; document.getElementById('modalListNotif').classList.remove('show'); }

    function konfirmasiHapus(tipe, id) {
        document.getElementById('customConfirmModal').classList.add('show');
        const form = document.getElementById('deleteForm');
        const msg = document.getElementById('confirmMessage');
        if (tipe === 'riwayat') {
            msg.innerHTML = 'Apakah kamu yakin ingin menghapus <b>Riwayat Pesanan</b> ini?';
            form.action = `/pelanggan/pesanan/${id}`;
        } else if (tipe === 'notif') {
            msg.innerHTML = 'Apakah kamu yakin ingin menghapus <b>Notifikasi</b> ini?';
            form.action = `/pelanggan/notif/${id}`;
        }
    }

    function tutupConfirmModal() { document.getElementById('customConfirmModal').classList.remove('show'); }

    function hapusNotifInstan(id) {
        const el = document.getElementById(`notif-item-${id}`);
        if (!el) return;
        el.style.transition = 'height 0.25s ease, margin 0.25s ease, opacity 0.25s ease';
        el.style.height = el.offsetHeight + 'px';
        el.style.overflow = 'hidden';
        void el.offsetHeight;
        el.classList.add('hidden');
        setTimeout(() => {
            el.remove();
            const container = document.getElementById('notif-list-container');
            const remaining = container.querySelectorAll('.swipe-item:not(.hidden)').length;
            if (remaining === 0 && !document.getElementById('empty-notif')) {
                container.innerHTML = `<div id="empty-notif" style="text-align:center;padding:30px 0;"><i class="fas fa-bell-slash" style="color:#444;font-size:32px;margin-bottom:10px;"></i><p style="color:#888;font-size:13px;">Belum ada notifikasi.</p></div>`;
            }
        }, 300);
        fetch(`/pelanggan/notif/${id}`, { method: 'DELETE', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Content-Type': 'application/json' } }).catch(err => console.error("Gagal hapus notif:", err));
    }

    window.addEventListener('click', function(e) {
        if (e.target === document.getElementById('authModal')) closeAuthModal();
        if (e.target === document.getElementById('modalListRiwayat')) tutupModalRiwayat();
        if (e.target === document.getElementById('modalListNotif')) tutupModalNotif();
        if (e.target === document.getElementById('customConfirmModal')) tutupConfirmModal();
    });

    // ========== SWIPE-TO-DELETE NOTIFIKASI (FIX - SCROLL HP LANCAR) ==========
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('notif-list-container');
        if (!container) return;

        container.addEventListener('mousedown', startSwipe);
        container.addEventListener('touchstart', startSwipe, { passive: false });

        let currentItem = null;
        let startX = 0;
        let startY = 0;
        let currentX = 0;
        let isDragging = false;
        let isScrolling = false;
        let wrapper = null;

        function startSwipe(e) {
            let target = e.target.closest('.swipe-content-wrapper');
            if (!target) return;
            if (e.type === 'mousedown' && e.button !== 0) return;

            const item = target.closest('.swipe-item');
            if (!item || item.classList.contains('hidden')) return;

            currentItem = item;
            wrapper = target;
            isDragging = true;
            isScrolling = false;

            const pos = getPos(e);
            startX = pos.x;
            startY = pos.y;
            currentX = 0;

            wrapper.style.transition = 'none';
            wrapper.style.cursor = 'grabbing';

            document.addEventListener('mousemove', onSwipe);
            document.addEventListener('mouseup', endSwipe);
            document.addEventListener('touchmove', onSwipe, { passive: false });
            document.addEventListener('touchend', endSwipe, { passive: false });

            // TIDAK ADA e.preventDefault() - BIAR SCROLL HP LANCAR
        }

        function getPos(e) {
            if (e.touches) {
                return { x: e.touches[0].clientX, y: e.touches[0].clientY };
            }
            return { x: e.clientX, y: e.clientY };
        }

        function onSwipe(e) {
            if (!isDragging || !currentItem || !wrapper) return;

            const pos = getPos(e);
            const deltaX = pos.x - startX;
            const deltaY = pos.y - startY;

            if (!isScrolling) {
                if (Math.abs(deltaY) > Math.abs(deltaX)) {
                    isScrolling = true;
                }
            }

            if (isScrolling) {
                wrapper.style.transform = 'translateX(0)';
                return;
            }

            if (e.cancelable) e.preventDefault();

            let newX = Math.min(0, deltaX);
            newX = Math.max(-80, newX);
            currentX = newX;
            wrapper.style.transform = `translateX(${newX}px)`;

            const pct = Math.abs(newX) / 80;
            const bg = currentItem.querySelector('.swipe-delete-bg');
            if (bg) {
                bg.style.opacity = Math.min(1, pct * 1.5);
            }
        }

        function endSwipe(e) {
            document.removeEventListener('mousemove', onSwipe);
            document.removeEventListener('mouseup', endSwipe);
            document.removeEventListener('touchmove', onSwipe);
            document.removeEventListener('touchend', endSwipe);

            if (!isDragging || !currentItem || !wrapper) {
                cleanup();
                return;
            }

            const threshold = 50;
            if (!isScrolling && Math.abs(currentX) > threshold) {
                const id = currentItem.dataset.id;
                if (id) {
                    hapusNotifInstan(id);
                }
            } else {
                wrapper.style.transition = 'transform 0.2s ease';
                wrapper.style.transform = 'translateX(0)';
                const bg = currentItem.querySelector('.swipe-delete-bg');
                if (bg) bg.style.opacity = '0';
            }

            wrapper.style.cursor = 'grab';
            cleanup();
        }

        function cleanup() {
            isDragging = false;
            isScrolling = false;
            currentItem = null;
            wrapper = null;
            currentX = 0;
        }

        document.addEventListener('mouseleave', function() {
            if (isDragging) {
                endSwipe({});
            }
        });
    });
</script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

</body>
</html>