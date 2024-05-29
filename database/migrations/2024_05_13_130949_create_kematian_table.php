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
        Schema::create('kematian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // tambahan user_id
            $table->string('nama');
            $table->string('bin_binti');
            $table->string('nik');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('status_pernikahan', ['Belum Menikah', 'Menikah', 'Cerai Mati', 'Cerai Hidup']);
            $table->string('pekerjaan');
            $table->text('alamat');
            $table->date('tanggal_meninggal');
            $table->time('jam_meninggal'); // tambahan jam_meninggal
            $table->string('tempat_meninggal');
            $table->string('sebab_meninggal');
            $table->string('nama_pelapor');
            $table->string('nik_pelapor');
            $table->date('tanggal_lahir_pelapor');
            $table->string('pekerjaan_pelapor');
            $table->string('alamat_pelapor');
            $table->string('hubungan_pelapor');
            $table->string('berkas_ktp');
            $table->string('berkas_kk');
            $table->string('berkas_surat_kematian')->nullable();
            $table->enum('status', ['Data Sedang Diperiksa', 'Penandatanganan', 'Selesai', 'Ditolak'])->default('Data Sedang Diperiksa');
            $table->string('keterangan')->default('Menunggu Konfirmasi');
            $table->string('nomor_surat')->default('belum ada');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // tambahan relasi ke tabel users
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kematian');
    }
};
