<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Admin Ibu Opik</title>
    
    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/menu-modal.css') }}">
</head>
<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="logo-icon">
                <i class="fas fa-utensils"></i>
            </div>
            <div>
                <h1>Admin Panel</h1>
                <small>Warung Ibu Opik</small>
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

            <a href="{{ route('menu.index') }}" class="active">
                <i class="fas fa-utensils"></i>
                <span>Menu</span>
                <span class="badge gold">{{ $totalMenus }}</span>
            </a>

            <a href="{{ route('orders.index') }}">
                <i class="fas fa-utensils"></i>
                <span>Pesanan</span>
                <span class="badge warning">{{ $pendingOrders }}</span>
            </a>

            <a href="{{ route('customers.index') }}">
                <i class="fas fa-users"></i>
                <span>Pelanggan</span>
                <span class="badge">{{ $totalCustomers }}</span>
            </a>

            <a href="{{ route('reservations.index') }}">
                <i class="fas fa-calendar-check"></i>
                <span>Reservasi</span>
            </a>
            
            <div class="nav-label" style="margin-top: 24px;">Settings</div>
            
            <a href="settings.html">
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

    <!-- MAIN CONTENT -->
    <main class="main-content">
        
        <!-- TOPBAR -->
        <header class="topbar">
            <div class="page-title">
                <button class="hamburger" aria-label="Toggle menu">
                    <i class="fas fa-bars"></i>
                </button>
                <div>
                    <h2>Manajemen Menu</h2>
                    <p>Kelola semua menu Warung Ibu Opik</p>
                </div>
            </div>
            <div class="actions">
                <div class="search">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Cari menu..." id="menuSearch">
                </div>
                <div class="notif">
                    <i class="fas fa-bell"></i>
                    <span class="dot"></span>
                </div>
                <button class="btn btn-primary" id="openModal">
                    <i class="fas fa-plus"></i> Tambah Menu
                </button>
            </div>
        </header>

        <!-- CONTENT -->
        <div class="content">
            
            <!-- Filter -->
            <div class="filter-container">
                <button class="btn btn-primary menu-filter-btn" data-filter="all">Semua</button>
                <button class="btn btn-outline menu-filter-btn" data-filter="nasi">Nasi</button>
                <button class="btn btn-outline menu-filter-btn" data-filter="lauk">Lauk</button>
                <button class="btn btn-outline menu-filter-btn" data-filter="minuman">Minuman</button>
                <button class="btn btn-outline menu-filter-btn" data-filter="soon">Soon</button>
            </div>

            <!-- Menu Grid -->
            <div class="menu-grid" id="menuGrid">
                @foreach ($menus as $menu)
                <div class="menu-item" data-category="{{ $menu->category ?? 'nasi' }}" data-id="{{ $menu->id }}">
                    <!-- IMAGE - PERBAIKAN UTAMA -->
                    <div class="image">
                        @if($menu->image && file_exists(public_path('uploads/menu/' . $menu->image)))
                            <img src="{{ asset('uploads/menu/' . $menu->image) }}" 
                                 alt="{{ $menu->name }}"
                                 loading="lazy">
                        @else
                            <div class="no-image">
                                <i class="fas fa-utensils"></i>
                            </div>
                        @endif
                    </div>
                    
                    <!-- INFO -->
                    <div class="info">
                        <h4>{{ $menu->name }}</h4>
                        <div class="desc">{{ $menu->description ?? 'Tidak ada deskripsi' }}</div>
                        <div class="meta">
                            <span class="price">Rp {{ number_format($menu->price, 0, ',', '.') }}</span>
                            <span class="badge badge-{{ $menu->status == 1 ? 'success' : 'danger' }}">
                                {{ $menu->status == 1 ? 'Tersedia' : 'Habis' }}
                            </span>
                        </div>
                        <div class="action-buttons">
                            <button
                                class="btn btn-outline btn-sm edit-menu"
                                data-id="{{ $menu->id }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form action="{{ route('menu.destroy', $menu->id) }}"
                                method="POST"
                                class="delete-form"
                                style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>

                            </form>
                            <form action="{{ route('menu.toggleStatus', $menu->id) }}"
                                method="POST"
                                style="display:inline;">

                                @csrf
                                @method('PATCH')

                                <button type="submit"
                                        class="toggle-status badge badge-{{ $menu->status ? 'success' : 'danger' }}"
                                        style="border:none; cursor:pointer;">

                                    {{ $menu->status ? 'Tersedia' : 'Habis' }}

                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Counter -->
            <div class="menu-counter">
                Menampilkan <span id="menuCount">{{ $menus->count() }}</span> menu
            </div>

        </div>

    </main>

    <!-- ============================================ -->
    <!-- MODAL TAMBAH / EDIT MENU -->
    <!-- ============================================ -->
    <div id="menuModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modalTitle">Tambah Menu Baru</h2>
                <button class="modal-close" id="closeModal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="menuForm" action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="menuId" name="menu_id">
                    
                    <div class="form-group">
                        <label for="menuName">Nama Menu <span class="required">*</span></label>
                        <input type="text" id="menuName" name="name" placeholder="Masukkan nama menu" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="menuCategory">Kategori <span class="required">*</span></label>
                        <select id="menuCategory" name="category" required>
                            <option value="">Pilih Kategori</option>
                            <option value="nasi">Nasi</option>
                            <option value="lauk">Lauk</option>
                            <option value="minuman">Minuman</option>
                            <option value="soon">Soon</option>
                        </select>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="menuPrice">Harga <span class="required">*</span></label>
                            <input type="number" id="menuPrice" name="price" placeholder="Masukkan harga" required>
                        </div>
                        <div class="form-group">
                            <label for="menuStatus">Status</label>
                            <select id="menuStatus" name="status">
                                <option value="1">Tersedia</option>
                                <option value="0">Habis</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="menuDescription">Deskripsi</label>
                        <textarea id="menuDescription" name="description" placeholder="Masukkan deskripsi menu" rows="3"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="menuImage">Gambar Menu</label>
                        <div class="image-upload-wrapper">
                            <div class="image-preview" id="imagePreview">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p>Klik atau drag untuk upload</p>
                            </div>
                            <input type="file" id="menuImage" name="image" accept="image/*">
                        </div>
                        <small class="form-hint">Format: JPG, PNG, WEBP (Max: 2MB)</small>
                    </div>
                    
                    <div class="modal-actions">
                        <button type="button" class="btn btn-outline" id="cancelModal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            <i class="fas fa-save"></i> Simpan Menu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ============================================ -->
    <!-- SCRIPTS -->
    <!-- ============================================ -->
    <script src="{{ asset('assets/js/admin-script.js') }}"></script>
    <script src="{{ asset('assets/js/menu-modal.js') }}"></script>
</body>
</html>