<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan - Admin Ibu Opik</title>

    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin-style.css') }}">

    <style>
        .table-wrapper {
            overflow-x: auto;
            width: 100%;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }
    </style>
</head>
<body>

    <!-- ============================================ -->
    <!-- SIDEBAR -->
    <!-- ============================================ -->
    <aside class="sidebar">

        <div class="sidebar-brand">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Warung Ibu Opik">
            </div>
        </div>

        <div class="sidebar-user">
            <img src="https://ui-avatars.com/api/?name=Admin&background=d4a843&color=000&size=40" alt="Admin">
            <div>
                <div class="name">Admin Ibu Opik</div>
                <div class="role">Super Admin</div>
            </div>
        </div>

        <nav class="sidebar-nav">

            <div class="nav-label">Main Menu</div>

            <a href="{{ route('dashboard.index') }}">
                <i class="fas fa-chart-line"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('menu.index') }}">
                <i class="fas fa-utensils"></i>
                <span>Menu</span>
                <span class="badge gold">{{ $totalMenus ?? 0 }}</span>
            </a>

            <a href="{{ route('orders.index') }}" class="active">
                <i class="fas fa-shopping-cart"></i>
                <span>Pesanan</span>
                <span id="sidebarPendingOrders" class="badge warning">{{ $pendingOrders ?? 0 }}</span>
            </a>

            <a href="{{ route('customers.index') }}">
                <i class="fas fa-users"></i>
                <span>Pelanggan</span>
            </a>

            <a href="{{ route('reservations.index') }}">
                <i class="fas fa-calendar-check"></i>
                <span>Reservasi</span>
            </a>

            <div class="nav-label" style="margin-top: 24px;">Settings</div>

            <a href="#">
                <i class="fas fa-cog"></i>
                <span>Pengaturan</span>
            </a>

            <button type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="display: flex; align-items: center; gap: 12px; padding: 10px 12px; border-radius: 8px; color: var(--text-secondary, #a0a0a0); text-decoration: none; font-size: 14px; font-family: 'DM Sans', sans-serif; transition: all 0.3s ease; margin-bottom: 2px; cursor: pointer; width: 100%; background: transparent; border: none; text-align: left;">
                <i class="fas fa-sign-out-alt" style="width: 20px; font-size: 16px; text-align: center;"></i>
                <span>Logout</span>
            </button>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </nav>

    </aside>

    <!-- SIDEBAR OVERLAY -->
    <div class="sidebar-overlay"></div>

    <!-- ============================================ -->
    <!-- MAIN CONTENT -->
    <!-- ============================================ -->
    <main class="main-content">

        <!-- TOPBAR -->
        <header class="topbar">

            <div class="page-title">
                <button class="hamburger" aria-label="Toggle menu">
                    <i class="fas fa-bars"></i>
                </button>
                <div>
                    <h2>Manajemen Pesanan</h2>
                    <p>Kelola semua pesanan pelanggan</p>
                </div>
            </div>

        </header>

        <!-- CONTENT -->
        <div class="content">

            <div class="card">

                <!-- ============================================ -->
                <!-- HEADER CARD -->
                <!-- ============================================ -->
                <div class="card-header">
                    <h3>
                        <i class="fas fa-shopping-cart" style="color: var(--gold);"></i>
                        Daftar Pesanan
                    </h3>
                    
                    <!-- Tambah ID disini biar angkanya bisa diubah Javascript -->
                    <div id="totalOrdersBadge" class="badge badge-warning" style="font-size: 13px; padding: 6px 14px;">
                        Total: {{ $orders->count() }} Pesanan
                    </div>
                </div>

                <div class="card-body">

                    <!-- NOTIFIKASI SUKSES -->
                    @if(session('success'))
                    <div style="background: rgba(34, 197, 94, 0.1); border-left: 4px solid #22c55e; color: #166534; padding: 16px 20px; border-radius: 8px; margin-bottom: 24px; display: flex; align-items: center; gap: 12px; font-weight: 500;">
                        <i class="fas fa-check-circle" style="font-size: 20px; color: #22c55e;"></i>
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Order ID</th>
                                    <th>Nama Pelanggan</th>
                                    <th>No HP</th>
                                    <th class="text-center">Metode</th>
                                    <th class="text-center">Total Harga</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="orderTableBody">
                                @forelse($orders as $index => $order)
                                <tr id="order-row-{{ $order->id }}" class="order-row">
                                    
                                    <!-- Nomor Urut Otomatis -->
                                    <td style="font-weight: 600; color: var(--text-secondary);">
                                        {{ $loop->iteration }}
                                    </td>
                                    
                                    <td style="font-weight: bold; color: var(--gold);">#{{ $order->id }}</td>
                                    
                                    <td>
                                        <div class="user-cell">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($order->customer_name) }}&background=d4a843&color=000&size=30" alt="Avatar">
                                            <span>{{ $order->customer_name }}</span>
                                        </div>
                                    </td>
                                    
                                    <td>{{ $order->phone }}</td>

                                    <td class="text-center">
                                        @if($order->delivery_type == 'antar')
                                            <span class="badge badge-warning"><i class="fas fa-motorcycle"></i> Antar</span>
                                        @else
                                            <span class="badge badge-info"><i class="fas fa-store"></i> Ambil</span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <strong class="total-spent">Rp {{ number_format($order->total, 0, ',', '.') }}</strong>
                                    </td>

                                    <td class="text-center status-cell">
                                        @if($order->status == 'Menunggu')
                                            <span class="badge badge-danger"><i class="fas fa-clock"></i> Menunggu</span>
                                        @elseif($order->status == 'Diproses')
                                            <span class="badge badge-info"><i class="fas fa-spinner fa-spin"></i> Diproses</span>
                                        @else
                                            <span class="badge badge-success"><i class="fas fa-check-circle"></i> Selesai</span>
                                        @endif
                                    </td>

                                    <td class="text-center action-cell" style="display: flex; gap: 6px; justify-content: center; align-items: center;">
                                        
                                        @if($order->status == 'Menunggu')
                                            <button type="button" class="btn btn-sm btn-primary quick-btn" onclick="updateOrderStatus({{ $order->id }}, 'Menunggu', '{{ addslashes($order->customer_name) }}')" title="Langsung Proses">
                                                <i class="fas fa-fire"></i> Proses
                                            </button>
                                        @elseif($order->status == 'Diproses')
                                            <button type="button" class="btn btn-sm btn-success quick-btn" onclick="updateOrderStatus({{ $order->id }}, 'Diproses', '{{ addslashes($order->customer_name) }}')" title="Langsung Selesaikan">
                                                <i class="fas fa-check-circle"></i> Selesai
                                            </button>
                                        @endif

                                        <button type="button" class="btn btn-sm btn-outline" onclick="openOrderModal({{ $order->id }})" title="Lihat Detail Pesanan">
                                            <i class="fas fa-eye"></i>
                                        </button>

                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDeleteOrder({{ $order->id }})" title="Hapus Pesanan">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <!-- Sesuaikan colspan jadi 8 karena ada tambahan kolom No -->
                                    <td colspan="8" style="text-align: center; padding: 40px 20px; color: var(--text-muted);">
                                        <i class="fas fa-clipboard" style="font-size: 32px; margin-bottom: 12px; opacity: 0.5; display: block;"></i>
                                        Belum ada pesanan yang masuk.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>

                </div>

            </div>

        </div>

    </main>

    <!-- ============================================ -->
    <!-- SCRIPTS -->
    <!-- ============================================ -->
    <script src="{{ asset('assets/js/admin-script.js') }}"></script>

    <!-- ============================================ -->
<!-- MODAL DETAIL PESANAN -->
<!-- ============================================ -->
<div id="orderDetailModal" class="modal">
    <div class="modal-content" style="max-width: 600px;">
        <div class="modal-header">
            <h2>
                <i class="fas fa-info-circle" style="color: var(--gold);"></i>
                Informasi Pesanan
            </h2>
            <button class="modal-close" onclick="closeOrderModal()">&times;</button>
        </div>
        <div class="modal-body" id="orderModalBody">
            <!-- Konten akan dimuat secara otomatis lewat AJAX -->
            <div style="text-align: center; padding: 40px; color: var(--text-muted);">
                <i class="fas fa-spinner fa-spin" style="font-size: 28px; color: var(--gold); margin-bottom: 10px;"></i>
                <p>Memuat detail pesanan...</p>
            </div>
        </div>
    </div>
</div>

<script>
    function openOrderModal(orderId) {
        const modal = document.getElementById('orderDetailModal');
        const modalBody = document.getElementById('orderModalBody');

        // Tampilkan modal dan beri loading
        modal.classList.add('show');
        modalBody.innerHTML = `
            <div style="text-align: center; padding: 40px; color: var(--text-muted);">
                <i class="fas fa-spinner fa-spin" style="font-size: 28px; color: var(--gold); margin-bottom: 10px;"></i>
                <p>Memuat detail pesanan...</p>
            </div>
        `;

        // Ambil data HTML dari server menggunakan fetch
        fetch(`/admin/orders/${orderId}/modal`)
            .then(response => response.text())
            .then(html => {
                // Masukkan detail pesanan ke dalam modal
                modalBody.innerHTML = html;

                // TAMBAHKAN TOMBOL CETAK STRUK DI BAWAHNYA
                modalBody.innerHTML += `
                    <div style="margin-top: 20px; display: flex; justify-content: flex-end; border-top: 1px dashed var(--border-color); padding-top: 16px;">
                        <button type="button" class="btn btn-outline btn-sm" onclick="printOrderReceipt('${orderId}')" style="display: flex; align-items: center; gap: 6px;">
                            <i class="fas fa-print"></i> Cetak Struk Pesanan
                        </button>
                    </div>
                `;
            })
            .catch(error => {
                modalBody.innerHTML = `<p style="text-align: center; color: #ef4444;">Gagal memuat data pesanan.</p>`;
                console.error(error);
            });
    }

    function closeOrderModal() {
        document.getElementById('orderDetailModal').classList.remove('show');
    }

    window.addEventListener('click', function(event) {
        const modal = document.getElementById('orderDetailModal');
        if (event.target === modal) {
            closeOrderModal();
        }
    });

    // ==========================================
    // FUNGSI CETAK STRUK PESANAN (BERSIH TOTAL ALA CUSTOMERS)
    // ==========================================
    function printOrderReceipt(orderId) {
        // 1. Ambil isi konten modal
        const modalContentRaw = document.getElementById('orderModalBody').cloneNode(true);
        
        // 2. Hapus area tombol cetak
        const printBtnArea = modalContentRaw.lastElementChild; 
        if (printBtnArea) printBtnArea.remove();

        // 3. SAPU BERSIH: Hapus tombol aksi, form, dan badge status
        const elementsToHide = modalContentRaw.querySelectorAll('button, .btn, form, a, .badge, [class*="status"]');
        elementsToHide.forEach(el => el.remove());

        // 4. HAPUS SEMUA IKON & GAMBAR (Biar nggak muncul font kotak-kotak aneh   di kertas)
        const iconsAndMedia = modalContentRaw.querySelectorAll('i, svg, img');
        iconsAndMedia.forEach(el => el.remove());

        // 5. HAPUS BORDER KOTAK KANAN-KIRI DI BIODATA PELANGGAN
        const gridBox = modalContentRaw.querySelector('div[style*="display: grid"]');
        if (gridBox) {
            gridBox.style.border = 'none';
            gridBox.style.padding = '0';
            gridBox.style.background = 'transparent';
        }

        // Ambil HTML yang sudah bersih mengkilap
        const modalHtml = modalContentRaw.innerHTML;

        // Bikin Iframe untuk Print
        let iframe = document.getElementById('printIframe');
        if (!iframe) {
            iframe = document.createElement('iframe');
            iframe.id = 'printIframe';
            iframe.style.position = 'absolute';
            iframe.style.width = '0px';
            iframe.style.height = '0px';
            iframe.style.border = 'none';
            document.body.appendChild(iframe);
        }

        const doc = iframe.contentWindow.document;
        doc.open();
        doc.write(`
            <html>
                <head>
                    <title>Struk Pesanan #${orderId}</title>
                    <style>
                        @page {
                            size: A4;
                            margin: 15mm;
                        }
                        body {
                            background: #ffffff;
                            color: #000000;
                            font-family: 'Courier New', Courier, monospace;
                            font-size: 14px;
                            margin: 0;
                            padding: 0;
                            display: flex;
                            justify-content: center;
                            align-items: flex-start;
                        }
                        .receipt-box {
                            width: 100%;
                            max-width: 180mm;
                            margin: 20mm auto;
                            padding: 30px;
                            box-sizing: border-box;
                            background: #fff;
                            /* BORDER LUAR SUDAH DIHAPUS BIAR SAMA PERSIS CUSTOMERS */
                        }
                        .text-center { text-align: center; }
                        .dashed-line { border-bottom: 2px dashed #000; margin: 15px 0; }
                        
                        /* PAKSA SEMUA ELEMEN JADI HITAM PUTIH BERSIH */
                        #injectedContent * {
                            color: #000 !important;
                            background: transparent !important;
                            border-color: #000 !important;
                            box-shadow: none !important;
                        }
                        
                        /* Hapus sela kosong peninggalan ikon */
                        #injectedContent div:empty {
                            display: none !important;
                        }
                    </style>
                </head>
                <body>
                    <div class="receipt-box">
                        <div class="text-center" style="border-bottom: 3px double #000; padding-bottom: 15px; margin-bottom: 20px;">
                            <h2 style="font-size: 24px; font-weight: bold; margin: 0;">WARUNG NASI KUNING IBU OPIK</h2>
                            <p style="font-size: 14px; margin: 5px 0;">Bukti Pembayaran / Struk Pesanan</p>
                            <!-- Telp dihapus biar kop suratnya 100% kembar -->
                            <p style="font-size: 12px; margin: 0;">Kp. Cimuntuk RT 01/01, Jl. Raya Sukatani, Kec. Sukatani, Kab. Purwakarta</p>
                        </div>
                        
                        <div style="margin-bottom: 15px; font-size: 14px; display: flex; justify-content: space-between;">
                            <div><strong>Order ID:</strong> #${orderId}</div>
                            <div><strong>Waktu Cetak:</strong> ${new Date().toLocaleDateString('id-ID')} ${new Date().toLocaleTimeString('id-ID')}</div>
                        </div>

                        <div class="dashed-line"></div>

                        <!-- ISI DETAIL PESANAN DIMASUKKAN KE SINI -->
                        <div id="injectedContent" style="margin: 15px 0;">
                            ${modalHtml}
                        </div>

                        <div class="dashed-line"></div>

                        <div class="text-center" style="font-size: 12px; margin-top: 20px; color: #333;">
                            <p style="margin: 0; font-weight: bold; font-size: 14px;">*** TERIMA KASIH ***</p>
                            <p style="margin: 5px 0 0 0;">Harap simpan struk ini sebagai bukti pembayaran yang sah.</p>
                        </div>
                    </div>
                </body>
            </html>
        `);
        doc.close();

        // Eksekusi print langsung
        setTimeout(() => {
            iframe.contentWindow.focus();
            iframe.contentWindow.print();
        }, 300);
    }

    function closeOrderModal() {
        document.getElementById('orderDetailModal').classList.remove('show');
    }

    // Tutup modal jika klik di luar kotak modal
    window.addEventListener('click', function(event) {
        const modal = document.getElementById('orderDetailModal');
        if (event.target === modal) {
            closeOrderModal();
        }
    });

    // Fungsi menampilkan Toast Notifikasi yang keren
    function showToast(title, message) {
        const toast = document.getElementById('toastNotification');
        document.getElementById('toastTitle').textContent = title;
        document.getElementById('toastMessage').textContent = message;

        // Munculkan toast
        toast.style.transform = 'translateY(0)';
        toast.style.opacity = '1';

        // Sembunyikan otomatis setelah 3 detik
        setTimeout(() => {
            toast.style.transform = 'translateY(100px)';
            toast.style.opacity = '0';
        }, 3000);
    }

    function updateOrderStatus(orderId, currentStatus, customerNameTarget = null) {
        let customerName = 'Pelanggan';

        if (customerNameTarget) {
            customerName = customerNameTarget;
        } else {
            const modalBody = document.getElementById('orderModalBody');
            const container = modalBody.querySelector('[data-customer-name]');
            if (container) customerName = container.getAttribute('data-customer-name');
        }

        const toast = document.getElementById('toastNotification');
        document.getElementById('toastTitle').textContent = 'Loading...';
        document.getElementById('toastMessage').textContent = 'Memproses pesanan...';
        toast.style.transform = 'translateY(0)';
        toast.style.opacity = '1';

        fetch(`/admin/orders/${orderId}/status`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            closeOrderModal();
            
            const row = document.getElementById(`order-row-${orderId}`);
            
            if (currentStatus === 'Menunggu') {
                showToast('Status Diperbarui', `Pesanan atas nama ${customerName} kini sedang Diproses.`);
                
                // Update UI (Menunggu -> Diproses)
                if (row) {
                    const statusTd = row.querySelector('.status-cell');
                    if(statusTd) {
                        statusTd.innerHTML = '<span class="badge badge-info"><i class="fas fa-spinner fa-spin"></i> Diproses</span>';
                    }
                    
                    const actionTd = row.querySelector('.action-cell');
                    if(actionTd) {
                        const quickBtn = actionTd.querySelector('.quick-btn');
                        if(quickBtn) {
                            quickBtn.className = 'btn btn-sm btn-success quick-btn';
                            quickBtn.setAttribute('onclick', `updateOrderStatus(${orderId}, 'Diproses', '${customerName.replace(/'/g, "\\'")}')`);
                            quickBtn.title = 'Langsung Selesaikan';
                            quickBtn.innerHTML = '<i class="fas fa-check-circle"></i> Selesai';
                        }
                    }
                }

            } else {
                showToast('Pesanan Selesai!', `Pesanan atas nama ${customerName} telah selesai dan masuk ke Riwayat.`);
                
                // Animasi Hapus Baris
                if (row) {
                    row.style.transition = 'all 0.5s ease';
                    row.style.opacity = '0';
                    row.style.transform = 'translateX(-30px)';
                    
                    setTimeout(() => {
                        row.remove(); 
                        
                        // 1. KURANGI TOTAL PESANAN DI ATAS TABEL
                        const totalBadge = document.getElementById('totalOrdersBadge');
                        if (totalBadge) {
                            let currentTotal = parseInt(totalBadge.textContent.replace(/[^0-9]/g, ''));
                            if (!isNaN(currentTotal) && currentTotal > 0) {
                                totalBadge.textContent = `Total: ${currentTotal - 1} Pesanan`;
                            }
                            
                            if (currentTotal - 1 === 0) {
                                document.getElementById('orderTableBody').innerHTML = `
                                <tr>
                                    <td colspan="7" style="text-align: center; padding: 40px 20px; color: var(--text-muted);">
                                        <i class="fas fa-clipboard" style="font-size: 32px; margin-bottom: 12px; opacity: 0.5; display: block;"></i>
                                        Belum ada pesanan yang masuk.
                                    </td>
                                </tr>`;
                            }
                        }

                        // 2. KURANGI BADGE NOTIFIKASI DI SIDEBAR KIRI
                        const sidebarBadge = document.getElementById('sidebarPendingOrders');
                        if (sidebarBadge) {
                            let pendingCount = parseInt(sidebarBadge.textContent.trim());
                            if (!isNaN(pendingCount) && pendingCount > 0) {
                                sidebarBadge.textContent = pendingCount - 1;
                                
                                // (Opsional) Kalau pesanan habis (0), sembunyikan badgenya biar rapi
                                if (pendingCount - 1 === 0) {
                                    sidebarBadge.style.display = 'none';
                                }
                            }
                        }
                    }, 500); 
                }
            }
        })
        .catch(error => {
            alert('Gagal memperbarui status pesanan.');
            console.error(error);
        });
    }
</script>

<!-- ============================================ -->
<!-- MODAL KONFIRMASI HAPUS PESANAN -->
<!-- ============================================ -->
<div id="deleteOrderModal" class="modal">
    <div class="modal-content" style="max-width: 400px; text-align: center; padding: 32px 24px;">
        <div style="width: 64px; height: 64px; background: rgba(239, 68, 68, 0.1); color: #ef4444; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 32px; margin: 0 auto 16px;">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <h2 style="font-size: 20px; font-weight: 600; margin-bottom: 8px; color: var(--text-primary);">Yakin Mau Dihapus?</h2>
        <p style="color: var(--text-secondary); font-size: 14px; margin-bottom: 24px;">
            Data pesanan ini akan dihapus permanen dari sistem dan tidak bisa dikembalikan.
        </p>
        <div style="display: flex; gap: 12px; justify-content: center;">
            <button type="button" class="btn btn-outline" onclick="closeDeleteOrderModal()" style="flex: 1; justify-content: center;">Batal</button>
            <button type="button" class="btn btn-danger" onclick="submitDeleteOrder()" style="flex: 1; justify-content: center;">Ya, Hapus!</button>
        </div>
    </div>
</div>

<!-- FORM HAPUS TERSEMBUNYI -->
<form id="globalDeleteOrderForm" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<script>
    // Fungsi memunculkan modal hapus pesanan
    function confirmDeleteOrder(orderId) {
        document.getElementById('globalDeleteOrderForm').action = `/admin/orders/${orderId}`;
        document.getElementById('deleteOrderModal').classList.add('show');
    }

    // Fungsi menutup modal
    function closeDeleteOrderModal() {
        document.getElementById('deleteOrderModal').classList.remove('show');
    }

    // Eksekusi hapus
    function submitDeleteOrder() {
        document.getElementById('globalDeleteOrderForm').submit();
    }

    // Tutup modal jika klik di luar kotak
    window.addEventListener('click', function(event) {
        const deleteOrderModal = document.getElementById('deleteOrderModal');
        if (event.target === deleteOrderModal) {
            closeDeleteOrderModal();
        }
    });
</script>

<!-- ============================================ -->
<!-- TOAST NOTIFIKASI MELAYANG -->
<!-- ============================================ -->
<div id="toastNotification" style="position: fixed; bottom: 30px; right: 30px; background: #1a1a1a; border-left: 4px solid #22c55e; color: #fff; padding: 16px 24px; border-radius: 8px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); display: flex; align-items: center; gap: 12px; z-index: 9999; transform: translateY(100px); opacity: 0; transition: all 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);">
    <i class="fas fa-check-circle" style="color: #22c55e; font-size: 24px;"></i>
    <div>
        <h4 style="font-size: 14px; font-weight: 600; margin: 0; color: #fff;" id="toastTitle">Berhasil!</h4>
        <p style="font-size: 13px; color: var(--text-secondary); margin: 2px 0 0 0;" id="toastMessage">Pesan notifikasi di sini</p>
    </div>
</div>

</body>
</html>