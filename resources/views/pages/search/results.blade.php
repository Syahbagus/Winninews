@extends('layouts.home')

@section('content')
    <main class="container mx-auto px-4 py-8 text-white">
        <h1 class="text-xl sm:text-2xl font-bold mb-6">Hasil Pencarian untuk: "{{ $query }}"</h1>

        @if ($results->isEmpty())
            <p class="text-gray-400">Tidak ditemukan hasil untuk kata kunci tersebut.</p>
        @else
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($results as $berita)
                    <div
                        class="bg-zinc-900 rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-lg">
                        @if ($berita->gambar_berita)
                            <img src="{{ asset('storage/' . $berita->gambar_berita) }}" alt="{{ $berita->judul_berita }}"
                                class="w-full h-24 sm:h-32 md:h-40 object-cover">
                        @endif
                        <div class="p-2 sm:p-3 md:p-4">
                            <a href="{{ route('news.show', $berita->slug) }}"
                                class="text-sm sm:text-base md:text-lg text-pink-400 font-semibold hover:underline block leading-tight">
                                {{ $berita->judul_berita }}
                            </a>
                            <p class="mt-1 text-xs sm:text-sm text-gray-400 leading-snug">
                                {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi_berita), 80) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>
@endsection
