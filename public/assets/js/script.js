'use strict';



/**
 * PRELOAD
 * 
 * loading will be end after document is loaded
 */

const preloader = document.querySelector('[data-preaload]');

window.addEventListener('load', function () {
  preloader.classList.add('loaded');
  document.body.classList.add('loaded');
});



/**
 * add event listener on multiple elements
 */

const addEventOnElements = function (elements, eventType, callback) {
  for (let i = 0, len = elements.length; i < len; i++) {
    elements[i].addEventListener(eventType, callback);
  }
}



/**
 * NAVBAR
 */

const navbar = document.querySelector('[data-navbar]');
const navTogglers = document.querySelectorAll('[data-nav-toggler]');
const overlay = document.querySelector('[data-overlay]');
const navLinks = document.querySelectorAll('[data-nav-link]');

const toggleNav = function () {
  navbar.classList.toggle('active');
  overlay.classList.toggle('active');
  document.body.classList.toggle('nav-active');
}

const closeNav = function () {
  navbar.classList.remove('active');
  overlay.classList.remove('active');
  document.body.classList.remove('nav-active');
}

addEventOnElements(navTogglers, 'click', toggleNav);

// Close navbar when clicking on nav links
addEventOnElements(navLinks, 'click', function () {
  closeNav();
});

/**
 * HEADER HIDE/SHOW ON SCROLL - IMPROVED
 */

let lastScrollPosition = 0;
const headerElement = document.querySelector('[data-header]');

window.addEventListener('scroll', function() {
  const currentScrollPosition = window.scrollY;
  
  // Jika scroll ke bawah dan posisi scroll > 50px
  if (currentScrollPosition > lastScrollPosition && currentScrollPosition > 50) {
    headerElement.classList.add('hide');
  } 
  // Jika scroll ke atas atau di posisi atas
  else {
    headerElement.classList.remove('hide');
  }
  
  lastScrollPosition = currentScrollPosition;
});

/**
 * HEADER
 * 
 * header will active after scroll 100px
 */

const header = document.querySelector('[data-header]');
const backTopBtn = document.querySelector('[data-back-top-btn]');

const activeElementOnScroll = function () {
  if (window.scrollY > 100) {
    header.classList.add('active');
    backTopBtn.classList.add('active');
  } else {
    header.classList.remove('active');
    backTopBtn.classList.remove('active');
  }
}

window.addEventListener('scroll', activeElementOnScroll);



/**
 * SCROLL REVEAL
 */

const revealElements = document.querySelectorAll('[data-reveal]');

const revealElementOnScroll = function () {
  for (let i = 0, len = revealElements.length; i < len; i++) {
    const isElementOnScreen = revealElements[i].getBoundingClientRect().top < window.innerHeight / 1.15;

    if (isElementOnScreen) {
      revealElements[i].classList.add('revealed');
    } else {
      revealElements[i].classList.remove('revealed');
    }
  }
}

window.addEventListener('scroll', revealElementOnScroll);

window.addEventListener('load', revealElementOnScroll);



/**
 * HERO SLIDER
 */

const heroSliderItems = document.querySelectorAll('[data-hero-slider-item]');
const heroSliderPrevBtn = document.querySelector('[data-prev-btn]');
const heroSliderNextBtn = document.querySelector('[data-next-btn]');

let currentSlidePos = 0;
let lastActiveSliderItem = heroSliderItems[0];

const updateSliderPos = function () {
  lastActiveSliderItem.classList.remove('active');
  heroSliderItems[currentSlidePos].classList.add('active');
  lastActiveSliderItem = heroSliderItems[currentSlidePos];
}

const slideNext = function () {
  if (currentSlidePos >= heroSliderItems.length - 1) {
    currentSlidePos = 0;
  } else {
    currentSlidePos++;
  }

  updateSliderPos();
}

heroSliderNextBtn.addEventListener('click', slideNext);

const slidePrev = function () {
  if (currentSlidePos <= 0) {
    currentSlidePos = heroSliderItems.length - 1;
  } else {
    currentSlidePos--;
  }

  updateSliderPos();
}

heroSliderPrevBtn.addEventListener('click', slidePrev);

/**
 * auto slide
 */

let autoSlideInterval;

const autoSlide = function () {
  autoSlideInterval = setInterval(function () {
    slideNext();
  }, 5000);
}

addEventOnElements([heroSliderNextBtn, heroSliderPrevBtn], 'mouseover', function () {
  clearInterval(autoSlideInterval);
});

addEventOnElements([heroSliderNextBtn, heroSliderPrevBtn], 'mouseout', autoSlide);

window.addEventListener('load', autoSlide);



/**
 * PARALLAX EFFECT
 */

const parallaxItems = document.querySelectorAll('[data-parallax-item]');

let x, y;

window.addEventListener('mousemove', function (event) {

  x = (event.clientX / window.innerWidth * 10) - 5;
  y = (event.clientY / window.innerHeight * 10) - 5;

  // reverse the number eg. 20 -> -20, -5 -> 5
  x = x - (x * 2);
  y = y - (y * 2);

  for (let i = 0, len = parallaxItems.length; i < len; i++) {
    const speed = parallaxItems[i].dataset.parallaxSpeed;
    parallaxItems[i].style.transform = `translate(${x * speed}px, ${y * speed}px)`;
  }

});

// ============================================
// FLOATING CART - MUNCUL PAS SCROLL
// ============================================

document.addEventListener('DOMContentLoaded', function() {

    const floatingCart = document.getElementById('floatingCart');
    let isVisible = false;

    // Cek posisi scroll
    function checkScroll() {
        const scrollY = window.scrollY || window.pageYOffset;
        const heroHeight = document.querySelector('.hero')?.offsetHeight || 600;

        // Munculin kalo scroll > 200px dari atas
        if (scrollY > 200) {
            if (!isVisible) {
                floatingCart.classList.add('show');
                isVisible = true;
            }
        } else {
            if (isVisible) {
                floatingCart.classList.remove('show');
                isVisible = false;
            }
        }
    }

    // Cek pas load
    setTimeout(checkScroll, 100);

    // Cek pas scroll
    window.addEventListener('scroll', checkScroll);
});

function tutupModalRiwayat() { document.body.style.overflow = 'auto'; document.getElementById('modalListRiwayat').classList.remove('show'); }

      function bukaModalNotif() {
          document.body.style.overflow = 'hidden'; document.getElementById('modalListNotif').classList.add('show');
          const badge = document.getElementById('badgeNotifHijau'); if(badge) badge.style.display = 'none';
          fetch("{{ route('pelanggan.notif.read') }}", { method: "POST", headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}", "Content-Type": "application/json" } });
      }
      function tutupModalNotif() { document.body.style.overflow = 'auto'; document.getElementById('modalListNotif').classList.remove('show'); }

      // FUNGSI KONFIRMASI HAPUS CUSTOM MODAL
      function konfirmasiHapus(tipe, id) {
          document.getElementById('customConfirmModal').classList.add('show');
          const form = document.getElementById('deleteForm');
          const msg = document.getElementById('confirmMessage');
          
          if (tipe === 'riwayat') {
              msg.innerHTML = 'Apakah kamu yakin ingin menghapus <b>Riwayat Pesanan</b> ini?';
              form.action = `/pelanggan/pesanan/${id}`; // Pastikan rute ini sesuai dengan route Laravel kamu
          } else if (tipe === 'notif') {
              msg.innerHTML = 'Apakah kamu yakin ingin menghapus <b>Notifikasi</b> ini?';
              form.action = `/pelanggan/notif/${id}`; // Pastikan rute ini sesuai dengan route Laravel kamu
          }
      }

      function tutupConfirmModal() { document.getElementById('customConfirmModal').classList.remove('show'); }
      
      window.addEventListener('click', function(e) {
          if (e.target === document.getElementById('authModal')) closeAuthModal();
          if (e.target === document.getElementById('modalListRiwayat')) tutupModalRiwayat();
          if (e.target === document.getElementById('modalListNotif')) tutupModalNotif();
          if (e.target === document.getElementById('customConfirmModal')) tutupConfirmModal();
      });

      function hapusNotifInstan(id) {
        const el = document.getElementById(`notif-item-${id}`);
        if (!el) return;

        // Animasi kayak notif pesan: mengecil + hilang
        el.style.transition = 'height 0.25s ease, margin 0.25s ease, opacity 0.25s ease';
        el.style.height = el.offsetHeight + 'px'; // kunci tinggi
        el.style.overflow = 'hidden';

        // Paksa reflow biar transisi jalan
        void el.offsetHeight;

        el.classList.add('hidden');

        setTimeout(() => {
          // Hapus item dari DOM
          el.remove();

          // Cek sisa notifikasi, tampilkan pesan kosong jika habis
          const container = document.getElementById('notif-list-container');
          const remaining = container.querySelectorAll('.swipe-item:not(.hidden)').length;
          if (remaining === 0 && !document.getElementById('empty-notif')) {
            container.innerHTML = `
              <div id="empty-notif" style="text-align: center; padding: 30px 0; animation: fadeIn 0.5s;">
                <i class="fas fa-bell-slash" style="color: #444; font-size: 32px; margin-bottom: 10px;"></i>
                <p style="color: #888; font-size: 13px;">Belum ada notifikasi.</p>
              </div>
            `;
          }
        }, 300);

        // Hapus di server (background)
        fetch(`/pelanggan/notif/${id}`, {
          method: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          }
        }).catch(err => console.error("Gagal hapus notif:", err));
      }

      