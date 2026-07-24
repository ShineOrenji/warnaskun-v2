// ============================================
// MENU MODAL - WARUNG NASI KUNING IBU OPIK
// ============================================

document.addEventListener('DOMContentLoaded', function() {

    // ---------- ELEMENTS ----------
    const modal = document.getElementById('menuModal');
    const openBtn = document.getElementById('openModal');
    const closeBtn = document.getElementById('closeModal');
    const cancelBtn = document.getElementById('cancelModal');
    const form = document.getElementById('menuForm');
    const modalTitle = document.getElementById('modalTitle');
    const submitBtn = document.getElementById('submitBtn');
    const menuId = document.getElementById('menuId');
    
    const nameInput = document.getElementById('menuName');
    const categoryInput = document.getElementById('menuCategory');
    const priceInput = document.getElementById('menuPrice');
    const statusInput = document.getElementById('menuStatus');
    const descInput = document.getElementById('menuDescription');
    const imageInput = document.getElementById('menuImage');
    const imagePreview = document.getElementById('imagePreview');

    // ---------- OPEN MODAL ----------
    function openModal(mode = 'add', data = null) {
        // Reset form
        form.reset();
        menuId.value = '';
        submitBtn.innerHTML = '<i class="fas fa-save"></i> Simpan Menu';
        
        // Reset image preview
        imagePreview.innerHTML = `
            <i class="fas fa-cloud-upload-alt"></i>
            <p>Klik atau drag untuk upload</p>
        `;
        imagePreview.parentElement.classList.remove('has-image');
        
        if (mode === 'edit' && data) {
            modalTitle.textContent = 'Edit Menu';
            submitBtn.innerHTML = '<i class="fas fa-save"></i> Update Menu';
            
            menuId.value = data.id;
            nameInput.value = data.name;
            categoryInput.value = data.category || 'nasi';
            priceInput.value = data.price;
            statusInput.value = data.status ? 1 : 0;
            descInput.value = data.description || '';
            
            // Show existing image
            if (data.image) {
                const imgUrl = data.image_url || '/uploads/menu/' + data.image;
                imagePreview.innerHTML = `<img src="${imgUrl}" alt="${data.name}">`;
                imagePreview.parentElement.classList.add('has-image');
            }
        } else {
            modalTitle.textContent = 'Tambah Menu Baru';
        }
        
        // Show modal with animation
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
        
        // Focus first input
        setTimeout(() => nameInput.focus(), 100);
    }

    // ---------- CLOSE MODAL ----------
    function closeModal() {
        modal.classList.remove('show');
        document.body.style.overflow = '';
        form.reset();
        menuId.value = '';
    }

    // ---------- EVENT LISTENERS ----------
    // Open modal
    openBtn.addEventListener('click', function(e) {
        e.preventDefault();
        openModal('add');
    });

    // Close modal
    closeBtn.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);

    // Close on overlay click
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Close on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('show')) {
            closeModal();
        }
    });

    // ---------- IMAGE PREVIEW ----------
    imageInput.addEventListener('change', function(e) {
        const file = this.files[0];
        if (!file) return;
        
        // Validate file type
        const validTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/jpg'];
        if (!validTypes.includes(file.type)) {
            alert('Format file tidak didukung. Gunakan JPG, PNG, atau WEBP.');
            this.value = '';
            return;
        }
        
        // Validate file size (2MB)
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file terlalu besar. Maksimal 2MB.');
            this.value = '';
            return;
        }
        
        // Preview image
        const reader = new FileReader();
        reader.onload = function(e) {
            imagePreview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
            imagePreview.parentElement.classList.add('has-image');
        };
        reader.readAsDataURL(file);
    });

    // ---------- DRAG & DROP ----------
    const uploadWrapper = document.querySelector('.image-upload-wrapper');
    
    ['dragenter', 'dragover'].forEach(eventName => {
        uploadWrapper.addEventListener(eventName, function(e) {
            e.preventDefault();
            this.style.borderColor = 'var(--gold)';
            this.style.background = 'var(--gold-bg)';
        });
    });
    
    ['dragleave', 'drop'].forEach(eventName => {
        uploadWrapper.addEventListener(eventName, function(e) {
            e.preventDefault();
            this.style.borderColor = '';
            this.style.background = '';
        });
    });
    
    uploadWrapper.addEventListener('drop', function(e) {
        e.preventDefault();
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            imageInput.files = files;
            imageInput.dispatchEvent(new Event('change'));
        }
    });

    form.addEventListener('submit', function() {

        submitBtn.disabled = true;

        submitBtn.innerHTML =
            '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';

    });

    // ---------- EDIT MENU (Trigger from menu cards) ----------
    document.querySelectorAll('.edit-menu').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.dataset.id;

            const form = document.getElementById('menuForm');

            // Ubah action form
            form.action = '/menu/' + this.dataset.id;

            // Ubah method menjadi PUT
            form.querySelector('input[name="_method"]').value = 'PUT';
            
            // Find menu data from the card
            const card = this.closest('.menu-item');
            if (!card) return;
            
            const name = card.querySelector('h4')?.textContent || '';
            const desc = card.querySelector('.desc')?.textContent || '';
            const priceText = card.querySelector('.price')?.textContent || 'Rp 0';
            const price = parseInt(priceText.replace(/[^0-9]/g, '')) || 0;
            const category = card.dataset.category || 'nasi';
            const status = card.querySelector('.toggle-status')?.dataset?.status || 'active';
            
            // Get image URL
            const img = card.querySelector('.image img');
            const image = img ? img.src.split('/').pop() : '';
            const image_url = img ? img.src : '';
            
            // Open modal with data
            openModal('edit', {
                id: id,
                name: name,
                description: desc,
                price: price,
                category: category,
                status: status,
                image: image,
                image_url: image_url
            });
        });
    });

    document.querySelectorAll('.delete-form').forEach(function(form){

    form.addEventListener('submit', function(e){

        if(!confirm('Yakin ingin menghapus menu ini?')){
            e.preventDefault();
        }

    });

    });

    // ---------- SEARCH ----------
    const searchInput = document.getElementById('menuSearch');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const query = this.value.toLowerCase().trim();
            const items = document.querySelectorAll('.menu-item');
            let visibleCount = 0;
            
            items.forEach(function(item) {
                const text = item.textContent.toLowerCase();
                const isVisible = text.includes(query);
                item.style.display = isVisible ? '' : 'none';
                if (isVisible) visibleCount++;
            });
            
            const counter = document.getElementById('menuCount');
            if (counter) counter.textContent = visibleCount;
        });
    }

    // ---------- FILTER ----------
    document.querySelectorAll('.menu-filter-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            // Update active button
            document.querySelectorAll('.menu-filter-btn').forEach(function(b) {
                b.classList.remove('btn-primary');
                b.classList.add('btn-outline');
            });
            this.classList.remove('btn-outline');
            this.classList.add('btn-primary');
            
            const filter = this.dataset.filter;
            const items = document.querySelectorAll('.menu-item');
            let visibleCount = 0;
            
            items.forEach(function(item) {
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
    
    // ---------- KEYBOARD SHORTCUTS ----------
    document.addEventListener('keydown', function(e) {
        // Ctrl + N = Open modal
        if (e.ctrlKey && e.key === 'n') {
            e.preventDefault();
            if (!modal.classList.contains('show')) {
                openModal('add');
            }
        }
    });

    console.log('🟡 Menu Modal - Warung Nasi Kuning Ibu Opik');
    console.log('✨ Modal siap digunakan!');

});