@extends('layouts.app')

@section('title', 'Manajemen Wali Kelas')
@section('page-title', 'Manajemen Wali Kelas')
@section('page-subtitle', 'Kelola kelas yang Anda walikan')

@section('content')
<!-- Info Card -->
<div class="bg-gradient-to-r from-[#004680] to-blue-700 rounded-2xl shadow-lg p-6 mb-6 text-white">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold mb-2">Kelas yang Anda Walikan</h2>
            <div class="flex items-center gap-6 text-sm">
                <span class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    Kelas X-1
                </span>
                <span class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    35 Siswa
                </span>
            </div>
        </div>
        <div class="text-right">
            <div class="text-4xl font-bold">92%</div>
            <div class="text-sm opacity-90">Rata-rata Kehadiran</div>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Total Siswa</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">35</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-[#004680]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Laki-laki</p>
                <p class="text-2xl font-bold text-blue-600 mt-1">18</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Perempuan</p>
                <p class="text-2xl font-bold text-pink-600 mt-1">17</p>
            </div>
            <div class="w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Kehadiran Hari Ini</p>
                <p class="text-2xl font-bold text-green-600 mt-1">33</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Table Section -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
        <div>
            <h2 class="text-lg font-bold text-gray-900">Daftar Siswa Kelas X-1</h2>
            <p class="text-sm text-gray-500 mt-0.5">Data lengkap siswa yang Anda walikan</p>
        </div>
        
        <!-- Search -->
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <input 
                type="text" 
                placeholder="Cari siswa..."
                class="pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#004680] focus:border-transparent w-64"
            >
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Siswa</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">NIS</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Kehadiran</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <!-- Row 1 -->
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=Ahmad+Rizki&background=004680&color=fff&size=128" alt="Student" class="w-10 h-10 rounded-full">
                            <div>
                                <div class="text-sm font-medium text-gray-900">Ahmad Rizki Fauzan</div>
                                <div class="text-xs text-gray-500">Laki-laki</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2401001</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                            95%
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button onclick="openDetailModal('Ahmad Rizki Fauzan')" class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-600 text-white text-xs font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Detail
                            </button>
                            <button onclick="openRekapModal('Ahmad Rizki Fauzan')" class="inline-flex items-center gap-1 px-3 py-1.5 bg-green-600 text-white text-xs font-medium rounded-lg hover:bg-green-700 transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Rekap
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Row 2 -->
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=Siti+Nurhaliza&background=004680&color=fff&size=128" alt="Student" class="w-10 h-10 rounded-full">
                            <div>
                                <div class="text-sm font-medium text-gray-900">Siti Nurhaliza</div>
                                <div class="text-xs text-gray-500">Perempuan</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2401002</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                            98%
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button onclick="openDetailModal('Siti Nurhaliza')" class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-600 text-white text-xs font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Detail
                            </button>
                            <button onclick="openRekapModal('Siti Nurhaliza')" class="inline-flex items-center gap-1 px-3 py-1.5 bg-green-600 text-white text-xs font-medium rounded-lg hover:bg-green-700 transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Rekap
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Row 3 -->
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=004680&color=fff&size=128" alt="Student" class="w-10 h-10 rounded-full">
                            <div>
                                <div class="text-sm font-medium text-gray-900">Budi Santoso</div>
                                <div class="text-xs text-gray-500">Laki-laki</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2401003</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">
                            87%
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button onclick="openDetailModal('Budi Santoso')" class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-600 text-white text-xs font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Detail
                            </button>
                            <button onclick="openRekapModal('Budi Santoso')" class="inline-flex items-center gap-1 px-3 py-1.5 bg-green-600 text-white text-xs font-medium rounded-lg hover:bg-green-700 transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Rekap
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
        <div class="text-sm text-gray-600">
            Menampilkan <span class="font-semibold">1-3</span> dari <span class="font-semibold">35</span> siswa
        </div>
        <div class="flex items-center gap-2">
            <button class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-200">Previous</button>
            <button class="px-3 py-1.5 bg-[#004680] text-white rounded-lg text-sm font-medium">1</button>
            <button class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-200">2</button>
            <button class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-200">Next</button>
        </div>
    </div>
</div>

<!-- Modal Detail Siswa -->
<div id="detailModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h3 class="text-lg font-bold text-gray-900">Detail Siswa</h3>
            <button onclick="closeModal('detailModal')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <div class="p-6">
            <!-- Profile -->
            <div class="flex items-center gap-4 mb-6 pb-6 border-b border-gray-100">
                <img src="https://ui-avatars.com/api/?name=Ahmad+Rizki&background=004680&color=fff&size=128" alt="Student" class="w-20 h-20 rounded-full">
                <div>
                    <h4 class="text-xl font-bold text-gray-900" id="detailNama">Ahmad Rizki Fauzan</h4>
                    <p class="text-sm text-gray-500">NIS: 2401001 • Kelas X-1</p>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700 mt-2">
                        Siswa Aktif
                    </span>
                </div>
            </div>
            
            <!-- Data Identitas -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-xs font-medium text-gray-500 uppercase">Tempat, Tanggal Lahir</label>
                    <p class="text-sm font-medium text-gray-900 mt-1">Jakarta, 15 Januari 2010</p>
                </div>
                <div>
                    <label class="text-xs font-medium text-gray-500 uppercase">Jenis Kelamin</label>
                    <p class="text-sm font-medium text-gray-900 mt-1">Laki-laki</p>
                </div>
                <div>
                    <label class="text-xs font-medium text-gray-500 uppercase">Agama</label>
                    <p class="text-sm font-medium text-gray-900 mt-1">Islam</p>
                </div>
                <div>
                    <label class="text-xs font-medium text-gray-500 uppercase">No. Telepon</label>
                    <p class="text-sm font-medium text-gray-900 mt-1">+62 812-3456-7890</p>
                </div>
                <div class="col-span-2">
                    <label class="text-xs font-medium text-gray-500 uppercase">Alamat</label>
                    <p class="text-sm font-medium text-gray-900 mt-1">Jl. Pendidikan No. 123, Jakarta Selatan, DKI Jakarta 12345</p>
                </div>
                <div>
                    <label class="text-xs font-medium text-gray-500 uppercase">Nama Ayah</label>
                    <p class="text-sm font-medium text-gray-900 mt-1">Bambang Santoso</p>
                </div>
                <div>
                    <label class="text-xs font-medium text-gray-500 uppercase">Nama Ibu</label>
                    <p class="text-sm font-medium text-gray-900 mt-1">Siti Rahayu</p>
                </div>
                <div>
                    <label class="text-xs font-medium text-gray-500 uppercase">Pekerjaan Ayah</label>
                    <p class="text-sm font-medium text-gray-900 mt-1">PNS</p>
                </div>
                <div>
                    <label class="text-xs font-medium text-gray-500 uppercase">Pekerjaan Ibu</label>
                    <p class="text-sm font-medium text-gray-900 mt-1">Guru</p>
                </div>
                <div class="col-span-2">
                    <label class="text-xs font-medium text-gray-500 uppercase">No. Telepon Orang Tua</label>
                    <p class="text-sm font-medium text-gray-900 mt-1">+62 821-9876-5432</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Rekap Presensi -->
<div id="rekapModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl max-w-3xl w-full max-h-[90vh] overflow-y-auto">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-bold text-gray-900">Rekap Presensi</h3>
                <p class="text-sm text-gray-500 mt-0.5"><span id="rekapNama">Ahmad Rizki Fauzan</span> • Semester 1 2025/2026</p>
            </div>
            <button onclick="closeModal('rekapModal')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <div class="p-6">
            <!-- Summary Stats -->
            <div class="grid grid-cols-4 gap-4 mb-6">
                <div class="text-center p-4 bg-green-50 rounded-xl">
                    <p class="text-2xl font-bold text-green-600">92</p>
                    <p class="text-xs text-gray-600 mt-1">Hadir</p>
                </div>
                <div class="text-center p-4 bg-yellow-50 rounded-xl">
                    <p class="text-2xl font-bold text-yellow-600">5</p>
                    <p class="text-xs text-gray-600 mt-1">Izin</p>
                </div>
                <div class="text-center p-4 bg-blue-50 rounded-xl">
                    <p class="text-2xl font-bold text-blue-600">1</p>
                    <p class="text-xs text-gray-600 mt-1">Sakit</p>
                </div>
                <div class="text-center p-4 bg-red-50 rounded-xl">
                    <p class="text-2xl font-bold text-red-600">2</p>
                    <p class="text-xs text-gray-600 mt-1">Alpha</p>
                </div>
            </div>
            
            <!-- Monthly Recap -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Bulan</th>
                            <th class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase">Hadir</th>
                            <th class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase">Izin</th>
                            <th class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase">Sakit</th>
                            <th class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase">Alpha</th>
                            <th class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase">Persentase</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm font-medium text-gray-900">Agustus 2025</td>
                            <td class="px-4 py-3 text-center text-sm text-gray-900">18</td>
                            <td class="px-4 py-3 text-center text-sm text-gray-900">1</td>
                            <td class="px-4 py-3 text-center text-sm text-gray-900">0</td>
                            <td class="px-4 py-3 text-center text-sm text-gray-900">1</td>
                            <td class="px-4 py-3 text-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                    90%
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm font-medium text-gray-900">September 2025</td>
                            <td class="px-4 py-3 text-center text-sm text-gray-900">20</td>
                            <td class="px-4 py-3 text-center text-sm text-gray-900">1</td>
                            <td class="px-4 py-3 text-center text-sm text-gray-900">0</td>
                            <td class="px-4 py-3 text-center text-sm text-gray-900">0</td>
                            <td class="px-4 py-3 text-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                    95%
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm font-medium text-gray-900">Oktober 2025</td>
                            <td class="px-4 py-3 text-center text-sm text-gray-900">22</td>
                            <td class="px-4 py-3 text-center text-sm text-gray-900">2</td>
                            <td class="px-4 py-3 text-center text-sm text-gray-900">0</td>
                            <td class="px-4 py-3 text-center text-sm text-gray-900">0</td>
                            <td class="px-4 py-3 text-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                    92%
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm font-medium text-gray-900">November 2025</td>
                            <td class="px-4 py-3 text-center text-sm text-gray-900">32</td>
                            <td class="px-4 py-3 text-center text-sm text-gray-900">1</td>
                            <td class="px-4 py-3 text-center text-sm text-gray-900">1</td>
                            <td class="px-4 py-3 text-center text-sm text-gray-900">1</td>
                            <td class="px-4 py-3 text-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                    91%
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Download Button -->
            <div class="mt-6 flex justify-end">
                <button class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    Download Rekap PDF
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}

function openDetailModal(namaLengkap) {
    document.getElementById('detailNama').textContent = namaLengkap;
    openModal('detailModal');
}

function openRekapModal(namaLengkap) {
    document.getElementById('rekapNama').textContent = namaLengkap;
    openModal('rekapModal');
}
</script>
@endsection