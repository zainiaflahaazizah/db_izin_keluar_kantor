<?php

namespace App\Http\Controllers\KasubbagUmum;

use App\Models\Izin;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class PersetujuanController extends Controller
{
    /**
     * Tampilkan data izin yang menunggu persetujuan
     */
    public function index(): View
    {
        $izins = Izin::with('pegawai')
            ->orderByRaw("tujuan_persetujuan LIKE '%Kepala Subbagian Umum%' DESC")
            ->orderBy('created_at','desc')
            ->get();

        return view('kasubbag-umum.persetujuan', compact('izins'));
    }

    /**
     * Setujui izin
     */
    public function setujui($id_izin): RedirectResponse
    {
        $izin = Izin::findOrFail($id_izin);

        if (!str_contains($izin->tujuan_persetujuan, 'Kepala Subbagian Umum')) {
            return redirect()->back()->with('error', 'Anda tidak berhak menyetujui izin ini');
        }

        $izin->update([
            'status' => 'disetujui'
        ]);

        return redirect()->back()->with('success', 'Izin disetujui');
    }

    /**
     * Tolak izin
     */
    public function tolak($id_izin): RedirectResponse
    {
        $izin = Izin::findOrFail($id_izin);

        if (!str_contains($izin->tujuan_persetujuan, 'Kepala Subbagian Umum')) {
            return redirect()->back()->with('error', 'Anda tidak berhak menolak izin ini');
        }

        $izin->update([
            'status' => 'ditolak'
        ]);

        return redirect()->back()->with('success', 'Izin ditolak');
    }
}
