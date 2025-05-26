<!-- Navbar -->
<nav id="navbar" class="sticky top-0 left-0 right-0 bg-[#1E1E1E] z-50 transition-transform duration-300">
    <div class="container mx-auto flex justify-between items-center p-4">
        <!-- Logo -->
        <a href="{{ route('landing') }}" class="text-pink-400 text-xl font-bold">WinniNews</a>

        <!-- Search Bar -->
        <div class="w-1/3 mx-4">
            <form action="{{ route('search') }}" method="GET">
                <div class="relative">
                    <input type="text" name="q" placeholder="Cari berita..."
                        class="w-full px-4 py-2 rounded-md bg-white text-gray-400 focus:outline-none focus:ring focus:ring-pink-400"
                        required>
                    <span class="absolute right-3 top-2.5 text-gray-500 hidden sm:block">
                        <button type="submit">
                            <img src="{{ asset('icons/search.svg') }}" alt="Search" class="w-6 h-6">
                        </button>
                    </span>
                </div>
            </form>
        </div>

        <!-- Menu Desktop -->
        <div class="hidden lg:flex items-center space-x-4">
            <a href="{{ route('landing') }}" class="text-white px-4 hover:text-pink-400 transition">Beranda</a>
            <a href="{{ route('landing') }}#kategori"
                class="text-white px-4 hover:text-pink-400 transition">Kategori</a>
            <a href="https://winnicode.com/" target="_blank"
                class="text-white px-4 hover:text-pink-400 transition">Tentang Kami</a>
            <button class="bg-pink-500 hover:bg-pink-600 px-4 py-2 rounded-md text-white transition">Log in</button>
        </div>

        <!-- Hamburger Button -->
        <button id="menu-button" class="lg:hidden">
            <img src="{{ asset('icons/menu.svg') }}" alt="Menu" class="w-8 h-8">
        </button>
    </div>
</nav>

<!-- Dropdown Menu Mobile -->
<div id="mobile-menu" class="hidden bg-black p-4 lg:hidden transition-all duration-300">
    <a href="{{ route('landing') }}" class="block text-white py-2 hover:text-pink-400 transition">Beranda</a>
    <a href="{{ route('landing') }}#kategori" class="block text-white py-2 hover:text-pink-400 transition">Kategori</a>
    <a href="https://winnicode.com/" target="_blank"
        class="block text-white py-2 hover:text-pink-400 transition">Tentang Kami</a>
    <button class="w-full bg-pink-500 hover:bg-pink-600 px-4 py-2 rounded-md text-white mt-2 transition">Log in</button>
</div>
