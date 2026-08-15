<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Pesanan - Warung Nasi Kuning Ibu Opik</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.0/css/all.min.css">
  <style>
      body { background: #121212; color: #fff; font-family: 'DM Sans', sans-serif; }
      .container-history { max-width: 800px; margin: 50px auto; padding: 20px; }
      .history-card { background: #1e1e1e; border: 1px solid rgba(212,168,67,0.3); border-radius: 12px; padding: 20px; margin-bottom: 20px; }
      .history-header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 10px; margin-bottom: 15px; }
      .badge-status { padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: bold; }
      .status-pending { background: rgba(234, 179, 8, 0.2); color: #eab308; }
      .status-paid { background: rgba(34, 197, 94, 0.2); color: #22c55e; }
      .status-cancelled { background: rgba(239, 68, 68, 0.2); color: #ef4444; }
      .back-home { display: inline-block; margin-bottom: 20px; color: var(--gold-crayola, #d4a843); text-decoration: none; }
  </style>
</head>
<body>
  <div class="container-history">
      <a href="{{ url('/') }}" class="back-home"><i class="fas fa-arrow-left"></i> Kembali ke Beranda</a>
      <h1 style="font-family: 'Forum', serif; color: var(--gold-crayola, #d4a843); font-size: 2rem; margin-bottom: 20px;">Riwayat Pesanan Saya</h1>

      @forelse($orders as $order)
          <div class="history-card">
              <div class="history-header">
                  <div>
                      <strong style="color: var(--gold-crayola);">#Order ID: {{ $order->id }}</strong>
                      <div style="font-size: 12px; color: #888;">{{ $order->created_at->format('d M Y, H:i') }}</div>
                  </div>
                  <div>
                      <span class="badge-status status-{{ $order->payment_status }}">
                          {{ strtoupper($order->payment_status) }}
                      </span>
                  </div>
              </div>
              <div style="display: flex; justify-content: space-between; align-items: center;">
                  <div>
                      <div style="font-size: 14px; color: #ccc;">Metode: <b>{{ strtoupper($order->payment_method) }}</b></div>
                      <div style="font-size: 16px; font-weight: bold; margin-top: 5px;">Total: Rp {{ number_format($order->total, 0, ',', '.') }}</div>
                  </div>
                  <div>
                      @if($order->payment_status == 'pending')
                        <span style="background: rgba(255,255,255,0.1); color: #ccc; padding: 8px 16px; border-radius: 6px; font-size: 13px;">
                            <i class="fas fa-clock"></i> Belum Lunas
                        </span>
                    @elseif($order->payment_status == 'paid')
                        <span style="background: rgba(34, 197, 94, 0.2); color: #22c55e; padding: 8px 16px; border-radius: 6px; font-weight: bold; font-size: 13px;">
                            <i class="fas fa-check-circle"></i> Lunas
                        </span>
                    @endif
                  </div>
              </div>
          </div>
      @empty
          <div style="text-align: center; padding: 40px; color: #888;">
              <i class="fas fa-shopping-bag" style="font-size: 48px; margin-bottom: 15px; color: #444;"></i>
              <p>Kamu belum pernah melakukan pesanan.</p>
          </div>
      @endforelse
  </div>
</body>
</html>