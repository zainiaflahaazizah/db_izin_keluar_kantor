@extends('layouts.anggota')

@section('title', 'Detail Izin')

@section('content')
<section class="section-padding" id="section_2">
    <div class="container">

        <!-- Judul -->
        <div class="row mb-4">
            <div class="col-lg-12 text-center">
                <h2 class="mb-2">Detail Izin Pegawai</h2>
                <p class="text-muted">Informasi lengkap pengajuan izin</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm border-1">
                    <div class="card-header bg-white fw-bold">
                        Data Izin
                    </div>

                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th width="35%">Nama</th>
                                <td>: {{ $izin->pegawai->nama }}</td>
                            </tr>

                            <tr>
                                <th>NIP</th>
                                <td>: {{ $izin->pegawai->nip }}</td>
                            </tr>

                            <tr>
                                <th>Jabatan</th>
                                <td>: {{ $izin->pegawai->jabatan }}</td>
                            </tr>

                            <tr>
                                <th>Alasan</th>
                                <td>:
                                    @if ($izin->alasan === 'Pribadi')
                                        <span class="badge bg-info">Pribadi</span>
                                    @elseif ($izin->alasan === 'Dinas')
                                        <span class="badge bg-primary">Dinas</span>
                                    @else
                                        <span class="badge bg-secondary">-</span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Jam Keluar</th>
                                <td>: {{ $izin->jam_keluar }}</td>
                            </tr>

                            <tr>
                                <th>Jam Kembali</th>
                                <td>: {{ $izin->jam_kembali ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>Keterangan</th>
                                <td>: {{ $izin->keterangan ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>Tujuan Persetujuan</th>
                                <td>: {{ $izin->tujuan_persetujuan }}</td>
                            </tr>

                            <tr>
                                <th>Status</th>
                                <td>:
                                    @if ($izin->status === 'menunggu')
                                        <span class="badge bg-warning text-dark">Menunggu</span>
                                    @elseif ($izin->status === 'disetujui')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>

                    <!-- Footer -->
                    <div class="card-footer bg-white d-flex justify-content-between">
                        <a href="{{ route('anggota.izin.index') }}"
                           class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>

                        @if ($izin->status === 'disetujui')
                            <a href="{{ route('surat-keluar.pdf', $izin->id_izin) }}"
                               target="_blank"
                               class="btn btn-outline-danger">
                                <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
                            </a>
                        @endif
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>
@endsection
