<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Sesi;
use App\Models\MapelKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    /**
     * Dashboard Guru
     */
    public function dashboard()
    {
        $guru = Auth::user();
        
        // Data statistik untuk dashboard guru
        $data = [
            'total_kelas' => MapelKelas::where('id_guru', $guru->id_user)->count(),
            'sesi_hari_ini' => Sesi::where('id_guru', $guru->id_user)
                ->whereDate('tanggal_sesi', today())
                ->count(),
            'total_sesi_bulan_ini' => Sesi::where('id_guru', $guru->id_user)
                ->whereMonth('tanggal_sesi', now()->month)
                ->count(),
        ];

        return view('guru.dashboard', $data);
    }

    /**
     * Halaman Sesi Presensi
     */
    public function sesiPresensi()
    {
        $guru = Auth::user();
        
        $sesi = Sesi::where('id_guru', $guru->id_user)
            ->with(['mapelKelas.kelas', 'mapelKelas.mapel'])
            ->orderBy('tanggal_sesi', 'desc')
            ->get();

        return view('guru.sesi-presensi', compact('sesi'));
    }

    /**
     * Halaman Presensi Kamera (Face Recognition)
     */
    public function presensiKamera()
    {
        return view('guru.presensi-kamera');
    }

    /**
     * Halaman Daftar Kelas yang Diampu
     */
    public function daftarKelas()
    {
        $guru = Auth::user();
        
        $kelas = MapelKelas::where('id_guru', $guru->id_user)
            ->with(['kelas', 'mapel'])
            ->get();

        return view('guru.daftar-kelas', compact('kelas'));
    }

    /**
     * Halaman Wali Kelas
     */
    public function waliKelas()
    {
        $guru = Auth::user();
        
        // Ambil kelas yang diampu sebagai wali kelas
        // Asumsi: ada relasi atau field di tabel kelas untuk wali kelas
        
        return view('guru.wali-kelas');
    }

    /**
     * Halaman Pengaturan Profil Guru
     */
    public function pengaturan()
    {
        $guru = Auth::user();
        
        return view('guru.pengaturan', compact('guru'));
    }
}