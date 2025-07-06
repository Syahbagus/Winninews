@extends('layouts.home')

@section('title', 'Login Guest')

@section('content')
    <main class="container mx-auto py-16 text-white">
        <div class="max-w-md mx-auto bg-zinc-900 rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-6 text-center">Login sebagai Guest</h2>

            @if (session('error'))
                <div class="text-red-500 text-sm mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('guest.login') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="login" class="block text-sm font-medium">Email atau Username</label>
                    <input type="text" id="login" name="login" required
                        class="w-full mt-1 px-3 py-2 bg-zinc-800 border border-zinc-700 rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full mt-1 px-3 py-2 bg-zinc-800 border border-zinc-700 rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500">
                    @if ($errors->any())
                        <div class="mb-4">
                            <div class="font-medium text-red-600">
                                {{ __('Whoops! Something went wrong.') }}
                            </div>

                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <button type="submit"
                    class="w-full bg-pink-600 hover:bg-pink-700 text-white font-semibold py-2 rounded-md">
                    Login
                </button>
            </form>

            <p class="mt-4 text-center text-sm">
                Belum punya akun? <a href="{{ route('guest.register.form') }}" class="text-pink-500 hover:underline">Daftar
                    di sini</a>
            </p>
        </div>
    </main>
@endsection
