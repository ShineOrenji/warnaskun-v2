<div style="color: var(--text-primary);" data-customer-name="{{ $order->customer_name }}">
    <!-- Title -->
    <div style="font-size: 22px; font-weight: 700; margin-bottom: 20px; display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid var(--gold); padding-bottom: 12px;">
        <div style="display: flex; align-items: center; gap: 10px;">
            <i class="fas fa-receipt" style="color: var(--gold); font-size: 24px;"></i>
            <span>Detail Pesanan <span style="color: var(--gold);">#{{ $order->id }}</span></span>
        </div>
        <div>
            @if($order->status == 'Menunggu')
                <span class="badge" style="background: rgba(212, 168, 67, 0.15); color: var(--gold); font-size: 12px; padding: 6px 14px;"><i class="fas fa-clock"></i> Menunggu</span>
            @elseif($order->status == 'Diproses')
                <span class="badge" style="background: rgba(59, 130, 246, 0.15); color: #3b82f6; font-size: 12px; padding: 6px 14px;"><i class="fas fa-spinner fa-spin"></i> Diproses</span>
            @else
                <span class="badge" style="background: rgba(34, 197, 94, 0.15); color: #22c55e; font-size: 12px; padding: 6px 14px;"><i class="fas fa-check-circle"></i> Selesai</span>
            @endif
        </div>
    </div>

    <!-- Info Grid -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px 24px; margin-bottom: 24px; font-size: 13px; background: var(--bg-primary); padding: 16px; border-radius: 8px; border: 1px solid var(--border-color);">
        <p style="margin: 0; color: var(--text-secondary);">
            <strong style="color: var(--text-primary); display: block; font-size: 11px; text-transform: uppercase; color: var(--text-muted); margin-bottom: 2px;"><i class="fas fa-user" style="color: var(--gold); width: 16px;"></i> Nama Pelanggan</strong> 
            {{ $order->customer_name }}
        </p>
        <p style="margin: 0; color: var(--text-secondary);">
            <strong style="color: var(--text-primary); display: block; font-size: 11px; text-transform: uppercase; color: var(--text-muted); margin-bottom: 2px;"><i class="fas fa-phone" style="color: var(--gold); width: 16px;"></i> Nomor HP</strong> 
            {{ $order->phone }}
        </p>
        <p style="margin: 0; color: var(--text-secondary);">
            <strong style="color: var(--text-primary); display: block; font-size: 11px; text-transform: uppercase; color: var(--text-muted); margin-bottom: 2px;"><i class="fas fa-truck" style="color: var(--gold); width: 16px;"></i> Metode Pengiriman</strong> 
            @if($order->delivery_type == 'antar')
                <span style="color: #fbbf24; font-weight: 600;"><i class="fas fa-motorcycle"></i> Antar ke Alamat</span>
            @else
                <span style="color: #3b82f6; font-weight: 600;"><i class="fas fa-store"></i> Ambil Sendiri</span>
            @endif
        </p>
        <p style="margin: 0; color: var(--text-secondary);">
            <strong style="color: var(--text-primary); display: block; font-size: 11px; text-transform: uppercase; color: var(--text-muted); margin-bottom: 2px;"><i class="fas fa-clock" style="color: var(--gold); width: 16px;"></i> Waktu Pesan</strong> 
            {{ \Carbon\Carbon::parse($order->created_at)->setTimezone('Asia/Jakarta')->format('d M Y, H:i') }} WIB
        </p>

        @if($order->delivery_type == 'antar')
            <p style="grid-column: 1 / -1; margin: 0; color: var(--text-secondary);">
                <strong style="color: var(--text-primary); display: block; font-size: 11px; text-transform: uppercase; color: var(--text-muted); margin-bottom: 2px;"><i class="fas fa-map-marker-alt" style="color: var(--gold); width: 16px;"></i> Alamat Lengkap</strong> 
                {{ $order->address }}
            </p>
            @if($order->landmark)
                <p style="grid-column: 1 / -1; margin: 0; color: var(--text-secondary);">
                    <strong style="color: var(--text-primary); display: block; font-size: 11px; text-transform: uppercase; color: var(--text-muted); margin-bottom: 2px;"><i class="fas fa-flag" style="color: var(--gold); width: 16px;"></i> Patokan Lokasi</strong> 
                    {{ $order->landmark }}
                </p>
            @endif
        @endif

        <p style="grid-column: 1 / -1; margin: 0; color: var(--text-secondary);">
            <strong style="color: var(--text-primary); display: block; font-size: 11px; text-transform: uppercase; color: var(--text-muted); margin-bottom: 2px;"><i class="fas fa-sticky-note" style="color: var(--gold); width: 16px;"></i> Catatan Pesanan</strong> 
            {{ $order->note ?: '-' }}
        </p>
    </div>

    <!-- Table Items -->
    <h3 style="font-size: 15px; font-weight: 600; margin-bottom: 12px; color: var(--text-primary); display: flex; align-items: center; gap: 8px;">
        <i class="fas fa-utensils" style="color: var(--gold);"></i> Daftar Menu yang Dipesan
    </h3>
    <div style="overflow-x: auto; margin-bottom: 16px;">
        <table style="width: 100%; border-collapse: collapse; font-size: 13px;">
            <thead>
                <tr style="background: var(--bg-hover); border-bottom: 2px solid var(--gold);">
                    <th style="padding: 10px 12px; text-align: left; color: var(--text-muted);">Menu</th>
                    <th style="padding: 10px 12px; text-align: center; color: var(--text-muted);">Harga</th>
                    <th style="padding: 10px 12px; text-align: center; color: var(--text-muted);">Qty</th>
                    <th style="padding: 10px 12px; text-align: right; color: var(--text-muted);">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr style="border-bottom: 1px solid var(--border-color);">
                    <td style="padding: 10px 12px; color: var(--text-primary); font-weight: 500;">{{ $item->menu_name }}</td>
                    <td style="padding: 10px 12px; text-align: center; color: var(--text-secondary);">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    <td style="padding: 10px 12px; text-align: center; font-weight: 600; color: var(--text-primary);">{{ $item->qty }}</td>
                    <td style="padding: 10px 12px; text-align: right; color: var(--gold); font-weight: 600;">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Total -->
    <div style="text-align: right; padding: 12px 0; border-top: 2px solid var(--gold); border-bottom: 1px solid var(--border-color); margin-bottom: 20px;">
        <h3 style="font-size: 18px; font-weight: 700; color: var(--text-primary);">
            Total Pembayaran : <span style="color: var(--gold);">Rp {{ number_format($order->total, 0, ',', '.') }}</span>
        </h3>
    </div>

    <!-- Action Buttons -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
        <button type="button" class="btn btn-outline" onclick="closeOrderModal()" style="padding: 10px 20px;">
            <i class="fas fa-arrow-left"></i> Tutup
        </button>

        <div style="display: flex; gap: 8px;">
            @if($order->status == 'Menunggu')
                <button type="button" class="btn btn-primary" onclick="updateOrderStatus({{ $order->id }}, 'Menunggu')" style="padding: 10px 20px; background: var(--gold); color: #000;">
                    <i class="fas fa-play"></i> Mulai Proses
                </button>
            @elseif($order->status == 'Diproses')
                <button type="button" class="btn btn-primary" onclick="updateOrderStatus({{ $order->id }}, 'Diproses')" style="padding: 10px 20px; background: #3b82f6; color: #fff;">
                    <i class="fas fa-check"></i> Selesaikan Pesanan
                </button>
            @else
                <span style="color: #22c55e; font-weight: 600; font-size: 13px;">
                    <i class="fas fa-check-circle"></i> Pesanan Selesai & Masuk Riwayat
                </span>
            @endif
        </div>
    </div>
</div>