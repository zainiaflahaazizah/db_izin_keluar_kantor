<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Dokumentasi;
use App\Models\Izin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DokumentasiController extends Controller
{

    public function index()
    {
        $dokumentasis = Dokumentasi::with(['pegawai','izin'])
                        ->latest()
                        ->get();

        return view('anggota.form-dokumentasi.index', compact('dokumentasis'));
    }
    // public function index(): View
    // {
    //     $dokumentasis = Dokumentasi::with('izin')
    //         ->whereHas('izin', function ($query) {
    //             $query->where('id_pegawai', Auth::user()->id_pegawai);
    //         })
    //         ->latest()
    //         ->get();

    //     return view('anggota.form-dokumentasi.index', compact('dokumentasis'));
    // }


    public function create(): View
    {
        // $izins = Izin::all();
        $izins = Izin::where('id_pegawai', Auth::user()->id_pegawai)->get();

        return view('anggota.form-dokumentasi.create', compact('izins'));
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_izin' => 'nullable|exists:izins,id_izin',

            'foto' => 'required|array',
            'foto.*' => 'image|mimes:jpeg,png,jpg|max:5120',

            'latitude' => 'nullable',
            'longitude' => 'nullable',
        ]);

        $files = $request->file('foto');

        foreach ($files as $file) {

            $path = $file->store('dokumentasi', 'public');

            Dokumentasi::create([
                'id_izin' => $request->id_izin,
                'foto' => $path,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude
            ]);
        }

        return redirect()->route('anggota.dokumentasi.index')
            ->with('success', 'Dokumentasi berhasil disimpan');
    }


    // public function show(string $id_dokumentasi): View
    // {
    //     $dokumentasi = Dokumentasi::with('izin')->findOrFail($id_dokumentasi);

    //     return view('anggota.form-dokumentasi.show', compact('dokumentasi'));
    // }
    public function show(string $id_dokumentasi): View
    {
        $dokumentasi = Dokumentasi::with('izin')
            ->where('id_dokumentasi', $id_dokumentasi)
            ->whereHas('izin', function ($query) {
                $query->where('id_pegawai', Auth::user()->id_pegawai);
            })
            ->firstOrFail();

        return view('anggota.form-dokumentasi.show', compact('dokumentasi'));
    }


    public function destroy(string $id_dokumentasi): RedirectResponse
    {
        // $dokumentasi = Dokumentasi::findOrFail($id_dokumentasi);
        $dokumentasi = Dokumentasi::where('id_dokumentasi', $id_dokumentasi)
        ->whereHas('izin', function ($query) {
            $query->where('id_pegawai', Auth::user()->id_pegawai);
        })
        ->firstOrFail();

        $dokumentasi->delete();

        return redirect()->route('anggota.dokumentasi.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
