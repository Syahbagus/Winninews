<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class KomentarController extends Controller
{
    public function store(Request $request, Berita $berita)
    {
        $request->validate([
            'isi_komentar' => 'required|string|max:1000',
        ]);

        $berita->komentars()->create([
            'guest_id' => Auth::guard('guest')->id(),
            'isi_komentar' => $request->isi_komentar,
            'tanggal_komentar' => Carbon::now(),
        ]);

        return redirect()->to(url()->previous() . '#daftar-komentar')->with('success', 'Komentar berhasil dikirim!');
    }
}
