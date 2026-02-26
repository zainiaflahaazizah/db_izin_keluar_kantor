@extends('layouts.anggota')

@section('title', 'Detail Dokumentasi')

@section('content')

<section class="section-padding" id="section_2">
    <div class="container">

        <!-- Judul -->
        <div class="row mb-4">
            <div class="col-lg-12 text-center">
                <h2 class="mb-3">Detail Dokumentasi</h2>
                <p class="text-muted">
                    Informasi lengkap dokumentasi kegiatan
                </p>
            </div>
        </div>

        <!-- Card Detail -->
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm border-1">

                    <div class="card-header bg-white border-0">
                        <h5 class="mb-0 fw-bold">Data Dokumentasi</h5>
                    </div>

                    <div class="card-body">

                        <!-- Foto -->
                        <div class="text-center mb-4">
                            <img src="{{ Storage::url($dokumentasi->foto) }}"
                                 class="img-fluid rounded shadow-sm"
                                 style="max-height: 350px;">
                        </div>

                        <!-- Detail Data -->
                        {{-- <table class="table table-borderless">
                            <tr>
                                <th class="text-start" width="30%">Latitude</th>
                                <td class="text-start">: {{ $dokumentasi->latitude }}</td>
                            </tr>
                            <tr>
                                <th class="text-start">Longitude</th>
                                <td class="text-start">: {{ $dokumentasi->longitude }}</td>
                            </tr>
                        </table> --}}

                        <!-- Tombol -->
                        <div class="d-flex justify-content-between mt-4">

                            <a href="{{ route('anggota.dokumentasi.index') }}"
                               class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i>
                                Kembali
                            </a>

                            {{-- <div class="d-flex gap-2">
                                <a href="{{ route('anggota.dokumentasi.edit', $dokumentasi->id_dokumentasi) }}"
                                   class="btn btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                    Edit
                                </a>

                                <form action="{{ route('anggota.dokumentasi.destroy', $dokumentasi->id_dokumentasi) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                        Hapus
                                    </button>
                                </form>
                            </div> --}}

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection
