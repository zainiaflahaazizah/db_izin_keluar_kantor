<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\Anggota\IzinController as AnggotaIzin;;
use App\Http\Controllers\Anggota\DokumentasiController as AnggotaDokumentasi;;
use App\Http\Controllers\KetuaTim\IzinController as KetuaTimizin;;
use App\Http\Controllers\KetuaTim\DokumentasiController as KetuaTimDokumentasi;;
use App\Http\Controllers\KetuaTim\PersetujuanController as KetuaTimPersetujuan;;
use App\Http\Controllers\KasubbagUmum\IzinController as KasubbagUmumIzin;;
use App\Http\Controllers\KasubbagUmum\DokumentasiController as KasubbagUmumDokumentasi;;
use App\Http\Controllers\KasubbagUmum\PegawaiController as KasubbagUmumPegawai;;
use App\Http\Controllers\KasubbagUmum\PersetujuanController as KasubbagUmumPersetujuan;
use App\Http\Controllers\KepalaBPS\IzinController as KepalaBPSIzin;;
use App\Http\Controllers\KepalaBPS\DokumentasiController as KepalaBPSDokumentasi;;
use App\Http\Controllers\KepalaBPS\PegawaiController as KepalaBPSPegawai;;
use App\Http\Controllers\KepalaBPS\PersetujuanController as KepalaBPSPersetujuan;


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



// KEPALA BPS
Route::prefix('kepala-bps')->group(function () {
    Route::get('/form-izin', [IzinController::class, 'indexKepala'])
        ->name('kepala-bps.form-izin.index');

    Route::get('/form-izin/create', [IzinController::class, 'createKepala'])
        ->name('kepala-bps.form-izin.create');
});

// ANGGOTA
Route::get('/anggota', function () {
    return view('layouts.anggota');
});
Route::prefix('anggota')->name('anggota.')->group(function () {
    Route::resource('izin', AnggotaIzin::class);
});
Route::prefix('anggota')->name('anggota.')->group(function () {
    Route::resource('dokumentasi', AnggotaDokumentasi::class);
});


// KETUA TIM
Route::get('/ketua-tim', function () {
    return view('layouts.ketua-tim');
});
Route::prefix('ketua-tim')->name('ketua-tim.')->group(function () {
    Route::resource('izin', KetuaTimIzin::class);
});
Route::prefix('ketua-tim')->name('ketua-tim.')->group(function () {
    Route::resource('dokumentasi', KetuaTimDokumentasi::class);
});
Route::prefix('ketua-tim')->name('ketua-tim.')->group(function () {
    Route::resource('persetujuan', KetuaTimPersetujuan::class);
});

//KASUBBAG UMUM
Route::prefix('kasubbag-umum')->name('kasubbag-umum.')->group(function () {
    Route::resource('izin', KasubbagUmumIzin::class);
});
Route::prefix('kasubbag-umum')->name('kasubbag-umum.')->group(function () {
    Route::resource('dokumentasi', KasubbagUmumDokumentasi::class);
});
Route::prefix('kasubbag-umum')->name('kasubbag-umum.')->group(function () {
    Route::resource('pegawai', KasubbagUmumPegawai::class);
});
Route::prefix('kasubbag-umum')->name('kasubbag-umum.')->group(function () {
    Route::get('persetujuan', [KasubbagUmumPersetujuan::class, 'index'])
        ->name('persetujuan.index');
    Route::patch('persetujuan/{id_izin}/setujui', [KasubbagUmumPersetujuan::class, 'setujui'])
        ->name('persetujuan.setujui');
    Route::patch('persetujuan/{id_izin}/tolak', [KasubbagUmumPersetujuan::class, 'tolak'])
        ->name('persetujuan.tolak');
});


//KEPALA BPS
Route::prefix('kepala-bps')->name('kepala-bps.')->group(function () {
    Route::resource('izin', KepalaBPSIzin::class);
});
Route::prefix('kepala-bps')->name('kepala-bps.')->group(function () {
    Route::resource('dokumentasi', KepalaBPSDokumentasi::class);
});


//SURAT KELUAR
Route::get('/surat-keluar/{id}/pdf', [SuratKeluarController::class, 'cetak'])
    ->name('surat-keluar.pdf');








// Route::get('/anggota2', function () {
//     return view('layouts.anggota2');
// });
// Route::get('/anggota3', function () {
//     return view('layouts.anggota3');
// });
