<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('komentars', function (Blueprint $table) {
            $table->id();
            $table->text('isi_komentar');
            $table->date('tanggal_komentar');

            $table->unsignedBigInteger('guest_id');
            $table->unsignedBigInteger('berita_id');

            $table->foreign('guest_id')->references('id')->on('guests')->onDelete('cascade');
            $table->foreign('berita_id')->references('id')->on('beritas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('komentars');
    }
};
