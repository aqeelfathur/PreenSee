<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/sesi_presensi', function () {
    return view('sesipresensi');
});

Route::get('/buat_sesi', function () {
    return view('buatsesi');
});