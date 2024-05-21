<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
    use HasFactory;

    protected $table = 'kematian';

    protected $guarded = [];

    protected $fillable = [
        'user_id', 'nama', 'bin_binti', 'nik', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 
        'status_pernikahan', 'pekerjaan', 'alamat', 'tanggal_meninggal', 'jam_meninggal', 
        'tempat_meninggal', 'sebab_meninggal', 'berkas_persyaratan', 'status', 'keterangan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
