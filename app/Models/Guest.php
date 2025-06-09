<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guest extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'foto_guest',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }

    public function getProfilePictureUrlAttribute()
    {
        if ($this->foto_guest) {
            return asset('storage/' . $this->foto_guest);
        }

        return asset('img/default-guest.png');
    }
}
