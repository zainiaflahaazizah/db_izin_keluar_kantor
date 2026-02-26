@extends('layouts.kepala')

@section('title', 'Data Izin')

@section('content')

        <div class="container">
            <div class="page-inner">

                <!-- PAGE HEADER -->
                <div class="page-header">
                    <h3 class="fw-bold mb-3">Izin</h3>

                    <ul class="breadcrumbs mb-3">
                        <li class="nav-home">
                            <a href="{{ url('dashboard') }}">
                                <i class="icon-home"></i>
                            </a>
                        </li>

                        <li class="separator">
                            <i class="icon-arrow-right"></i>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('kepala-bps.izin.index') }}">Forms</a>
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
                        <form action="{{ route('kepala-bps.izin.update', $izin->id_izin) }}" method="POST" id="izinForm">
                            @csrf
                            @method('PUT')

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

                                        {{-- KOLOM KIRI --}}
                                        <div class="col-md-6">

                                            {{-- NAMA --}}
                                            <div class="form-group">
                                                <label for="id_pegawai">Nama</label>
                                                <select
                                                    name="id_pegawai"
                                                    id="id_pegawai"
                                                    class="form-control @error('id_pegawai') is-invalid @enderror"
                                                    required
                                                >
                                                    <option value="">-- Pilih Nama Pegawai --</option>
                                                    @foreach ($pegawais as $pegawai)
                                                        <option
                                                            value="{{ $pegawai->id_pegawai }}"
                                                            data-nip="{{ $pegawai->nip }}"
                                                            data-jabatan="{{ $pegawai->jabatan }}"
                                                            {{ old('id_pegawai', $izin->id_pegawai) == $pegawai->id_pegawai ? 'selected' : '' }}
                                                        >
                                                            {{ $pegawai->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            @error('id_pegawai')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror

                                            {{-- NIP --}}
                                            <div class="form-group">
                                                <label for="nip">NIP</label>
                                                <input
                                                    type="text"
                                                    id="nip"
                                                    class="form-control"
                                                    value="{{ $izin->pegawai->nip }}"
                                                    readonly
                                                >
                                            </div>

                                            {{-- JABATAN --}}
                                            <div class="form-group">
                                                <label for="jabatan">Jabatan</label>
                                                <input
                                                    type="text"
                                                    id="jabatan"
                                                    class="form-control"
                                                    value="{{ $izin->pegawai->jabatan }}"
                                                    readonly
                                                >
                                            </div>

                                            {{-- ALASAN --}}
                                            <div class="form-group">
                                                <label>Alasan Keluar</label>
                                                <div class="d-flex gap-4">

                                                    <div class="form-check">
                                                        <input
                                                            type="radio"
                                                            name="alasan"
                                                            value="Pribadi"
                                                            id="alasanPribadi"
                                                            class="form-check-input"
                                                            {{ old('alasan', $izin->alasan) == 'Pribadi' ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="alasanPribadi">Pribadi</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input
                                                            type="radio"
                                                            name="alasan"
                                                            value="Dinas"
                                                            id="alasanDinas"
                                                            class="form-check-input"
                                                            {{ old('alasan', $izin->alasan) == 'Dinas' ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="alasanDinas">Dinas</label>
                                                    </div>

                                                </div>
                                            </div>

                                            @error('alasan')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror

                                        </div>
                                        {{-- END KOLOM KIRI --}}

                                        {{-- KOLOM KANAN --}}
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
                                                            value="{{ old('jam_keluar', $izin->jam_keluar) }}"
                                                            required
                                                        >
                                                    </div>

                                                    @error('jam_keluar')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="jam_kembali">Jam Kembali</label>
                                                        <input
                                                            type="time"
                                                            id="jam_kembali"
                                                            name="jam_kembali"
                                                            class="form-control @error('jam_kembali') is-invalid @enderror"
                                                            value="{{ old('jam_kembali', $izin->jam_kembali) }}"
                                                        >
                                                    </div>

                                                    @error('jam_kembali')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- KETERANGAN --}}
                                            <div class="form-group">
                                                <label for="keterangan">Keterangan</label>
                                                <textarea
                                                    id="keterangan"
                                                    name="keterangan"
                                                    class="form-control @error('keterangan') is-invalid @enderror"
                                                    rows="3"
                                                >{{ old('keterangan', $izin->keterangan) }}</textarea>
                                            </div>

                                            @error('keterangan')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror

                                            {{-- TUJUAN PERSETUJUAN --}}
                                            <div class="form-group">
                                                <label for="tujuan_persetujuan">Tujuan Persetujuan</label>
                                                <select
                                                    name="tujuan_persetujuan"
                                                    class="form-control @error('tujuan_persetujuan') is-invalid @enderror"
                                                    required
                                                >
                                                    <option value="">-- Pilih Tujuan --</option>
                                                    <option value="Ketua Tim" {{ old('tujuan_persetujuan', $izin->tujuan_persetujuan) == 'Ketua Tim' ? 'selected' : '' }}>
                                                        Ketua Tim
                                                    </option>
                                                    <option value="Kepala Subbagian Umum" {{ old('tujuan_persetujuan', $izin->tujuan_persetujuan) == 'Kepala Subbagian Umum' ? 'selected' : '' }}>
                                                        Kepala Subbagian Umum
                                                    </option>
                                                    <option value="Kepala BPS Banjar" {{ old('tujuan_persetujuan', $izin->tujuan_persetujuan) == 'Kepala BPS Banjar' ? 'selected' : '' }}>
                                                        Kepala BPS Banjar
                                                    </option>
                                                </select>
                                            </div>

                                            @error('tujuan_persetujuan')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror

                                        </div>
                                        {{-- END KOLOM KANAN --}}

                                    </div>
                                </div>
                                <!-- END CARD BODY -->

                                <!-- CARD ACTION -->
                                <div class="card-action d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="{{ route('kepala-bps.izin.index') }}" class="btn btn-danger ms-2">Batal</a>
                                </div>

                            </div>
                        </form>
                        <!-- END FORM -->

                    </div>
                </div>

            </div>
        </div>


@endsection
