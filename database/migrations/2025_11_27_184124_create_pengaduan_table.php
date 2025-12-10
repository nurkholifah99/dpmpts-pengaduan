<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik', 16); // Removed unique to allow duplicates
            $table->string('email');
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('subjek_pengaduan');
            $table->text('isi_pengaduan');
            $table->json('lampiran')->nullable(); // array path file
            $table->enum('status', ['menunggu','verifikasi','rekomendasi','tindak_lanjut','selesai'])
                  ->default('menunggu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};