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
    <!-- Navbar -->
    <script>
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
    </script>


</body>

</html>
