<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AkunController extends Controller
{
     public function index() : View
    {
        //get all pegawais
        $akuns = Akun::latest()->paginate(10);

        //render view with pegawais
        return view('admin.akun.index', compact('akuns'));
    }

    public function create(): View
    {
        $pegawais = \App\Models\Pegawai::all();

        return view('admin.akun.create', compact('pegawais'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'username'        => 'required|unique:akuns,username',
            'password'        => 'required',
            'role'            => 'required',
            'id_pegawai'      => 'required|exists:pegawais,id_pegawai', // validasi
            ], [
            'username.unique' => 'Username sudah digunakan!',
        ]);

        // $request->validate([
        //     'username'        => 'required|string|max:100',
        //     'password'        => 'required|string',
        //     'role'            => 'required|in:Anggota,Ketua Tim,Kasubbag Umum,Kepala BPS,Admin',
        // ]);

        // //upload image
        // $image = $request->file('image');
        // $image->storeAs('pegawais', $image->hashName());

        //create akun
        Akun::create([
            'username'        => $request->username,
            'password'        => Hash::make($request->password),
            'role'            => $request->role,
            'id_pegawai'      => $request->id_pegawai,
        ]);

        //redirect to index
        return redirect()->route('admin.akun.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id_akun): View
    {
        //get izin by ID
        $akun = Akun::findOrFail($id_akun);

        //render view with pegawai
        return view('admin.akun.show', compact('akun'));
    }

    public function edit(string $id_akun): View
    {
        $akun = Akun::findOrFail($id_akun);
        $pegawais = \App\Models\Pegawai::all();

        return view('admin.akun.edit', compact('akun', 'pegawais'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id_akun
     * @return RedirectResponse
     */
    public function update(Request $request, $id_akun): RedirectResponse
    {
        $request->validate([
            'username'   => 'required|string|max:100',
            'role'       => 'required|in:anggota,ketua_tim,kasubbag_umum,kepala_bps,admin',
            'id_pegawai' => 'required|exists:pegawais,id_pegawai',
        ]);

        $akun = Akun::findOrFail($id_akun);

        $akun->username = $request->username;
        $akun->role = $request->role;
        $akun->id_pegawai = $request->id_pegawai;

        // hanya update password kalau diisi
        if ($request->filled('password')) {
            $akun->password = Hash::make($request->password);
        }

        $akun->save();

        return redirect()->route('admin.akun.index')
            ->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy($id_akun): RedirectResponse
    {
        //get akun by ID
        $akun = Akun::findOrFail($id_akun);

        //delete akun
        $akun->delete();

        //redirect to index
        return redirect()->route('admin.akun.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

