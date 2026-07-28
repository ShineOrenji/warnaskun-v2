<!-- ============================================ -->
<!-- ORDER MODAL - VERSI KEREN -->
<!-- ============================================ -->

<div class="modal-order-content">

    <!-- Header -->
    <div class="modal-order-header">
        <div class="header-left">
            <div class="order-icon">
                <i class="fas fa-receipt"></i>
            </div>
            <div>
                <h2 class="modal-order-title">
                    Pesanan <span class="order-id">#{{ $order->id }}</span>
                </h2>
                <span class="order-date">
                    <i class="fas fa-calendar-alt"></i>
                    {{ \Carbon\Carbon::parse($order->created_at)->setTimezone('Asia/Jakarta')->format('d M Y H:i') }} WIB
                </span>
            </div>
        </div>
        <div class="header-right">
            @php
                $statusMap = [
                    'Menunggu' => ['class' => 'badge-warning', 'icon' => 'fa-clock'],
                    'Diproses' => ['class' => 'badge-info', 'icon' => 'fa-spinner fa-spin'],
                    'Selesai' => ['class' => 'badge-success', 'icon' => 'fa-check-circle'],
                    'Dibatalkan' => ['class' => 'badge-danger', 'icon' => 'fa-times-circle']
                ];
                $status = $statusMap[$order->status] ?? $statusMap['Menunggu'];
            @endphp
            <span class="badge {{ $status['class'] }}">
                <i class="fas {{ $status['icon'] }}"></i>
                {{ $order->status }}
            </span>
        </div>
    </div>

    <!-- Body -->
    <div class="modal-order-body">

        <!-- Customer Info -->
        <div class="customer-info">
            <div class="info-item">
                <span class="info-label">
                    <i class="fas fa-user"></i> Nama
                </span>
                <span class="info-value">{{ $order->customer_name }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">
                    <i class="fas fa-phone"></i> HP
                </span>
                <span class="info-value">{{ $order->phone }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">
                    <i class="fas fa-truck"></i> Metode
                </span>
                <span class="info-value">
                    @if($order->delivery_type == 'antar')
                        <span class="badge badge-warning" style="font-size: 11px;">🚚 Antar</span>
                    @else
                        <span class="badge badge-info" style="font-size: 11px;">🏪 Ambil Sendiri</span>
                    @endif
                </span>
            </div>
            @if($order->delivery_type == 'antar' && $order->address)
            <div class="info-item full-width">
                <span class="info-label">
                    <i class="fas fa-map-pin"></i> Alamat
                </span>
                <span class="info-value">{{ $order->address }}</span>
            </div>
            @endif
            @if($order->note)
            <div class="info-item full-width">
                <span class="info-label">
                    <i class="fas fa-sticky-note"></i> Catatan
                </span>
                <span class="info-value">{{ $order->note }}</span>
            </div>
            @endif
        </div>

        <!-- Divider -->
        <div class="modal-divider"></div>

        <!-- Items List -->
        <div class="items-list">
            <div class="items-header">
                <span class="items-label">
                    <i class="fas fa-utensils"></i> Daftar Menu
                </span>
                <span class="items-count">{{ $order->items->count() }} item</span>
            </div>

            @foreach($order->items as $item)
            <div class="item-row">
                <div class="item-info">
                    <span class="item-name">{{ $item->menu_name }}</span>
                    <span class="item-qty">× {{ $item->qty }}</span>
                </div>
                <span class="item-price">
                    Rp {{ number_format($item->price * $item->qty, 0, ',', '.') }}
                </span>
            </div>
            @endforeach
        </div>

        <!-- Divider -->
        <div class="modal-divider"></div>

        <!-- Total -->
        <div class="total-section">
            <div class="total-row">
                <span class="total-label">Total</span>
                <span class="total-value">Rp {{ number_format($order->total, 0, ',', '.') }}</span>
            </div>
        </div>

    </div>

</div>

<style>
    /* ============================================ */
    /* ORDER MODAL - STYLING */
    /* ============================================ */

    .modal-order-content {
        background: var(--bg-card);
        border-radius: var(--radius);
        overflow: hidden;
        min-width: 380px;
        max-width: 480px;
        width: 100%;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6);
    }

    /* ---------- HEADER ---------- */
    .modal-order-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 24px;
        border-bottom: 1px solid var(--border-color);
        background: var(--bg-secondary);
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .order-icon {
        width: 44px;
        height: 44px;
        background: linear-gradient(135deg, var(--gold-bg), var(--gold-bg-hover));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gold);
        font-size: 20px;
        flex-shrink: 0;
        border: 1px solid var(--gold);
    }

    .modal-order-title {
        font-size: 18px;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0;
    }

    .modal-order-title .order-id {
        color: var(--gold);
    }

    .order-date {
        font-size: 12px;
        color: var(--text-muted);
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .order-date i {
        font-size: 11px;
        color: var(--gold);
    }

    .header-right {
        flex-shrink: 0;
    }

    .header-right .badge {
        font-size: 12px;
        padding: 4px 14px;
    }

    /* ---------- BODY ---------- */
    .modal-order-body {
        padding: 20px 24px 24px;
    }

    /* ---------- CUSTOMER INFO ---------- */
    .customer-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 6px 20px;
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 6px 0;
        border-bottom: 1px solid var(--border-color);
    }

    .info-item.full-width {
        grid-column: 1 / -1;
    }

    .info-label {
        font-size: 13px;
        color: var(--text-muted);
        display: flex;
        align-items: center;
        gap: 6px;
        font-weight: 500;
    }

    .info-label i {
        font-size: 12px;
        color: var(--gold);
        width: 16px;
    }

    .info-value {
        font-size: 13px;
        color: var(--text-primary);
        font-weight: 500;
        text-align: right;
        max-width: 60%;
        word-break: break-word;
    }

    .info-value .badge {
        font-size: 11px;
        padding: 2px 12px;
    }

    /* ---------- DIVIDER ---------- */
    .modal-divider {
        border: none;
        border-top: 1px solid var(--border-color);
        margin: 14px 0;
    }

    /* ---------- ITEMS ---------- */
    .items-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .items-label {
        font-size: 14px;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .items-label i {
        color: var(--gold);
    }

    .items-count {
        font-size: 12px;
        color: var(--text-muted);
        background: var(--bg-hover);
        padding: 2px 12px;
        border-radius: 20px;
    }

    .item-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0;
        border-bottom: 1px solid var(--border-color);
    }

    .item-row:last-child {
        border-bottom: none;
    }

    .item-info {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .item-name {
        font-size: 14px;
        color: var(--text-secondary);
    }

    .item-qty {
        font-size: 13px;
        color: var(--text-muted);
        font-weight: 500;
    }

    .item-price {
        font-size: 14px;
        color: var(--gold);
        font-weight: 600;
    }

    /* ---------- TOTAL ---------- */
    .total-section {
        margin-top: 4px;
    }

    .total-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0 4px;
        border-top: 2px solid var(--gold);
    }

    .total-label {
        font-size: 16px;
        font-weight: 700;
        color: var(--text-primary);
    }

    .total-value {
        font-size: 20px;
        font-weight: 700;
        color: var(--gold);
    }

    /* ---------- RESPONSIVE ---------- */
    @media (max-width: 500px) {
        .modal-order-content {
            min-width: unset;
            max-width: 95%;
            margin: 0 10px;
            border-radius: 10px;
        }

        .modal-order-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
            padding: 16px 20px;
        }

        .header-left {
            width: 100%;
        }

        .header-right {
            width: 100%;
        }

        .modal-order-body {
            padding: 16px 20px 20px;
        }

        .customer-info {
            grid-template-columns: 1fr;
            gap: 4px;
        }

        .info-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 2px;
            padding: 6px 0;
        }

        .info-value {
            text-align: left;
            max-width: 100%;
            font-size: 13px;
        }

        .item-row {
            flex-direction: column;
            align-items: flex-start;
            gap: 4px;
            padding: 8px 0;
        }

        .item-price {
            align-self: flex-end;
        }

        .total-row {
            flex-direction: column;
            align-items: stretch;
            gap: 4px;
            padding-top: 12px;
        }

        .total-value {
            text-align: right;
            font-size: 18px;
        }

        .order-icon {
            width: 36px;
            height: 36px;
            font-size: 16px;
        }

        .modal-order-title {
            font-size: 16px;
        }
    }

    @media (max-width: 380px) {
        .modal-order-header {
            padding: 12px 16px;
        }

        .modal-order-body {
            padding: 12px 16px 16px;
        }

        .modal-order-title {
            font-size: 14px;
        }

        .item-name {
            font-size: 13px;
        }

        .item-price {
            font-size: 13px;
        }

        .total-value {
            font-size: 16px;
        }
    }
</style>