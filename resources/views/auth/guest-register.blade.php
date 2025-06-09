@extends('layouts.home')

@section('title', 'Registrasi Guest')

@section('content')
    <main class="container mx-auto py-16 text-white">
        <div class="max-w-md mx-auto bg-zinc-900 rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-6 text-center">Registrasi sebagai Guest</h2>

            @if ($errors->any())
                <div class="text-red-500 text-sm mb-4">
                    <ul class="list-disc ml-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('guest.register') }}" class="space-y-6" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium">Nama</label>
                    <input id="name" type="text" name="name" required
                        class="w-full mt-1 px-3 py-2 bg-zinc-800 border border-zinc-700 rounded-md">
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium">Username</label>
                    <input id="username" type="text" name="username" required
                        class="w-full mt-1 px-3 py-2 bg-zinc-800 border border-zinc-700 rounded-md">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input id="email" type="email" name="email" required
                        class="w-full mt-1 px-3 py-2 bg-zinc-800 border border-zinc-700 rounded-md">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <input id="password" type="password" name="password" required
                        class="w-full mt-1 px-3 py-2 bg-zinc-800 border border-zinc-700 rounded-md">
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="w-full mt-1 px-3 py-2 bg-zinc-800 border border-zinc-700 rounded-md">
                </div>
                <div>
                    <label for="foto_guest" class="block text-sm font-medium">Foto Profil (Opsional)</label>
                    <input id="foto_guest" type="file" name="foto_guest" accept="image/*" class="w-full mt-1 text-white">
                </div>
                <button type="submit"
                    class="w-full bg-pink-600 hover:bg-pink-700 text-white font-semibold py-2 rounded-md">
                    Daftar
                </button>
            </form>
        </div>
    </main>
@endsection
