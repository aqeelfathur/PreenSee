<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| DEFAULT REDIRECT
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    $user = Auth::user();

    if ($user && $user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    if ($user && $user->role === 'guru') {
        return redirect()->route('guru.dashboard');
    }

    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (Tanpa middleware dulu biar aman)
|--------------------------------------------------------------------------
*/

// Login & Register
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/guru', [AdminController::class, 'guru'])->name('guru');
        Route::get('/siswa', [AdminController::class, 'siswa'])->name('siswa');
        Route::get('/kelas-jadwal', [AdminController::class, 'kelasJadwal'])->name('kelas-jadwal');
        Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');
        Route::get('/pengaturan', [AdminController::class, 'pengaturan'])->name('pengaturan');
    });

/*
|--------------------------------------------------------------------------
| GURU ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('guru')
    ->name('guru.')
    ->group(function () {
        Route::get('/dashboard', [GuruController::class, 'dashboard'])->name('dashboard');
        Route::get('/sesi-presensi', [GuruController::class, 'sesiPresensi'])->name('sesi-presensi');
        Route::get('/presensi/{id}', [GuruController::class, 'presensiKamera'])->name('presensi-kamera');
        Route::post('/presensi-kamera/{id}/end', [GuruController::class, 'endPresensi'])->name('presensi-kamera.end');
        Route::get('/daftar-kelas', [GuruController::class, 'daftarKelas'])->name('daftar-kelas');
        Route::get('/wali-kelas', [GuruController::class, 'waliKelas'])->name('wali-kelas');
        Route::get('/pengaturan', [GuruController::class, 'pengaturan'])->name('pengaturan');
        Route::post('/pengaturan/update-profile', [GuruController::class, 'updateProfile'])->name('pengaturan.update-profile');
        Route::post('/pengaturan/update-password', [GuruController::class, 'updatePassword'])->name('pengaturan.update-password');
    });

/*
|--------------------------------------------------------------------------
| FALLBACK
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    return redirect('/login');
});