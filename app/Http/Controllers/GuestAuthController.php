<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Guest;

class GuestAuthController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        // Simpan URL sebelumnya (kecuali jika halaman login itu sendiri)
        if (!str_contains(url()->previous(), 'guest/login')) {
            session(['url.intended.guest' => url()->previous()]);
        }

        return view('auth.guest-login');
    }

    // Proses login guest
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::guard('guest')->attempt([$loginType => $request->login, 'password' => $request->password], $request->remember)) {
            $request->session()->regenerate();

            // Redirect ke halaman sebelumnya atau landing
            return redirect(session('url.intended.guest', route('landing')));
        }

        return back()->withErrors([
            'login' => 'Email atau username atau password salah.',
        ]);
    }

    // Logout guest
    public function logout(Request $request)
    {
        Auth::guard('guest')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/guest/login');
    }

    // Tampilkan form registrasi
    public function showRegisterForm()
    {
        // Simpan URL sebelumnya
        if (!str_contains(url()->previous(), 'guest/register')) {
            session(['url.intended.guest' => url()->previous()]);
        }

        return view('auth.guest-register');
    }

    // Proses registrasi guest
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:guests',
            'email' => 'required|string|email|max:255|unique:guests',
            'password' => 'required|string|min:6|confirmed',
            'foto_guest' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto_guest')) {
            $fotoPath = $request->file('foto_guest')->store('guest-photos', 'public');
        }

        $guest = Guest::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'foto_guest' => $fotoPath,
        ]);

        Auth::guard('guest')->login($guest);

        return redirect(session('url.intended.guest', route('landing')))
            ->with('success', 'Registrasi berhasil. Selamat datang!');
    }

    // Tampilkan halaman profil guest
    public function showProfile()
    {
        $guest = Auth::guard('guest')->user();
        return view('auth.guest-profile', compact('guest'));
    }

    // Proses update profil guest
    public function updateProfile(Request $request)
    {
        /** @var \App\Models\Guest $guest */
        $guest = Auth::guard('guest')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:guests,username,' . $guest->id,
            'email' => 'required|email|max:255|unique:guests,email,' . $guest->id,
            'foto_guest' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto_guest')) {
            if ($guest->foto_guest) {
                Storage::disk('public')->delete($guest->foto_guest);
            }
            $guest->foto_guest = $request->file('foto_guest')->store('guest-photos', 'public');
        }

        $guest->name = $request->name;
        $guest->username = $request->username;
        $guest->email = $request->email;
        $guest->save();

        return redirect()->route('guest.profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
