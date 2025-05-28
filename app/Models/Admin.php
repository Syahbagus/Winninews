<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'password',
        'username',
        'namaAdmin',
        'email',
        'telp_admin',
        'foto_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function beritas()
    {
        return $this->hasMany(Berita::class);
    }

    //Check Super Admin
    public function isSuperAdmin(): bool
    {
        return $this->email === 'superadmin@winni.com';
    }

    // public function getAuthIdentifierName()
    // {
    //     return 'username';
    // }
}
