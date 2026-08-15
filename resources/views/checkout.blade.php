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

    <style>
        .qris-modal-overlay {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.75); backdrop-filter: blur(4px);
            display: none; align-items: center; justify-content: center; z-index: 999999;
        }
        .qris-modal-overlay.show {
            display: flex;
            animation: fadeIn 0.3s ease;
        }
        .qris-modal-box {
            background: #ffffff; width: 90%; max-width: 400px; 
            border-radius: 12px; padding: 24px; text-align: center; 
            color: #333; box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            border: 1px solid #eee;
        }
        .qris-header { 
            display: flex; justify-content: space-between; align-items: center; 
            margin-bottom: 16px; border-bottom: 1px solid #eee; 
            padding-bottom: 12px;
        }
        .qris-header h3 { font-size: 18px; font-weight: bold; margin: 0; display: flex; align-items: center; gap: 8px;}
        .qris-header button { background: none; border: none; font-size: 20px; cursor: pointer; color: #888; transition: 0.3s;}
        .qris-header button:hover { color: #ef4444; }
        .qris-img-container {
            background: #fff; padding: 15px; border-radius: 8px; border: 2px dashed #ccc;
            margin: 15px auto; display: inline-block;
        }
        .qris-img { width: 100%; max-width: 200px; height: auto; display: block; }
        .qris-timer { font-size: 16px; font-weight: bold; margin: 15px 0; color: #d4a843; background: rgba(212, 168, 67, 0.1); padding: 8px 16px; border-radius: 20px; display: inline-block;}
        .qris-expired { display: none; color: #ef4444; font-weight: bold; margin: 15px 0; background: rgba(239, 68, 68, 0.1); padding: 12px; border-radius: 8px;}
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
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

        @if(session('error'))
                <div style="background: rgba(239, 68, 68, 0.1); border-left: 4px solid #ef4444; color: #ef4444; padding: 16px; margin-bottom: 20px; border-radius: 8px;">
                    <i class="fas fa-exclamation-triangle"></i> <strong>Gagal!</strong> {{ session('error') }}
                </div>
            @endif

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
                                @foreach($cart as $id => $item)
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
                                            </div>
                                        </div>
                                        <div class="item-subtotal">
                                            Rp {{ number_format($subtotal, 0, ',', '.') }}
                                        </div>
                                        <div class="item-actions">
                                            <!-- TOMBOL - (KURANGI) -->
                                            <form action="{{ route('cart.decrease', $id) }}" method="POST" class="qty-form">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="qty-btn" title="Kurangi">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </form>

                                            <input
                                            type="text"
                                            class="qty-number"
                                            value="{{ $item['qty'] }}"
                                            inputmode="numeric"
                                            autocomplete="off"
                                            style="
                                                width: 35px !important;
                                                height: auto !important;
                                                padding: 0 !important;
                                                margin: 0 !important;
                                                border: 0 !important;
                                                outline: 0 !important;
                                                box-shadow: none !important;
                                                background: transparent !important;
                                                color: inherit !important;
                                                text-align: center !important;
                                                font: inherit !important;
                                                border-radius: 0 !important;
                                                appearance: none !important;
                                            "
                                        >
                                            <!-- TOMBOL + (TAMBAH) -->
                                            <form action="{{ route('cart.increase', $id) }}" method="POST" class="qty-form">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="qty-btn" title="Tambah">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </form>

                                            <!-- TOMBOL HAPUS -->
                                            <form action="{{ route('cart.remove', $id) }}" method="POST" class="qty-form">
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

                                <!-- Catatan -->
                                <div class="form-group">
                                    <label for="note">Catatan</label>
                                    <textarea id="note"
                                              name="note"
                                              rows="2"
                                              class="form-control"
                                              placeholder="Contoh: sambal dipisah, tidak pakai telur, dll"></textarea>
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

                                <!-- Metode Pembayaran Baru (Anti Macet) -->
                                <div class="form-group">
                                    <label>Metode Pembayaran <span class="required">*</span></label>
                                    <div class="delivery-options">
                                        <!-- OPSI TUNAI -->
                                        <label class="delivery-option payment-option active" onclick="pilihPembayaran('tunai')" id="labelTunai">
                                            <input type="radio" name="payment_method" value="tunai" id="radioTunai" checked style="display:none;">
                                            <span class="option-content">
                                                <i class="fas fa-money-bill-wave"></i>
                                                <span>Tunai / COD</span>
                                            </span>
                                        </label>
                                        
                                        <!-- OPSI QRIS -->
                                        <label class="delivery-option payment-option" onclick="pilihPembayaran('qris')" id="labelQris">
                                            <input type="radio" name="payment_method" value="qris" id="radioQris" style="display:none;">
                                            <span class="option-content">
                                                <i class="fas fa-qrcode"></i>
                                                <span>QRIS (Gopay, dll)</span>
                                            </span>
                                        </label>
                                    </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // ================================
            // Update jumlah item
            // ================================
            function updateItemCount() {
                let totalItems = 0;

                document.querySelectorAll('.qty-number').forEach(input => {
                    totalItems += parseInt(input.value) || 0;
                });

                const itemCount = document.querySelector('.item-count');

                if (itemCount) {
                    itemCount.textContent = totalItems + ' item';
                }
            }

            // ================================
            // Update total harga
            // ================================
            function updateTotals() {
                let grandTotal = 0;

                document.querySelectorAll('.item-subtotal').forEach(el => {
                    grandTotal += parseInt(el.textContent.replace(/\D/g, '')) || 0;
                });

                document.querySelectorAll('.total-row').forEach(row => {
                    const label = row.querySelector('span:first-child');
                    const value = row.querySelector('span:last-child');

                    if (!label || !value) return;

                    const text = label.textContent.trim();

                    if (text === 'Subtotal' || text === 'Total') {
                        value.textContent = 'Rp ' + grandTotal.toLocaleString('id-ID');
                    }
                });
            }

            // ================================
            // Update subtotal item
            // ================================
            function updateItemSubtotal(item) {
                const qtyInput = item.querySelector('.qty-number');
                const priceElement = item.querySelector('.item-price');
                const subtotalElement = item.querySelector('.item-subtotal');

                if (!qtyInput || !priceElement || !subtotalElement) return;

                const qty = parseInt(qtyInput.value) || 0;
                const price = parseInt(priceElement.textContent.replace(/\D/g, '')) || 0;

                subtotalElement.textContent =
                    'Rp ' + (qty * price).toLocaleString('id-ID');
            }

            // ================================
            // Keranjang kosong
            // ================================
            function checkEmptyCart() {
                if (document.querySelectorAll('.order-item').length > 0) return;

                const checkoutGrid = document.querySelector('.checkout-grid');

                if (!checkoutGrid) return;

                checkoutGrid.innerHTML = `
                    <div class='empty-cart' style='grid-column:1/-1;'>
                        <div class='empty-cart-icon'>
                            <i class='fas fa-shopping-cart'></i>
                        </div>

                        <h2>Keranjang Belanja Kosong</h2>

                        <p>Yuk, pilih menu favoritmu dari Warung Ibu Opik!</p>

                        <a href='{{ url('/') }}#menu' class='btn btn-primary'>
                            <i class='fas fa-utensils'></i>
                            Lihat Menu
                        </a>
                    </div>
                `;
            }

            // ================================
            // Simpan quantity ke Laravel
            // ================================
            function saveQty(item, qtyInput) {
                const increaseForm = item.querySelector('form[action*="/increase/"]');

                if (!increaseForm) return;

                const id = increaseForm.action.split('/').pop();

                const formData = new FormData();

                formData.append('_token', '{{ csrf_token() }}');
                formData.append('qty', qtyInput.value);

                fetch('{{ url('/cart/update') }}/' + id, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    console.log('Qty saved', data);
                })
                .catch(err => {
                    console.error('Save error', err);
                });
            }

            // ================================
            // Tombol + / - / hapus
            // ================================
            document.querySelectorAll('.qty-form').forEach(form => {

                form.addEventListener('submit', function (e) {

                    e.preventDefault();

                    const item = form.closest('.order-item');

                    if (!item) return;

                    const qtyInput = item.querySelector('.qty-number');

                    const isIncrease = form.action.includes('/increase/');
                    const isDecrease = form.action.includes('/decrease/');
                    const isRemove = form.action.includes('/cart/remove/');

                    // Hapus
                    if (isRemove) {
                        item.remove();
                        updateItemCount();
                        updateTotals();
                        checkEmptyCart();
                    }

                    // Tambah / kurang
                    else if (qtyInput && (isIncrease || isDecrease)) {

                        let qty = parseInt(qtyInput.value) || 1;

                        if (isIncrease) qty++;
                        if (isDecrease) qty--;

                        if (qty <= 0) {
                            item.remove();
                        } else {
                            qtyInput.value = qty;
                            updateItemSubtotal(item);
                        }

                        updateItemCount();
                        updateTotals();
                        checkEmptyCart();
                    }

                    fetch(form.action, {
                        method: 'POST',
                        body: new FormData(form),
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        console.log('Cart updated', data);
                    })
                    .catch(err => {
                        console.error('Cart error', err);
                    });
                });

            });

            // ================================
            // Input quantity langsung
            // ================================
            document.querySelectorAll('.qty-number').forEach(input => {

                // Enter = simpan
                input.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        input.blur();
                    }
                });

                // Saat berubah
                let saveTimer;

                input.addEventListener('input', function () {

                    clearTimeout(saveTimer);

                    saveTimer = setTimeout(function () {

                    let qty = parseInt(input.value);

                    if (isNaN(qty) || qty < 1) qty = 1;
                    if (qty > 999) qty = 999;

                    input.value = qty;

                    const item = input.closest('.order-item');

                    if (!item) return;

                    updateItemSubtotal(item);
                    updateItemCount();
                    updateTotals();

                    saveQty(item, input);

                        }, 300);
                });

            });

        });

        // ================================
        // LOGIKA METODE PEMBAYARAN
        // ================================
            function pilihPembayaran(metode) {
                document.getElementById('labelTunai').classList.remove('active');
                document.getElementById('labelQris').classList.remove('active');
                
                if(metode === 'tunai') {
                    document.getElementById('radioTunai').checked = true;
                    document.getElementById('labelTunai').classList.add('active');
                } else {
                    document.getElementById('radioQris').checked = true;
                    document.getElementById('labelQris').classList.add('active');
                }
            }
        </script>

</body>
</html>