<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        return view('guru.dashboard');
    }

    // Daftar Sesi Presensi
    public function sesiPresensi()
    {
        return view('guru.sesi-presensi');
    }

    // Presensi Kamera
    public function presensiKamera($id)
    {
        // nanti $id bisa digunakan untuk menandai sesi yang sedang diabsen
        return view('guru.presensi-kamera', compact('id'));
    }

    // Daftar Kelas
    public function daftarKelas()
    {
        // TODO: Get classes taught by this teacher
        // TODO: Get students per class
        // TODO: Get meetings per class
        
        return view('guru.daftar-kelas');
    }
    
    // Manajemen Wali Kelas
    public function waliKelas()
    {
        // TODO: Get homeroom class
        // TODO: Get students in homeroom class
        // TODO: Get attendance statistics
        
        return view('guru.wali-kelas');
    }
    
    // Pengaturan (NEW)
    public function pengaturan()
    {
        return view('guru.pengaturan');
    }
    
    // Update Profile (NEW)
    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string',
            'photo' => 'nullable|image|max:2048'
        ]);
        
        // TODO: Update user profile
        // TODO: Handle photo upload
        
        return redirect()->route('guru.pengaturan')
            ->with('success', 'Profil berhasil diperbarui');
    }
    
    // Update Password (NEW)
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);
        
        // TODO: Verify current password
        // TODO: Update password
        
        return redirect()->route('guru.pengaturan')
            ->with('success', 'Password berhasil diperbarui');
    }
}