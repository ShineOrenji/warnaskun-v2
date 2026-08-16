<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Warung Nasi Kuning Ibu Opik</title>
  <meta name="title" content="Warung Nasi Kuning Ibu Opik - Nikmat & Khas">
  <meta name="description" content="Warung Nasi Kuning Ibu Opik - Cita rasa tradisional yang menggugah selera">

  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <link rel="preload" as="image" href="./assets/images/hero-slider-1.png">
  <link rel="preload" as="image" href="./assets/images/hero-slider-2.jpg">
  <link rel="preload" as="image" href="./assets/images/hero-slider-3.png">

</head>

<body id="top">

  <!-- PRELOADER -->
  <div class="preload" data-preaload>
    <div class="circle"></div>
    <p class="text">Ibu Opik</p>
  </div>

  <!-- TOP BAR -->
  <div class="topbar">
    <div class="container">
      <address class="topbar-item">
        <div class="icon"><ion-icon name="location-outline" aria-hidden="true"></ion-icon></div>
        <span class="span">Kp. Cimuntuk RT 01/01, Jl. Raya Sukatani</span>
      </address>
      <div class="separator"></div>
      <div class="topbar-item item-2">
        <div class="icon"><ion-icon name="time-outline" aria-hidden="true"></ion-icon></div>
        <span class="span">Setiap Hari : 08.00 - 23.00</span>
      </div>
      <a href="tel:+6285559150809" class="topbar-item link">
        <div class="icon"><ion-icon name="call-outline" aria-hidden="true"></ion-icon></div>
        <span class="span">+62 855 915 0809</span>
      </a>
      <div class="separator"></div>
      <a href="mailto:fahmirhamadan5@gmail.com" class="topbar-item link">
        <div class="icon"><ion-icon name="mail-outline" aria-hidden="true"></ion-icon></div>
        <span class="span">fahmirhamadan5@gmail.com</span>
      </a>
    </div>
  </div>

  <!-- HEADER -->
  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">
        <img src="./assets/images/logo.png" width="160" height="50" alt="Warung Nasi Kuning Ibu Opik - Beranda">
      </a>

      <!-- NAVBAR MENU -->
      <nav class="navbar" data-navbar>
        <button class="close-btn" aria-label="tutup menu" data-nav-toggler>
          <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
        </button>

        <a href="#" class="logo mobile-logo">
          <img src="./assets/images/logo.png" width="160" height="50" alt="Warung Nasi Kuning Ibu Opik - Beranda">
        </a>

        <ul class="navbar-list">
          <li class="navbar-item"><a href="index.html" class="navbar-link hover-underline active" data-nav-link><div class="separator"></div><span class="span">Beranda</span></a></li>
          <li class="navbar-item"><a href="#menu" class="navbar-link hover-underline" data-nav-link><div class="separator"></div><span class="span">Menu</span></a></li>
          <li class="navbar-item"><a href="#about" class="navbar-link hover-underline" data-nav-link><div class="separator"></div><span class="span">Tentang Kami</span></a></li>
          <li class="navbar-item"><a href="#reservasi" class="navbar-link hover-underline" data-nav-link><div class="separator"></div><span class="span">Reservasi</span></a></li>
          <li class="navbar-item"><a href="{{ route('customer.guide') }}" class="navbar-link hover-underline" data-nav-link><div class="separator"></div><span class="span">Panduan</span></a></li>
          <li class="navbar-item"><a href="#contact" class="navbar-link hover-underline" data-nav-link><div class="separator"></div><span class="span">Kontak</span></a></li>

          <!-- KHUSUS MENU MOBILE (HANYA MUNCUL JIKA BELUM LOGIN) -->
          @guest
          <li class="navbar-item mobile-login-menu" style="margin-top: 15px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 15px;">
              <a href="javascript:void(0)" onclick="openAuthModal(); closeNavbar();" class="navbar-link hover-underline" style="color: var(--gold-crayola);">
                <div class="separator"></div>
                <span class="span"><i class="fas fa-sign-in-alt" style="margin-right: 8px;"></i>Login / Daftar</span>
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

      <!-- CSS PROFIL DROPDOWN & LOGIKA RESPONSIVE AUTH -->
      <style>
        .profile-dropdown { position: relative; display: flex; align-items: center; font-family: 'DM Sans', sans-serif; z-index: 10; }
        .profile-trigger { display: flex; align-items: center; gap: 8px; cursor: pointer; padding: 4px 12px 4px 4px; border-radius: 30px; transition: all 0.3s ease; background: rgba(212, 168, 67, 0.1); border: 1px solid rgba(212, 168, 67, 0.3); }
        .profile-trigger:hover { background: rgba(212, 168, 67, 0.2); }
        .profile-avatar { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; border: 2px solid var(--gold-crayola, #d4a843); }
        .profile-name { color: #fff; font-size: 14px; font-weight: 600; white-space: nowrap; }
        
        .profile-menu { position: absolute; top: calc(100% + 8px); right: 0; background: #1e1e1e; min-width: 220px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); border: 1px solid rgba(255,255,255,0.1); padding: 10px 0; z-index: 50; opacity: 0; visibility: hidden; transform: translateY(10px); transition: all 0.3s ease; }
        .profile-menu::before { content: ''; position: absolute; top: -8px; left: 0; width: 100%; height: 8px; }
        .profile-dropdown:hover .profile-menu { opacity: 1; visibility: visible; transform: translateY(0); }
        .profile-menu-item { display: flex; align-items: center; gap: 12px; padding: 12px 20px; color: #ccc; text-decoration: none; transition: 0.3s; font-size: 14px; }
        .profile-menu-item:hover { background: rgba(255,255,255,0.05); color: var(--gold-crayola, #d4a843); }
        .profile-menu-item i { width: 20px; text-align: center; font-size: 16px; }
        .profile-menu-divider { height: 1px; background: rgba(255,255,255,0.1); margin: 8px 0; }
        .btn-logout-dropdown { width: 100%; text-align: left; background: transparent; border: none; color: #ef4444; font-family: inherit; cursor: pointer; }
        .btn-logout-dropdown:hover { background: rgba(239, 68, 68, 0.1); color: #ef4444; }

        /* LAYOUT NAVBAR GROUP */
        .header-action-group { display: flex; align-items: center; gap: 20px; }

        /* LOGIKA RESPONSIVE */
        @media (max-width: 1199px) { 
          .desktop-login-btn { display: none !important; } 
          .btn-header-pesanan { display: none !important; } 
          /* Margin-left: auto hanya dipanggil pas mode HP biar nabrak hamburger menu */
          .header-action-group { gap: 10px !important; margin-left: auto; margin-right: 15px; }
        }
        @media (min-width: 1200px) { 
          .mobile-login-menu { display: none !important; } 
          /* Memaksa menu navbar tepat berada di tengah secara imbang */
          .navbar { margin-inline: auto !important; }
        }
        @media (max-width: 768px) {
          .profile-name, .profile-trigger .fa-chevron-down { display: none; }
          .profile-trigger { padding: 2px; }
          .header-action-group { margin-right: 10px; }
        }
      </style>

      <!-- GRUP KANAN: LOGIN/PROFIL + PESANAN -->
      <div class="header-action-group">
        
        <div class="outer-auth-container" style="display: flex; align-items: center;">
          @auth
            @php
              $unread_notifs = \App\Models\UserNotification::where('user_id', auth()->id())->where('is_read', false)->count();
            @endphp
            
            <div class="profile-dropdown">
              <div class="profile-trigger">
                <div style="position: relative; display: inline-block;">
                  <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=d4a843&color=000&bold=true" alt="Avatar" class="profile-avatar">
                  @if($unread_notifs > 0)
                    <span id="badgeNotifHijau" style="position: absolute; top: -4px; right: -4px; background: #22c55e; color: white; font-size: 10px; font-weight: bold; min-width: 18px; height: 18px; display: flex; align-items: center; justify-content: center; padding: 0 4px; border-radius: 10px; border: 2px solid #1e1e1e; box-sizing: content-box;">{{ $unread_notifs > 99 ? '99+' : $unread_notifs }}</span>
                  @endif
                </div>
                <span class="profile-name">{{ explode(' ', Auth::user()->name)[0] }}</span>
                <i class="fas fa-chevron-down" style="color: var(--gold-crayola, #d4a843); font-size: 12px;"></i>
              </div>
              
              <div class="profile-menu">
                <div style="padding: 10px 20px; border-bottom: 1px solid rgba(255,255,255,0.1); margin-bottom: 8px;">
                  <div style="font-size: 12px; color: #888;">Masuk sebagai</div>
                  <div style="font-size: 14px; color: #fff; font-weight: 600;">{{ Auth::user()->email ?? Auth::user()->phone }}</div>
                </div>
                @if(auth()->user()->role == 'customer')
                  <a href="javascript:void(0)" onclick="bukaModalRiwayat()" class="profile-menu-item"><i class="fas fa-history"></i> Riwayat Pesanan</a>
                  <a href="javascript:void(0)" onclick="bukaModalNotif()" class="profile-menu-item"><i class="fas fa-bell"></i> Notifikasi</a>
                @elseif(auth()->user()->role == 'admin')
                  <a href="{{ route('dashboard.index') }}" class="profile-menu-item"><i class="fas fa-tachometer-alt"></i> Dashboard Admin</a>
                @endif
                <div class="profile-menu-divider"></div>
                <form action="{{ auth()->user()->role == 'admin' ? route('logout') : route('pelanggan.logout') }}" method="POST" style="margin: 0;">
                  @csrf
                  <button type="submit" class="profile-menu-item btn-logout-dropdown"><i class="fas fa-sign-out-alt"></i> Keluar</button>
                </form>
              </div>
            </div>
          @else
            <button onclick="openAuthModal()" class="btn btn-primary desktop-login-btn" style="padding: 10px 20px; min-width: max-content; min-height: 45px;">
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

  <!-- KONTEN UTAMA -->
  <main>
    <article>
      <!-- HERO SECTION -->
      <section class="hero text-center" aria-label="beranda" id="home">
        <ul class="hero-slider" data-hero-slider>
          <li class="slider-item active" data-hero-slider-item>
            <div class="slider-bg"><img src="./assets/images/hero-slider-1.png" width="1880" height="950" alt="" class="img-cover"></div>
            <p class="label-2 section-subtitle slider-reveal">Tradisional & Higienis</p>
            <h1 class="display-1 hero-title slider-reveal">Untuk cinta <br> makanan lezat</h1>
            <p class="body-2 hero-text slider-reveal">Datang bersama keluarga & rasakan kebahagiaan makanan yang lezat</p>
            <a href="#menu" class="btn btn-primary slider-reveal">
              <span class="text text-1">Lihat Menu</span>
              <span class="text text-2" aria-hidden="true">Lihat Menu</span>
            </a>
          </li>
          <li class="slider-item" data-hero-slider-item>
            <div class="slider-bg"><img src="./assets/images/hero-slider-2.png" width="1880" height="950" alt="" class="img-cover"></div>
            <p class="label-2 section-subtitle slider-reveal">Pengalaman yang Menyenangkan</p>
            <h1 class="display-1 hero-title slider-reveal">Rasa Terinspirasi <br> oleh Musim</h1>
            <p class="body-2 hero-text slider-reveal">Datang bersama keluarga & rasakan kebahagiaan makanan yang lezat</p>
            <a href="#menu" class="btn btn-primary slider-reveal">
              <span class="text text-1">Lihat Menu</span>
              <span class="text text-2" aria-hidden="true">Lihat Menu</span>
            </a>
          </li>
          <li class="slider-item" data-hero-slider-item>
            <div class="slider-bg"><img src="./assets/images/hero-slider-3.png" width="1880" height="950" alt="" class="img-cover"></div>
            <p class="label-2 section-subtitle slider-reveal">Lezat & Menggugah Selera</p>
            <h1 class="display-1 hero-title slider-reveal">Di mana setiap rasa <br> memiliki cerita</h1>
            <p class="body-2 hero-text slider-reveal">Datang bersama keluarga & rasakan kebahagiaan makanan yang lezat</p>
            <a href="#menu" class="btn btn-primary slider-reveal">
              <span class="text text-1">Lihat Menu</span>
              <span class="text text-2" aria-hidden="true">Lihat Menu</span>
            </a>
          </li>
        </ul>
        <button class="slider-btn prev" aria-label="geser ke sebelumnya" data-prev-btn><ion-icon name="chevron-back"></ion-icon></button>
        <button class="slider-btn next" aria-label="geser ke berikutnya" data-next-btn><ion-icon name="chevron-forward"></ion-icon></button>
        <a href="#reservasi" class="hero-btn has-after">
          <img src="./assets/images/hero-icon.png" width="48" height="48" alt="ikon pemesanan">
          <span class="label-2 text-center span">Pesan Meja</span>
        </a>
      </section>

      <!-- RUNNING TEXT -->
      <section class="running-text-section">
        <div class="running-text-wrapper">
          <div class="running-text-track">
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Spesial</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Es Teh Manis</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Originale</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Telur Balado</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Es Teh Manis</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Telur Dadar Spesial</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Sambal Tomatss</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Komplit</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Oreg Tempe</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Mihun sohun</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Originale</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Telur Balado</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Es Jeruk</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Sambal Tomatss</span>
          </div>
        </div>
      </section>

      <!-- ABOUT -->
      <section class="section about text-center" aria-labelledby="about-label" id="about">
        <div class="container">
          <div class="about-content">
            <p class="label-2 section-subtitle" id="about-label">Cerita Kami</p>
            <h2 class="headline-1 section-title">Setiap Rasa Memiliki Cerita</h2>
            <p class="section-text">Warung Nasi Kuning Ibu Opik hadir sejak 1950 dengan resep nasi kuning khas yang diwariskan turun-temurun. Setiap bumbu dipilih dengan cermat untuk menciptakan cita rasa yang autentik dan menggugah selera.</p>
            <div class="contact-label">Pesan Lewat Telepon</div>
            <a href="tel:+6285559150809" class="body-1 contact-number hover-underline">+62 855 5915 0809</a>
            <a href="#about" class="btn btn-primary">
              <span class="text text-1">Selengkapnya</span>
              <span class="text text-2" aria-hidden="true">Selengkapnya</span>
            </a>
          </div>
          <figure class="about-banner">
            <img src="./assets/images/logo.png" width="570" height="570" loading="lazy" alt="tentang kami" class="w-100" data-parallax-item data-parallax-speed="1">
            <div class="has-before" data-parallax-item data-parallax-speed="1.75">
              <img src="./assets/images/logo.png" width="285" height="285" loading="lazy" alt="" class="w-100">
            </div>
            <div class="abs-img abs-img-2 has-before">
              <img src="./assets/images/badge-2.png" width="133" height="134" loading="lazy" alt="">
            </div>
          </figure>
          <img src="./assets/images/shape-3.png" width="197" height="194" loading="lazy" alt="" class="shape">
        </div>
      </section>

      <!-- RUNNING TEXT -->
      <section class="running-text-section">
        <div class="running-text-wrapper">
          <div class="running-text-track">
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Spesial</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Es Teh Manis</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Originale</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Telur Balado</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Es Teh Manis</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Telur Dadar Spesial</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Sambal Tomatss</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Komplit</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Oreg Tempe</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Mihun sohun</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Originale</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Telur Balado</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Es Jeruk</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Sambal Tomatss</span>
          </div>
        </div>
      </section>

      <!-- #SPECIAL DISH -->
      <section class="special-dish text-center" aria-labelledby="dish-label">
        <div class="special-dish-banner">
          <img src="./assets/images/hero-slider-3.png" width="940" height="900" loading="lazy" alt="menu spesial" class="img-cover">
        </div>
        <div class="special-dish-content bg-black-10">
          <div class="container">
            <img src="./assets/images/badge-1.png" width="28" height="41" loading="lazy" alt="lencana" class="abs-img">
            <p class="section-subtitle label-2">Menu Spesial</p>
            <h2 class="headline-1 section-title">Nasi Kuning Komplit</h2>
            <p class="section-text">Nasi kuning khas dengan ayam goreng, telur, sambal, dan berbagai lauk pilihan. Disajikan dengan bumbu rahasia Ibu Opik yang membuatnya istimewa.</p>
            <div class="wrapper">
              <del class="del body-3">Rp 15.000</del>
              <span class="span body-1">Rp 10.000</span>
            </div>
            <a href="#" class="btn btn-primary">
              <span class="text text-1">Lihat Semua Menu</span>
              <span class="text text-2" aria-hidden="true">Lihat Semua Menu</span>
            </a>
          </div>
        </div>
        <img src="./assets/images/shape-4.png" width="179" height="359" loading="lazy" alt="" class="shape shape-1">
        <img src="./assets/images/shape-9.png" width="351" height="462" loading="lazy" alt="" class="shape shape-2">
      </section>

      <!-- #MENU -->

      <section class="section menu" aria-label="menu-label" id="menu">
        <div class="container">
          <p class="section-subtitle text-center label-2">Pilihan Spesial</p>
          <h2 class="headline-1 section-title text-center">Menu Lezat Kami</h2>
          <p class="section-text text-center menu-intro">Nikmati cita rasa autentik nasi kuning khas Ibu Opik dengan bahan pilihan terbaik</p>

          <div class="menu-filter">
            <button class="filter-btn active" data-filter="all">Semua</button>
            <button class="filter-btn" data-filter="nasi">Nasi</button>
            <button class="filter-btn" data-filter="lauk">Lauk</button>
            <button class="filter-btn" data-filter="minuman">minuman</button>
            <button class="filter-btn" data-filter="seafood">Soon</button>
          </div>

          <div class="menu-grid">
            @foreach ($menus as $menu)
            <div class="menu-item-card" data-category="{{ $menu->category }}">
              <div class="menu-item-image">
                <img src="{{ asset('uploads/menu/' . $menu->image) }}" alt="{{ $menu->name }}" width="300" height="300" loading="lazy">
                @if($menu->stock > 0)
                  <span class="menu-badge">Tersedia</span>
                @else
                  <span class="menu-badge menu-badge-danger">Habis</span>
                @endif
              </div>
              <div class="menu-item-content">
                <div class="menu-item-header">
                  <h3 class="menu-item-title">{{ $menu->name }}</h3>
                  <span class="menu-item-price">Rp {{ number_format($menu->price,0,',','.') }}</span>
                </div>
                <p class="menu-item-description">{{ $menu->description }}</p>
                <div class="menu-item-footer">
                  <span class="menu-item-rating">{{ ucfirst($menu->category) }}</span>
                  @if($menu->stock > 0)
                    <form action="{{ route('cart.add', $menu->id) }}" method="POST">
                      @csrf
                      <button type="submit" class="btn-order"><ion-icon name="cart-outline"></ion-icon><span>Pesan</span></button>
                    </form>
                  @else
                    <button class="btn-order btn-order-2" disabled style="opacity:.6;cursor:not-allowed;">
                      <ion-icon name="close-circle-outline"></ion-icon><span>Stok Habis</span>
                    </button>
                  @endif
                </div>
              </div>
            </div>
            @endforeach
          </div>

          <p class="menu-text text-center">Setiap hari mulai <span class="span">08.00</span> sampai <span class="span">23.00</span></p>
          <img src="./assets/images/shape-5.png" width="921" height="1036" loading="lazy" alt="bentuk" class="shape shape-2 move-anim">
          <img src="./assets/images/shape-6.png" width="343" height="345" loading="lazy" alt="bentuk" class="shape shape-3 move-anim">
        </div>
      </section>

      <!-- RUNNING TEXT -->
      <section class="running-text-section">
        <div class="running-text-wrapper">
          <div class="running-text-track">
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Spesial</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Es Teh Manis</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Originale</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Telur Balado</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Es Teh Manis</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Telur Dadar Spesial</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Sambal Tomatss</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Komplit</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Oreg Tempe</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Mihun sohun</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Originale</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Telur Balado</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Es Jeruk</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Sambal Tomatss</span>
          </div>
        </div>
      </section>

      <!-- TESTIMONIALS -->
      
      <section class="section testi text-center has-bg-image" style="background-image: url('./assets/images/quotes-bg.png')" aria-label="testimoni">
        <div class="container">
          <div class="quote">”</div>
          <p class="headline-2 testi-text">Nasi Kuning Paling Mantap se-Galaxy Andromeda</p>
          <div class="wrapper">
            <div class="separator"></div><div class="separator"></div><div class="separator"></div>
          </div>
        </div>
      </section>

      <!-- RESERVATION -->
      
      <section class="reservation">
        <div class="container" id="reservasi">
          <div class="form reservation-form bg-black-10">
            <form action="{{ route('reservation.store') }}" method="POST" class="form-left">
              @csrf
              <h2 class="headline-1 text-center"><del>Booking Tempat</del></h2>
              <p class="text-center" style="font-size: 20px; color: red;">(Masih tahap perbaikan le, Insya Allah Soon Aamiin)</p>
              <p class="form-text text-center">Pemesanan <a href="tel:+6285559150809" class="link">+62 855 5915 0809</a> atau isi formulir di bawah ini</p>
              <div class="input-wrapper">
                <input type="text" name="name" placeholder="Nama Anda" autocomplete="off" class="input-field">
                <input type="tel" name="phone" placeholder="Nomor Telepon" autocomplete="off" class="input-field">
              </div>
              <div class="input-wrapper">
                <div class="icon-wrapper">
                  <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
                  <select name="person" class="input-field">
                    <option value="1">1 Orang</option><option value="2">2 Orang</option>
                  </select>
                  <ion-icon name="chevron-down" aria-hidden="true"></ion-icon>
                </div>
                <div class="icon-wrapper">
                  <ion-icon name="calendar-clear-outline" aria-hidden="true"></ion-icon>
                  <input type="date" name="reservation_date" class="input-field">
                  <ion-icon name="chevron-down" aria-hidden="true"></ion-icon>
                </div>
                <div class="icon-wrapper">
                  <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                  <select name="reservation_time" class="input-field">
                    <option value="08:00am">08 : 00</option><option value="09:00am">09 : 00</option>
                  </select>
                  <ion-icon name="chevron-down" aria-hidden="true"></ion-icon>
                </div>
              </div>
              <textarea name="message" placeholder="Pesan" autocomplete="off" class="input-field"></textarea>
              <button type="submit" class="btn btn-secondary" disabled style="opacity:.6;cursor:not-allowed;">
                <span class="text text-1">Pesan Meja</span>
                <span class="text text-2" aria-hidden="true">Pesan Meja</span>
              </button>
            </form>
            <div class="form-right text-center" style="background-image: url('./assets/images/form-pattern.png')">
              <h2 class="headline-1 text-center">Hubungi Kami</h2>
              <p class="contact-label">Pemesanan</p>
              <a href="tel:+628555150809" class="body-1 contact-number hover-underline">+62 855 5915 0809</a>
              <div class="separator"></div>
              <p class="contact-label">Lokasi</p>
              <address class="body-4">Kp. Cimuntuk RT 01/01, Jl. Raya Sukatani</address>
            </div>
          </div>
        </div>
      </section>

      <!-- 
        - #FEATURES
      -->

      <section class="section features text-center" aria-label="fitur">
        <div class="container">

          <p class="section-subtitle label-2">Mengapa Memilih Kami</p>

          <h2 class="headline-1 section-title">Keunggulan Kami</h2>

          <ul class="grid-list">

            <li class="feature-item">
              <div class="feature-card">

                <div class="card-icon">
                  <img src="./assets/images/features-icon-1.png" width="100" height="80" loading="lazy" alt="ikon">
                </div>

                <h3 class="title-2 card-title">Makanan Higienis</h3>

                <p class="label-1 card-text">Kami menjaga kebersihan dan kualitas makanan setiap hari.</p>

              </div>
            </li>

            <li class="feature-item">
              <div class="feature-card">

                <div class="card-icon">
                  <img src="./assets/images/features-icon-2.png" width="100" height="80" loading="lazy" alt="ikon">
                </div>

                <h3 class="title-2 card-title">Lingkungan Segar</h3>

                <p class="label-1 card-text">Suasana nyaman dan bersih untuk pengalaman makan yang menyenangkan.</p>

              </div>
            </li>

            <li class="feature-item">
              <div class="feature-card">

                <div class="card-icon">
                  <img src="./assets/images/features-icon-3.png" width="100" height="80" loading="lazy" alt="ikon">
                </div>

                <h3 class="title-2 card-title">Koki Berpengalaman</h3>

                <p class="label-1 card-text">Dibuat oleh koki profesional dengan resep turun-temurun.</p>

              </div>
            </li>

            <li class="feature-item">
              <div class="feature-card">

                <div class="card-icon">
                  <img src="./assets/images/features-icon-4.png" width="100" height="80" loading="lazy" alt="ikon">
                </div>

                <h3 class="title-2 card-title">Acara & Pesta</h3>

                <p class="label-1 card-text">Tersedia layanan katering untuk acara spesial Anda.</p>

              </div>
            </li>

          </ul>

          <img src="./assets/images/shape-7.png" width="208" height="178" loading="lazy" alt="bentuk"
            class="shape shape-1">

          <img src="./assets/images/shape-8.png" width="120" height="115" loading="lazy" alt="bentuk"
            class="shape shape-2">

        </div>
      </section>

      <!-- RUNNING TEXT -->
      <section class="running-text-section">
        <div class="running-text-wrapper">
          <div class="running-text-track">
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Spesial</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Es Teh Manis</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Originale</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Telur Balado</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Es Teh Manis</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Telur Dadar Spesial</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Sambal Tomatss</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Komplit</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Oreg Tempe</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Mihun sohun</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Originale</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Telur Balado</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Es Jeruk</span>
            <span class="running-text-item"><i class="fa-solid fa-arrows-to-dot"></i> Sambal Tomatss</span>
          </div>
        </div>
      </section>

    </article>
  </main>

  <!-- FOOTER -->

  <footer id="contact" class="footer section has-bg-image text-center"
    style="background-image: url('./assets/images/footer-bg.png')">
    <div class="container">

      <div class="footer-top grid-list">

        <div class="footer-brand has-before has-after">

          <a href="#" class="logo">
            <img src="./assets/images/logo.png" width="160" height="50" loading="lazy" alt="Warung Nasi Kuning Ibu Opik">
          </a>

          <address class="body-4">
            Kp. Cimuntuk RT 01/01, Jl. Raya Sukatani
          </address>

          <a href="mailto:fahmirhamadan5@gmail.com" class="body-4 contact-link">fahmirhamadan5@gmail.com</a>

          <a href="tel:+6285559150809" class="body-4 contact-link">Pemesanan : +62 855 5915 0809</a>
          
          <p class="body-4">
            Buka : 08.00 - 23.00
          </p>

          <div class="wrapper">
            <div class="separator"></div>
            <div class="separator"></div>
            <div class="separator"></div>
          </div>

          <p class="title-1">Dapatkan Berita & Penawaran</p>
          
          <p class="label-1">
            Berlangganan & Dapatkan <span class="span">Diskon 25%.</span>
          </p>

          <form action="{{ route('subscribe.store') }}" method="POST" class="input-wrapper">
            @csrf
            <div class="icon-wrapper">
              <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>

              <input type="email" name="email_address" placeholder="Email Anda" autocomplete="off" class="input-field">
            </div>

            <button type="submit" class="btn btn-secondary">
              <span class="text text-1">Berlangganan</span>

              <span class="text text-2" aria-hidden="true">Berlangganan</span>
            </button>
          </form>
        
        </div>

        <ul class="footer-list">

          <li>
            <a href="#home" class="label-2 footer-link hover-underline">Beranda</a>
          </li>

          <li>
            <a href="#menu" class="label-2 footer-link hover-underline">Menu</a>
          </li>

          <li>
            <a href="#about" class="label-2 footer-link hover-underline">Tentang Kami</a>
          </li>

          <li>
            <a href="#contact" class="label-2 footer-link hover-underline">Kontak</a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <a href="https://facebook.com/fhmirmdnn" class="label-2 footer-link hover-underline">Facebook</a>
          </li>

          <li>
            <a href="https://www.instagram.com/fhmirmdnn" class="label-2 footer-link hover-underline">Instagram</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Google Map</a>
          </li>

        </ul>
      </div>

      <div class="footer-bottom">

        <p class="copyright">
          &copy; 2025 Warung Nasi Kuning Ibu Opik. All Rights Reserved | Crafted by <a href="https://github.com/ShineOrenji"
            target="_blank" class="link">ShineOrenji</a>
        </p>

      </div>

    </div>
  </footer>

  <!-- FLOATING CART -->
  @php $cartCount = collect(session('cart', []))->sum('qty'); @endphp
  <a href="{{ route('checkout') }}" class="floating-cart {{ $cartCount > 0 ? 'has-items' : '' }}" id="floatingCart" aria-label="Lihat Pesanan">
    <i class="fas fa-shopping-cart"></i>
    <span class="cart-tooltip"><i class="fas fa-shopping-cart" style="margin-right: 4px; color: var(--gold-crayola);"></i> Lihat Pesanan</span>
    @if($cartCount > 0)
      <span class="cart-badge" id="floatingCartBadge">{{ $cartCount }}</span>
    @endif
  </a>

  <!-- BACK TO TOP -->
  <a href="#top" class="back-top-btn active" aria-label="kembali ke atas" data-back-top-btn><ion-icon name="chevron-up" aria-hidden="true"></ion-icon></a>

  <!-- SCRIPTS -->
  <script src="./assets/js/script.js"></script>
  <script src="./assets/js/menu.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <!-- TOAST NOTIFICATION -->
  <div id="toast-overlay" class="cart-toast-overlay"></div>
  <div id="cart-toast" class="cart-toast">
    <div class="cart-toast-icon"><i class="fas fa-check"></i></div>
    <div class="cart-toast-content">
      <div class="cart-toast-title">Berhasil Ditambahkan!</div>
      <div class="cart-toast-item" id="toast-item-name">Nasi Kuning Komplit</div>
      <div class="cart-toast-message"><i class="fas fa-shopping-cart"></i> Masuk ke keranjang belanja kamu</div>
    </div>
    <div class="toast-progress"><div class="progress-fill"></div></div>
  </div>

  <!-- MODAL LOGIN & REGISTER & RIWAYAT & NOTIF -->
  <style>
    .auth-modal-overlay { 
      position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
      background: rgba(0, 0, 0, 0.85); backdrop-filter: blur(5px); 
      display: none; align-items: center; justify-content: center; 
      z-index: 999999; opacity: 0; transition: opacity 0.3s ease; 
    }
    .auth-modal-overlay.show { display: flex; opacity: 1; }
    .auth-modal-box { 
      background: #111; border: 1px solid var(--gold-crayola, #d4a843); 
      width: 90%; max-width: 400px; border-radius: 12px; padding: 30px; 
      position: relative; color: #fff; box-shadow: 0 10px 40px rgba(0,0,0,0.5); 
    }
    .auth-close-btn { 
      position: absolute; top: 15px; right: 15px; background: transparent; 
      border: none; color: #fff; font-size: 24px; cursor: pointer; transition: 0.3s; 
    }
    .auth-close-btn:hover { color: #ef4444; }
    .auth-tabs { 
      display: flex; border-bottom: 2px solid #333; margin-bottom: 20px; 
    }
    .auth-tab { 
      flex: 1; text-align: center; padding: 10px; cursor: pointer; 
      font-family: var(--ff-forum, 'Forum', serif); font-size: 20px; 
      color: #888; transition: 0.3s; 
    }
    .auth-tab.active { 
      color: var(--gold-crayola, #d4a843); 
      border-bottom: 2px solid var(--gold-crayola, #d4a843); 
    }
    .auth-form { display: none; }
    .auth-form.active { display: block; animation: fadeIn 0.4s ease; }

    /* INPUT GROUP */
    .auth-input-group { 
      margin-bottom: 18px; text-align: left; position: relative; 
    }
    .auth-input-group label { 
      display: block; font-size: 13px; margin-bottom: 5px; color: #aaa; 
      font-weight: 500; letter-spacing: 0.3px; 
    }
    .auth-input-group input { 
      width: 100%; padding: 12px 40px 12px 14px; 
      background: #1a1a1a; border: 1.5px solid #333; 
      color: #fff; border-radius: 8px; outline: none; 
      font-family: inherit; font-size: 14px; 
      transition: border-color 0.3s ease, box-shadow 0.3s ease; 
      box-sizing: border-box;
    }
    .auth-input-group input:focus { 
      border-color: var(--gold-crayola, #d4a843); 
      box-shadow: 0 0 0 3px rgba(212, 168, 67, 0.15); 
    }
    .auth-input-group input::placeholder { color: #555; }

    /* TOMBOL MATA - PRESISI DI TENGAH INPUT */
    .input-wrapper-relative { position: relative; width: 100%; }
    .toggle-password { 
      position: absolute; right: 14px; top: 50%; 
      transform: translateY(-50%); color: #666; 
      cursor: pointer; font-size: 16px; transition: 0.3s; z-index: 5;
    }
    .toggle-password:hover { color: var(--gold-crayola, #d4a843); }

    /* STRENGTH INDICATOR SUPER KEREN */
    .pw-strength-bg { background: #333; height: 6px; border-radius: 6px; margin-top: 8px; overflow: hidden; width: 100%; }
    .pw-strength { height: 100%; width: 0%; border-radius: 6px; transition: width 0.4s ease, background 0.4s ease, box-shadow 0.4s ease; }
    .pw-weak { width: 33%; background: #ef4444; box-shadow: 0 0 10px rgba(239, 68, 68, 0.6); }
    .pw-medium { width: 66%; background: #eab308; box-shadow: 0 0 10px rgba(234, 179, 8, 0.6); }
    .pw-strong { width: 100%; background: #22c55e; box-shadow: 0 0 10px rgba(34, 197, 94, 0.6); }
    .pw-text { font-size: 11px; margin-top: 6px; display: none; font-weight: 600; letter-spacing: 0.3px; }
    .pw-text.show { display: block; animation: fadeIn 0.3s; }

    .auth-submit-btn { 
      width: 100%; padding: 13px; 
      background: var(--gold-crayola, #d4a843); 
      color: #000; font-weight: bold; 
      border: none; border-radius: 8px; 
      cursor: pointer; font-size: 16px; 
      margin-top: 10px; transition: all 0.3s ease; 
      font-family: inherit; 
    }
    .auth-submit-btn:hover { 
      background: #b8922f; 
      transform: translateY(-1px); 
      box-shadow: 0 4px 15px rgba(212, 168, 67, 0.3); 
    }
    .auth-alert { 
      background: rgba(239, 68, 68, 0.1); 
      color: #ef4444; 
      padding: 10px 14px; 
      border-radius: 8px; 
      font-size: 13px; 
      margin-bottom: 15px; 
      border: 1px solid rgba(239,68,68,0.25); 
    }
    .forgot-password { 
      display: block; text-align: right; 
      font-size: 12px; color: var(--gold-crayola); 
      margin-top: -8px; margin-bottom: 15px; 
      text-decoration: none; transition: 0.3s; 
    }
    .forgot-password:hover { 
      text-decoration: underline; 
      color: #d4a843; 
    }
  </style>

  <div id="authModal" class="auth-modal-overlay">
      <div class="auth-modal-box">
          <button class="auth-close-btn" onclick="closeAuthModal()">&times;</button>
          <div class="auth-tabs">
              <div class="auth-tab active" onclick="switchAuthTab('login')">Masuk</div>
              <div class="auth-tab" onclick="switchAuthTab('register')">Daftar</div>
          </div>
          @if($errors->any())
              <div class="auth-alert">
                  @foreach ($errors->all() as $error)<div>- {{ $error }}</div>@endforeach
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
                    <!-- ID dibedakan jadi loginPw -->
                    <input type="password" id="loginPw" name="password" required placeholder="Masukkan password kamu">
                    <i class="fas fa-eye toggle-password" onclick="togglePw('loginPw', this)"></i>
                </div>
              </div>
              <a href="#" class="forgot-password" onclick="alert('Hubungi Admin via WhatsApp.')">Lupa Password?</a>
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
                  <input type="email" name="email" placeholder="budi@gmail.com (Opsional)">
              </div>
              <div class="auth-input-group">
                  <label>No WhatsApp</label>
                  <!-- Validasi otomatis hanya angka -->
                  <input type="tel" name="phone" required placeholder="08xxxxxxxxxx" oninput="this.value = this.value.replace(/[^0-9]/g, '');" minlength="10" maxlength="14">
              </div>
              <div class="auth-input-group">
                  <label>Password</label>
                  <div class="input-wrapper-relative">
                      <!-- ID dibedakan jadi regPw -->
                      <input type="password" id="regPw" name="password" required minlength="6" placeholder="Minimal 6 karakter" oninput="checkStrength(this.value)">
                      <i class="fas fa-eye toggle-password" onclick="togglePw('regPw', this)"></i>
                  </div>
                  <!-- Strength Bar Keren -->
                  <div class="pw-strength-bg">
                      <div id="pwBar" class="pw-strength"></div>
                  </div>
                  <div id="pwText" class="pw-text"></div>
              </div>
              <button type="submit" class="auth-submit-btn">Daftar Sekarang</button>
          </form>
      </div>
  </div>

  <div id="modalListRiwayat" class="auth-modal-overlay">
      <div class="auth-modal-box" style="padding: 20px; max-width: 450px; text-align: left;">
          <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 10px; margin-bottom: 15px;">
              <h3 style="color: #fff; font-size: 16px; font-weight: bold; margin: 0;"><i class="fas fa-history" style="color: var(--gold-crayola); margin-right: 8px;"></i> Riwayat Pesanan</h3>
              <button class="auth-close-btn" style="position: static;" onclick="tutupModalRiwayat()">&times;</button>
          </div>
          <div id="containerDataRiwayat" style="max-height: 380px; overflow-y: auto; padding-right: 5px;">
              <div style="text-align: center; padding: 30px 0; color: #888;">
                  <i class="fas fa-spinner fa-spin" style="font-size: 24px; color: var(--gold-crayola);"></i>
                  <p style="margin-top: 10px; font-size: 13px;">Memuat riwayat...</p>
              </div>
          </div>
          <div style="text-align: center; margin-top: 15px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 15px;">
              <a href="{{ route('customer.orders') }}" style="color: var(--gold-crayola); text-decoration: none; font-size: 14px; font-weight: bold; display: inline-block; width: 100%;">Lihat Riwayat Lengkap <i class="fas fa-arrow-right" style="margin-left: 5px;"></i></a>
          </div>
      </div>
  </div>

  <div id="modalListNotif" class="auth-modal-overlay">
    <div class="auth-modal-box" style="padding: 20px; max-width: 400px; text-align: left;">
      <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 10px; margin-bottom: 15px;">
        <h3 style="color: #fff; font-size: 16px; font-weight: bold; margin: 0;"><i class="fas fa-bell" style="color: var(--gold-crayola); margin-right: 8px;"></i> Notifikasi Saya</h3>
        <button class="auth-close-btn" style="position: static;" onclick="tutupModalNotif()">&times;</button>
      </div>
      
      <style>
        /* Gaya dasar swipe item */
        .swipe-item {
          position: relative;
          overflow: hidden;
          border-radius: 8px;
          margin-bottom: 8px;
          background: #ef4444;
          transition: height 0.25s ease, margin 0.25s ease, opacity 0.25s ease;
          touch-action: pan-y;
          user-select: none;
        }
        .swipe-item.hidden {
          height: 0 !important;
          margin: 0 !important;
          opacity: 0;
          overflow: hidden;
        }
        .swipe-content-wrapper {
          position: relative;
          z-index: 2;
          background: #1e1e1e;
          border-left: 3px solid var(--gold-crayola);
          padding: 12px;
          border-radius: 8px;
          transform: translateX(0);
          transition: transform 0.15s ease;
          will-change: transform;
          cursor: grab;
        }
        .swipe-content-wrapper:active {
          cursor: grabbing;
        }
        .swipe-delete-bg {
          position: absolute;
          right: 0;
          top: 0;
          bottom: 0;
          width: 80px;
          background: #ef4444;
          display: flex;
          align-items: center;
          justify-content: center;
          color: #fff;
          font-size: 20px;
          border-radius: 0 8px 8px 0;
          z-index: 1;
          pointer-events: none;
        }
        .swipe-content-wrapper .swipe-hint {
          position: absolute;
          right: 12px;
          top: 50%;
          transform: translateY(-50%);
          font-size: 14px;
          color: #666;
          animation: swipeHintAnim 1.5s infinite;
          pointer-events: none;
        }
        @keyframes swipeHintAnim {
          0%, 100% { transform: translateY(-50%) translateX(0); opacity: 0.5; }
          50% { transform: translateY(-50%) translateX(-6px); opacity: 1; }
        }
      </style>

      <div id="notif-list-container" style="max-height: 350px; overflow-y: auto; padding-right: 5px; overflow-x: hidden;">
        @auth
          @php $semua_notif = \App\Models\UserNotification::where('user_id', auth()->id())->latest()->take(5)->get(); @endphp
          @forelse($semua_notif as $notif)
            <div id="notif-item-{{ $notif->id }}" class="swipe-item" data-id="{{ $notif->id }}">
              <div class="swipe-delete-bg">
                <i class="fas fa-trash-alt"></i>
              </div>
              <div class="swipe-content-wrapper" style="cursor: grab;">
                <strong style="color: var(--gold-crayola); display: block; font-size: 14px; padding-right: 25px;">{{ $notif->title }}</strong>
                <p style="margin: 6px 0 0 0; font-size: 13px; color: #ccc; line-height: 1.5;">{{ $notif->message }}</p>
                <span style="font-size: 11px; color: #888; display: block; margin-top: 8px;"><i class="fas fa-clock"></i> {{ $notif->created_at->diffForHumans() }}</span>
                <div class="swipe-hint"><i class="fas fa-angle-double-left"></i></div>
              </div>
            </div>
          @empty
            <div id="empty-notif" style="text-align: center; padding: 30px 0;">
              <i class="fas fa-bell-slash" style="color: #444; font-size: 32px; margin-bottom: 10px;"></i>
              <p style="color: #888; font-size: 13px;">Belum ada notifikasi.</p>
            </div>
          @endforelse
        @endauth
      </div>
    </div>
  </div>

  <!-- CUSTOM CONFIRM MODAL (ALA ADMIN) -->
  <div id="customConfirmModal" class="auth-modal-overlay" style="z-index: 9999999;">
    <div class="auth-modal-box" style="max-width: 350px; text-align: center; padding: 30px 20px;">
      <i class="fas fa-exclamation-triangle" style="font-size: 45px; color: #ef4444; margin-bottom: 15px; drop-shadow: 0 0 10px rgba(239, 68, 68, 0.4);"></i>
      <h3 style="color: #fff; font-size: 18px; margin-bottom: 10px; font-family: 'DM Sans', sans-serif;">Konfirmasi Hapus</h3>
      <p id="confirmMessage" style="color: #ccc; font-size: 14px; margin-bottom: 25px;">Apakah kamu yakin ingin menghapus data ini?</p>
      <form id="deleteForm" method="POST" action="">
        @csrf
        @method('DELETE')
        <div style="display: flex; gap: 10px; justify-content: center;">
          <button type="button" onclick="tutupConfirmModal()" style="padding: 10px 20px; border-radius: 6px; border: 1px solid #444; background: transparent; color: #fff; cursor: pointer; transition: 0.3s;">Batal</button>
          <button type="submit" style="padding: 10px 20px; border-radius: 6px; border: none; background: #ef4444; color: #fff; cursor: pointer; font-weight: bold; transition: 0.3s; box-shadow: 0 4px 10px rgba(239,68,68,0.3);">Ya, Hapus</button>
        </div>
      </form>
    </div>
  </div>

  <script>
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
          const tabs = document.querySelectorAll('.auth-tab');
          const forms = document.querySelectorAll('.auth-form');
          tabs.forEach(t => t.classList.remove('active'));
          forms.forEach(f => f.classList.remove('active'));
          if (tab === 'login') { tabs[0].classList.add('active'); document.getElementById('formLogin').classList.add('active'); } 
          else { tabs[1].classList.add('active'); document.getElementById('formRegister').classList.add('active'); }
      }

      function togglePw(inputId, iconElement) {
          const input = document.getElementById(inputId);
          if (input.type === "password") { input.type = "text"; iconElement.classList.replace("fa-eye", "fa-eye-slash"); } 
          else { input.type = "password"; iconElement.classList.replace("fa-eye-slash", "fa-eye"); }
      }

      function checkStrength(pw) {
  const bar = document.getElementById('pwBar');
  const text = document.getElementById('pwText');
  
  if (pw.length === 0) {
    bar.className = 'pw-strength';
    text.className = 'pw-text';
    text.style.display = 'none';
    return;
  }
  
  text.style.display = 'block';
  text.className = 'pw-text show';
  
  if (pw.length < 6) {
    bar.className = 'pw-strength pw-weak';
    text.style.color = '#ef4444';
    text.innerText = '🔴 Lemah (Min. 6 karakter)';
  } else if (pw.length >= 6 && /[A-Z]/.test(pw) && /[0-9]/.test(pw)) {
    bar.className = 'pw-strength pw-strong';
    text.style.color = '#22c55e';
    text.innerText = '🟢 Sangat Kuat!';
  } else if (pw.length >= 6 && (/[A-Z]/.test(pw) || /[0-9]/.test(pw))) {
    bar.className = 'pw-strength pw-medium';
    text.style.color = '#eab308';
    text.innerText = '🟡 Sedang (Campur huruf & angka)';
  } else {
    bar.className = 'pw-strength pw-medium';
    text.style.color = '#eab308';
    text.innerText = '🟡 Sedang';
  }
}

      @if($errors->any()) window.onload = function() { openAuthModal(); } @endif

      function bukaModalRiwayat() {
          document.body.style.overflow = 'hidden'; 
          document.getElementById('modalListRiwayat').classList.add('show');
          fetch("{{ route('pelanggan.api.orders') }}")
              .then(res => res.json())
              .then(data => {
                  const container = document.getElementById('containerDataRiwayat');
                  if(!data || data.length === 0) {
                      container.innerHTML = `<div style="text-align: center; padding: 30px 0;"><i class="fas fa-shopping-bag" style="color: #444; font-size: 32px; margin-bottom: 10px;"></i><p style="color: #888; font-size: 13px;">Kamu belum pernah melakukan pesanan.</p></div>`; return;
                  }
                  let html = '';
                  data.forEach(order => {
                      let badgeColor = order.payment_status === 'paid' ? 'rgba(34, 197, 94, 0.2)' : 'rgba(234, 179, 8, 0.2)';
                      let textColor = order.payment_status === 'paid' ? '#22c55e' : '#eab308';
                      let statusText = order.payment_status === 'paid' ? 'LUNAS' : 'PENDING';
                      
                      let itemsListHtml = '';
                      if (order.items && order.items.length > 0) {
                          order.items.forEach(item => { itemsListHtml += `<div style="display: flex; justify-content: space-between; font-size: 12px; color: #ccc; margin-bottom: 3px;"><span>${item.qty}x ${item.menu_name}</span><span>Rp ${parseInt(item.subtotal).toLocaleString('id-ID')}</span></div>`; });
                      }
                      
                      let detailPelanggan = `
                          <div style="font-size: 11px; color: #aaa; margin-bottom: 8px; line-height: 1.6;">
                              <div><i class="fas fa-user" style="width: 14px;"></i> ${order.name ?? 'Pelanggan'}</div>
                              <div><i class="fas fa-phone" style="width: 14px;"></i> ${order.phone ?? '-'}</div>
                              <div><i class="fas fa-motorcycle" style="width: 14px;"></i> Tipe: <b style="color:#fff;">${(order.delivery_type || 'Bawa Pulang').toUpperCase()}</b></div>
                              ${order.note ? `<div style="color: var(--gold-crayola);"><i class="fas fa-sticky-note" style="width: 14px;"></i> Catatan: ${order.note}</div>` : ''}
                          </div>
                      `;

                      html += `
                          <div style="padding: 14px; background: rgba(255,255,255,0.05); border-radius: 8px; margin-bottom: 12px; border: 1px solid rgba(255,255,255,0.1); position: relative;">
                              <button onclick="konfirmasiHapus('riwayat', ${order.id})" style="position: absolute; top: 12px; right: 12px; background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239,68,68,0.3); color: #ef4444; border-radius: 4px; padding: 4px 8px; cursor: pointer; font-size: 11px; transition: 0.3s;"><i class="fas fa-trash"></i></button>
                              
                              <div style="margin-bottom: 6px; padding-right: 30px;">
                                  <span style="color: var(--gold-crayola); font-weight: bold; font-size: 13px; display: block; margin-bottom: 4px;">#Order ID: ${order.id}</span>
                                  <span style="background: ${badgeColor}; color: ${textColor}; padding: 2px 8px; border-radius: 10px; font-size: 10px; font-weight: bold;">${statusText}</span>
                                  <span style="font-size: 11px; color: #888; margin-left: 6px;"><i class="fas fa-clock"></i> ${new Date(order.created_at).toLocaleString('id-ID')}</span>
                              </div>
                              
                              ${detailPelanggan}

                              <div style="background: rgba(0,0,0,0.3); padding: 8px; border-radius: 6px; margin-bottom: 8px;">
                                  <div style="font-size: 11px; color: var(--gold-crayola); font-weight: bold; margin-bottom: 4px;">Daftar Menu:</div>
                                  ${itemsListHtml}
                              </div>
                              
                              <div style="font-size: 12px; color: #aaa; margin-bottom: 2px;">Metode Pembayaran: <b style="color:#fff;">${(order.payment_method || '').toUpperCase()}</b></div>
                              <div style="font-size: 14px; font-weight: bold; color: #fff; display: flex; justify-content: space-between; align-items: center; margin-top: 6px; border-top: 1px dashed rgba(255,255,255,0.1); padding-top: 6px;">
                                  <span>Total Pesanan:</span>
                                  <span style="color: #22c55e;">Rp ${parseInt(order.total).toLocaleString('id-ID')}</span>
                              </div>
                          </div>`;
                  });
                  container.innerHTML = html;
              });
      }
      function tutupModalRiwayat() { document.body.style.overflow = 'auto'; document.getElementById('modalListRiwayat').classList.remove('show'); }

      function bukaModalNotif() {
          document.body.style.overflow = 'hidden'; document.getElementById('modalListNotif').classList.add('show');
          const badge = document.getElementById('badgeNotifHijau'); if(badge) badge.style.display = 'none';
          fetch("{{ route('pelanggan.notif.read') }}", { method: "POST", headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}", "Content-Type": "application/json" } });
      }
      function tutupModalNotif() { document.body.style.overflow = 'auto'; document.getElementById('modalListNotif').classList.remove('show'); }

      // FUNGSI KONFIRMASI HAPUS CUSTOM MODAL
      function konfirmasiHapus(tipe, id) {
          document.getElementById('customConfirmModal').classList.add('show');
          const form = document.getElementById('deleteForm');
          const msg = document.getElementById('confirmMessage');
          
          if (tipe === 'riwayat') {
              msg.innerHTML = 'Apakah kamu yakin ingin menghapus <b>Riwayat Pesanan</b> ini?';
              form.action = `/pelanggan/pesanan/${id}`; // Pastikan rute ini sesuai dengan route Laravel kamu
          } else if (tipe === 'notif') {
              msg.innerHTML = 'Apakah kamu yakin ingin menghapus <b>Notifikasi</b> ini?';
              form.action = `/pelanggan/notif/${id}`; // Pastikan rute ini sesuai dengan route Laravel kamu
          }
      }

      function tutupConfirmModal() { document.getElementById('customConfirmModal').classList.remove('show'); }
      
      window.addEventListener('click', function(e) {
          if (e.target === document.getElementById('authModal')) closeAuthModal();
          if (e.target === document.getElementById('modalListRiwayat')) tutupModalRiwayat();
          if (e.target === document.getElementById('modalListNotif')) tutupModalNotif();
          if (e.target === document.getElementById('customConfirmModal')) tutupConfirmModal();
      });

      function hapusNotifInstan(id) {
        const el = document.getElementById(`notif-item-${id}`);
        if (!el) return;

        // Animasi kayak notif pesan: mengecil + hilang
        el.style.transition = 'height 0.25s ease, margin 0.25s ease, opacity 0.25s ease';
        el.style.height = el.offsetHeight + 'px'; // kunci tinggi
        el.style.overflow = 'hidden';

        // Paksa reflow biar transisi jalan
        void el.offsetHeight;

        el.classList.add('hidden');

        setTimeout(() => {
          // Hapus item dari DOM
          el.remove();

          // Cek sisa notifikasi, tampilkan pesan kosong jika habis
          const container = document.getElementById('notif-list-container');
          const remaining = container.querySelectorAll('.swipe-item:not(.hidden)').length;
          if (remaining === 0 && !document.getElementById('empty-notif')) {
            container.innerHTML = `
              <div id="empty-notif" style="text-align: center; padding: 30px 0; animation: fadeIn 0.5s;">
                <i class="fas fa-bell-slash" style="color: #444; font-size: 32px; margin-bottom: 10px;"></i>
                <p style="color: #888; font-size: 13px;">Belum ada notifikasi.</p>
              </div>
            `;
          }
        }, 300);

        // Hapus di server (background)
        fetch(`/pelanggan/notif/${id}`, {
          method: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          }
        }).catch(err => console.error("Gagal hapus notif:", err));
      }

      // ========== SWIPE-TO-DELETE NOTIFIKASI (DESKTOP + MOBILE) ==========
    document.addEventListener('DOMContentLoaded', function() {
      const container = document.getElementById('notif-list-container');
      if (!container) return;

      // Event listener pakai delegation biar item baru juga ke-detect
      container.addEventListener('mousedown', startSwipe);
      container.addEventListener('touchstart', startSwipe, { passive: false });

      let currentItem = null;
      let startX = 0;
      let currentX = 0;
      let isDragging = false;
      let wrapper = null;

      function startSwipe(e) {
        // Cari elemen .swipe-content-wrapper
        let target = e.target.closest('.swipe-content-wrapper');
        if (!target) return;
        if (e.type === 'mousedown' && e.button !== 0) return;

        const item = target.closest('.swipe-item');
        if (!item) return;

        // Jangan ganggu jika sedang animasi hidden
        if (item.classList.contains('hidden')) return;

        currentItem = item;
        wrapper = target;
        isDragging = true;

        const pos = getPos(e);
        startX = pos.x;
        currentX = 0;

        // Biarkan elemen tidak ter-select
        wrapper.style.transition = 'none';
        wrapper.style.cursor = 'grabbing';

        // Listener global
        document.addEventListener('mousemove', onSwipe);
        document.addEventListener('mouseup', endSwipe);
        document.addEventListener('touchmove', onSwipe, { passive: false });
        document.addEventListener('touchend', endSwipe, { passive: false });

        // Cegah scroll saat swipe
        e.preventDefault();
      }

      function getPos(e) {
        if (e.touches) {
          return { x: e.touches[0].clientX, y: e.touches[0].clientY };
        }
        return { x: e.clientX, y: e.clientY };
      }

      function onSwipe(e) {
        if (!isDragging || !currentItem || !wrapper) return;
        e.preventDefault();

        const pos = getPos(e);
        const deltaX = pos.x - startX;

        // Hanya geser ke kiri (negatif), tidak boleh ke kanan
        let newX = Math.min(0, deltaX);
        // Batasi maksimal -80px (biar tidak kelewatan)
        newX = Math.max(-80, newX);

        currentX = newX;
        wrapper.style.transform = `translateX(${newX}px)`;

        // Efek opacity background delete (opsional)
        const pct = Math.abs(newX) / 80;
        const bg = currentItem.querySelector('.swipe-delete-bg');
        if (bg) {
          bg.style.opacity = Math.min(1, pct * 1.5);
        }
      }

      function endSwipe(e) {
        if (!isDragging || !currentItem || !wrapper) {
          cleanup();
          return;
        }

        // Hapus listener global
        document.removeEventListener('mousemove', onSwipe);
        document.removeEventListener('mouseup', endSwipe);
        document.removeEventListener('touchmove', onSwipe);
        document.removeEventListener('touchend', endSwipe);

        const threshold = 50; // px
        if (Math.abs(currentX) > threshold) {
          // Hapus notifikasi!
          const id = currentItem.dataset.id;
          if (id) {
            hapusNotifInstan(id);
          }
        } else {
          // Kembali ke posisi semula
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
        currentItem = null;
        wrapper = null;
        currentX = 0;
      }

      // Selesaikan jika mouse keluar dari window
      document.addEventListener('mouseleave', function() {
        if (isDragging) {
          endSwipe({});
        }
      });
    });
  </script>

</body>
</html>