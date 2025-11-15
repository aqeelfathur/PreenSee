@extends('layouts.app')

@section('title', 'Dashboard Guru')
@section('page-title', 'Dashboard Guru')
@section('page-subtitle', 'Selamat datang kembali, Pak Budi!')

@section('content')
<!-- Summary Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Kelas yang Diampu -->
    @component('components.card-summary', [
        'title' => 'Kelas yang Diampu',
        'value' => '6',
        'iconBg' => 'bg-blue-100',
        'iconColor' => 'text-[#004680]',
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>'
    ])
    @endcomponent
    
    <!-- Total Siswa Aktif -->
    @component('components.card-summary', [
        'title' => 'Total Siswa Aktif',
        'value' => '187',
        'iconBg' => 'bg-green-100',
        'iconColor' => 'text-green-600',
        'trend' => '+12',
        'trendUp' => true,
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>'
    ])
    @endcomponent
    
    <!-- Jadwal Hari Ini -->
    @component('components.card-summary', [
        'title' => 'Jadwal Hari Ini',
        'value' => '4',
        'iconBg' => 'bg-yellow-100',
        'iconColor' => 'text-yellow-600',
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>'
    ])
    @endcomponent
    
    <!-- Tingkat Kehadiran Hari Ini -->
    @component('components.card-summary', [
        'title' => 'Tingkat Kehadiran',
        'value' => '92%',
        'iconBg' => 'bg-purple-100',
        'iconColor' => 'text-purple-600',
        'trend' => '+5%',
        'trendUp' => true,
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>'
    ])
    @endcomponent
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
    <!-- Buat Jadwal Baru -->
    <button 
        id="openBuatJadwalModal"
        class="flex items-center justify-center gap-3 bg-[#004680] text-white px-6 py-4 rounded-xl hover:bg-[#003766] transition-all duration-200 shadow-sm hover:shadow-md w-full">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
        </svg>
        <span class="font-semibold">Buat Jadwal Presensi</span>
    </button>
    
    <!-- Mulai Presensi -->
    <a href="{{ route('guru.presensi-kamera', ['id' => 1])}}" class="flex items-center justify-center gap-3 bg-[#ffca05] text-gray-900 px-6 py-4 rounded-xl hover:bg-[#e6b804] transition-all duration-200 shadow-sm hover:shadow-md">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <span class="font-semibold">Mulai Presensi</span>
    </a>
    
    <!-- Lihat Daftar Sesi Presensi -->
    <a href="{{ route('guru.sesi-presensi') }}" 
        class="flex items-center justify-center gap-3 bg-white border-2 border-[#004680] text-[#004680] px-6 py-4 rounded-xl hover:bg-blue-50 transition-all duration-200 shadow-sm hover:shadow-md">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
        </svg>
        <span class="font-semibold">Daftar Sesi Presensi</span>
    </a>
</div>

<!-- Modal Popup Buat Jadwal -->
<div id="buatJadwalModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-2xl shadow-lg w-full max-w-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Buat Jadwal Presensi</h3>
        <form action="{{ route('guru.sesi-presensi') }}" method="POST">
            @csrf
            <div class="space-y-3">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Mata Pelajaran</label>
                    <input type="text" name="mapel" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#004680]" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                    <input type="text" name="kelas" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#004680]" required>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Waktu Mulai</label>
                        <input type="time" name="waktu_mulai" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#004680]" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Waktu Selesai</label>
                        <input type="time" name="waktu_selesai" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#004680]" required>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-2 mt-6">
                <button type="button" id="closeBuatJadwalModal" class="px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100">Batal</button>
                <button type="submit" class="px-4 py-2 bg-[#004680] text-white rounded-lg hover:bg-[#003766]">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Main Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Jadwal Hari Ini -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold text-gray-900">Jadwal Hari Ini</h2>
                    <p class="text-sm text-gray-500 mt-0.5">Rabu, 12 November 2025</p>
                </div>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-[#004680]">
                    4 Sesi
                </span>
            </div>
        </div>
        
        <div class="p-6 space-y-4">
            <!-- Jadwal Item 1 -->
            <div class="flex items-start gap-4 p-4 rounded-xl border border-gray-100 hover:border-blue-200 hover:bg-blue-50/30 transition-all duration-200">
                <div class="flex flex-col items-center justify-center px-3 py-2 bg-[#004680] text-white rounded-lg">
                    <span class="text-xs font-medium">07:30</span>
                    <div class="w-px h-4 bg-white/30 my-1"></div>
                    <span class="text-xs font-medium">09:00</span>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="font-semibold text-gray-900 mb-1">Matematika</h3>
                    <p class="text-sm text-gray-600 mb-2">Kelas X-1 • Ruang 201</p>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-green-100 text-green-700">
                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></span>
                        Sedang Berlangsung
                    </span>
                </div>
            </div>
            
            <!-- Jadwal Item 2 -->
            <div class="flex items-start gap-4 p-4 rounded-xl border border-gray-100 hover:border-blue-200 hover:bg-blue-50/30 transition-all duration-200">
                <div class="flex flex-col items-center justify-center px-3 py-2 bg-gray-100 text-gray-700 rounded-lg">
                    <span class="text-xs font-medium">09:30</span>
                    <div class="w-px h-4 bg-gray-300 my-1"></div>
                    <span class="text-xs font-medium">11:00</span>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="font-semibold text-gray-900 mb-1">Fisika</h3>
                    <p class="text-sm text-gray-600 mb-2">Kelas XI-2 • Lab Fisika</p>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-gray-100 text-gray-700">
                        <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-1.5"></span>
                        Belum Dimulai
                    </span>
                </div>
            </div>
            
            <!-- Jadwal Item 3 -->
            <div class="flex items-start gap-4 p-4 rounded-xl border border-gray-100 hover:border-blue-200 hover:bg-blue-50/30 transition-all duration-200">
                <div class="flex flex-col items-center justify-center px-3 py-2 bg-gray-100 text-gray-700 rounded-lg">
                    <span class="text-xs font-medium">12:00</span>
                    <div class="w-px h-4 bg-gray-300 my-1"></div>
                    <span class="text-xs font-medium">13:30</span>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="font-semibold text-gray-900 mb-1">Matematika</h3>
                    <p class="text-sm text-gray-600 mb-2">Kelas X-2 • Ruang 202</p>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-gray-100 text-gray-700">
                        <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-1.5"></span>
                        Belum Dimulai
                    </span>
                </div>
            </div>
            
            <!-- Jadwal Item 4 -->
            <div class="flex items-start gap-4 p-4 rounded-xl border border-gray-100 hover:border-blue-200 hover:bg-blue-50/30 transition-all duration-200">
                <div class="flex flex-col items-center justify-center px-3 py-2 bg-gray-100 text-gray-700 rounded-lg">
                    <span class="text-xs font-medium">14:00</span>
                    <div class="w-px h-4 bg-gray-300 my-1"></div>
                    <span class="text-xs font-medium">15:30</span>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="font-semibold text-gray-900 mb-1">Fisika</h3>
                    <p class="text-sm text-gray-600 mb-2">Kelas XII-1 • Lab Fisika</p>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-gray-100 text-gray-700">
                        <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-1.5"></span>
                        Belum Dimulai
                    </span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Aktivitas Terbaru -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold text-gray-900">Aktivitas Terbaru</h2>
                    <p class="text-sm text-gray-500 mt-0.5">Update dalam 5 menit terakhir</p>
                </div>
                <button class="text-[#004680] hover:text-[#003766] text-sm font-medium">
                    Lihat Semua
                </button>
            </div>
        </div>
        
        <div class="p-6 space-y-4">
            <!-- Activity Item 1 -->
            <div class="flex items-start gap-4">
                <div class="flex items-center justify-center w-10 h-10 bg-green-100 text-green-600 rounded-xl shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900">Presensi Matematika (X-1) Selesai</p>
                    <p class="text-sm text-gray-600 mt-1">32 dari 35 siswa hadir • 2 izin • 1 sakit</p>
                    <p class="text-xs text-gray-400 mt-1">5 menit yang lalu</p>
                </div>
            </div>
            
            <!-- Activity Item 2 -->
            <div class="flex items-start gap-4">
                <div class="flex items-center justify-center w-10 h-10 bg-blue-100 text-[#004680] rounded-xl shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900">Sesi Baru Dibuat</p>
                    <p class="text-sm text-gray-600 mt-1">Fisika XI-2 untuk besok pukul 09:30</p>
                    <p class="text-xs text-gray-400 mt-1">1 jam yang lalu</p>
                </div>
            </div>
            
            <!-- Activity Item 3 -->
            <div class="flex items-start gap-4">
                <div class="flex items-center justify-center w-10 h-10 bg-yellow-100 text-yellow-600 rounded-xl shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900">Perhatian: Kehadiran Rendah</p>
                    <p class="text-sm text-gray-600 mt-1">Fisika XII-1 hanya 65% hadir pada sesi terakhir</p>
                    <p class="text-xs text-gray-400 mt-1">2 jam yang lalu</p>
                </div>
            </div>
            
            <!-- Activity Item 4 -->
            <div class="flex items-start gap-4">
                <div class="flex items-center justify-center w-10 h-10 bg-purple-100 text-purple-600 rounded-xl shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900">Pengingat Jadwal</p>
                    <p class="text-sm text-gray-600 mt-1">Matematika X-2 dimulai dalam 30 menit</p>
                    <p class="text-xs text-gray-400 mt-1">30 menit yang lalu</p>
                </div>
            </div>
            
            <!-- Activity Item 5 -->
            <div class="flex items-start gap-4">
                <div class="flex items-center justify-center w-10 h-10 bg-green-100 text-green-600 rounded-xl shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900">Presensi Fisika (XI-3) Selesai</p>
                    <p class="text-sm text-gray-600 mt-1">28 dari 30 siswa hadir • 1 izin • 1 alpha</p>
                    <p class="text-xs text-gray-400 mt-1">3 jam yang lalu</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart Section -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-5 border-b border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-bold text-gray-900">Statistik Kehadiran Mingguan</h2>
                <p class="text-sm text-gray-500 mt-0.5">7 hari terakhir</p>
            </div>
            <div class="flex items-center gap-2">
                <select class="px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#004680] focus:border-transparent">
                    <option>Semua Kelas</option>
                    <option>Kelas X-1</option>
                    <option>Kelas X-2</option>
                    <option>Kelas XI-2</option>
                </select>
            </div>
        </div>
    </div>
    
    <div class="p-8">
        <!-- Chart Placeholder -->
        <div class="flex items-center justify-center h-64 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl border-2 border-dashed border-blue-200">
            <div class="text-center">
                <svg class="w-16 h-16 mx-auto text-blue-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                <p class="text-sm font-medium text-gray-600">Grafik Kehadiran Mingguan</p>
                <p class="text-xs text-gray-400 mt-1">(Area untuk visualisasi data Chart.js atau Recharts)</p>
            </div>
        </div>
        
        <!-- Stats Summary Below Chart -->
        <div class="grid grid-cols-4 gap-4 mt-6">
            <div class="text-center p-4 bg-green-50 rounded-xl">
                <p class="text-2xl font-bold text-green-600">92%</p>
                <p class="text-xs text-gray-600 mt-1">Rata-rata Hadir</p>
            </div>
            <div class="text-center p-4 bg-yellow-50 rounded-xl">
                <p class="text-2xl font-bold text-yellow-600">5%</p>
                <p class="text-xs text-gray-600 mt-1">Izin/Sakit</p>
            </div>
            <div class="text-center p-4 bg-red-50 rounded-xl">
                <p class="text-2xl font-bold text-red-600">3%</p>
                <p class="text-xs text-gray-600 mt-1">Tanpa Keterangan</p>
            </div>
            <div class="text-center p-4 bg-blue-50 rounded-xl">
                <p class="text-2xl font-bold text-[#004680]">172</p>
                <p class="text-xs text-gray-600 mt-1">Total Hadir Minggu Ini</p>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('openBuatJadwalModal').addEventListener('click', () => {
        document.getElementById('buatJadwalModal').classList.remove('hidden');
    });

    document.getElementById('closeBuatJadwalModal').addEventListener('click', () => {
        document.getElementById('buatJadwalModal').classList.add('hidden');
    });
</script>
@endsection

