<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

// Route::get('/', function () {
//     return view('home');
// })->name('home');

// Ini hanya sementara
// Route::get('/', function () {
//     return view('app');
// })->name('app');

Route::get('/news/{slug}', function () {
    return view('newsPage');
});
