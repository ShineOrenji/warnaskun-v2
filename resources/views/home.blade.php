<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- 
    - primary meta tags
  -->
  <title>Warung Nasi Kuning Ibu Opik</title>
  <meta name="title" content="Warung Nasi Kuning Ibu Opik - Nikmat & Khas">
  <meta name="description" content="Warung Nasi Kuning Ibu Opik - Cita rasa tradisional yang menggugah selera">

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet">
  
  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/login-pelanggan.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.0/css/all.min.css">

  <!-- 
    - preload images
  -->
  <link rel="preload" as="image" href="./assets/images/hero-slider-1.png">
  <link rel="preload" as="image" href="./assets/images/hero-slider-2.jpg">
  <link rel="preload" as="image" href="./assets/images/hero-slider-3.png">

</head>

<body id="top">

  <!-- 
    - #PRELOADER
  -->

  <div class="preload" data-preaload>
    <div class="circle"></div>
    <p class="text">Ibu Opik</p>
  </div>

  <!-- 
    - #TOP BAR
  -->

  <div class="topbar">
    <div class="container">

      <address class="topbar-item">
        <div class="icon">
          <ion-icon name="location-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span">
          Kp. Cimuntuk RT 01/01, Jl. Raya Sukatani
        </span>
      </address>

      <div class="separator"></div>

      <div class="topbar-item item-2">
        <div class="icon">
          <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span">Setiap Hari : 08.00 - 23.00</span>
      </div>

      <a href="tel:+6285559150809" class="topbar-item link">
        <div class="icon">
          <ion-icon name="call-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span">+62 855 915 0809</span>
      </a>

      <div class="separator"></div>

      <a href="mailto:fahmirhamadan5@gmail.com" class="topbar-item link">
        <div class="icon">
          <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span">fahmirhamadan5@gmail.com</span>
      </a>

    </div>
  </div>

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
            <a href="index.html" class="navbar-link hover-underline active" data-nav-link>
              <div class="separator"></div>
              <span class="span">Beranda</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="#menu" class="navbar-link hover-underline" data-nav-link>
              <div class="separator"></div>
              <span class="span">Menu</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="#about" class="navbar-link hover-underline" data-nav-link>
              <div class="separator"></div>
              <span class="span">Tentang Kami</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="#reservasi" class="navbar-link hover-underline" data-nav-link>
              <div class="separator"></div>
              <span class="span">Reservasi</span>
            </a>
          </li>

          <li class="navbar-item">
              <a href="{{ route('customer.guide') }}" class="navbar-link hover-underline" data-nav-link>
                  <div class="separator"></div>
                  <span class="span">Panduan</span>
              </a>
          </li>

          <li class="navbar-item">
            <a href="#contact" class="navbar-link hover-underline" data-nav-link>
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

      <!-- ============================================ -->
      <!-- TOMBOL LOGIN / DROPDOWN PROFIL & NOTIFIKASI -->
      <!-- ============================================ -->
      @auth
          @php
              $unread_notifs = \App\Models\UserNotification::where('user_id', auth()->id())->where('is_read', false)->count();
              $semua_notif = \App\Models\UserNotification::where('user_id', auth()->id())->latest()->take(5)->get();
          @endphp

          <div class="profile-dropdown">
              <!-- TRIGGER FOTO PROFIL -->
              <div class="profile-trigger">
                  <div style="position: relative; display: inline-block;">
                      <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=d4a843&color=000&bold=true" alt="Avatar" class="profile-avatar">
                      
                      @if($unread_notifs > 0)
                          <span id="badgeNotifHijau" style="position: absolute; top: -4px; right: -4px; background: #22c55e; color: white; font-size: 10px; font-weight: bold; min-width: 18px; height: 18px; display: flex; align-items: center; justify-content: center; padding: 0 4px; border-radius: 10px; border: 2px solid #1e1e1e; box-sizing: content-box;">
                              {{ $unread_notifs > 99 ? '99+' : $unread_notifs }}
                          </span>
                      @endif
                  </div>
                  <span class="profile-name">{{ explode(' ', Auth::user()->name)[0] }}</span>
                  <i class="fas fa-chevron-down" style="color: var(--gold-crayola, #d4a843); font-size: 12px;"></i>
              </div>
              
              <!-- DROPDOWN MENU -->
              <div class="profile-menu">
                  <div style="padding: 10px 20px; border-bottom: 1px solid rgba(255,255,255,0.1); margin-bottom: 8px;">
                      <div style="font-size: 12px; color: #888;">Masuk sebagai</div>
                      <div style="font-size: 14px; color: #fff; font-weight: 600;">{{ Auth::user()->email ?? Auth::user()->phone }}</div>
                  </div>
                  
                  <!-- 1. Menu Riwayat (Buka Modal) -->
                  <a href="javascript:void(0)" onclick="bukaModalRiwayat()" class="profile-menu-item">
                      <i class="fas fa-history"></i> Riwayat Pesanan
                  </a>
                  
                  <!-- 2. Menu Notifikasi (Buka Modal) -->
                  <a href="javascript:void(0)" onclick="bukaModalNotif()" class="profile-menu-item">
                      <i class="fas fa-bell"></i> Notifikasi
                  </a>
                  
                  <div class="profile-menu-divider"></div>
                  
                  <!-- 3. Menu Keluar -->
                  <form action="{{ route('pelanggan.logout') }}" method="POST" style="margin: 0;">
                      @csrf
                      <button type="submit" class="profile-menu-item btn-logout-dropdown">
                          <i class="fas fa-sign-out-alt"></i> Keluar
                      </button>
                  </form>
              </div>
          </div>

          <!-- ============================================ -->
          <!-- MODAL RIWAYAT PESANAN -->
          <!-- ============================================ -->
          <div id="modalListRiwayat" class="auth-modal-overlay">
              <div class="auth-modal-box" style="padding: 20px; max-width: 450px; text-align: left;">
                  <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 10px; margin-bottom: 15px;">
                      <h3 style="color: #fff; font-size: 16px; font-weight: bold; margin: 0;"><i class="fas fa-history" style="color: var(--gold-crayola); margin-right: 8px;"></i> Riwayat Pesanan Saya</h3>
                      <button class="auth-close-btn" style="position: static;" onclick="tutupModalRiwayat()">&times;</button>
                  </div>
                  
                  <div id="containerDataRiwayat" style="max-height: 380px; overflow-y: auto; padding-right: 5px;">
                      <div style="text-align: center; padding: 30px 0; color: #888;">
                          <i class="fas fa-spinner fa-spin" style="font-size: 24px; color: var(--gold-crayola);"></i>
                          <p style="margin-top: 10px; font-size: 13px;">Memuat riwayat...</p>
                      </div>
                  </div>
              </div>
          </div>

          <!-- ============================================ -->
          <!-- MODAL DAFTAR, RIWAYAT & LONCENG NOTIFIKASI -->
          <!-- ============================================ -->
          <div id="modalListNotif" class="auth-modal-overlay">
              <div class="auth-modal-box" style="padding: 20px; max-width: 400px; text-align: left;">
                  <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 10px; margin-bottom: 15px;">
                      <h3 style="color: #fff; font-size: 16px; font-weight: bold; margin: 0;"><i class="fas fa-bell" style="color: var(--gold-crayola); margin-right: 8px;"></i> Notifikasi Saya</h3>
                      <button class="auth-close-btn" style="position: static;" onclick="tutupModalNotif()">&times;</button>
                  </div>
                  
                  <div style="max-height: 350px; overflow-y: auto; padding-right: 5px;">
                      @forelse($semua_notif as $notif)
                          <div style="padding: 12px; background: rgba(255,255,255,0.05); border-radius: 8px; margin-bottom: 8px; border-left: 3px solid var(--gold-crayola);">
                              <strong style="color: var(--gold-crayola); display: block; font-size: 14px;">{{ $notif->title }}</strong>
                              <p style="margin: 6px 0 0 0; font-size: 13px; color: #ccc; line-height: 1.5;">{{ $notif->message }}</p>
                              <span style="font-size: 11px; color: #888; display: block; margin-top: 8px;"><i class="fas fa-clock"></i> {{ $notif->created_at->diffForHumans() }}</span>
                          </div>
                      @empty
                          <div style="text-align: center; padding: 30px 0;">
                              <i class="fas fa-bell-slash" style="color: #444; font-size: 32px; margin-bottom: 10px;"></i>
                              <p style="color: #888; font-size: 13px;">Belum ada notifikasi.</p>
                          </div>
                      @endforelse
                  </div>
              </div>
          </div>

          <script>
              // Modal Riwayat
              function bukaModalRiwayat() {
                  document.getElementById('modalListRiwayat').classList.add('show');
                  
                  // Tarik data pakai Fetch API secara instan
                  fetch("{{ route('pelanggan.api.orders') }}")
                      .then(res => res.json())
                      .then(data => {
                          const container = document.getElementById('containerDataRiwayat');
                          if(data.length === 0) {
                              container.innerHTML = `
                                  <div style="text-align: center; padding: 30px 0;">
                                      <i class="fas fa-shopping-bag" style="color: #444; font-size: 32px; margin-bottom: 10px;"></i>
                                      <p style="color: #888; font-size: 13px;">Kamu belum pernah melakukan pesanan.</p>
                                  </div>`;
                              return;
                          }

                          let html = '';
                          data.forEach(order => {
                              let badgeColor = order.payment_status === 'paid' ? 'rgba(34, 197, 94, 0.2)' : 'rgba(234, 179, 8, 0.2)';
                              let textColor = order.payment_status === 'paid' ? '#22c55e' : '#eab308';
                              let statusText = order.payment_status === 'paid' ? 'LUNAS' : 'PENDING';

                              // Looping daftar menu di dalam pesanan ini
                              let itemsListHtml = '';
                              if (order.items && order.items.length > 0) {
                                  order.items.forEach(item => {
                                      itemsListHtml += `
                                          <div style="display: flex; justify-content: space-between; font-size: 12px; color: #ccc; margin-bottom: 3px;">
                                              <span>${item.qty}x ${item.menu_name}</span>
                                              <span>Rp ${parseInt(item.subtotal).toLocaleString('id-ID')}</span>
                                          </div>
                                      `;
                                  });
                              }

                              html += `
                                  <div style="padding: 14px; background: rgba(255,255,255,0.05); border-radius: 8px; margin-bottom: 12px; border: 1px solid rgba(255,255,255,0.1);">
                                      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                                          <span style="color: var(--gold-crayola); font-weight: bold; font-size: 13px;">#Order ID: ${order.id}</span>
                                          <span style="background: ${badgeColor}; color: ${textColor}; padding: 2px 8px; border-radius: 10px; font-size: 10px; font-weight: bold;">${statusText}</span>
                                      </div>
                                      <div style="font-size: 11px; color: #888; margin-bottom: 8px;"><i class="fas fa-clock"></i> ${new Date(order.created_at).toLocaleString('id-ID')}</div>
                                      
                                      <!-- Kotak Rincian Menu -->
                                      <div style="background: rgba(0,0,0,0.3); padding: 8px; border-radius: 6px; margin-bottom: 8px;">
                                          <div style="font-size: 11px; color: var(--gold-crayola); font-weight: bold; margin-bottom: 4px;">Daftar Menu:</div>
                                          ${itemsListHtml}
                                      </div>

                                      <div style="font-size: 12px; color: #aaa; margin-bottom: 2px;">Metode: <b style="color:#fff;">${order.payment_method.toUpperCase()}</b> (${order.delivery_type.toUpperCase()})</div>
                                      <div style="font-size: 14px; font-weight: bold; color: #fff; display: flex; justify-content: space-between; align-items: center; margin-top: 6px; border-top: 1px dashed rgba(255,255,255,0.1); padding-top: 6px;">
                                          <span>Total:</span>
                                          <span style="color: #22c55e;">Rp ${parseInt(order.total).toLocaleString('id-ID')}</span>
                                      </div>
                                  </div>
                              `;
                          });
                          container.innerHTML = html;
                      });
              }

              function tutupModalRiwayat() {
                  document.getElementById('modalListRiwayat').classList.remove('show');
              }

              // Modal Notifikasi
              function bukaModalNotif() {
                  document.getElementById('modalListNotif').classList.add('show');
                  const badge = document.getElementById('badgeNotifHijau');
                  if(badge) badge.style.display = 'none';

                  fetch("{{ route('pelanggan.notif.read') }}", {
                      method: "POST",
                      headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}", "Content-Type": "application/json" }
                  });
              }

              function tutupModalNotif() {
                  document.getElementById('modalListNotif').classList.remove('show');
              }
              
              // Tutup modal jika klik di luar kotak
              window.addEventListener('click', function(e) {
                  if (e.target === document.getElementById('modalListRiwayat')) tutupModalRiwayat();
                  if (e.target === document.getElementById('modalListNotif')) tutupModalNotif();
              });
          </script>
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

  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero text-center" aria-label="beranda" id="home">

        <ul class="hero-slider" data-hero-slider>

          <li class="slider-item active" data-hero-slider-item>

            <div class="slider-bg">
              <img src="./assets/images/hero-slider-1.png" width="1880" height="950" alt="" class="img-cover">
            </div>

            <p class="label-2 section-subtitle slider-reveal">Tradisional & Higienis</p>

            <h1 class="display-1 hero-title slider-reveal">
              Untuk cinta <br>
              makanan lezat
            </h1>

            <p class="body-2 hero-text slider-reveal">
              Datang bersama keluarga & rasakan kebahagiaan makanan yang lezat
            </p>

            <a href="#menu" class="btn btn-primary slider-reveal">
              <span class="text text-1">Lihat Menu</span>

              <span class="text text-2" aria-hidden="true">Lihat Menu</span>
            </a>

          </li>

          <li class="slider-item" data-hero-slider-item>

            <div class="slider-bg">
              <img src="./assets/images/hero-slider-2.png" width="1880" height="950" alt="" class="img-cover">
            </div>

            <p class="label-2 section-subtitle slider-reveal">Pengalaman yang Menyenangkan</p>

            <h1 class="display-1 hero-title slider-reveal">
              Rasa Terinspirasi <br>
              oleh Musim
            </h1>

            <p class="body-2 hero-text slider-reveal">
              Datang bersama keluarga & rasakan kebahagiaan makanan yang lezat
            </p>

            <a href="#menu" class="btn btn-primary slider-reveal">
              <span class="text text-1">Lihat Menu</span>

              <span class="text text-2" aria-hidden="true">Lihat Menu</span>
            </a>

          </li>

          <li class="slider-item" data-hero-slider-item>

            <div class="slider-bg">
              <img src="./assets/images/hero-slider-3.png" width="1880" height="950" alt="" class="img-cover">
            </div>

            <p class="label-2 section-subtitle slider-reveal">Lezat & Menggugah Selera</p>

            <h1 class="display-1 hero-title slider-reveal">
              Di mana setiap rasa <br>
              memiliki cerita
            </h1>

            <p class="body-2 hero-text slider-reveal">
              Datang bersama keluarga & rasakan kebahagiaan makanan yang lezat
            </p>

            <a href="#menu" class="btn btn-primary slider-reveal">
              <span class="text text-1">Lihat Menu</span>

              <span class="text text-2" aria-hidden="true">Lihat Menu</span>
            </a>

          </li>

        </ul>

        <button class="slider-btn prev" aria-label="geser ke sebelumnya" data-prev-btn>
          <ion-icon name="chevron-back"></ion-icon>
        </button>

        <button class="slider-btn next" aria-label="geser ke berikutnya" data-next-btn>
          <ion-icon name="chevron-forward"></ion-icon>
        </button>

        <a href="#reservasi" class="hero-btn has-after">
          <img src="./assets/images/hero-icon.png" width="48" height="48" alt="ikon pemesanan">

          <span class="label-2 text-center span">Pesan Meja</span>
        </a>

      </section>

      <!-- ============================================ -->
      <!-- RUNNING TEXT / MARQUEE - DI BAWAH HERO       -->
      <!-- ============================================ -->
      <section class="running-text-section">
          <div class="running-text-wrapper">
              <div class="running-text-track">
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Spesial
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Es Teh Manis
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Originale
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Telur Balado
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Es Teh Manis
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Telur Dadar Spesial
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Sambal Tomatss
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Komplit
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Oreg Tempe
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Mihun sohun
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Originale
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Telur Balado
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Es Jeruk
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Sambal Tomatss
                  </span>
              </div>
          </div>
      </section>

      <!-- 
        - #ABOUT
      -->

      <section class="section about text-center" aria-labelledby="about-label" id="about">
        <div class="container">

          <div class="about-content">

            <p class="label-2 section-subtitle" id="about-label">Cerita Kami</p>

            <h2 class="headline-1 section-title">Setiap Rasa Memiliki Cerita</h2>

            <p class="section-text">
              Warung Nasi Kuning Ibu Opik hadir sejak 1950 dengan resep nasi kuning khas yang diwariskan turun-temurun. 
              Setiap bumbu dipilih dengan cermat untuk menciptakan cita rasa yang autentik dan menggugah selera.
            </p>

            <div class="contact-label">Pesan Lewat Telepon</div>

            <a href="tel:+6285559150809" class="body-1 contact-number hover-underline">+62 855 5915 0809</a>

            <a href="#about" class="btn btn-primary">
              <span class="text text-1">Selengkapnya</span>

              <span class="text text-2" aria-hidden="true">Selengkapnya</span>
            </a>

          </div>

          <figure class="about-banner">

            <img src="./assets/images/logo.png" width="570" height="570" loading="lazy" alt="tentang kami"
              class="w-100" data-parallax-item data-parallax-speed="1">

            {{-- <div class=" has-before" data-parallax-item data-parallax-speed="1.75">
              <img src="./assets/images/logo.png" width="285" height="285" loading="lazy" alt=""
                class="w-100">
            </div> BACKUP YG BAWAH --}}

            <div class=" has-before" data-parallax-item data-parallax-speed="1.75">
              <img src="./assets/images/logo.png" width="285" height="285" loading="lazy" alt=""
                class="w-100">
            </div>

            <div class="abs-img abs-img-2 has-before">
              <img src="./assets/images/badge-2.png" width="133" height="134" loading="lazy" alt="">
            </div>

          </figure>

          <img src="./assets/images/shape-3.png" width="197" height="194" loading="lazy" alt="" class="shape">

        </div>
      </section>

      <!-- ============================================ -->
      <!-- RUNNING TEXT / MARQUEE - DI BAWAH HERO       -->
      <!-- ============================================ -->
      <section class="running-text-section">
          <div class="running-text-wrapper">
              <div class="running-text-track">
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Spesial
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Es Teh Manis
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Originale
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Telur Balado
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Es Teh Manis
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Telur Dadar Spesial
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Sambal Tomatss
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Komplit
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Oreg Tempe
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Mihun sohun
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Originale
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Telur Balado
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Es Jeruk
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Sambal Tomatss
                  </span>
              </div>
          </div>
      </section>

      <!-- 
        - #SPECIAL DISH
      -->

      <section class="special-dish text-center" aria-labelledby="dish-label">

        <div class="special-dish-banner">
          <img src="./assets/images/hero-slider-3.png" width="940" height="900" loading="lazy" alt="menu spesial"
            class="img-cover">
        </div>

        <div class="special-dish-content bg-black-10">
          <div class="container">

            <img src="./assets/images/badge-1.png" width="28" height="41" loading="lazy" alt="lencana" class="abs-img">

            <p class="section-subtitle label-2">Menu Spesial</p>

            <h2 class="headline-1 section-title">Nasi Kuning Komplit</h2>

            <p class="section-text">
              Nasi kuning khas dengan ayam goreng, telur, sambal, dan berbagai lauk pilihan. 
              Disajikan dengan bumbu rahasia Ibu Opik yang membuatnya istimewa.
            </p>

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

      <!-- - #MENU -->

      <section class="section menu" aria-label="menu-label" id="menu">
        <div class="container">

          <p class="section-subtitle text-center label-2">Pilihan Spesial</p>

          <h2 class="headline-1 section-title text-center">Menu Lezat Kami</h2>

          <p class="section-text text-center menu-intro">
            Nikmati cita rasa autentik nasi kuning khas Ibu Opik dengan bahan pilihan terbaik
          </p>

          <!-- Menu Filter / Kategori -->
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

                    <img src="{{ asset('uploads/menu/' . $menu->image) }}"
                        alt="{{ $menu->name }}"
                        width="300"
                        height="300"
                        loading="lazy">

                    @if($menu->stock > 0)
                        <span class="menu-badge">
                            Tersedia
                        </span>
                    @else
                        <span class="menu-badge menu-badge-danger">
                            Habis
                        </span>
                    @endif
                </div>

                <div class="menu-item-content">

                    <div class="menu-item-header">

                        <h3 class="menu-item-title">
                            {{ $menu->name }}
                        </h3>

                        <span class="menu-item-price">
                            Rp {{ number_format($menu->price,0,',','.') }}
                        </span>

                    </div>

                    <p class="menu-item-description">
                        {{ $menu->description }}
                    </p>

                    <div class="menu-item-footer">

                        <span class="menu-item-rating">
                            {{ ucfirst($menu->category) }}
                        </span>

                        @if($menu->stock > 0)
                          <form action="{{ route('cart.add', $menu->id) }}" method="POST">
                              @csrf
                              <button type="submit" class="btn-order">
                                  <ion-icon name="cart-outline"></ion-icon>
                                  <span>Pesan</span>
                              </button>
                          </form>

                          @else

                          <button
                              class="btn-order btn-order-2"
                              disabled
                              style="opacity:.6;cursor:not-allowed;">

                              <ion-icon name="close-circle-outline"></ion-icon>
                              <span>Stok Habis</span>
                          </button>
                          @endif
                    </div>
            </div>

          </div>

          @endforeach

          </div>

          <p class="menu-text text-center">
            Setiap hari mulai <span class="span">08.00</span> sampai <span class="span">23.00</span>
          </p>

          <img src="./assets/images/shape-5.png" width="921" height="1036" loading="lazy" alt="bentuk"
            class="shape shape-2 move-anim">
          <img src="./assets/images/shape-6.png" width="343" height="345" loading="lazy" alt="bentuk"
            class="shape shape-3 move-anim">

        </div>
      </section>

      <!-- ============================================ -->
      <!-- RUNNING TEXT / MARQUEE - DI BAWAH HERO       -->
      <!-- ============================================ -->
      <section class="running-text-section">
          <div class="running-text-wrapper">
              <div class="running-text-track">
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Spesial
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Es Teh Manis
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Originale
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Telur Balado
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Es Teh Manis
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Telur Dadar Spesial
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Sambal Tomatss
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Komplit
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Oreg Tempe
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Mihun sohun
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Originale
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Telur Balado
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Es Jeruk
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Sambal Tomatss
                  </span>
              </div>
          </div>
      </section>

      <!-- 
        - #TESTIMONIALS
      -->

      <section class="section testi text-center has-bg-image"
        style="background-image: url('./assets/images/quotes-bg.png')" aria-label="testimoni">
        <div class="container">

          <div class="quote">”</div>

          <p class="headline-2 testi-text">
            Nasi Kuning Paling Mantap se-Galaxy Andromeda
          </p>

          <div class="wrapper">
            <div class="separator"></div>
            <div class="separator"></div>
            <div class="separator"></div>
          </div>
        </div>
      </section>

      <!-- 
        - #RESERVATION
      -->

      <section class="reservation">
        <div class="container" id="reservasi">

          <div class="form reservation-form bg-black-10">

            <form action="{{ route('reservation.store') }}" method="POST" class="form-left">
            @csrf

              <h2 class="headline-1 text-center">Booking Tempat</h2>

              <p class="form-text text-center">
                Pemesanan <a href="tel:+6285559150809" class="link">+62 855 5915 0809</a>
                atau isi formulir di bawah ini
              </p>

              <div class="input-wrapper">
                <input type="text" name="name" placeholder="Nama Anda" autocomplete="off" class="input-field">

                <input type="tel" name="phone" placeholder="Nomor Telepon" autocomplete="off" class="input-field">
              </div>

              <div class="input-wrapper">

                <div class="icon-wrapper">
                  <ion-icon name="person-outline" aria-hidden="true"></ion-icon>

                  <select name="person" class="input-field">
                    <option value="1">1 Orang</option>
                    <option value="2">2 Orang</option>
                    <option value="3">3 Orang</option>
                    <option value="4">4 Orang</option>
                    <option value="5">5 Orang</option>
                    <option value="6">6 Orang</option>
                    <option value="7">7 Orang</option>
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
                    <option value="08:00am">08 : 00</option>
                    <option value="09:00am">09 : 00</option>
                    <option value="010:00am">10 : 00</option>
                    <option value="011:00am">11 : 00</option>
                    <option value="012:00am">12 : 00</option>
                    <option value="01:00pm">13 : 00</option>
                    <option value="02:00pm">14 : 00</option>
                    <option value="03:00pm">15 : 00</option>
                    <option value="04:00pm">16 : 00</option>
                    <option value="05:00pm">17 : 00</option>
                    <option value="06:00pm">18 : 00</option>
                    <option value="07:00pm">19 : 00</option>
                    <option value="08:00pm">20 : 00</option>
                    <option value="09:00pm">21 : 00</option>
                    <option value="10:00pm">22 : 00</option>
                  </select>

                  <ion-icon name="chevron-down" aria-hidden="true"></ion-icon>
                </div>

              </div>

              <textarea name="message" placeholder="Pesan" autocomplete="off" class="input-field"></textarea>

              <button type="submit" class="btn btn-secondary">
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

              <address class="body-4">
                Kp. Cimuntuk RT 01/01, Jl. Raya Sukatani
              </address>

              <p class="contact-label">JADWAL</p>

              <p class="body-4">
                Senin sampai Jum'at <br>
                08.00 - 20.00
              </p>

              <p class="contact-label">JADWAL</p>

              <p class="body-4">
                Sabtu sampai Minggu <br>
                7.00 - 23.00
              </p>

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

      <!-- ============================================ -->
      <!-- RUNNING TEXT / MARQUEE - DI BAWAH HERO       -->
      <!-- ============================================ -->
      <section class="running-text-section">
          <div class="running-text-wrapper">
              <div class="running-text-track">
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Spesial
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Es Teh Manis
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Originale
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Telur Balado
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Es Teh Manis
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Telur Dadar Spesial
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Sambal Tomatss
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Komplit
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Oreg Tempe
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Mihun sohun
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Originale
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Telur Balado
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Es Jeruk
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Sambal Tomatss
                  </span>
              </div>
          </div>
      </section>

      <!-- 
        - #EVENT
      -->

      <section class="section event bg-black-10" aria-label="acara">
        <div class="container">

          <p class="section-subtitle label-2 text-center">Acara Mendatang</p>

          <h2 class="section-title headline-1 text-center">Soon Aamiin</h2>

          {{-- <ul class="grid-list">

            <li>
              <div class="event-card has-before hover:shine">

                <div class="card-banner img-holder" style="--width: 350; --height: 450;">
                  <img src="./assets/images/event-1.jpg" width="350" height="450" loading="lazy"
                    alt="Rasa yang begitu lezat, Anda akan mencoba menikmatinya dengan mata." class="img-cover">

                  <time class="publish-date label-2" datetime="2022-09-15">15/09/2022</time>
                </div>

                <div class="card-content">
                  <p class="card-subtitle label-2 text-center">Makanan, Rasa</p>

                  <h3 class="card-title title-2 text-center">
                    Rasa yang begitu lezat, Anda akan mencoba menikmatinya dengan mata.
                  </h3>
                </div>

              </div>
            </li>

            <li>
              <div class="event-card has-before hover:shine">

                <div class="card-banner img-holder" style="--width: 350; --height: 450;">
                  <img src="./assets/images/event-2.jpg" width="350" height="450" loading="lazy"
                    alt="Rasa yang begitu lezat, Anda akan mencoba menikmatinya dengan mata." class="img-cover">

                  <time class="publish-date label-2" datetime="2022-09-08">08/09/2022</time>
                </div>

                <div class="card-content">
                  <p class="card-subtitle label-2 text-center">Makanan Sehat</p>

                  <h3 class="card-title title-2 text-center">
                    Rasa yang begitu lezat, Anda akan mencoba menikmatinya dengan mata.
                  </h3>
                </div>

              </div>
            </li>

            <li>
              <div class="event-card has-before hover:shine">

                <div class="card-banner img-holder" style="--width: 350; --height: 450;">
                  <img src="./assets/images/event-3.jpg" width="350" height="450" loading="lazy"
                    alt="Rasa yang begitu lezat, Anda akan mencoba menikmatinya dengan mata." class="img-cover">

                  <time class="publish-date label-2" datetime="2022-09-03">03/09/2022</time>
                </div>

                <div class="card-content">
                  <p class="card-subtitle label-2 text-center">Resep</p>

                  <h3 class="card-title title-2 text-center">
                    Rasa yang begitu lezat, Anda akan mencoba menikmatinya dengan mata.
                  </h3>
                </div>

              </div>
            </li>

          </ul> --}}

          <a href="#" class="btn btn-primary">
            <span class="text text-1">Lihat Blog Kami</span>

            <span class="text text-2" aria-hidden="true">Lihat Blog Kami</span>
          </a>

        </div>
      </section>
    </article>
  </main>

  <!-- ============================================ -->
      <!-- RUNNING TEXT / MARQUEE - DI BAWAH HERO       -->
      <!-- ============================================ -->
      <section class="running-text-section">
          <div class="running-text-wrapper">
              <div class="running-text-track">
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Spesial
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Es Teh Manis
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Originale
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Telur Balado
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Es Teh Manis
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Telur Dadar Spesial
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Sambal Tomatss
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Komplit
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Oreg Tempe
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Mihun sohun
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Nasi Kuning Originale
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Telur Balado
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Es Jeruk
                  </span>
                  <span class="running-text-item">
                      <i class="fa-solid fa-arrows-to-dot"></i> Sambal Tomatss
                  </span>
              </div>
          </div>
      </section>

  <!-- 
    - #FOOTER
  -->

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

  <!-- 
    - #CHECKOUT BUTTON
  -->


  @php
    $cartCount = collect(session('cart', []))->sum('qty');
  @endphp

  <a href="{{ route('checkout') }}"
    class="floating-cart {{ $cartCount > 0 ? 'has-items' : '' }}"
    id="floatingCart"
    aria-label="Lihat Pesanan">

      <i class="fas fa-shopping-cart"></i>

      <!-- TOOLTIP -->
      <span class="cart-tooltip">
          <i class="fas fa-shopping-cart" style="margin-right: 4px; color: var(--gold-crayola);"></i>
          Lihat Pesanan
      </span>

      @if($cartCount > 0)
          <span class="cart-badge" id="floatingCartBadge">
              {{ $cartCount }}
          </span>
      @endif

  </a>

  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn active" aria-label="kembali ke atas" data-back-top-btn>
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
  </a>

  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>
  <script src="./assets/js/menu.js"></script>
  
  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <!-- ============================================ -->
  <!-- TOAST NOTIFICATION - DI TENGAH -->
  <!-- ============================================ -->

  <!-- Overlay -->
  <div id="toast-overlay" class="cart-toast-overlay"></div>

  <!-- Toast -->
  <div id="cart-toast" class="cart-toast">

      <!-- Icon Besar -->
      <div class="cart-toast-icon">
          <i class="fas fa-check"></i>
      </div>

      <!-- Content -->
      <div class="cart-toast-content">
          <div class="cart-toast-title">
              Berhasil Ditambahkan!
          </div>

          <div class="cart-toast-item" id="toast-item-name">
              Nasi Kuning Komplit
          </div>

          <div class="cart-toast-message">
              <i class="fas fa-shopping-cart"></i>
              Masuk ke keranjang belanja kamu
          </div>
      </div>

      <!-- Progress Bar -->
      <div class="toast-progress">
          <div class="progress-fill"></div>
      </div>

  </div>

  <!-- ============================================ -->
  <!-- MODAL LOGIN & REGISTER PELANGGAN -->
  <!-- ============================================ -->
  <style>
      .auth-modal-overlay {
          position: fixed; top: 0; left: 0; width: 100%; height: 100%;
          background: rgba(0, 0, 0, 0.85); backdrop-filter: blur(5px);
          display: none; align-items: center; justify-content: center; z-index: 999999;
          opacity: 0; transition: opacity 0.3s ease;
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
      .auth-tabs { display: flex; border-bottom: 2px solid #333; margin-bottom: 20px; }
      .auth-tab {
          flex: 1; text-align: center; padding: 10px; cursor: pointer;
          font-family: var(--ff-forum, 'Forum', serif); font-size: 20px; color: #888; transition: 0.3s;
      }
      .auth-tab.active { color: var(--gold-crayola, #d4a843); border-bottom: 2px solid var(--gold-crayola, #d4a843); }
      .auth-form { display: none; }
      .auth-form.active { display: block; animation: fadeIn 0.4s ease; }
      .auth-input-group { margin-bottom: 15px; text-align: left; position: relative; }
      .auth-input-group label { display: block; font-size: 14px; margin-bottom: 5px; color: #ccc; }
      .auth-input-group input {
          width: 100%; padding: 12px; background: #222; border: 1px solid #444;
          color: #fff; border-radius: 6px; outline: none; font-family: inherit;
      }
      .auth-input-group input:focus { border-color: var(--gold-crayola, #d4a843); }
      
      /* TOGGLE PASSWORD (MATA) */
      .toggle-password {
          position: absolute; right: 12px; top: 38px; color: #888; cursor: pointer;
      }
      .toggle-password:hover { color: var(--gold-crayola); }

      /* KEKUATAN PASSWORD */
      .pw-strength { height: 4px; border-radius: 2px; margin-top: 5px; transition: 0.3s; width: 0%; }
      .pw-weak { width: 33%; background: #ef4444; }
      .pw-medium { width: 66%; background: #eab308; }
      .pw-strong { width: 100%; background: #22c55e; }
      .pw-text { font-size: 11px; margin-top: 3px; display: none; }

      .auth-submit-btn {
          width: 100%; padding: 12px; background: var(--gold-crayola, #d4a843);
          color: #000; font-weight: bold; border: none; border-radius: 6px;
          cursor: pointer; font-size: 16px; margin-top: 10px; transition: 0.3s; font-family: inherit;
      }
      .auth-submit-btn:hover { background: #b8922f; }
      .auth-alert { background: rgba(239, 68, 68, 0.1); color: #ef4444; padding: 10px; border-radius: 6px; font-size: 13px; margin-bottom: 15px; border: 1px solid rgba(239,68,68,0.3); }
      
      .forgot-password { display: block; text-align: right; font-size: 12px; color: var(--gold-crayola); margin-top: -5px; margin-bottom: 15px; text-decoration: none; }
      .forgot-password:hover { text-decoration: underline; }
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
                  @foreach ($errors->all() as $error)
                      <div>- {{ $error }}</div>
                  @endforeach
              </div>
          @endif

          <!-- FORM LOGIN -->
          <form id="formLogin" class="auth-form active" action="{{ route('pelanggan.login') }}" method="POST">
              @csrf
              <div class="auth-input-group">
                  <label>Email / No WhatsApp</label>
                  <input type="text" name="login_id" required placeholder="Masukkan Email atau No HP">
              </div>
              <div class="auth-input-group">
                  <label>Password</label>
                  <input type="password" id="loginPw" name="password" required placeholder="Masukkan password">
                  <i class="fas fa-eye toggle-password" onclick="togglePw('loginPw', this)"></i>
              </div>
              <a href="#" class="forgot-password" onclick="alert('Fitur Reset Password sedang dalam pengembangan. Silakan hubungi Admin via WhatsApp.')">Lupa Password?</a>
              <button type="submit" class="auth-submit-btn">Masuk ke Akun</button>
          </form>

          <!-- FORM REGISTER -->
          <form id="formRegister" class="auth-form" action="{{ route('pelanggan.register') }}" method="POST">
              @csrf
              <div class="auth-input-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="name" required placeholder="Contoh: Budi Santoso">
              </div>
              <div class="auth-input-group">
                  <label>Email (Opsional)</label>
                  <input type="email" name="email" placeholder="budi@gmail.com (Boleh dikosongkan)">
              </div>
              <div class="auth-input-group">
                  <label>No WhatsApp</label>
                  <input type="tel" name="phone" required placeholder="08xxxxxxxxxx">
              </div>
              <div class="auth-input-group">
                  <label>Password</label>
                  <input type="password" id="regPw" name="password" required minlength="6" placeholder="Minimal 6 karakter" onkeyup="checkStrength(this.value)">
                  <i class="fas fa-eye toggle-password" onclick="togglePw('regPw', this)"></i>
                  <div id="pwBar" class="pw-strength"></div>
                  <div id="pwText" class="pw-text"></div>
              </div>
              <button type="submit" class="auth-submit-btn">Daftar Sekarang</button>
          </form>
      </div>
  </div>

  <!-- ============================================ -->
  <!-- MODAL BACA NOTIFIKASI -->
  <!-- ============================================ -->
  <div id="notifDetailModal" class="auth-modal-overlay">
      <div class="auth-modal-box" style="text-align: center; max-width: 350px;">
          <button class="auth-close-btn" onclick="closeNotifModal()">&times;</button>
          
          <div style="width: 60px; height: 60px; background: rgba(212, 168, 67, 0.15); color: var(--gold-crayola, #d4a843); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 28px; margin: 0 auto 15px;">
              <i class="fas fa-bell"></i>
          </div>
          
          <h3 id="notifModalTitle" style="color: #fff; margin-bottom: 10px; font-size: 18px; font-weight: 600;">Judul Notif</h3>
          
          <p id="notifModalMessage" style="color: #ccc; font-size: 14px; line-height: 1.6; margin-bottom: 20px; padding: 10px; background: rgba(255,255,255,0.05); border-radius: 8px;">
              Pesan notifikasi lengkap di sini.
          </p>
          
          <span id="notifModalTime" style="color: #888; font-size: 12px; display: block; margin-bottom: 15px;"><i class="fas fa-clock"></i> Waktu</span>

          <button onclick="closeNotifModal()" class="auth-submit-btn" style="padding: 10px; font-size: 14px;">Tutup Pesan</button>
      </div>
  </div>

  <script>
      // Fungsi untuk nampilin isi notifikasi ke dalam Modal
      function openNotifModal(title, message, time) {
          document.getElementById('notifModalTitle').innerText = title;
          document.getElementById('notifModalMessage').innerText = message;
          document.getElementById('notifModalTime').innerHTML = '<i class="fas fa-clock"></i> ' + time;
          
          // Buka modalnya
          document.getElementById('notifDetailModal').classList.add('show');
      }

      function closeNotifModal() {
          document.getElementById('notifDetailModal').classList.remove('show');
      }

      // Tutup modal kalau user klik luar kotak
      window.addEventListener('click', function(event) {
          const notifDetailModal = document.getElementById('notifDetailModal');
          if (event.target === notifDetailModal) {
              closeNotifModal();
          }
      });
  </script>

  <script>
      function openAuthModal() { document.getElementById('authModal').classList.add('show'); }
      function closeAuthModal() { document.getElementById('authModal').classList.remove('show'); }
      
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

      // FITUR MATA (SHOW/HIDE PASSWORD)
      function togglePw(inputId, iconElement) {
          const input = document.getElementById(inputId);
          if (input.type === "password") {
              input.type = "text";
              iconElement.classList.remove("fa-eye");
              iconElement.classList.add("fa-eye-slash");
          } else {
              input.type = "password";
              iconElement.classList.remove("fa-eye-slash");
              iconElement.classList.add("fa-eye");
          }
      }

      // FITUR KEKUATAN PASSWORD
      function checkStrength(pw) {
          const bar = document.getElementById('pwBar');
          const text = document.getElementById('pwText');
          text.style.display = 'block';

          if (pw.length === 0) {
              bar.className = 'pw-strength'; text.style.display = 'none';
          } else if (pw.length < 6) {
              bar.className = 'pw-strength pw-weak'; text.style.color = '#ef4444'; text.innerText = 'Lemah (Min. 6 karakter)';
          } else if (pw.length >= 6 && pw.match(/[A-Z]/) && pw.match(/[0-9]/)) {
              bar.className = 'pw-strength pw-strong'; text.style.color = '#22c55e'; text.innerText = 'Sangat Kuat!';
          } else {
              bar.className = 'pw-strength pw-medium'; text.style.color = '#eab308'; text.innerText = 'Sedang';
          }
      }

      // Buka modal otomatis kalau ada error
      @if($errors->any()) window.onload = function() { openAuthModal(); } @endif
  </script>

  <div id="authModal" class="auth-modal-overlay">
      <div class="auth-modal-box">
          <button class="auth-close-btn" onclick="closeAuthModal()">&times;</button>
          
          <div class="auth-tabs">
              <div class="auth-tab active" onclick="switchAuthTab('login')">Masuk</div>
              <div class="auth-tab" onclick="switchAuthTab('register')">Daftar</div>
          </div>

          <!-- Tampilkan Pesan Error Jika Login/Daftar Gagal -->
          @if($errors->any())
              <div class="auth-alert">
                  @foreach ($errors->all() as $error)
                      <div>- {{ $error }}</div>
                  @endforeach
              </div>
          @endif

          <!-- Form Login -->
          <form id="formLogin" class="auth-form active" action="{{ route('pelanggan.login') }}" method="POST">
              @csrf
              <div class="auth-input-group">
                  <label>Email</label>
                  <input type="email" name="email" required placeholder="Masukkan email">
              </div>
              <div class="auth-input-group">
                  <label>Password</label>
                  <input type="password" name="password" required placeholder="Masukkan password">
              </div>
              <button type="submit" class="auth-submit-btn">Masuk ke Akun</button>
          </form>

          <!-- Form Register -->
          <form id="formRegister" class="auth-form" action="{{ route('pelanggan.register') }}" method="POST">
              @csrf
              <div class="auth-input-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="name" required placeholder="Contoh: Budi Santoso">
              </div>
              <div class="auth-input-group">
                  <label>Email</label>
                  <input type="email" name="email" required placeholder="Contoh: budi@gmail.com">
              </div>
              <div class="auth-input-group">
                  <label>No WhatsApp</label>
                  <input type="tel" name="phone" required placeholder="08xxxxxxxxxx">
              </div>
              <div class="auth-input-group">
                  <label>Password</label>
                  <input type="password" name="password" required minlength="6" placeholder="Minimal 6 karakter">
              </div>
              <button type="submit" class="auth-submit-btn">Daftar Sekarang</button>
          </form>
      </div>
  </div>

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
</body>

</html>