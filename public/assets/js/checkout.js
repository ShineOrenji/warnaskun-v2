// ============================================
// CHECKOUT - WARUNG NASI KUNING IBU OPIK
// ============================================

document.addEventListener('DOMContentLoaded', function() {

    // ---------- DELIVERY TYPE TOGGLE ----------
    const radios = document.querySelectorAll('input[name="delivery_type"]');
    const alamatBox = document.getElementById('alamatBox');
    const landmarkBox = document.getElementById('landmarkBox');

    function toggleDeliveryFields() {
        const selected = document.querySelector('input[name="delivery_type"]:checked');

        if (selected) {
            // Update active class on delivery options
            document.querySelectorAll('.delivery-option').forEach(function(opt) {
                opt.classList.remove('active');
            });

            const parent = selected.closest('.delivery-option');
            if (parent) {
                parent.classList.add('active');
            }

            // Show/hide address fields
            if (selected.value === 'ambil') {
                if (alamatBox) {
                    alamatBox.style.display = 'none';
                    const address = document.getElementById('address');
                    if (address) address.required = false;
                }
                if (landmarkBox) landmarkBox.style.display = 'none';
            } else {
                if (alamatBox) {
                    alamatBox.style.display = 'block';
                    const address = document.getElementById('address');
                    if (address) address.required = true;
                }
                if (landmarkBox) landmarkBox.style.display = 'block';
            }
        }
    }

    radios.forEach(function(radio) {
        radio.addEventListener('change', toggleDeliveryFields);
    });

    // Initial state
    toggleDeliveryFields();

    // ---------- FORM VALIDATION ----------
    const checkoutForm = document.getElementById('checkoutForm');

    if (checkoutForm) {
        checkoutForm.addEventListener('submit', function(e) {
            const name = document.getElementById('customer_name');
            const phone = document.getElementById('phone');
            const address = document.getElementById('address');

            // Validate name
            if (!name.value.trim()) {
                e.preventDefault();
                alert('Silakan masukkan nama lengkap Anda.');
                name.focus();
                name.style.borderColor = '#ef4444';
                return false;
            }

            // Validate address if delivery type is "antar"
            const deliveryType = document.querySelector('input[name="delivery_type"]:checked');
            if (deliveryType && deliveryType.value === 'antar') {
                if (!address.value.trim()) {
                    e.preventDefault();
                    alert('Silakan masukkan alamat lengkap untuk pengiriman.');
                    address.focus();
                    address.style.borderColor = '#ef4444';
                    return false;
                }
            }

            // Success - show loading state
            const submitBtn = this.querySelector('.btn-checkout');
            if (submitBtn) {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
                submitBtn.disabled = true;
            }
        });

        // Remove error state on focus
        checkoutForm.querySelectorAll('.form-control').forEach(function(input) {
            input.addEventListener('focus', function() {
                this.style.borderColor = '';
            });
        });
    }

    // ---------- QUANTITY BUTTONS (FIXED) ----------
    // HAPUS semua event listener yang sebelumnya, biarkan form bekerja normal
    // Tombol + dan - akan submit form secara normal

    // ---------- REMOVE BUTTONS ----------
    document.querySelectorAll('.remove-btn').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            if (!confirm('Apakah Anda yakin ingin menghapus item ini dari keranjang?')) {
                e.preventDefault();
                return false;
            }
        });
    });

    // ---------- KEYBOARD SHORTCUTS ----------
    document.addEventListener('keydown', function(e) {
        // Ctrl + Enter to submit form
        if (e.ctrlKey && e.key === 'Enter') {
            const form = document.getElementById('checkoutForm');
            if (form) {
                form.dispatchEvent(new Event('submit'));
            }
        }
    });

    console.log('🟡 Checkout - Warung Nasi Kuning Ibu Opik');
    console.log('✨ Halaman checkout siap digunakan!');
});