<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sktm', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // Data Pemohon
            $table->string('nama');
            $table->string('nik', 16);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('pekerjaan');
            $table->text('alamat');
            // Data Orang Tua
            $table->string('nama_orang_tua');
            $table->string('nik_orang_tua', 16);
            $table->string('pekerjaan_orang_tua');
            $table->integer('umur_orang_tua');
            $table->text('alamat_orang_tua');
            // Keperluan
            $table->string('keperluan');
            // Verifikasi
            $table->string('berkas_kk');
            $table->string('berkas_ktp');
            $table->string('berkas_pengantar_rt');
            $table->enum('status', ['Data Sedang Diperiksa', 'Penandatanganan', 'Selesai', 'Ditolak'])->default('Data Sedang Diperiksa');
            $table->string('keterangan')->default('Menunggu Konfirmasi');
            $table->string('nomor_surat')->default('belum ada');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sktm');
    }
};
