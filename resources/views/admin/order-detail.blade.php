<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan #{{ $order->id }}</title>

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
        }

        /* ---------- Detail Order Specific ---------- */
        .detail-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .detail-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            padding: 32px;
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.4);
        }

        .detail-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 2px solid var(--gold);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .detail-title i {
            color: var(--gold);
            font-size: 28px;
        }

        .detail-title .order-id {
            color: var(--gold);
        }

        .detail-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px 32px;
            margin-bottom: 24px;
        }

        .detail-info p {
            color: var(--text-secondary);
            font-size: 14px;
            padding: 8px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .detail-info p strong {
            color: var(--text-primary);
            font-weight: 600;
            display: inline-block;
            min-width: 100px;
        }

        .detail-info .full-width {
            grid-column: 1 / -1;
        }

        /* ---------- Format Jam ---------- */
        .time-format {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 2px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .time-format.morning {
            background: rgba(251, 191, 36, 0.15);
            color: #fbbf24;
        }

        .time-format.afternoon {
            background: rgba(251, 146, 60, 0.15);
            color: #fb923c;
        }

        .time-format.evening {
            background: rgba(96, 165, 250, 0.15);
            color: #60a5fa;
        }

        .time-format.night {
            background: rgba(167, 139, 250, 0.15);
            color: #a78bfa;
        }

        .time-format i {
            font-size: 12px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--text-primary);
            margin: 24px 0 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: var(--gold);
        }

        /* ---------- Table Detail ---------- */
        .detail-table {
            width: 100%;
            border-collapse: collapse;
            margin: 16px 0;
        }

        .detail-table thead {
            background: var(--bg-hover);
            border-bottom: 2px solid var(--gold);
        }

        .detail-table thead th {
            padding: 12px 16px;
            font-size: 12px;
            text-transform: uppercase;
            color: var(--text-muted);
            font-weight: 600;
            letter-spacing: 0.5px;
            text-align: center;
        }

        .detail-table tbody tr {
            border-bottom: 1px solid var(--border-color);
            transition: var(--transition);
        }

        .detail-table tbody tr:hover {
            background: var(--bg-hover);
        }

        .detail-table tbody td {
            padding: 12px 16px;
            font-size: 14px;
            color: var(--text-secondary);
            text-align: center;
        }

        .detail-table tbody td:first-child {
            color: var(--text-primary);
            font-weight: 500;
        }

        .detail-table tbody td .item-price {
            color: var(--gold);
            font-weight: 600;
        }

        .detail-total {
            text-align: right;
            padding: 16px 0;
            margin-top: 16px;
            border-top: 2px solid var(--gold);
        }

        .detail-total h2 {
            font-size: 22px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .detail-total h2 span {
            color: var(--gold);
        }

        /* ---------- Status Badge ---------- */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 600;
        }

        .status-badge.waiting {
            background: rgba(212, 168, 67, 0.15);
            color: var(--gold);
        }

        .status-badge.process {
            background: rgba(59, 130, 246, 0.15);
            color: #3b82f6;
        }

        .status-badge.completed {
            background: rgba(34, 197, 94, 0.15);
            color: #22c55e;
        }

        .status-badge i {
            font-size: 16px;
        }

        /* ---------- Buttons ---------- */
        .action-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .btn-process {
            background: var(--gold);
            color: #000;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .btn-process:hover {
            background: var(--gold-light);
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(212, 168, 67, 0.3);
        }

        .btn-process.blue {
            background: #3b82f6;
            color: #fff;
        }

        .btn-process.blue:hover {
            background: #2563eb;
            box-shadow: 0 8px 30px rgba(59, 130, 246, 0.3);
        }

        .btn-danger-custom {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            border: 1px solid rgba(239, 68, 68, 0.2);
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .btn-danger-custom:hover {
            background: rgba(239, 68, 68, 0.25);
            border-color: #ef4444;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 24px;
            background: var(--bg-hover);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: var(--transition);
        }

        .btn-back:hover {
            border-color: var(--gold);
            color: var(--gold);
            background: var(--gold-bg);
        }

        .status-message {
            margin-top: 16px;
            color: #22c55e;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .status-message i {
            font-size: 18px;
        }

        .divider {
            border: none;
            border-top: 1px solid var(--border-color);
            margin: 20px 0;
        }

        .meta-info {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            color: var(--text-muted);
            font-size: 13px;
            padding-top: 16px;
            border-top: 1px solid var(--border-color);
            margin-top: 16px;
        }

        .meta-info span i {
            margin-right: 6px;
            color: var(--gold);
        }

        /* ---------- Responsive ---------- */
        @media (max-width: 768px) {
            .detail-container {
                padding: 0 12px;
                margin: 20px auto;
            }

            .detail-card {
                padding: 20px;
            }

            .detail-title {
                font-size: 20px;
                flex-wrap: wrap;
            }

            .detail-info {
                grid-template-columns: 1fr;
                gap: 4px;
            }

            .detail-info p {
                font-size: 13px;
            }

            .detail-info p strong {
                min-width: 80px;
            }

            .detail-table thead th,
            .detail-table tbody td {
                padding: 8px 10px;
                font-size: 12px;
            }

            .detail-total h2 {
                font-size: 18px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .action-buttons .btn,
            .action-buttons .btn-process,
            .action-buttons .btn-danger-custom,
            .action-buttons .btn-back {
                width: 100%;
                justify-content: center;
            }

            .meta-info {
                flex-direction: column;
                gap: 8px;
            }
        }

        @media (max-width: 480px) {
            .detail-card {
                padding: 16px;
            }

            .detail-title {
                font-size: 17px;
            }

            .detail-title i {
                font-size: 20px;
            }

            .detail-table {
                font-size: 11px;
            }

            .detail-table thead th,
            .detail-table tbody td {
                padding: 6px 8px;
                font-size: 11px;
            }

            .status-badge {
                font-size: 12px;
                padding: 6px 14px;
            }
        }
    </style>
</head>

<body>

    <div class="detail-container">

        <div class="detail-card">

            <!-- Title -->
            <h1 class="detail-title">
                <i class="fas fa-receipt"></i>
                Detail Pesanan
                <span class="order-id">#{{ $order->id }}</span>
            </h1>

            <!-- Info -->
            <div class="detail-info">

                <p>
                    <strong><i class="fas fa-user"></i> Nama</strong>
                    {{ $order->customer_name }}
                </p>

                <p>
                    <strong><i class="fas fa-phone"></i> No HP</strong>
                    {{ $order->phone }}
                </p>

                <p>
                    <strong><i class="fas fa-truck"></i> Metode</strong>
                    @if($order->delivery_type == 'antar')
                        <span class="badge badge-warning">🚚 Antar</span>
                    @else
                        <span class="badge badge-info">🏪 Ambil Sendiri</span>
                    @endif
                </p>

                <p>
                    <strong><i class="fas fa-clock"></i> Waktu</strong>

                    @php
                        // Fungsi untuk format waktu Indonesia
                        function formatWaktuIndonesia($time) {
                            if (!$time) return '-';

                            // Parse waktu dengan timezone Asia/Jakarta
                            $carbon = \Carbon\Carbon::parse($time);
                            $carbon->setTimezone('Asia/Jakarta');

                            $hour = (int)$carbon->format('H');
                            $timeStr = $carbon->format('H:i');

                            if($hour >= 4 && $hour < 11) {
                                return ['time' => $timeStr, 'period' => 'Pagi', 'icon' => 'fa-sun', 'class' => 'morning'];
                            } elseif($hour >= 11 && $hour < 15) {
                                return ['time' => $timeStr, 'period' => 'Siang', 'icon' => 'fa-sun', 'class' => 'afternoon'];
                            } elseif($hour >= 15 && $hour < 18) {
                                return ['time' => $timeStr, 'period' => 'Sore', 'icon' => 'fa-cloud-sun', 'class' => 'evening'];
                            } else {
                                return ['time' => $timeStr, 'period' => 'Malam', 'icon' => 'fa-moon', 'class' => 'night'];
                            }
                        }

                        // Ambil waktu dari created_at
                        $waktu = formatWaktuIndonesia($order->created_at);
                    @endphp

                    <span class="time-format {{ $waktu['class'] }}">
                        <i class="fas {{ $waktu['icon'] }}"></i>
                        {{ $waktu['time'] }} ({{ $waktu['period'] }})
                    </span>
                </p>

                @if($order->delivery_type == 'antar')
                    <p class="full-width">
                        <strong><i class="fas fa-map-pin"></i> Alamat</strong>
                        {{ $order->address }}
                    </p>

                    @if($order->landmark)
                        <p class="full-width">
                            <strong><i class="fas fa-flag"></i> Patokan</strong>
                            {{ $order->landmark }}
                        </p>
                    @endif
                @endif

                <p class="full-width">
                    <strong><i class="fas fa-sticky-note"></i> Catatan</strong>
                    {{ $order->note ?: '-' }}
                </p>

            </div>

            <hr class="divider">

            <!-- Items -->
            <h2 class="section-title">
                <i class="fas fa-utensils"></i>
                Daftar Menu
            </h2>

            <table class="detail-table">
                <thead>
                    <tr>
                        <th>Menu</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->menu_name }}</td>
                        <td class="item-price">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td>{{ $item->qty }}</td>
                        <td class="item-price">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Total -->
            <div class="detail-total">
                <h2>
                    Total : <span>Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                </h2>
            </div>

            <!-- Status & Actions -->
            <div class="mt-6">

                @if($order->status == 'Menunggu')

                    <span class="status-badge waiting">
                        <i class="fas fa-clock"></i> Menunggu
                    </span>

                    <form action="{{ route('orders.status', $order->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn-process">
                            <i class="fas fa-play"></i> Mulai Proses
                        </button>
                    </form>

                @elseif($order->status == 'Diproses')

                    <span class="status-badge process">
                        <i class="fas fa-spinner fa-spin"></i> Diproses
                    </span>

                    <form action="{{ route('orders.status', $order->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn-process blue">
                            <i class="fas fa-check"></i> Selesaikan Pesanan
                        </button>
                    </form>

                @else

                    <span class="status-badge completed">
                        <i class="fas fa-check-circle"></i> Selesai
                    </span>

                    <div class="status-message">
                        <i class="fas fa-check-circle"></i>
                        Pesanan telah selesai.
                    </div>

                @endif

            </div>

            <!-- Meta Info -->
            <div class="meta-info">
                <span>
                    <i class="fas fa-calendar-alt"></i>
                    Dibuat:
                    {{ \Carbon\Carbon::parse($order->created_at)->setTimezone('Asia/Jakarta')->format('d M Y H:i') }} WIB
                </span>
                @if($order->updated_at)
                <span>
                    <i class="fas fa-edit"></i>
                    Diperbarui:
                    {{ \Carbon\Carbon::parse($order->updated_at)->setTimezone('Asia/Jakarta')->format('d M Y H:i') }} WIB
                </span>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">

                <a href="{{ route('orders.index') }}" class="btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>

                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Hapus pesanan ini?')" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger-custom">
                        <i class="fas fa-trash-alt"></i> Hapus Pesanan
                    </button>
                </form>

            </div>

        </div>

    </div>

</body>
</html>