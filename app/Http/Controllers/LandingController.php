<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LandingController extends Controller
{
    private function getCommonData($kategori = null)
    {
        $berita_terbaru = Berita::orderBy('created_at', 'desc')->take(4)->get();
        $trendings = Berita::where('trending', true)->get();
        $kategori_list = Berita::select('kategori')->distinct()->pluck('kategori');

        $semua_berita = $kategori
            ? Berita::where('kategori', $kategori)->orderBy('created_at', 'desc')->get()
            : Berita::orderBy('created_at', 'desc')->get();

        $berita_paginated = $kategori
            ? Berita::where('kategori', $kategori)->orderBy('created_at', 'desc')->paginate(9)
            : Berita::orderBy('created_at', 'desc')->paginate(9);

        return compact('berita_terbaru', 'trendings', 'kategori_list', 'semua_berita', 'berita_paginated');
    }

    public function index()
    {
        Carbon::setLocale('id'); // Set locale ke Bahasa Indonesia
        return view('pages.landing', $this->getCommonData());
    }

    public function filterKategori($kategori)
    {
        Carbon::setLocale('id');
        return view('pages.landing', $this->getCommonData($kategori));
    }
}
