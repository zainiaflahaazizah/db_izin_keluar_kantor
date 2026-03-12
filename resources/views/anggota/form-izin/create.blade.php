@extends('layouts.anggota2')

@section('title', 'Tambah Izin')

@section('content')
    <div class="container">
            <div class="page-inner">

                <!-- PAGE HEADER -->
                <div class="page-header">
                    <h3 class="fw-bold mb-3">Izin</h3>

                    <ul class="breadcrumbs mb-3">
                        {{-- <li class="nav-home">
                            <a href="{{ url('dashboard') }}">
                                <i class="icon-home"></i>
                            </a>
                        </li> --}}

                        <li class="separator">
                            <i class="icon-arrow-right"></i>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('anggota.izin.index') }}">Forms</a>
                        </li>

                        <li class="separator">
                            <i class="icon-arrow-right"></i>
                        </li>

                        <li class="nav-item">
                            <a href="#">Izin</a>
                        </li>
                    </ul>
                </div>
                <!-- END PAGE HEADER -->

                <div class="row">
                    <div class="col-md-12">

                        <!-- FORM -->
                        <form action="{{ route('anggota.izin.store') }}" method="POST" id="izinForm">
                            @csrf

                            <div class="card">

                                <!-- CARD HEADER -->
                                <div class="card-header">
                                    <div class="card-title">
                                        Formulir Pengajuan Izin Keluar Kantor
                                    </div>
                                </div>

                                <!-- CARD BODY -->
                                <div class="card-body">
                                    <div class="row">

                                        <!-- KOLOM KIRI -->
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" value="{{ $pegawai->nama }}" disabled>

                                                <input type="hidden" name="id_pegawai" value="{{ $pegawai->id_pegawai }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="nip">NIP</label>
                                                <input type="text" id="nip" class="form-control" value="{{ $pegawai->nip }}" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="jabatan">Jabatan</label>
                                                <input type="text" id="jabatan" class="form-control" value="{{ $pegawai->jabatan }}" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label>Alasan Keluar</label>
                                                <div
                                                    class="radio-group d-flex @error('alasan') is-invalid @enderror"
                                                    style="gap: 20px;"
                                                >
                                                    <div class="form-check">
                                                        <input
                                                            type="radio"
                                                            name="alasan"
                                                            value="Pribadi"
                                                            id="alasanPribadi"
                                                            class="form-check-input"
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
                                                            value="Dinas"
                                                            id="alasanDinas"
                                                            class="form-check-input"
                                                        >
                                                        <label class="form-check-label" for="alasanDinas">
                                                            Dinas
                                                        </label>
                                                    </div>
                                                </div>

                                                @error('alasan')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <!-- END KOLOM KIRI -->

                                        <!-- KOLOM KANAN -->
                                        <div class="col-md-6">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="jam_keluar">Jam Keluar</label>
                                                        <input
                                                            type="time"
                                                            id="jam_keluar"
                                                            name="jam_keluar"
                                                            class="form-control @error('jam_keluar') is-invalid @enderror"
                                                            value="{{ old('jam_keluar') }}"
                                                            required
                                                        >
                                                        @error('jam_keluar')
                                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="jam_kembali">Jam Kembali (Estimasi)</label>
                                                        <input
                                                            type="time"
                                                            id="jam_kembali"
                                                            name="jam_kembali"
                                                            class="form-control @error('jam_kembali') is-invalid @enderror"
                                                            value="{{ old('jam_kembali') }}"
                                                            required
                                                        >
                                                        @error('jam_kembali')
                                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="keterangan">Keterangan / Detail Keperluan</label>
                                                <textarea
                                                    id="keterangan"
                                                    name="keterangan"
                                                    class="form-control @error('keterangan') is-invalid @enderror"
                                                    rows="3"
                                                    placeholder="Jelaskan secara singkat tujuan dan keperluan Anda keluar kantor..."
                                                    required
                                                ></textarea>
                                                @error('keterangan')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Tujuan Persetujuan</label>
                                                <select name="tujuan_persetujuan" class="form-control" required>
                                                    <option value="">-- Pilih Tujuan Persetujuan --</option>
                                                    @foreach($ketua_tim as $kt)
                                                        <option value="Ketua Tim - {{ $kt->nama }}">
                                                            Ketua Tim - {{ $kt->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                @error('tujuan_persetujuan')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <!-- END KOLOM KANAN -->

                                    </div>
                                </div>
                                <!-- END CARD BODY -->

                                <!-- CARD ACTION -->
                                <div class="card-action d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="{{ route('anggota.izin.index') }}" class="btn btn-danger ms-2">Batal</a>
                                </div>

                            </div>
                        </form>
                        <!-- END FORM -->

                    </div>
                </div>

            </div>
        </div>


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
