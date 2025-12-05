<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $user = Auth::user();

        // Cek status user
        if ($user->status !== 'Aktif') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return redirect()->route('login')->with('error', 'Akun Anda tidak aktif. Hubungi administrator.');
        }

        // Jika ada parameter role, cek apakah user memiliki role yang sesuai
        if (!empty($roles)) {
            if (!in_array($user->role, $roles)) {
                // Redirect ke dashboard sesuai role user
                if ($user->isAdmin()) {
                    return redirect()->route('admin.dashboard')->with('error', 'Anda tidak memiliki akses ke halaman tersebut');
                }
                
                if ($user->isGuru()) {
                    return redirect()->route('guru.dashboard')->with('error', 'Anda tidak memiliki akses ke halaman tersebut');
                }

                // Fallback
                return redirect()->route('login')->with('error', 'Akses ditolak');
            }
        }

        return $next($request);
    }
}