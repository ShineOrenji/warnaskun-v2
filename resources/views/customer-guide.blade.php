<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Pelanggan - Warung Nasi Kuning Ibu Opik</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        /* ============================================ */
        /* CUSTOMER GUIDE PAGE - STYLING */
        /* ============================================ */

        body {
            overflow: auto !important;
            height: auto !important;
            min-height: 100vh;
            background: var(--eerie-black-1);
            padding-top: 120px;
        }

        .guide-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 20px 60px;
        }

        /* ---------- HEADER ---------- */
        .guide-header {
            text-align: center;
            padding: 30px 20px;
            margin-bottom: 40px;
            background: var(--bg-card, #1a1a1a);
            border-radius: var(--radius-24, 16px);
            border: 1px solid var(--border-color, #2a2a2a);
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
            color: var(--white);
            margin-bottom: 8px;
        }

        .guide-header p {
            font-size: 1.6rem;
            color: var(--quick-silver);
            max-width: 600px;
            margin: 0 auto;
        }

        /* ---------- SECTION ---------- */
        .guide-section {
            background: var(--bg-card, #1a1a1a);
            border: 1px solid var(--border-color, #2a2a2a);
            border-radius: var(--radius-24, 12px);
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
            color: var(--white);
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

        .guide-section .section-body p {
            margin-bottom: 12px;
        }

        .guide-section .section-body ol {
            padding-left: 20px;
            margin: 10px 0;
        }

        .guide-section .section-body ol li {
            padding: 6px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
        }

        .guide-section .section-body ol li:last-child {
            border-bottom: none;
        }

        .guide-section .section-body ol li::marker {
            color: var(--gold-crayola);
            font-weight: 700;
        }

        .guide-section .section-body .step-card {
            background: var(--bg-primary, #0d0d0d);
            border: 1px solid var(--border-color, #2a2a2a);
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
            color: var(--white);
            font-weight: 500;
        }

        .guide-section .section-body .step-card .step-desc {
            color: var(--quick-silver);
            font-size: 1.3rem;
            margin-left: auto;
        }

        /* ---------- BADGE ---------- */
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

        .badge-guide.orange {
            background: rgba(251, 146, 60, 0.15);
            color: #fb923c;
        }

        /* ---------- TOMBOL ---------- */
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
            margin-top: 4px;
        }

        .btn-guide:hover {
            background: #e6b800;
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(255, 204, 0, 0.3);
        }

        .btn-guide i {
            font-size: 1.6rem;
        }

        /* ---------- FOOTER ---------- */
        .guide-footer {
            text-align: center;
            padding: 30px 20px 10px;
            border-top: 1px solid var(--border-color, #2a2a2a);
            margin-top: 10px;
        }

        .guide-footer p {
            color: var(--text-muted, #6b6b6b);
            font-size: 1.3rem;
        }

        .guide-footer a {
            color: var(--gold-crayola);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .guide-footer a:hover {
            color: #e6b800;
            text-decoration: underline;
        }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 768px) {
            body {
                padding-top: 100px;
            }

            .guide-container {
                padding: 0 12px 40px;
            }

            .guide-header h1 {
                font-size: 2.4rem;
            }

            .guide-header p {
                font-size: 1.4rem;
            }

            .guide-section {
                padding: 16px;
            }

            .guide-section .section-header h2 {
                font-size: 1.4rem;
            }

            .guide-section .section-body {
                padding-left: 0;
                font-size: 1.4rem;
            }

            .guide-section .section-body .step-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 4px;
            }

            .guide-section .section-body .step-card .step-desc {
                margin-left: 0;
            }

            .guide-header .icon-wrap {
                width: 60px;
                height: 60px;
            }

            .guide-header .icon-wrap i {
                font-size: 28px;
            }
        }

        @media (max-width: 480px) {
            .guide-header h1 {
                font-size: 2rem;
            }

            .guide-section {
                padding: 12px;
            }

            .guide-section .section-header .num {
                width: 26px;
                height: 26px;
                font-size: 1.1rem;
            }

            .guide-section .section-header h2 {
                font-size: 1.2rem;
            }

            .guide-section .section-body {
                font-size: 1.3rem;
            }

            .guide-section .section-body ol {
                padding-left: 16px;
            }

            .btn-guide {
                font-size: 1.2rem;
                padding: 10px 20px;
                width: 100%;
                justify-content: center;
            }
        }

        .header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  background-color: transparent;
  padding-block: 40px;
  z-index: 100;
  border-block-end: 1px solid transparent;
  transition: var(--transition-1);
}

/* Saat di-scroll, padding mengecil tapi height tidak berlebih */
.header.active {
  padding-block: 20px !important;
  background-color: var(--eerie-black-4) !important;
  border-color: var(--black-alpha-15) !important;
}

/* Hilangkan height berlebih saat scroll ke atas */
.header.hide {
  transform: translateY(-100%);
  transition-delay: 250ms;
}

/* Pastikan container header tidak overflow */
.header .container {
  padding-inline: 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 8px;
  min-height: auto !important;
}
    </style>
</head>
<body id="top">

    <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">
        <img src="./assets/images/logo.png" width="160" height="50" alt="Warung Nasi Kuning Ibu Opik - Beranda">
      </a>

      <nav class="navbar" data-navbar>

        <button class="close-btn" aria-label="tutup menu" data-nav-toggler>
          <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
        </button>

        <a href="#" class="logo mobile-logo">
          <img src="./assets/images/logo.png" width="160" height="50" alt="Warung Nasi Kuning Ibu Opik - Beranda">
        </a>

        <ul class="navbar-list">
                    <li class="navbar-item">
                        <a href="{{ url('/') }}" class="navbar-link hover-underline" data-nav-link>
                            <div class="separator"></div>
                            <span class="span">Beranda</span>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="{{ url('/') }}#menu" class="navbar-link hover-underline" data-nav-link>
                            <div class="separator"></div>
                            <span class="span">Menu</span>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="{{ url('/') }}#about" class="navbar-link hover-underline" data-nav-link>
                            <div class="separator"></div>
                            <span class="span">Tentang Kami</span>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="{{ url('/') }}#reservasi" class="navbar-link hover-underline" data-nav-link>
                            <div class="separator"></div>
                            <span class="span">Reservasi</span>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="{{ route('customer.guide') }}" class="navbar-link hover-underline active" data-nav-link>
                            <div class="separator"></div>
                            <span class="span">Panduan</span>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="{{ url('/') }}#contact" class="navbar-link hover-underline" data-nav-link>
                            <div class="separator"></div>
                            <span class="span">Kontak</span>
                        </a>
                    </li>
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

      <!-- ============================================ -->
      <!-- TOMBOL LOGIN / DROPDOWN PROFIL (BERSIH & AKURAT) -->
      <!-- ============================================ -->
      <style>
          .profile-dropdown {
              position: relative; display: flex; align-items: center; margin-right: 15px; font-family: 'DM Sans', sans-serif;
              z-index: 99999;
          }
          .profile-trigger {
              display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 4px 12px 4px 4px;
              border-radius: 30px; transition: all 0.3s ease; background: rgba(212, 168, 67, 0.1);
              border: 1px solid rgba(212, 168, 67, 0.3);
          }
          .profile-trigger:hover { background: rgba(212, 168, 67, 0.2); }
          .profile-avatar {
              width: 36px; height: 36px; border-radius: 50%; object-fit: cover;
              border: 2px solid var(--gold-crayola, #d4a843);
          }
          .profile-name { color: #fff; font-size: 14px; font-weight: 600; white-space: nowrap; }
          
          .profile-menu {
              position: absolute; top: calc(100% + 8px); right: 0; background: #1e1e1e; min-width: 220px;
              border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.5);
              border: 1px solid rgba(255,255,255,0.1); padding: 10px 0; z-index: 999999;
              opacity: 0; visibility: hidden; transform: translateY(10px); transition: all 0.3s ease;
          }
          
          /* Jembatan tipis akurat: hanya aktif kalau kursor beneran nyentuh area antara tombol & menu */
          .profile-menu::before {
              content: ''; position: absolute; top: -8px; left: 0; width: 100%; height: 8px;
          }
          
          /* Hover & Tap Aktif */
          .profile-dropdown:hover .profile-menu { 
              opacity: 1; visibility: visible; transform: translateY(0); 
          }
          
          .profile-menu-item {
              display: flex; align-items: center; gap: 12px; padding: 12px 20px;
              color: #ccc; text-decoration: none; transition: 0.3s; font-size: 14px;
          }
          .profile-menu-item:hover { background: rgba(255,255,255,0.05); color: var(--gold-crayola, #d4a843); }
          .profile-menu-item i { width: 20px; text-align: center; font-size: 16px; }
          .profile-menu-divider { height: 1px; background: rgba(255,255,255,0.1); margin: 8px 0; }
          .btn-logout-dropdown {
              width: 100%; text-align: left; background: transparent; border: none;
              color: #ef4444; font-family: inherit; cursor: pointer;
          }
          .btn-logout-dropdown:hover { background: rgba(239, 68, 68, 0.1); color: #ef4444; }

          /* DI HP: Sembunyikan nama, sisa foto aja biar ringkas */
          @media (max-width: 768px) {
              .profile-name, .profile-trigger .fa-chevron-down { display: none; } 
              .profile-trigger { padding: 2px; } 
              .profile-dropdown { margin-left: auto; margin-right: 1px; }
              .profile-menu { right: -20px; }
              .navbar.active { z-index: 9999999 !important; }
              .overlay.active { z-index: 9999998 !important; }
          }
      </style>

      @auth
          <div class="profile-dropdown">
              <div class="profile-trigger">
                  <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=d4a843&color=000&bold=true" alt="Avatar" class="profile-avatar">
                  <span class="profile-name">{{ explode(' ', Auth::user()->name)[0] }}</span>
                  <i class="fas fa-chevron-down" style="color: var(--gold-crayola, #d4a843); font-size: 12px;"></i>
              </div>
              
              <div class="profile-menu">
                  <div style="padding: 10px 20px; border-bottom: 1px solid rgba(255,255,255,0.1); margin-bottom: 8px;">
                      <div style="font-size: 12px; color: #888;">Masuk sebagai</div>
                      <div style="font-size: 14px; color: #fff; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ Auth::user()->email }}</div>
                  </div>
                  
                  <a href="#" class="profile-menu-item">
                      <i class="fas fa-history"></i> Riwayat Pesanan
                  </a>
                  
                  <a href="#" class="profile-menu-item">
                      <i class="fas fa-bell"></i> Notifikasi
                      <span style="background: #ef4444; color: white; font-size: 10px; font-weight: bold; padding: 2px 6px; border-radius: 10px; margin-left: auto;">Baru</span>
                  </a>
                  
                  <a href="#" class="profile-menu-item">
                      <i class="fas fa-user-cog"></i> Pengaturan Akun
                  </a>
                  
                  <div class="profile-menu-divider"></div>
                  
                  <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                      @csrf
                      <button type="submit" class="profile-menu-item btn-logout-dropdown">
                          <i class="fas fa-sign-out-alt"></i> Keluar
                      </button>
                  </form>
              </div>
          </div>
      @else
          <button onclick="openAuthModal()" class="btn btn-primary" style="margin-right: 15px; padding: 10px 20px; min-width: max-content; min-height: 45px;">
              <span class="text text-1">Login</span>
              <span class="text text-2" aria-hidden="true">Login</span>
          </button>
      @endauth

      <!-- ============================================ -->

      <a href="{{ route('cart.index') }}" class="btn btn-secondary">
           <span class="text text-1">
              Pesanan @if($cartCount > 0) ({{ $cartCount }}) @endif
          </span>
          <span class="text text-2" aria-hidden="true">
              Pesanan @if($cartCount > 0) ({{ $cartCount }}) @endif
          </span>
      </a>

      <button class="nav-open-btn" aria-label="buka menu" data-nav-toggler>
        <span class="line line-1"></span>
        <span class="line line-2"></span>
        <span class="line line-3"></span>
      </button>

      <div class="overlay" data-nav-toggler data-overlay></div>

    </div>
  </header>

    <!-- ============================================ -->
    <!-- MAIN CONTENT -->
    <!-- ============================================ -->
    <main>

        <div class="guide-container">

            <!-- HEADER -->
            <div class="guide-header">
                <div class="icon-wrap">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <h1>Panduan Pelanggan</h1>
                <p>Panduan lengkap cara memesan di Warung Nasi Kuning Ibu Opik</p>
            </div>

            <!-- ============================================ -->
            <!-- SECTION 1 - CARA PESAN -->
            <!-- ============================================ -->
            <div class="guide-section">
                <div class="section-header" onclick="toggleSection(this)">
                    <span class="num">1</span>
                    <h2>Cara Memesan Menu</h2>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="section-body">
                    <p>Ikuti langkah-langkah mudah ini untuk memesan menu favorit kamu:</p>
                    <ol>
                        <li><strong>Pilih Menu</strong> - Cari menu yang kamu inginkan di halaman <a href="{{ url('/') }}#menu" style="color: var(--gold-crayola);">Menu Lezat Kami</a></li>
                        <li><strong>Klik Tombol Pesan</strong> - Tekan tombol <span class="badge-guide gold">Pesan</span> pada menu yang dipilih</li>
                        <li><strong>Lihat Keranjang</strong> - Menu akan masuk ke keranjang, lihat dengan klik tombol <span class="badge-guide gold"><i class="fas fa-shopping-cart"></i></span> di pojok kanan bawah</li>
                        <li><strong>Checkout</strong> - Klik tombol <span class="badge-guide gold"><i class="fas fa-shopping-cart"></i></span> atau klik tombol <span class="badge-guide gold">Pesanan</span> di navigasi bar jika mode desktop</li>
                        <li><strong>Isi Data</strong> - Lengkapi data pemesan dan pilih metode pengiriman</li>
                        <li><strong>Konfirmasi</strong> - Klik <span class="badge-guide green"><i class="fas fa-check-circle"></i> Buat Pesanan</span> untuk menyelesaikan pemesanan</li>
                    </ol>
                    <div class="step-card">
                        <span class="step-icon">💡</span>
                        <span class="step-text">Tips:</span>
                        <span class="step-desc">Kamu bisa menambah atau mengurangi jumlah menu di halaman checkout</span>
                    </div>
                </div>
            </div>

            <!-- ============================================ -->
            <!-- SECTION 2 - METODE PENGIRIMAN -->
            <!-- ============================================ -->
            <div class="guide-section">
                <div class="section-header" onclick="toggleSection(this)">
                    <span class="num">2</span>
                    <h2>Metode Pengiriman</h2>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="section-body">
                    <p>Kami menyediakan dua metode untuk menikmati pesanan kamu:</p>
                    <ol>
                        <li>
                            <strong><i class="fas fa-truck" style="color: var(--gold-crayola);"></i> Antar</strong>
                            <ul style="list-style: none; padding-left: 20px; margin-top: 4px;">
                                <li style="padding: 2px 0; border: none; color: var(--quick-silver);">• Pesanan akan diantar ke alamat yang kamu berikan</li>
                                <li style="padding: 2px 0; border: none; color: var(--quick-silver);">• Waktu antar tergantung jarak dan kondisi lalu lintas</li>
                                <li style="padding: 2px 0; border: none; color: var(--quick-silver);">• Pastikan alamat dan patokan jelas untuk memudahkan kurir</li>
                            </ul>
                        </li>
                        <li style="margin-top: 12px;">
                            <strong><i class="fas fa-store" style="color: var(--gold-crayola);"></i> Ambil Sendiri</strong>
                            <ul style="list-style: none; padding-left: 20px; margin-top: 4px;">
                                <li style="padding: 2px 0; border: none; color: var(--quick-silver);">• Datang langsung ke warung dan ambil pesanan</li>
                                <li style="padding: 2px 0; border: none; color: var(--quick-silver);">• Tidak perlu isi alamat, cukup klik <span class="badge-guide blue">Ambil Sendiri</span></li>
                                <li style="padding: 2px 0; border: none; color: var(--quick-silver);">• Pesanan siap diambil setelah mendapat konfirmasi</li>
                            </ul>
                        </li>
                    </ol>
                </div>
            </div>

            <!-- ============================================ -->
            <!-- SECTION 3 - RESERVASI -->
            <!-- ============================================ -->
            <div class="guide-section">
                <div class="section-header" onclick="toggleSection(this)">
                    <span class="num">3</span>
                    <h2>Reservasi Meja</h2>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="section-body">
                    <p>Ingin datang langsung ke warung? Pesan meja terlebih dahulu:</p>
                    <ol>
                        <li><strong>Pilih Tanggal & Jam</strong> - Tentukan kapan kamu ingin datang</li>
                        <li><strong>Isi Data</strong> - Masukkan nama, nomor HP, dan jumlah orang</li>
                        <li><strong>Kirim</strong> - Klik <span class="badge-guide gold"><i class="fas fa-calendar-check"></i> Pesan Meja</span> dan tunggu konfirmasi</li>
                    </ol>
                    <div class="step-card">
                        <span class="step-icon">📌</span>
                        <span class="step-text">Catatan:</span>
                        <span class="step-desc">Reservasi hanya untuk jam operasional 08.00 - 23.00 WIB</span>
                    </div>
                </div>
            </div>

            <!-- ============================================ -->
            <!-- SECTION 4 - PEMBAYARAN -->
            <!-- ============================================ -->
            <div class="guide-section">
                <div class="section-header" onclick="toggleSection(this)">
                    <span class="num">4</span>
                    <h2>Pembayaran</h2>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="section-body">
                    <p>Kami menyediakan beberapa metode pembayaran:</p>
                    <ol>
                        <li><strong><i class="fas fa-money-bill-wave" style="color: #22c55e;"></i> Cash</strong> - Bayar langsung saat pesanan tiba atau di warung</li>
                        <li><strong><i class="fas fa-mobile-alt" style="color: #3b82f6;"></i> E-Wallet</strong> - OVO, DANA, GoPay, dan LinkAja</li>
                        <li><strong><i class="fas fa-university" style="color: #f59e0b;"></i> Transfer Bank</strong> - BCA, Mandiri, BNI, dan BRI</li>
                    </ol>
                    <div class="step-card">
                        <span class="step-icon">ℹ️</span>
                        <span class="step-text">Info:</span>
                        <span class="step-desc">Detail pembayaran akan diberikan setelah pesanan dikonfirmasi</span>
                    </div>
                </div>
            </div>

            <!-- ============================================ -->
            <!-- SECTION 5 - KONTAK -->
            <!-- ============================================ -->
            <div class="guide-section">
                <div class="section-header" onclick="toggleSection(this)">
                    <span class="num">5</span>
                    <h2>Hubungi Kami</h2>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="section-body">
                    <p>Ada pertanyaan atau kendala? Hubungi kami melalui:</p>
                    <ul style="list-style: none; padding: 0; margin-top: 8px;">
                        <li style="padding: 8px 0; border-bottom: 1px solid var(--border-color, #2a2a2a); display: flex; align-items: center; gap: 12px;">
                            <i class="fas fa-phone" style="color: var(--gold-crayola); width: 24px;"></i>
                            <span><strong>Telepon/WhatsApp:</strong> <a href="tel:+6285559150809" style="color: var(--gold-crayola);">+62 855 5915 0809</a></span>
                        </li>
                        <li style="padding: 8px 0; border-bottom: 1px solid var(--border-color, #2a2a2a); display: flex; align-items: center; gap: 12px;">
                            <i class="fas fa-envelope" style="color: var(--gold-crayola); width: 24px;"></i>
                            <span><strong>Email:</strong> <a href="mailto:fahmirhamadan5@gmail.com" style="color: var(--gold-crayola);">fahmirhamadan5@gmail.com</a></span>
                        </li>
                        <li style="padding: 8px 0; display: flex; align-items: center; gap: 12px;">
                            <i class="fas fa-map-marker-alt" style="color: var(--gold-crayola); width: 24px;"></i>
                            <span><strong>Alamat:</strong> Kp. Cimuntuk RT 01/01, Jl. Raya Sukatani</span>
                        </li>
                    </ul>
                    <a href="{{ url('/') }}#reservasi" class="btn-guide" style="margin-top: 16px;">
                        <i class="fas fa-calendar-check"></i>
                        Reservasi Sekarang
                    </a>
                </div>
            </div>

            <!-- ============================================ -->
            <!-- SECTION 6 - FAQ -->
            <!-- ============================================ -->
            <div class="guide-section">
                <div class="section-header" onclick="toggleSection(this)">
                    <span class="num">6</span>
                    <h2>FAQ (Pertanyaan Umum)</h2>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="section-body">
                    <ul style="list-style: none; padding: 0;">
                        <li style="padding: 10px 0; border-bottom: 1px solid var(--border-color, #2a2a2a);">
                            <strong style="color: var(--white);"><i class="fas fa-question-circle" style="color: var(--gold-crayola);"></i> Apakah ada biaya pengiriman?</strong>
                            <p style="margin-top: 4px; font-size: 1.3rem; color: var(--quick-silver);">Biaya pengiriman tergantung jarak lokasi. Akan diinformasikan saat checkout.</p>
                        </li>
                        <li style="padding: 10px 0; border-bottom: 1px solid var(--border-color, #2a2a2a);">
                            <strong style="color: var(--white);"><i class="fas fa-question-circle" style="color: var(--gold-crayola);"></i> Berapa lama proses pemesanan?</strong>
                            <p style="margin-top: 4px; font-size: 1.3rem; color: var(--quick-silver);">Proses memasak memakan waktu 15-30 menit tergantung jumlah pesanan.</p>
                        </li>
                        <li style="padding: 10px 0; border-bottom: 1px solid var(--border-color, #2a2a2a);">
                            <strong style="color: var(--white);"><i class="fas fa-question-circle" style="color: var(--gold-crayola);"></i> Bisa request menu khusus?</strong>
                            <p style="margin-top: 4px; font-size: 1.3rem; color: var(--quick-silver);">Bisa! Tulis catatan khusus saat checkout atau hubungi kami langsung.</p>
                        </li>
                        <li style="padding: 10px 0; border-bottom: 1px solid var(--border-color, #2a2a2a);">
                            <strong style="color: var(--white);"><i class="fas fa-question-circle" style="color: var(--gold-crayola);"></i> Bagaimana cara membatalkan pesanan?</strong>
                            <p style="margin-top: 4px; font-size: 1.3rem; color: var(--quick-silver);">Hubungi kami segera melalui WhatsApp atau telepon untuk pembatalan.</p>
                        </li>
                        <li style="padding: 10px 0;">
                            <strong style="color: var(--white);"><i class="fas fa-question-circle" style="color: var(--gold-crayola);"></i> Apakah bisa pesan untuk acara besar?</strong>
                            <p style="margin-top: 4px; font-size: 1.3rem; color: var(--quick-silver);">Tentu! Hubungi kami untuk pemesanan katering acara spesial Anda.</p>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- ============================================ -->
            <!-- FOOTER -->
            <!-- ============================================ -->
            <div class="guide-footer">
                <p>
                    <i class="fas fa-utensils" style="color: var(--gold-crayola);"></i>
                    Warung Nasi Kuning Ibu Opik &copy; {{ date('Y') }} -
                    <a href="{{ url('/') }}">Kembali ke Beranda</a>
                </p>
            </div>

        </div>

    </main>

    <!-- ============================================ -->
    <!-- FOOTER WEBSITE -->
    <!-- ============================================ -->
    <footer class="footer section has-bg-image text-center"
        style="background-image: url('{{ asset('assets/images/footer-bg.jpg') }}');">
        <div class="container">
            <div class="footer-top grid-list">
                <div class="footer-brand has-before has-after">
                    <a href="#" class="logo">
                        <img src="{{ asset('assets/images/logo.png') }}" width="160" height="50" loading="lazy" alt="Warung Nasi Kuning Ibu Opik">
                    </a>
                    <address class="body-4">Kp. Cimuntuk RT 01/01, Jl. Raya Sukatani</address>
                    <a href="mailto:fahmirhamadan5@gmail.com" class="body-4 contact-link">fahmirhamadan5@gmail.com</a>
                    <a href="tel:+6285559150809" class="body-4 contact-link">Pemesanan : +62 855 5915 0809</a>
                    <p class="body-4">Buka : 08.00 - 23.00</p>
                    <div class="wrapper">
                        <div class="separator"></div>
                        <div class="separator"></div>
                        <div class="separator"></div>
                    </div>
                    <p class="title-1">Dapatkan Berita & Penawaran</p>
                    <p class="label-1">Berlangganan & Dapatkan <span class="span">Diskon 25%.</span></p>
                    <form action="{{ route('subscribe.store') }}" method="POST" class="input-wrapper">
                        @csrf
                        <div class="icon-wrapper">
                            <ion-icon name="mail-outline"></ion-icon>
                            <input type="email" name="email_address" placeholder="Email Anda" autocomplete="off" class="input-field">
                        </div>
                        <button type="submit" class="btn btn-secondary">
                            <span class="text text-1">Berlangganan</span>
                            <span class="text text-2" aria-hidden="true">Berlangganan</span>
                        </button>
                    </form>
                </div>
                <ul class="footer-list">
                    <li><a href="#" class="label-2 footer-link hover-underline">Beranda</a></li>
                    <li><a href="#" class="label-2 footer-link hover-underline">Menu</a></li>
                    <li><a href="#" class="label-2 footer-link hover-underline">Tentang Kami</a></li>
                    <li><a href="#" class="label-2 footer-link hover-underline">Kontak</a></li>
                </ul>
                <ul class="footer-list">
                    <li><a href="https://facebook.com/fhmirmdnn" class="label-2 footer-link hover-underline">Facebook</a></li>
                    <li><a href="https://www.instagram.com/fhmirmdnn" class="label-2 footer-link hover-underline">Instagram</a></li>
                    <li><a href="https://twitter.com/fhmirmdnn" class="label-2 footer-link hover-underline">Twitter</a></li>
                    <li><a href="https://www.youtube.com/fhmirmdnn" class="label-2 footer-link hover-underline">Youtube</a></li>
                </ul>
            </div>
            <div class="footer-bottom">
                <p class="copyright">
                    &copy; 2025 Warung Nasi Kuning Ibu Opik. All Rights Reserved | Crafted by <a href="https://github.com/ShineOrenji" target="_blank" class="link">ShineOrenji</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- ============================================ -->
    <!-- SCRIPTS -->
    <!-- ============================================ -->
    <script>
        // ---------- TOGGLE SECTION (TERTUTUP AWALNYA) ----------
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

        // ---------- SEMUA SECTION TERTUTUP AWALNYA ----------
        document.addEventListener('DOMContentLoaded', function() {
            // Biarin semua tertutup, user yang klik buka sendiri
            console.log('📖 Panduan Pelanggan - Warung Nasi Kuning Ibu Opik');
        });
    </script>

    <script>
      function openAuthModal() {
          document.getElementById('authModal').classList.add('show');
      }
      function closeAuthModal() {
          document.getElementById('authModal').classList.remove('show');
      }
      function switchAuthTab(tab) {
          const tabs = document.querySelectorAll('.auth-tab');
          const forms = document.querySelectorAll('.auth-form');
          
          tabs.forEach(t => t.classList.remove('active'));
          forms.forEach(f => f.classList.remove('active'));

          if (tab === 'login') {
              tabs[0].classList.add('active');
              document.getElementById('formLogin').classList.add('active');
          } else {
              tabs[1].classList.add('active');
              document.getElementById('formRegister').classList.add('active');
          }
      }
      
      // Tutup jika klik area background gelap
      window.addEventListener('click', function(event) {
          const authModal = document.getElementById('authModal');
          if (event.target === authModal) {
              closeAuthModal();
          }
      });

      // Otomatis buka modal kalau ada error dari server
      @if($errors->any())
          window.onload = function() { openAuthModal(); }
      @endif

      // Klik bebas di luar menu untuk menutup dropdown otomatis
      window.addEventListener('click', function(event) {
          // Tutup Modal Login (sudah ada)
          const authModal = document.getElementById('authModal');
          if (event.target === authModal) {
              closeAuthModal();
          }

          // Tutup Dropdown Profil
          const dropdownMenu = document.getElementById('userDropdownMenu');
          const triggerBtn = document.querySelector('.profile-trigger');
          
          if (dropdownMenu && dropdownMenu.classList.contains('active')) {
              // Jika yang diklik bukan menu dan bukan tombol fotonya, tutup!
              if (!dropdownMenu.contains(event.target) && !triggerBtn.contains(event.target)) {
                  dropdownMenu.classList.remove('active');
              }
          }
      });
  </script>

    <script src="{{ asset('assets/js/script.js') }}"></script>

    <!-- Ionicon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>