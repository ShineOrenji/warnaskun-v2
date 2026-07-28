<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil - Warung Nasi Kuning Ibu Opik</title>

    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin-style.css') }}">

    <style>
        /* ---------- OVERRIDE BODY ---------- */
        body {
            overflow: auto !important;
            height: auto !important;
            min-height: 100vh;
            background: var(--bg-primary);
            font-family: 'DM Sans', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* ---------- SUCCESS CARD ---------- */
        .success-container {
            max-width: 500px;
            width: 100%;
            margin: 0 auto;
        }

        .success-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            padding: 40px 32px;
            text-align: center;
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.4);
            animation: fadeInUp 0.5s ease forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ---------- ICON ---------- */
        .success-icon {
            width: 80px;
            height: 80px;
            background: rgba(34, 197, 94, 0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            border: 3px solid #22c55e;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .success-icon i {
            font-size: 36px;
            color: #22c55e;
        }

        /* ---------- TITLE ---------- */
        .success-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 8px;
        }

        .success-title i {
            color: #22c55e;
            margin-right: 8px;
        }

        .success-subtitle {
            color: var(--text-secondary);
            font-size: 15px;
            margin-bottom: 24px;
        }

        .success-subtitle strong {
            color: var(--gold);
        }

        /* ---------- ORDER SUMMARY ---------- */
        .order-summary {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            padding: 20px 24px;
            text-align: left;
            margin-bottom: 20px;
        }

        .order-summary .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid var(--border-color);
            font-size: 14px;
        }

        .order-summary .summary-row:last-child {
            border-bottom: none;
        }

        .order-summary .summary-row .label {
            color: var(--text-muted);
        }

        .order-summary .summary-row .value {
            color: var(--text-primary);
            font-weight: 600;
        }

        .order-summary .summary-row .value.gold {
            color: var(--gold);
        }

        .order-summary .summary-row .value.green {
            color: #22c55e;
        }

        /* ---------- BADGE STATUS ---------- */
        .badge-status {
            padding: 4px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }

        .badge-status.pending {
            background: rgba(212, 168, 67, 0.15);
            color: var(--gold);
        }

        /* ---------- INFO TEXT ---------- */
        .info-text {
            color: var(--text-muted);
            font-size: 13px;
            margin-bottom: 20px;
        }

        /* ---------- BUTTONS ---------- */
        .btn-success {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 28px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            width: 100%;
            justify-content: center;
        }

        .btn-success:hover {
            transform: translateY(-2px);
        }

        .btn-order-again {
            background: var(--gold);
            color: #000;
        }

        .btn-order-again:hover {
            background: var(--gold-light);
            box-shadow: 0 8px 30px rgba(212, 168, 67, 0.3);
        }

        .btn-whatsapp {
            background: #25D366;
            color: #fff;
        }

        .btn-whatsapp:hover {
            background: #1da851;
            box-shadow: 0 8px 30px rgba(37, 211, 102, 0.3);
        }

        .btn-whatsapp i {
            font-size: 20px;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 768px) {
            .success-card {
                padding: 28px 20px;
            }

            .success-title {
                font-size: 24px;
            }

            .success-icon {
                width: 64px;
                height: 64px;
            }

            .success-icon i {
                font-size: 28px;
            }

            .order-summary {
                padding: 16px 18px;
            }

            .order-summary .summary-row {
                font-size: 13px;
                padding: 6px 0;
            }

            .btn-success {
                font-size: 14px;
                padding: 10px 20px;
            }
        }

        @media (max-width: 480px) {
            .success-card {
                padding: 20px 16px;
            }

            .success-title {
                font-size: 20px;
            }

            .success-subtitle {
                font-size: 13px;
            }

            .order-summary .summary-row {
                font-size: 12px;
                flex-wrap: wrap;
                gap: 4px;
            }

            .btn-success {
                font-size: 13px;
                padding: 8px 16px;
            }

            .badge-status {
                font-size: 11px;
                padding: 2px 12px;
            }
        }
    </style>
</head>
<body>

    <div class="success-container">

        <div class="success-card">

            <!-- Icon -->
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>

            <!-- Title -->
            <h1 class="success-title">
                <i class="fas fa-check-circle"></i>
                Pesanan Berhasil!
            </h1>

            <p class="success-subtitle">
                Terima kasih telah memesan di
                <strong>Warung Nasi Kuning Ibu Opik</strong>.
            </p>

            <!-- Order Summary -->
            <div class="order-summary">

                <div class="summary-row">
                    <span class="label">No Pesanan</span>
                    <span class="value gold">#{{ $order->id }}</span>
                </div>

                <div class="summary-row">
                    <span class="label">Nama</span>
                    <span class="value">{{ $order->customer_name }}</span>
                </div>

                <div class="summary-row">
                    <span class="label">WhatsApp</span>
                    <span class="value">{{ $order->phone }}</span>
                </div>

                <div class="summary-row">
                    <span class="label">Metode</span>
                    <span class="value">
                        {{ $order->delivery_type == 'antar' ? '🚚 Antar' : '🏪 Ambil Sendiri' }}
                    </span>
                </div>

                <div class="summary-row">
                    <span class="label">Status</span>
                    <span class="badge-status pending">{{ $order->status }}</span>
                </div>

                <div class="summary-row">
                    <span class="label">Total</span>
                    <span class="value green">
                        Rp {{ number_format($order->total, 0, ',', '.') }}
                    </span>
                </div>

            </div>

            <!-- Info -->
            <p class="info-text">
                <i class="fas fa-clock" style="color: var(--gold);"></i>
                Admin akan segera memproses pesanan Anda.
            </p>

            <!-- Buttons -->
            <div class="button-group">

                <a href="{{ url('/') }}#menu" class="btn-success btn-order-again">
                    <i class="fas fa-utensils"></i>
                    Pesan Lagi
                </a>

                <a href="https://wa.me/6289522053961?text={{ urlencode(
                    'Halo Bu Opik 👋

Saya sudah melakukan pemesanan.

📋 No Pesanan : #'.$order->id.'

👤 Nama : '.$order->customer_name.'
📞 No HP : '.$order->phone.'

🚚 Metode : '.($order->delivery_type == 'antar' ? 'Antar' : 'Ambil Sendiri').'

💰 Total : Rp '.number_format($order->total,0,',','.').'

Terima kasih 🙏'
                ) }}" target="_blank" class="btn-success btn-whatsapp">
                    <i class="fab fa-whatsapp"></i>
                    Kirim ke WhatsApp
                </a>

            </div>

        </div>

    </div>

</body>
</html>