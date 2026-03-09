<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            // 🔥 redirect sesuai role
            return match ($role) {
                'admin' => redirect()->route('admin.dashboard'),
                'kepala_bps' => redirect()->route('kepala-bps.izin.index'),
                'kasubbag_umum' => redirect()->route('kasubbag-umum.izin.index'),
                'ketua_tim' => redirect()->route('ketua-tim.izin.index'),
                'anggota' => redirect()->route('anggota.izin.index'),
                default => abort(403),
            };
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
