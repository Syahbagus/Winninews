<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Guest;
use Illuminate\Support\Facades\Hash;

class GuestLoginWhiteBoxTest extends TestCase
{
    use RefreshDatabase;

    public function test_jalur_sukses_autentikasi(): void
    {
        // Arrange
        $guest = Guest::create([
            'name' => 'User Sukses',
            'username' => 'usersukses',
            'email' => 'sukses@test.com',
            'password' => Hash::make('password_benar_123'),
        ]);

        $response = $this->post(route('guest.login'), [
            'login' => 'sukses@test.com',
            'password' => 'password_benar_123',
        ]);

        // Assert
        $this->assertAuthenticatedAs($guest, 'guest');
        $response->assertRedirect('/');
    }

    public function test_jalur_gagal_autentikasi(): void
    {
        // Arrange
        $guest = Guest::create([
            'name' => 'User Gagal',
            'username' => 'usergagal',
            'email' => 'gagal@test.com',
            'password' => Hash::make('password_benar_123'),
        ]);

        // Act: Kirim request dengan field 'login'
        $response = $this->post(route('guest.login'), [
            'login' => 'gagal@test.com',
            'password' => 'passwordsalah',
        ]);

        // Assert
        $this->assertGuest('guest');
        $response->assertSessionHasErrors('login');
    }
}
