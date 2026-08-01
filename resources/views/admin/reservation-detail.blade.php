<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Reservasi #{{ $reservation->id }}</title>

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

        /* ---------- DETAIL CONTAINER ---------- */
        .detail-container {
            max-width: 700px;
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

        /* ---------- TITLE ---------- */
        .detail-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 20px;
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

        .detail-title .reservation-id {
            color: var(--gold);
        }

        /* ---------- DIVIDER ---------- */
        .detail-divider {
            border: none;
            border-top: 1px solid var(--border-color);
            margin: 16px 0;
        }

        /* ---------- INFO ---------- */
        .detail-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px 32px;
            margin: 16px 0;
        }

        .detail-info p {
            color: var(--text-secondary);
            font-size: 14px;
            padding: 8px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .detail-info p.full-width {
            grid-column: 1 / -1;
        }

        .detail-info p strong {
            color: var(--text-primary);
            font-weight: 600;
            display: inline-block;
            min-width: 120px;
        }

        .detail-info p strong i {
            color: var(--gold);
            width: 18px;
            margin-right: 4px;
        }

        /* ---------- BADGE ---------- */
        .badge {
            padding: 4px 14px !important;
            border-radius: 20px !important;
            font-size: 12px !important;
            font-weight: 600 !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 6px !important;
        }

        .badge-warning {
            background: rgba(212, 168, 67, 0.15) !important;
            color: #d4a843 !important;
        }

        .badge-info {
            background: rgba(59, 130, 246, 0.15) !important;
            color: #3b82f6 !important;
        }

        .badge-success {
            background: rgba(34, 197, 94, 0.15) !important;
            color: #22c55e !important;
        }

        .badge-danger {
            background: rgba(239, 68, 68, 0.15) !important;
            color: #ef4444 !important;
        }

        /* ---------- BUTTONS ---------- */
        .btn-action {
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-action:hover {
            transform: translateY(-2px);
        }

        .btn-confirm {
            background: #d4a843;
            color: #000;
        }

        .btn-confirm:hover {
            background: #e8c96e;
            box-shadow: 0 8px 30px rgba(212, 168, 67, 0.3);
        }

        .btn-complete {
            background: #22c55e;
            color: #fff;
        }

        .btn-complete:hover {
            background: #16a34a;
            box-shadow: 0 8px 30px rgba(34, 197, 94, 0.3);
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .btn-delete:hover {
            background: rgba(239, 68, 68, 0.25);
            border-color: #ef4444;
        }

        .btn-back {
            background: var(--bg-hover);
            border: 1px solid var(--border-color);
            color: var(--text-secondary);
        }

        .btn-back:hover {
            border-color: var(--gold);
            color: var(--gold);
            background: var(--gold-bg);
        }

        /* ---------- STATUS MESSAGE ---------- */
        .status-message {
            margin-top: 12px;
            color: #22c55e;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .status-message i {
            font-size: 18px;
        }

        /* ---------- ACTION WRAPPER ---------- */
        .action-wrapper {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .action-wrapper .btn-action {
            width: fit-content;
        }

        .action-group {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 8px;
        }

        /* ---------- META INFO ---------- */
        .meta-info {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            color: var(--text-muted);
            font-size: 12px;
            padding-top: 16px;
            border-top: 1px solid var(--border-color);
            margin-top: 20px;
        }

        .meta-info span i {
            margin-right: 6px;
            color: var(--gold);
        }

        /* ---------- RESPONSIVE ---------- */
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

            .detail-title i {
                font-size: 22px;
            }

            .detail-info {
                grid-template-columns: 1fr;
                gap: 4px;
            }

            .detail-info p {
                font-size: 13px;
            }

            .detail-info p strong {
                min-width: 100px;
            }

            .action-group {
                flex-direction: column;
            }

            .action-group .btn-action {
                width: 100%;
                justify-content: center;
            }

            .action-wrapper .btn-action {
                width: 100%;
                justify-content: center;
            }

            .meta-info {
                flex-direction: column;
                gap: 6px;
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
                font-size: 18px;
            }

            .detail-info p {
                font-size: 12px;
            }

            .detail-info p strong {
                min-width: 80px;
                font-size: 12px;
            }

            .btn-action {
                font-size: 13px;
                padding: 8px 18px;
            }

            .badge {
                font-size: 11px !important;
                padding: 3px 12px !important;
            }
        }
    </style>
</head>
<body>

    <div class="detail-container">

        <div class="detail-card">

            <!-- Title -->
            <h1 class="detail-title">
                <i class="fas fa-calendar-check"></i>
                Detail Reservasi
                <span class="reservation-id">#{{ $reservation->id }}</span>
            </h1>

            <hr class="detail-divider">

            <!-- Info -->
            <div class="detail-info">

                <p>
                    <strong><i class="fas fa-user"></i> Nama</strong>
                    {{ $reservation->name }}
                </p>

                <p>
                    <strong><i class="fas fa-phone"></i> No HP</strong>
                    {{ $reservation->phone }}
                </p>

                <p>
                    <strong><i class="fas fa-users"></i> Jumlah Orang</strong>
                    {{ $reservation->person }} Orang
                </p>

                <p>
                    <strong><i class="fas fa-calendar-alt"></i> Tanggal</strong>
                    {{ \Carbon\Carbon::parse($reservation->reservation_date)->setTimezone('Asia/Jakarta')->format('d M Y') }}
                </p>

                <p>
                    <strong><i class="fas fa-clock"></i> Jam</strong>
                    {{ \Carbon\Carbon::parse($reservation->reservation_time)->setTimezone('Asia/Jakarta')->format('H:i') }} WIB
                </p>

                <p class="full-width">
                    <strong><i class="fas fa-sticky-note"></i> Pesan</strong>
                    {{ $reservation->message ?: '-' }}
                </p>

                <p class="full-width">
                    <strong><i class="fas fa-info-circle"></i> Status</strong>

                    @php
                        $statusMap = [
                        'Menunggu' => ['warning', 'Menunggu'],
                        'Diterima' => ['gold', 'Diterima'],
                        'Selesai' => ['', 'Selesai'],
                        'Ditolak' => ['danger', 'Ditolak'],
                    ];

                        $status = $statusMap[$reservation->status] ?? ['badge-warning', $reservation->status];
                    @endphp

                    <span class="badge {{ $status[0] }}">
                        {{ $status[1] }}
                    </span>
                </p>

            </div>

            <!-- Status & Actions -->
            <div class="action-wrapper">

                @if($reservation->status == 'Menunggu')


                    <form action="{{ route('reservations.status', $reservation->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <button class="btn-action btn-confirm">
                            <i class="fas fa-check"></i>
                            Terima Reservasi
                        </button>
                    </form>

                @elseif($reservation->status == 'Diterima')

                    <form action="{{ route('reservations.status', $reservation->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <button class="btn-action btn-complete">
                            <i class="fas fa-check-double"></i>
                            Tandai Selesai
                        </button>
                    </form>

                @elseif($reservation->status == 'Ditolak')

                <div class="status-message" style="color:#ef4444;">
                    <i class="fas fa-times-circle"></i>
                    Reservasi telah ditolak.
                </div>

                @else

                    <div class="status-message">
                        <i class="fas fa-check-circle"></i>
                        Reservasi telah selesai.
                    </div>

                @endif

            </div>

            <!-- Action Buttons -->
            <div class="action-group">

                <a href="{{ route('reservations.index') }}" class="btn-action btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>

                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus reservasi ini?')" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action btn-delete">
                        <i class="fas fa-trash-alt"></i> Hapus Reservasi
                    </button>
                </form>

            </div>

            <!-- Meta Info -->
            <div class="meta-info">
                <span>
                    <i class="fas fa-calendar-alt"></i>
                    Dibuat: {{ \Carbon\Carbon::parse($reservation->created_at)->setTimezone('Asia/Jakarta')->format('d M Y H:i') }} WIB
                </span>
                @if($reservation->updated_at)
                <span>
                    <i class="fas fa-edit"></i>
                    Diperbarui: {{ \Carbon\Carbon::parse($reservation->updated_at)->setTimezone('Asia/Jakarta')->format('d M Y H:i') }} WIB
                </span>
                @endif
            </div>

        </div>

    </div>

</body>
</html>