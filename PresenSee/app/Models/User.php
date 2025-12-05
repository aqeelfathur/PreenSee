<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama_user',
        'email_user',
        'password',
        'role',
        'status',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'role' => 'string',
        'status' => 'string',
    ];

    public function mapelKelas()
    {
        return $this->hasMany(MapelKelas::class, 'id_guru', 'id_user');
    }

    // Helper method untuk cek role
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isGuru()
    {
        return $this->role === 'guru';
    }

    public function isAktif()
    {
        return $this->status === 'Aktif';
    }
}