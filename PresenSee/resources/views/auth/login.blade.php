<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - PresenSee</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Plus Jakarta Sans Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50 min-h-screen flex items-center justify-center p-4">
    
    <div class="w-full max-w-md">
        <!-- Logo Section -->
        <div class="text-center mb-8">
            <div class="inline-block bg-white p-4 rounded-2xl shadow-lg mb-4">
                <img src="{{ asset('images/Logo Fix.png') }}" alt="PresenSee Logo" class="h-16 w-auto">
            </div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang Kembali</h1>
            <p class="text-gray-600">Masuk ke akun PresenSee Anda</p>
        </div>
        
        <!-- Login Form Card -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
            
            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 rounded-xl p-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-red-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-red-800 mb-1">Terjadi kesalahan:</p>
                            <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            
            <!-- Success Message (if redirected from register) -->
            @if (session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 rounded-xl p-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-green-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-sm text-green-800">{{ session('success') }}</p>
                    </div>
                </div>
            @endif
            
            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf
                
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                        </div>
                        <input 
                            type="email" 
                            name="email_user" 
                            id="email_user" 
                            value="{{ old('email_user') }}"
                            class="w-full pl-12 pr-4 py-3 border rounded-xl focus:ring-2 focus:ring-[#004680] focus:border-transparent transition-all duration-200 @error('email') border-red-300 @enderror"
                            placeholder="nama@email.com"
                            required
                            autofocus
                        >
                    </div>
                    @error('email')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            class="w-full pl-12 pr-4 py-3 border rounded-xl focus:ring-2 focus:ring-[#004680] focus:border-transparent transition-all duration-200 @error('password') border-red-300 @enderror"
                            placeholder="Masukkan password Anda"
                            required
                        >
                    </div>
                    @error('password')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Login Button -->
                <button 
                    type="submit" 
                    class="w-full bg-[#004680] text-white font-semibold py-3 rounded-xl hover:bg-[#003766] focus:ring-4 focus:ring-blue-200 transition-all duration-200 shadow-lg hover:shadow-xl"
                >
                    Masuk
                </button>
            </form>
            
            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-200"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white text-gray-500">atau</span>
                </div>
            </div>
            
            <!-- Register Link -->
            <div class="text-center">
                <p class="text-sm text-gray-600">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="font-semibold text-[#004680] hover:text-[#003766] transition-colors duration-200">
                        Daftar sekarang
                    </a>
                </p>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="text-center mt-8">
            <p class="text-sm text-gray-500">
                &copy; {{ date('Y') }} PresenSee. Sistem Absensi Face Recognition.
            </p>
        </div>
    </div>
    
</body>
</html>