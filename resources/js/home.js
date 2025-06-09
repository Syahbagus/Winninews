export function initHomeScripts() {
    toggleNavbar();
    setupCarousel();
    setupKategoriFilter();
    setupAutoScrollKategori();
    setupPaginationScroll();
    setupProfileDropdown();
    setupHamburgerMenu();
}

// Navbar scroll
function toggleNavbar() {
    let lastScrollY = window.scrollY;
    const navbar = document.getElementById("navbar");
    if (!navbar) return;

    window.addEventListener("scroll", () => {
        const currentScrollY = window.scrollY;
        navbar.style.transform = currentScrollY > lastScrollY
            ? "translateY(-100%)"
            : "translateY(0)";
        lastScrollY = currentScrollY;
    });
}
// End of Navbar scroll

// Carousel
function setupCarousel() {
    const carousel = document.querySelector('.carousel-scroll');
    if (!carousel) return;

    carousel.addEventListener('wheel', (e) => {
        if (e.deltaY === 0) return;
        e.preventDefault();
        carousel.scrollBy({
            left: e.deltaY,
            behavior: 'smooth'
        });
    });
}
// End of Carousel

// Filter kategori
function setupKategoriFilter() {
    const select = document.getElementById('kategori-select');
    if (!select) return;

    select.addEventListener('change', function () {
        const selectedUrl = this.options[this.selectedIndex].getAttribute('data-url');
        if (selectedUrl) {
            window.location.href = selectedUrl + '#kategori';
        }
    });
}
// End of Filter kategori

// Auto scroll ke kategori
function setupAutoScrollKategori() {
    window.redirectToKategori = function(select) {
        const url = select.options[select.selectedIndex].getAttribute('data-url');
        if (url) {
            window.location.href = url + '#kategori';
        }
    };
}
// End of Auto scroll ke kategori

// Pagination Scroll
function setupPaginationScroll() {
    const paginationLinks = document.querySelectorAll('.pagination a');

    if (!paginationLinks.length) return;

    paginationLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const url = this.getAttribute('href');
            if (url) {
                window.location.href = url + '#kategori';
            }
        });
    });
}
// End of Pagination Scroll

// Menu profile
function setupProfileDropdown() {
    const toggleButton = document.getElementById('profile-toggle');
    const dropdownMenu = document.getElementById('profile-dropdown');
    if (!toggleButton || !dropdownMenu) return;

    toggleButton.addEventListener('click', function (e) {
        e.stopPropagation();
        dropdownMenu.classList.toggle('hidden');
    });

    document.addEventListener('click', function (e) {
        if (!dropdownMenu.contains(e.target) && !toggleButton.contains(e.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
}
// End of Menu profile

// Hamburger menu
function setupHamburgerMenu() {
    const menuButton = document.getElementById("menu-button");
    const mobileMenu = document.getElementById("mobile-menu");
    if (!menuButton || !mobileMenu) return;

    menuButton.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
    });
}
// End of Hamburger menu

// Last visited untuk navbar
function setupNavbarLinksWithLastVisited() {
    const navKategori = document.querySelectorAll('a[data-nav="kategori"]');
    const navBeranda = document.querySelectorAll('a[data-nav="beranda"]');

    const currentUrl = window.location.href;
    if (!currentUrl.includes('/news/')) {
        localStorage.setItem('lastVisitedPage', currentUrl);
    }

    const lastUrl = localStorage.getItem('lastVisitedPage') || '/';

    navKategori.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            window.location.href = lastUrl.includes('#') ? lastUrl : lastUrl + '#kategori';
        });
    });
}
//End of Last visited untuk navbar

// Jalankan fungsi setelah DOM siap
document.addEventListener('DOMContentLoaded', () => {
    setupNavbarLinksWithLastVisited();
});
