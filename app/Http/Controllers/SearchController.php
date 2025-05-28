<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        $results = Berita::where('judul_berita', 'like', "%{$query}%")
            ->orWhere('isi_berita', 'like', "%{$query}%")
            ->get();

        return view('pages.search.results', compact('query', 'results'));
    }
}
