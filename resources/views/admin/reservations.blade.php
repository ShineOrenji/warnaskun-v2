<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi - Admin Ibu Opik</title>

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

            <a href="{{ route('orders.index') }}">
                <i class="fas fa-shopping-cart"></i>
                <span>Pesanan</span>
                <span class="badge warning">{{ $pendingOrders ?? 0 }}</span>
            </a>

            <a href="{{ route('customers.index') }}">
                <i class="fas fa-users"></i>
                <span>Pelanggan</span>
            </a>

            <a href="{{ route('reservations.index') }}" class="active">
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
                    <h2>Manajemen Reservasi</h2>
                    <p>Kelola semua reservasi pelanggan Warung Ibu Opik</p>
                </div>
            </div>

        </header>

        <!-- ============================================ -->
        <!-- CONTENT -->
        <!-- ============================================ -->
        <div class="content">

            <div class="card">

                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                    <h3>
                        <i class="fas fa-calendar-check" style="color: var(--gold);"></i>
                        Daftar Reservasi
                    </h3>
                    
                    <div class="badge badge-warning" style="font-size: 13px; padding: 6px 14px;">
                        Total: {{ $reservations->count() }} Reservasi
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
                                    <th style="width: 50px;">No</th>
                                    <th>Nama</th>
                                    <th>No HP</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Jam</th>
                                    <th class="text-center">Orang</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($reservations as $index => $reservation)
                                <tr style="border-bottom: 1px solid var(--border-color);">

                                    <td style="font-weight: 600; color: var(--text-secondary);">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        <div class="user-cell">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($reservation->name) }}&background=d4a843&color=000&size=30" alt="Avatar">
                                            <span style="font-weight: 500; color: var(--text-primary);">{{ $reservation->name }}</span>
                                        </div>
                                    </td>

                                    <td style="color: var(--text-secondary);">{{ $reservation->phone }}</td>

                                    <td class="text-center">{{ \Carbon\Carbon::parse($reservation->reservation_date)->setTimezone('Asia/Jakarta')->format('d M Y') }}</td>

                                    <td class="text-center">{{ \Carbon\Carbon::parse($reservation->reservation_time)->setTimezone('Asia/Jakarta')->format('H:i') }} WIB</td>

                                    <td class="text-center">{{ $reservation->person }} org</td>

                                    <td class="text-center">
                                        @php
                                            $statusMap = [
                                                'Menunggu' => ['badge-warning', 'Menunggu', 'fas fa-clock'],
                                                'Diterima' => ['badge-info', 'Diterima', 'fas fa-check'],
                                                'Selesai' => ['badge-success', 'Selesai', 'fas fa-check-circle'],
                                                'Ditolak' => ['badge-danger', 'Ditolak', 'fas fa-times-circle']
                                            ];
                                            $status = $statusMap[$reservation->status] ?? ['badge-warning', $reservation->status, 'fas fa-info'];
                                        @endphp
                                        <span class="badge {{ $status[0] }}">
                                            <i class="{{ $status[2] }}"></i> {{ $status[1] }}
                                        </span>
                                    </td>

                                    <td class="text-center" style="display: flex; gap: 6px; justify-content: center; align-items: center;">
                                        
                                        {{-- TOMBOL TERIMA / SELESAI --}}
                                        @if($reservation->status == 'Menunggu')
                                            <form action="{{ route('reservations.status', $reservation->id) }}" method="POST" style="margin: 0;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-primary" title="Terima Reservasi">
                                                    <i class="fas fa-check"></i> Terima
                                                </button>
                                            </form>
                                        @elseif($reservation->status == 'Diterima')
                                            <form action="{{ route('reservations.status', $reservation->id) }}" method="POST" style="margin: 0;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-success" title="Selesaikan Reservasi">
                                                    <i class="fas fa-check-double"></i> Selesai
                                                </button>
                                            </form>
                                        @endif

                                        {{-- TOMBOL DETAIL MODAL --}}
                                        <button type="button" class="btn btn-sm btn-outline" onclick="openReservationModal({{ $reservation->id }})" title="Lihat Detail Reservasi">
                                            <i class="fas fa-eye"></i>
                                        </button>

                                        {{-- TOMBOL HAPUS MODAL --}}
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDeleteReservation({{ $reservation->id }})" title="Hapus Reservasi">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" style="text-align: center; padding: 40px 20px; color: var(--text-muted);">
                                        <i class="fas fa-calendar-times" style="font-size: 32px; margin-bottom: 12px; opacity: 0.5; display: block;"></i>
                                        Belum ada reservasi.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

        </div>

    </main>

    <!-- ============================================ -->
    <!-- MODAL DETAIL RESERVASI -->
    <!-- ============================================ -->
    <div id="reservationDetailModal" class="modal">
        <div class="modal-content" style="max-width: 600px;">
            <div class="modal-header">
                <h2>
                    <i class="fas fa-calendar-check" style="color: var(--gold);"></i>
                    Informasi Reservasi
                </h2>
                <button class="modal-close" onclick="closeReservationModal()">&times;</button>
            </div>
            <div class="modal-body" id="reservationModalBody">
                <div style="text-align: center; padding: 40px; color: var(--text-muted);">
                    <i class="fas fa-spinner fa-spin" style="font-size: 28px; color: var(--gold); margin-bottom: 10px;"></i>
                    <p>Memuat detail reservasi...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================ -->
    <!-- MODAL KONFIRMASI HAPUS RESERVASI -->
    <!-- ============================================ -->
    <div id="deleteReservationModal" class="modal">
        <div class="modal-content" style="max-width: 400px; text-align: center; padding: 32px 24px;">
            <div style="width: 64px; height: 64px; background: rgba(239, 68, 68, 0.1); color: #ef4444; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 32px; margin: 0 auto 16px;">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h2 style="font-size: 20px; font-weight: 600; margin-bottom: 8px; color: var(--text-primary);">Yakin Mau Dihapus?</h2>
            <p style="color: var(--text-secondary); font-size: 14px; margin-bottom: 24px;">
                Data reservasi ini akan dihapus permanen dari sistem.
            </p>
            <div style="display: flex; gap: 12px; justify-content: center;">
                <button type="button" class="btn btn-outline" onclick="closeDeleteReservationModal()" style="flex: 1; justify-content: center;">Batal</button>
                <button type="button" class="btn btn-danger" onclick="submitDeleteReservation()" style="flex: 1; justify-content: center;">Ya, Hapus!</button>
            </div>
        </div>
    </div>

    <form id="globalDeleteReservationForm" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <!-- ============================================ -->
    <!-- SCRIPTS -->
    <!-- ============================================ -->
    <script src="{{ asset('assets/js/admin-script.js') }}"></script>

    <script>
        function openReservationModal(resId) {
        const modal = document.getElementById('reservationDetailModal');
        const modalBody = document.getElementById('reservationModalBody');

        modal.classList.add('show');
        modalBody.innerHTML = `
            <div style="text-align: center; padding: 40px; color: var(--text-muted);">
                <i class="fas fa-spinner fa-spin" style="font-size: 28px; color: var(--gold); margin-bottom: 10px;"></i>
                <p>Memuat detail reservasi...</p>
            </div>
        `;

        fetch(`/admin/reservations/${resId}`)
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                
                const name = doc.querySelector('.detail-info p:nth-child(1)')?.childNodes[2]?.nodeValue?.trim() || '-';
                const phone = doc.querySelector('.detail-info p:nth-child(2)')?.childNodes[2]?.nodeValue?.trim() || '-';
                const person = doc.querySelector('.detail-info p:nth-child(3)')?.childNodes[2]?.nodeValue?.trim() || '-';
                const date = doc.querySelector('.detail-info p:nth-child(4)')?.childNodes[2]?.nodeValue?.trim() || '-';
                const time = doc.querySelector('.detail-info p:nth-child(5)')?.childNodes[2]?.nodeValue?.trim() || '-';
                const message = doc.querySelector('.detail-info p.full-width:nth-child(6)')?.childNodes[2]?.nodeValue?.trim() || '-';
                const statusText = doc.querySelector('.detail-info p.full-width:nth-child(7)')?.querySelector('.badge')?.textContent?.trim() || 'Menunggu';
                const statusBadgeHtml = doc.querySelector('.detail-info p.full-width:nth-child(7)')?.querySelector('.badge')?.outerHTML || '<span class="badge badge-warning">Menunggu</span>';

                modalBody.innerHTML = `
                    <!-- 1. TAMPILAN DI LAYAR WEB (Tetap Elegan Berkotak) -->
                    <div style="display: flex; flex-direction: column; gap: 14px;">
                        <div style="background: var(--bg-primary); padding: 16px; border-radius: 8px; border: 1px solid var(--border-color);">
                            <div style="font-size: 14px; color: var(--text-primary); border-bottom: 1px dashed var(--border-color); padding-bottom: 8px; margin-bottom: 8px;">
                                <strong style="color: var(--gold); display: inline-block; width: 130px;"><i class="fas fa-user" style="margin-right: 6px;"></i> Nama:</strong> ${name}
                            </div>
                            <div style="font-size: 14px; color: var(--text-primary); border-bottom: 1px dashed var(--border-color); padding-bottom: 8px; margin-bottom: 8px;">
                                <strong style="color: var(--gold); display: inline-block; width: 130px;"><i class="fas fa-phone" style="margin-right: 6px;"></i> No HP:</strong> ${phone}
                            </div>
                            <div style="font-size: 14px; color: var(--text-primary);">
                                <strong style="color: var(--gold); display: inline-block; width: 130px;"><i class="fas fa-users" style="margin-right: 6px;"></i> Jumlah:</strong> ${person}
                            </div>
                        </div>

                        <div style="background: var(--bg-primary); padding: 16px; border-radius: 8px; border: 1px solid var(--border-color);">
                            <div style="font-size: 14px; color: var(--text-primary); border-bottom: 1px dashed var(--border-color); padding-bottom: 8px; margin-bottom: 8px;">
                                <strong style="color: var(--gold); display: inline-block; width: 130px;"><i class="fas fa-calendar-alt" style="margin-right: 6px;"></i> Tanggal:</strong> ${date}
                            </div>
                            <div style="font-size: 14px; color: var(--text-primary); border-bottom: 1px dashed var(--border-color); padding-bottom: 8px; margin-bottom: 8px;">
                                <strong style="color: var(--gold); display: inline-block; width: 130px;"><i class="fas fa-clock" style="margin-right: 6px;"></i> Jam:</strong> ${time}
                            </div>
                            <div style="font-size: 14px; color: var(--text-primary); display: flex; align-items: center;">
                                <strong style="color: var(--gold); display: inline-block; width: 130px;"><i class="fas fa-info-circle" style="margin-right: 6px;"></i> Status:</strong> 
                                <div>${statusBadgeHtml}</div>
                            </div>
                        </div>

                        <div style="background: var(--bg-primary); padding: 14px 16px; border-radius: 8px; border: 1px solid var(--border-color);">
                            <strong style="color: var(--gold); font-size: 13px; display: block; margin-bottom: 6px;"><i class="fas fa-sticky-note" style="margin-right: 6px;"></i> Catatan Pelanggan:</strong>
                            <p style="color: var(--text-primary); font-size: 14px; margin: 0; line-height: 1.5; background: var(--bg-card); padding: 10px; border-radius: 6px; border: 1px solid rgba(255,255,255,0.03);">${message}</p>
                        </div>
                    </div>

                    <!-- 2. TOMBOL CETAK STRUK KHUSUS -->
                    <div style="margin-top: 20px; display: flex; justify-content: flex-end; gap: 10px; border-top: 1px solid var(--border-color); padding-top: 16px;">
                        <button type="button" class="btn btn-outline btn-sm" onclick="printThermalReceipt('${resId}', '${name}', '${phone}', '${person}', '${date}', '${time}', '${message}', '${statusText}')" style="display: flex; align-items: center; gap: 6px;">
                            <i class="fas fa-print"></i> Cetak Struk
                        </button>
                    </div>
                `;
            })
            .catch(error => {
                modalBody.innerHTML = `<p style="text-align: center; color: #ef4444;">Gagal memuat data reservasi.</p>`;
                console.error(error);
            });
    }

    // CETAK STRUK
    function printThermalReceipt(id, name, phone, person, date, time, message, status) {
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
                    <title>Struk Reservasi #${id}</title>
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
                            max-width: 180mm; /* Lebar pas di tengah A4 */
                            margin: 20mm auto;
                            border: 2px solid #000;
                            padding: 30px;
                            box-sizing: border-box;
                            background: #fff;
                        }
                        .text-center { text-align: center; }
                        .flex-between { 
                            display: flex; 
                            justify-content: space-between; 
                            align-items: center;
                            margin-bottom: 10px; 
                            font-size: 15px; 
                        }
                        .flex-between span:first-child {
                            font-weight: bold;
                            color: #333;
                            min-width: 180px;
                        }
                        .dashed-line { border-bottom: 2px dashed #000; margin: 15px 0; }
                    </style>
                </head>
                <body>
                    <div class="receipt-box">
                        <div class="text-center" style="border-bottom: 3px double #000; padding-bottom: 15px; margin-bottom: 20px;">
                            <h2 style="font-size: 24px; font-weight: bold; margin: 0;">WARUNG NASI KUNING IBU OPIK</h2>
                            <p style="font-size: 14px; margin: 5px 0;">Bukti Reservasi Meja Resmi (Simulasi PDF)</p>
                            <p style="font-size: 12px; margin: 0;">Kp. Cimuntuk RT 01/01, Jl. Raya Sukatani, Kec. Sukatani, Kab. Purwakarta | Telp: 0855-5915-0809</p>
                        </div>

                        <div class="flex-between"><span>ID Reservasi :</span> <strong>#${id}</strong></div>
                        <div class="flex-between"><span>Waktu Cetak  :</span> <span>${new Date().toLocaleDateString('id-ID')} ${new Date().toLocaleTimeString('id-ID')}</span></div>

                        <div class="dashed-line"></div>

                        <div style="display: flex; flex-direction: column; gap: 6px;">
                            <div class="flex-between"><span>Nama Pemesan :</span> <strong>${name}</strong></div>
                            <div class="flex-between"><span>Nomor WhatsApp :</span> <span>${phone}</span></div>
                            <div class="flex-between"><span>Jumlah Tamu  :</span> <span>${person}</span></div>
                            <div class="flex-between"><span>Tanggal Meja :</span> <strong>${date}</strong></div>
                            <div class="flex-between"><span>Jam Kedatangan :</span> <strong>${time}</strong></div>
                        </div>

                        <div class="dashed-line"></div>

                        <div style="margin-bottom: 15px; font-size: 15px;">
                            <strong style="display: block; margin-bottom: 5px;">Catatan Khusus:</strong>
                            <p style="margin: 0; font-style: italic; background: #f4f4f4; padding: 12px; border-left: 4px solid #000; width: 100%; box-sizing: border-box;">${message !== 'null' && message !== '' ? message : '-'}</p>
                        </div>

                        <div class="text-center" style="font-weight: bold; border: 2px solid #000; padding: 10px; margin-bottom: 20px; font-size: 16px;">
                            STATUS: ${status}
                        </div>

                        <div class="text-center" style="font-size: 12px; color: #333;">
                            <p style="margin: 0; font-weight: bold; font-size: 14px;">*** BUKTI INI SAH SEBAGAI STRUK SIMULASI ***</p>
                            <p style="margin: 5px 0 0 0;">Terima kasih telah memesan tempat di warung kami!</p>
                        </div>
                    </div>
                </body>
            </html>
        `);
        doc.close();

        setTimeout(() => {
            iframe.contentWindow.focus();
            iframe.contentWindow.print();
        }, 300);
    }

        function closeReservationModal() {
            document.getElementById('reservationDetailModal').classList.remove('show');
        }

        function confirmDeleteReservation(resId) {
            document.getElementById('globalDeleteReservationForm').action = `/admin/reservations/${resId}`;
            document.getElementById('deleteReservationModal').classList.add('show');
        }

        function closeDeleteReservationModal() {
            document.getElementById('deleteReservationModal').classList.remove('show');
        }

        function submitDeleteReservation() {
            document.getElementById('globalDeleteReservationForm').submit();
        }

        window.addEventListener('click', function(event) {
            const detailModal = document.getElementById('reservationDetailModal');
            const deleteModal = document.getElementById('deleteReservationModal');
            if (event.target === detailModal) closeReservationModal();
            if (event.target === deleteModal) closeDeleteReservationModal();
        });
    </script>

</body>
</html>