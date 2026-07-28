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

  <!-- 
    - preload images
  -->
  <link rel="preload" as="image" href="./assets/images/hero-slider-2.jpg">
  <link rel="preload" as="image" href="./assets/images/hero-slider-2.jpg">
  <link rel="preload" as="image" href="./assets/images/hero-slider-3.jpg">

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
            <a href="#kontak" class="navbar-link hover-underline" data-nav-link>
              <div class="separator"></div>

              <span class="span">Kontak</span>
            </a>
          </li>

        </ul>

        <div class="text-center">
          <p class="headline-1 navbar-title">Kunjungi Kami</p>

          <address class="body-4">
            Kp. Cimuntuk RT 01/01, Jl. Raya Sukatani
          </address>

          <p class="body-4 navbar-text">Buka: 08.00 - 23.00</p>

          <a href="mailto:fahmirhamadan5@gmail.com" class="body-4 sidebar-link">fahmirhamadan5@gmail.com</a>

          <div class="separator"></div>

          <p class="contact-label">Pemesanan</p>

          <a href="tel:+6285559150809" class="body-1 contact-number hover-underline">
            +62 855 5915 0809
          </a>
        </div>

      </nav>

      <a href="{{ route('cart.index') }}" class="btn btn-secondary">

          <span class="text text-1">
              Pesanan
              @if($cartCount > 0)
                  ({{ $cartCount }})
              @endif
          </span>

          <span class="text text-2" aria-hidden="true">
              Pesanan
              @if($cartCount > 0)
                  ({{ $cartCount }})
              @endif
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

            <a href="#" class="btn btn-primary slider-reveal">
              <span class="text text-1">Lihat Menu</span>

              <span class="text text-2" aria-hidden="true">Lihat Menu</span>
            </a>

          </li>

          <li class="slider-item" data-hero-slider-item>

            <div class="slider-bg">
              <img src="./assets/images/hero-slider-2.jpg" width="1880" height="950" alt="" class="img-cover">
            </div>

            <p class="label-2 section-subtitle slider-reveal">Pengalaman yang Menyenangkan</p>

            <h1 class="display-1 hero-title slider-reveal">
              Rasa Terinspirasi <br>
              oleh Musim
            </h1>

            <p class="body-2 hero-text slider-reveal">
              Datang bersama keluarga & rasakan kebahagiaan makanan yang lezat
            </p>

            <a href="#" class="btn btn-primary slider-reveal">
              <span class="text text-1">Lihat Menu</span>

              <span class="text text-2" aria-hidden="true">Lihat Menu</span>
            </a>

          </li>

          <li class="slider-item" data-hero-slider-item>

            <div class="slider-bg">
              <img src="./assets/images/hero-slider-3.jpg" width="1880" height="950" alt="" class="img-cover">
            </div>

            <p class="label-2 section-subtitle slider-reveal">Lezat & Menggugah Selera</p>

            <h1 class="display-1 hero-title slider-reveal">
              Di mana setiap rasa <br>
              memiliki cerita
            </h1>

            <p class="body-2 hero-text slider-reveal">
              Datang bersama keluarga & rasakan kebahagiaan makanan yang lezat
            </p>

            <a href="#" class="btn btn-primary slider-reveal">
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





      <!-- 
        - #SERVICE
      -->

      <section class="section service bg-black-10 text-center" aria-label="layanan">
        <div class="container">

          <p class="section-subtitle label-2">Cita Rasa untuk Keluarga</p>

          <h2 class="headline-1 section-title">Kami Menyajikan yang Terbaik</h2>

          <p class="section-text">
            Kami menghadirkan cita rasa nasi kuning khas dengan resep turun-temurun dan bahan pilihan terbaik.
          </p>

          <ul class="grid-list">

            <li>
              <div class="service-card">

                <a href="#" class="has-before hover:shine">
                  <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                    <img src="https://www.dapurkintamani.com/wp-content/uploads/2023/09/nasi-kuning.webp" width="285" height="336" loading="lazy" alt="Sarapan"
                      class="img-cover">
                  </figure>
                </a>

                <div class="card-content">

                  <h3 class="title-4 card-title">
                    <a href="#">Sarapan</a>
                  </h3>

                  <a href="#menu" class="btn-text hover-underline label-2">Lihat Menu</a>

                </div>

              </div>
            </li>

            <li>
              <div class="service-card">

                <a href="#" class="has-before hover:shine">
                  <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                    <img src="https://c1.wallpaperflare.com/preview/88/726/522/krupuk-deep-fried-crackers-keropok.jpg" width="285" height="336" loading="lazy" alt="Camilan"
                      class="img-cover">
                  </figure>
                </a>

                <div class="card-content">

                  <h3 class="title-4 card-title">
                    <a href="#">Camilan</a>
                  </h3>

                  <a href="#menu" class="btn-text hover-underline label-2">Lihat Menu</a>

                </div>

              </div>
            </li>

            <li>
              <div class="service-card">

                <a href="#" class="has-before hover:shine">
                  <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTt_ic7CUTliN-h8l0M1iJz7zYp1xsq_zzReLl_LGiGBiLw8RDbZplj3Ocs&s=10" width="285" height="336" loading="lazy" alt="Minuman"
                      class="img-cover">
                  </figure>
                </a>

                <div class="card-content">

                  <h3 class="title-4 card-title">
                    <a href="#">Minuman</a>
                  </h3>

                  <a href="#menu" class="btn-text hover-underline label-2">Lihat Menu</a>

                </div>

              </div>
            </li>

          </ul>

          <img src="./assets/images/shape-1.png" width="246" height="412" loading="lazy" alt="bentuk"
            class="shape shape-1 move-anim">
          <img src="./assets/images/shape-2.png" width="343" height="345" loading="lazy" alt="bentuk"
            class="shape shape-2 move-anim">

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
              Warung Nasi Kuning Ibu Opik hadir sejak 1995 dengan resep nasi kuning khas yang diwariskan turun-temurun. 
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

            <img src="./assets/images/about-banner.jpg" width="570" height="570" loading="lazy" alt="tentang kami"
              class="w-100" data-parallax-item data-parallax-speed="1">

            <div class="abs-img abs-img-1 has-before" data-parallax-item data-parallax-speed="1.75">
              <img src="./assets/images/about-abs-image.jpg" width="285" height="285" loading="lazy" alt=""
                class="w-100">
            </div>

            <div class="abs-img abs-img-2 has-before">
              <img src="./assets/images/badge-2.png" width="133" height="134" loading="lazy" alt="">
            </div>

          </figure>

          <img src="./assets/images/shape-3.png" width="197" height="194" loading="lazy" alt="" class="shape">

        </div>
      </section>





      <!-- 
        - #SPECIAL DISH
      -->

      <section class="special-dish text-center" aria-labelledby="dish-label">

        <div class="special-dish-banner">
          <img src="./assets/images/special-dish-banner.jpg" width="940" height="900" loading="lazy" alt="menu spesial"
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
              <del class="del body-3">Rp 45.000</del>

              <span class="span body-1">Rp 35.000</span>
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

                    @if($menu->status)
                        <span class="menu-badge">
                            Tersedia
                        </span>
                    @else
                        <span class="menu-badge menu-badge-danger">
                            Habis
                        </span>
                    @endif

                    <div class="menu-overlay">
                        <a href="#" class="menu-quick-view">
                            <ion-icon name="eye-outline"></ion-icon>
                            <span>Lihat Detail</span>
                        </a>
                    </div>

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

                        <form action="{{ route('cart.add', $menu->id) }}" method="POST">
                            @csrf
                            <button href="#menu" type="submit" class="btn-order">
                                <ion-icon name="cart-outline"></ion-icon>
                                <span>Pesan</span>
                            </button>
                        </form>

                    </div>

            </div>

          </div>

          @endforeach

          </div>

          <p class="menu-text text-center">
            Setiap hari mulai <span class="span">08.00</span> sampai <span class="span">23.00</span>
          </p>

          <a href="#" class="btn btn-primary">
            <span class="text text-1">Lihat Semua Menu</span>
            <span class="text text-2" aria-hidden="true">Lihat Semua Menu</span>
          </a>

          <img src="./assets/images/shape-5.png" width="921" height="1036" loading="lazy" alt="bentuk"
            class="shape shape-2 move-anim">
          <img src="./assets/images/shape-6.png" width="343" height="345" loading="lazy" alt="bentuk"
            class="shape shape-3 move-anim">

        </div>
      </section>

      <!-- 
        - #TESTIMONIALS
      -->

      <section class="section testi text-center has-bg-image"
        style="background-image: url('./assets/images/testimonial-bg.jpg')" aria-label="testimoni">
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

              <h2 class="headline-1 text-center">Pemesanan Online</h2>

              <p class="form-text text-center">
                Pemesanan <a href="tel:+88123123456" class="link">+62 812 3456 7890</a>
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

              <a href="tel:+88123123456" class="body-1 contact-number hover-underline">+62 812 3456 7890</a>

              <div class="separator"></div>

              <p class="contact-label">Lokasi</p>

              <address class="body-4">
                Jl. Kuliner Nusantara, Kota Delicious, <br>
                Indonesia
              </address>

              <p class="contact-label">Jam Makan Siang</p>

              <p class="body-4">
                Senin sampai Minggu <br>
                11.00 - 14.30
              </p>

              <p class="contact-label">Jam Makan Malam</p>

              <p class="body-4">
                Senin sampai Minggu <br>
                17.00 - 22.00
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





      <!-- 
        - #EVENT
      -->

      <section class="section event bg-black-10" aria-label="acara">
        <div class="container">

          <p class="section-subtitle label-2 text-center">Update Terbaru</p>

          <h2 class="section-title headline-1 text-center">Acara Mendatang</h2>

          <ul class="grid-list">

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

          </ul>

          <a href="#" class="btn btn-primary">
            <span class="text text-1">Lihat Blog Kami</span>

            <span class="text text-2" aria-hidden="true">Lihat Blog Kami</span>
          </a>

        </div>
      </section>

    </article>
  </main>

  <!-- 
    - #FOOTER
  -->

  <footer class="footer section has-bg-image text-center"
    style="background-image: url('./assets/images/footer-bg.jpg')">
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
            <a href="#" class="label-2 footer-link hover-underline">Beranda</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Menu</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Tentang Kami</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Koki Kami</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Kontak</a>
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
            <a href="https://twitter.com/fhmirmdnn" class="label-2 footer-link hover-underline">Twitter</a>
          </li>

          <li>
            <a href="https://www.youtube.com/fhmirmdnn" class="label-2 footer-link hover-underline">Youtube</a>
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

</body>

</html>