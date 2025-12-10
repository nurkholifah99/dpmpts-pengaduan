<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dpmptsp_portal', function (Blueprint $table) {
            $table->id();

            // Data pelapor
            $table->string('kode_pengaduan')->unique();
            $table->string('nama_pelapor');
            $table->string('nik', 20);
            $table->string('email')->nullable();
            $table->string('nomor_hp', 20)->nullable();
            $table->string('alamat')->nullable();

            // Detail pengaduan
            $table->string('kategori_pengaduan');
            $table->string('judul_pengaduan');
            $table->text('isi_pengaduan');
            $table->string('lampiran')->nullable();

            // Status proses
            $table->enum('status', ['menunggu', 'diproses', 'selesai'])->default('menunggu');

            // Tindak lanjut admin
            $table->text('tanggapan')->nullable();
            $table->unsignedBigInteger('petugas_id')->nullable(); // tanpa foreign key dulu
            $table->date('tanggal_selesai')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dpmptsp_portal');
    }
};
