@extends('layouts.home')

@section('title', 'Winninews | Baca Berita Online')

@section('content')
    {{-- Berita Utama dan Samping --}}
    <section id="main" class="container mx-auto px-4 py-4 lg:py-5 grid lg:grid-cols-3 gap-6">
        <!-- Berita Utama -->
        <div class="md:col-span-2 md:row-span-2 group">
            <a href="{{ route('news.show', $berita_terbaru[0]->slug) }}" class="block group">
                <div class="overflow-hidden rounded-lg">
                    <img src="{{ asset('storage/' . $berita_terbaru[0]->gambar_berita) }}" alt="Berita Utama"
                        class="w-full max-h-[250px] md:max-h-[400px] object-cover rounded-lg transition-transform duration-300 group-hover:scale-105">
                </div>
                <div
                    class="mt-4 text-xl sm:text-sm md:text-xl font-bold text-white transition-colors duration-300 group-hover:text-pink-400">
                    {{ $berita_terbaru[0]->judul_berita }}
                </div>
            </a>
        </div>

        <!-- Berita Samping -->
        <aside class="space-y-4 hidden lg:block">
            @foreach ($berita_terbaru->slice(1, 3) as $berita)
                <a href="{{ route('news.show', $berita->slug) }}" class="block group">
                    <div class="flex gap-4 items-start">
                        <div class="w-40 h-28 overflow-hidden rounded-lg flex-shrink-0">
                            <img src="{{ asset('storage/' . $berita->gambar_berita) }}" alt="{{ $berita->judul_berita }}"
                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                        </div>
                        <h3
                            class="text-white font-bold text-sm md:text-base transition-colors duration-300 group-hover:text-pink-400">
                            {{ $berita->judul_berita }}
                        </h3>
                    </div>
                </a>
            @endforeach
        </aside>
    </section>

    {{-- Trending --}}
    <section class="container mx-auto px-4 py-8 md:py-12">
        <h1 class="text-pink-400 text-2xl font-bold mb-6">Trending</h1>
        <div class="carousel-scroll flex overflow-x-auto space-x-6 scrollbar-hide cursor-grab pb-4">
            @foreach ($trendings as $trending)
                <a href="{{ route('news.show', $trending->slug) }}" class="flex-shrink-0 w-72 md:w-80 lg:w-96 group mt-3">
                    <div
                        class="bg-zinc-900 rounded-lg overflow-hidden shadow-md transition-transform duration-300 ease-in-out hover:scale-105 hover:-translate-y-1 flex flex-col h-full">
                        <div class="overflow-hidden">
                            <img src="{{ asset('storage/' . $trending->gambar_berita) }}"
                                alt="{{ $trending->judul_berita }}"
                                class="w-full h-48 object-cover transition-transform duration-300 ease-in-out group-hover:scale-105">
                        </div>
                        <div class="flex-grow flex flex-col justify-end">
                            <h3
                                class="text-white font-semibold text-sm md:text-base leading-snug px-4 pt-4 group-hover:text-pink-400 min-h-[4.5rem]">
                                {{ $trending->judul_berita }}
                            </h3>
                            <p class="text-gray-400 text-xs px-4 pb-4">
                                {{ $trending->created_at->translatedFormat('d F Y') }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </section>
    {{-- End of Trending --}}

    {{-- Kategori --}}
    <section id="kategori" class="container mx-auto px-4 py-6">
        <!-- Kategori Dropdown -->
        <h1 class="text-pink-400 text-2xl font-bold mb-4">Kategori</h1>
        <div class="mb-8">
            <label for="kategori" class="sr-only">Pilih Kategori</label>
            <select id="kategori-select" name="kategori" class="w-full md:w-64 p-2 rounded-md bg-white text-black"
                onchange="redirectToKategori(this)">
                <option data-url="{{ url('/') }}">Semua</option>
                @foreach ($kategori_list as $kategori)
                    <option data-url="{{ url('/kategori/' . urlencode($kategori)) }}"
                        {{ request()->is('kategori/' . $kategori) ? 'selected' : '' }}>
                        {{ ucfirst($kategori) }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Grid Berita -->
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($berita_paginated as $berita)
                <a href="{{ url('/news/' . $berita->slug) }}" class="block group min-w-0">
                    <div
                        class="bg-zinc-900 rounded-lg overflow-hidden shadow-md transition-transform duration-300 ease-in-out hover:scale-105 hover:-translate-y-1 flex flex-col h-full">
                        <img src="{{ asset('storage/' . $berita->gambar_berita) }}" alt="{{ $berita->judul_berita }}"
                            class="w-full h-28 sm:h-40 md:h-48 object-cover">
                        <div class="p-3 flex-grow flex flex-col justify-between">
                            <div>
                                <h3
                                    class="text-sm sm:text-base text-white font-semibold group-hover:text-pink-400 leading-tight">
                                    {{ $berita->judul_berita }}
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-400 mt-1">
                                    {{ $berita->created_at->translatedFormat('d F Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Pagination -->
        @if ($berita_paginated->hasPages())
            <div class="mt-6 mb-6 flex justify-center">
                @php
                    $paginationHtml = $berita_paginated->links('pagination::tailwind')->render();

                    // Tambahkan #kategori di setiap href link pagination
                    $paginationHtmlWithHash = preg_replace('/href="([^"]+)"/', 'href="$1#kategori"', $paginationHtml);
                @endphp
                {!! $paginationHtmlWithHash !!}
            </div>
        @endif
    </section>
    {{-- End of kategori --}}

@endsection
