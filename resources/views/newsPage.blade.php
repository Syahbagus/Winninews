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
                <a href="{{ route('home') }}#main" class="text-white px-4 hover:text-pink-400 transition">Beranda</a>
                <a href="{{ route('home') }}#kategori"
                    class="text-white px-4 hover:text-pink-400 transition">Kategori</a>
                <a href="https://winnicode.com/" target="_blank"
                    class="text-white px-4 hover:text-pink-400 transition">Tentang
                    Kami</a>
                <button class="bg-pink-500 hover:bg-pink-600 px-4 py-2 rounded-md text-white transition">Log in</button>
            </div>

            <!-- Hamburger Button -->
            <button id="menu-button" class="lg:hidden">
                <img src="{{ asset('icons/menu.svg') }}" alt="Menu" class="w-8 h-8">
            </button>
        </nav>

        <!-- Dropdown Menu Mobile -->
        <div id="mobile-menu" class="hidden bg-black p-4 lg:hidden transition-all duration-300">
            <a href="{{ route('home') }}#main" class="block text-white py-2 hover:text-pink-400 transition">Beranda</a>
            <a href="{{ route('home') }}#kategori"
                class="block text-white py-2 hover:text-pink-400 transition">Kategori</a>
            <a href="https://winnicode.com/" target="_blank"
                class="block text-white py-2 hover:text-pink-400 transition">Tentang
                Kami</a>
            <button class="w-full bg-pink-500 hover:bg-pink-600 px-4 py-2 rounded-md text-white mt-2 transition">Log
                in</button>
        </div>

    </header>

    <!-- Konten Utama -->
    <main id="mainNews" class="container mx-auto px-4 py-8 text-white">
        <!-- Gambar Utama -->
        <div class="mb-6 overflow-hidden h-96 w-full rounded-md shadow-lg">
            <img src="{{ asset('img/sample_endrick.jpeg') }}" alt="Endrick Real Madrid"
                class="w-full h-full object-cover">
        </div>

        <!-- Isi Berita dan Sidebar -->
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Artikel Utama -->
            <article class="md:col-span-2 space-y-4 leading-relaxed text-zinc-300 text-justify">
                <!-- Judul -->
                <header>
                    <h1 class="text-2xl md:text-4xl font-bold mb-10 leading-snug text-white text-justify">
                        Endrick Nggak Jadi Algojo Penentu Adu Penalti Real Madrid karena...
                    </h1>
                </header>

                <!-- Isi Artikel -->
                <p><em>Awalnya, Carlo Ancelotti mau memilih Endrick sebagai algojo penalti terakhir Real Madrid.
                        Tapi setelah Ancelotti lihat rautnya sang striker... nggak jadi deh!</em></p>

                <p>Real Madrid menang adu penalti kontra Atletico Madrid di leg kedua babak 16 besar Liga Champions,
                    Rabu (13/3) dini hari WIB. El Real menang 6-4, setelah agregat skor 2-2 dan waktu laga sengit
                    berujung penalti.</p>

                <p>Antonio Rudiger jadi algojo kelima Real Madrid. Tadinya yang ke arah kanan gawang itu mau diambil
                    oleh Endrick, tapi pelatih Ancelotti batal turunkan striker belia itu.</p>

                <p>"Endrick udah kami pilih jadi penendang kelima, tapi saya lihat raut wajahnya tegang. Lalu saya
                    ubah rencana, minta Rudiger ambil alih tendangan," jelas Ancelotti.</p>

                <p>Endrick memang masih muda dan belum berpengalaman di laga sekrusial itu. Penundaan debut algojo
                    adu penalti El Real memang masuk akal.</p>

                <p>"Saya percayakan pada yang lebih berani," tambah Ancelotti.</p>
            </article>

            <!-- Sidebar -->
            <aside class="space-y-6">
                <h2 class="text-xl font-bold text-white border-b border-zinc-700 pb-2">Baca Berita Lainnya</h2>

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
        </div>

        <!-- Komentar -->
        <section class="mt-5">
            <h2 class="text-xl font-semibold mb-4 text-white">Komentar</h2>
            <div class="space-y-8">
                <!-- Komentar 1 -->
                <div class="bg-zinc-900 p-5 rounded-md">
                    <div class="flex items-center space-x-4 mb-2">
                        <img src="{{ asset('img/John_Doe_2011.webp') }}" alt="User Profile"
                            class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <p class="text-sm font-semibold text-white">John Doe</p>
                            <span class="text-xs text-zinc-400">20/02/2025</span>
                        </div>
                    </div>
                    <p class="text-sm text-zinc-300 leading-relaxed text-justify">
                        Lorem ipsum odor amet, consectetur adipiscing elit. Elit sagittis porta eleifend enim hac
                        quisque elit conubia. Facilisis semper dolor per aptent fames; cubilia arcu. Justo imperdiet
                        inceptos porta venenatis primis tellus curae suspendisse. Luctus mi in sed taciti, interdum
                        efficitur magnis venenatis finibus potenti ultrices platea lacus. Pharetra gravida nibh eu ex
                        eros consectetur. Quis suscipit lacinia pulvinar luctus sociosqu massa tincidunt.
                    </p>
                </div>

                <!-- Komentar 2 -->
                <div class="bg-zinc-900 p-5 rounded-md">
                    <div class="flex items-center space-x-4 mb-2">
                        <img src="{{ asset('img/Jane_Doe.webp') }}" alt="User Profile"
                            class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <p class="text-sm font-semibold text-white">Jane Doe</p>
                            <span class="text-xs text-zinc-400">20/02/2025</span>
                        </div>
                    </div>
                    <p class="text-sm text-zinc-300 leading-relaxed text-justify">
                        Lorem ipsum odor amet, consectetur adipiscing elit. Elit sagittis porta eleifend enim hac
                        quisque elit conubia. Facilisis semper dolor per aptent fames; cubilia arcu. Justo imperdiet
                        inceptos porta venenatis primis tellus curae suspendisse. Luctus mi in sed taciti, interdum
                        efficitur magnis venenatis finibus potenti ultrices platea lacus. Pharetra gravida nibh eu ex
                        eros consectetur. Quis suscipit lacinia pulvinar luctus sociosqu massa tincidunt.
                    </p>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
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
