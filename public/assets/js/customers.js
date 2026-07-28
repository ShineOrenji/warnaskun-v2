// ============================================
// CUSTOMERS - WARUNG NASI KUNING IBU OPIK
// ============================================

document.addEventListener('DOMContentLoaded', function() {

    // ---------- VIEW DETAIL ----------
    const detailModal = document.getElementById('detailModal');
    const closeDetailBtn = document.getElementById('closeDetailModal');
    const detailBody = document.getElementById('detailBody');

    document.querySelectorAll('.view-customer').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;

            // Show loading
            detailBody.innerHTML = `
                <div class="detail-loading">
                    <i class="fas fa-spinner fa-spin"></i>
                    <p>Memuat data...</p>
                </div>
            `;

            detailModal.classList.add('show');
            document.body.style.overflow = 'hidden';

            // Simulate API call
            setTimeout(function() {
                // Find row data
                const row = document.querySelector(`.customer-row[data-id="${id}"]`);
                if (row) {
                    const cells = row.querySelectorAll('td');
                    const name = cells[1]?.querySelector('span')?.textContent || '-';
                    const phone = cells[2]?.textContent || '-';
                    const orders = cells[3]?.textContent?.trim() || '0';
                    const spent = cells[4]?.textContent?.trim() || 'Rp 0';
                    const lastOrder = cells[5]?.textContent?.trim() || '-';
                    const status = cells[6]?.querySelector('.badge')?.textContent || '-';

                    detailBody.innerHTML = `
                        <div class="detail-item">
                            <span class="label">Nama</span>
                            <span class="value"><strong>${name}</strong></span>
                        </div>
                        <div class="detail-item">
                            <span class="label">No HP</span>
                            <span class="value">${phone}</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Total Order</span>
                            <span class="value">${orders} pesanan</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Total Belanja</span>
                            <span class="value">${spent}</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Order Terakhir</span>
                            <span class="value">${lastOrder}</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Status</span>
                            <span class="value"><span class="${cells[6]?.querySelector('.badge')?.className || 'badge'}">${status}</span></span>
                        </div>
                    `;
                }
            }, 500);
        });
    });

    // Close detail modal
    if (closeDetailBtn) {
        closeDetailBtn.addEventListener('click', function() {
            detailModal.classList.remove('show');
            document.body.style.overflow = '';
        });
    }

    detailModal.addEventListener('click', function(e) {
        if (e.target === detailModal) {
            detailModal.classList.remove('show');
            document.body.style.overflow = '';
        }
    });

    // ---------- EDIT CUSTOMER ----------
    const editModal = document.getElementById('editModal');
    const closeEditBtn = document.getElementById('closeEditModal');
    const cancelEditBtn = document.getElementById('cancelEditModal');
    const editForm = document.getElementById('editForm');
    const editSubmitBtn = document.getElementById('editSubmitBtn');

    document.querySelectorAll('.edit-customer').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;

            // Find row data
            const row = document.querySelector(`.customer-row[data-id="${id}"]`);
            if (!row) return;

            const cells = row.querySelectorAll('td');
            const name = cells[1]?.querySelector('span')?.textContent || '';
            const phone = cells[2]?.textContent || '';

            // Fill form
            document.getElementById('editId').value = id;
            document.getElementById('editName').value = name.trim();
            document.getElementById('editPhone').value = phone.trim();

            // Show modal
            editModal.classList.add('show');
            document.body.style.overflow = 'hidden';
        });
    });

    // Close edit modal
    if (closeEditBtn) {
        closeEditBtn.addEventListener('click', function() {
            editModal.classList.remove('show');
            document.body.style.overflow = '';
        });
    }

    if (cancelEditBtn) {
        cancelEditBtn.addEventListener('click', function() {
            editModal.classList.remove('show');
            document.body.style.overflow = '';
        });
    }

    editModal.addEventListener('click', function(e) {
        if (e.target === editModal) {
            editModal.classList.remove('show');
            document.body.style.overflow = '';
        }
    });

    // ---------- SUBMIT EDIT ----------
    if (editForm) {
        editForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const name = document.getElementById('editName').value.trim();
            const phone = document.getElementById('editPhone').value.trim();

            if (!name) {
                alert('Nama harus diisi!');
                document.getElementById('editName').focus();
                return;
            }

            if (!phone) {
                alert('No HP harus diisi!');
                document.getElementById('editPhone').focus();
                return;
            }

            editSubmitBtn.disabled = true;
            editSubmitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';

            setTimeout(function() {
                alert('Data pelanggan berhasil diperbarui!');
                editModal.classList.remove('show');
                document.body.style.overflow = '';
                location.reload();
            }, 1000);
        });
    }

    // ---------- DELETE CUSTOMER ----------
    document.querySelectorAll('.delete-customer').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            const name = this.closest('.customer-row')?.querySelector('.user-cell span')?.textContent || 'Pelanggan';

            if (confirm(`Apakah Anda yakin ingin menghapus pelanggan "${name}"?`)) {
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                this.disabled = true;

                setTimeout(function() {
                    alert(`Pelanggan "${name}" berhasil dihapus!`);
                    const row = btn.closest('.customer-row');
                    if (row) {
                        row.style.animation = 'fadeOut 0.3s ease forwards';
                        setTimeout(function() {
                            row.remove();
                            const count = document.querySelectorAll('.customer-row').length;
                            const countEl = document.getElementById('customerCount');
                            if (countEl) countEl.textContent = count;
                        }, 300);
                    }
                }, 500);
            }
        });
    });

    // ---------- KEYBOARD SHORTCUTS ----------
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (detailModal?.classList.contains('show')) {
                detailModal.classList.remove('show');
                document.body.style.overflow = '';
            }
            if (editModal?.classList.contains('show')) {
                editModal.classList.remove('show');
                document.body.style.overflow = '';
            }
        }
    });

    console.log('🟡 Customers - Warung Nasi Kuning Ibu Opik');
    console.log('✨ Manajemen pelanggan siap digunakan!');
});