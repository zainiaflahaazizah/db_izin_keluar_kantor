@extends('layouts.ketua-tim')

@section('title', 'Tambah Dokumentasi')

@section('content')

<section class="section-padding" id="section_2">
    <div class="container">

        <!-- Judul -->
        <div class="row mb-4">
            <div class="col-lg-12 text-center">
                <h2 class="mb-3">Tambah Dokumentasi</h2>
                <p class="text-muted">
                    Unggah dokumentasi kegiatan yang telah dilakukan
                </p>
            </div>
        </div>

        <!-- Card Form -->
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm border-1">

                    <div class="card-header bg-white border-0">
                        <h5 class="mb-0 fw-bold">Form Dokumentasi</h5>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('ketua-tim.dokumentasi.store') }}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf

                            <!-- Upload Foto -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Foto Dokumentasi</label>
                                <input type="file"
                                       name="foto"
                                       class="form-control @error('foto') is-invalid @enderror"
                                       required>
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Latitude -->
                            {{-- <div class="mb-3">
                                <label class="form-label fw-semibold">Latitude</label>
                                <input type="text"
                                       name="latitude"
                                       class="form-control @error('latitude') is-invalid @enderror"
                                       value="{{ old('latitude') }}"
                                       placeholder="Contoh: -3.442190"
                                       required>
                                @error('latitude')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}

                            <!-- Longitude -->
                            {{-- <div class="mb-4">
                                <label class="form-label fw-semibold">Longitude</label>
                                <input type="text"
                                       name="longitude"
                                       class="form-control @error('longitude') is-invalid @enderror"
                                       value="{{ old('longitude') }}"
                                       placeholder="Contoh: 114.832430"
                                       required>
                                @error('longitude')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}

                            <!-- Tombol -->
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('ketua-tim.dokumentasi.index') }}"
                                   class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left"></i>
                                    Kembali
                                </a>

                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-save me-1"></i>
                                    Simpan
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection
