@extends('layouts.anggota')

@section('title', 'Persetujuan Izin')

@section('content')

<section class="section-padding" id="section_approval">
    <div class="container">

        <!-- Judul -->
        <div class="row mb-4">
            <div class="col-lg-12 text-center">
                <h2 class="mb-2">Persetujuan Izin Pegawai</h2>
                <p class="text-muted">
                    Daftar pengajuan izin keluar kantor yang menunggu persetujuan
                </p>
            </div>
        </div>

        <!-- Card -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm border-1">

                    <!-- Card Header -->
                    <div class="card-header bg-white border-0">
                        <h5 class="mb-0 fw-bold">Tabel Persetujuan</h5>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">

                        {{-- Alert Success --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-hover align-middle text-center">

                                <thead class="table-dark">
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Jabatan</th>
                                        <th>Alasan</th>
                                        <th>Jam Keluar</th>
                                        <th>Jam Kembali</th>
                                        <th>Keterangan</th>
                                        <th>Tujuan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @forelse ($izins as $izin)
                                    <tr>
                                        <td>{{ $izin->pegawai->nama }}</td>
                                        <td>{{ $izin->pegawai->nip }}</td>
                                        <td>{{ $izin->pegawai->jabatan }}</td>
                                        <td>{{ $izin->alasan }}</td>
                                        <td>{{ $izin->jam_keluar }}</td>
                                        <td>{{ $izin->jam_kembali ?? '-' }}</td>
                                        <td>{{ $izin->keterangan ?? '-' }}</td>
                                        <td>{{ $izin->tujuan_persetujuan }}</td>

                                        {{-- STATUS --}}
                                        <td>
                                            @if ($izin->status === 'menunggu')
                                                <span class="badge bg-warning text-dark">
                                                    Menunggu
                                                </span>
                                            @elseif ($izin->status === 'disetujui')
                                                <span class="badge bg-success">
                                                    Disetujui
                                                </span>
                                            @else
                                                <span class="badge bg-danger">
                                                    Ditolak
                                                </span>
                                            @endif
                                        </td>

                                        {{-- AKSI --}}
                                        <td>
                                            @if ($izin->status === 'menunggu')
                                                <div class="d-flex justify-content-center gap-2">

                                                    {{-- Setujui --}}
                                                    <form action="{{ route('approval.setujui', $izin->id_izin) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button class="btn btn-sm btn-outline-success"
                                                                title="Setujui">
                                                            <i class="bi bi-check-circle"></i>
                                                        </button>
                                                    </form>

                                                    {{-- Tolak --}}
                                                    <form action="{{ route('approval.tolak', $izin->id_izin) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button class="btn btn-sm btn-outline-danger"
                                                                title="Tolak">
                                                            <i class="bi bi-x-circle"></i>
                                                        </button>
                                                    </form>

                                                </div>
                                            @else
                                                <span class="text-muted fst-italic">
                                                    Selesai
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center text-muted">
                                            Tidak ada data persetujuan
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
