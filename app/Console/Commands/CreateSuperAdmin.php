<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class CreateSuperAdmin extends Command
{
    /**
     * Nama dan signature dari command.
     * @var string
     */
    protected $signature = 'app:create-superadmin';

    /**
     * Deskripsi dari command.
     * @var string
     */
    protected $description = 'Membuat akun superadmin default untuk panel Filament';

    /**
     * Eksekusi command.
     */
    public function handle()
    {
        $superAdminEmail = 'superadmin@winni.com';
        $defaultPassword = 'password';

        // 1. Cek apakah superadmin sudah ada
        if (Admin::where('email', $superAdminEmail)->exists()) {
            $this->warn("Akun superadmin dengan email <comment>{$superAdminEmail}</comment> sudah ada.");
            $this->info("Login menggunakan kredensial yang sudah ada atau hapus manual dari database jika ingin membuat ulang.");
            return 1; // Keluar dari command
        }

        // 2. Jika belum ada, buat superadmin baru
        try {
            Admin::create([
                'name' => 'Super Admin',
                'username' => 'superadmin',
                'email' => $superAdminEmail,
                'password' => Hash::make($defaultPassword),
                'telp_admin' => '0000000000', // Nomor telepon placeholder
            ]);

            $this->info('✅ Akun Superadmin berhasil dibuat!');
            $this->comment('Anda sekarang bisa login ke panel /admin menggunakan kredensial berikut:');

            $this->table(
                ['Field', 'Value'],
                [
                    ['Email', $superAdminEmail],
                    ['Password', $defaultPassword],
                ]
            );
        } catch (\Exception $e) {
            $this->error('Terjadi kesalahan saat membuat superadmin.');
            $this->error($e->getMessage());
            return 1;
        }

        return 0;
    }
}
