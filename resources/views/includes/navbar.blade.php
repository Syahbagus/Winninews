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
            <a href="#" data-nav="kategori" class="text-white px-4 hover:text-pink-400 transition">Kategori</a>
            <a href="https://winnicode.com/" target="_blank"
                class="text-white px-4 hover:text-pink-400 transition">Tentang Kami</a>
            <!-- Guest profile/login -->
            @php $guest = Auth::guard('guest')->user(); @endphp

            @if (!$guest)
                <a href="{{ route('guest.login.form') }}"
                    class="bg-pink-500 hover:bg-pink-600 px-4 py-2 rounded-md text-white transition">Log in</a>
            @else
                <div class="relative">
                    <button id="profile-toggle"
                        class="flex items-center text-white px-2 py-2 rounded-full hover:ring-2 hover:ring-pink-400 focus:outline-none transition">
                        <img src="{{ $guest->profile_picture_url }}" alt="Profile"
                            class="w-10 h-10 rounded-full object-cover">
                    </button>

                    <div id="profile-dropdown"
                        class="absolute right-0 mt-2 w-40 bg-[#1E1E1E] rounded-md shadow-lg hidden z-50">
                        <a href="{{ route('guest.profile') }}"
                            class="block px-4 py-2 text-white hover:text-pink-400">Profile</a>
                        <form method="POST" action="{{ route('guest.logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-white hover:text-pink-400">Logout</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>

        <!-- Hamburger Button -->
        <button id="menu-button" class="lg:hidden">
            <img src="{{ asset('icons/menu.svg') }}" alt="Menu" class="w-8 h-8">
        </button>
    </div>
</nav>

<!-- Dropdown Menu Mobile -->
<div id="mobile-menu" class="hidden bg-black p-4 lg:hidden transition-all duration-300">
    <a href="#" data-nav="main" class="block text-white py-2 hover:text-pink-400 transition">Beranda</a>
    <a href="#" data-nav="kategori" class="block text-white py-2 hover:text-pink-400 transition">Kategori</a>
    <a href="https://winnicode.com/" target="_blank"
        class="block text-white py-2 hover:text-pink-400 transition">Tentang Kami</a>

    <!-- Guest profile/login -->
    @php $guest = Auth::guard('guest')->user(); @endphp

    @if (!$guest)
        <a href="{{ route('guest.login.form') }}"
            class="w-full block bg-pink-500 hover:bg-pink-600 px-4 py-2 rounded-md text-white mt-2 transition">Log
            in</a>
    @else
        <div class="mt-4 flex items-center space-x-2">
            <img src="{{ $guest->profile_picture_url }}" alt="Profile" class="w-8 h-8 rounded-full object-cover">
            <span class="text-white">{{ $guest->name }}</span>
        </div>
        <a href="{{ route('guest.profile') }}" class="block text-white py-2 hover:text-pink-400 transition">Profile</a>
        <form method="POST" action="{{ route('guest.logout') }}">
            @csrf
            <button type="submit"
                class="w-full block text-left text-white py-2 hover:text-pink-400 transition">Logout</button>
        </form>
    @endif
</div>
