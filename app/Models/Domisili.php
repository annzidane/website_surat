<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domisili extends Model
{
    use HasFactory;

    protected $table = 'domisili';

    protected $fillable = [
        'nama', 
        'tempat_lahir', 
        'tanggal_lahir', 
        'nik', 
        'jenis_kelamin', 
        'kewarganegaraan',
        'status_pernikahan', 
        'alamat_ktp', 
        'keterangan_domisili',
        'berkas_persyaratan', 
        'status', 
        'keterangan', 
        'nomor_surat'
    ];

    /**
     * Get the user that owns the SuratKeteranganUsaha.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
