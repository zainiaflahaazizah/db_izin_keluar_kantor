@extends('layouts.anggota')

@section('title', 'Edit Dokumentasi')

@section('content')

<section class="section-padding" id="section_2">
    <div class="container">

        <!-- Judul -->
        <div class="row mb-4">
            <div class="col-lg-12 text-center">
                <h2 class="mb-3">Edit Dokumentasi</h2>
                <p class="text-muted">
                    Perbarui data dokumentasi kegiatan
                </p>
            </div>
        </div>

        <!-- Card Form -->
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm border-1">

                    <div class="card-header bg-white border-0">
                        <h5 class="mb-0 fw-bold">Form Edit Dokumentasi</h5>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('dokumentasi.update', $dokumentasi->id_dokumentasi) }}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Preview Foto Lama -->
                            <div class="mb-4 text-center">
                                <label class="form-label fw-semibold d-block">Foto Saat Ini</label>
                                <img src="{{ Storage::url($dokumentasi->foto) }}"
                                     class="img-fluid rounded shadow-sm mb-3"
                                     style="max-height: 300px;">
                            </div>

                            <!-- Upload Foto Baru -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Ganti Foto (Opsional)</label>
                                <input type="file"
                                       name="foto"
                                       class="form-control @error('foto') is-invalid @enderror">
                                <small class="text-muted">
                                    Kosongkan jika tidak ingin mengganti foto
                                </small>
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Latitude -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Latitude</label>
                                <input type="text"
                                       name="latitude"
                                       class="form-control @error('latitude') is-invalid @enderror"
                                       value="{{ old('latitude', $dokumentasi->latitude) }}"
                                       required>
                                @error('latitude')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Longitude -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Longitude</label>
                                <input type="text"
                                       name="longitude"
                                       class="form-control @error('longitude') is-invalid @enderror"
                                       value="{{ old('longitude', $dokumentasi->longitude) }}"
                                       required>
                                @error('longitude')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tombol -->
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('dokumentasi.index') }}"
                                   class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left"></i>
                                    Batal
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-1"></i>
                                    Update
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
