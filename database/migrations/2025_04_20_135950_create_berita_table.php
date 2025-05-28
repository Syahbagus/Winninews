<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul_berita', 255);
            $table->string('slug')->unique();
            $table->text('isi_berita');
            $table->string('gambar_berita')->nullable();
            $table->string('kategori')->nullable();
            $table->date('tanggal_berita');

            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
