<?php

namespace App\Http\Controllers\KetuaTim;

use App\Http\Controllers\Controller;
use App\Models\Dokumentasi;
use App\Models\Izin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DokumentasiController extends Controller
{
    public function index()
    {
        // $dokumentasis = Dokumentasi::with(['pegawai','izin']) ->latest() ->get();
        $dokumentasis = Dokumentasi::with(['pegawai', 'izin'])->latest()->get();
        return view('ketua-tim.form-dokumentasi.index', compact('dokumentasis'));
    }

    // public function createFromIzin(Izin $izin)
    // {
    //     return view('form-dokumentasi.create', compact('izin'));
    // }

    // public function create()
    // {
    //     abort(404);
    //     // atau redirect()->route('izin.index');
    // }

    public function create(): View
    {
        // $izins = Izin::all();
        $izins = Izin::where('id_pegawai', Auth::user()->id_pegawai)->get();

        return view('ketua-tim.form-dokumentasi.create', compact('izins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_izin'   => 'nullable|exists:izins,id_izin',
            'foto'      => 'required|array',
            'foto.*'    => 'image|mimes:jpeg,png,jpg|max:10240',
            'latitude'  => 'nullable',
            'longitude' => 'nullable',
        ]);

        $files = $request->file('foto');

        foreach ($files as $file) {

            $path = $file->store('dokumentasi', 'public');

            Dokumentasi::create([
                'id_pegawai' => Auth::user()->id_pegawai,
                'id_izin'    => $request->id_izin,
                'foto'       => $path,
                'latitude'   => $request->latitude,
                'longitude'  => $request->longitude
            ]);
        }

        return redirect()->route('ketua-tim.dokumentasi.index')
            ->with('success', 'Dokumentasi berhasil disimpan');
    }

    public function show(string $id_dokumentasi)
    {
        // $dokumentasi = Dokumentasi::with(['pegawai','izin'])
        //     ->where('id_dokumentasi', $id_dokumentasi)
        //     ->where('id_pegawai', Auth::user()->id_pegawai)
        //     ->firstOrFail();
        $dokumentasi = Dokumentasi::with(['pegawai','izin'])->findOrFail($id_dokumentasi);
        return view('ketua-tim.form-dokumentasi.show', compact('dokumentasi'));
    }

    public function destroy(string $id_dokumentasi): RedirectResponse
    {
        $dokumentasi = Dokumentasi::findOrFail($id_dokumentasi);

        // hanya boleh hapus milik sendiri
        if ($dokumentasi->id_pegawai != Auth::user()->id_pegawai) {
            abort(403, 'Anda tidak memiliki izin menghapus data ini');
        }

        $dokumentasi->delete();

        return redirect()->route('ketua-tim.dokumentasi.index')
            ->with('success', 'Data berhasil dihapus');
    }

}
