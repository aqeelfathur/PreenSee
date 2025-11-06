<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PresenSEE - Sistem Absensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'navy': '#1e3a8a',
                        'navy-dark': '#1e40af',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Container untuk semua halaman -->
    <div id="app">
<!-- Dashboard Guru -->
        <div id="dashboardPage" >
            <div class="flex h-screen">
                <!-- Sidebar -->
                <aside class="w-64 bg-white border-r border-gray-200">
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-8">
                            <div class="bg-navy text-white w-10 h-10 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </div>
                            <span class="font-bold text-xl text-navy">PresenSEE</span>
                        </div>

                        <!-- Navigation Menu -->
                        <nav class="space-y-2">
                            <a href="/" onclick="showPage('dashboard')" class="nav-link active flex items-center gap-3 px-4 py-3 rounded-lg text-navy bg-blue-50 font-medium">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                                Dashboard
                            </a>
                            <a href="/buat_sesi" onclick="showPage('buatSesi')" class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-navy font-medium transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                Buat Sesi
                            </a>
                            <a href="sesi_presensi" onclick="showPage('sesiPresensi')" class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-navy font-medium transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                Sesi Presensi
                            </a>
                            <a href="#" onclick="showPage('riwayat')" class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-navy font-medium transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Riwayat
                            </a>
                        </nav>
                    </div>

                    <!-- User Profile & Logout -->
                    <div class="absolute bottom-0 w-64 border-t border-gray-200 p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-sm text-gray-900">Pak Budi</p>
                                <p class="text-xs text-gray-500">Guru</p>
                            </div>
                        </div>
                        <button onclick="logout()" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-gray-900 hover:bg-gray-800 text-white rounded-lg font-medium transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            Log Out
                        </button>
                    </div>
                </aside>

                <!-- Main Content -->
                <main class="flex-1 overflow-y-auto">
                    <!-- Dashboard Content -->
                    <div id="dashboardContent" class="p-8">
                        <div class="mb-8">
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">Dashboard</h1>
                            <p class="text-gray-600">Selamat datang di PresenSEE</p>
                        </div>

                        <!-- Stats Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                            <div class="bg-white rounded-xl shadow-md p-6">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-gray-500 text-sm font-medium mb-1">Total Sesi Hari Ini</p>
                                        <p class="text-3xl font-bold text-gray-900">3</p>
                                    </div>
                                    <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl shadow-md p-6">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-gray-500 text-sm font-medium mb-1">Siswa Hadir</p>
                                        <p class="text-3xl font-bold text-gray-900">87</p>
                                    </div>
                                    <div class="bg-green-100 w-12 h-12 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl shadow-md p-6">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-gray-500 text-sm font-medium mb-1">Sesi Aktif</p>
                                        <p class="text-3xl font-bold text-gray-900">1</p>
                                    </div>
                                    <div class="bg-yellow-100 w-12 h-12 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Sessions -->
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-4">Sesi Terbaru</h2>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                    <div class="flex items-center gap-4">
                                        <div class="bg-navy text-white w-10 h-10 rounded-lg flex items-center justify-center font-bold">
                                            12A
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900">Matematika - Kelas 12A</p>
                                            <p class="text-sm text-gray-500">08:00 - 09:30</p>
                                        </div>
                                    </div>
                                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">Selesai</span>
                                </div>

                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                    <div class="flex items-center gap-4">
                                        <div class="bg-navy text-white w-10 h-10 rounded-lg flex items-center justify-center font-bold">
                                            11B
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900">Fisika - Kelas 11B</p>
                                            <p class="text-sm text-gray-500">10:00 - 11:30</p>
                                        </div>
                                    </div>
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm font-medium">Berlangsung</span>
                                </div>

                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                    <div class="flex items-center gap-4">
                                        <div class="bg-navy text-white w-10 h-10 rounded-lg flex items-center justify-center font-bold">
                                            10C
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900">Kimia - Kelas 10C</p>
                                            <p class="text-sm text-gray-500">13:00 - 14:30</p>
                                        </div>
                                    </div>
                                    <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-sm font-medium">Menunggu</span>
                                </div>
                            </div>
                        </div>
                    </div>

                  
                    <!-- Sesi Presensi Content -->
                    <div id="sesiPresensiContent" class="hidden p-8">
                        <div class="mb-8">
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">Sesi Presensi</h1>
                            <p class="text-gray-600">Kelola dan pantau sesi presensi aktif</p>
                        </div>

                        <!-- Active Session Card -->
                        <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <h2 class="text-xl font-bold text-gray-900">Fisika - Kelas 11B</h2>
                                    <p class="text-gray-600">10:00 - 11:30 • 04 November 2025</p>
                                </div>
                                <span class="px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-semibold">Aktif</span>
                            </div>

                            <div class="grid grid-cols-3 gap-4 mb-6">
                                <div class="bg-gray-50 rounded-lg p-4 text-center">
                                    <p class="text-2xl font-bold text-gray-900">28</p>
                                    <p class="text-sm text-gray-600">Total Siswa</p>
                                </div>
                                <div class="bg-green-50 rounded-lg p-4 text-center">
                                    <p class="text-2xl font-bold text-green-600">24</p>
                                    <p class="text-sm text-gray-600">Hadir</p>
                                </div>
                                <div class="bg-red-50 rounded-lg p-4 text-center">
                                    <p class="text-2xl font-bold text-red-600">4</p>
                                    <p class="text-sm text-gray-600">Tidak Hadir</p>
                                </div>
                            </div>

                            <button onclick="aktivasiPresensi()" class="w-full bg-navy hover:bg-navy-dark text-white font-semibold py-3 rounded-xl transition duration-200 shadow-md hover:shadow-lg">
                                Aktifkan Presensi Wajah
                            </button>
                        </div>

                        <!-- Student List -->
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Daftar Siswa</h3>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg border border-green-200">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900">Ahmad Fauzi</p>
                                            <p class="text-sm text-gray-600">NIS: 2023001</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="px-3 py-1 bg-green-500 text-white rounded-full text-sm font-medium">Hadir</span>
                                        <span class="text-sm text-gray-500">10:05</span>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg border border-green-200">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900">Siti Nurhaliza</p>
                                            <p class="text-sm text-gray-600">NIS: 2023002</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="px-3 py-1 bg-green-500 text-white rounded-full text-sm font-medium">Hadir</span>
                                        <span class="text-sm text-gray-500">10:03</span>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-200">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0