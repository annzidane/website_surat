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
        Schema::create('kelahiran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); 

            //anak
            $table->string('nama_anak');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('tempat_dilahirkan', ['RS', 'Puskesmas', 'Polindes', 'Rumah', 'lainnya']);
            $table->string('tempat_kelahiran');
            $table->string('hari', 10);
            $table->date('tanggal_lahir');
            $table->time('jam');
            $table->enum('jenis_kelahiran', ['Tunggal', 'Kembar 2', 'Kembar 3', 'Kembar 4', 'lainnya']);
            $table->string('kelahiran', 10);
            $table->enum('penolong_kelahiran', ['Dokter', 'Bidan/Perawat', 'Dukun', 'lainnya']);
            $table->float('berat_bayi', 8, 2); // Contoh: angka total maksimum 8 digit, dengan 2 digit setelah titik desimal
            $table->float('panjang_bayi', 8, 2); // Angka total maksimum 8 digit, dengan 2 digit setelah titik desimal
            $table->string('surat_keterangan_lahir');

            // Tabel ibu
            $table->string('nik_ibu');
            $table->string('nama_ibu');
            $table->date('tanggal_lahir_ibu');
            $table->integer('umur_ibu');
            $table->string('pekerjaan_ibu'); // Tambahan _ibu di belakang
            $table->text('alamat_ibu'); // Tambahan _ibu di belakang
            $table->enum('kewarganegaraan_ibu', ['WNI', 'WNA']); // Tambahan _ibu di belakang
            $table->string('kebangsaan_ibu'); // Tambahan _ibu di belakang
            $table->date('tanggal_pernikahan');
            $table->string('berkas_ktp_ibu');

            // Tabel ayah
            $table->string('nik_ayah');
            $table->string('nama_ayah');
            $table->date('tanggal_lahir_ayah');
            $table->integer('umur_ayah');
            $table->string('pekerjaan_ayah'); // Tambahan _ayah di belakang
            $table->text('alamat_ayah'); // Tambahan _ayah di belakang
            $table->enum('kewarganegaraan_ayah', ['WNI', 'WNA']); // Tambahan _ayah di belakang
            $table->string('kebangsaan_ayah'); // Tambahan _ayah di belakang
            $table->string('berkas_ktp_ayah');

            // Tabel pelapor
            $table->string('nik_pelapor')->nullable(); // NIK pelapor
            $table->string('nama_pelapor')->nullable(); // Nama pelapor
            $table->integer('umur_pelapor')->nullable(); // Umur pelapor
            $table->string('jenis_kelamin_pelapor')->nullable();
            $table->string('pekerjaan_pelapor')->nullable(); // Pekerjaan pelapor
            $table->text('alamat_pelapor')->nullable(); // Alamat pelapor

            // Tabel saksi
            $table->string('nik_saksi1')->nullable(); // NIK saksi 1
            $table->string('nama_saksi1')->nullable(); // Nama saksi 1
            $table->integer('umur_saksi1')->nullable(); // Umur saksi 1
            $table->string('pekerjaan_saksi1')->nullable(); // Pekerjaan saksi 1
            $table->text('alamat_saksi1')->nullable(); // Alamat saksi 1

            $table->string('nik_saksi2')->nullable(); // NIK saksi 2
            $table->string('nama_saksi2')->nullable(); // Nama saksi 2
            $table->integer('umur_saksi2')->nullable(); // Umur saksi 2
            $table->string('pekerjaan_saksi2')->nullable(); // Pekerjaan saksi 2
            $table->text('alamat_saksi2')->nullable(); // Alamat saksi 2

            $table->string('berkas_kk');
            $table->enum('status', ['Data Sedang Diperiksa', 'Penandatanganan', 'Selesai', 'Ditolak'])->default('Data Sedang Diperiksa');
            $table->string('keterangan')->default('Menunggu Konfirmasi');
            $table->string('nomor_surat')->default('belum ada');
            $table->string('surat_kelahiran')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelahiran');
    }
};
