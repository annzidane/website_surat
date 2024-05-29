<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    use HasFactory;

    protected $table = 'usaha';

    protected $fillable = [
        'nama', 
        'tempat_lahir', 
        'tanggal_lahir', 
        'nik', 
        'jenis_kelamin', 
        'status_pernikahan', 
        'alamat', 
        'usaha', 
        'lokasi', 
        'lama_usaha', 
        'berkas_ktp', 
        'berkas_kk',
        'bukti_usaha',
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
