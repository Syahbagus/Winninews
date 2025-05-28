<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>WinniNews</title>

    {{-- Style --}}
    @vite('resources/css/app.css')
    @vite(['resources/js/app.js'])
</head>

<body class="bg-[#121212]">
    <header class="bg-[#1E1E1E] shadow-md">
        <!-- Navbar -->
        <nav class="container mx-auto flex justify-between items-center p-4">
            <!-- Logo -->
            <div class="text-pink-400 text-xl font-bold">
                WinniNews
            </div>

            <!-- Search Bar -->
            <div class="w-1/3 mx-4">
                <div class="relative">
                    <input type="text" placeholder="Cari berita..."
                        class="w-full px-4 py-2 rounded-md bg-white text-gray-400 focus:outline-none focus:ring focus:ring-pink-400">
                    <span class="absolute right-3 top-2.5 text-gray-500">
                        <img src="{{ asset('icons/search.svg') }}" alt="Search" class="w-6 h-6">
                    </span>
                </div>
            </div>

            <!-- Menu Desktop -->
            <div class="hidden lg:flex items-center space-x-4">
                <a href="#main" class="text-white px-4 hover:text-pink-400 transition">Beranda</a>
                <a href="#kategori" class="text-white px-4 hover:text-pink-400 transition">Kategori</a>
                <a href="https://winnicode.com/" target="_blank"
                    class="text-white px-4 hover:text-pink-400 transition">Tentang Kami</a>
                <button class="bg-pink-500 hover:bg-pink-600 px-4 py-2 rounded-md text-white transition">Log in</button>
            </div>

            <!-- Hamburger Button -->
            <button id="menu-button" class="lg:hidden">
                <img src="{{ asset('icons/menu.svg') }}" alt="Menu" class="w-8 h-8">
            </button>
        </nav>

        <!-- Dropdown Menu Mobile -->
        <div id="mobile-menu" class="hidden bg-black p-4 lg:hidden transition-all duration-300">
            <a href="#main" class="block text-white py-2 hover:text-pink-400 transition">Beranda</a>
            <a href="#kategori" class="block text-white py-2 hover:text-pink-400 transition">Kategori</a>
            <a href="https://winnicode.com/" target="_blank"
                class="block text-white py-2 hover:text-pink-400 transition">Tentang Kami</a>
            <button class="w-full bg-pink-500 hover:bg-pink-600 px-4 py-2 rounded-md text-white mt-2 transition">Log
                in</button>
        </div>
    </header>

    {{-- Berita Utama dan Samping --}}
    <section id="main" class="container mx-auto px-4 py-4 md:py-12 grid md:grid-cols-3 gap-6">
        <!-- Berita Utama -->
        <div class="col-span-3 md:col-span-2 md:row-span-2 group">
            <a href="{{ url('/news/endrick') }}" class="block group">
                <div class="overflow-hidden rounded-lg">
                    <img src="{{ asset('img/sample_endrick.jpeg') }}" alt="Berita Utama"
                        class="w-full md:h-auto aspect-[16/9] object-cover rounded-lg transition-transform duration-300 group-hover:scale-105">
                </div>
                <h3
                    class="mt-4 text-2xl md:text-2xl font-bold text-white transition-colors duration-300 group-hover:text-pink-400">
                    Endrick Nggak Jadi Algojo Penentu Adu Penalti Real Madrid karena...
                </h3>
            </a>
        </div>

        <!-- Berita Samping -->
        <aside class="hidden md:block space-y-4">
            <!-- Berita 1 -->
            <a href="{{ url('/news/korupsi') }}" class="block group">
                <div class="flex gap-4 items-start">
                    <div class="w-40 h-28 overflow-hidden rounded-lg flex-shrink-0">
                        <img src="{{ asset('img/sample_kasus-korupsi-newin-nugroho.jpeg') }}" alt="Berita 1"
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <h3
                        class="text-white font-bold text-sm md:text-base transition-colors duration-300 group-hover:text-pink-400">
                        Kasus Korupsi Rp 11,7 Triliun, KPK Tahan Newin Nugroho
                    </h3>
                </div>
            </a>

            <!-- Berita 2 -->
            <a href="{{ url('/news/pmi') }}" class="block group">
                <div class="flex gap-4 items-start">
                    <div class="w-40 h-28 overflow-hidden rounded-lg flex-shrink-0">
                        <img src="{{ asset('img/sample_PMI.jpeg') }}" alt="Berita 2"
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <h3
                        class="text-white font-bold text-sm md:text-base transition-colors duration-300 group-hover:text-pink-400">
                        Puluhan Kru Ambulans Solidaritas Datangi PMI Klaten Buntut Relawan Diancam
                    </h3>
                </div>
            </a>

            <!-- Berita 3 -->
            <a href="{{ url('/news/pesawat') }}" class="block group">
                <div class="flex gap-4 items-start">
                    <div class="w-40 h-28 overflow-hidden rounded-lg flex-shrink-0">
                        <img src="{{ asset('img/sample_pesawat.jpeg') }}" alt="Berita 3"
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <h3
                        class="text-white font-bold text-sm md:text-base transition-colors duration-300 group-hover:text-pink-400">
                        Ngeri! Penumpang Berdiri di Sayap Saat American Airlines Dilalap Api
                    </h3>
                </div>
            </a>
        </aside>
    </section>

    {{-- Trending --}}
    <section class="container mx-auto px-4 py-8 md:py-12">
        <h1 class="text-white text-2xl font-bold mb-6">Trending</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Berita 1 -->
            <a href="{{ url('/news/banjir') }}" class="block group">
                <div
                    class="group bg-zinc-900 rounded-lg overflow-hidden shadow-md transition-transform duration-300 ease-in-out hover:scale-105 hover:-translate-y-1">
                    <img src="{{ asset('img/sample_perumahan-banjir.jpeg') }}" alt="Banjir Bekasi"
                        class="w-full h-48 object-cover rounded-lg transition-transform group-hover:scale-105">
                    <h3
                        class="mt-2 text-white font-semibold text-sm md:text-base leading-snug p-4 group-hover:text-pink-400">
                        Kondisi Terkini Cluster Baru Perumahan Bekasi yang Terendam Banjir hingga ke Atap
                    </h3>
                </div>
            </a>

            <!-- Berita 2 -->
            <a href="{{ url('/news/korupsi') }}" class="block group">
                <div
                    class="group bg-zinc-900 rounded-lg overflow-hidden shadow-md transition-transform duration-300 ease-in-out hover:scale-105 hover:-translate-y-1">
                    <img src="{{ asset('img/sample_korupsi.jpeg') }}" alt="Korupsi Proyek Pusat"
                        class="w-full h-48 object-cover rounded-lg transition-transform group-hover:scale-105">
                    <h3
                        class="mt-2 text-white font-semibold text-sm md:text-base leading-snug p-4 group-hover:text-pink-400">
                        3 Hal Terkait Korupsi Proyek Pusat Data Nasional Sementara Diusut Jaksa
                    </h3>
                </div>
            </a>

            <!-- Berita 3 -->
            <a href="{{ url('/news/bukber') }}" class="block group">
                <div
                    class="group bg-zinc-900 rounded-lg overflow-hidden shadow-md transition-transform duration-300 ease-in-out hover:scale-105 hover:-translate-y-1">
                    <img src="{{ asset('img/sample_bukber-bersama-pegawai.jpeg') }}" alt="Bukber Gus Ipul"
                        class="w-full h-48 object-cover rounded-lg transition-transform group-hover:scale-105">
                    <h3
                        class="mt-2 text-white font-semibold text-sm md:text-base leading-snug p-4 group-hover:text-pink-400">
                        Bukber Bersama Pegawai, Gus Ipul Minta Tingkatkan Solidaritas-Kepedulian
                    </h3>
                </div>
            </a>
        </div>
    </section>
    {{-- End of Trending --}}

    {{-- Kategori --}}
    <section id="kategori" class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-white mb-4">Kategori</h1>
        <div class="mb-8">
            <label for="kategori" class="sr-only">Pilih Kategori</label>
            <select id="kategori-select" name="kategori" class="w-full md:w-64 p-2 rounded-md bg-white text-black">
                <option value="">Semua</option>
                <option value="politik">Politik</option>
                <option value="ekonomi">Ekonomi & Bisnis</option>
                <option value="teknologi">Teknologi</option>
                <option value="olahraga">Olahraga</option>
                <option value="hiburan">Hiburan</option>
                <option value="gaya-hidup">Gaya Hidup</option>
            </select>
        </div>

        <!-- Grid Berita -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <!-- berita Satu  -->
            <a href="{{ url('/news/gempa') }}" class="block group">
                <div
                    class="bg-zinc-900 rounded-lg group overflow-hidden shadow-md transition-transform duration-300 ease-in-out hover:scale-105 hover:-translate-y-1">
                    <img src="{{ asset('img/sample_gempa.jpeg') }}" alt="Judul Berita"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-white font-semibold text-base group-hover:text-pink-400">Analisis BMKG Penyebab
                            Gempa Dangkal M 5,4 di
                            Tolitoli Sulteng</h3>
                    </div>
                </div>
            </a>

            <!-- berita Dua -->
            <a href="{{ url('/news/tarik-kereta') }}" class="block group">
                <div
                    class="bg-zinc-900 rounded-lg group overflow-hidden shadow-md transition-transform duration-300 ease-in-out hover:scale-105 hover:-translate-y-1">
                    <img src="{{ asset('img/sample_tarik-kereta.jpeg') }}" alt="Judul Berita"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-white font-semibold text-base group-hover:text-pink-400">Gokil! Pria di Mesir
                            Pecahkan Rekor Tarik Kereta
                            279
                            Ton</h3>
                    </div>
                </div>
            </a>

            <!-- berita Tiga -->
            <a href="{{ url('/news/THR') }}" class="block group">
                <div
                    class="bg-zinc-900 rounded-lg group overflow-hidden shadow-md transition-transform duration-300 ease-in-out hover:scale-105 hover:-translate-y-1">
                    <img src="{{ asset('img/sample_THR.jpeg') }}" alt="Judul Berita"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-white font-semibold text-base group-hover:text-pink-400">Pengurus RW di Jakbar
                            Minta THR Diperiksa
                            Polisi,
                            Ini Hasilnya</h3>
                    </div>
                </div>
            </a>

            <!-- Berita Empat -->
            <a href="{{ url('/news/gempa2') }}" class="block group">
                <div
                    class="bg-zinc-900 rounded-lg group overflow-hidden shadow-md transition-transform duration-300 ease-in-out hover:scale-105 hover:-translate-y-1">
                    <img src="{{ asset('img/sample_gempa2.jpeg') }}" alt="Judul Berita"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-white font-semibold text-base group-hover:text-pink-400">Gempa Dangkal M 5,5
                            Guncang Tolitoli Sulteng
                        </h3>
                    </div>
                </div>
            </a>

            <!-- berita lima -->
            <a href="{{ url('/news/tiket-pesawat') }}" class="block group">
                <div
                    class="bg-zinc-900 rounded-lg group overflow-hidden shadow-md transition-transform duration-300 ease-in-out hover:scale-105 hover:-translate-y-1">
                    <img src="{{ asset('img/sample_tiket-pesawat.jpeg') }}" alt="Judul Berita"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-white font-semibold text-base group-hover:text-pink-400">Lion Group Paparkan
                            Tarif
                            Pesawat Saat Mudik
                            13-14%,
                            Ini Penjelasannya</h3>
                    </div>
                </div>
            </a>

            <!-- berita enam -->
            <a href="{{ url('/news/cuci-uang') }}" class="block group">
                <div
                    class="bg-zinc-900 rounded-lg group overflow-hidden shadow-md transition-transform duration-300 ease-in-out hover:scale-105 hover:-translate-y-1">
                    <img src="{{ asset('img/sample_cuci-uang.jpeg') }}" alt="Judul Berita"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-white font-semibold text-base group-hover:text-pink-400">Direktur Persiba
                            Diduga
                            Cuci Duit Narkoba buat
                            Bikin
                            Resto hingga Kosan</h3>
                    </div>
                </div>
            </a>
        </div>
    </section>
    {{-- End of kategori --}}

    <footer class="bg-[#1E1E1E] text-center py-6 text-sm text-zinc-400">
        <div class="container mx-auto">
            <p>&copy; 2025 - Company, Inc. All rights reserved.</p>
            <p class="mt-1">
                <a href="#" class="underline hover:text-white transition">Alamat Kantor</a>
            </p>
        </div>
    </footer>
</body>

</html>
