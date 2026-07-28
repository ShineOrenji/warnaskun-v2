<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Warung Nasi Kuning Ibu Opik</title>

    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/checkout.css') }}">
</head>
<body>

    <!-- ============================================ -->
    <!-- HEADER -->
    <!-- ============================================ -->
    <header class="checkout-header">
        <div class="checkout-header-inner">
            <a href="{{ url('/') }}" class="header-logo">
                <div class="logo-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <div>
                    <h1>Ibu Opik</h1>
                    <span>Warung Nasi Kuning</span>
                </div>
            </a>
            <div class="header-actions">
                <a href="{{ route('home') }}" class="btn-back">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </header>

    <!-- ============================================ -->
    <!-- MAIN CONTENT -->
    <!-- ============================================ -->
    <main class="checkout-main">

        <div class="checkout-container">

            @php
                $total = 0;
            @endphp

            @if(count($cart) == 0)

                <!-- EMPTY CART -->
                <div class="empty-cart">
                    <div class="empty-cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h2>Keranjang Belanja Kosong</h2>
                    <p>Yuk, pilih menu favoritmu dari Warung Ibu Opik!</p>
                    <a href="{{ url('/') }}#menu" class="btn btn-primary">
                        <i class="fas fa-utensils"></i>
                        Lihat Menu
                    </a>
                </div>

            @else

                <!-- ============================================ -->
                <!-- CHECKOUT GRID -->
                <!-- ============================================ -->
                <div class="checkout-grid">

                    <!-- ============================================ -->
                    <!-- LEFT: ORDER SUMMARY -->
                    <!-- ============================================ -->
                    <div class="checkout-left">

                        <div class="checkout-card">
                            <div class="card-header">
                                <h3>
                                    <i class="fas fa-shopping-bag"></i>
                                    Ringkasan Pesanan
                                </h3>
                                <span class="item-count">{{ count($cart) }} item</span>
                            </div>

                            <div class="order-items">
                                @foreach($cart as $item)
                                    @php
                                        $subtotal = $item['price'] * $item['qty'];
                                        $total += $subtotal;
                                    @endphp

                                    <div class="order-item">
                                        <div class="item-image">
                                            @if(isset($item['image']))
                                                <img src="{{ asset('uploads/menu/' . $item['image']) }}" alt="{{ $item['name'] }}">
                                            @else
                                                <i class="fas fa-utensils"></i>
                                            @endif
                                        </div>
                                        <div class="item-details">
                                            <h4>{{ $item['name'] }}</h4>
                                            <div class="item-meta">
                                                <span class="item-price">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                                                <span class="item-qty">× {{ $item['qty'] }}</span>
                                            </div>
                                        </div>
                                        <div class="item-subtotal">
                                            Rp {{ number_format($subtotal, 0, ',', '.') }}
                                        </div>
                                        <div class="item-actions">
                                            <!-- TOMBOL - (KURANGI) -->
                                            <form action="{{ route('cart.decrease', $item['id']) }}" method="POST" class="qty-form">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="qty-btn" title="Kurangi">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </form>

                                            <span class="qty-number">{{ $item['qty'] }}</span>

                                            <!-- TOMBOL + (TAMBAH) -->
                                            <form action="{{ route('cart.increase', $item['id']) }}" method="POST" class="qty-form">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="qty-btn" title="Tambah">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </form>

                                            <!-- TOMBOL HAPUS -->
                                            <form action="{{ route('cart.remove', $item['id']) }}" method="POST" class="qty-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="remove-btn" title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="order-total">
                                <div class="total-row">
                                    <span>Subtotal</span>
                                    <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                                </div>
                                <div class="total-row">
                                    <span>Biaya Layanan</span>
                                    <span>Rp 0</span>
                                </div>
                                <div class="total-row grand-total">
                                    <span>Total</span>
                                    <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- ============================================ -->
                    <!-- RIGHT: CHECKOUT FORM -->
                    <!-- ============================================ -->
                    <div class="checkout-right">

                        <div class="checkout-card">
                            <div class="card-header">
                                <h3>
                                    <i class="fas fa-user"></i>
                                    Data Pemesan
                                </h3>
                            </div>

                            <form action="{{ route('cart.checkout') }}" method="POST" id="checkoutForm">
                                @csrf

                                <!-- Nama -->
                                <div class="form-group">
                                    <label for="customer_name">
                                        Nama Lengkap <span class="required">*</span>
                                    </label>
                                    <input type="text"
                                           id="customer_name"
                                           name="customer_name"
                                           placeholder="Masukkan nama lengkap Anda"
                                           class="form-control"
                                           required>
                                </div>

                                <!-- No WhatsApp -->
                                <div class="form-group">
                                    <label for="phone">
                                        No WhatsApp <span class="required">*</span>
                                    </label>
                                    <input type="tel"
                                           id="phone"
                                           name="phone"
                                           placeholder="08xxxxxxxxxx"
                                           class="form-control"
                                           required>
                                </div>

                                <!-- Metode Pesanan -->
                                <div class="form-group">
                                    <label>Metode Pesanan <span class="required">*</span></label>
                                    <div class="delivery-options">
                                        <label class="delivery-option active">
                                            <input type="radio"
                                                   name="delivery_type"
                                                   value="antar"
                                                   checked>
                                            <span class="option-content">
                                                <i class="fas fa-truck"></i>
                                                <span>Antar</span>
                                            </span>
                                        </label>
                                        <label class="delivery-option">
                                            <input type="radio"
                                                   name="delivery_type"
                                                   value="ambil">
                                            <span class="option-content">
                                                <i class="fas fa-store"></i>
                                                <span>Ambil Sendiri</span>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Alamat (untuk antar) -->
                                <div class="form-group" id="alamatBox">
                                    <label for="address">Alamat Lengkap</label>
                                    <textarea id="address"
                                              name="address"
                                              rows="3"
                                              class="form-control"
                                              placeholder="Masukkan alamat lengkap"></textarea>
                                </div>

                                <div class="form-group" id="landmarkBox">
                                    <label for="landmark">Patokan (Opsional)</label>
                                    <input type="text"
                                           id="landmark"
                                           name="landmark"
                                           placeholder="Masukkan patokan lokasi"
                                           class="form-control">
                                </div>

                                <!-- Catatan -->
                                <div class="form-group">
                                    <label for="note">Catatan</label>
                                    <textarea id="note"
                                              name="note"
                                              rows="2"
                                              class="form-control"
                                              placeholder="Contoh: sambal dipisah, tidak pakai telur, dll"></textarea>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn-checkout">
                                    <i class="fas fa-check-circle"></i>
                                    Buat Pesanan
                                </button>

                            </form>
                        </div>

                    </div>

                </div>

            @endif

        </div>

    </main>

    <!-- ============================================ -->
    <!-- FOOTER -->
    <!-- ============================================ -->
    <footer class="checkout-footer">
        <div class="checkout-footer-inner">
            <p>&copy; {{ date('Y') }} Warung Nasi Kuning Ibu Opik. All rights reserved.</p>
            <div class="footer-links">
                <a href="{{ url('/') }}">Beranda</a>
                <a href="{{ url('/') }}#menu">Menu</a>
                <a href="{{ url('/') }}#about">Tentang Kami</a>
            </div>
        </div>
    </footer>

    <!-- ============================================ -->
    <!-- SCRIPTS -->
    <!-- ============================================ -->
    <script src="{{ asset('assets/js/checkout.js') }}"></script>

</body>
</html>