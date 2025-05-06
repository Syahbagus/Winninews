<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $fillable = [
        'isi_komentar',
        'tanggal_komentar',
        'guest_id',
        'berita_id',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_komentar' => 'date',
        ];
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function berita()
    {
        return $this->belongsTo(Berita::class);
    }
}
