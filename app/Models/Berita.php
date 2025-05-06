<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_berita',
        'isi_berita',
        'gambar_berita',
        'kategori',
        'tanggal_berita',
        'admin_id',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_berita' => 'date',
        ];
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }
}
