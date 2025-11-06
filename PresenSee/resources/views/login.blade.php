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
        <!-- Halaman Login -->
        <div id="loginPage" class="min-h-screen flex items-center justify-center px-4">
            <div class="w-full max-w-md">
                <!-- Logo dan Judul -->
                <div class="text-center mb-10">
                    <div class="inline-block bg-navy text-white w-20 h-20 rounded-2xl flex items-center justify-center mb-4 shadow-lg">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <h1 class="text-4xl font-bold text-navy mb-2">PresenSEE</h1>
                    <p class="text-gray-600 text-lg">Face Recognition Attendance</p>
                </div>

                <!-- Form Login Card -->
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Masuk</h2>
                    
                    <form id="loginForm">
                        <!-- Email/Username Input -->
                        <div class="mb-5">
                            <label class="block text-gray-700 text-sm font-semibold mb-2" for="username">
                                Email atau Username
                            </label>
                            <input 
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-navy focus:border-transparent transition" 
                                id="username" 
                                type="text" 
                                placeholder="Masukkan Username atau Email"
                                required
                            >
                        </div>

                        <!-- Password Input -->
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-semibold mb-2" for="password">
                                Password
                            </label>
                            <input 
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-navy focus:border-transparent transition" 
                                id="password" 
                                type="password" 
                                placeholder="Masukkan Password"
                                required
                            >
                        </div>

                        <!-- Login Button -->
                        <button 
                            type="submit" 
                            class="w-full bg-navy hover:bg-navy-dark text-white font-semibold py-3 rounded-xl transition duration-200 shadow-md hover:shadow-lg"
                        >
                            Masuk
                        </button>
                    </form>

                    <!-- Additional Links -->
                    <div class="mt-6 text-center">
                        <a href="#" class="text-sm text-navy hover:text-navy-dark font-medium">Lupa Password?</a>
                    </div>
                </div>

                <!-- Footer -->
                <p class="text-center text-gray-500 text-sm mt-8">
                    © 2025 PresenSEE. All rights reserved.
                </p>
            </div>
        </div>

        