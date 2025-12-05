<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'presensi';
    protected $primaryKey = 'id_presensi';

    protected $fillable = [
        'id_sesi',
        'id_siswa',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function sesi()
    {
        return $this->belongsTo(Sesi::class, 'id_sesi', 'id_sesi');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }

    // Helper method untuk cek status
    public function isHadir()
    {
        return $this->status === 'presensi';
    }

    public function isTidakHadir()
    {
        return $this->status === 'tidak';
    }
}