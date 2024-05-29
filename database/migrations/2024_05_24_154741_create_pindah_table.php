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
        Schema::create('pindah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // Data Daerah Asal
            $table->string('nomor_kk');
            $table->string('nama_kepala_keluarga');
            $table->text('alamat');
            $table->string('kode_pos')->nullable();
            $table->string('telepon')->nullable();
            $table->string('nik_pemohon');
            $table->string('nama_lengkap_pemohon');
            // Data Daerah Tujuan
            $table->enum('status_kk', ["Numpang KK", "Membuat KK Baru", "Nomor KK Tetap"]);
            $table->string('nomor_kk_tujuan');
            $table->string('nik_kepala_keluarga_tujuan');
            $table->string('nama_kepala_keluarga_tujuan');
            $table->date('tanggal_kedatangan');
            $table->text('alamat_tujuan');
            // Anggota Keluarga yang Datang
            $table->string('nik_keluarga_datang');
            $table->string('nama_keluarga_datang');
            $table->date('masa_berlaku_ktp')->nullable();
            $table->enum('shdk', ['Kepala Keluarga','Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lain', 'Pembantu', 'Lainnya']);
            $table->string('berkas_ktp');
            // Kolom untuk anggota keluarga kedua dan seterusnya (nullable)
            $table->string('nik_keluarga_datang2')->nullable();
            $table->string('nama_keluarga_datang2')->nullable();
            $table->date('masa_berlaku_ktp2')->nullable();
            $table->enum('shdk2', ['Kepala Keluarga','Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lain', 'Pembantu', 'Lainnya'])->nullable();
            $table->string('berkas_ktp2')->nullable();

            $table->string('nik_keluarga_datang3')->nullable();
            $table->string('nama_keluarga_datang3')->nullable();
            $table->date('masa_berlaku_ktp3')->nullable();
            $table->enum('shdk3', ['Kepala Keluarga','Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lain', 'Pembantu', 'Lainnya'])->nullable();
            $table->string('berkas_ktp3')->nullable();

            $table->string('nik_keluarga_datang4')->nullable();
            $table->string('nama_keluarga_datang4')->nullable();
            $table->date('masa_berlaku_ktp4')->nullable();
            $table->enum('shdk4', ['Kepala Keluarga','Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lain', 'Pembantu', 'Lainnya'])->nullable();
            $table->string('berkas_ktp4')->nullable();

            $table->string('nik_keluarga_datang5')->nullable();
            $table->string('nama_keluarga_datang5')->nullable();
            $table->date('masa_berlaku_ktp5')->nullable();
            $table->enum('shdk5', ['Kepala Keluarga','Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lain', 'Pembantu', 'Lainnya'])->nullable();
            $table->string('berkas_ktp5')->nullable();
            
            $table->string('nik_keluarga_datang6')->nullable();
            $table->string('nama_keluarga_datang6')->nullable();
            $table->date('masa_berlaku_ktp6')->nullable();
            $table->enum('shdk6', ['Kepala Keluarga','Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lain', 'Pembantu', 'Lainnya'])->nullable();
            $table->string('berkas_ktp6')->nullable();

            $table->string('berkas_kk');
            $table->string('berkas_pbb');
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
        Schema::dropIfExists('pindah');
    }
};
