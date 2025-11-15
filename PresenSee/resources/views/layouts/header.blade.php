<header class="sticky top-0 z-40 bg-white shadow-sm border-b border-gray-100">
    <div class="flex items-center justify-between px-8 py-4">
        <!-- Page Title -->
        <div>
            <h1 class="text-2xl font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
            <p class="text-sm text-gray-500 mt-0.5">@yield('page-subtitle', 'Selamat datang kembali!')</p>
        </div>
        
        <!-- User Profile Section -->
        <div class="flex items-center gap-4">
            <!-- Notifications -->
            <button class="relative p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-50 rounded-lg transition-all duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
                <!-- Notification Badge -->
                <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full"></span>
            </button>
            
            <!-- Profile Dropdown -->
            <div class="flex items-center gap-3 pl-4 border-l border-gray-200">
                <div class="text-right">
                    @if(auth()->check() && auth()->user()->role === 'admin')
                        <p class="text-sm font-semibold text-gray-900">{{ auth()->user()->name ?? 'Administrator' }}</p>
                        <p class="text-xs text-gray-500">Admin</p>
                        @elseif(auth()->check() && auth()->user()->role === 'guru')
                        <p class="text-sm font-semibold text-gray-900">{{ auth()->user()->name ?? 'Pak Budi' }}</p>
                        <p class="text-xs text-gray-500">Guru</p>
                    @endif
                </div>
                <div class="relative">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&background=004680&color=fff&size=128" alt="Profile" class="w-10 h-10 rounded-full border-2 border-blue-100">
                    <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></span>
                </div>
            </div>
        </div>
    </div>
</header>