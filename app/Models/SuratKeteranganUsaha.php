<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeteranganUsaha extends Model
{
    use HasFactory;

    protected $table = 'surat_keterangan_usaha';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'nik',
        'jenis_kelamin',
        'status_kawin',
        'alamat',
        'usaha',
        'lokasi',
        'lama_usaha',
        'keterangan_usaha',
        'berkas_persyaratan',
        'status',
        'keterangan',
    ];

    /**
     * Get the user that owns the SuratKeteranganUsaha.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
