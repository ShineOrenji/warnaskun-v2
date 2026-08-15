<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if($order->payment_method == 'qris' && $order->payment_status == 'pending')
            Menunggu Pembayaran - Warung Ibu Opik
        @else
            Pesanan Berhasil - Warung Ibu Opik
        @endif
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/admin-style.css') }}">
    <style>
        body { background: var(--bg-primary); font-family: 'DM Sans', sans-serif; display: flex; align-items: center; justify-content: center; min-height: 100vh; padding: 20px; }
        .success-card { background: var(--bg-card); border: 1px solid var(--border-color); border-radius: 12px; padding: 40px 32px; max-width: 500px; width: 100%; text-align: center; box-shadow: 0 8px 40px rgba(0, 0, 0, 0.4); }
        .success-icon { width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 36px; border: 3px solid; }
        .icon-pending { background: rgba(212, 168, 67, 0.15); border-color: var(--gold); color: var(--gold); }
        .icon-success { background: rgba(34, 197, 94, 0.15); border-color: #22c55e; color: #22c55e; }
        .summary-row { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid var(--border-color); font-size: 14px; }
        .btn-success { display: inline-flex; align-items: center; gap: 10px; padding: 12px 28px; border-radius: 8px; font-size: 15px; font-weight: 600; text-decoration: none; border: none; cursor: pointer; width: 100%; justify-content: center; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="success-card">
        
        <!-- BAGIAN HEADER STATUS -->
        @if($order->payment_method == 'qris' && $order->payment_status == 'pending')
            <div class="success-icon icon-pending"><i class="fas fa-clock"></i></div>
            <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 8px; color: var(--text-primary);">Menunggu Pembayaran</h1>
            <p style="color: var(--text-secondary); font-size: 14px; margin-bottom: 24px;">Silakan klik tombol di bawah untuk membayar pesanan QRIS Anda (Batas Waktu: 10 Menit).</p>
        @else
            <div class="success-icon icon-success"><i class="fas fa-check"></i></div>
            <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 8px; color: var(--text-primary);">
                <i class="fas fa-check-circle" style="color: #22c55e;"></i> {{ $order->payment_method == 'qris' ? 'Pembayaran Berhasil!' : 'Pesanan Berhasil!' }}
            </h1>
            <p style="color: var(--text-secondary); font-size: 14px; margin-bottom: 24px;">Terima kasih telah memesan di <strong>Warung Ibu Opik</strong>.</p>
        @endif

        <!-- BAGIAN INFO PESANAN & RINCIAN MENU (STRUK) -->
        <div style="background: var(--bg-primary); border: 1px solid var(--border-color); border-radius: 8px; padding: 20px; text-align: left; margin-bottom: 20px;">
            <div class="summary-row">
                <span style="color: var(--text-muted);">No Pesanan</span>
                <span style="color: var(--gold); font-weight: bold;">#{{ $order->id }}</span>
            </div>
            <div class="summary-row">
                <span style="color: var(--text-muted);">Nama Pemesan</span>
                <span style="color: var(--text-primary); font-weight: 600;">{{ $order->customer_name }}</span>
            </div>
            <div class="summary-row">
                <span style="color: var(--text-muted);">Metode Pengiriman</span>
                <span style="color: var(--text-primary); font-weight: 600;">{{ $order->delivery_type == 'antar' ? '🚚 Antar ke Alamat' : '🏪 Ambil Sendiri' }}</span>
            </div>
            <div class="summary-row">
                <span style="color: var(--text-muted);">Pembayaran</span>
                <span style="color: var(--text-primary); font-weight: 600;">{{ strtoupper($order->payment_method) }}</span>
            </div>

            <!-- RINCIAN DAFTAR MENU -->
            <div style="margin-top: 15px; border-top: 1px dashed var(--border-color); padding-top: 12px;">
                <div style="font-size: 13px; color: var(--gold); font-weight: bold; margin-bottom: 8px;"><i class="fas fa-utensils"></i> Rincian Menu:</div>
                @foreach($order->items as $item)
                    <div style="display: flex; justify-content: space-between; font-size: 13px; color: var(--text-secondary); margin-bottom: 4px;">
                        <span>{{ $item->qty }}x {{ $item->menu_name }}</span>
                        <span style="color: var(--text-primary);">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                    </div>
                @endforeach
            </div>

            <div class="summary-row" style="margin-top: 10px; border-top: 2px solid var(--border-color); padding-top: 10px;">
                <span style="color: var(--text-primary); font-weight: bold;">Total Tagihan</span>
                <span style="color: #22c55e; font-weight: bold; font-size: 16px;">Rp {{ number_format($order->total, 0, ',', '.') }}</span>
            </div>
        </div>

        <!-- BAGIAN TOMBOL AKSI -->
        <div>
            @if($order->payment_method == 'qris' && $order->payment_status == 'pending')
                <button id="pay-button" class="btn-success" style="background: var(--gold); color: #000;">
                    <i class="fas fa-qrcode"></i> Bayar Sekarang (QRIS)
                </button>
            @endif

            <a href="{{ route('customer.orders') }}" class="btn-success" style="background: rgba(255,255,255,0.1); color: #fff; border: 1px solid rgba(255,255,255,0.2);">
                <i class="fas fa-list"></i> Lihat Riwayat Pesanan
            </a>
            <a href="{{ url('/') }}#menu" class="btn-success" style="background: transparent; color: var(--gold); border: 1px solid var(--gold);">
                <i class="fas fa-utensils"></i> Pesan Lagi
            </a>
        </div>
    </div>

    <!-- SCRIPT MIDTRANS (TIDAK ADA AUTO POPUP) -->
    @if($order->payment_method == 'qris' && $order->payment_status == 'pending')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script>
        const payButton = document.getElementById('pay-button');
        if(payButton) {
            payButton.addEventListener('click', function() {
                window.snap.pay('{{ session('snap_token') }}', {
                    onSuccess: function(result){
                        // Tembak halaman finish untuk verifikasi Lunas & Reload!
                        window.location.href = "/payment-finish?order_id=OPIK-{{ $order->id }}-" + Date.now() + "&transaction_status=settlement";
                    },
                    onPending: function(result){ alert("Silakan selesaikan pembayaran QRIS Anda!"); },
                    onError: function(result){ alert("Pembayaran gagal!"); }
                });
            });
        }
    </script>
    @endif
</body>
</html>