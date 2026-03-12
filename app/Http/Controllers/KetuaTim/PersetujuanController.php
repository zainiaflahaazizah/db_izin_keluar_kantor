<?php

namespace App\Http\Controllers\KetuaTim;
use App\Http\Controllers\Controller;
use App\Models\Izin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PersetujuanController extends Controller
{
    /**
     * Tampilkan data izin yang menunggu persetujuan
     */
    public function index(): View
    {
        $namaKetuaTim = Auth::user()->pegawai->nama;

        $izins = Izin::with('pegawai')
            ->where('tujuan_persetujuan', 'like', '%'.$namaKetuaTim.'%')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('ketua-tim.persetujuan', compact('izins'));
    }

    /**
     * Setujui izin
     */
    public function setujui($id_izin): RedirectResponse
    {
        $namaKetuaTim = Auth::user()->pegawai->nama;

        $izin = Izin::where('id_izin', $id_izin)
            ->where('tujuan_persetujuan', 'like', '%'.$namaKetuaTim.'%')
            ->firstOrFail();

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
        $namaKetuaTim = Auth::user()->pegawai->nama;

        $izin = Izin::where('id_izin', $id_izin)
            ->where('tujuan_persetujuan', 'like', '%'.$namaKetuaTim.'%')
            ->firstOrFail();

        $izin->update([
            'status' => 'ditolak'
        ]);

        return redirect()->back()->with('success', 'Izin ditolak');
    }
}
