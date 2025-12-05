<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Sesi;
use App\Models\MapelKelas;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GuruController extends Controller
{
    /**
     * Dashboard Guru
     */
    public function dashboard()
    {
        $guru = Auth::user();
        
        // Hitung statistik hari ini
        $today = Carbon::today();
        
        $totalKelas = MapelKelas::where('id_guru', $guru->id_user)->count();
        
        $sesiHariIni = Sesi::whereHas('mapelKelas', function($query) use ($guru) {
            $query->where('id_guru', $guru->id_user);
        })->whereDate('tanggal_sesi', $today)->count();
        
        $siswaAktif = DB::table('siswa')
            ->where('status', 'Aktif')
            ->count();
        
        // Sesi yang sedang berlangsung
        $sesiBerlangsung = $this->getSesiBerlangsung($guru->id_user);
        
        return view('guru.dashboard', compact(
            'totalKelas',
            'sesiHariIni',
            'siswaAktif',
            'sesiBerlangsung'
        ));
    }

    /**
     * Halaman Sesi Presensi
     */
    public function sesiPresensi(Request $request)
    {
        $guru = Auth::user();
        
        // Get filter parameters
        $status = $request->get('status', 'all');
        $tanggal = $request->get('tanggal', Carbon::today()->format('Y-m-d'));
        $search = $request->get('search', '');
        
        // Query sesi dengan relasi
        $query = Sesi::with(['mapelKelas.mapel', 'mapelKelas.kelas', 'presensi'])
            ->whereHas('mapelKelas', function($q) use ($guru) {
                $q->where('id_guru', $guru->id_user);
            })
            ->whereDate('tanggal_sesi', $tanggal);
        
        // Filter berdasarkan search
        if ($search) {
            $query->whereHas('mapelKelas', function($q) use ($search) {
                $q->whereHas('mapel', function($q2) use ($search) {
                    $q2->where('nama_mapel', 'like', "%{$search}%");
                })->orWhereHas('kelas', function($q2) use ($search) {
                    $q2->where('kode_kelas', 'like', "%{$search}%");
                });
            });
        }
        
        $sesi = $query->orderBy('tanggal_sesi', 'asc')->paginate(10);
        
        // Hitung statistik untuk cards
        $allSesi = Sesi::whereHas('mapelKelas', function($q) use ($guru) {
                $q->where('id_guru', $guru->id_user);
            })
            ->whereDate('tanggal_sesi', $tanggal)
            ->get();
        
        $stats = [
            'total' => $allSesi->count(),
            'belum_dimulai' => $allSesi->filter(function($s) {
                return $this->getSesiStatus($s) === 'upcoming';
            })->count(),
            'berlangsung' => $allSesi->filter(function($s) {
                return $this->getSesiStatus($s) === 'ongoing';
            })->count(),
            'selesai' => $allSesi->filter(function($s) {
                return $this->getSesiStatus($s) === 'completed';
            })->count(),
        ];
        
        // Filter berdasarkan status jika dipilih
        if ($status !== 'all') {
            $sesi = $sesi->filter(function($s) use ($status) {
                return $this->getSesiStatus($s) === $status;
            });
        }
        
        // Transform data untuk view
        $sesi->getCollection()->transform(function($item) {
            $item->status_display = $this->getSesiStatus($item);
            $item->jumlah_siswa = $this->getJumlahSiswa($item);
            $item->kehadiran = $this->getKehadiran($item);
            return $item;
        });
        
        return view('guru.sesi-presensi', compact('sesi', 'stats', 'tanggal', 'status', 'search'));
    }

    /**
     * Halaman Presensi Kamera (Face Recognition)
     */
    public function presensiKamera($id)
    {
        $guru = Auth::user();
        
        // Get sesi dengan validasi kepemilikan
        $sesi = Sesi::with(['mapelKelas.mapel', 'mapelKelas.kelas', 'presensi.siswa'])
            ->whereHas('mapelKelas', function($q) use ($guru) {
                $q->where('id_guru', $guru->id_user);
            })
            ->findOrFail($id);
        
        // Get daftar siswa di kelas ini
        $siswa = DB::table('siswa')
            ->where('status', 'Aktif')
            ->get();
        
        // Get data presensi yang sudah ada
        $presensiExisting = Presensi::where('id_sesi', $id)
            ->pluck('status', 'id_siswa')
            ->toArray();
        
        return view('guru.presensi-kamera', compact('sesi', 'siswa', 'presensiExisting'));
    }

    /**
     * Simpan Presensi
     */
    public function simpanPresensi(Request $request, $id)
    {
        $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'status' => 'required|in:presensi,tidak',
        ]);
        
        $guru = Auth::user();
        
        // Validasi sesi milik guru
        $sesi = Sesi::whereHas('mapelKelas', function($q) use ($guru) {
            $q->where('id_guru', $guru->id_user);
        })->findOrFail($id);
        
        // Update or create presensi
        Presensi::updateOrCreate(
            [
                'id_sesi' => $id,
                'id_siswa' => $request->id_siswa,
            ],
            [
                'status' => $request->status,
            ]
        );
        
        return response()->json([
            'success' => true,
            'message' => 'Presensi berhasil disimpan',
        ]);
    }

    /**
     * Download Laporan Presensi
     */
    public function downloadPresensi($id)
    {
        $guru = Auth::user();
        
        $sesi = Sesi::with(['mapelKelas.mapel', 'mapelKelas.kelas', 'presensi.siswa'])
            ->whereHas('mapelKelas', function($q) use ($guru) {
                $q->where('id_guru', $guru->id_user);
            })
            ->findOrFail($id);
        
        // TODO: Implement export to Excel/PDF
        // Untuk saat ini, redirect kembali dengan pesan
        return redirect()->back()->with('info', 'Fitur download sedang dalam pengembangan');
    }

    /**
     * Helper: Get status sesi
     */
    private function getSesiStatus($sesi)
    {
        $now = Carbon::now();
        $tanggalSesi = Carbon::parse($sesi->tanggal_sesi);
        
        // Asumsi: jam belajar 07:00 - 15:00
        $mulai = $tanggalSesi->copy()->setTime(7, 0);
        $selesai = $tanggalSesi->copy()->setTime(15, 0);
        
        if ($now->lt($mulai)) {
            return 'upcoming'; // Belum dimulai
        } elseif ($now->between($mulai, $selesai)) {
            return 'ongoing'; // Berlangsung
        } else {
            return 'completed'; // Selesai
        }
    }

    /**
     * Helper: Get jumlah siswa
     */
    private function getJumlahSiswa($sesi)
    {
        // TODO: Implement berdasarkan relasi siswa dengan kelas
        // Untuk saat ini return dummy data
        return rand(30, 35);
    }

    /**
     * Helper: Get data kehadiran
     */
    private function getKehadiran($sesi)
    {
        $totalSiswa = $this->getJumlahSiswa($sesi);
        $hadir = $sesi->presensi->where('status', 'presensi')->count();
        
        return [
            'hadir' => $hadir,
            'total' => $totalSiswa,
            'persentase' => $totalSiswa > 0 ? round(($hadir / $totalSiswa) * 100) : 0,
        ];
    }

    /**
     * Helper: Get sesi yang sedang berlangsung
     */
    private function getSesiBerlangsung($id_guru)
    {
        $today = Carbon::today();
        
        return Sesi::with(['mapelKelas.mapel', 'mapelKelas.kelas'])
            ->whereHas('mapelKelas', function($q) use ($id_guru) {
                $q->where('id_guru', $id_guru);
            })
            ->whereDate('tanggal_sesi', $today)
            ->get()
            ->filter(function($sesi) {
                return $this->getSesiStatus($sesi) === 'ongoing';
            })
            ->first();
    }

    /**
     * Daftar Kelas
     */
    public function daftarKelas()
    {
        $guru = Auth::user();
        
        $kelasList = MapelKelas::with(['mapel', 'kelas'])
            ->where('id_guru', $guru->id_user)
            ->get();
        
        return view('guru.daftar-kelas', compact('kelasList'));
    }

    /**
     * Wali Kelas
     */
    public function waliKelas()
    {
        // TODO: Implement wali kelas functionality
        return view('guru.wali-kelas');
    }

    /**
     * Pengaturan
     */
    public function pengaturan()
    {
        $guru = Auth::user();
        return view('guru.pengaturan', compact('guru'));
    }
}