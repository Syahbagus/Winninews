@extends('layouts.home')

@section('title', 'Profil Guest')

@section('content')
    <main class="container mx-auto py-16 text-white">
        <div class="max-w-md mx-auto bg-zinc-900 rounded-lg shadow-lg p-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold">Profil Saya</h2>
            </div>

            @if (session('success'))
                <div class="bg-green-600 text-white text-sm p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="text-red-500 text-sm mb-4">
                    <ul class="list-disc ml-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('guest.profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                {{-- Foto profil sekarang --}}
                <div class="text-center">
                    <img id="preview-foto" src="{{ $guest->profile_picture_url }}"
                        class="w-24 h-24 mx-auto rounded-full object-cover mb-4">
                </div>

                <div>
                    <label for="name" class="block text-sm font-medium">Nama</label>
                    <input id="name" name="name" value="{{ old('name', $guest->name) }}" required
                        class="w-full px-3 py-2 bg-zinc-800 border border-zinc-700 rounded-md">
                </div>

                <div>
                    <label for="username" class="block text-sm font-medium">Username</label>
                    <input id="username" name="username" value="{{ old('username', $guest->username) }}" required
                        class="w-full px-3 py-2 bg-zinc-800 border border-zinc-700 rounded-md">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input id="email" name="email" value="{{ old('email', $guest->email) }}" required
                        class="w-full px-3 py-2 bg-zinc-800 border border-zinc-700 rounded-md">
                </div>

                <div>
                    <label for="foto_guest" class="block text-sm font-medium">Foto Profil Baru</label>
                    <input type="file" id="foto_guest" name="foto_guest" accept="image/*" class="w-full text-white mt-1"
                        onchange="previewFoto(event)">
                </div>

                <button type="submit"
                    class="w-full bg-pink-600 hover:bg-pink-700 text-white font-semibold py-2 rounded-md">
                    Simpan Perubahan
                </button>
                <a href="{{ route('landing') }}"
                    class="block text-center w-[50%] mx-auto items-center bg-red-600 hover:bg-red-700 text-white font-semibold py-2 mt-3 rounded-md">
                    Kembali
                </a>
            </form>
        </div>
    </main>
@endsection
