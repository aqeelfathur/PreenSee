<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function guru()
    {
        return view('admin.guru');
    }

    public function siswa()
    {
        return view('admin.siswa');
    }

    public function kelasJadwal()
    {
        return view('admin.kelas-jadwal');
    }

    public function laporan()
    {
        return view('admin.laporan');
    }

    public function pengaturan()
    {
        return view('admin.pengaturan');
    }
}