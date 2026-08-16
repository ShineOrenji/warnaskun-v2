<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Pesanan - Warung Nasi Kuning Ibu Opik</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <style>
    body { background-color: #111; color: #fff; font-family: 'DM Sans', sans-serif; padding-top: 40px; }
    .container-page { max-width: 800px; margin: 0 auto; padding: 20px; }
    .page-title { text-align: center; font-family: 'Forum', serif; color: var(--gold-crayola, #d4a843); font-size: 36px; margin-bottom: 30px; }
    
    .order-card { background: #1e1e1e; border: 1px solid rgba(212, 168, 67, 0.2); border-radius: 12px; padding: 20px; margin-bottom: 20px; position: relative; box-shadow: 0 5px 20px rgba(0,0,0,0.3); }
    .order-header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 15px; margin-bottom: 15px; }
    
    .badge { padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: bold; text-transform: uppercase; }
    .badge-paid { background: rgba(34, 197, 94, 0.2); color: #22c55e; border: 1px solid #22c55e; }
    .badge-pending { background: rgba(234, 179, 8, 0.2); color: #eab308; border: 1px solid #eab308; }
    
    .detail-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; font-size: 14px; color: #ccc; margin-bottom: 20px; }
    .detail-item strong { color: #fff; display: block; font-size: 12px; color: var(--gold-crayola, #d4a843); margin-bottom: 3px; }
    
    .menu-box { background: rgba(0,0,0,0.4); padding: 15px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.05); }
    .menu-list { display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; font-size: 14px; border-bottom: 1px dashed rgba(255,255,255,0.1); padding-bottom: 8px; }
    .menu-list:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
    
    .total-box { display: flex; justify-content: space-between; align-items: center; font-size: 18px; font-weight: bold; margin-top: 15px; padding-top: 15px; border-top: 2px solid rgba(255,255,255,0.1); }
    .total-box .price { color: #22c55e; }
    
    .btn-delete { position: absolute; top: 20px; right: 20px; background: rgba(239, 68, 68, 0.1); color: #ef4444; border: 1px solid rgba(239,68,68,0.3); padding: 6px 12px; border-radius: 6px; cursor: pointer; transition: 0.3s; font-size: 13px; }
    .btn-delete:hover { background: #ef4444; color: #fff; }
    
    .btn-back { display: inline-flex; align-items: center; gap: 8px; color: var(--gold-crayola, #d4a843); text-decoration: none; margin-bottom: 20px; font-size: 15px; transition: 0.3s; }
    .btn-back:hover { color: #fff; }
    
    @media (max-width: 600px) {
      .detail-grid { grid-template-columns: 1fr; gap: 10px; }
      .btn-delete { position: relative; top: 0; right: 0; width: 100%; margin-top: 15px; text-align: center; }
    }
    
    /* MODAL STYLE */
    .modal-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); backdrop-filter: blur(5px); display: none; align-items: center; justify-content: center; z-index: 9999; }
    .modal-overlay.show { display: flex; }
    .modal-box { background: #111; padding: 30px; border-radius: 12px; text-align: center; max-width: 350px; border: 1px solid var(--gold-crayola, #d4a843); box-shadow: 0 10px 40px rgba(0,0,0,0.5); }
  </style>
</head>
<body>

<div class="container-page">
    <a href="{{ url('/') }}" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali ke Beranda</a>
    <h1 class="page-title">Riwayat Pesanan Saya</h1>

    @forelse($orders as $order)
    <div class="order-card">
        <div class="order-header">
            <div>
                <span style="color: var(--gold-crayola, #d4a843); font-weight: bold; font-size: 18px;">Order #{{ $order->id }}</span>
                <div style="font-size: 12px; color: #888; margin-top: 5px;"><i class="fas fa-calendar-alt"></i> {{ $order->created_at->format('d M Y, H:i') }}</div>
            </div>
            @if($order->payment_status == 'paid')
                <span class="badge badge-paid">LUNAS</span>
            @else
                <span class="badge badge-pending">PENDING</span>
            @endif
        </div>

        <div class="detail-grid">
            <div class="detail-item">
                <strong><i class="fas fa-user"></i> Nama Pemesan</strong>
                {{ $order->name ?? 'Pelanggan' }}
            </div>
            <div class="detail-item">
                <strong><i class="fas fa-phone"></i> No WhatsApp</strong>
                {{ $order->phone ?? '-' }}
            </div>
            <div class="detail-item">
                <strong><i class="fas fa-motorcycle"></i> Tipe Pesanan</strong>
                {{ strtoupper($order->delivery_type ?? 'Bawa Pulang') }}
            </div>
            <div class="detail-item">
                <strong><i class="fas fa-wallet"></i> Metode Pembayaran</strong>
                {{ strtoupper($order->payment_method ?? '-') }}
            </div>
            <div class="detail-item" style="grid-column: 1 / -1;">
                <strong><i class="fas fa-sticky-note"></i> Catatan Pesanan</strong>
                {{ $order->note ? $order->note : '-' }}
            </div>
        </div>

        <div class="menu-box">
            <strong style="color: var(--gold-crayola, #d4a843); display: block; margin-bottom: 10px; font-size: 13px;"><i class="fas fa-utensils"></i> Daftar Menu Dipesan:</strong>
            @foreach($order->items as $item)
            <div class="menu-list">
                <span>{{ $item->qty }}x {{ $item->menu_name }}</span>
                <span>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
            </div>
            @endforeach
        </div>

        <div class="total-box">
            <span>Total Pembayaran:</span>
            <span class="price">Rp {{ number_format($order->total, 0, ',', '.') }}</span>
        </div>
        <!-- Delete Button -->
        <button onclick="konfirmasiHapus({{ $order->id }})" class="btn-delete"><i class="fas fa-trash-alt" style="margin-right: 5px;"></i> Hapus</button>
    </div>
    @empty
    <div style="text-align: center; padding: 50px 0; background: #1e1e1e; border-radius: 12px; border: 1px dashed rgba(255,255,255,0.1);">
        <i class="fas fa-shopping-basket" style="font-size: 50px; color: #444; margin-bottom: 15px;"></i>
        <h3 style="color: #fff; margin-bottom: 10px;">Belum Ada Riwayat</h3>
        <p style="color: #888;">Kamu belum pernah melakukan pesanan sejauh ini.</p>
    </div>
    @endforelse

</div>

<!-- CUSTOM CONFIRM MODAL -->
<div id="customConfirmModal" class="modal-overlay">
  <div class="modal-box">
    <i class="fas fa-exclamation-triangle" style="font-size: 45px; color: #ef4444; margin-bottom: 15px; drop-shadow: 0 0 10px rgba(239, 68, 68, 0.4);"></i>
    <h3 style="color: #fff; font-size: 18px; margin-bottom: 10px; font-family: 'DM Sans', sans-serif;">Konfirmasi Hapus</h3>
    <p style="color: #ccc; font-size: 14px; margin-bottom: 25px;">Apakah kamu yakin ingin menghapus Riwayat Pesanan ini?</p>
    <form id="deleteForm" method="POST" action="">
      @csrf
      @method('DELETE')
      <div style="display: flex; gap: 10px; justify-content: center;">
        <button type="button" onclick="tutupConfirmModal()" style="padding: 10px 20px; border-radius: 6px; border: 1px solid #444; background: transparent; color: #fff; cursor: pointer; transition: 0.3s;">Batal</button>
        <button type="submit" style="padding: 10px 20px; border-radius: 6px; border: none; background: #ef4444; color: #fff; cursor: pointer; font-weight: bold; transition: 0.3s; box-shadow: 0 4px 10px rgba(239,68,68,0.3);">Ya, Hapus</button>
      </div>
    </form>
  </div>
</div>

<script>
    function konfirmasiHapus(id) {
        document.getElementById('customConfirmModal').classList.add('show');
        document.getElementById('deleteForm').action = `/pelanggan/pesanan/${id}`; // Pastikan path action route sesuai dengan web.php kamu
    }

    function tutupConfirmModal() {
        document.getElementById('customConfirmModal').classList.remove('show');
    }

    window.addEventListener('click', function(e) {
        if (e.target === document.getElementById('customConfirmModal')) {
            tutupConfirmModal();
        }
    });
</script>

</body>
</html>