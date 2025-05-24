<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    {{-- Style --}}
    @vite('resources/css/app.css')
    @vite(['resources/js/app.js'])
</head>

<body class="bg-[#121212]">
    <div class="w-full">
        @include('includes.navbar')
        @yield('content')
        @include('includes.footer')
    </div>

    <!-- Javascript -->
    <script>
        //Navbar
        let lastScrollY = window.scrollY;
        const navbar = document.getElementById("navbar");
        window.addEventListener("scroll", () => {
            const currentScrollY = window.scrollY;
            if (currentScrollY > lastScrollY) {
                // Scroll ke bawah
                navbar.style.transform = "translateY(-100%)";
            } else {
                // Scroll ke atas
                navbar.style.transform = "translateY(0)";
            }
            lastScrollY = currentScrollY;
        });
        // End of Navbar

        // Carousel
        const carousel = document.querySelector('.carousel-scroll');
        carousel.addEventListener('wheel', (e) => {
            if (e.deltaY === 0) return; // hanya ubah jika scroll vertikal
            e.preventDefault(); // cegah scroll normal
            carousel.scrollBy({
                left: e.deltaY, // geser horizontal sejauh scroll vertikal
                behavior: 'smooth' // animasi smooth
            });
        });
        // End of Carousel

        // Filter Kategori
        document.getElementById('kategori-select').addEventListener('change', function() {
            const selected = this.value;
            if (selected) {
                window.location.href = `/kategori/${selected}`;
            } else {
                window.location.href = `/`;
            }
        });
        // End of Filter Kategori

        // Autoscroll Kategori
        function redirectToKategori(select) {
            const url = select.options[select.selectedIndex].getAttribute('data-url') + '#kategori';
            setTimeout(() => {
                window.location.href = url;
            }, 50);
        }
        // End of Autoscroll Kategori
    </script>
</body>

</html>
