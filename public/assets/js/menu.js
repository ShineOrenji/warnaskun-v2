  // Menu Filter Functionality
  document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const menuItems = document.querySelectorAll('.menu-item-card');

    filterBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        filterBtns.forEach(b => b.classList.remove('active'));
        this.classList.add('active');

        const filter = this.dataset.filter;

        menuItems.forEach(item => {
          if (filter === 'all' || item.dataset.category === filter) {
            item.style.display = 'block';
            setTimeout(() => {
              item.style.opacity = '1';
              item.style.transform = 'scale(1)';
            }, 50);
          } else {
            item.style.opacity = '0';
            item.style.transform = 'scale(0.8)';
            setTimeout(() => {
              item.style.display = 'none';
            }, 300);
          }
        });
      });
    });
  });

// ============================================
// TOAST NOTIFICATION
// ============================================

document.addEventListener("DOMContentLoaded", function () {

    const toast = document.getElementById("cart-toast");
    const overlay = document.getElementById("toast-overlay");
    const itemNameEl = document.getElementById("toast-item-name");
    let toastTimer = null;

    // Fungsi tampilkan toast
    function showToast(itemName) {
        if (itemNameEl && itemName) {
            itemNameEl.textContent = itemName;
        }

        // Reset progress bar
        const progress = toast.querySelector('.progress-fill');
        if (progress) {
            progress.style.animation = 'none';
            setTimeout(() => {
                progress.style.animation = 'toastProgress 3s linear forwards';
            }, 50);
        }

        // Reset icon animation
        const icon = toast.querySelector('.cart-toast-icon');
        if (icon) {
            icon.style.animation = 'none';
            setTimeout(() => {
                icon.style.animation = 'toastPop 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) forwards';
            }, 50);
        }

        overlay.classList.add('show');
        toast.classList.add('show');

        if (toastTimer) clearTimeout(toastTimer);

        toastTimer = setTimeout(() => {
            hideToast();
        }, 3000);
    }

    function hideToast() {
        toast.classList.remove('show');
        overlay.classList.remove('show');
    }

    // Klik overlay = tutup
    overlay.addEventListener('click', function() {
        hideToast();
        if (toastTimer) {
            clearTimeout(toastTimer);
            toastTimer = null;
        }
    });

    // Hover: pause timer
    toast.addEventListener('mouseenter', function() {
        if (toastTimer) {
            clearTimeout(toastTimer);
            toastTimer = null;
        }
        const progress = toast.querySelector('.progress-fill');
        if (progress) {
            progress.style.animationPlayState = 'paused';
        }
    });

    toast.addEventListener('mouseleave', function() {
        const progress = toast.querySelector('.progress-fill');
        if (progress) {
            progress.style.animationPlayState = 'running';
        }
        toastTimer = setTimeout(() => {
            hideToast();
        }, 1500);
    });

    // ESC = tutup
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && toast.classList.contains('show')) {
            hideToast();
            if (toastTimer) {
                clearTimeout(toastTimer);
                toastTimer = null;
            }
        }
    });

    // ============================================
    // HOOK KE FORM CART
    // ============================================

    document.querySelectorAll('form[action*="/cart/add/"]').forEach(function (form) {

        form.addEventListener("submit", function (e) {

            e.preventDefault();

            // Ambil nama menu
            const card = this.closest('.menu-item-card');
            let itemName = 'Menu';
            if (card) {
                const titleEl = card.querySelector('.menu-item-title');
                if (titleEl) itemName = titleEl.textContent.trim();
            }

            // Tampilkan toast
            showToast(itemName);

            // Update counter (opsional)
            // ... kode update counter ...

            // Kirim request
            fetch(form.action, {
                method: "POST",
                body: new FormData(form),
                headers: { "X-Requested-With": "XMLHttpRequest" }
            })
            .then(response => response.json())
            .then(data => {

                if (!data.success) return;

                let badge = document.getElementById('floatingCartBadge');
                const cart = document.getElementById('floatingCart');

                if (data.cartCount > 0) {

                    if (!badge) {

                        badge = document.createElement('span');
                        badge.id = 'floatingCartBadge';
                        badge.className = 'cart-badge';

                        cart.appendChild(badge);
                    }

                    badge.textContent = data.cartCount;
                    badge.style.display = 'flex';

                } else {

                    if (badge) {
                        badge.remove();
                    }

                }

                cart.classList.add('has-items');

            });
        });
    });

    console.log('🟡 Toast notification siap!');
});