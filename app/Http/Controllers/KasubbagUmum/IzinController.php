<?php

namespace App\Http\Controllers\KasubbagUmum;

use App\Models\Izin;
use App\Models\Pegawai;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class IzinController extends Controller
{
    public function index(): View
    {
        $akun = auth()->user(); // akun yang login
        $izins = $akun->izins()->latest()->get(); // hanya izin milik pegawai ini
        return view('kasubbag-umum.form-izin.index', compact('izins'));
    }

    // public function index() : View
    // {
    //     //get all izins
    //     $izins = Izin::latest()->paginate(10);

    //     //render view with izins
    //     return view('kasubbag-umum.form-izin.index', compact('izins'));
    // }


    public function create(): View
    {
        $pegawai = auth()->user()->pegawai;

        if (!$pegawai) {
            abort(403, 'Pegawai tidak ditemukan untuk akun ini.');
        }

        // Ambil semua pegawai dengan jabatan Ketua Tim
        // $ketuaTim = \App\Models\Pegawai::where('jabatan', 'Ketua Tim')->get();
        $kepalaBps = Pegawai::where('jabatan', 'Kepala BPS')->get();

        return view('kasubbag-umum.form-izin.create', compact('pegawai', 'kepalaBps'));
    }

    public function store(Request $request): RedirectResponse
    {
        $pegawai_id = auth()->user()->pegawai->id_pegawai;
        $request->validate([
            'id_pegawai'         => 'required|exists:pegawais,id_pegawai',
            'alasan'             => 'required|string|max:255',
            'jam_keluar'         => ['required', 'regex:/^\d{2}:\d{2}(:\d{2})?$/'],
            'jam_kembali'        => ['nullable', 'regex:/^\d{2}:\d{2}(:\d{2})?$/'],
            'keterangan'         => 'nullable|string',
            'tujuan_persetujuan' => 'required|string|max:255',
        ]);

        // $jamKeluar  = substr($request->jam_keluar, 0, 5);
        // $jamKembali = $request->jam_kembali ? substr($request->jam_kembali, 0, 5) : null;


        Izin::create([
            'id_pegawai'         => $pegawai_id,
            'alasan'             => $request->alasan,
            'jam_keluar'         => $request->jam_keluar,
            'jam_kembali'        => $request->jam_kembali,
            'keterangan'         => $request->keterangan,
            'tujuan_persetujuan' => $request->tujuan_persetujuan,
            'status'             => 'menunggu',
        ]);

        return redirect()->route('kasubbag-umum.izin.index')
            ->with('success', 'Izin berhasil disimpan');
    }

    public function show(string $id_izin): View
    {
        $pegawai_id = auth()->user()->pegawai->id_pegawai;

        $izin = Izin::where('id_pegawai', $pegawai_id)
                    ->with('pegawai')
                    ->findOrFail($id_izin);

         return view('kasubbag-umum.form-izin.show', compact('izin'));
    }

    public function edit(string $id_izin): View
    {
        $pegawai_id = auth()->user()->pegawai->id_pegawai;

        $izin = Izin::where('id_pegawai', $pegawai_id)->findOrFail($id_izin);

        $kepalaBps = \App\Models\Pegawai::where('jabatan', 'Kepala BPS')->get();

        return view('kasubbag-umum.form-izin.edit', compact('izin', 'kepalaBps'));
    }

    public function update(Request $request, string $id_izin): RedirectResponse
    {

        $pegawai_id = auth()->user()->pegawai->id_pegawai;

        $izin = Izin::where('id_pegawai', $pegawai_id)->findOrFail($id_izin);

        if ($izin->status !== 'menunggu') {
            return redirect()->route('kasubbag-umum.izin.index')
                ->with('error', 'Izin yang sudah diproses tidak bisa diubah.');
        }

        $request->validate([
            'id_pegawai'         => 'required|exists:pegawais,id_pegawai',
            'alasan'             => 'required|string|max:255',
            'jam_keluar'         => ['required', 'regex:/^\d{2}:\d{2}(:\d{2})?$/'],
            'jam_kembali'        => ['nullable', 'regex:/^\d{2}:\d{2}(:\d{2})?$/'],
            'keterangan'         => 'nullable|string',
            'tujuan_persetujuan' => 'required|string|max:255',
        ]);

        $jamKeluar  = substr($request->jam_keluar, 0, 5);
        $jamKembali = $request->jam_kembali ? substr($request->jam_kembali, 0, 5) : null;


        $izin->update($request->only([
            'alasan', 'jam_keluar', 'jam_kembali', 'keterangan', 'tujuan_persetujuan'
        ]));

        return redirect()->route('kasubbag-umum.izin.index')
            ->with('success', 'Izin berhasil diperbarui');
    }

    public function destroy(string $id_izin): RedirectResponse
    {
        $pegawai_id = auth()->user()->pegawai->id_pegawai;

        $izin = Izin::where('id_pegawai', $pegawai_id)->findOrFail($id_izin);
        $izin->delete();

        return redirect()->route('kasubbag-umum.izin.index')
            ->with('success', 'Izin berhasil dihapus');
    }

}
