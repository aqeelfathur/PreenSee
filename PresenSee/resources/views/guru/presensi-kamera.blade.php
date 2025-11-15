@extends('layouts.app')

@section('title', 'Presensi Kamera')
@section('page-title', 'Presensi dengan Face Recognition')
@section('page-subtitle', 'Matematika - Kelas X-1 • 07:30 - 09:00')

@section('content')
<!-- Back Button -->
<div class="mb-6">
    <a href="{{ route('guru.sesi-presensi') }}" class="inline-flex items-center gap-2 text-[#004680] hover:text-[#003766] font-medium transition-colors duration-200">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali ke Daftar Sesi
    </a>
</div>

<!-- Session Info Card -->
<div class="bg-gradient-to-r from-[#004680] to-blue-700 rounded-2xl shadow-lg p-6 mb-6 text-white">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold mb-2">Matematika - Aljabar Linear</h2>
            <div class="flex items-center gap-6 text-sm">
                <span class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    Kelas X-1
                </span>
                <span class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    07:30 - 09:00 (90 menit)
                </span>
                <span class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Rabu, 13 Nov 2025
                </span>
            </div>
        </div>
        <div class="text-right">
            <div class="text-4xl font-bold">32/35</div>
            <div class="text-sm opacity-90">siswa hadir</div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <!-- Camera Preview Section -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Live Camera Preview</h3>
                    <p class="text-sm text-gray-500 mt-0.5">Face Recognition aktif</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5 animate-pulse"></span>
                        Recording
                    </span>
                </div>
            </div>
            
            <!-- Camera Feed -->
            <div class="relative bg-gray-900 aspect-video flex items-center justify-center">
                <!-- Placeholder untuk video feed -->
                <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-gray-800 to-gray-900">
                    <div class="text-center">
                        <svg class="w-24 h-24 mx-auto text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-gray-400 text-lg font-medium">Camera Feed Aktif</p>
                        <p class="text-gray-500 text-sm mt-2">Face Recognition sedang memindai wajah siswa...</p>
                    </div>
                </div>
                
                <!-- Detection Overlay (simulasi) -->
                <div class="absolute top-20 left-1/4 w-32 h-40 border-4 border-green-500 rounded-lg">
                    <div class="absolute -bottom-8 left-0 right-0 text-center">
                        <span class="inline-block px-3 py-1 bg-green-500 text-white text-xs font-semibold rounded">
                            Ahmad Rizki ✓
                        </span>
                    </div>
                </div>
                
                <!-- Stats Overlay -->
                <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between">
                    <div class="bg-black/70 backdrop-blur-sm px-4 py-2 rounded-lg">
                        <div class="text-white text-sm font-medium">
                            <span class="text-green-400">●</span> Face Detected: 1
                        </div>
                    </div>
                    <div class="bg-black/70 backdrop-blur-sm px-4 py-2 rounded-lg">
                        <div class="text-white text-sm font-medium">
                            Confidence: 98%
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Camera Controls -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                <div class="flex items-center justify-center gap-3">
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Pengaturan Kamera
                    </button>
                    
                    <button class="px-4 py-2 bg-yellow-500 text-white rounded-lg text-sm font-medium hover:bg-yellow-600 transition-colors duration-200">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Pindai Manual
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Quick Stats -->
    <div class="space-y-4">
        <!-- Hadir -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-medium text-gray-600">Hadir</span>
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-900">32</div>
            <div class="text-sm text-gray-500 mt-1">91% dari total</div>
        </div>
        
        <!-- Belum Hadir -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-medium text-gray-600">Belum Hadir</span>
                <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-900">3</div>
            <div class="text-sm text-gray-500 mt-1">9% dari total</div>
        </div>
        
        <!-- Duration -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-sm p-4 text-white">
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-medium opacity-90">Durasi Sesi</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="text-3xl font-bold">32:45</div>
            <div class="text-sm opacity-90 mt-1">dari 90 menit</div>
        </div>
    </div>
</div>

<!-- Student List Table -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
        <div>
            <h3 class="text-lg font-bold text-gray-900">Daftar Siswa</h3>
            <p class="text-sm text-gray-500 mt-0.5">Klik status untuk mengubah kehadiran manual</p>
        </div>
        <div class="flex items-center gap-2">
            <!-- Search -->
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input 
                    type="text" 
                    placeholder="Cari siswa..."
                    class="pl-9 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#004680] focus:border-transparent w-48"
                >
            </div>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">NIS</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Siswa</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Waktu Absen</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <!-- Student 1 - Hadir -->
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2401001</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=Ahmad+Rizki&background=004680&color=fff&size=128" alt="Student" class="w-8 h-8 rounded-full">
                            <span class="text-sm font-medium text-gray-900">Ahmad Rizki Fauzan</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">07:32:15</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <button class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700 hover:bg-green-200 transition-colors duration-200">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Hadir
                        </button>
                    </td>
                </tr>
                
                <!-- Student 2 - Hadir -->
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2401002</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=Siti+Nurhaliza&background=004680&color=fff&size=128" alt="Student" class="w-8 h-8 rounded-full">
                            <span class="text-sm font-medium text-gray-900">Siti Nurhaliza</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">07:30:42</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <button class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700 hover:bg-green-200 transition-colors duration-200">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Hadir
                        </button>
                    </td>
                </tr>
                
                <!-- Student 3 - Belum Hadir -->
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2401003</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=dc2626&color=fff&size=128" alt="Student" class="w-8 h-8 rounded-full">
                            <span class="text-sm font-medium text-gray-900">Budi Santoso</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">-</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <button class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700 hover:bg-red-200 transition-colors duration-200">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Belum Hadir
                        </button>
                    </td>
                </tr>
                
                <!-- More students... (abbreviated for brevity) -->
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">4</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2401004</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=Dewi+Lestari&background=004680&color=fff&size=128" alt="Student" class="w-8 h-8 rounded-full">
                            <span class="text-sm font-medium text-gray-900">Dewi Lestari</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">07:33:28</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <button class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700 hover:bg-green-200 transition-colors duration-200">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Hadir
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Table Footer Actions -->
    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
        <div class="text-sm text-gray-600">
            Menampilkan <span class="font-semibold">1-4</span> dari <span class="font-semibold">35</span> siswa
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                Export Excel
            </button>
            <button onclick="window.location.href='{{ route('guru.sesi-presensi') }}'"
                class="px-6 py-2 bg-red-600 text-white rounded-lg text-sm font-semibold hover:bg-red-700 transition-colors duration-200 shadow-lg hover:shadow-xl">
                
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"/>
                </svg>
                Akhiri Presensi
            </button>
        </div>
    </div>
</div>
@endsection