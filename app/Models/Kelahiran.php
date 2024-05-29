<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelahiran extends Model
{
    use HasFactory;

    protected $table = 'kelahiran';

    protected $fillable = [
        'user_id',
        'nama_anak',
        'jenis_kelamin',
        'tempat_dilahirkan',
        'tempat_kelahiran',
        'hari',
        'tanggal_lahir',
        'jam',
        'jenis_kelahiran',
        'kelahiran',
        'penolong_kelahiran',
        'berat_bayi',
        'panjang_bayi',
        'surat_keterangan_lahir',
        'nik_ibu',
        'nama_ibu',
        'tanggal_lahir_ibu',
        'umur_ibu',
        'pekerjaan_ibu',
        'alamat_ibu',
        'kewarganegaraan_ibu',
        'kebangsaan_ibu',
        'tanggal_pernikahan',
        'berkas_ktp_ibu',
        'nik_ayah',
        'nama_ayah',
        'tanggal_lahir_ayah',
        'umur_ayah',
        'pekerjaan_ayah',
        'alamat_ayah',
        'kewarganegaraan_ayah',
        'kebangsaan_ayah',
        'berkas_ktp_ayah',
        'nik_pelapor',
        'nama_pelapor',
        'umur_pelapor',
        'jenis_kelamin_pelapor',
        'pekerjaan_pelapor',
        'alamat_pelapor',
        'nik_saksi1',
        'nama_saksi1',
        'umur_saksi1',
        'pekerjaan_saksi1',
        'alamat_saksi1',
        'nik_saksi2',
        'nama_saksi2',
        'umur_saksi2',
        'pekerjaan_saksi2',
        'alamat_saksi2',
        'berkas_persyaratan',
        'status',
        'keterangan',
        'nomor_surat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
