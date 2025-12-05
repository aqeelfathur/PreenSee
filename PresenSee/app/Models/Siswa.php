<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';

    protected $fillable = [
        'nis',
        'nama_siswa',
        'no_handphone_siswa',
        'email_siswa',
        'tanggal_lahir_siswa',
        'nama_walimurid',
        'no_handphone_walimurid',
        'foto_siswa',
        'status',
    ];

    protected $casts = [
        'tanggal_lahir_siswa' => 'date',
    ];

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'id_siswa', 'id_siswa');
    }
}