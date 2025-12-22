<?php

namespace App\Http\Controllers;
use App\Models\Pegawai;
use Illuminate\View\View;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
//import Facades Storage
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function index() : View
    {
        //get all pegawais
        $pegawais = Pegawai::latest()->paginate(10);

        //render view with pegawais
        return view('pegawai.index', compact('pegawais'));
    }

    public function create(): View
    {
        return view('pegawai.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama'            => 'required|string|max:100',
            'nip'             => 'required|string|max:18',
            'nip_bps'         => 'required|string|max:10',
            'jabatan'         => 'required|in:Anggota,Ketua Tim,Kepala Subbagian Umum,Kepala BPS',
            'wilayah'         => 'required|string|max:100',
            'status'          => 'required|string|max:50',
            'pendidikan'      => 'required|string|max:100',
            'tempat_lahir'    => 'required|string|max:100',
            'tanggal_lahir'   => 'required|date',
            'agama'           => 'required|string|max:50'
        ]);

        // //upload image
        // $image = $request->file('image');
        // $image->storeAs('pegawais', $image->hashName());

        //create pegawai
        Pegawai::create([
            'nama'            => $request->nama,
            'nip'             => $request->nip,
            'nip_bps'         => $request->nip_bps,
            'jabatan'         => $request->jabatan,
            'wilayah'         => $request->wilayah,
            'status'          => $request->status,
            'pendidikan'      => $request->pendidikan,
            'tempat_lahir'    => $request->tempat_lahir,
            'tanggal_lahir'   => $request->tanggal_lahir,
            'agama'           => $request->agama,
        ]);

        //redirect to index
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id_pegawai): View
    {
        //get pegawai by ID
        $pegawai = Pegawai::findOrFail($id_pegawai);

        //render view with pegawai
        return view('pegawai.show', compact('pegawai'));
    }

    /**
     * edit
     *
     * @param  mixed $id_pegawai
     * @return View
     */
    public function edit(string $id_pegawai): View
    {
        //get pegawai by ID
        $pegawai = Pegawai::findOrFail($id_pegawai);

        //render view with pegawai
        return view('pegawai.edit', compact('pegawai'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id_pegawai
     * @return RedirectResponse
     */
    public function update(Request $request, $id_pegawai): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama'            => 'required|string|max:100',
            'nip'             => 'required|string|max:18',
            'nip_bps'         => 'required|string|max:10',
            'jabatan'         => 'required|in:Anggota,Ketua Tim,Kepala Subbagian Umum,Kepala BPS',
            'wilayah'         => 'required|string|max:100',
            'status'          => 'required|string|max:50',
            'pendidikan'      => 'required|string|max:100',
            'tempat_lahir'    => 'required|string|max:100',
            'tanggal_lahir'   => 'required|date',
            'agama'           => 'required|string|max:50'
        ]);

        //get pegawai by ID
        $pegawai = Pegawai::findOrFail($id_pegawai);

        $pegawai->update([
        'nama'          => $request->nama,
        'nip'           => $request->nip,
        'nip_bps'       => $request->nip_bps,
        'jabatan'       => $request->jabatan,
        'wilayah'       => $request->wilayah,
        'status'        => $request->status,
        'pendidikan'    => $request->pendidikan,
        'tempat_lahir'  => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'agama'         => $request->agama,
    ]);

        //redirect to index
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id_pegawai): RedirectResponse
    {
        //get pegawai by ID
        $pegawai = Pegawai::findOrFail($id_pegawai);

        //delete pegawai
        $pegawai->delete();

        //redirect to index
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
