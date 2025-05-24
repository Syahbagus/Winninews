<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class NewsController extends Controller
{
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->first();
        $berita_terbaru = Berita::orderBy('created_at', 'desc')->take(4)->get();

        return view('pages.news.show', compact('berita', 'berita_terbaru'));
    }
}
