@extends('layouts.anggota')

@section('title', 'Edit Izin')

@section('content')
<section class="section-padding">
    <div class="container">

        <div class="row mb-4">
            <div class="col-lg-12 text-center">
                <h2 class="mb-3">Edit Izin Keluar Kantor</h2>
                <p class="text-muted">
                    Perbarui data izin keluar kantor
                </p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm border-1">
                    <div class="card-header bg-white border-0">
                        <h5 class="mb-0 fw-bold">Form Izin</h5>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('ketua-tim.izin.update', $izin->id_izin) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Nama -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Pegawai</label>
                                <select name="id_pegawai"
                                        id="id_pegawai"
                                        class="form-select"
                                        required>
                                    @foreach ($pegawais as $pegawai)
                                        <option value="{{ $pegawai->id_pegawai }}"
                                            data-nip="{{ $pegawai->nip }}"
                                            data-jabatan="{{ $pegawai->jabatan }}"
                                            {{ $izin->id_pegawai == $pegawai->id_pegawai ? 'selected' : '' }}>
                                            {{ $pegawai->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- NIP -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">NIP</label>
                                <input type="text" id="nip" class="form-control bg-light" readonly>
                            </div>

                            <!-- Jabatan -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Jabatan</label>
                                <input type="text" id="jabatan" class="form-control bg-light" readonly>
                            </div>

                            <!-- Alasan -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Alasan Keluar</label>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input type="radio"
                                               name="alasan"
                                               value="Pribadi"
                                               class="form-check-input"
                                               {{ $izin->alasan == 'Pribadi' ? 'checked' : '' }}>
                                        <label class="form-check-label">Pribadi</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="radio"
                                               name="alasan"
                                               value="Dinas"
                                               class="form-check-input"
                                               {{ $izin->alasan == 'Dinas' ? 'checked' : '' }}>
                                        <label class="form-check-label">Dinas</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Jam -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Jam Keluar</label>
                                    <input type="time" name="jam_keluar"
                                           value="{{ $izin->jam_keluar }}"
                                           class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Jam Kembali</label>
                                    <input type="time" name="jam_kembali"
                                           value="{{ $izin->jam_kembali }}"
                                           class="form-control">
                                </div>
                            </div>

                            <!-- Keterangan -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Keterangan</label>
                                <textarea name="keterangan"
                                          class="form-control"
                                          rows="3">{{ $izin->keterangan }}</textarea>
                            </div>

                            <!-- Tujuan -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Tujuan Persetujuan</label>
                                <select name="tujuan_persetujuan" class="form-select">
                                    <option value="Ketua Tim" {{ $izin->tujuan_persetujuan == 'Ketua Tim' ? 'selected' : '' }}>Ketua Tim</option>
                                    <option value="Kepala Subbagian Umum" {{ $izin->tujuan_persetujuan == 'Kepala Subbagian Umum' ? 'selected' : '' }}>Kepala Subbagian Umum</option>
                                    <option value="Kepala BPS Banjar" {{ $izin->tujuan_persetujuan == 'Kepala BPS Banjar' ? 'selected' : '' }}>Kepala BPS Banjar</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('ketua-tim.izin.index') }}" class="btn btn-secondary">Kembali</a>
                                <button class="btn btn-success">Update</button>
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
