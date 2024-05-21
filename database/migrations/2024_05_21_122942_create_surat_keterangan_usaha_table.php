<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeteranganUsahaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat_keterangan_usaha', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // tambahan user_id
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nik');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('status_kawin', ['Belum Menikah', 'Menikah', 'Duda', 'Janda']);
            $table->text('alamat');
            $table->string('usaha');
            $table->string('lokasi');
            $table->string('lama_usaha');
            $table->text('keterangan_usaha');
            $table->string('berkas_persyaratan');
            $table->enum('status', ['Data Sedang Diperiksa', 'Penandatanganan', 'Selesai', 'Ditolak'])->default('Data Sedang Diperiksa');
            $table->string('keterangan')->default('Menunggu Konfirmasi');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // tambahan relasi ke tabel users
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keterangan_usaha');
    }
}
