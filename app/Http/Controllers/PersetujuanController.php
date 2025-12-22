<?php

namespace App\Http\Controllers;

use App\Models\Izin;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PersetujuanController extends Controller
{
    /**
     * Tampilkan data izin yang menunggu persetujuan
     */
    public function index(): View
    {
        $izins = Izin::with('pegawai')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('approval', compact('izins'));
    }

    /**
     * Setujui izin
     */
    public function setujui($id_izin): RedirectResponse
    {
        $izin = Izin::findOrFail($id_izin);

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

        $izin->update([
            'status' => 'ditolak'
        ]);

        return redirect()->back()->with('success', 'Izin ditolak');
    }
}
