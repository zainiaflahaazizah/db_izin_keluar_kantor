<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

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


// //FORM IZIN//
Route::get('/formizin', function () {
        return view('formizin');
});
// Route::get('/tabel-izin', function () {
//     return view('tabel-izin');
// });
// Route::get('/form-izin-2', function () {
//     return view('anggota.form-izin-2');
// });

Route::get('/form-izin-index', function () {
        return view('form-izin.index');
});
Route::get('/form-izin-create', function () {
        return view('form-izin.create');
});
Route::get('/form-izin-edit', function () {
        return view('form-izin.edit');
});
Route::get('/form-izin-show', function () {
        return view('form-izin.show ');
});


//FORM DIKUMENTASI//
// Route::get('/form-dokumentasi', function () {
//         return view('anggota.form-dokumentasi');
// });
// Route::get('/form-doc', function () {
//     return view('anggota.form-doc');
// });

Route::get('/form-dokumentasi-index', function () {
        return view('form-dokumentasi.index');
});


//APPROVAL//
Route::get('/approval', function () {
        return view('approval');
});


//PEGAWAI//
// Route::get('/index-pegawai', function () {
//         return view('pegawai.index');
// });
// Route::get('/pegawai-index', function () {
//         return view('pegawai.index');
// });
// Route::get('/pegawai-create', function () {
//         return view('pegawai.create');
// });
// Route::get('/pegawai-edit', function () {
//         return view('pegawai.edit');
// });
// Route::get('/pegawai-show', function () {
//         return view('pegawai.show');
// });


//--------------------------------------------------------------------------------------------//


Route::resource('pegawai', PegawaiController::class);















// Route::get('/approval', function () {
//         return view('kepala-bps.approval');
// });

// Route::resource('/pegawai', PegawaiController::class);

// Route::get('/pegawai', function () {
//         return view('admin.pegawai');
// });

// Route::get('/login', function () {
//     return view('auth.login'); // Memanggil file resources/views/auth/login.blade.php
// })->name('login');
