<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pindah extends Model
{
    use HasFactory;

    protected $table = 'pindah';

    protected $fillable = [
        'user_id',
        'nomor_kk',
        'nama_kepala_keluarga',
        'alamat',
        'kode_pos',
        'telepon',
        'nik_pemohon',
        'nama_lengkap_pemohon',
        'status_kk',
        'nomor_kk_tujuan',
        'nik_kepala_keluarga_tujuan',
        'nama_kepala_keluarga_tujuan',
        'tanggal_kedatangan',
        'alamat_tujuan',
        
        'nik_keluarga_datang',
        'nama_keluarga_datang',
        'masa_berlaku_ktp',
        'shdk',
        'berkas_ktp',

        'nik_keluarga_datang2',
        'nama_keluarga_datang2',
        'masa_berlaku_ktp2',
        'shdk2',
        'berkas_ktp2',

        'nik_keluarga_datang3',
        'nama_keluarga_datang3',
        'masa_berlaku_ktp3',
        'shdk3',
        'berkas_ktp3',

        'nik_keluarga_datang4',
        'nama_keluarga_datang4',
        'masa_berlaku_ktp4',
        'shdk4',
        'berkas_ktp4',

        'nik_keluarga_datang5',
        'nama_keluarga_datang5',
        'masa_berlaku_ktp5',
        'shdk5',
        'berkas_ktp5',

        'nik_keluarga_datang6',
        'nama_keluarga_datang6',
        'masa_berlaku_ktp6',
        'shdk6',
        'berkas_ktp6',

        'berkas_kk',
        'berkas_pbb',
        'status',
        'keterangan',
        'nomor_surat',
        'surat_pindah',
    ];

    /**
     * Get the user that owns the Pindah
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
