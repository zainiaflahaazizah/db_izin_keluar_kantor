<?php

namespace App\Http\Controllers;

use App\Models\Izin;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratKeluarController extends Controller
{
    public function cetak($id)
    {
        $izin = Izin::where('id_izin', $id)->firstOrFail();
        $pdf = Pdf::loadView('surat-keluar-pdf', compact('izin'));
        return $pdf->stream('surat-izin-keluar.pdf');
    }

}
