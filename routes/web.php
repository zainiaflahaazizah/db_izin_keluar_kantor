<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\Anggota\DokumentasiController as AnggotaDokumentasi;
use App\Http\Controllers\Anggota\IzinController as AnggotaIzin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\KasubbagUmum\DokumentasiController as KasubbagUmumDokumentasi;
use App\Http\Controllers\KasubbagUmum\IzinController as KasubbagUmumIzin;
use App\Http\Controllers\KasubbagUmum\PegawaiController as KasubbagUmumPegawai;
use App\Http\Controllers\KasubbagUmum\PersetujuanController as KasubbagUmumPersetujuan;
use App\Http\Controllers\KepalaBPS\DokumentasiController as KepalaBPSDokumentasi;
use App\Http\Controllers\KepalaBPS\IzinController as KepalaBPSIzin;
use App\Http\Controllers\KepalaBPS\PegawaiController as KepalaBPSPegawai;
use App\Http\Controllers\KepalaBPS\PersetujuanController as KepalaBPSPersetujuan;
use App\Http\Controllers\KetuaTim\DokumentasiController as KetuaTimDokumentasi;
use App\Http\Controllers\KetuaTim\IzinController as KetuaTimIzin;
use App\Http\Controllers\KetuaTim\PersetujuanController as KetuaTimPersetujuan;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\SuratKeluarController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| SEMUA HARUS LOGIN
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            Route::get('/dashboard', function () {
                return view('admin.dashboard');
            })->name('dashboard');

            Route::resource('akun', AkunController::class);
            Route::resource('pegawai', PegawaiController::class);
            Route::resource('izin', IzinController::class);
            Route::resource('dokumentasi', DokumentasiController::class);
        });

    Route::get('/approval', [PersetujuanController::class, 'index'])->name('approval.index');

    Route::put('/approval/{id_izin}/setujui', [PersetujuanController::class, 'setujui'])
        ->name('approval.setujui');

    Route::put('/approval/{id_izin}/tolak', [PersetujuanController::class, 'tolak'])
        ->name('approval.tolak');

    /*
    |--------------------------------------------------------------------------
    | ANGGOTA
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:anggota')
        ->prefix('anggota')
        ->name('anggota.')
        ->group(function () {

            Route::resource('izin', AnggotaIzin::class);
            Route::resource('dokumentasi', AnggotaDokumentasi::class);
        });

    /*
    |--------------------------------------------------------------------------
    | KETUA TIM
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:ketua_tim')
        ->prefix('ketua-tim')
        ->name('ketua-tim.')
        ->group(function () {

            Route::resource('izin', KetuaTimIzin::class);
            Route::resource('dokumentasi', KetuaTimDokumentasi::class);
            Route::resource('persetujuan', KetuaTimPersetujuan::class);
        });

    /*
    |--------------------------------------------------------------------------
    | KASUBBAG UMUM
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:kasubbag_umum')
        ->prefix('kasubbag-umum')
        ->name('kasubbag-umum.')
        ->group(function () {

            Route::resource('izin', KasubbagUmumIzin::class);
            Route::resource('dokumentasi', KasubbagUmumDokumentasi::class);
            Route::resource('pegawai', KasubbagUmumPegawai::class);

            Route::get('persetujuan', [KasubbagUmumPersetujuan::class, 'index'])
                ->name('persetujuan.index');
            Route::patch('persetujuan/{id_izin}/setujui', [KasubbagUmumPersetujuan::class, 'setujui'])
                ->name('persetujuan.setujui');
            Route::patch('persetujuan/{id_izin}/tolak', [KasubbagUmumPersetujuan::class, 'tolak'])
                ->name('persetujuan.tolak');
        });

    /*
    |--------------------------------------------------------------------------
    | KEPALA BPS
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:kepala_bps')
        ->prefix('kepala-bps')
        ->name('kepala-bps.')
        ->group(function () {

            Route::resource('izin', KepalaBPSIzin::class);
            Route::resource('dokumentasi', KepalaBPSDokumentasi::class);
            Route::resource('pegawai', KepalaBPSPegawai::class);

            Route::get('persetujuan', [KepalaBPSPersetujuan::class, 'index'])
                ->name('persetujuan.index');
            Route::patch('persetujuan/{id_izin}/setujui', [KepalaBPSPersetujuan::class, 'setujui'])
                ->name('persetujuan.setujui');
            Route::patch('persetujuan/{id_izin}/tolak', [KepalaBPSPersetujuan::class, 'tolak'])
                ->name('persetujuan.tolak');
        });

});

/*
|--------------------------------------------------------------------------
| SURAT KELUAR (BUTUH LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->get('/surat-keluar/{id}/pdf', [SuratKeluarController::class, 'cetak'])
    ->name('surat-keluar.pdf');
