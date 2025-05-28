@extends('layouts.home')

@section('title', $berita->judul_berita)

@section('content')
    <!-- Konten Utama -->
    <main id="mainNews" class="container mx-auto px-4 py-8 text-white">
        <!-- Gambar Utama -->
        <div class="mb-6 overflow-hidden h-96 w-full rounded-md shadow-lg">
            <img src="{{ asset('storage/' . $berita->gambar_berita) }}" alt="{{ $berita->judul_berita }}"
                class="w-full h-full object-cover">
        </div>

        <!-- Konten -->
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Artikel -->
            <article class="md:col-span-2 space-y-4 leading-relaxed text-zinc-300 text-justify">
                <header>
                    <h1 class="text-2xl md:text-4xl font-bold mb-10 leading-snug text-white">
                        {{ $berita->judul_berita }}
                    </h1>
                    <p class="text-sm text-gray-400 mb-4">
                        {{ \Carbon\Carbon::parse($berita->tanggal_berita)->translatedFormat('d F Y') }}</p>
                </header>
                <div class="prose prose-invert max-w-none">
                    {!! $berita->isi_berita !!}
                </div>
            </article>

            <!-- Sidebar atau Berita Lainnya -->
            <aside class="space-y-6">
                <h2 class="text-xl font-bold text-white border-b border-zinc-700 pb-2">Baca Berita Lainnya</h2>
                @foreach ($berita_terbaru as $lainnya)
                    <a href="{{ route('news.show', $lainnya->slug) }}" class="block group">
                        <div class="flex gap-4 items-start">
                            <div class="w-32 h-24 overflow-hidden rounded-md flex-shrink-0">
                                <img src="{{ asset('storage/' . $lainnya->gambar_berita) }}"
                                    alt="{{ $lainnya->judul_berita }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                            <div class="flex-1">
                                <h3
                                    class="text-white font-semibold text-sm md:text-base group-hover:text-pink-400 transition-colors">
                                    {{ $lainnya->judul_berita }}
                                </h3>
                                <p class="text-xs text-gray-400 mt-1">
                                    {{ \Carbon\Carbon::parse($lainnya->tanggal_berita)->translatedFormat('d M Y') }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </aside>
        </div>
    </main>
@endsection
