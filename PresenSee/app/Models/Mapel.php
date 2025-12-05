<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapel';
    protected $primaryKey = 'id_mapel';

    protected $fillable = [
        'nama_mapel',
    ];

    public function mapelKelas()
    {
        return $this->hasMany(MapelKelas::class, 'id_mapel', 'id_mapel');
    }
}