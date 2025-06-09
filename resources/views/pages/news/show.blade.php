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
                <h2 class="text-xl font-bold text-pink-400 border-b border-zinc-700 pb-2">Baca Berita Lainnya</h2>
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

        <!-- Komentar Section -->
        <section class="mt-10">
            <h2 class="text-xl font-semibold mb-4 text-pink-400">Tulis Komentar</h2>
            @auth('guest')
                @if (session('success'))
                    <div class="text-green-500 mt-4">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('komentar.store', $berita->id) }}" method="POST">
                    @csrf
                    <textarea name="isi_komentar" rows="4" class="w-full bg-zinc-800 text-white rounded-md p-3 focus:outline-none"
                        placeholder="Tulis komentar Anda di sini..."></textarea>
                    <button type="submit"
                        class="mt-3 bg-pink-600 hover:bg-pink-700 text-white font-semibold px-4 py-2 rounded-md">Kirim</button>
                </form>
            @else
                <p class="text-zinc-400">Silakan <a href="{{ route('guest.login') }}" class="text-pink-400 underline">login
                    </a> untuk berkomentar.</p>
            @endauth
        </section>

        <!-- Daftar Komentar -->
        <section id="daftar-komentar" class="mt-10">
            <h2 class="text-xl font-semibold mb-4 text-pink-400">Komentar</h2>
            <div class="space-y-6">
                @forelse ($berita->komentars as $komentar)
                    <div class="bg-zinc-900 p-5 rounded-md">
                        <div class="flex items-center space-x-4 mb-2">
                            <img src="{{ $komentar->guest->profile_picture_url }}"
                                class="w-10 h-10 rounded-full object-cover" alt="Foto {{ $komentar->guest->name }}">
                            <div>
                                <p class="text-sm font-semibold text-white">{{ $komentar->guest->name }}</p>
                                <span class="text-xs text-zinc-400">{{ $komentar->created_at->format('d/m/Y') }}</span>
                            </div>
                        </div>
                        <p class="text-sm text-zinc-300 text-justify">{{ $komentar->isi_komentar }}</p>
                    </div>
                @empty
                    <p class="text-zinc-400">Belum ada komentar.</p>
                @endforelse
            </div>
        </section>
    </main>
@endsection
