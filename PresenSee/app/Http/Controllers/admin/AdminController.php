<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Presensi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Dashboard Admin
     */
    public function dashboard()
    {
        // Data statistik untuk dashboard
        $data = [
            'total_guru' => User::where('role', 'guru')->count(),
            'total_siswa' => Siswa::count(),
            'total_kelas' => Kelas::count(),
            'total_presensi_hari_ini' => Presensi::whereDate('created_at', today())->count(),
        ];

        return view('admin.dashboard', $data);
    }

    /**
     * Halaman Data Guru
     */
    public function guru()
    {
        $guru = User::where('role', 'guru')->get();
        
        return view('admin.guru', compact('guru'));
    }

    /**
     * Halaman Data Siswa
     */
    public function siswa()
    {
        $siswa = Siswa::with('kelas')->get();
        
        return view('admin.siswa', compact('siswa'));
    }

    /**
     * Halaman Kelas & Jadwal
     */
    public function kelasJadwal()
    {
        $kelas = Kelas::with('siswa')->get();
        
        return view('admin.kelas-jadwal', compact('kelas'));
    }

    /**
     * Halaman Laporan
     */
    public function laporan()
    {
        return view('admin.laporan');
    }

    /**
     * Halaman Pengaturan
     */
    public function pengaturan()
    {
        return view('admin.pengaturan');
    }
}