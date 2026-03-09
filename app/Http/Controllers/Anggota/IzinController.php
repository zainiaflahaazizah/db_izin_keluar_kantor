<?php

namespace App\Http\Controllers\Anggota;

use App\Models\Izin;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class IzinController extends Controller
{
    /**
     * Display a listing of the member's own izin.
     */
    public function index(): View
    {
        $akun = auth()->user(); // akun yang login
        $izins = $akun->izins()->latest()->get(); // hanya izin milik pegawai ini
        return view('anggota.form-izin.index', compact('izins'));
    }

    /**
     * Show the form for creating a new izin.
     */
    public function create(): View
    {
        $pegawai = auth()->user()->pegawai;

        if (!$pegawai) {
            abort(403, 'Pegawai tidak ditemukan untuk akun ini.');
        }

        // Ambil semua pegawai dengan jabatan Ketua Tim
        $ketuaTim = \App\Models\Pegawai::where('jabatan', 'Ketua Tim')->get();

        return view('anggota.form-izin.create', compact('pegawai', 'ketuaTim'));
    }

    public function store(Request $request): RedirectResponse
    {
        $pegawai_id = auth()->user()->pegawai->id_pegawai;

        $request->validate([
            'alasan'             => 'required|string|max:255',
            'jam_keluar'         => ['required', 'regex:/^\d{2}:\d{2}(:\d{2})?$/'],
            'jam_kembali'        => ['nullable', 'regex:/^\d{2}:\d{2}(:\d{2})?$/'],
            'keterangan'         => 'nullable|string',
            'tujuan_persetujuan' => 'required|string|max:100',
        ]);

        Izin::create([
            'id_pegawai'         => $pegawai_id,
            'alasan'             => $request->alasan,
            'jam_keluar'         => $request->jam_keluar,
            'jam_kembali'        => $request->jam_kembali,
            'keterangan'         => $request->keterangan,
            'tujuan_persetujuan' => $request->tujuan_persetujuan,
            'status'             => 'menunggu',
        ]);

        return redirect()->route('anggota.izin.index')
            ->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified izin.
     */
    public function show(string $id_izin): View
    {
        $pegawai_id = auth()->user()->pegawai->id_pegawai;

        $izin = Izin::where('id_pegawai', $pegawai_id)
                    ->with('pegawai')
                    ->findOrFail($id_izin);

        return view('anggota.form-izin.show', compact('izin'));
    }

    /**
     * Show the form for editing the specified izin.
     */
    public function edit(string $id_izin): View
    {
        $pegawai_id = auth()->user()->pegawai->id_pegawai;

        $izin = Izin::where('id_pegawai', $pegawai_id)->findOrFail($id_izin);

        $ketuaTim = \App\Models\Pegawai::where('jabatan', 'Ketua Tim')->get();

        return view('anggota.form-izin.edit', compact('izin', 'ketuaTim'));
    }

    /**
     * Update the specified izin in storage.
     */
    public function update(Request $request, string $id_izin): RedirectResponse
    {

        // if ($izin->status !== 'menunggu') {
        //     return redirect()->route('anggota.izin.index')
        //         ->with('error', 'Izin yang sudah diproses tidak bisa diubah.');
        // }

        $pegawai_id = auth()->user()->pegawai->id_pegawai;

        $izin = Izin::where('id_pegawai', $pegawai_id)->findOrFail($id_izin);

        if ($izin->status !== 'menunggu') {
            return redirect()->route('anggota.izin.index')
                ->with('error', 'Izin yang sudah diproses tidak bisa diubah.');
        }

        $request->validate([
            'alasan'             => 'required|string|max:255',
            'jam_keluar'         => ['required', 'regex:/^\d{2}:\d{2}(:\d{2})?$/'],
            'jam_kembali'        => ['nullable', 'regex:/^\d{2}:\d{2}(:\d{2})?$/'],
            'keterangan'         => 'nullable|string',
            'tujuan_persetujuan' => 'required|string|max:100',
        ]);

        $izin->update($request->only([
            'alasan', 'jam_keluar', 'jam_kembali', 'keterangan', 'tujuan_persetujuan'
        ]));

        return redirect()->route('anggota.izin.index')
            ->with('success', 'Izin berhasil diperbarui!');
    }

    /**
     * Remove the specified izin from storage.
     */
    public function destroy(string $id_izin): RedirectResponse
    {
        $pegawai_id = auth()->user()->pegawai->id_pegawai;

        $izin = Izin::where('id_pegawai', $pegawai_id)->findOrFail($id_izin);
        $izin->delete();

        return redirect()->route('anggota.izin.index')
            ->with('success', 'Izin berhasil dihapus!');
    }
}
