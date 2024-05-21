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
            $table->enum('status_pernikahan', ['Belum Menikah', 'Menikah', 'Duda', 'Janda']);
            $table->string('pekerjaan');
            $table->text('alamat');
            $table->date('tanggal_meninggal');
            $table->time('jam_meninggal'); // tambahan jam_meninggal
            $table->string('tempat_meninggal');
            $table->string('sebab_meninggal');
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
        Schema::dropIfExists('kematian');
    }
};
