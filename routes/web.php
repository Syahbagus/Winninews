<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\GuestAuthController;
use App\Http\Controllers\KomentarController;

// Route untuk Landing Controller
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Route untuk Filter Kategori
Route::get('/kategori/{kategori}', [LandingController::class, 'filterKategori']);

// Route untuk News Controller
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Route untuk Search Controller
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Route login dan logout guest
Route::get('/guest/login', [GuestAuthController::class, 'showLoginForm'])->name('guest.login');
Route::post('/guest/login', [GuestAuthController::class, 'login']);
Route::post('/guest/logout', [GuestAuthController::class, 'logout'])->name('guest.logout');

Route::get('/login', function () {
    return view('auth.guest-login');
})->name('guest.login.form');

// Route yang hanya bisa diakses kalau guest sudah login
Route::middleware('auth:guest')->group(function () {
    Route::get('/guest/dashboard', function () {
        return view('guest.dashboard');
    })->name('guest.dashboard');
});

// Route registrasi guest
Route::get('/guest/register', [GuestAuthController::class, 'showRegisterForm'])->name('guest.register.form');
Route::post('/guest/register', [GuestAuthController::class, 'register'])->name('guest.register');

// Route untuk Guest Profile
Route::middleware('auth:guest')->group(function () {
    Route::get('/guest/profile', [GuestAuthController::class, 'showProfile'])->name('guest.profile');
    Route::post('/guest/profile', [GuestAuthController::class, 'updateProfile'])->name('guest.profile.update');
    Route::delete('/guest/profile/photo/delete', [GuestAuthController::class, 'deletePhoto'])->name('guest.profile.photo.delete');
});

//Route Komentar
Route::middleware('auth:guest')->group(function () {
    Route::post('/berita/{berita}/komentar', [KomentarController::class, 'store'])->name('komentar.store');
});
