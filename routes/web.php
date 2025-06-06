<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SearchController;

// Route untuk Landing Controller
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Route untuk Filter Kategori
Route::get('/kategori/{kategori}', [LandingController::class, 'filterKategori']);

// Route untuk News Controller
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Route untuk Search Controller
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Route::get('/', function () {
//     return view('home');
// })->name('home');

// Route::get('/news/{slug}', function () {
//     return view('newsPage');
// });
