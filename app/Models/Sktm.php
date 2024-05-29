<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sktm extends Model
{
    use HasFactory;

    protected $table = 'sktm';

    protected $fillable = [
        'user_id',
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pekerjaan',
        'alamat',
        'nama_orang_tua',
        'nik_orang_tua',
        'pekerjaan_orang_tua',
        'umur_orang_tua',
        'alamat_orang_tua',
        'keperluan',
        'berkas_ktp',
        'berkas_kk',
        'berkas_pengantar_rt',
        'status',
        'keterangan',
        'nomor_surat',
    ];

    /**
     * Get the user that owns the Sktm
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
