<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapelKelas extends Model
{
    use HasFactory;

    protected $table = 'mapel_kelas';
    protected $primaryKey = 'id_mapel_kelas';

    protected $fillable = [
        'id_mapel',
        'id_kelas',
        'id_guru',
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel', 'id_mapel');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    public function guru()
    {
        return $this->belongsTo(User::class, 'id_guru', 'id_user');
    }

    public function sesi()
    {
        return $this->hasMany(Sesi::class, 'id_mapel_kelas', 'id_mapel_kelas');
    }
}