<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman login
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole();
        }
        return view('auth.login');
    }

    /**
     * Proses login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email_user' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email_user.required' => 'Email wajib diisi',
            'email_user.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        $credentials = $request->only('email_user', 'password');
        
        // Cek apakah user ada
        $user = User::where('email_user', $credentials['email_user'])->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'email_user' => ['Email tidak terdaftar'],
            ]);
        }

        // Cek status user
        if ($user->status !== 'Aktif') {
            throw ValidationException::withMessages([
                'email_user' => ['Akun Anda tidak aktif. Hubungi administrator.'],
            ]);
        }

        // Attempt login
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return $this->redirectBasedOnRole();
        }

        throw ValidationException::withMessages([
            'password' => ['Password yang Anda masukkan salah'],
        ]);
    }

    /**
     * Tampilkan halaman register
     */
    public function showRegister()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole();
        }
        return view('auth.register');
    }

    /**
     * Proses register
     */
    public function register(Request $request)
    {
        $request->validate([
            'nama_user' => 'required|string|max:255',
            'email_user' => 'required|email|unique:users,email_user',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:admin,guru',
        ], [
            'nama_user.required' => 'Nama wajib diisi',
            'email_user.required' => 'Email wajib diisi',
            'email_user.email' => 'Format email tidak valid',
            'email_user.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'role.required' => 'Role wajib dipilih',
            'role.in' => 'Role tidak valid',
        ]);

        $user = User::create([
            'nama_user' => $request->nama_user,
            'email_user' => $request->email_user,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => 'Aktif',
        ]);

        Auth::login($user);

        return $this->redirectBasedOnRole();
    }

    /**
     * Proses logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil logout');
    }

    /**
     * Redirect berdasarkan role user
     */
    private function redirectBasedOnRole()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->isGuru()) {
            return redirect()->route('guru.dashboard');
        }

        // Fallback jika role tidak dikenali
        Auth::logout();
        return redirect()->route('login')->with('error', 'Role tidak valid');
    }
}