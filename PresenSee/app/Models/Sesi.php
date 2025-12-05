<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    use HasFactory;

    protected $table = 'sesi';
    protected $primaryKey = 'id_sesi';

    protected $fillable = [
        'id_mapel_kelas',
        'id_guru',
        'tanggal_sesi',
        
    ];

    protected $casts = [
        'tanggal_sesi' => 'date',
    ];

    public function mapelKelas()
    {
        return $this->belongsTo(MapelKelas::class, 'id_mapel_kelas', 'id_mapel_kelas');
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'id_sesi', 'id_sesi');
    }
}