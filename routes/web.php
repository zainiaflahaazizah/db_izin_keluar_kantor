<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\PegawaiController;

use App\Http\Controllers\KepalaBPS\PegawaiController as KepalaBpsPegawai;
use App\Http\Controllers\KepalaBPS\IzinController as KepalaBpsIzin;
use App\Http\Controllers\KepalaBPS\DokumentasiController as KepalaBpsDokumentasi;
use App\Http\Controllers\KepalaBPS\PersetujuanController as KepalaBpsPersetujuan;

// Route::get('/', function () {
//     return view('welcome');
// });

//ADMIN
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::resource('akun', AkunController::class);

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/reset-password', function () {
    return view('auth.reset-password');
});

Route::get('/home', function () {
    return view('home');
});

//APPROVAL//
Route::get('/approval', function () {
        return view('approval');
});

Route::resource('pegawai', PegawaiController::class);
Route::resource('izin', IzinController::class);
Route::resource('dokumentasi', DokumentasiController::class);

Route::get('/approval', [PersetujuanController::class, 'index'])
    ->name('approval.index');
Route::patch('/approval/{id_izin}/setujui', [PersetujuanController::class, 'setujui'])
    ->name('approval.setujui');
Route::patch('/approval/{id_izin}/tolak', [PersetujuanController::class, 'tolak'])
    ->name('approval.tolak');


//KEPALA BPS

//KASUBBAG UMUM
//KETUA TIM
//ANGGOTA














// Route::get('/login', function () {
//     return view('auth.login'); // Memanggil file resources/views/auth/login.blade.php
// })->name('login');
