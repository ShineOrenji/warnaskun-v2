// ============================================
// ADMIN PANEL - WARUNG NASI KUNING IBU OPIK
// ============================================

document.addEventListener('DOMContentLoaded', function() {

    // ---------- SIDEBAR TOGGLE (MOBILE) ----------
    const hamburger = document.querySelector('.hamburger');
    const sidebar = document.querySelector('.sidebar');
    
    // Create overlay for mobile
    let overlay = document.querySelector('.sidebar-overlay');
    if (!overlay) {
        overlay = document.createElement('div');
        overlay.className = 'sidebar-overlay';
        document.body.appendChild(overlay);
    }
    
    if (hamburger && sidebar) {
        // Toggle sidebar
        hamburger.addEventListener('click', function(e) {
            e.stopPropagation();
            sidebar.classList.toggle('open');
            overlay.classList.toggle('active');
            document.body.style.overflow = sidebar.classList.contains('open') ? 'hidden' : '';
        });
        
        // Close sidebar when clicking overlay
        overlay.addEventListener('click', function() {
            sidebar.classList.remove('open');
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        });
        
        // Close sidebar when clicking a link (mobile)
        sidebar.querySelectorAll('a').forEach(function(link) {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        });
        
        // Close sidebar on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && sidebar.classList.contains('open')) {
                sidebar.classList.remove('open');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }

    // ---------- ACTIVE NAV LINK ----------
    const navLinks = document.querySelectorAll('.sidebar-nav a');
    const currentPath = window.location.pathname.split('/').pop() || 'index.html';
    
    navLinks.forEach(function(link) {
        const href = link.getAttribute('href');
        if (href === currentPath) {
            link.classList.add('active');
        }
        
        link.addEventListener('click', function(e) {
            navLinks.forEach(function(l) { 
                l.classList.remove('active'); 
            });
            this.classList.add('active');
        });
    });

    // ---------- DELETE CONFIRMATION ----------
    document.querySelectorAll('.btn-delete').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                e.preventDefault();
            }
        });
    });

    // ---------- SEARCH FILTER ----------
    const searchInput = document.querySelector('.search input');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const query = this.value.toLowerCase().trim();
            const rows = document.querySelectorAll('table tbody tr');
            let visibleCount = 0;
            
            rows.forEach(function(row) {
                const text = row.textContent.toLowerCase();
                const isVisible = text.includes(query);
                row.style.display = isVisible ? '' : 'none';
                if (isVisible) visibleCount++;
            });
            
            // Update counter if exists
            const counter = document.getElementById('orderCount') || document.getElementById('menuCount');
            if (counter) counter.textContent = visibleCount;
        });
    }

    // ---------- NOTIFICATION CLICK ----------
    document.querySelectorAll('.notif').forEach(function(btn) {
        btn.addEventListener('click', function() {
            alert('📬 Anda memiliki 3 notifikasi baru!');
        });
    });

    // ---------- MENU FILTER ----------
    const menuFilterButtons = document.querySelectorAll('.menu-filter-btn');
    const menuItems = document.querySelectorAll('.menu-item');
    
    if (menuFilterButtons.length > 0 && menuItems.length > 0) {
        menuFilterButtons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                menuFilterButtons.forEach(function(b) {
                    b.classList.remove('btn-primary');
                    b.classList.add('btn-outline');
                });
                
                this.classList.remove('btn-outline');
                this.classList.add('btn-primary');
                
                const filter = this.dataset.filter;
                let visibleCount = 0;
                
                menuItems.forEach(function(item) {
                    if (filter === 'all' || item.dataset.category === filter) {
                        item.style.display = '';
                        item.style.animation = 'fadeInUp 0.3s ease forwards';
                        visibleCount++;
                    } else {
                        item.style.display = 'none';
                    }
                });
                
                const counter = document.getElementById('menuCount');
                if (counter) counter.textContent = visibleCount;
            });
        });
    }

    // ---------- ORDER STATUS FILTER ----------
    const statusFilterButtons = document.querySelectorAll('.status-filter-btn');
    const orderRows = document.querySelectorAll('.order-row');
    
    if (statusFilterButtons.length > 0 && orderRows.length > 0) {
        statusFilterButtons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                statusFilterButtons.forEach(function(b) {
                    b.classList.remove('btn-primary');
                    b.classList.add('btn-outline');
                });
                
                this.classList.remove('btn-outline');
                this.classList.add('btn-primary');
                
                const filter = this.dataset.status;
                let visibleCount = 0;
                
                orderRows.forEach(function(row) {
                    if (filter === 'all' || row.dataset.status === filter) {
                        row.style.display = '';
                        visibleCount++;
                    } else {
                        row.style.display = 'none';
                    }
                });
                
                const counter = document.getElementById('orderCount');
                if (counter) counter.textContent = visibleCount;
            });
        });
    }

    // ---------- REVIEW FILTER ----------
    const reviewFilterButtons = document.querySelectorAll('.review-filter-btn');
    const reviewItems = document.querySelectorAll('.review-item');
    
    if (reviewFilterButtons.length > 0 && reviewItems.length > 0) {
        reviewFilterButtons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                reviewFilterButtons.forEach(function(b) {
                    b.classList.remove('btn-primary');
                    b.classList.add('btn-outline');
                });
                
                this.classList.remove('btn-outline');
                this.classList.add('btn-primary');
                
                const filter = parseInt(this.dataset.rating);
                
                reviewItems.forEach(function(item) {
                    const rating = parseInt(item.dataset.rating);
                    if (filter === 0 || rating === filter) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    }

    // ---------- CHART BUTTONS ----------
    document.querySelectorAll('.card-header .btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const parent = this.closest('.card-header');
            parent.querySelectorAll('.btn').forEach(function(b) {
                b.classList.remove('btn-primary');
                b.classList.add('btn-outline');
            });
            this.classList.remove('btn-outline');
            this.classList.add('btn-primary');
        });
    });

// ---------- SEARCH MENU ----------
        const menuSearch = document.getElementById('menuSearch');
        const menuItemsAll = document.querySelectorAll('.menu-item');
        
        if (menuSearch) {
            menuSearch.addEventListener('keyup', function() {
                const query = this.value.toLowerCase().trim();
                let visibleCount = 0;
                
                menuItemsAll.forEach(function(item) {
                    const text = item.textContent.toLowerCase();
                    const isVisible = text.includes(query);
                    item.style.display = isVisible ? '' : 'none';
                    if (isVisible) visibleCount++;
                });
                
                document.getElementById('menuCount').textContent = visibleCount;
            });
        }

        // ---------- UPDATE COUNTER ----------
        function updateMenuCount() {
            const visible = document.querySelectorAll('.menu-item[style*="display: none"]');
            const total = document.querySelectorAll('.menu-item').length;
            const visibleCount = total - visible.length;
            document.getElementById('menuCount').textContent = visibleCount;
        }
        
        // Override filter to update counter
        document.querySelectorAll('.menu-filter-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                setTimeout(updateMenuCount, 100);
            });
        });
    });