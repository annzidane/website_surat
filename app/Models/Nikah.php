<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nikah extends Model
{
    use HasFactory;

    protected $table = 'nikah';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'kewarganegaraan',
        'agama',
        'pekerjaan',
        'alamat',
        'nomor_kk',
        'nik',
        'foto_ktp',
        'surat_pernyataan',
        'status',
        'keterangan',
        'nomor_surat',
    ];

    protected $attributes = [
        'status' => 'Data Sedang Diperiksa',
        'keterangan' => 'Menunggu Konfirmasi',
        'nomor_surat' => 'belum ada',
    ];

    /**
     * Get the user that owns the SuratKeteranganUsaha.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
