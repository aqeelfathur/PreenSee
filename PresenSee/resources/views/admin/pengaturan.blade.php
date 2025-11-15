@extends('layouts.app')

@section('title', 'Pengaturan')
@section('page-title', 'Pengaturan Sistem')
@section('page-subtitle', 'Kelola pengaturan aplikasi PresenSee')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Pengaturan Umum -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">Pengaturan Umum</h2>
            <p class="text-sm text-gray-500 mt-0.5">Konfigurasi dasar sistem</p>
        </div>
        
        <div class="p-6 space-y-6">
            <!-- Nama Sekolah -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Sekolah</label>
                <input 
                    type="text" 
                    value="SMA Negeri 1 PresenSee"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent"
                >
            </div>
            
            <!-- Alamat -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Sekolah</label>
                <textarea 
                    rows="3"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent"
                >Jl. Pendidikan No. 123, Jakarta Selatan, DKI Jakarta 12345</textarea>
            </div>
            
            <!-- Logo Sekolah -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Logo Sekolah</label>
                <div class="flex items-center gap-4">
                    <div class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/Logo Fix.png') }}" alt="Logo" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <button class="px-4 py-2 bg-[#004680] text-white rounded-lg hover:bg-[#003766] transition-colors duration-200 text-sm font-medium">
                            Upload Logo Baru
                        </button>
                        <p class="text-xs text-gray-500 mt-2">Format: PNG, JPG • Maksimal 2MB</p>
                    </div>
                </div>
            </div>
            
            <!-- Email Sekolah -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email Sekolah</label>
                <input 
                    type="email" 
                    value="admin@presensee.sch.id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent"
                >
            </div>
            
            <!-- Nomor Telepon -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                <input 
                    type="tel" 
                    value="+62 21 1234 5678"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent"
                >
            </div>
        </div>
    </div>
    
    <!-- Pengaturan Face Recognition -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">Pengaturan Face Recognition</h2>
            <p class="text-sm text-gray-500 mt-0.5">Konfigurasi sistem pengenalan wajah</p>
        </div>
        
        <div class="p-6 space-y-6">
            <!-- Enable/Disable Face Recognition -->
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-900">Aktifkan Face Recognition</h3>
                    <p class="text-xs text-gray-500 mt-1">Gunakan teknologi AI untuk deteksi wajah otomatis</p>
                </div>
                <button class="relative inline-flex h-6 w-11 items-center rounded-full bg-[#004680] transition-colors">
                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform translate-x-6"></span>
                </button>
            </div>
            
            <!-- Confidence Threshold -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Confidence Threshold 
                    <span class="text-gray-500 font-normal">(Tingkat Kepercayaan)</span>
                </label>
                <div class="flex items-center gap-4">
                    <input 
                        type="range" 
                        min="50" 
                        max="100" 
                        value="85" 
                        class="flex-1 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                    >
                    <span class="text-sm font-semibold text-gray-900 w-12 text-right">85%</span>
                </div>
                <p class="text-xs text-gray-500 mt-2">Rekomendasi: 80-90% untuk akurasi optimal</p>
            </div>
            
            <!-- Auto Capture -->
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-900">Auto Capture</h3>
                    <p class="text-xs text-gray-500 mt-1">Ambil gambar otomatis saat wajah terdeteksi</p>
                </div>
                <button class="relative inline-flex h-6 w-11 items-center rounded-full bg-[#004680] transition-colors">
                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform translate-x-6"></span>
                </button>
            </div>
            
            <!-- Detection Interval -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Interval Deteksi</label>
                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent">
                    <option>Setiap 1 detik</option>
                    <option selected>Setiap 2 detik</option>
                    <option>Setiap 3 detik</option>
                    <option>Setiap 5 detik</option>
                </select>
                <p class="text-xs text-gray-500 mt-2">Interval waktu antara setiap deteksi wajah</p>
            </div>
        </div>
    </div>
    
    <!-- Pengaturan Presensi -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">Pengaturan Presensi</h2>
            <p class="text-sm text-gray-500 mt-0.5">Atur ketentuan presensi siswa</p>
        </div>
        
        <div class="p-6 space-y-6">
            <!-- Batas Waktu Terlambat -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Batas Waktu Terlambat</label>
                <div class="flex items-center gap-3">
                    <input 
                        type="number" 
                        value="15"
                        min="0"
                        max="60"
                        class="w-24 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent"
                    >
                    <span class="text-sm text-gray-600">menit setelah jadwal dimulai</span>
                </div>
                <p class="text-xs text-gray-500 mt-2">Siswa dianggap terlambat jika absen melebihi batas ini</p>
            </div>
            
            <!-- Auto Close Session -->
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-900">Tutup Sesi Otomatis</h3>
                    <p class="text-xs text-gray-500 mt-1">Akhiri sesi presensi secara otomatis sesuai jadwal</p>
                </div>
                <button class="relative inline-flex h-6 w-11 items-center rounded-full bg-gray-300 transition-colors">
                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform translate-x-1"></span>
                </button>
            </div>
            
            <!-- Notifikasi Ketidakhadiran -->
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-900">Notifikasi Ketidakhadiran</h3>
                    <p class="text-xs text-gray-500 mt-1">Kirim notifikasi ke wali murid jika siswa tidak hadir</p>
                </div>
                <button class="relative inline-flex h-6 w-11 items-center rounded-full bg-[#004680] transition-colors">
                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform translate-x-6"></span>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Pengaturan Notifikasi -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">Pengaturan Notifikasi</h2>
            <p class="text-sm text-gray-500 mt-0.5">Kelola notifikasi sistem</p>
        </div>
        
        <div class="p-6 space-y-6">
            <!-- Email Notifications -->
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-900">Notifikasi Email</h3>
                    <p class="text-xs text-gray-500 mt-1">Terima notifikasi penting melalui email</p>
                </div>
                <button class="relative inline-flex h-6 w-11 items-center rounded-full bg-[#004680] transition-colors">
                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform translate-x-6"></span>
                </button>
            </div>
            
            <!-- Laporan Harian -->
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-900">Laporan Harian</h3>
                    <p class="text-xs text-gray-500 mt-1">Kirim rekap presensi harian setiap akhir hari</p>
                </div>
                <button class="relative inline-flex h-6 w-11 items-center rounded-full bg-[#004680] transition-colors">
                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform translate-x-6"></span>
                </button>
            </div>
            
            <!-- Laporan Mingguan -->
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-900">Laporan Mingguan</h3>
                    <p class="text-xs text-gray-500 mt-1">Kirim rekap presensi mingguan setiap hari Senin</p>
                </div>
                <button class="relative inline-flex h-6 w-11 items-center rounded-full bg-gray-300 transition-colors">
                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform translate-x-1"></span>
                </button>
            </div>
        </div>
    </div>
    
    {{-- <!-- Pengaturan Keamanan -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">Keamanan</h2>
            <p class="text-sm text-gray-500 mt-0.5">Pengaturan keamanan akun</p>
        </div>
        
        <div class="p-6 space-y-6">
            <!-- Change Password -->
            <div>
                <button class="flex items-center gap-3 text-[#004680] hover:text-[#003766] font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                    Ubah Password
                </button>
            </div>
            
            <!-- Two Factor Authentication -->
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-900">Two-Factor Authentication</h3>
                    <p class="text-xs text-gray-500 mt-1">Tambahkan lapisan keamanan ekstra untuk akun Anda</p>
                </div>
                <button class="relative inline-flex h-6 w-11 items-center rounded-full bg-gray-300 transition-colors">
                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform translate-x-1"></span>
                </button>
            </div>
            
            <!-- Session Timeout -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Session Timeout</label>
                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004680] focus:border-transparent">
                    <option>15 menit</option>
                    <option selected>30 menit</option>
                    <option>1 jam</option>
                    <option>2 jam</option>
                    <option>Never</option>
                </select>
                <p class="text-xs text-gray-500 mt-2">Logout otomatis setelah tidak aktif</p>
            </div>
        </div>
    </div> --}}
    
    <!-- Save Button -->
    <div class="flex items-center justify-end gap-3">
        <button class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200 font-medium">
            Reset
        </button>
        <button class="px-6 py-2 bg-[#004680] text-white rounded-lg hover:bg-[#003766] transition-colors duration-200 font-medium shadow-sm">
            Simpan Perubahan
        </button>
    </div>
</div>

<script>
// Toggle switches (dummy functionality)
document.querySelectorAll('button[class*="inline-flex h-6 w-11"]').forEach(toggle => {
    toggle.addEventListener('click', function() {
        const span = this.querySelector('span');
        const isActive = this.classList.contains('bg-[#004680]');
        
        if (isActive) {
            this.classList.remove('bg-[#004680]');
            this.classList.add('bg-gray-300');
            span.classList.remove('translate-x-6');
            span.classList.add('translate-x-1');
        } else {
            this.classList.add('bg-[#004680]');
            this.classList.remove('bg-gray-300');
            span.classList.add('translate-x-6');
            span.classList.remove('translate-x-1');
        }
    });
});

// Range slider value display
const rangeInput = document.querySelector('input[type="range"]');
const rangeValue = rangeInput?.nextElementSibling?.nextElementSibling;
if (rangeInput && rangeValue) {
    rangeInput.addEventListener('input', function() {
        rangeValue.textContent = this.value + '%';
    });
}
</script>
@endsection