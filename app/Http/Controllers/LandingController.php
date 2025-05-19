<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $news = Berita::orderBy('created_at', 'desc')->get()->take(4);
        return view('pages.landing', compact('news'));
    }
}
