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

    <style>
        /* ============================================ */
        /* ROOT VARIABLES */
        /* ============================================ */
        :root {
            --gold: hsl(49, 100%, 52%);
            --gold-dark: #b8922f;
            --gold-light: #f5d742;
            --dark: #0d0d0d;
            --dark-card: #1a1a1a;
            --dark-border: #2a2a2a;
            --text-white: #ffffff;
            --text-muted: #a0a0a0;
            --text-dim: #6b6b6b;
            --radius: 12px;
            --shadow: 0 8px 30px rgba(0,0,0,0.3);
        }

        /* ============================================ */
        /* RESET & BASE */
        /* ============================================ */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--dark);
            color: var(--text-white);
            min-height: 100vh;
            padding-top: 0;
        }

        /* ============================================ */
        /* HEADER CHECKOUT */
        /* ============================================ */
        .checkout-header {
            background: var(--dark-card);
            border-bottom: 1px solid var(--dark-border);
            padding: 14px 0;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .checkout-header-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }

        .header-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--text-white);
        }

        .logo-icon {
            width: 44px;
            height: 44px;
            background: var(--gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #000;
        }

        .header-logo h1 {
            font-family: 'Forum', cursive;
            font-size: 22px;
            line-height: 1.1;
            color: var(--gold);
        }

        .header-logo span {
            font-size: 12px;
            color: var(--text-muted);
            display: block;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: rgba(255,255,255,0.06);
            border: 1px solid var(--dark-border);
            border-radius: 30px;
            color: var(--text-white);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background: rgba(255,255,255,0.12);
            border-color: var(--gold);
            color: var(--gold);
            transform: translateX(-3px);
        }

        /* ============================================ */
        /* MAIN CONTENT */
        /* ============================================ */
        .checkout-main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px 60px;
        }

        /* ============================================ */
        /* EMPTY CART */
        /* ============================================ */
        .empty-cart {
            text-align: center;
            padding: 60px 20px;
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: var(--radius);
        }

        .empty-cart-icon {
            font-size: 64px;
            color: var(--gold);
            opacity: 0.4;
            margin-bottom: 20px;
        }

        .empty-cart h2 {
            font-family: 'Forum', cursive;
            font-size: 28px;
            margin-bottom: 10px;
            color: var(--text-white);
        }

        .empty-cart p {
            color: var(--text-muted);
            margin-bottom: 24px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 32px;
            background: var(--gold);
            color: #000;
            font-weight: 700;
            border: none;
            border-radius: 30px;
            text-decoration: none;
            font-size: 15px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn:hover {
            background: var(--gold-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(212, 168, 67, 0.3);
        }

        /* ============================================ */
        /* CHECKOUT GRID */
        /* ============================================ */
        .checkout-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        @media (max-width: 992px) {
            .checkout-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ============================================ */
        /* CARD */
        /* ============================================ */
        .checkout-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: var(--radius);
            overflow: hidden;
            transition: border-color 0.3s ease;
        }

        .checkout-card:hover {
            border-color: rgba(212, 168, 67, 0.3);
        }

        .card-header {
            padding: 18px 24px;
            border-bottom: 1px solid var(--dark-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255,255,255,0.02);
        }

        .card-header h3 {
            font-family: 'Forum', cursive;
            font-size: 20px;
            color: var(--text-white);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-header h3 i {
            color: var(--gold);
        }

        .item-count {
            background: rgba(212, 168, 67, 0.15);
            color: var(--gold);
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        /* ============================================ */
        /* ORDER ITEMS */
        /* ============================================ */
        .order-items {
            padding: 12px 0;
            max-height: 400px;
            overflow-y: auto;
        }

        .order-items::-webkit-scrollbar {
            width: 4px;
        }

        .order-items::-webkit-scrollbar-thumb {
            background: var(--gold);
            border-radius: 10px;
        }

        .order-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.04);
            transition: background 0.2s ease;
        }

        .order-item:hover {
            background: rgba(255,255,255,0.02);
        }

        .item-image {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            background: rgba(255,255,255,0.05);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            overflow: hidden;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .item-image i {
            font-size: 20px;
            color: var(--text-muted);
        }

        .item-details {
            flex: 1;
            min-width: 0;
        }

        .item-details h4 {
            font-size: 15px;
            font-weight: 600;
            color: var(--text-white);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .item-meta {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 2px;
        }

        .item-price {
            font-size: 13px;
            color: var(--text-muted);
        }

        .item-subtotal {
            font-size: 15px;
            font-weight: 600;
            color: var(--gold);
            white-space: nowrap;
            min-width: 90px;
            text-align: right;
        }

        .item-actions {
            display: flex;
            align-items: center;
            gap: 4px;
            flex-shrink: 0;
        }

        .qty-form {
            display: inline;
        }

        .qty-btn {
            width: 32px;
            height: 32px;
            border: 1px solid var(--dark-border);
            background: transparent;
            color: var(--text-muted);
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        .qty-btn:hover {
            border-color: var(--gold);
            color: var(--gold);
            background: rgba(212, 168, 67, 0.08);
        }

        .qty-btn:active {
            transform: scale(0.92);
        }

        .qty-number {
            width: 30px !important;
            text-align: center !important;
            font-size: 14px !important;
            font-weight: 600 !important;
            background: transparent !important;
            border: none !important;
            color: var(--text-white) !important;
            outline: none !important;
            padding: 0 !important;
        }

        .remove-btn {
            width: 32px;
            height: 32px;
            border: 1px solid rgba(239, 68, 68, 0.2);
            background: transparent;
            color: #ef4444;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            margin-left: 4px;
        }

        .remove-btn:hover {
            background: rgba(239, 68, 68, 0.1);
            border-color: #ef4444;
            transform: scale(1.05);
        }

        /* ============================================ */
        /* ORDER TOTAL */
        /* ============================================ */
        .order-total {
            padding: 16px 24px;
            border-top: 2px solid var(--dark-border);
            background: rgba(255,255,255,0.02);
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 6px 0;
            font-size: 15px;
            color: var(--text-muted);
        }

        .total-row.grand-total {
            border-top: 1px solid var(--dark-border);
            margin-top: 8px;
            padding-top: 12px;
            font-size: 18px;
            font-weight: 700;
            color: var(--text-white);
        }

        .total-row.grand-total span:last-child {
            color: var(--gold);
        }

        /* ============================================ */
        /* FORM */
        /* ============================================ */
        .checkout-card .card-header:last-child {
            border-bottom: none;
        }

        .form-group {
            padding: 0 24px 18px 24px;
        }

        .form-group:first-of-type {
            padding-top: 18px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-white);
            margin-bottom: 6px;
        }

        .form-group label .required {
            color: #ef4444;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            background: rgba(255,255,255,0.04);
            border: 1px solid var(--dark-border);
            border-radius: 8px;
            color: var(--text-white);
            font-size: 14px;
            transition: all 0.3s ease;
            outline: none;
            font-family: inherit;
            resize: vertical;
        }

        .form-control:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(212, 168, 67, 0.12);
            background: rgba(255,255,255,0.06);
        }

        .form-control::placeholder {
            color: var(--text-dim);
        }

        textarea.form-control {
            min-height: 80px;
        }

        /* ============================================ */
        /* DELIVERY OPTIONS */
        /* ============================================ */
        .delivery-options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .delivery-option {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .delivery-option .option-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 12px;
            background: rgba(255,255,255,0.04);
            border: 2px solid var(--dark-border);
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            color: var(--text-muted);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .delivery-option .option-content i {
            font-size: 18px;
        }

        .delivery-option.active .option-content {
            border-color: var(--gold);
            background: rgba(212, 168, 67, 0.08);
            color: var(--gold);
        }

        .delivery-option:hover .option-content {
            border-color: var(--gold);
            color: var(--text-white);
        }

        /* Payment option khusus */
        .payment-option .option-content {
            background: rgba(255,255,255,0.03);
        }

        .payment-option.active .option-content {
            border-color: #22c55e;
            background: rgba(34, 197, 94, 0.08);
            color: #22c55e;
        }

        .payment-option:first-child.active .option-content {
            border-color: var(--gold);
            background: rgba(212, 168, 67, 0.08);
            color: var(--gold);
        }

        /* ============================================ */
        /* BUTTON CHECKOUT */
        /* ============================================ */
        .btn-checkout {
            width: 100%;
            padding: 16px;
            margin: 4px 24px 24px 24px;
            width: calc(100% - 48px);
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            color: #000;
            font-weight: 700;
            font-size: 17px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-checkout:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(212, 168, 67, 0.35);
            background: linear-gradient(135deg, var(--gold-light), var(--gold));
        }

        .btn-checkout:active {
            transform: scale(0.98);
        }

        .btn-checkout i {
            font-size: 20px;
        }

        /* ============================================ */
        /* FOOTER */
        /* ============================================ */
        .checkout-footer {
            border-top: 1px solid var(--dark-border);
            padding: 20px 0;
            margin-top: 20px;
        }

        .checkout-footer-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .checkout-footer p {
            color: var(--text-dim);
            font-size: 14px;
        }

        .footer-links {
            display: flex;
            gap: 20px;
        }

        .footer-links a {
            color: var(--text-dim);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--gold);
        }

        /* ============================================ */
        /* RESPONSIVE */
        /* ============================================ */
        @media (max-width: 768px) {
            .checkout-header-inner {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-actions {
                width: 100%;
            }

            .btn-back {
                width: 100%;
                justify-content: center;
            }

            .checkout-main {
                padding: 20px 12px 40px;
            }

            .checkout-grid {
                gap: 20px;
            }

            .card-header {
                padding: 14px 16px;
                flex-wrap: wrap;
                gap: 8px;
            }

            .card-header h3 {
                font-size: 17px;
            }

            .order-item {
                padding: 10px 14px;
                flex-wrap: wrap;
                gap: 10px;
            }

            .item-subtotal {
                min-width: 70px;
                font-size: 13px;
            }

            .item-actions {
                width: 100%;
                justify-content: flex-end;
                padding-top: 4px;
                border-top: 1px solid rgba(255,255,255,0.04);
            }

            .order-total {
                padding: 14px 16px;
            }

            .form-group {
                padding: 0 16px 14px 16px;
            }

            .form-group:first-of-type {
                padding-top: 14px;
            }

            .btn-checkout {
                margin: 2px 16px 16px 16px;
                width: calc(100% - 32px);
                padding: 14px;
                font-size: 15px;
            }

            .delivery-options {
                grid-template-columns: 1fr 1fr;
                gap: 8px;
            }

            .delivery-option .option-content {
                padding: 10px;
                font-size: 13px;
            }

            .checkout-footer-inner {
                flex-direction: column;
                text-align: center;
            }

            .footer-links {
                justify-content: center;
                flex-wrap: wrap;
            }
        }

        @media (max-width: 480px) {
            .header-logo h1 {
                font-size: 18px;
            }

            .logo-icon {
                width: 38px;
                height: 38px;
                font-size: 16px;
            }

            .empty-cart h2 {
                font-size: 22px;
            }

            .empty-cart-icon {
                font-size: 48px;
            }

            .delivery-options {
                grid-template-columns: 1fr;
            }

            .item-details h4 {
                font-size: 13px;
            }

            .item-price {
                font-size: 12px;
            }

            .item-subtotal {
                font-size: 12px;
                min-width: 60px;
            }

            .qty-btn {
                width: 28px;
                height: 28px;
                font-size: 10px;
            }

            .qty-number {
                width: 24px !important;
                font-size: 12px !important;
            }

            .remove-btn {
                width: 28px;
                height: 28px;
                font-size: 10px;
            }
        }

        /* ============================================ */
        /* QRIS MODAL */
        /* ============================================ */
        .qris-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(6px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 999999;
        }

        .qris-modal-overlay.show {
            display: flex;
            animation: fadeInModal 0.3s ease;
        }

        @keyframes fadeInModal {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        .qris-modal-box {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            width: 90%;
            max-width: 400px;
            border-radius: var(--radius);
            padding: 28px 24px;
            text-align: center;
            color: var(--text-white);
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
        }

        .qris-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--dark-border);
            padding-bottom: 14px;
            margin-bottom: 18px;
        }

        .qris-header h3 {
            font-family: 'Forum', cursive;
            font-size: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0;
        }

        .qris-header h3 i {
            color: var(--gold);
        }

        .qris-header button {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--text-dim);
            transition: color 0.3s ease;
        }

        .qris-header button:hover {
            color: #ef4444;
        }

        .qris-img-container {
            background: #fff;
            padding: 16px;
            border-radius: 10px;
            border: 2px dashed var(--dark-border);
            margin: 10px auto;
            display: inline-block;
        }

        .qris-img {
            width: 100%;
            max-width: 200px;
            height: auto;
            display: block;
        }

        .qris-timer {
            font-size: 16px;
            font-weight: bold;
            margin: 14px 0;
            color: var(--gold);
            background: rgba(212, 168, 67, 0.1);
            padding: 8px 20px;
            border-radius: 30px;
            display: inline-block;
        }

        .qris-expired {
            display: none;
            color: #ef4444;
            font-weight: bold;
            margin: 14px 0;
            background: rgba(239, 68, 68, 0.1);
            padding: 12px;
            border-radius: 8px;
        }

        .qris-modal-box .btn {
            background: var(--gold);
            color: #000;
            border: none;
            padding: 12px 32px;
            border-radius: 30px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 15px;
            margin-top: 8px;
        }

        .qris-modal-box .btn:hover {
            background: var(--gold-dark);
            transform: translateY(-2px);
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
                <div style="background: rgba(239, 68, 68, 0.1); border-left: 4px solid #ef4444; color: #ef4444; padding: 16px 20px; margin-bottom: 24px; border-radius: 8px; display: flex; align-items: center; gap: 12px;">
                    <i class="fas fa-exclamation-triangle" style="font-size: 20px;"></i>
                    <div>
                        <strong>Gagal!</strong>
                        <span>{{ session('error') }}</span>
                    </div>
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
                    <a href="{{ url('/') }}#menu" class="btn">
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
                                                   checked
                                                   style="display:none;">
                                            <span class="option-content">
                                                <i class="fas fa-truck"></i>
                                                <span>Antar</span>
                                            </span>
                                        </label>
                                        <label class="delivery-option">
                                            <input type="radio"
                                                   name="delivery_type"
                                                   value="ambil"
                                                   style="display:none;">
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

                                <!-- Metode Pembayaran -->
                                <div class="form-group">
                                    <label>Metode Pembayaran <span class="required">*</span></label>
                                    <div class="delivery-options">
                                        <label class="delivery-option payment-option active" onclick="pilihPembayaran('tunai')" id="labelTunai">
                                            <input type="radio" name="payment_method" value="tunai" id="radioTunai" checked style="display:none;">
                                            <span class="option-content">
                                                <i class="fas fa-money-bill-wave"></i>
                                                <span>Tunai / COD</span>
                                            </span>
                                        </label>
                                        
                                        <label class="delivery-option payment-option" onclick="pilihPembayaran('qris')" id="labelQris">
                                            <input type="radio" name="payment_method" value="qris" id="radioQris" style="display:none;">
                                            <span class="option-content">
                                                <i class="fas fa-qrcode"></i>
                                                <span>QRIS</span>
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
                subtotalElement.textContent = 'Rp ' + (qty * price).toLocaleString('id-ID');
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
                        <a href='{{ url('/') }}#menu' class='btn'>
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
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(data => console.log('Qty saved', data))
                .catch(err => console.error('Save error', err));
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

                    if (isRemove) {
                        item.remove();
                        updateItemCount();
                        updateTotals();
                        checkEmptyCart();
                    } else if (qtyInput && (isIncrease || isDecrease)) {
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
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    })
                    .then(res => res.json())
                    .then(data => console.log('Cart updated', data))
                    .catch(err => console.error('Cart error', err));
                });
            });

            // ================================
            // Input quantity langsung
            // ================================
            document.querySelectorAll('.qty-number').forEach(input => {
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

            // ================================
            // Toggle alamat antar/ambil
            // ================================
            document.querySelectorAll('input[name="delivery_type"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    const alamatBox = document.getElementById('alamatBox');
                    const landmarkBox = document.getElementById('landmarkBox');
                    if (this.value === 'antar') {
                        alamatBox.style.display = 'block';
                        landmarkBox.style.display = 'block';
                    } else {
                        alamatBox.style.display = 'none';
                        landmarkBox.style.display = 'none';
                    }
                });
            });

            // Trigger awal
            const checkedRadio = document.querySelector('input[name="delivery_type"]:checked');
            if (checkedRadio) {
                const alamatBox = document.getElementById('alamatBox');
                const landmarkBox = document.getElementById('landmarkBox');
                if (checkedRadio.value === 'antar') {
                    alamatBox.style.display = 'block';
                    landmarkBox.style.display = 'block';
                } else {
                    alamatBox.style.display = 'none';
                    landmarkBox.style.display = 'none';
                }
            }

            // ================================
            // Click handler untuk delivery options (biar active visual)
            // ================================
            document.querySelectorAll('.delivery-option').forEach(opt => {
                opt.addEventListener('click', function(e) {
                    const parent = this.closest('.delivery-options');
                    if (parent) {
                        parent.querySelectorAll('.delivery-option').forEach(o => o.classList.remove('active'));
                    }
                    this.classList.add('active');
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