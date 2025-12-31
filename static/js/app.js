document.addEventListener("DOMContentLoaded", () => {
  // 1. Inisialisasi Icons
  lucide.createIcons();

  // --- LOGIC MOBILE MENU ---
  const btn = document.getElementById("mobile-menu-btn");
  const menu = document.getElementById("mobile-menu");
  const iconMenu = document.getElementById("icon-menu");
  const iconClose = document.getElementById("icon-close");
  const mobileLinks = document.querySelectorAll(".mobile-link-item");
  let isOpen = false;

  // Fungsi untuk Membuka Menu
  const openMenu = () => {
    isOpen = true;
    menu.classList.remove("max-h-0", "opacity-0");
    menu.classList.add("max-h-screen", "opacity-100");
    iconMenu.classList.add("hidden");
    iconClose.classList.remove("hidden");

    // Animasi Staggered
    mobileLinks.forEach((link, index) => {
      setTimeout(() => {
        link.classList.remove("translate-y-4", "opacity-0");
        link.classList.add("translate-y-0", "opacity-100");
      }, index * 50);
    });
  };

  // Fungsi untuk Menutup Menu
  const closeMenu = () => {
    isOpen = false;
    menu.classList.remove("max-h-screen", "opacity-100");
    menu.classList.add("max-h-0", "opacity-0");
    iconMenu.classList.remove("hidden");
    iconClose.classList.add("hidden");

    // Reset Posisi Link
    mobileLinks.forEach((link) => {
      link.classList.remove("translate-y-0", "opacity-100");
      link.classList.add("translate-y-4", "opacity-0");
    });
  };

  // Event Listener Tombol Hamburger
  if (btn) {
    btn.addEventListener("click", (e) => {
      e.stopPropagation(); // Mencegah event bubbling ke document
      if (isOpen) {
        closeMenu();
      } else {
        openMenu();
      }
    });
  }

  // LOGIC CLICK OUTSIDE (Menutup menu saat klik di luar)
  document.addEventListener("click", (e) => {
    // Jika menu terbuka DAN yang diklik BUKAN menu DAN BUKAN tombol hamburger
    if (isOpen && menu && !menu.contains(e.target) && !btn.contains(e.target)) {
      closeMenu();
    }
  });

  // --- LOGIC DARK MODE TOGGLE ---
  const themeToggleBtn = document.getElementById("theme-toggle");
  const htmlElement = document.documentElement;

  // Event Listener Click Toggle
  if (themeToggleBtn) {
    themeToggleBtn.addEventListener("click", () => {
      if (htmlElement.classList.contains("dark")) {
        htmlElement.classList.remove("dark");
        localStorage.setItem("theme", "light");
      } else {
        htmlElement.classList.add("dark");
        localStorage.setItem("theme", "dark");
      }
    });
  }
});
