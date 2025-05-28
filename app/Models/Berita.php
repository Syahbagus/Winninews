<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_berita',
        'slug',
        'isi_berita',
        'gambar_berita',
        'kategori',
        'tanggal_berita',
        'admin_id',
        'trending',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    protected static function booted()
    {
        static::creating(function ($berita) {
            $slug = Str::slug($berita->judul_berita);
            $originalSlug = $slug;
            $count = 1;

            while (Berita::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }

            $berita->slug = $slug;
        });

        static::updating(function ($berita) {
            if ($berita->isDirty('judul_berita')) {
                $slug = Str::slug($berita->judul_berita);
                $originalSlug = $slug;
                $count = 1;

                while (Berita::where('slug', $slug)->where('id', '!=', $berita->id)->exists()) {
                    $slug = $originalSlug . '-' . $count++;
                }

                $berita->slug = $slug;
            }
        });
    }
}
