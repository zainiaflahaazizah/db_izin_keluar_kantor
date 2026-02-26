@extends('layouts.anggota')

@section('title', 'Tambah Izin')

@section('content')
<section class="section-padding">
    <div class="container">

        <!-- Judul -->
        <div class="row mb-4">
            <div class="col-lg-12 text-center">
                <h2 class="mb-3">Ajukan Izin Keluar Kantor</h2>
                <p class="text-muted">
                    Silakan lengkapi form izin keluar kantor
                </p>
            </div>
        </div>

        <!-- Card Form -->
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm border-1">
                    <div class="card-header bg-white border-0">
                        <h5 class="mb-0 fw-bold">Form Izin</h5>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('ketua-tim.izin.store') }}" method="POST">
                            @csrf

                            <!-- Pegawai -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Pegawai</label>
                                <select name="id_pegawai"
                                        id="id_pegawai"
                                        class="form-select @error('id_pegawai') is-invalid @enderror"
                                        required>
                                    <option value="">-- Pilih Nama Pegawai --</option>

                                    @foreach ($pegawais as $pegawai)
                                        <option value="{{ $pegawai->id_pegawai }}"
                                                data-nip="{{ $pegawai->nip }}"
                                                data-jabatan="{{ $pegawai->jabatan }}"
                                                {{ old('id_pegawai') == $pegawai->id_pegawai ? 'selected' : '' }}>
                                            {{ $pegawai->nama }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('id_pegawai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- NIP -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">NIP</label>
                                <input type="text"
                                    id="nip"
                                    class="form-control bg-light"
                                    readonly>
                            </div>

                            <!-- Jabatan -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Jabatan</label>
                                <input type="text"
                                    id="jabatan"
                                    class="form-control bg-light"
                                    readonly>
                            </div>

                            <!-- Alasan -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Alasan Keluar</label>

                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input
                                            type="radio"
                                            name="alasan"
                                            id="alasanPribadi"
                                            value="Pribadi"
                                            class="form-check-input @error('alasan') is-invalid @enderror"
                                            {{ old('alasan') == 'Pribadi' ? 'checked' : '' }}
                                            required
                                        >
                                        <label class="form-check-label" for="alasanPribadi">
                                            Pribadi
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input
                                            type="radio"
                                            name="alasan"
                                            id="alasanDinas"
                                            value="Dinas"
                                            class="form-check-input @error('alasan') is-invalid @enderror"
                                            {{ old('alasan') == 'Dinas' ? 'checked' : '' }}
                                        >
                                        <label class="form-check-label" for="alasanDinas">
                                            Dinas
                                        </label>
                                    </div>
                                </div>

                                @error('alasan')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Jam -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Jam Keluar</label>
                                    <input type="time"
                                           name="jam_keluar"
                                           class="form-control @error('jam_keluar') is-invalid @enderror"
                                           value="{{ old('jam_keluar') }}"
                                           required>
                                    @error('jam_keluar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Jam Kembali</label>
                                    <input type="time"
                                           name="jam_kembali"
                                           class="form-control @error('jam_kembali') is-invalid @enderror"
                                           value="{{ old('jam_kembali') }}">
                                    @error('jam_kembali')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Keterangan -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Keterangan</label>
                                <textarea name="keterangan"
                                          class="form-control @error('keterangan') is-invalid @enderror"
                                          rows="3"
                                          placeholder="Contoh: Survey lapangan">{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tujuan Persetujuan -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Tujuan Persetujuan</label>
                                <select name="tujuan_persetujuan"
                                        class="form-select @error('tujuan_persetujuan') is-invalid @enderror"
                                        required>
                                    <option value="">-- Pilih Tujuan --</option>
                                    <option value="Ketua Tim" {{ old('tujuan_persetujuan') == 'Ketua Tim' ? 'selected' : '' }}>
                                        Ketua Tim
                                    </option>
                                    <option value="Kepala Subbagian Umum" {{ old('tujuan_persetujuan') == 'Kepala Subbagian Umum' ? 'selected' : '' }}>
                                        Kepala Subbagian Umum
                                    </option>
                                    <option value="Kepala BPS Banjar" {{ old('tujuan_persetujuan') == 'Kepala BPS Banjar' ? 'selected' : '' }}>
                                        Kepala BPS Banjar
                                    </option>
                                </select>
                                @error('tujuan_persetujuan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tombol -->
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('ketua-tim.izin.index') }}"
                                   class="btn btn-secondary">
                                    Kembali
                                </a>

                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-save me-1"></i>
                                    Simpan Izin
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const selectPegawai = document.getElementById('id_pegawai');
    const nipInput = document.getElementById('nip');
    const jabatanInput = document.getElementById('jabatan');

    function setPegawaiData() {
        const selectedOption = selectPegawai.options[selectPegawai.selectedIndex];

        nipInput.value = selectedOption.getAttribute('data-nip') ?? '';
        jabatanInput.value = selectedOption.getAttribute('data-jabatan') ?? '';
    }

    // saat ganti pegawai
    selectPegawai.addEventListener('change', setPegawaiData);

    // saat reload karena error validation
    if (selectPegawai.value) {
        setPegawaiData();
    }
});
</script>

@endsection
