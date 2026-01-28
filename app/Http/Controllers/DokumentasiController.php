<?php

namespace App\Http\Controllers;

use App\Models\Izin;
use Illuminate\View\View;
use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class DokumentasiController extends Controller
{
    public function index()
    {
        $dokumentasis = Dokumentasi::with('izin')->latest()->get();
        return view('form-dokumentasi.index', compact('dokumentasis'));
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
        return view('form-dokumentasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'id_izin' => 'required|exists:izins,id_izin',
            'foto'      => 'required|image|mimes:jpg,jpeg,png',
            // 'latitude'  => 'required',
            // 'longitude' => 'required',
        ]);

        $foto = $request->file('foto')->store('dokumentasi', 'public');

        Dokumentasi::create([
            // 'id_izin' => $request->id_izin,
            'foto'      => $foto,
            // 'latitude'  => $request->latitude,
            // 'longitude' => $request->longitude,
        ]);

        return redirect()->route('dokumentasi.index')
            ->with('success', 'Dokumentasi berhasil disimpan');
    }

    public function show(string $id_dokumentasi): View
    {
        $dokumentasi = Dokumentasi::with('izin')->findOrFail($id_dokumentasi);
        return view('form-dokumentasi.show', compact('dokumentasi'));
    }

    public function destroy(string $id_dokumentasi): RedirectResponse
    {
        Dokumentasi::findOrFail($id_dokumentasi)->delete();

        return redirect()->route('dokumentasi.index')
            ->with('success', 'Data berhasil dihapus');
    }

}
