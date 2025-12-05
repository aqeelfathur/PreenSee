<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'nama_user' => 'Administrator',
            'email_user' => 'admin@presensee.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'status' => 'Aktif',
        ]);

        // Guru 1
        User::create([
            'nama_user' => 'Budi Santoso',
            'email_user' => 'budi@presensee.com',
            'password' => Hash::make('guru123'),
            'role' => 'guru',
            'status' => 'Aktif',
        ]);

        // Guru 2
        User::create([
            'nama_user' => 'Siti Aminah',
            'email_user' => 'siti@presensee.com',
            'password' => Hash::make('guru123'),
            'role' => 'guru',
            'status' => 'Aktif',
        ]);

        // Guru 3 (Cuti)
        User::create([
            'nama_user' => 'Ahmad Hidayat',
            'email_user' => 'ahmad@presensee.com',
            'password' => Hash::make('guru123'),
            'role' => 'guru',
            'status' => 'Cuti',
        ]);
    }
}