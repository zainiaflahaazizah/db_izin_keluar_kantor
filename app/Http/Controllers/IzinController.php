<?php

namespace App\Http\Controllers;

use App\Models\Izin;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class IzinController extends Controller
{
    public function index(): View
    {
        $izins = Izin::with('pegawai')->latest()->paginate(10);
        return view('form-izin.index', compact('izins'));
    }

    public function create(): View
    {
        $pegawais = Pegawai::orderBy('nama')->get();
        return view('form-izin.create', compact('pegawais'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_pegawai'         => 'required|exists:pegawais,id_pegawai',
            'alasan'             => 'required|string|max:255',
            'jam_keluar'         => ['required', 'regex:/^\d{2}:\d{2}(:\d{2})?$/'],
            'jam_kembali'        => ['nullable', 'regex:/^\d{2}:\d{2}(:\d{2})?$/'],
            'keterangan'         => 'nullable|string',
            'tujuan_persetujuan' => 'required|in:Ketua Tim,Kepala Subbagian Umum,Kepala BPS Banjar',
        ]);

        $jamKeluar  = substr($request->jam_keluar, 0, 5);
        $jamKembali = $request->jam_kembali ? substr($request->jam_kembali, 0, 5) : null;


        Izin::create([
            'id_pegawai'         => $request->id_pegawai,
            'alasan'             => $request->alasan,
            'jam_keluar'         => $request->jam_keluar,
            'jam_kembali'        => $request->jam_kembali,
            'keterangan'         => $request->keterangan,
            'tujuan_persetujuan' => $request->tujuan_persetujuan,
            'status'             => 'menunggu',
        ]);

        return redirect()->route('izin.index')
            ->with('success', 'Data berhasil disimpan');
    }

    public function show(string $id_izin): View
    {
        $izin = Izin::with('pegawai')->findOrFail($id_izin);
        return view('form-izin.show', compact('izin'));
    }

    public function edit(string $id_izin): View
    {
        $izin = Izin::with('pegawai')->findOrFail($id_izin);
        $pegawais = Pegawai::orderBy('nama')->get();

        return view('form-izin.edit', compact('izin', 'pegawais'));
    }

    public function update(Request $request, string $id_izin): RedirectResponse
    {
        $request->validate([
            'id_pegawai'         => 'required|exists:pegawais,id_pegawai',
            'alasan'             => 'required|string|max:255',
            'jam_keluar'         => ['required', 'regex:/^\d{2}:\d{2}(:\d{2})?$/'],
            'jam_kembali'        => ['nullable', 'regex:/^\d{2}:\d{2}(:\d{2})?$/'],
            'keterangan'         => 'nullable|string',
            'tujuan_persetujuan' => 'required|in:Ketua Tim,Kepala Subbagian Umum,Kepala BPS Banjar',
        ]);

        $jamKeluar  = substr($request->jam_keluar, 0, 5);
        $jamKembali = $request->jam_kembali ? substr($request->jam_kembali, 0, 5) : null;


        $izin = Izin::findOrFail($id_izin);
        $izin->update($request->all());

        return redirect()->route('izin.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(string $id_izin): RedirectResponse
    {
        Izin::findOrFail($id_izin)->delete();

        return redirect()->route('izin.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
